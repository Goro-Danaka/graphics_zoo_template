<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;
use App\Controller\StripesController;

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
                ->contain(['Designers'])
                ->order(['Customers.created' => 'DESC'])
                ->all()
				->toArray();
				
		$stripe_controller = new StripesController();
		// echo '<pre>';
		// print_r($customers);
		// echo '</pre>';
		foreach($customers as $k=> $customer){
			if($customer->current_plan != ""){
				//echo $customer->current_plan;
				$getcurrentplan = $stripe_controller->getcurrentplan($customer->current_plan);
				$plandetails = $getcurrentplan->items->data[0]->plan;
				$customer->current_plan_name = $plandetails->name; 
				// echo "<pre>";
				// print_r($getcurrentplan);
				// echo "</pre>"; exit;
				//echo $plandetails->name;
			 }else{
				 $customer->current_plan_name = "Inactive"; 
			 }
			
		}
		// echo '<pre>';
		// print_r($customers);
		// echo '</pre>';
		//exit;
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
		$stripe_controller = new StripesController();
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
		}else{
			$carddetails['last4'] = "Not Available";
			$carddetails['exp_month'] = "Not Available";
			$carddetails['exp_year'] = "Not Available";
		}
        $this->request->session()->write('referrer_url', Router::url($this->here, true));
        $this->set(compact('customer', 'designs_requested', 'designs_approved','carddetails'));
    }
	
	public function add() {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            $customer->role = USER_CUSTOMER;
            if ($this->Customers->save($customer)) {
                $this->uploadManagerProfilePicture($customer->id, $this->request->getData('profile_picture'));
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    public function edit($customer_id = null) {
        $customer = $this->Customers
                ->find()
                ->where(['Customers.role' => USER_CUSTOMER, 'Customers.id' => $customer_id])
                ->first();
		
		
        if (!$customer):
            $this->Flash->error('No customer found.');
            return $this->redirect(Router::url($this->referer('/', TRUE), TRUE));
        endif;

		$stripe_controller = new StripesController();
		$subscription_plan_list = array();
		$subscription = array();
		$planid="";
		$allplan =	$stripe_controller->getallsubscriptionlist();
		$subscription[] = "Select Plan";
		for($i=0;$i<sizeof($allplan);$i++){
			$subscription[$allplan[$i]['id']] = $allplan[$i]['name'] ." - $". $allplan[$i]['amount']/100 ."/". $allplan[$i]['interval']; 
		}
		 if($customer->current_plan != ""){
			//echo $customer->current_plan;
			$getcurrentplan = $stripe_controller->getcurrentplan($customer->current_plan);
			$plandetails = $getcurrentplan->items->data[0]->plan;
			$planid = $plandetails->id; 
			// echo "<pre>";
			// print_r($getcurrentplan);
			// echo "</pre>"; exit;			
		 }
		
				
		if(isset($_POST['change_plan'])){
			
			$customerdetails = $stripe_controller->getcustomerdetail($customer->current_plan);
			//echo "<pre>"; print_r($customerdetails); echo "</pre>"; exit;
			$updatecard = $stripe_controller->updatecard($customerdetails->id,$_POST);
			if($updatecard[0]=="success"){
				$this->Flash->success(__($updatecard[1]));
				$plan['planid'] = $_POST['myplan'];
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
			}else{
				$this->Flash->error(__($updatecard[1]));
			}
            
		}
		
        if ($this->request->is(['post', 'put'])):
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
			
            if ($this->Customers->save($customer)) {
				
                $this->uploadManagerProfilePicture($customer->id, $this->request->getData('profile_picture1'));
				if($_POST['designer'] != "0"){
						$activerequest = $this->Requests
											->find()
											->where(['Requests.status' => "active",'Requests.customer_id' => $customer->id])
											->all()
											->toArray();
											
										 
							if(sizeof($activerequest) > 0){
								if($this->Requests->updateAll(array('designer_id' => $_POST['designer_id'],'status'=>'assign','status_designer'=>'assign','status_admin'=>'assign','modified'=>date("Y-m-d h:i:s")),array('customer_id' => $customer->id,'status'=>'pending')))
								{
									$this->Flash->success(__('Designer Assign Successfully.'));
									return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
								}else
								{
									//$this->Flash->error(__('Not Savesss.'));
								}
							}else{
								$assignrequest = $this->Requests
														->find()
														->where(['Requests.status' => "pending",'Requests.customer_id' => $customer->id])
														->order(['Requests.created' => 'ASC'])
														->first();
								if($this->Requests->updateAll(array('status'=>'active','status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'status_designer'=>'active','dateinprogress'=>date("Y-m-d h:i:s"),'designer_id' => $_POST['designer_id']),array('id' => $assignrequest->id))){
									$this->Flash->success(__('one design active Successfully.'));
								}else{
									$this->Flash->success(__('one not Successfully.'));
								}
								
								if($this->Requests->updateAll(array('designer_id' => $_POST['designer_id'],'status'=>'assign','status_designer'=>'assign','status_admin'=>'assign','modified'=>date("Y-m-d h:i:s")),array('customer_id' => $customer->id,'status'=>'pending')))
								{
									$this->Flash->success(__('Designer Assign Successfully.'));
									return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
								}else
								{
									$this->Flash->error(__('Not Savesss.'));
								}
							}
				}
				if($planid != ""){
					if($planid != $_POST['user_current_plan']){
						
						$updateplan = $stripe_controller->updateuserplan($customer->current_plan,$_POST['user_current_plan']);
						
						$this->Flash->success(__('The customer has been saved.'));
					return $this->redirect(Router::url(['action' => 'index'], TRUE));
					}
				}else{
					$this->Flash->error(__('User has card not inserted. Please, try again.'));
				}
                
            }else{
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
			$this->Flash->success(__('The customer has been saved.'));
			return $this->redirect(Router::url(['action' => 'index'], TRUE));
        endif;
		
		
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
		
			
		$designer_list = $this->getDesignerList();
		
		

        $this->set(compact('customer','subscription','planid','carddetails','designer_list'));
    }

    public function delete($id) {
        //        $this->request->allowMethod(['post', 'delete']);

        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeSubscription($user_id) {
        $customer = $this->Customers->get($user_id);
        if ($this->request->is(['post', 'put'])):
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)):
                $this->Flash->success('Subscription changed successfully.');
                $this->redirect($this->request->session()->read('referrer_url'));
            else:
                $this->Flash->error('Subscription not changed.');
            endif;
        endif;
        $subscription_plan_list = $this->getSubscriptionPlans();
        $this->set(compact('customer', 'subscription_plan_list'));
    }

    public function statusChange($customer_id, $manager_status) {
        $manager_current_status = $manager_status;
        $change_manager_status = '';
        if ($manager_current_status == STATUS_ACTIVE):
            $change_manager_status = STATUS_DEACTIVE;
        elseif ($manager_current_status == STATUS_DEACTIVE):
            $change_manager_status = STATUS_ACTIVE;
        endif;

        $customer = $this->Customers
                ->find()
                ->where(['Customers.id' => $customer_id])
                ->andWhere(['Customers.status' => $manager_current_status])
                ->first();
        if ($customer):
            $customer->status = $change_manager_status;
            if ($this->Customers->save($customer)):
                $this->Flash->success("Activation status change successfully.");
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            else:
                $this->Flash->error("Activation status not change.");
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            endif;
        endif;
    }

    public function changeDesigner($customer_id) {
        $customer = $this->Customers
                ->find()
                ->where(['Customers.role' => USER_CUSTOMER])
                ->andWhere(['Customers.id' => $customer_id])
                ->first();
        if (!$customer):
            $this->Flash->error('No customer found.');
            return $this->redirect(Router::url($this->referer('/', TRUE), TRUE));
        endif;
        if ($this->request->is(['post', 'put'])):
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)):
                $this->Flash->success('Designer changed successfully.');
                return $this->redirect(Router::url($this->referer('/', TRUE), TRUE));
            else:
                $this->Flash->error('Subscription not changed.');
                return $this->redirect(Router::url($this->referer('/', TRUE), TRUE));
            endif;
        endif;
        $designer_list = $this->getDesignerList();
        $this->set(compact('customer', 'designer_list','planid'));
    }

}