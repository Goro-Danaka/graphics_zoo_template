<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[] paginate($object = null, array $settings = [])
 */
class RequestFilesController extends AppController {

    public function downloadFile($request_id, $file_name) {

        $filePath = REQUEST_IMG_PATH . $request_id . '/' . $file_name;
        $this->response->file($filePath, array('download' => true, 'name' => $file_name));
        return $this->response;

//        $filePath = REQUEST_IMG_PATH . $request_id . $file_name;
//        $this->response->file($filePath, array('download' => true, 'name' => $file_name));
//        return $this->response;
    }

    public function uploadFile() {
       // if ($this->request->is(['post', 'put'])):
            $file_object = $this->request->getData('file');
            $request_id = $this->request->getData('request_id');
			// print_r($file_object); print_r($request_id);
            if ($request_id):
			
					$conditions[] = [
						'AND' => [
							'Requests.id' => $request_id
						]
					];

					$requestdata = $this->Requests
							->find()
							->where($conditions)
							->first();
												
					
					$request_discussion = $this->RequestDiscussions->newEntity();							
					$request_discussion->request_id = $request_id;
					$request_discussion->sender_id = $this->current_user->id;
					$request_discussion->sender_type = "admin";
					$request_discussion->reciever_id = $requestdata->designer_id;
					$request_discussion->reciever_type = "designer";
					$request_discussion->message = $_POST['reason'];
					$request_discussion->verified_by_admin = "1";
					$request_discussion->status = "unread";
					$request_discussion->created = date("Y-m-d h:i:s");
					$request_discussion->modified = date("Y-m-d h:i:s");
					
					$this->RequestDiscussions->save($request_discussion);
					
					if($this->Requests->updateAll(array('status_admin'=>'active','modified'=>$date,'status_designer'=>'disapprove'),array('id' => $request_id)))
						{
							// $activerequest = $this->Requests
											// ->find('all', 
												// array(
													// 'order' => 'Requests.modified ASC'
											   // ))
											// ->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id])
											// ->first();	
							// if($this->Requests->updateAll(array('status'=>'active','status_admin'=>'active','modified'=>$date,'status_designer'=>'active','dateinprogress'=>date("Y-m-d h:i:s")),array('id' => $activerequest->id))){
									
							// }			
							$this->Flash->success(__('Design Disapprove Successfully.'));
							
						}else
						{
							$this->Flash->error(__('Design Approve Not Successfully..'));
						}
                // if ($this->uploadRequestFilesForUser2($this->current_user->id, $request_id, $file_object)):
							// $request = $this->Requests
								// ->find()
								// ->where(['Requests.id' => $requestid])
								// ->first();
								
							// $customer = $this->Customers
								// ->find()
								// ->where(['Customers.id' => $request->customer_id])
								// ->first();
							
							// $this->Requests->updateAll(array('status'=>'checkforapprove','status_admin'=>'pendingforapprove'),array('id' => $request_id));
							
							// $email_data = new \stdClass();
							// $email_data->to_email = $customer->email;
							// //$email_data->to_email = "devangfour@gmail.com";
							// $email_data->subject = 'Your Design is Ready for Review';
							// $html = "";
					// $html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
								// <img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
							// </div>
							// <div class="col-sm-12" style="margin-top:10px;">
								// Your design is ready for your review. Please click the button below to review your design or visit graphicszoo.com. If you want any changes, leave a comment for your designer and they will make all the adjustments as necessary.
							// </div>
							// <div class="col-sm-12" style="margin-top:10px;">
								// Remember, all revisions are completely free.
							// </div>
							// <div class="col-sm-12" style="margin-top:10px;text-align:center;">
								// <a href="'.Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE).'"><button style="font-size:14px;padding:10px;border-radius:5px; background:#337ab7;color:#fff;" class="btn btn-primary">Review</button></a>
							// </div>
							// <div class="col-sm-12"style="margin-top:10px;">
								// And then the content of the email will be as follows:
							// </div>';
                    // $email_data->template = $html;
							
							// $this->sendMail($email_data);
                    // $this->Flash->success(__('The request has been saved.'));
                // else:
                    // $this->Flash->error(__('The request could not be saved. Please, try again.'));
                // endif;
            endif;
       // endif;

        return $this->redirect($this->referer());
    }
	
	public function uploadFilesadmin(){
		 $file_object = $this->request->getData('file');
         $request_id = $this->request->getData('request_id');
		 
		 if($request_id){
			 $this->uploadRequestFilesForUser($this->current_user->id, $request_id, $file_object);
		 }
		 return $this->redirect($this->referer());
	}
	
