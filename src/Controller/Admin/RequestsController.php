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
class RequestsController extends AppController {

    public function index() {
        $requested_designs = $this->Requests
                ->find()
				->contain(['Customers','Designers'])
                ->where(['Requests.status_admin IN' => array("active","disapprove")])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$stripe_controller = new StripesController();
		// echo '<pre>';
		// print_r($customers);
		// echo '</pre>';
		$turn_around_days_array = array();
		foreach($requested_designs as $k=> $request){
			if($request->customer->current_plan != ""){
				//echo $customer->current_plan;
				$getcurrentplan = $stripe_controller->getcurrentplan($request->customer->current_plan);
				$plandetails = $getcurrentplan->items->data[0]->plan;				
				$turn_around_days_array[$k] = $plandetails->metadata->turn_around_days;
			 }
			
		}

		
		$inprogressrequest = $this->Requests
                ->find()
				->contain(['Customers','Designers'])
                ->where(['Requests.status_designer IN' => array("assign","pending")])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$checkforapproverequests =  $this->Requests
                ->find()
				->contain(['Customers','Designers'])
                ->where(['Requests.status_designer IN' => array("pendingforapprove","checkforapprove")])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$approvedrequest =   $this->Requests
                ->find()
				->contain(['Customers','Designers'])
                ->where(['Requests.status_designer IN' => array("approved")])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$requested_designs1 = $this->Requests
                ->find()
				->contain(['Customers','Designers'])
				->where(['Requests.status !=' => REQUEST_STATUS_APPROVED])
                ->order(['Requests.customer_id' => 'DESC', 'Requests.status'=>'ASC'])
                ->all()
				->toArray();
		//print_r($requested_designs1);
		$admin_unread_message_count_array=array();
		$total_unread_message = 0;
		$total_assign_message = 0;
		$total_checkforapprove_message = 0;
		$total_approved_message = 0;
		
		for($i=0;$i<sizeof($requested_designs1);$i++)
		{
			//echo $requested_designs1[$i]->id;
			$admin_unread_msg_count = $this->RequestDiscussions
                ->find()
				->where(['RequestDiscussions.request_id' => $requested_designs1[$i]->id])
				->andWhere(['RequestDiscussions.admin_seen' => 0])
                ->all()
				->toArray();
			$admin_unread_msg_count = sizeof($admin_unread_msg_count);
			$admin_unread_message_count_array[$requested_designs1[$i]->id] = $admin_unread_msg_count;
			if($requests1[$i]->status_designer == "active" || $requests1[$i]->status_designer == "disapprove"){
				$total_unread_message += $admin_unread_msg_count;
			}elseif($requests1[$i]->status_designer == "assign"){
				$total_assign_message += $admin_unread_msg_count;
			}elseif($requests1[$i]->status_designer == "checkforapprove" || $requests1[$i]->status_designer == "pendingforapprove"){
				$total_checkforapprove_message += $admin_unread_msg_count;
			}elseif($requests1[$i]->status_designer == "approved"){
				$total_approved_message += $admin_unread_msg_count;
			}
			
		}
		
		//print_r($admin_unread_message_count_array);
		
		
        $approved_designs = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers'])
                ->where(['Requests.status' => REQUEST_STATUS_APPROVED])
                ->order(['Requests.created' => 'DESC'])
                ->all();
				
		$approved_designs1 = $this->Requests
                ->find()
				->where(['Requests.status' => REQUEST_STATUS_APPROVED])
                ->order(['Requests.customer_id' => 'DESC', 'Requests.status'=>'ASC'])
                ->all()
				->toArray();
		//print_r($requested_designs1);
		$admin_unread_message_count_array2=array();
		$total_unread_message2 = 0;
		for($i=0;$i<sizeof($approved_designs1);$i++)
		{
			//echo $requested_designs1[$i]->id;
			$admin_unread_msg_count = $this->RequestDiscussions
                ->find()
				->where(['RequestDiscussions.request_id' => $approved_designs1[$i]->id])
				->andWhere(['RequestDiscussions.admin_seen' => 0])
                ->all()
				->toArray();
			$admin_unread_msg_count = sizeof($admin_unread_msg_count);
			$admin_unread_message_count_array2[$approved_designs1[$i]->id] = $admin_unread_msg_count;
			$total_unread_message2 += $admin_unread_msg_count;
		}
        $this->set(compact(['requested_designs', 'approved_designs', 'admin_unread_message_count_array','total_unread_message', 'admin_unread_message_count_array2','total_unread_message2','total_approved_message','total_checkforapprove_message','total_assign_message','approvedrequest','checkforapproverequests','inprogressrequest','turn_around_days_array']));
    }

