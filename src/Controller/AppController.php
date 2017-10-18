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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Utility\Text;
use Cake\Mailer\Email;
use Cake\PHPMailer\PHPMailer;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $current_login_user;
    public $current_user;

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard',
                'prefix' => FALSE,
                'plugin' => FALSE
            ],
            'loginAction' => [
                'controller' => 'Pages',
                'action' => 'login',
                'prefix' => FALSE,
                'plugin' => FALSE
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'index',
                'prefix' => FALSE,
                'plugin' => FALSE
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ],
        ]);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        $this->loadModel('Users');
        $this->loadModel('Employees');
        $this->loadModel('Admins');
        $this->loadModel('Managers');
        $this->loadModel('Designers');
        $this->loadModel('Customers');
        $this->loadModel('Requests');
        $this->loadModel('RequestEmployeeFiles');
        $this->loadModel('RequestCustomerFiles');
        $this->loadModel('RequestDiscussions');
        $this->loadModel('RequestFiles');
        $this->loadModel('PortfolioCategories');
        $this->loadModel('Portfolios');
        $this->loadModel('Posts');
        $this->loadModel('PortfolioImages');
//        $this->loadModel('SubscriptionPlans');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {

        $this->loadModel('Users');

        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $current_user = '';

        $user_id = $this->request->session()->read('Auth.User.id');


        if (!empty($user_id)):
            $current_user = $this->Users
                    ->find()
                    ->where(['Users.id' => $user_id])
                    ->first();
        endif;

        $app_controller = new AppController();

        $this->set(compact('current_user', 'app_controller'));
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->current_user = $this->getCurrentLoginUserData();
        if (!$this->current_user):
            return $this->Auth->logout();
        endif;
    }

    public function getSubscriptionPlanLabel($subscription) {
        $subscription_label = '';
        switch ($subscription):
            case SUBSCRIPTION_PLAN_INACTIVE:
                $subscription_label = 'Inactive';
                break;
            case SUBSCRIPTION_PLAN_FREE:
                $subscription_label = 'Free';
                break;
            case SUBSCRIPTION_PLAN_TRIAL:
                $subscription_label = 'Trial';
                break;
            case SUBSCRIPTION_PLAN_ONE:
                $subscription_label = 'Plan One';
                break;
            case SUBSCRIPTION_PLAN_TWO:
                $subscription_label = 'Plan Two';
                break;
            default :
                break;
        endswitch;

        return $subscription_label;
    }

    public function getSubscriptionPlans() {

        $subscriptions = [
            SUBSCRIPTION_PLAN_INACTIVE => 'Inactive',
            SUBSCRIPTION_PLAN_FREE => 'Free',
            SUBSCRIPTION_PLAN_TRIAL => 'Trial',
            SUBSCRIPTION_PLAN_ONE => 'Plan One',
            SUBSCRIPTION_PLAN_TWO => 'Plan Two',
        ];

        return $subscriptions;
    }

    public function getEmployeeRolesList() {

        $roles = [
            'designer' => 'Designer',
            'manager' => 'Manager',
        ];


        return $roles;
    }

    public function getDesignerList() {

        $designers = $this->Designers->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'full_name',
//            'conditions' => ['Designers.role' => USER_DESIGNER]
                ])
                ->where(['Designers.role' => USER_DESIGNER]);
		
        return $designers;
    }

    public function getCustomerList() {

        $customers = $this->Customers->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'full_name',
//            'conditions' => ['Designers.role' => USER_DESIGNER]
                ])
                ->where(['Customers.role' => USER_CUSTOMER]);

        return $customers;
    }

    public function getCurrentLoginUserData() {
        $this->loadModel('Users');
        if (isset($this->Auth)):
            $login_user = $this->Auth->user();
            $current_login_user = $this->Users
                    ->find()
                    ->where(['Users.id' => $login_user['id']])
                    ->first();
        endif;
        return $current_login_user;
    }

    public function uploadManagerProfilePicture($manager_id, $img) {
//        $current_user = $this->Auth->user();
        $user = $this->Users->find()->where(['Users.id' => $manager_id])->first();
        if ($user):
            if ($img['name']):
                $file_name = $img['name'];
                $file_tmp = $img['tmp_name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = uniqid() . time() . $user->id . '.' . $file_ext;
                $dir = new Folder(USER_IMG_PATH, TRUE, 0777);
                $path = USER_IMG_PATH . $new_file_name;
                move_uploaded_file($file_tmp, $path);
                @ unlink(USER_IMG_PATH . $user->profile_picture);
                $user->profile_picture = $new_file_name;
                $this->Users->save($user);
            else:
                return "Profile image not set.";
            endif;
        else:
            return "Profile not found.";
        endif;
    }

    public function getPortfoliosCategoriesArray() {
        $portfolioCategories = $this->PortfolioCategories->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'name',
                ])->toArray();