	public function uploadFileDesigner() {
        if ($this->request->is(['post', 'put'])):
            $file_object = $this->request->getData('file');
            $request_id = $this->request->getData('request_id');
			// print_r($file_object); print_r($request_id);
            if ($request_id):
                if ($this->uploadRequestFilesForUser($this->current_user->id, $request_id, $file_object)):
							$request = $this->Requests
								->find()
								->where(['Requests.id' => $request_id])
								->first();
								
							$customer = $this->Customers
								->find()
								->where(['Customers.id' => $request->customer_id])
								->first();
							
							//$this->Requests->updateAll(array('status_designer'=>'pendingforapprove','status_admin'=>'checkforapprove','modified'=>date("Y-m-d h:i:s")),array('id' => $request_id));
							
							if($this->Requests->updateAll(array('status_designer'=>'pendingforapprove','status'=>'checkforapprove','status_admin'=>'pendingforapprove','modified'=>date("Y-m-d h:i:s")),array('id' => $request_id))){
										
										$disapproverequest = $this->Requests
						                                    ->find()
						                                    ->where(['Requests.status' => "disapprove",'Requests.customer_id' => $request->customer_id, 'designer_id' => 
						                                        $request->designer_id])
						                                    ->order(['Requests.created' => 'ASC'])
						                                    ->count();
						                $approverequest = $this->Requests
						                                ->find()
						                                ->where(['Requests.status' => "checkforapprove",'Requests.customer_id' => $request->customer_id, 'designer_id' => $request->designer_id])
						                                ->order(['Requests.created' => 'ASC'])
						                                ->count();
						                $activerequest = $this->Requests
						                                ->find()
						                                ->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id, 'designer_id' => $request->designer_id])
						                                ->order(['Requests.created' => 'ASC'])
						                                ->count();

