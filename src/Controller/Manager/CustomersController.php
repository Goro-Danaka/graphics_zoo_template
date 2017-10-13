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
class CustomersController extends AppController {

    public function index() {

        $customers = $this->Customers
                ->find()
                ->where(['Customers.role' => USER_CUSTOMER])
                ->andWhere(['Designers.manager_id' => $this->current_user->id])
                ->contain(['Designers'])
                ->order(['Customers.created' => 'DESC'])
                ->all();

        $this->set(compact(['customers']));
    }

    public function view($id) {
        $customer = $this->Customers
                ->find()
                ->where(['Customers.role' => USER_CUSTOMER])
                ->andWhere(['Customers.id' => $id])
                ->contain(['Designers'])
                ->first();

        $designs_requested = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers'])
                ->where(['Requests.customer_id' => $id])
                ->all();

        $designs_approved = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers'])
                ->where(['Requests.customer_id' => $id])
                ->andWhere(['Requests.status' => REQUEST_STATUS_COMPLETED])
                ->all();

        $this->request->session()->write('referrer_url', Router::url($this->here, true));
        $this->set(compact('customer', 'designs_requested', 'designs_approved'));
    }

}
