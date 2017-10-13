<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class RequestDiscussionsController extends AppController {

    var $components = array("RequestHandler");

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'signup', 'resetPass', 'veryfication', 'logout']);
    }

    public function saveDiscussionData() {
//        $this->viewBuilder()->setLayout('ajax');
//        $this->autoRender = FALSE;
//        $this->viewBuilder()->setLayout('default');

        $status = 0;
        $message = '';
        $data = [];

        $this->viewBuilder()->setLayout('content_only');
        $request_id = $this->request->getData('request_id');
        $chat_message = $this->request->getData('chat_message');
        $current_user = $this->current_user;
        $conditions = [];

        $conditions[] = [
            'AND' => [
                'Requests.id' => $request_id
            ]
        ];

        $request = $this->Requests
                ->find()
                ->where($conditions)
                ->first();

        if ($request):
            $request_discussion = $this->RequestDiscussions->newEntity();
            $request_discussion->request_id = $request->id;
            $request_discussion->message = $chat_message;
            $request_discussion->status = MESSAGE_STATUS_UNREAD;
            if ($current_user->role == USER_CUSTOMER):
                $request_discussion->sender_id = $current_user->id;
                $request_discussion->sender_type = USER_CUSTOMER;
                $request_discussion->reciever_id = $request->designer_id;
                $request_discussion->reciever_type = USER_DESIGNER;
				$request_discussion->customer_seen = 1;
				$request_discussion->admin_seen = 0;
				$request_discussion->designer_seen = 1;
				$request_discussion->verified_by_admin = 1;
            else:
                $request_discussion->sender_id = $current_user->id;
                $request_discussion->sender_type = USER_DESIGNER;
                $request_discussion->reciever_id = $request->customer_id;
                $request_discussion->reciever_type = USER_CUSTOMER;
				$request_discussion->customer_seen = 1;
				$request_discussion->admin_seen = 0;
				$request_discussion->verified_by_admin = 1;
            endif;
			
			///mail code start
	$userdata = $this->Users
			->find()
			->where(['Users.id'=>"8"])
			->first();
		
	$requestdata = $this->Requests
						->find()
						->where(['Requests.id'=>$request->id])
						->first();
	$title = $requestdata->title;
	$to = $userdata->email;

	$email_data = new \stdClass();
	$email_data->to_email = $to;
	//$email_data->to_email = "devangfour@gmail.com";
	$email_data->subject = 'New Message Received from GraphicsZoo';
	$html = "";
	$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
				<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
			</div>
			<div class="col-sm-12" style="margin-top:10px;">
				You have new message received in '.$title.'
			</div>';
	$email_data->template = $html;
			
	$this->sendMail($email_data);
					
	///mail code end
	
            $result = $this->RequestDiscussions->save($request_discussion);
            if ($result):
                $status = 1;
                $message = 'Discussion saved successfully.';
                $data['request_id'] = $request->id;
                $data['sender_id'] = $request_discussion->sender_id;
                $data['sender_type'] = $request_discussion->sender_type;
                $data['reciever_id'] = $request_discussion->reciever_id;
                $data['reciever_type'] = $request_discussion->reciever_type;
            else:
                $status = 0;
                $message = 'Discussion not saved.';
            endif;
        else:
            $status = 0;
            $message = 'No requests found';
        endif;

        $response_array['status'] = $status;
        $response_array['message'] = $message;
        $response_array['data'] = $data;

        echo json_encode($response_array);
        exit;
    }

    public function saveAdminDiscussionData() {
//        $this->viewBuilder()->setLayout('ajax');
//        $this->autoRender = FALSE;
//        $this->viewBuilder()->setLayout('default');
		if(isset($_POST['adminsendto']))
		{			
			if($_POST['adminsendto']=='customer')
			{
				$this->viewBuilder()->setLayout('content_only');
				$request_id = $this->request->getData('request_id');
				$chat_message = $this->request->getData('chat_message');
				$current_user = $this->current_user;
				$conditions = [];
				$conditions[] = [
					'AND' => [	
					'Requests.id' => $request_id
				]];
				$request = $this->Requests
								->find()
								->where($conditions)
								->first();
				if ($request):
					$request_discussion = $this->RequestDiscussions->newEntity();
					$request_discussion->request_id = $request->id;
					$request_discussion->message = $chat_message;
					$request_discussion->status = MESSAGE_STATUS_UNREAD;
					$request_discussion->sender_id = $current_user->id;
					$request_discussion->sender_type = USER_ADMIN;
					$request_discussion->reciever_id = $request->customer_id;
					$request_discussion->reciever_type = USER_CUSTOMER;
					$request_discussion->verified_by_admin = 1;
					$request_discussion->customer_seen = 0;
					$request_discussion->admin_seen = 1;
					$request_discussion->designer_seen = 1;
					
					$result = $this->RequestDiscussions->save($request_discussion);
					if ($result):
						$status = 1;
						$message = 'Discussion saved successfully.';
						$data['request_id'] = $request->id;
						$data['sender_id'] = $request_discussion->sender_id;
						$data['sender_type'] = $request_discussion->sender_type;
						$data['reciever_id'] = $request_discussion->reciever_id;
						$data['reciever_type'] = $request_discussion->reciever_type;
					else:
						$status = 0;
						$message = 'Discussion not saved.';
					endif;
				else:
					$status = 0;
					$message = 'No requests found';
				endif;
				$response_array['status'] = $status;
				$response_array['message'] = $message;
				$response_array['data'] = $data;
								
		///mail code start
	$userdata = $this->Users
			->find()
			->where(['Users.id'=>$request->customer_id])
			->first();
		
	$requestdata = $this->Requests
						->find()
						->where(['Requests.id'=>$request->id])
						->first();
	$title = $requestdata->title;
	$to = $userdata->email;

	$email_data = new \stdClass();
	$email_data->to_email = $to;
	//$email_data->to_email = "devangfour@gmail.com";
	$email_data->subject = 'New Message Received from GraphicsZoo';
	$html = "";
	$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
				<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
			</div>
			<div class="col-sm-12" style="margin-top:10px;">
				You have new message received in '.$title.'
			</div>';
	$email_data->template = $html;
			
	$this->sendMail($email_data);
					
	///mail code end
	
				echo json_encode($response_array);
				exit;			
			}elseif($_POST['adminsendto']=='designer')
			{				 
				$request_id = $this->request->getData('request_id');
				$chat_message = $this->request->getData('chat_message');
				$current_user = $this->current_user;
				$conditions = [];				
				$conditions[] = [
					'AND' => [
					'Requests.id' => $request_id
				]];				
				$request = $this->Requests
								->find()	
								->where($conditions)	
								->first();	
				if ($request):	
					$request_discussion = $this->RequestDiscussions->newEntity();
					$request_discussion->request_id = $request->id;
					$request_discussion->message = $chat_message;
					$request_discussion->status = MESSAGE_STATUS_UNREAD;
					$request_discussion->sender_id = $current_user->id;
					$request_discussion->sender_type = USER_ADMIN;
					$request_discussion->reciever_id = $request->designer_id;
					$request_discussion->reciever_type = USER_DESIGNER;
					$request_discussion->verified_by_admin = "1";
					$request_discussion->customer_seen = 1;
					$request_discussion->admin_seen = 1;
					$request_discussion->designer_seen = 0;
					$result = $this->RequestDiscussions->save($request_discussion);
					if ($result):
						$status = 1;						
						$message = 'Discussion saved successfully.';
						$data['request_id'] = $request->id;	
						$data['sender_id'] = $request_discussion->sender_id;
						$data['sender_type'] = $request_discussion->sender_type;
						$data['reciever_id'] = $request_discussion->reciever_id;
						$data['reciever_type'] = $request_discussion->reciever_type;
					else:
						$status = 0;
						$message = 'Discussion not saved.';	
					endif;
				else:
					$status = 0;
					$message = 'No requests found';
				endif;
				$response_array['status'] = $status;
				$response_array['message'] = $message;
				$response_array['data'] = $data;
				
				///mail code start
	$userdata = $this->Users
			->find()
			->where(['Users.id'=>$request->customer_id])
			->first();
		
	$requestdata = $this->Requests
						->find()
						->where(['Requests.id'=>$request->id])
						->first();
	$title = $requestdata->title;
	$to = $userdata->email;

	$email_data = new \stdClass();
	$email_data->to_email = $to;
	//$email_data->to_email = "devangfour@gmail.com";
	$email_data->subject = 'New Message Received from GraphicsZoo';
	$html = "";
	$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
				<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
			</div>
			<div class="col-sm-12" style="margin-top:10px;">
				You have new message received in '.$title.'
			</div>';
	$email_data->template = $html;
			
	$this->sendMail($email_data);
					
	///mail code end
	
				echo json_encode($response_array);
				exit;
			}		
		}
        $status = 0;
        $message = '';
        $data = [];

        $this->viewBuilder()->setLayout('content_only');
        $request_id = $this->request->getData('request_id');
        $chat_message = $this->request->getData('chat_message');
        $current_user = $this->current_user;
        $conditions = [];

        $conditions[] = [
            'AND' => [
                'Requests.id' => $request_id
            ]
        ];

        $request = $this->Requests
                ->find()
                ->where($conditions)
                ->first();

        if ($request):
            $request_discussion = $this->RequestDiscussions->newEntity();
            $request_discussion->request_id = $request->id;
            $request_discussion->message = $chat_message;
            $request_discussion->status = MESSAGE_STATUS_UNREAD;
            $request_discussion->sender_id = $current_user->id;
            $request_discussion->sender_type = USER_ADMIN;
            $request_discussion->reciever_id = $request->customer_id;
            $request_discussion->reciever_type = USER_CUSTOMER;
			$request_discussion->customer_seen = 1;
			$request_discussion->admin_seen = 0;
			$request_discussion->designer_seen = 1;
			$request_discussion->verified_by_admin = 1;
            $result = $this->RequestDiscussions->save($request_discussion);
            if ($result):
                $status = 1;
                $message = 'Discussion saved successfully.';
                $data['request_id'] = $request->id;
                $data['sender_id'] = $request_discussion->sender_id;
                $data['sender_type'] = $request_discussion->sender_type;
                $data['reciever_id'] = $request_discussion->reciever_id;
                $data['reciever_type'] = $request_discussion->reciever_type;
            else:
                $status = 0;
                $message = 'Discussion not saved.';
            endif;
        else:
            $status = 0;
            $message = 'No requests found';
        endif;

        $response_array['status'] = $status;
        $response_array['message'] = $message;
        $response_array['data'] = $data;
		
		
		///mail code start
	$userdata = $this->Users
			->find()
			->where(['Users.id'=>$request->customer_id])
			->first();
		
	$requestdata = $this->Requests
						->find()
						->where(['Requests.id'=>$request->id])
						->first();
	$title = $requestdata->title;
	$to = $userdata->email;

	$email_data = new \stdClass();
	$email_data->to_email = $to;
	//$email_data->to_email = "devangfour@gmail.com";
	$email_data->subject = 'New Message Received from GraphicsZoo';
	$html = "";
	$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
				<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
			</div>
			<div class="col-sm-12" style="margin-top:10px;">
				You have new message received in '.$title.'
			</div>';
	$email_data->template = $html;
			
	$this->sendMail($email_data);
					
	///mail code end
	
	

        echo json_encode($response_array);
        exit;
    }

    public function getDiscussionHistory() {
        $this->viewBuilder()->setLayout('content_only');
        $conditions = [];
        $request_id = $this->request->getData('request_id');
        $conditions[] = [
            'AND' => [
                'Requests.id' => $request_id
            ]
        ];

        $request = $this->Requests
                ->find()
                ->where($conditions)
                ->first();
		$currentuser = $this->current_user;
       if ($request):		
			if($currentuser->id == 8){
				$discussion_history = $this->RequestDiscussions
											->find() 
											->where(['RequestDiscussions.request_id' => $request->id])
											->contain(['Senders', 'Recievers'])                                 
											->all();	
			}else{
				$discussion_history = $this->RequestDiscussions
											->find()
											->where(['RequestDiscussions.request_id' => $request->id])
											->contain(['Senders', 'Recievers'])
											->all();
			}
        endif;
        $this->set(compact('discussion_history','currentuser'));
    }

    public function getDiscussionHistoryForAdmin() {
        $this->viewBuilder()->setLayout('content_only');
        $conditions = [];
        $request_id = $this->request->getData('request_id');
        $conditions[] = [
            'AND' => [
                'Requests.id' => $request_id
            ]
        ];

        $request = $this->Requests
                ->find()
                ->where($conditions)
                ->first();
       $currentuser = $this->current_user;
		if ($request):		
			if($currentuser->id == 8){
				$discussion_history = $this->RequestDiscussions
											->find()
											->where(['RequestDiscussions.request_id' => $request->id])
											->contain(['Senders', 'Recievers'])             
											->all();		
			}else{
				$discussion_history = $this->RequestDiscussions                      
											->find()
											->where(['RequestDiscussions.request_id' => $request->id])
											->contain(['Senders', 'Recievers'])                                 
											->all();
			}		
        endif;
		
        $this->set(compact('discussion_history','currentuser'));
    }
	
	public function approveDiscussionData(){
		$this->viewBuilder()->setLayout('content_only');		
		$mydata['id'] = $_POST['id'];	
		$discussion_history = $this->RequestDiscussions
							->find()
							->where(['RequestDiscussions.id' => $_POST['id']])
							->first();
		

		if($discussion_history->sender_type=="customer")
		{
			$query = $this->RequestDiscussions->updateAll(array('verified_by_admin'=>'1','designer_seen'=>0),array('id' => $mydata['id']));
		}
		else
		{
			$query = $this->RequestDiscussions->updateAll(array('verified_by_admin'=>'1','customer_seen'=>0),array('id' => $mydata['id']));
		}
		
		$userdata = $this->Users
						->find()
						->where(['Users.id'=>$discussion_history->reciever_id])
						->first();
		
		$requestdata = $this->Requests
							->find()
							->where(['Requests.id'=>$discussion_history->request_id])
							->first();
		$title = $requestdata->title;
		$to = $userdata->email;
		
					$email_data = new \stdClass();
					$email_data->to_email = $to;
					//$email_data->to_email = "devangfour@gmail.com";
					$email_data->subject = 'New Message Received from GraphicsZoo';
					$html = "";
					$html.= '<div class="col-sm-4 col-sm-offset-4" style="text-align:center;">
								<img src="'.SITE_IMAGES_URL.'img/logo.png" height=50px;></img>
							</div>
							<div class="col-sm-12" style="margin-top:10px;">
								You have new message received in '.$title.'
							</div>';
                    $email_data->template = $html;
							
					$this->sendMail($email_data);
		
		if($query){
			$mydata['status'] = "1";
		}else{
			$mydata['status'] = "0";
		}
		echo json_encode($mydata);
        exit;
	}
	
	public function disapproveDiscussionData(){
		$this->viewBuilder()->setLayout('content_only');
		$mydata['id'] = $_POST['id'];
		$query = $this->RequestDiscussions->updateAll(array('verified_by_admin'=>'2'),array('id' => $mydata['id']));
		if($query){
			$mydata['status'] = "1";		
		}else{
			$mydata['status'] = "0";		
		}
		echo json_encode($mydata);
        exit;
	}

}