										if($disapproverequest + $approverequest + $activerequest < 3 && $activerequest == 0){
											$assignrequest = $this->Requests
														->find()
														->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id])
														->order(['Requests.created' => 'ASC'])
														->first();
											$this->Requests->updateAll(array('status'=>'active','status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'status_designer'=>'active','dateinprogress'=>date("Y-m-d h:i:s")),array('id' => $assignrequest->id));
											//echo "1";
										}
							}
							
							$email_data = new \stdClass();
							$email_data->to_email = $customer->email;
							//$email_data->to_email = "devangfour@gmail.com";
							$email_data->subject = 'Your Design is Ready for Review';
							$html = "";
					$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
								<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								Your design is ready for your review. Please click the button below to review your design or visit graphicszoo.com. If you want any changes, leave a comment for your designer and they will make all the adjustments as necessary.
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								Remember, all revisions are completely free.
							</div>
							<div class="col-sm-12" style="margin-top:10px;text-align:center;">
								<a href="'.Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE).'"><button style="font-size:14px;padding:10px;border-radius:5px; background:#337ab7;color:#fff;" class="btn btn-primary">Review</button></a>
							</div>
							<div class="col-sm-12"style="margin-top:10px;">
								And then the content of the email will be as follows:
							</div>';
                    $email_data->template = $html;
							
							$this->sendMail($email_data);
                    $this->Flash->success(__('The request has been saved.'));
                else:
                    $this->Flash->error(__('The request could not be saved. Please, try again.'));
                endif;
            endif;
        endif;

        return $this->redirect($this->referer());
    }
	
	public function uploadFileCustomer() { 	
        if ($this->request->is(['post', 'put'])):
            $file_object = $this->request->getData('file');
            $request_id = $this->request->getData('request_id');

            if ($request_id):

                if ($this->uploadRequestFilesCustomer($this->current_user->id, $request_id, $file_object)):
                    $this->Flash->success(__('The File is upload successfully.'));
                else:
                    $this->Flash->error(__('The file not upload. Please, try again.'));
                endif;
            endif;
        endif;

        return $this->redirect($this->referer());
    }

    public function uploadFileTemp() { 	

        if ($this->request->is(['post', 'put'])):
            $file_object = $this->request->getData('file');
            $request_id = $this->request->getData('request_id');

            if ($request_id):

                if ($this->uploadRequestTempFiles($this->current_user->id, $request_id, $file_object)):
                    $this->Flash->success(__('The File is upload successfully.'));
                else:
                    $this->Flash->error(__('The file not upload. Please, try again.'));
                endif;
            endif;
        endif;
        
        return $this->redirect($this->referer());
    }
    
	
	public function uploadFileAdmin() {

		if ($this->request->is(['post', 'put'])):
            $file_object = $this->request->getData('file');
            $request_id = $this->request->getData('request_id');
			// print_r($file_object); print_r($request_id);
            if ($request_id):
                if ($this->uploadRequestFilesAdmin($this->current_user->id, $request_id, $file_object)):
							$request = $this->Requests
								->find()
								->where(['Requests.id' => $request_id])
								->first();
								
							$customer = $this->Customers
								->find()
								->where(['Customers.id' => $request->customer_id])
								->first();
							
							//$this->Requests->updateAll(array('status_designer'=>'pendingforapprove','status_admin'=>'checkforapprove','modified'=>date("Y-m-d h:i:s")),array('id' => $request_id));
							
							if($this->Requests->updateAll(array('status_designer'=>'pendingforapprove','status'=>'checkforapprove','status_admin'=>'pendingforapprove','modified'=>date("Y-m-d h:i:s")),array('id' => $request_id))){
										
										$disapproverequest = $this->Requests
						                                    ->find()
						                                    ->where(['Requests.status' => "disapprove",'Requests.customer_id' => $request->customer_id, 'designer_id' => 
						                                        $request->designer_id])
						                                    ->order(['Requests.created' => 'ASC'])
						                                    ->count();
						                $approverequest = $this->Requests
						                                ->find()
						                                ->where(['Requests.status' => "checkforapprove",'Requests.customer_id' => $request->customer_id, 'designer_id' => $request->designer_id])
						                                ->order(['Requests.created' => 'ASC'])
						                                ->count();
						                $activerequest = $this->Requests
						                                ->find()
						                                ->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id, 'designer_id' => $request->designer_id])
						                                ->order(['Requests.created' => 'ASC'])
						                                ->count();

										if($disapproverequest + $approverequest + $activerequest < 3 && $activerequest == 0){
											$assignrequest = $this->Requests
														->find()
														->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id])
														->order(['Requests.created' => 'ASC'])
														->first();

											if(isset($assignrequest))
											$this->Requests->updateAll(array('status'=>'active','status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'status_designer'=>'active','dateinprogress'=>date("Y-m-d h:i:s")),array('id' => $assignrequest->id));
											//echo "1";
										}
							}
							
							$email_data = new \stdClass();
							$email_data->to_email = $customer->email;
							//$email_data->to_email = "devangfour@gmail.com";
							$email_data->subject = 'Your Design is Ready for Review';
							$html = "";
					$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
								<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								Your design is ready for your review. Please click the button below to review your design or visit graphicszoo.com. If you want any changes, leave a comment for your designer and they will make all the adjustments as necessary.
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								Remember, all revisions are completely free.
							</div>
							<div class="col-sm-12" style="margin-top:10px;text-align:center;">
								<a href="'.Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE).'"><button style="font-size:14px;padding:10px;border-radius:5px; background:#337ab7;color:#fff;" class="btn btn-primary">Review</button></a>
							</div>
							<div class="col-sm-12"style="margin-top:10px;">
								And then the content of the email will be as follows:
							</div>';
                    $email_data->template = $html;
							
							$this->sendMail($email_data);
                    $this->Flash->success(__('The request has been saved.'));
                else:
                    $this->Flash->error(__('The request could not be saved. Please, try again.'));
                endif;
            endif;
        endif;
        return $this->redirect($this->referer());

    }
	
	public function sendusertoapprove(){
		 if ($this->request->is(['post', 'put'])):
            $file_object = $this->request->getData('file');
            $request_id = $this->request->getData('request_id');
			// print_r($file_object); print_r($request_id);
            if ($request_id):
                
							$request = $this->Requests
								->find()
								->where(['Requests.id' => $request_id])
								->first();
								
							$customer = $this->Customers
								->find()
								->where(['Customers.id' => $request->customer_id])
								->first();
							
							$this->Requests->updateAll(array('status'=>'checkforapprove','status_admin'=>'pendingforapprove','modified'=>date("Y-m-d h:i:s")),array('id' => $request_id));
							//echo 'sanjay';
							//exit;
							// $activerequest = $this->Requests
											// ->find()
											// ->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id])
											// ->order(['Requests.created' => 'ASC'])
											// ->first();
							// //print_r($activerequest); exit;
							// if(!$activerequest){
								// $assignrequest = $this->Requests
											// ->find()
											// ->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id])
											// ->order(['Requests.created' => 'ASC'])
											// ->first();
								// $this->Requests->updateAll(array('status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'status_designer'=>'active'),array('id' => $assignrequest->id));
								// //echo "1";
							// }
							//exit;
							$email_data = new \stdClass();
							$email_data->to_email = $customer->email;
							//$email_data->to_email = "devangfour@gmail.com";
							$email_data->subject = 'Your Design is Ready for Review';
							$html = "";
					$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
								<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								Your design is ready for your review. Please click the button below to review your design or visit graphicszoo.com. If you want any changes, leave a comment for your designer and they will make all the adjustments as necessary.
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								Remember, all revisions are completely free.
							</div>
							<div class="col-sm-12" style="margin-top:10px;text-align:center;">
								<a href="'.Router::url(['controller' => 'Pages', 'action' => 'index', 'prefix' => NULL], TRUE).'"><button style="font-size:14px;padding:10px;border-radius:5px; background:#337ab7;color:#fff;" class="btn btn-primary">Review</button></a>
							</div>
							<div class="col-sm-12"style="margin-top:10px;">
								And then the content of the email will be as follows:
							</div>';
                    $email_data->template = $html;
							
							$this->sendMail($email_data);
                    $this->Flash->success(__('The request has been saved.'));
                else:
                    $this->Flash->error(__('The request could not be saved. Please, try again.'));
                endif;
           
        endif;

        return $this->redirect($this->referer());
	}
	
	public function approve(){
		
		$requestid = $_POST['request_id'];
		$request = $this->Requests
                ->find()
                ->where(['Requests.id' => $requestid])
                ->first();

		$request_status = $_POST['request_status'];
		if ($requestid) {
					$designer_id = $_POST["designer_id"];
					//$request_id = $requestid;
					
					if($request_status == "pending" || $request_status == "running"){
						$this->Flash->error(__('Design is in Pending or is in Queue.'));
					}elseif($request_status == "active" || $request_status == "disapprove" || $request_status == "checkforapprove" ){
						$date = date('Y-m-d h:i:s');

						if($this->Requests->updateAll(array('status'=>'approved','status_admin'=>'approved','modified'=>$date,'status_designer'=>'approved'),array('id' => $requestid)))
						{
							//$this->Requests->updateAll(array('status'=>'active','modified'=>date("Y-m-d h:i:s")),array('customer_id' => $request->customer_id,'status_admin'=>'active'));

							$disapproverequest = $this->Requests
												->find()
												->where(['Requests.status' => "disapprove",'Requests.customer_id' => $request->customer_id,  'designer_id' => $designer_id])
												->order(['Requests.created' => 'ASC'])
												->count();
							$approverequest = $this->Requests
											->find()
											->where(['Requests.status' => "checkforapprove",'Requests.customer_id' => $request->customer_id,'designer_id' => $designer_id])
											->order(['Requests.created' => 'ASC'])
											->count();
							$activerequest = $this->Requests
											->find()
											->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id, 'designer_id' => $designer_id])
											->order(['Requests.created' => 'ASC'])
											->count();
							
			
							if($activerequest == 0 && $activerequest + $approverequest + $assignrequest < 3){
								$assignrequest = $this->Requests
											->find()
											->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id])
											->order(['Requests.created' => 'ASC'])
											->first();
								$this->Requests->updateAll(array('status'=>'active','status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'status_designer'=>'active','dateinprogress'=>date("Y-m-d h:i:s")),array('id' => $assignrequest->id));
								//echo "1";
							}
							
							
							$this->Flash->success(__('Design Approve Successfully.'));
							$this->RequestFiles->deleteAll(['id !=' => $_POST['file_id'], 'request_id' => $requestid]);
							
						}else
						{
							$this->Flash->error(__('Design Approve Not Successfully..'));
						}
					}
					
				}
		return $this->redirect($this->referer());
	}
	
	public function disapprove(){
		
		
		$requestid = $_POST['request_id'];
		$request_status = $_POST['request_status'];
		if ($requestid) {
			
					$conditions[] = [
						'AND' => [
							'Requests.id' => $requestid
						]
					];

					$requestdata = $this->Requests
							->find()
							->where($conditions)
							->first();
												
					
					$request_discussion = $this->RequestDiscussions->newEntity();							
					$request_discussion->request_id = $requestid;
					$request_discussion->sender_id = $this->current_user->id;
					$request_discussion->sender_type = "customer";
					$request_discussion->reciever_id = $requestdata->designer_id;
					$request_discussion->reciever_type = "designer";
					$request_discussion->message = $_POST['reason'];
					$request_discussion->verified_by_admin = "0";
					$request_discussion->status = "unread";
					$request_discussion->created = date("Y-m-d h:i:s");
					$request_discussion->modified = date("Y-m-d h:i:s");
					
					$this->RequestDiscussions->save($request_discussion);
					
					$designer_id = $_POST["designer_id"];
					//$request_id = $requestid;
					
					if($request_status == "pending"){
						$this->Flash->error(__('Design is in Pending.'));
					}elseif($request_status == "active" || $request_status == "checkforapprove"){
						if($this->Requests->updateAll(array('status'=>'disapprove','status_designer'=>'disapprove','status_admin'=>'disapprove','modified'=>date("Y-m-d h:i:s")),array('id' => $requestid)))
						{
							$this->Flash->success(__('Design Disapprove Successfully.'));
						}else
						{
							$this->Flash->error(__('Design Disapprove Not Successfully..'));
						}
					}
					
				}
		return $this->redirect($this->referer());
	}

}
