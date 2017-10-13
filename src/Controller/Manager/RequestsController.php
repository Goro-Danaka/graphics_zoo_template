<?php

namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController {

    public function index() {
        $requested_designs = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers'])
                ->order(['Requests.created' => 'DESC'])
                ->all();

        $approved_designs = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers'])
                ->where(['Requests.status' => REQUEST_STATUS_APPROVED])
                ->order(['Requests.created' => 'DESC'])
                ->all();
        $this->set(compact(['requested_designs', 'approved_designs']));
    }

    public function view($request_id = null) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();
        $request_customer_files = $this->RequestCustomerFiles
                ->find()
                ->where(['RequestCustomerFiles.request_id' => $request->id])
                ->andWhere(['RequestCustomerFiles.customer_id' => $request->customer_id])
                ->order(['RequestCustomerFiles.created' => 'ASC'])
                ->all()
                ->toArray();
        $this->set(compact('request', 'request_customer_files'));
    }

}
