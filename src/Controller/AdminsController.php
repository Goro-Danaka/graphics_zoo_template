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
class AdminsController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'signup', 'resetPass', 'veryfication']);
    }

    public function index() {
        $this->redirect(Router::url(['controller' => 'Admins', 'action' => 'dashboard'], TRUE));
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

    public function viewManager($manager_id = null) {
        $user = $this->Users->get($manager_id, [
            'contain' => []
        ]);
        $manager = $this->Managers
                ->find()
                ->autoFields(true)
                ->where(['Managers.role' => USER_MANAGER, 'Managers.id' => $manager_id])
                ->first();

        if ($manager):
            $designers = $this->Designers->getAllDesignersOfManager($manager->id);
            $designer_ids = $this->getDesignerIdsOfManager($manager_id);
            if ($designer_ids):
                $designs_queue = $this->Requests
                        ->find()
                        ->where(['Requests.employee_id IN' => $designer_ids])
                        ->all();

                $designs_approved = $this->Requests
                        ->find()
                        ->where([
                            'Requests.employee_id IN' => $designer_ids,
                            'Requests.status' => REQUEST_STATUS_APPROVED
                        ])
                        ->all();
            endif;
        endif;

        $this->set(compact('manager', 'designers', 'designs_queue', 'designs_approved'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function allManagers() {
        $current_user = $this->Auth->user();
        $managers = $this->Managers
                ->find()
                ->where(['Managers.role' => USER_MANAGER])
                ->all();
        $this->set(compact(['managers']));
    }

    public function addManager() {
        $manager = $this->Managers->newEntity();
        if ($this->request->is('post')) {
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            $manager->role = USER_MANAGER;
            if ($this->Managers->save($manager)) {
                $this->uploadManagerProfilePicture($manager->id, $this->request->getData('profile_picture'));
                $this->Flash->success(__('The manager has been saved.'));
                return $this->redirect(['action' => 'allManagers']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function viewAllCustomers() {
        $users = $this->Users
                ->find()
                ->where(['Users.role' => USER_CUSTOMER])
                ->all();
        $this->set(compact(['users']));
    }

    public function viewAllCustomerDetails($id = null) {
        $user = $this->Users
                ->find()
                ->where(['Users.role' => USER_CUSTOMER])
                ->where(['Users.id' => $id])
                ->first();

        $requests = $this->Requests
                ->find()
                ->contain(['Employees'])
                ->where(['Requests.customer_id' => $id])
                ->all();



        $this->set(compact('user', 'requests'));
        $this->set('_serialize', ['user']);
    }

    public function statusChange($manager_id, $manager_status) {
        $manager_id = $manager_id;
        $manager_current_status = $manager_status;
        $change_manager_status = '';
        if ($manager_current_status == STATUS_ACTIVE):
            $change_manager_status = STATUS_DEACTIVE;
        elseif ($manager_current_status == STATUS_DEACTIVE):
            $change_manager_status = STATUS_ACTIVE;
        endif;

        $manager = $this->Users
                ->find()
                ->where(['Users.id' => $manager_id])
                ->andWhere(['Users.status' => $manager_current_status])
                ->first();
        if ($manager):
            $manager->status = $change_manager_status;
            if ($this->Users->save($manager)):
                $this->Flash->success("Manager status change successfully.");
                $this->redirect(['controller' => 'Admins', 'action' => 'allManagers']);
            else:
                $this->Flash->error("Manager status not change.");
                $this->redirect(['controller' => 'Admins', 'action' => 'allManagers']);
            endif;
        endif;
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

    public function deleteCustomer($id = null) {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'view-all-customers']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteManager($id = null) {
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
