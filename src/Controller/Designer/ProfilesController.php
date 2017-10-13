<?php

namespace App\Controller\Designer;

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
        $this->set(compact('customer'));
    }

}