//        $this->set(compact(['portfolioCategories']));
        return $portfolioCategories;
    }

    public function uploadPostsPicture($post_id, $img) {
//        $current_user = $this->Auth->user();
        $post = $this->Posts->find()->where(['Posts.id' => $post_id])->first();
        if ($post):
            if ($img['name']):
                $file_name = $img['name'];
                $file_tmp = $img['tmp_name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = uniqid() . time() . $post->id . '.' . $file_ext;
                $dir = new Folder(POST_IMAGE_PATH . $post->id, TRUE, 0777);
                $path = POST_IMAGE_PATH . $post->id . DS . $new_file_name;
                move_uploaded_file($file_tmp, $path);
                @ unlink(POST_IMAGE_PATH . $post->id . DS . $post->image);
                $post->image = $new_file_name;
                $this->Posts->save($post);
            else:
                return "Posts image not set.";
            endif;
        else:
            return "Posts not found.";
        endif;
    }

    public function uploadPortfoliosPicture($portfolio_id, $img) {

//        $current_user = $this->Auth->user();
        $portfolio = $this->Portfolios->find()->where(['Portfolios.id' => $portfolio_id])->first();
        if ($portfolio):
            if ($img['name']):
                $file_name = $img['name'];
                $file_tmp = $img['tmp_name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = uniqid() . time() . $portfolio->id . '.' . $file_ext;
                $dir = new Folder(PORTFOLIO_IMAGE_PATH . $portfolio->id, TRUE, 0777);
                $path = PORTFOLIO_IMAGE_PATH . $portfolio->id . DS . $new_file_name;
                move_uploaded_file($file_tmp, $path);
                @ unlink(PORTFOLIO_IMAGE_PATH . $portfolio->id . DS . $portfolio->image);
                $portfolioImage = $this->PortfolioImages->newEntity();
                $portfolioImage->image = $new_file_name;
                $portfolioImage->portfolio_id = $portfolio_id;
                $portfolioImage->image_type = PORTFOLIO_FEATURED_IMAGE;
                $this->PortfolioImages->save($portfolioImage);
            else:
                return "Portfolio image not set.";
            endif;
        else:
            return "Portfolio not found.";
        endif;
    }

    public function uploadEditedPortfoliosPicture($portfolio_id, $img) {

//        $current_user = $this->Auth->user();
        $portfolio = $this->PortfolioImages->find()->where(['PortfolioImages.portfolio_id' => $portfolio_id])->first();
        if ($portfolio):
            if ($img['name']):
                $file_name = $img['name'];
                $file_tmp = $img['tmp_name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = uniqid() . time() . $portfolio->id . '.' . $file_ext;
                $dir = new Folder(PORTFOLIO_IMAGE_PATH . $portfolio->id, TRUE, 0777);
                $path = PORTFOLIO_IMAGE_PATH . $portfolio->id . DS . $new_file_name;
                move_uploaded_file($file_tmp, $path);
                @ unlink(PORTFOLIO_IMAGE_PATH . $portfolio->id . DS . $portfolio->image);
                $portfolio->image = $new_file_name;
                $portfolio->portfolio_id = $portfolio_id;
                $portfolio->image_type = PORTFOLIO_FEATURED_IMAGE;
                $this->PortfolioImages->save($portfolio);
            else:
                return "Portfolio image not set.";
            endif;
        else:
            return "Portfolio not found.";
        endif;
    }

    public function uploadPortfolioGalleryPicture($portfolio_id, $img) {
//        $current_user = $this->Auth->user();
        $portfolio = $this->Portfolios->find()->where(['Portfolios.id' => $portfolio_id])->first();
        if ($portfolio):
            if ($img['name']):
                $file_name = $img['name'];
                $file_tmp = $img['tmp_name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = uniqid() . time() . $portfolio->id . '.' . $file_ext;
                $dir = new Folder(PORTFOLIO_IMAGE_PATH, TRUE, 0777);
                $path = PORTFOLIO_IMAGE_PATH . $new_file_name;
                move_uploaded_file($file_tmp, $path);
                @ unlink(PORTFOLIO_IMAGE_PATH . $portfolio->image);
                $portfolioImage = $this->PortfolioImages->newEntity();
                $portfolioImage->image = $new_file_name;
                $portfolioImage->portfolio_id = $portfolio->id;
                $portfolioImage->image_type = PORTFOLIO_GALLERY_IMAGES;
                $this->PortfolioImages->save($portfolioImage);
            else:
//                return "Portfolio image not set.";
            endif;
        else:
//            return "Portfolio not found.";
        endif;
    }

    public function uploadRequestCustomerFiles($customer_id, $request_id, $image_object) {
        $customer = $this->Customers
                ->find()
                ->where(['Customers.id' => $customer_id])
                ->first();

        if ($customer):
            if (!empty($image_object['name'])):
                $file_name = $image_object['name'];
                $file_tmp = $image_object['tmp_name'];

                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
                $dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
                $path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
                $file_move = move_uploaded_file($file_tmp, $path);
                if ($file_move):
                    $request_customer_file = $this->RequestCustomerFiles->newEntity();
                    $request_customer_file->request_id = $request_id;
                    $request_customer_file->customer_id = $customer_id;
                    $request_customer_file->file_name = $new_file_name;
                    $this->RequestCustomerFiles->save($request_customer_file);
                endif;
            endif;
        endif;
    }

    public function uploadRequestFilesForUser($user_id, $request_id, $image_object) {
        $status = 0;
        $user = $this->Users
                ->find()
                ->where(['Users.id' => $user_id])
                ->first();


        if ($user):
	
			for($i=0;$i<sizeof($image_object);$i++){
				if (!empty($image_object[$i]['name'])):
					$file_name = $image_object[$i]['name'];
					$file_tmp = $image_object[$i]['tmp_name'];

					$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
					$new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
					$dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
					$path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
					$file_move = move_uploaded_file($file_tmp, $path);
					if ($file_move):
						$request_file = $this->RequestFiles->newEntity();
						$request_file->request_id = $request_id;
						$request_file->user_id = $user->id;
						$request_file->user_type = $user->role;
						$request_file->file_name = $new_file_name;
                        
						if ($this->RequestFiles->save($request_file)):
							$status = 1;
						endif;
					endif;
				endif;
			}
        endif;

        return $status;
    }

    public function uploadRequestTempFiles($user_id, $request_id, $image_object) {
        $status = 0;
        $user = $this->Users
                ->find()
                ->where(['Users.id' => $user_id])
                ->first();

        if ($user):
           
            if (!empty($image_object['name'])):
                $file_name =$image_object['name'];
                $file_tmp = $image_object['tmp_name'];

                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
                $dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
                $path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
                    
                $file_move = move_uploaded_file($file_tmp, $path);
                if ($file_move):

                    $request_file = $this->RequestFiles->newEntity();
                    $request_file->request_id = $request_id;
                    $request_file->user_id = $user->id;
                    $request_file->user_type = "customer";
                    $request_file->file_name = $new_file_name;                        
                    $id = $this->RequestFiles->save($request_file);
                    if ($id):
                        header('Content-Type: application/json; charset=utf-8');
                        echo json_encode(array("path" => $new_file_name, "id" => $id->id));
                        exit;
                        $status = 1;
                    endif;
                endif;
            endif;

        endif;

        return $status;
    }
	
	public function uploadRequestFilesCustomer($user_id, $request_id, $image_object) {
        $status = 0;
        $user = $this->Users
                ->find()
                ->where(['Users.id' => $user_id])
                ->first();


        if ($user):
            
            foreach ($image_object as $i => $value) {
				if (!empty($value['name'])):
					$file_name =$value['name'];
					$file_tmp = $value['tmp_name'];

					$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
					$new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
					$dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
					$path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
                        
					$file_move = move_uploaded_file($file_tmp, $path);
					if ($file_move):

						$request_file = $this->RequestFiles->newEntity();
						$request_file->request_id = $request_id;
						$request_file->user_id = $user->id;
						$request_file->user_type = "customer";
						$request_file->file_name = $new_file_name;                        
						if ($this->RequestFiles->save($request_file)):
							$status = 1;
						endif;
					endif;
				endif;
			}
        endif;

        return $status;
    }
	
	public function uploadRequestFilesAdmin($user_id, $request_id, $image_object) {
        $status = 0;
        $user = $this->Users
                ->find()
                ->where(['Users.id' => $user_id])
                ->first();

        if ($user):			
			for($i=0;$i<sizeof($image_object);$i++){
				if (!empty($image_object[$i]['name'])):
					$file_name = $image_object[$i]['name'];
					$file_tmp = $image_object[$i]['tmp_name'];

					$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
					$new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
					$dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
					$path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
					$file_move = move_uploaded_file($file_tmp, $path);
					if ($file_move):
						$request_file = $this->RequestFiles->newEntity();
						$request_file->request_id = $request_id;
						$request_file->user_id = $user->id;
						$request_file->user_type = "admin";
						$request_file->file_name = $new_file_name;
						if ($this->RequestFiles->save($request_file)):
							$status = 1;
						endif;
					endif;
				endif;
			}
        endif;

        return $status;
    }
	
	 public function uploadRequestFilesForUser2($user_id, $request_id, $image_object) {
        $status = 0;
        $user = $this->Users
                ->find()
                ->where(['Users.id' => $user_id])
                ->first();


        if ($user):
			//print_r($image_object); exit;
			
			if (!empty($image_object['name'])):
				$file_name = $image_object['name'];
				$file_tmp = $image_object['tmp_name'];

				$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
				$new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
				$dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
				$path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
				$file_move = move_uploaded_file($file_tmp, $path);
				if ($file_move):
					$request_file = $this->RequestFiles->newEntity();
					$request_file->request_id = $request_id;
					$request_file->user_id = $user->id;
					$request_file->user_type = $user->role;
					$request_file->file_name = $new_file_name;
					if ($this->RequestFiles->save($request_file)):
						$status = 1;
					endif;
				endif;
			endif;
			
        endif;

        return $status;
    }

    public function uploadRequestFiles($request_id, $image_object) {

        if (!empty($image_object['name'])):
            $file_name = $image_object['name'];
            $file_tmp = $image_object['tmp_name'];

            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $new_file_name = md5(uniqid()) . time() . $request_id . '.' . $file_ext;
            $dir = new Folder(REQUEST_IMG_PATH . $request_id, TRUE, 0777);
            $path = REQUEST_IMG_PATH . $request_id . DS . $new_file_name;
            $file_move = move_uploaded_file($file_tmp, $path);
            if ($file_move):
                $request_file = $this->RequestCustomerFiles->newEntity();
                $request_file->request_id = $request_id;
                $request_file->customer_id = $customer_id;
                $request_file->file_name = $new_file_name;
                $this->RequestCustomerFiles->save($request_file);
            endif;
        endif;
    }

    public function getDesignerIdsOfManager($manager_id) {
        $designers = $this->Designers
                ->find()
                ->where(['Designers.manager_id' => $manager_id])
                ->all();

        $designer_ids = [];

        if ($designers):
            foreach ($designers as $designer):
                $designer_ids[] = $designer->id;
            endforeach;
        endif;

        return $designer_ids;
    }

    public function assignDesignerOld($request_id = NULL) {

        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();

        if (!$request):
            return;
        endif;

        $conditions = [];
        $conditions[] = [
            'AND' => [
                'Employees.role' => USER_DESIGNER
            ]
        ];

        $available_designers = $this->Employees
                ->find()
                ->where($conditions)
                ->contain(['Requests' => function ($q) {
                        return $q->where(['Requests.status NOT IN' => REQUEST_STATUS_COMPLETED]);
                    }])
                ->all();

        foreach ($available_designers as $designer):
            if (!$designer->requests):
                $request->employee_id = $designer->id;
                $request->status = REQUEST_STATUS_RUNNING;
                $this->Requests->save($request);
                exit;
            endif;
        endforeach;
    }

    public function assignDesigner($request_id = NULL) {

        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $request_id])
                ->first();

        if (!$request):
            return;
        endif;

        $customer = $this->getSingleCustomerData($request->customer_id);
		
        if ($customer):
            if ($customer->designer_id):
							// $activerequest = $this->Requests
											// ->find()
											// ->where(['Requests.status' => "active",'Requests.customer_id' => $request->customer_id])
											// ->order(['Requests.created' => 'ASC'])
											// ->first();
							// if(!$activerequest){
								// $assignrequest = $this->Requests
											// ->find()
											// ->where(['Requests.status' => "assign",'Requests.customer_id' => $request->customer_id])
											// ->order(['Requests.created' => 'ASC'])
											// ->first();
								// $this->Requests->updateAll(array('status'=>'active','status_admin'=>'active','modified'=>date("Y-m-d h:i:s"),'status_designer'=>'active'),array('id' => $assignrequest->id));
							// }
                $request->status = REQUEST_STATUS_RUNNING;
                $request->designer_id = $customer->designer_id;
				//print_r($request); exit;
                $this->Requests->save($request);
            endif;
        endif;
    }

    public function getDesignerOfCustomer() {
//        $this->viewBuilder()->setLayout('ajax');
//        $this->autoRender = FALSE;
        $designer_id = '';
        if ($this->request->getData('customer_id')):
            $customer_id = $this->request->getData('customer_id');
            $customer = $this->Customers
                    ->find()
                    ->where(['Customers.id' => $customer_id])
                    ->first();
            if ($customer):
                if ($customer->designer_id):
                    $designer_id = $customer->designer_id;
                endif;
            endif;
        endif;

        $this->set(compact('designer_id'));
        $this->set('_serialize', ['designer_id']);
    }

    public function getSingleCustomerData($customer_id) {
        $data = [];
        $customer = $this->Customers
                ->find()
                ->where(['Customers.id' => $customer_id])
                ->andWhere(['Customers.role' => USER_CUSTOMER])
                ->first();
				//echo USER_CUSTOMER; exit;
        if ($customer):
            $data = $customer;
        endif;
        return $data;
    }

    public function getFrontEndMenuClass($controller, $action) {
        $menu_class = '';
        if ($controller == 'PagesController'):
            $menu_class = '';
        endif;
    }

    public function getLimitedText($text) {
        $return_text = '';
        if ($text):
            $return_text = Text::truncate(
                            $text, POST_EXCERPT_TEXT_LIMIT, [
                        'ellipsis' => '...',
                        'exact' => false
                            ]
            );
        endif;
        return $return_text;
    }

    public function getLimitedWord($text) {
        $return_text = '';
        if ($text):
            $return_text = Text::truncate(
                            $text, POST_EXCERPT_WORD_LIMIT, [
                        'ellipsis' => '...',
                        'exact' => false
                            ]
            );
        endif;
        return $return_text;
    }

    public function getSubscriptionPlanList() {
        $subscription_plans = [];

        $subscription_plans[STRIPE_MONTH_SILVER_PLAN_ID] = STRIPE_MONTH_SILVER_PLAN_LABEL;
        $subscription_plans[STRIPE_MONTH_GOLDEN_PLAN_ID] = STRIPE_MONTH_GOLDEN_PLAN_LABEL;
        $subscription_plans[STRIPE_YEAR_SILVER_PLAN_ID] = STRIPE_YEAR_SILVER_PLAN_LABEL;
        $subscription_plans[STRIPE_YEAR_GOLDEN_PLAN_ID] = STRIPE_YEAR_GOLDEN_PLAN_LABEL;

        return $subscription_plans;
    }


    public function getSubscriptionPlanPrice() {
        $subscription_plans_price = [];

        $subscription_plans_price[STRIPE_MONTH_SILVER_PLAN_ID] = STRIPE_MONTH_SILVER_PLAN_LABEL.' - $'.STRIPE_MONTH_SILVER_PLAN_AMOUNT / 100 .'/month';
        $subscription_plans_price[STRIPE_MONTH_GOLDEN_PLAN_ID] = STRIPE_MONTH_GOLDEN_PLAN_LABEL.' - $'.STRIPE_MONTH_GOLDEN_PLAN_AMOUNT / 100 .'/month';
        $subscription_plans_price[STRIPE_YEAR_SILVER_PLAN_ID] = STRIPE_YEAR_SILVER_PLAN_LABEL.' - $'.STRIPE_YEAR_SILVER_PLAN_AMOUNT / 100 .'/year';
        $subscription_plans_price[STRIPE_YEAR_GOLDEN_PLAN_ID] = STRIPE_YEAR_GOLDEN_PLAN_LABEL.' - $'.STRIPE_YEAR_GOLDEN_PLAN_AMOUNT / 100 .'/year';

        return $subscription_plans_price;
    }


    public function getModelErrorString($model_error) {
        $return_error_message = '';
        $error_msg = [];
        foreach ($model_error as $field_key => $errors) {
            if (is_array($errors)) {
                foreach ($errors as $key => $error) {
                    $error_msg[] = $field_key . ' : ' . $error;
                }
            } else {
                $error_msg[] = $errors;
            }
        }

        if (!empty($error_msg)) {
            $return_error_message = implode("\n \r", $error_msg);
        }

        return $return_error_message;
    }

    public function sendMail($email_data) {
        $email_message = '';
        // try {
            // if (!empty($email_data) && !empty($email_data->to_email)){
                // $email = new Email();
                // $email->setFrom('graphicszoo@gmail.com', 'Graphics Zoo');
                // $email->setTo($email_data->to_email);
			   // // $email->setTo("devangfour@gmail.com");
                // $email->setEmailFormat('html');

                // if (@$email_data->template){
                    // $email->setTemplate($email_data->template);
				// }

                // if (@$email_data->view_vars){
                    // $email->setViewVars($email_data->view_vars);
				// }

                // if (@$email_data->subject){
                    // $email->setSubject($email_data->subject);
				// }

                // if (@$email_data->message){
                    // $email_message = $email_data->message;
				// }

                // if (@$email_message){
                    // $email->send($email_message);
					// echo 'in';
                // }else{
                    // $email->send();
                // }
				
				
				
				// exit;
            // }
        // } catch (\Exception $ex) {
            // echo $ex;
        // }

//$to = "devangfour@gmail.com";
$to = $email_data->to_email;
$subject = $email_data->subject;
$from = 'admin@graphicszoo.com';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$html = $email_data->template;      
      // Create email headers
      $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
  

        
      $retval = mail($to,$subject,$html,$headers);
      print_r($retval);
      if(mail($to, $subject, $html, $headers)){
            print_r( 'Your mail has been sent successfully.');
        } else{
            print_r( 'Unable to send email. Please try again.');
        }
    }

    public function testMail() {
        $email_data = new \stdClass();
        $email_data->to_email = 'cristan8075@outlook.com';
//        $email_data->message = 'hello';
        $email_data->subject = 'test suefewfewfewfefwefweegwgwegbject';
        $email_data->template = 'signup';
        $email_data->view_vars = ['hello' => '123', 'hello2' => '456'];

        $this->sendMail($email_data);
        //exit;
       // die;
    }

}
