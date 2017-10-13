<?php

namespace App\Controller\Customer;

use App\Controller\AppController;

/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class ProfilesController extends AppController {

    public function dashboard() {
        $customer = $this->Customers
                ->find()
                ->where(['Customers.role' => USER_CUSTOMER])
                ->andWhere(['Customers.id' => $this->current_user->id])
                ->first();
				
		$totalrequest =  $this->Requests
                ->find()
                ->where(['Requests.customer_id' => $this->current_user->id])
                ->all();
				
		$queuerequest = $this->Requests
                ->find()
                ->where(['Requests.customer_id' => $this->current_user->id])
				->toArray();
				
		$totalqueuerequest = $this->Requests
                ->find()
                ->Where(['Requests.status' => 'running'])
				->orWhere(['Requests.status' => 'active'])
				->orWhere(['Requests.status' => 'pending'])
				->orWhere(['Requests.status' => 'pendingforapprove'])
                ->all();
				
		$waitingtoapproverequest = $this->Requests
                ->find()
                ->where(['Requests.customer_id' => $this->current_user->id])
				->andWhere(['Requests.status' => 'active'])
                ->all();
				
		$pendingtoapproverequest = $this->Requests
                ->find()
                ->where(['Requests.customer_id' => $this->current_user->id])
				->andWhere(['Requests.status' => 'checkforapprove'])
                ->all();
		
        $this->set(compact('customer','totalrequest','queuerequest','waitingtoapproverequest', 'pendingtoapproverequest','totalqueuerequest'));
    }

    public function edit($customer_id) {
        $customer = $this->Customers
                ->find()
                ->where(['Customers.role' => USER_CUSTOMER])
                ->andWhere(['Customers.id' => $this->current_user->id])
                ->first();
        $this->set(compact('customer'));

        if (!$customer):
            $this->Flash->error('No customer found.');
            $this->redirect($this->referer('/', TRUE));
        endif;
    }

}
