<?php

namespace App\Controller\Designer;

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

    public function allPendingRequest() {
        $requests = $this->Requests
                ->find()
				->contain(['Customers'])
                ->where(['Requests.status_designer IN' => array("active","disapprove")])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$inprogressrequest = $this->Requests
                ->find()
				->contain(['Customers'])
                ->where(['Requests.status_designer IN' => array("assign")])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$checkforapproverequests =  $this->Requests
                ->find()
				->contain(['Customers'])
                ->where(['Requests.status_designer IN' => array("pendingforapprove")])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all();
				
		$approvedrequest =   $this->Requests
                ->find()
				->contain(['Customers'])
                ->where(['Requests.status_designer IN' => array("approved")])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all();
		
		$requests1 = $this->Requests
                ->find()
				->contain(['Customers','Designers'])
                ->where(['Requests.designer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'ASC'])
                ->all()
				->toArray();
		//print_r($requested_designs1);
		$admin_unread_message_count_array=array();
		$total_unread_message = 0;
		$total_assign_message = 0;
		$total_checkforapprove_message = 0;
		$total_approved_message = 0;
		for($i=0;$i<sizeof($requests1);$i++)
		{
			//echo $requested_designs1[$i]->id;
			$admin_unread_msg_count = $this->RequestDiscussions
                ->find()
				->where(['RequestDiscussions.request_id' => $requests1[$i]->id])
				->andWhere(['RequestDiscussions.designer_seen' => 0])
				->andWhere(['RequestDiscussions.verified_by_admin' => 1])
                ->all()
				->toArray();
			$admin_unread_msg_count = sizeof($admin_unread_msg_count);
			$admin_unread_message_count_array[$requests1[$i]->id] = $admin_unread_msg_count;
			if($requests1[$i]->status_designer == "active" || $requests1[$i]->status_designer == "disapprove"){
				$total_unread_message += $admin_unread_msg_count;
			}elseif($requests1[$i]->status_designer == "assign"){
				$total_assign_message += $admin_unread_msg_count;
			}elseif($requests1[$i]->status_designer == "pendingforapprove"){
				$total_checkforapprove_message += $admin_unread_msg_count;
			}elseif($requests1[$i]->status_designer == "approved"){
				$total_approved_message += $admin_unread_msg_count;
			}
			
			
			
			
		}
		
		
        $this->set(compact('requests','admin_unread_message_count_array','total_unread_message','total_approved_message','total_checkforapprove_message','total_assign_message','approvedrequest','checkforapproverequests','inprogressrequest','turn_around_days_array'));
    }

    public function viewPendingRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->first();
        if (!$request):
            $this->Flash->error('This request not belongs to you.');
            return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
        endif;
		$this->RequestDiscussions->updateAll(array('designer_seen' => 1),array('request_id' => $request->id,'verified_by_admin'=>1));
         $request_customer_files = $this->RequestCustomerFiles
                ->find()
                ->where(['RequestCustomerFiles.request_id' => $request->id])
                ->andWhere(['RequestCustomerFiles.customer_id' => $request->customer_id])
                ->order(['RequestCustomerFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		// $request_files = $this->RequestFiles
                // ->find()
                // ->where(['RequestFiles.request_id' => $id])
                // ->andWhere(['RequestFiles.user_id' => $request->customer_id])
                // ->order(['RequestFiles.created' => 'ASC'])
                // ->all()
                // ->toArray();
		
		$request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $id])
                ->andWhere(['RequestFiles.user_type' => "customer"])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();

		$customer_additional_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $id])
                ->andWhere(['RequestFiles.user_type' => "customers"])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		$admin_request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $id])
                ->andWhere(['RequestFiles.user_type' => "admin"])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()                
                ->toArray();        

		$designer_request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $id])
                ->andWhere(['RequestFiles.user_type' => "designer"])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()                
				->toArray();		

        $this->set(compact('request', 'request_customer_files','request_files','admin_request_files','customer_additional_files','designer_request_files'));
    }

    public function allApprovedRequest() {
        $requests = $this->Requests
                ->find()
                ->where(['Requests.status' => "approved"])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->order(['Requests.created' => 'DESC'])
                ->all();
		$requests1 = $this->Requests
                ->find()
				->where(['Requests.status' => "approved"])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
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
				->andWhere(['RequestDiscussions.designer_seen' => 0])
				->andWhere(['RequestDiscussions.verified_by_admin' => 1])
                ->all()
				->toArray();
			$admin_unread_msg_count = sizeof($admin_unread_msg_count);
			$admin_unread_message_count_array[$requests1[$i]->id] = $admin_unread_msg_count;
			$total_unread_message += $admin_unread_msg_count;
		}
        $this->set(compact('requests','admin_unread_message_count_array','total_unread_message'));
    }

    public function viewApprovedRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->andWhere(['Requests.designer_id' => $this->current_user->id])
                ->first();
        if (!$request):
            $this->Flash->error('This request not belongs to you.');
            return $this->redirect(\Cake\Routing\Router::url($this->referer('/', TRUE), TRUE));
        endif;
        $request_customer_files = $this->RequestCustomerFiles
                ->find()
                ->where(['RequestCustomerFiles.request_id' => $request->id])
                ->andWhere(['RequestCustomerFiles.customer_id' => $request->customer_id])
                ->order(['RequestCustomerFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		$request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $id])
                ->andWhere(['RequestFiles.user_id' => $request->customer_id])
                ->order(['RequestFiles.created' => 'ASC'])
                ->all()
                ->toArray();
				
		$admin_request_files = $this->RequestFiles
                ->find()
                ->where(['RequestFiles.request_id' => $id])
                ->andWhere(['RequestFiles.user_id' => $this->current_user->id])
                ->order(['RequestFiles.created' => 'DESC'])
                ->all()
				->toArray();
        $this->set(compact('request', 'request_customer_files','request_files','admin_request_files'));
    }

    public function finishRequest($request_id) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();
        if ($request):
            $request->status = REQUEST_STATUS_FINISHED;
            $result = $this->Requests->save($request);
            if ($request):
                $this->Flash->success(__('Request is marked as finished successfully.'));
                return $this->redirect(['action' => 'dashboard']);
            else:
                $this->Flash->error(__('Request is not marked as finished.'));
            endif;
        else:
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        endif;
    }

}