    public function view($request_id = null) {
		
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();
		$this->RequestDiscussions->updateAll(array('admin_seen' => 1),array('request_id' => $request_id));
		 if ($_POST) {			 

			if($_POST['designer_id'] != "" && $_POST['designer_id'] != 0){

				
				if ($request->id) {
					$designer_id = $_POST["designer_id"];
					$request_id = $request->id;
				
					if($request->status == "pending" || $request->status == "running" || $request->status == "active" || $request->status == "assign"){
						if(isset($_POST['assigndesigner'])){
							
							$activerequest = $this->Requests
											->find()
											->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id,'Requests.id !='=> $request_id])
											->all()
											->toArray();
											
										 
							if(sizeof($activerequest) > 0){
								if($this->Requests->updateAll(array('designer_id' => $designer_id,'status'=>'assign','status_designer'=>'assign','status_admin'=>'assign','modified'=>date("Y-m-d h:i:s")),array('id' => $request_id)))
								{
									$this->Flash->success(__('Designer Assign Successfully.'));
									//return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
								}else
								{
									$this->Flash->error(__('Not Savesss.'));
								}
							}else{
								if($this->Requests->updateAll(array('designer_id' => $designer_id,'status'=>'active','status_designer'=>'active','status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'dateinprogress'=>date("Y-m-d h:i:s")),array('id' => $request_id)))
								{
									$this->Flash->success(__('Designer Assign Successfully.'));
									//return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
								}else
								{
									$this->Flash->error(__('Not Savesss.'));
								}
							}
							
							
						}elseif(isset($_POST["activedesigner"])){
							if($this->Requests->updateAll(array('status' => "active",'status_designer'=>'active','dateinprogress'=>date("Y-m-d h:i:s")),array('id' => $request_id)))
							{
								$this->Flash->success(__('Designer Active Successfully.'));
								//return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
							}else
							{
								$this->Flash->error(__('Not Save.'));
							}
						}
					}elseif($request->status == "active"){
						$this->Flash->error(__('Design Already in Progress.'));
					}
				}

				}else{
					$this->Flash->error(__('Please choose Designer. Please, try again.'));
				}

				$customer_state = ""; 
				$designer_state =  "";
				$admin_state =  "";
				if(isset($_POST['state_id'])) {
					$state =  $_POST['state_id'];
					if($state == 1) {
						$customer_state =  "assign";
						$designer_state =  "assign";
						$admin_state =  "assign";
					} elseif($state == 2){
						$customer_state =  "assign";
						$designer_state =  "assign";
						$admin_state =  "assign";
					} elseif($state == 3){
						$customer_state =  "active";
						$designer_state =  "active";					
						$admin_state =  "active";
					} elseif($state == 4){
						$customer_state =  "checkforapprove";
						$designer_state =  "pendingforapprove";					
						$admin_state 	=  "pendingforapprove";
					} elseif($state == 5){
						$customer_state =  "disapprove";
						$designer_state =  "disapprove";					
						$admin_state =  "disapprove";
					} elseif($state == 6){
						$customer_state =  "approved";
						$designer_state =  "approved";					
						$admin_state =  "approved";
					}

					
					$this->Requests->updateAll(array('status' => $customer_state,'status_designer'=>$designer_state,'status_admin'=>$admin_state),array('id' => $request_id));

					$disapproverequest = $this->Requests
									->find()
									->where(['Requests.status' => "disapprove",'Requests.customer_id' => $request->customer_id, 'designer_id' => 
										$_POST['designer_id']])
									->order(['Requests.created' => 'ASC'])
									->count();
					$approverequest = $this->Requests
									->find()
									->where(['Requests.status' => "checkforapprove",'Requests.customer_id' => $request->customer_id, 'designer_id' => $_POST['designer_id']])
									->order(['Requests.created' => 'ASC'])
									->count();
					$activerequest = $this->Requests
									->find()
									->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id, 'designer_id' => $_POST['designer_id']])
									->order(['Requests.created' => 'ASC'])
									->count();

					if($disapproverequest + $approverequest + $activerequest > 3) {
						$this->Flash->error(__('Not Save.'));
						$this->Requests->updateAll(array('status' => $request->status,'status_designer'=>$request->status_designer,'status_admin'=>$request->status_admin),array('id' => $request_id));
					} else {
						
						if($disapproverequest + $approverequest + $activerequest < 3  && $activerequest == 0) {
							$assignRequest = $this->Requests
									->find()
									->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id, 'designer_id' => $_POST['designer_id']])
									->order(['Requests.created' => 'ASC'])
									->first();
							$this->Requests->updateAll(array('status' => 'active','status_designer'=>'active','status_admin'=>'active'),array('id' => $assignRequest->id));
						}
		                $this->Flash->success(__('Successfully changed'));
					}				

				}
			}		
		
        $request_customer_files = $this->RequestCustomerFiles
                ->find()
                ->where(['RequestCustomerFiles.request_id' => $request->id])
                ->andWhere(['RequestCustomerFiles.customer_id' => $request->customer_id])
                ->order(['RequestCustomerFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				

		// $request_files = $this->RequestFiles
                // ->find()
                // ->where(['RequestFiles.request_id' => $request_id])
                // ->andWhere(['RequestFiles.user_id' => $request->customer_id])
                // ->order(['RequestFiles.created' => 'ASC'])
                // ->all()
                // ->toArray();
		
		$request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_id' => $request->customer_id])
				->andWhere(['RequestFiles.user_type' => "customer"])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		$admin_request_files = array();
				
		if($_SESSION['Auth']['User']['id'])
		{
			$adminid = $_SESSION['Auth']['User']['id'];
			// $admin_request_files = $this->RequestFiles
                // ->find()
                // ->where(['RequestFiles.request_id' => $request_id])
                // ->andWhere(['RequestFiles.user_id' => $adminid])
                // ->order(['RequestFiles.created' => 'DESC'])
                // ->first();
			// $admin_request_files = $this->RequestFiles
                // ->find()
                // ->where(['RequestFiles.request_id' => $request_id])
                // ->andWhere(['RequestFiles.user_type !=' => 'customer'])
                // ->order(['RequestFiles.created' => 'DESC'])
                // ->all()
				// ->toArray();
			$admin_request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_type' => "designer"])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()
				->toArray();
		}
		
		$customer_additional_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_type' => "customers"])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		$admin_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_type' => "admin"])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
		// print_R($admin_request_files); exit;		
		// $designerlist = $this->Customers
				// ->find()
				// ->where(['Customers.role' => 'designer'])
				// ->all()
				// ->to_array();
				$designer_list = $this->getDesignerList();

		$request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();
		
		
     //print_r($request->id);    print_r($request->status); exit;
        $this->set(compact('request', 'request_customer_files', 'request_files','designer_list','admin_request_files','customer_additional_files','admin_files'));
    }

    public function add() {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            $request->status = REQUEST_STATUS_PENDING;
            if ($this->Requests->save($request)) :
                $this->uploadRequestCustomerFiles($request->customer_id, $request->id, $this->request->getData('file'));
                $this->assignDesigner($request->id);
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['controller' => 'Profiles', 'action' => 'dashboard']);
            endif;
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $customer_list = $this->getCustomerList();
        $designer_list = $this->getDesignerList();
        $this->set(compact('request', 'customer_list', 'designer_list'));
        $this->set('_serialize', ['request']);
    }
	
	public function cancleRequest($request_id = null) {
    
		$this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($request_id);
        $request->status = REQUEST_STATUS_CANCELED;
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('Request status changed successfully.'));
        } else {
            $this->Flash->error(__('Request status not changed. Please, try again.'));
        }

        return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
    }
}
