<?php

namespace App\Controller\Customer;

use App\Controller\AppController;
use Cake\Routing\Router;
use App\Controller\StripesController;

/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class SettingsController extends AppController {

    public function changePassword() {
        $customer = $this
                ->Customers
                ->find()
                ->where([
                    'Customers.role' => USER_CUSTOMER,
                    'Customers.id' => $this->current_user->id,
                ])
                ->first();
				
		
		if(isset($_POST['update_profile'])){
			
			if($_POST['firstname'] != $customer->first_name || $_POST['lastname'] || $customer->last_name && $_POST['phone'] != $customer->phone){
				$customer->first_name = $_POST['firstname'];
				$customer->last_name = $_POST['lastname'];
				$customer->phone = $_POST['phone'];
				$customer->current_plan = $_POST['current_plan'];
				if ($this->Customers->save($customer)):
					$this->Flash->success('Update Profile Successfully.');
					return $this->redirect($this->referer('/', TRUE));
				else:
					$this->Flash->error('Profile not Update.');
					return $this->redirect($this->referer('/', TRUE));
				endif;
			}else{
				
				$this->Flash->error('Please Change any criteria and then Edit Your Profile.');
				return $this->redirect($this->referer('/', TRUE));
			}
		} 
		
		if(isset($_POST['change_password'])){
			if (!$customer):
				$this->Flash->error('No customer found.');
				$this->redirect($this->referer('/', TRUE));
			endif;

			if ($this->request->is(['post', 'put'])):
				$customer = $this->Customers->patchEntity($customer, $this->request->getData());
				$default_password_hasher = new \Cake\Auth\DefaultPasswordHasher();
				if (!($default_password_hasher->check($this->request->getData('old_password'), $customer->password))):
					$this->Flash->error('Please enter right old password.');
					return $this->redirect($this->referer('/', TRUE));
				endif;

				if ($this->request->getData('new_password') !== $this->request->getData('confirm_password')):
					$this->Flash->error('New password and confirm password are not same.');
					return $this->redirect($this->referer('/', TRUE));
				endif;
				
				$customer->password = $this->request->getData('new_password');
				if ($this->Customers->save($customer)):
					$this->Flash->success('Password changed successfully.');
					return $this->redirect($this->referer('/', TRUE));
				else:
					$this->Flash->error('Password not change.');
					return $this->redirect($this->referer('/', TRUE));
				endif;
			endif;
		}
		$stripe_controller = new StripesController();
		$carddetails = "";
		$plan['planid'] = "";
		if($customer->current_plan != "" && $customer->current_plan != "0"){
			
			$getcurrentplan = $stripe_controller->getcurrentplan($customer->current_plan);
			
			$plan['userid'] = $getcurrentplan->id;
			$plan['current_period_end'] = $getcurrentplan->current_period_end;
			$plan['current_period_start'] = $getcurrentplan->current_period_start;
			$plan['billing'] = $getcurrentplan->billing; 
			$plan['trial_end'] = $getcurrentplan->trial_end;
			$plan['trial_start'] = $getcurrentplan->trial_start; 
			
			
			$plandetails = $getcurrentplan->items->data[0]->plan;
			$plan['planname'] = $plandetails->name;
			$plan['planid'] = $plandetails->id; 
			$plan['interval'] = $plandetails->interval;
			$plan['amount'] = $plandetails->amount / 100;
			$plan['created'] = $plandetails->created;
			
			$customerdetails = $stripe_controller->getcustomerdetail($customer->current_plan);
			 $carddetails['last4'] = $customerdetails->sources->data[0]->last4;
			$carddetails['exp_month'] = $customerdetails->sources->data[0]->exp_month;
			$carddetails['exp_year'] = $customerdetails->sources->data[0]->exp_year;
			$carddetails['brand'] = $customerdetails->sources->data[0]->brand;
			 // print_r($carddetails);
			// echo '<pre>'; print_r($customerdetails); echo '</pre>'; exit;
		}
		
		if(isset($_POST['change_plan'])){
			
			
			
			if($plan['planid'] != $_POST['myplan'] && $plan['planid'] != ""){
					
					$updateplan = $stripe_controller->updateuserplan($customer->current_plan,$_POST['myplan']);
					if($updateplan[0]=="success"){
						$this->Flash->success(__($updateplan[1]));
						$plan['planid'] = $_POST['myplan'];
					}else{
						$this->Flash->error(__($updateplan[1]));
						
					}
               
			}else{
				$this->Flash->error(__('Plan is not changed.'));
			}
		}
		
		if(isset($_POST['change_my_card_deatils'])){
			
			$customerdetails = $stripe_controller->getcustomerdetail($customer->current_plan);
			//echo "<pre>"; print_r($customerdetails); echo "</pre>"; exit;
			$updatecard = $stripe_controller->updatecard($customerdetails->id,$_POST);
			if($updatecard[0]=="success"){
				$this->Flash->success(__($updatecard[1]));
				$plan['planid'] = $_POST['myplan'];
			}else{
				$this->Flash->error(__($updatecard[1]));
			}
            
		}
		
		$allplan =	$stripe_controller->getallsubscriptionlist();
		// print_r($allplan);
		
		
		
		$subscription = array();
		$subscription[] = "Select Plan";
		for($i=0;$i<sizeof($allplan);$i++){
			$subscription[$allplan[$i]['id']] = $allplan[$i]['name'] ." - $". $allplan[$i]['amount']/100 ."/". $allplan[$i]['interval']; 
		}
		
        $this->set(compact('customer','plan','subscription','carddetails'));
    }

}
