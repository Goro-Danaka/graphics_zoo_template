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
use Cake\Routing\Router;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'aboutus', 'portfolio', 'pricing', 'blog', 'faq', 'contactus', 'login', 'signup', 'posts', 'getPlanDetails', 'thankyou', 'privacyPolicy', 'termsAndConditions', 'getPostsAjax']);
    }

    public function display(...$path) {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index() {
        $this->viewBuilder()->setLayout('front_end');
        $portfolios = $this->Portfolios
                ->find()
                ->order(['Portfolios.created' => 'DESC'])
                ->contain(['PortfolioImages'])
                ->all();

        $posts = $this->Posts
                ->find()
                ->order(['Posts.created' => 'DESC'])
                ->limit(3)
                ->all();
        $body_class = 'home';
        $page_title = 'Home';
        $this->set(compact(['body_class', 'portfolios', 'posts', 'page_title']));
    }

    public function aboutus() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'About Us';
        $this->set(compact(['page_title']));
    }

    public function portfolio() {
        $this->viewBuilder()->setLayout('front_end');

        $portfolios = $this->Portfolios
                ->find()
                ->order(['Portfolios.created' => 'DESC'])
                ->contain(['PortfolioCategories', 'PortfolioImages'])
//                ->matching(
//                        'PortfolioImages', function ($q) {
//                    return $q->where(['PortfolioImages.image_type' => PORTFOLIO_FEATURED_IMAGE]);
//                })
                ->all();

//        die;

        $portfolio_categories = $this->PortfolioCategories
                ->find()
                ->order(['PortfolioCategories.name' => 'ASC'])
                ->all();

        $page_title = 'Portfolios';

        $this->set(compact(['portfolios', 'portfolio_categories', 'page_title']));
    }

    public function pricing() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'Pricing';
        $this->set(compact(['page_title']));
    }

    public function blog() {
        $this->viewBuilder()->setLayout('front_end');
        $posts = $this->Posts
                ->find()
                ->order(['Posts.created' => 'DESC'])
                ->limit(8)
                ->all();

        $page_title = 'Blog';
        $this->set(compact('posts', 'page_title'));
    }

    public function getPostsAjax() {
        $this->viewBuilder()->setLayout('content_only');

        $num_per_page = 8;
        $offset = 0;
        if ($this->request->getData('page_no')):
            $offset = ($this->request->getData('page_no') - 1) * $num_per_page;
        endif;

        $posts = $this->Posts
                ->find()
                ->order(['Posts.created' => 'DESC'])
                ->offset($offset)
                ->limit($num_per_page)
                ->all();
		// // print_r($posts); exit;
		// $data['myhtml'] = "";
		// $data['count'] = 0;
	// if ($posts):
// foreach ($posts as $k => $post): 
// //print_R($post);
// $class = ($k%2 == 0)? 'odd': 'even';	

// $data['count']++;
// $data['myhtml'] .= '<section class="blog-'.$class.'-section text-center">
	// <div class="container">
		// <div class="row">';
			// if($class=="odd"){
			// $data['myhtml'] .= '<div class="col-md-6 col-xs-12">
				// <div class="blog-post-image">					
					// <a class="thumbnail" href="'.Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE).'">';
							
							// $featured_image_url = "";
							// $featured_image_url = $this->Custom->getPostFeaturedImageUrlUsingObj($post);
							// if ($featured_image_url):
									// $data['myhtml'].=$this->Html->image($featured_image_url, ['width' => '600', 'height' => '401', 'class' => 'attachment-medium size-medium']);
							// endif;
							
				// $data['myhtml'] .=	'</a>
				// </div>
			// </div>
			// <div class="col-md-6 col-xs-12">
				// <div class="blog-post">
					// <h3 class="heading-secondary-red">
							// <a href="'.Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE).'">'.$post->title.'</a>
					// </h3>';	
					// //echo substr($post->body,0,100); 
					// $mybody = substr($post->body,0,100);	
							// $your_string_without_tags = strip_tags($post->body); 
							// $your_200_char_string = substr($your_string_without_tags, 0, 100); 
					
				// $data['myhtml'] .=	'<span>'.$your_200_char_string.'</span></br>			
					// <a class="blog-btn" href="'.Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE).'">Read More</a>
					
				// </div>
			// </div>';
			// } else if($class=='even'){
		// $data['myhtml'] .=	'<div class="col-md-6 col-xs-12">
				// <div class="blog-post">
					// <h3 class="heading-secondary-red">
						// <a href="'.Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE).'">'.$post->title.'</a>
					// </h3>';					 
							// //echo substr($post->body,0,100);
							// $mybody = substr($post->body,0,100);	
							// $your_string_without_tags = strip_tags($post->body); 
							// $your_200_char_string = substr($your_string_without_tags, 0, 100); 
							// //$mybody = htmlentities($mybody);
			// $data['myhtml'] .=	'<span>'.$your_200_char_string.'</span></br>				
					// <a class="blog-btn" href="'.Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE).'">Read More</a>
					
				// </div>
			// </div>
			// <div class="col-md-6 col-xs-12">
				// <div class="blog-post-image">					
					// <a class="thumbnail" href="'.Router::url(['controller' => 'Pages', 'action' => 'posts', $post->id, 'prefix' => FALSE], TRUE).'">';
							
							// $featured_image_url = '';
							// $featured_image_url = $this->Custom->getPostFeaturedImageUrlUsingObj($post);
							// if ($featured_image_url):
									// $data['myhtml'] .= $this->Html->image($featured_image_url, ['width' => '600', 'height' => '401', 'class' => 'attachment-medium size-medium']);
							// endif;
							
			// $data['myhtml'] .= '</a>
				// </div>
			// </div>';
			
			// }
			
		// $data['myhtml'] .= '</div>
	// </div>
// </section>';
// endforeach; 
// endif; 
// echo json_encode($data); exit;
        $this->set(compact('posts'));
    }

    public function faq() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'FAQ';
        $this->set(compact(['page_title']));
    }

    public function contactus() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'Contact Us';
        $this->set(compact(['page_title']));
    }

    public function login() {
        $this->viewBuilder()->setLayout('front_end_login');

        $loggedUser = $this->request->session()->read('Auth.User');
        if ($loggedUser):
            if ($loggedUser['role'] == USER_ADMIN):
                return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => FALSE], TRUE));
            elseif ($loggedUser['role'] == USER_MANAGER):
                return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'manager', 'plugin' => FALSE], TRUE));
            elseif ($loggedUser['role'] == USER_DESIGNER):
                return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'designer', 'plugin' => FALSE], TRUE));
            elseif ($loggedUser['role'] == USER_CUSTOMER):
                return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer', 'plugin' => FALSE], TRUE));
				
            endif;
        endif;


        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user):
                $this->Auth->setUser($user);
                if ($user['status'] == STATUS_ACTIVE):
                    if ($user['role'] == USER_ADMIN):
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'admin', 'plugin' => FALSE], TRUE));
                    elseif ($user['role'] == USER_MANAGER):
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'manager', 'plugin' => FALSE], TRUE));
                    elseif ($user['role'] == USER_DESIGNER):
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'designer', 'plugin' => FALSE], TRUE));
                    elseif ($user['role'] == USER_CUSTOMER):
                        return $this->redirect(Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer', 'plugin' => FALSE], TRUE));
						// return $this->redirect(Router::url(['controller' => 'Requests', 'action' => 'allRequests', 'prefix' => 'customer', 'plugin' => FALSE], TRUE));
                    endif;
                else:
                    $this->Flash->error("You currently Deacteted.");
                endif;
            else:
                $this->Flash->error("No user found.");
            endif;
        }
        $page_title = 'Login';
        $this->set(compact(['page_title']));
    }

    public function thankyou() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'Thank You';
        $plan_amount = $this->request->session()->read('plan_amount');
        $this->set(compact(['page_title', 'plan_amount']));
    }

    public function signup() {

        $selected_plan = '';
		//echo $this->Auth->password('123456');
		//$default_password_hasher = new DefaultPasswordHasher();
		//$default_password_hasher->check(123);
        $this->viewBuilder()->setLayout('front_end_login');

        if ($this->request->is(['PUT'])):
            $selected_plan = $this->request->getData('selected_subscrion_plan');
        endif;

        if ($this->request->is(['POST'])):
            if ($this->request->getData('first_name')):
                $customer = $this->Users->newEntity();
                $customer->first_name = $this->request->getData('first_name');
                $customer->last_name = $this->request->getData('last_name');
                $customer->email = $this->request->getData('email');
                $customer->password = $this->request->getData('password');
				//$customer->current_plan = $_POST['subscription_plans_id'];
                $customer->role = USER_CUSTOMER;

               
				//print_R($customer); exit;
                $stripe_controller = new StripesController();
                $stripe_customer = $stripe_controller->createCustomer($customer->email);

                if (!$stripe_customer['status']):
					
					$customer->current_plan = $stripe_customer['data']['customer_id'];
					 if (!$this->Users->save($customer)):
						$this->Flash->error('Customer cannot ne created.');
						$this->Flash->error($this->getModelErrorString($customer->errors()));
						return $this->redirect(Router::url(['controller' => 'Pages', 'action' => 'signup'], TRUE));
					endif;
					
					
                    $this->Users->delete($customer);
                    $this->Flash->error($stripe_customer['message']);
                    return $this->redirect($this->referer());
                endif;

                $customer_id = $stripe_customer['data']['customer_id'];
                $card_number = trim($this->request->getData('credit_card_number'));
                $expiry = explode('/', $this->request->getData('credit_card_expiry'));
                $expiry_month = $expiry[0];
                $expiry_year = $expiry[1];
                $cvc = $this->request->getData('credit_card_cvc');


                $stripe_card = $stripe_controller->createStripeCard($customer_id, $card_number, $expiry_month, $expiry_year, $cvc);

                if (!$stripe_card['status']):
                    $this->Users->delete($customer);
                    $this->Flash->error($stripe_card['message']);
                    return $this->redirect($this->referer());
                endif;

                $subscription_plan_id = $this->request->getData('subscription_plans_id');

                if ($subscription_plan_id):
                    $stripe_subscription = '';
                    switch ($subscription_plan_id):
                        case STRIPE_MONTH_SILVER_PLAN_ID:
                            $stripe_subscription = $stripe_controller->checkAndSubscribeMonthlySilverPlan($stripe_customer['data']['customer_id']);
                            break;
                        case STRIPE_MONTH_GOLDEN_PLAN_ID:
                            $stripe_subscription = $stripe_controller->checkAndSubscribeMonthlyGoldenPlan($stripe_customer['data']['customer_id']);
                            break;
                        case STRIPE_YEAR_SILVER_PLAN_ID:
                            $stripe_subscription = $stripe_controller->checkAndSubscribeYearlySilverPlan($stripe_customer['data']['customer_id']);
                            break;
                        case STRIPE_YEAR_GOLDEN_PLAN_ID:
                            $stripe_subscription = $stripe_controller->checkAndSubscribeYearlyGoldenPlan($stripe_customer['data']['customer_id']);
                            break;
                        default :
                            break;
                    endswitch;
                endif;
				//Add Plan to a customer
                if (!$stripe_subscription['status']):
                    $this->Users->delete($customer);
                    $this->Flash->error($stripe_subscription['message']);
                    return $this->redirect($this->referer());
                endif;

                $customer->stripe_customer_id = $stripe_customer['data']['customer_id'];
                $customer->subscription_plans_id = $stripe_subscription['data']['subscription_id'];
                $customer->stripe_card_id = $stripe_card['data']['card_id'];
                $is_customer_save = $this->Users->save($customer);
				  // $is_customer_save = "1";

                if ($is_customer_save):
                    $email_data = new \stdClass();
                    $email_data->to_email = $customer->email;
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
// exit;
                    $plan_amount = 0;

                    switch ($subscription_plan_id):
                        case STRIPE_MONTH_SILVER_PLAN_ID:
                            $plan_amount = STRIPE_MONTH_SILVER_PLAN_AMOUNT / 100;
                            break;
                        case STRIPE_MONTH_GOLDEN_PLAN_ID:
                            $plan_amount = STRIPE_MONTH_GOLDEN_PLAN_AMOUNT / 100;
                            break;
                        case STRIPE_YEAR_SILVER_PLAN_ID:
                            $plan_amount = STRIPE_YEAR_SILVER_PLAN_AMOUNT / 100;
                            break;
                        case STRIPE_YEAR_GOLDEN_PLAN_ID:
                            $plan_amount = STRIPE_YEAR_GOLDEN_PLAN_AMOUNT / 100;
                            break;
                        default :
                            break;
                    endswitch;

                    $this->request->session()->write('plan_amount', $plan_amount);

                   $this->Flash->success('User created successfully and subscribed successfully.');

                    $this->redirect(Router::url(['controller' => 'Pages', 'action' => 'thankyou'], TRUE));
                else:
                    $this->Flash->error('User cannot be created.');
                endif;


            endif;

        endif;

        //$subscription_plan_list = $this->getSubscriptionPlanList();
        $subscription_plan_list = $this->getSubscriptionPlanPrice();
		// print_r($subscription_plan_list); 
		
		$stripe_controller = new StripesController();
			
		$allplan =	$stripe_controller->getallsubscriptionlist();
		// print_r($allplan);
		
		$subscription = array();
		for($i=0;$i<sizeof($allplan);$i++){
			$subscription[$allplan[$i]['id']] = $allplan[$i]['name'] ." - $". $allplan[$i]['amount']/100 ."/". $allplan[$i]['interval']; 
		}
		$subscription_plan_list = $subscription;
		// print_r($subscription_plan_list); 
		// exit;
       
		

		
		
        $page_title = 'Sign Up';
        $this->set(compact(['page_title', 'selected_plan', 'subscription_plan_list']));
    }

    public function posts($id) {
        $this->viewBuilder()->setLayout('front_end');

        $post = $this->Posts
                ->find()
                ->where(['Posts.id' => $id])
                ->first();
        $page_title = 'Post';

        $this->set(compact(['post', 'page_title']));
    }

    // public function getPlanDetails() {
        // $this->viewBuilder()->setLayout('content_only');
        // $subscription_plans_id = $this->request->getData('subscription_plans_id');		
        // $this->set(compact('subscription_plans_id'));
    // }
	
	

    public function privacyPolicy() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'Privacy Policy';
        $this->set(compact(['page_title']));
    }

    public function termsAndConditions() {
        $this->viewBuilder()->setLayout('front_end');
        $page_title = 'Terms And Conditions';
        $this->set(compact(['page_title']));
    }

}
