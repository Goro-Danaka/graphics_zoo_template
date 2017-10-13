<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class ProfilesController extends AppController {

    public function dashboard() {
		
		$todaydate =  date("Y-m-d");
		
		$today_customer = $this->Customers
                ->find()
                ->where(['Date(Customers.created)' => $todaydate])
                ->all();
		
		$all_customer = $this->Customers
                ->find()
                ->all();
				
		$today_requests = $this->Requests
                ->find()
                ->where(['Date(Requests.created)' => $todaydate])
                ->all();
				
		$total_requests = $this->Requests
                ->find()
                ->all();
		
		$this->set(compact('today_customer', 'all_customer', 'today_requests', 'total_requests'));
    }

}
