<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'signup', 'resetPass', 'veryfication', 'logout']);
    }

    public function index() {
        $current_user = $this->Auth->user();
        $users = $this->Users
                ->find()
//                ->where(['id' => $current_user['id']])
                ->all();
        $this->set(compact(['users']));
    }

    public function dashboard() {
        if ($this->current_user->role == USER_ADMIN):
            return $this->redirect(Router::url(['controller' => 'Admins', 'action' => 'dashboard', 'plugin' => FALSE], TRUE));
        elseif ($this->current_user->role == USER_EMPLOYEE):
            return $this->redirect(Router::url(['controller' => 'Managers', 'action' => 'dashboard', 'plugin' => FALSE], TRUE));
        elseif ($this->current_user->role == USER_DESIGNER):
            return $this->redirect(Router::url(['controller' => 'Employees', 'action' => 'dashboard', 'plugin' => FALSE], TRUE));
        elseif ($this->current_user->role == USER_CUSTOMER):
            return $this->redirect(Router::url(['controller' => 'Customers', 'action' => 'dashboard', 'plugin' => FALSE], TRUE));
        endif;
    }

    public function login() {
        $this->viewBuilder()->layout('user_login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
//                $this->Flash->success("Welcome Admin");
//                return $this->redirect(Router::url(['controller' => 'Users', 'action' => 'dashboard', 'plugin' => FALSE], TRUE));
//                pr($user);
//                die;
                if ($user['status'] == STATUS_ACTIVE):
                    if ($user['role'] == USER_ADMIN):
//                        $this->Flash->success("Welcome Admin");
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => FALSE], TRUE));
                    elseif ($user['role'] == USER_MANAGER):
//                        $this->Flash->success("Welcome Manager");
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'manager', 'plugin' => FALSE], TRUE));
                    elseif ($user['role'] == USER_DESIGNER):
//                        $this->Flash->success("Welcome Employee");
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'designer', 'plugin' => FALSE], TRUE));
                    elseif ($user['role'] == USER_CUSTOMER):
//                        $this->Flash->success("Welcome Users");
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer', 'plugin' => FALSE], TRUE));
                    endif;
//                    return $this->redirect($this->Auth->redirectUrl());
                else:
                    $this->Flash->error("You currently Deacteted.");
                endif;
            }
//            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function signup() {
        $this->viewBuilder()->layout('user_login');
        $user = $this->Users->newEntity();
        $user->role = USER_CUSTOMER;
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->uploadManagerProfilePicture($user->id, $this->request->getData('profile_picture'));
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            } else {
                $this->Flash->error(__('This is user already exist.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function resetPass() {
        $this->viewBuilder()->layout('user_login');
        if ($this->request->is('post')):
            $user = $this->Users
                    ->find()
                    ->where(['email' => $this->request->data['email']])
                    ->first();
            if ($user):
                $resetpass_token = uniqid() . time() . $user->id;
                $encrypt_token = base64_encode($resetpass_token);
                $url = Router::url(['Controller' => 'Users', 'action' => 'veryfication', $encrypt_token], TRUE);
                $user->activation = $resetpass_token;
                if ($this->Users->save($user)):
                    $email = new Email();
                    $email->to($user->email)
                            ->emailFormat('html')
                            ->template('reset_password')
                            ->viewVars(['reset_url' => $url, 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'id' => $user->id, 'token' => $user->activation])
                            ->subject('Reset Password');
                    if ($email->send()):
                        $this->Flash->success("We send reset password token on $user->email please check it");
                    else:
                        $this->Flash->error("Error in generating reset password token.");
                    endif;
                else:
                    $this->Flash->error("Error in generating Reset Password.");
                endif;
            else:
                $this->Flash->error("Your email is wrong please check it.");
            endif;
        endif;
    }

    public function veryfication($token = null) {
        $this->viewBuilder()->layout('user_login');
        $user = $this->Users
                ->find()
                ->where(['activation' => base64_decode($token)])
                ->first();
        if ($user):
            if ($this->request->is('post')):
                if ($this->request->data['password'] == $this->request->data['confirm_password']):
                    $user->password = $this->request->data['password'];
                    if ($this->Users->save($user)):
                        $this->Flash->success("Your password change successfully.");
                        $this->redirect(['action' => 'login']);
                    else:
                        $this->Flash->error("Your token get corrupted.");
                    endif;
                else:
                    $this->Flash->error("Please Check Your New Password and Confirm Password.");
                endif;
            endif;
        else:
            $this->Flash->error("Your token get corrupted.");
        endif;
    }

    public function changePassword() {
        $current_user = $this->Auth->user();
        $user = $this->Users->find()
                ->where(['Users.id' => $current_user['id']])
                ->first();
        if ($this->request->is('post')):
            $user = $this->Users->patchEntity($user, $this->request->data);
            $default_password_hasher = new DefaultPasswordHasher();
            if ($default_password_hasher->check($this->request->data['old_password'], $user->password)):
                if ($this->request->data['new_password'] == $this->request->data['confirm_password']):
                    $user->password = $this->request->data['new_password'];
                    $this->Users->save($user);
                    $this->Flash->success("Your Password Change successfully.");
                else:
                    echo $this->Flash->error("Your new Password and Confirm Password is not match please check and try again.");
                endif;
            else:
                echo $this->Flash->error("Your old password is wrong please check your old password.");
            endif;
        endif;
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = USER_MANAGER;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
