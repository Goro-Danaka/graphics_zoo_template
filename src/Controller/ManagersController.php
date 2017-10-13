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
class ManagersController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'signup', 'resetPass', 'veryfication']);
    }

    public function index() {
        $this->redirect(Router::url(['controller' => 'Managers', 'action' => 'dashboard'], TRUE));
    }

    public function dashboard() {
        
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

    public function statusChange($designer_id, $designer_status) {
        $designer_id = $designer_id;
        $designer_current_status = $designer_status;
        $change_designer_status = '';
        if ($designer_current_status == STATUS_ACTIVE):
            $change_designer_status = STATUS_DEACTIVE;
        elseif ($designer_current_status == STATUS_DEACTIVE):
            $change_designer_status = STATUS_ACTIVE;
        endif;

        $designer = $this->Users
                ->find()
                ->where(['Users.id' => $designer_id])
                ->andWhere(['Users.status' => $designer_current_status])
                ->first();
        if ($designer):
            $designer->status = $change_designer_status;
            if ($this->Users->save($designer)):
                $this->Flash->success("Employee status change successfully.");
                $this->redirect(['controller' => 'Managers', 'action' => 'index']);
            else:
                $this->Flash->error("Employee status not change.");
                $this->redirect(['controller' => 'Managers', 'action' => 'index']);
            endif;
        endif;
    }

    public function allEmployees() {
        $designers = $this->Users
                ->find()
                ->where(['Users.role' => USER_DESIGNER])
                ->all();
        $this->set(compact(['designers']));
    }

    public function addEmployee() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = USER_DESIGNER;
            if ($this->Users->save($user)) {
                $this->uploadManagerProfilePicture($user->id, $this->request->getData('profile_picture'));
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
//        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
