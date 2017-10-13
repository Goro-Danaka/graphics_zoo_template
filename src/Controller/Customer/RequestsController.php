<?php

namespace App\Controller\Customer;

use App\Controller\AppController;
use App\Controller\StripesController;
/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController {

    public function index() {
        $requested_designs = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->order(['Requests.created' => 'DESC'])
                ->all();

        $approved_designs = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->where(['Requests.status' => REQUEST_STATUS_APPROVED])
                ->order(['Requests.created' => 'DESC'])
                ->all();


        $this->set(compact(['requested_designs', 'approved_designs',  'turn_around_days_array']));
    }

    public function view($request_id = null) {
        $request = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->where(['Requests.id' => $request_id])
                ->first();
        $this->set(compact('request', 'designers', 'designs_queue', 'designs_approved'));
    }

    public function allRequests() {
		$myorder = array("disapprove","active","assign");
        $requests = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->where(['Requests.status IN' => [REQUEST_STATUS_CHANGE_REQUEST, REQUEST_STATUS_RUNNING, REQUEST_STATUS_FINISHED, REQUEST_STATUS_PENDING, REQUEST_STATUS_CANCELED, 'active','disapprove','pendingforapprove','checkforapprove','assign']])
                ->andWhere(['Requests.customer_id' => $this->current_user->id])
				->order(['Requests.status' => 'ASC'])
                ->all();
				
		$requests = $this->Requests
                ->find('all',
                  array('conditions'=>array('Requests.status IN' => [REQUEST_STATUS_CHANGE_REQUEST, REQUEST_STATUS_RUNNING, REQUEST_STATUS_FINISHED, REQUEST_STATUS_PENDING, REQUEST_STATUS_CANCELED, 'active','disapprove','pendingforapprove','checkforapprove','assign'],'Requests.customer_id' => $this->current_user->id),
                        'order'=>array('FIELD(Requests.status, "disapprove","checkforapprove", "active", "assign","pending")')))
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles']);

				


		$requests1 = $this->Requests
                ->find()
				->contain(['Customers','Designers'])
				->where(['Requests.status !=' => "approved"])
                ->andWhere(['Requests.customer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all()
				->toArray();
		//print_r($requested_designs1);
        

		$admin_unread_message_count_array=array();
		$total_unread_message = 0;
		for($i=0;$i<sizeof($requests1);$i++)
		{
			//echo $requested_designs1[$i]->id;
			$admin_unread_msg_count = $this->RequestDiscussions
                ->find()
				->where(['RequestDiscussions.request_id' => $requests1[$i]->id])
				->andWhere(['RequestDiscussions.customer_seen' => 0])
				->andWhere(['RequestDiscussions.verified_by_admin' => 1])
                ->all()
				->toArray();
			// print_r($admin_unread_msg_count); exit;
			$mydata = $admin_unread_msg_count;
			$admin_unread_msg_count = sizeof($admin_unread_msg_count);
			$admin_unread_message_count_array[$requests1[$i]->id] = $admin_unread_msg_count;
			$total_unread_message += $admin_unread_msg_count;
		}	
				

        $requests_approved = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->where(['Requests.status IN' => [REQUEST_STATUS_APPROVED]])
                ->andWhere(['Requests.customer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'DESC'])
                ->all();
        $request_approved_id = $requests_approved->id;      
        $request_approved_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_approved_id])
                ->andWhere(['RequestFiles.user_id' => $this->current_user->id])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
        $admin_approved_request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_approved_id])
                ->andWhere(['RequestFiles.user_id !=' => $this->current_user->id])
                ->order(['RequestFiles.created' => 'DESC'])
                ->first();
        
        $requests1_approved = $this->Requests
                ->find()
                ->where(['Requests.status' => "approved"])
                ->andWhere(['Requests.customer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all()
                ->toArray();
        //print_r($requested_designs1);
        $admin_approved_unread_message_count_array=array();
        $total_approved_unread_message = 0;
        for($i=0;$i<sizeof($requests1_approved);$i++)
        {
            //echo $requested_designs1[$i]->id;
            $admin_approved_unread_msg_count = $this->RequestDiscussions
                ->find()
                ->where(['RequestDiscussions.request_id' => $requests1_approved[$i]->id])
                ->andWhere(['RequestDiscussions.customer_seen' => 0])
                ->andWhere(['RequestDiscussions.verified_by_admin' => 1])
                ->all()
                ->toArray();
            // print_r($admin_unread_msg_count); exit;
            $mydata = $admin_approved_unread_msg_count;
            $admin_approved_unread_msg_count = sizeof($admin_approved_unread_msg_count);
            $admin_approved_unread_message_count_array[$requests1_approved[$i]->id] = $admin_approved_unread_msg_count;
            $total_approved_unread_message += $admin_approved_unread_msg_count;
        }   


        $turn_around_days_array = array();

        $stripe_controller = new StripesController();
        foreach($requests as $k=> $request){
            if($request->customer->current_plan != ""){
                //echo $customer->current_plan;
                $getcurrentplan = $stripe_controller->getcurrentplan($request->customer->current_plan);
                $plandetails = $getcurrentplan->items->data[0]->plan;                               
                $turn_around_days_array[$k] = $plandetails->metadata->turn_around_days;
             }
            
        }
          
        $this->set(compact(['requests','admin_unread_message_count_array','total_unread_message','request_approved_files','admin_approved_request_files','admin_approved_unread_message_count_array','total_approved_unread_message', 'requests_approved','turn_around_days_array']));
    }

    public function viewRunningRequest($request_id = null) {
        $request = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->where(['Requests.id' => $request_id])
                ->andWhere(['Requests.customer_id' => $this->current_user->id])
                ->first();
		$diff=5000;		
		if($request->status == "approved"){			
			$current_time = date("Y-m-d h:i:s");
			$passed_time = date('Y-m-d h:i:s',strtotime($request->modified));
			$diff = strtotime($current_time) - strtotime($passed_time);			
		}
        if (!$request):
            $this->Flash->error('This request not belongs to you.');
            return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
        endif;
		$this->RequestDiscussions->updateAll(array('customer_seen' => 1),array('request_id' => $request->id,'verified_by_admin'=>1));
        $request_customer_files = $this->RequestCustomerFiles
                ->find()
                ->where(['RequestCustomerFiles.request_id' => $request_id])
                ->andWhere(['RequestCustomerFiles.customer_id' => $this->current_user->id])
                ->order(['RequestCustomerFiles.created' => 'ASC'])
                ->all()
                ->toArray();
		
        // $request_files = $this->RequestFiles
                // ->find()
                // ->where(['RequestFiles.request_id' => $request->id])
                // ->contain(['Users'])
                // ->order(['RequestFiles.created' => 'ASC'])
                // ->all()
                // ->toArray();
		
		$request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_id' => $this->current_user->id])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		$designer_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_type' => "designer"])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()
				->toArray();
				
		$admin_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_type' => "admin"])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()
				->toArray();		
		
        $designer_name = $this->Users
                ->find()
                ->Where(['Users.id' => $request->designer_id])
                ->first()->first_name . $this->Users
                ->find()
                ->Where(['Users.id' => $request->designer_id])
                ->first()->last_name;

        $admin_name = $this->Users
                ->find()
                ->Where(['Users.role' => "admin"])
                ->first()->first_name . $this->Users
                ->find()
                ->Where(['Users.role' => "admin"])
                ->first()->last_name;
				
        $this->set(compact('request', 'request_customer_files', 'request_files', 'designer_files','diff','admin_files','designer_name','admin_name'));
    }

    public function viewApprovedRequest($request_id = null) {
        $request = $this->Requests
                ->find()
                ->contain(['Customers', 'Designers', 'RequestCustomerFiles', 'RequestDesignerFiles'])
                ->where(['Requests.id' => $request_id])
                ->andWhere(['Requests.customer_id' => $this->current_user->id])
                ->first();
        if (!$request):
            $this->Flash->error('This request not belongs to you.');
            return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
        endif;
		$this->RequestDiscussions->updateAll(array('customer_seen' => 1),array('request_id' => $request->id,'verified_by_admin'=>1));
        $request_customer_files = $this->RequestCustomerFiles
                ->find()
                ->where(['RequestCustomerFiles.request_id' => $request->id])
                ->andWhere(['RequestCustomerFiles.customer_id' => $request->customer_id])
                ->order(['RequestCustomerFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		
		$request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->andWhere(['RequestFiles.user_id' => $this->current_user->id])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
		$admin_request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $request_id])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()
				->toArray();
		
        $this->set(compact('request', 'request_customer_files','request_files','admin_request_files'));
    }

    public function addRequest() {

        /*if ($this->current_user->designer_id == 0):
            $this->Flash->error('No designer is assigned to you. Please request administrator to assign designer first.');
            return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
        endif;*/

        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            $request->customer_id = $this->current_user->id;
            // $request->status = REQUEST_STATUS_PENDING;
			// $request->status_designer = REQUEST_STATUS_PENDING;
			// $request->status_admin = REQUEST_STATUS_PENDING;
			
			if($this->current_user->designer_id){
			
				
				$designer_id = $this->current_user->designer_id;
				
                $disapproverequest = $this->Requests
                                    ->find()
                                    ->where(['Requests.status' => "disapprove",'Requests.customer_id' => $this->current_user->id, 'designer_id' => 
                                        $designer_id])
                                    ->order(['Requests.created' => 'ASC'])
                                    ->count();
                $approverequest = $this->Requests
                                ->find()
                                ->where(['Requests.status' => "checkforapprove",'Requests.customer_id' => $this->current_user->id, 'designer_id' => $designer_id])
                                ->order(['Requests.created' => 'ASC'])
                                ->count();
                $activerequest = $this->Requests
                                ->find()
                                ->where(['Requests.status' => "active",'Requests.customer_id' => $this->current_user->id, 'designer_id' => $designer_id])
                                ->order(['Requests.created' => 'ASC'])
                                ->count();

				if($disapproverequest + $approverequest + $activerequest >= 3 || $activerequest > 0){
					$request->status = "assign";
					$request->status_designer = "assign";
					$request->status_admin = "assign";
					$request->designer_id = $designer_id;
				}else
                {
					$request->status = "active";
					$request->status_designer = "active";
					$request->status_admin = "active";
					$request->designer_id = $designer_id;
				}
			}else{
				$request->status = REQUEST_STATUS_PENDING;
				$request->status_designer = REQUEST_STATUS_PENDING;
				$request->status_admin = REQUEST_STATUS_PENDING;
			}
            if ($this->Requests->save($request)) :
                $file_object = $this->request->getData('file');
//                $this->uploadRequestCustomerFiles($request->customer_id, $request->id, $file_object);
                $this->uploadRequestFilesForUser($this->current_user->id, $request->id, $file_object);
				
                //$this->assignDesigner($request->id);
                $this->Flash->success(__('The request has been saved.'));
				


                $email_data = new \stdClass();
                $email_address = $this->Users->find()
                                        ->where(['id' => $designer_id])->first()->email;

                $email_data->to_email = $email_address;
                $email_data->subject = 'Welcome to Graphics Zoo!';
                $html = "";
                $html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
                            <img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
                        </div>
                        <div class="col-sm-12">
                            Welcome! We are excite to you have you join the Graphics Zoo family!
                        </div>
                        <div class="col-sm-12" style="margin-top:10px;">
                            Go ahead and get comfortable and start sending your design requests over. Our designers are eager to work on your requests. Just provide all the details you have and they will send you their best work. 
                        </div>
                        <div class="col-sm-12" style="margin-top:10px;">
                            If you have any questions or concerns, feel free to email us at hello@graphicszoo.com or call us at 888-976-2747.
                        </div>
                        <div class="col-sm-12" style="margin-top:10px;">
                            And then the content of the email will be as follows:
                        </div>';
                $email_data->template = $html;

                $this->sendMail($email_data);

                return $this->redirect(['controller' => 'Profiles', 'action' => 'dashboard']);
            endif;
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
//        $customers = $this->Requests->Customers->find('list', ['limit' => 200]);
//        $employees = $this->Requests->Employees->find('list', ['limit' => 200]);

        $this->set(compact('request', 'customers', 'employees'));
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
