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
class CustomersController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'signUp', 'resetPass', 'veryfication']);
    }

    public function index() {
        $users = $this->Users
                ->find()
                ->where(['Users.role' => USER_CUSTOMER])
                ->all();
        $this->set(compact(['users']));
    }

    public function dashboard() {
        
    }

    public function view($id = null) {

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

    public function contactAdmin() {
        
    }

    public function addRequest() {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            $request->customer_id = $this->current_user->id;
            $request->status = REQUEST_STATUS_PENDING;
            $request->employee_id = 0;
            if ($this->Requests->save($request)) :
                $this->uploadRequestCustomerFiles($request->customer_id, $request->id, $this->request->getData('file'));
                $this->assignDesigner($request->id);
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['action' => 'dashboard']);
            endif;
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
//        $customers = $this->Requests->Customers->find('list', ['limit' => 200]);
//        $employees = $this->Requests->Employees->find('list', ['limit' => 200]);
        $this->set(compact('request', 'customers', 'employees'));
        $this->set('_serialize', ['request']);
    }

    public function allPendingRequest() {
        $requests = $this->Requests
                ->find()
                ->where(['Requests.status' => REQUEST_STATUS_PENDING])
                ->all();

        $this->set(compact('requests'));
    }

    public function viewPendingRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->contain(['RequestCustomerFiles'])
                ->first();
        $this->set(compact('request'));
    }

    public function allRunningRequest() {
        $requests = $this->Requests
                ->find()
                ->where(['Requests.status' => REQUEST_STATUS_RUNNING])
                ->all();

        $this->set(compact('requests'));
    }

    public function viewRunningRequest($id = NULL) {
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

    public function viewCompletedRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->first();
        $this->set(compact('request'));
    }

    public function getBillingInfo($customer_id = NULL) {
        if (!$customer_id):
            $customer_id = $this->current_user->id;
        endif;
    }

    public function editPaymentOptions($customer_id = NULL) {
        if (!$customer_id):
            $customer_id = $this->current_user->id;
        endif;
    }

    public function addPaymentDetails() {
        
    }

    public function cancelRequest($request_id = null) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();
        if ($request):
            $request->status = REQUEST_STATUS_APPROVED;
        else:
            $this->Flash->error(__('No request found.'));
        endif;

        return $this->redirect(['action' => 'dashboard']);
    }

}
