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
class EmployeesController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'signUp', 'resetPass', 'veryfication']);
    }

    public function index() {
        $this->redirect(Router::url(['controller' => 'Employees', 'action' => 'dashboard'], TRUE));
    }

    public function dashboard() {
        
    }

    public function index2() {
        $users = $this->Users
                ->find()
                ->where(['Users.role' => USER_DESIGNER])
                ->all();
        $this->set(compact(['users']));
    }

    public function add() {
//        $user = $this->Users->newEntity();
//        if ($this->request->is('post')) {
//            $user = $this->Users->patchEntity($user, $this->request->getData());
//            if ($this->Users->save($user)) {
//                $this->Flash->success(__('The user has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The user could not be saved. Please, try again.'));
//        }

        $employee_role = $this->getEmployeeRolesList();

        $this->set(compact('user', 'employee_role'));
        $this->set('_serialize', ['user']);
    }

    public function addDesigner() {
//        $user = $this->Users->newEntity();
//        if ($this->request->is('post')) {
//            $user = $this->Users->patchEntity($user, $this->request->getData());
//            if ($this->Users->save($user)) {
//                $this->Flash->success(__('The user has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The user could not be saved. Please, try again.'));
//        }

        $employee_role = $this->getEmployeeRolesList();

        $this->set(compact('user', 'employee_role'));
        $this->set('_serialize', ['user']);
    }

    public function view($id = null) {

        $user = $this->Users
                ->find()
                ->where(['Users.role' => USER_DESIGNER])
                ->where(['Users.id' => $id])
                ->first();

        $designs_in_queue = $this->Requests
                ->find()
                ->where(['Requests.employee_id' => $id])
                ->andWhere(['Requests.status IN' => [REQUEST_STATUS_RUNNING]])
                ->all();

        $approved_designs = $this->Requests
                ->find()
                ->where(['Requests.employee_id' => $id])
                ->andWhere(['Requests.status IN' => [REQUEST_STATUS_COMPLETED, REQUEST_STATUS_APPROVED]])
                ->all();


        $this->set(compact('user', 'designs_in_queue', 'approved_designs'));
        $this->set('_serialize', ['user']);
    }

    public function allNewRequest() {
        $requests = $this->Requests
                ->find()
                ->where(['Requests.status' => REQUEST_STATUS_PENDING])
                ->all();

        $this->set(compact('requests'));
    }

    public function viewNewRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->first();
        $this->set(compact('request'));
    }

    public function allPendingRequest() {
        $requests = $this->Requests
                ->find()
                ->where(['Requests.status' => REQUEST_STATUS_RUNNING])
                ->all();

        $this->set(compact('requests'));
    }

    public function viewPendingRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->first();
        $this->set(compact('request'));
    }

    public function allCompletedRequest() {
        $requests = $this->Requests
                ->find()
                ->where(['Requests.status' => REQUEST_STATUS_COMPLETED])
                ->all();

        $this->set(compact('requests'));
    }

    public function finishRequest($request_id) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();
        if ($request):
            $request->status = REQUEST_STATUS_FINISHED;
            $result = $this->Requests->save($request);
            if ($request):
                $this->Flash->success(__('Request is marked as finished successfully.'));
                return $this->redirect(['action' => 'dashboard']);
            else:
                $this->Flash->error(__('Request is not marked as finished.'));
            endif;
        else:
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        endif;
    }

    public function viewCompletedRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->first();
        $this->set(compact('request'));
    }

    public function changePassword() {
        $current_user = $this->Auth->user();
        $user = $this->Users->find()
                ->where(['Users.id' => $current_user['id']])
                ->first();
//        if ($this->request->is('post')):
//            $user = $this->Users->patchEntity($user, $this->request->data);
//            $default_password_hasher = new DefaultPasswordHasher();
//            if ($default_password_hasher->check($this->request->data['old_password'], $user->password)):
//                if ($this->request->data['new_password'] == $this->request->data['confirm_password']):
//                    $user->password = $this->request->data['new_password'];
//                    $this->Users->save($user);
//                    $this->Flash->success("Your Password Change successfully.");
//                else:
//                    echo $this->Flash->error("Your new Password and Confirm Password is not match please check and try again.");
//                endif;
//            else:
//                echo $this->Flash->error("Your old password is wrong please check your old password.");
//            endif;
//        endif;
    }

}
