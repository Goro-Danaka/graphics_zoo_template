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
use Cake\Event\Event;
use Exception;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Token;
use Stripe\Plan;
use Stripe\Card;
use Stripe\Subscription;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class StripesController extends AppController {

    protected $stripe;

    public function beforeFilter(Event $event) {
        require ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
        $this->stripe = new Stripe();
        $this->stripe->setApiKey(STRIPE_API_SECRET_KEY);
//        parent::beforeFilter($event);
    }

    public function createCustomer($customer_email) {
        require ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
        $stripe = new Stripe();
        $stripe->setApiKey(STRIPE_API_SECRET_KEY);
        $status = 0;
        $message = '';
        $data = [];
        try {
            $stripe_customer = new Customer();
            $customer_data = [];
//            $customer_data['email'] = 'abc@def.com';
            $customer_data['email'] = $customer_email;
            $customer = $stripe_customer->create($customer_data);
            if ($customer):
                $status = 1;
                $message = 'Customer created successfully.';
                $data['customer_id'] = $customer->id;
            else:
                $message = 'Customer cannot be created.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function createStripeCard($customer_id, $card_number, $expiry_month, $expiry_year, $cvc) {

        $status = 0;
        $message = '';
        $data = [];

        try {
            $stripe_token = new Token();
//            $stripe_token_data = [
//                "card" => [
//                    "number" => "4242424242424242",
//                    "exp_month" => 06,
//                    "exp_year" => 2018,
//                    "cvc" => "314"
//                ]
//            ];

            $stripe_token_data = [
                "card" => [
                    "number" => $card_number,
                    "exp_month" => $expiry_month,
                    "exp_year" => $expiry_year,
                    "cvc" => $cvc
                ]
            ];

            $stripe_token = $stripe_token->create($stripe_token_data);

//            $stripe_customer_id = 'cus_AtdxOMdvcnghr5';
            $stripe_customer_id = $customer_id;
            $customer = Customer::retrieve($stripe_customer_id);
            $card = $customer->sources->create(array("source" => $stripe_token->id));
            if ($card):
                $status = 1;
                $message = 'Card created successfully.';
                $data['card_id'] = $card->id;
            else:
                $message = 'Card cannot be created';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function isPlanExists($plan_id) {
        $status = 0;
        $message = '';
        $data = [];
        try {
            $plan_obj = new Plan();
            $plan = $plan_obj->retrieve($plan_id);
            if ($plan):
                $status = 1;
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }
        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function createMonthlySilverPlan() {
        $status = 0;
        $message = '';
        $data = [];

        try {
            $plan_obj = new Plan();
            $monthly_plan = $plan_obj->create(array(
                "name" => STRIPE_MONTH_SILVER_PLAN_LABEL,
                "id" => STRIPE_MONTH_SILVER_PLAN_ID,
                "interval" => "month",
                "currency" => "usd",
                "amount" => STRIPE_MONTH_SILVER_PLAN_AMOUNT,
                "trial_period_days" => STRIPE_MONTH_SILVER_PLAN_TRIAL_PERIOD
            ));

            if ($monthly_plan):
                $status = 1;
            else:
                $message = 'Plan cannot be created.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function createMonthlyGoldenPlan() {
        $status = 0;
        $message = '';
        $data = [];

        try {
            $plan_obj = new Plan();
            $monthly_plan = $plan_obj->create(array(
                "name" => STRIPE_MONTH_GOLDEN_PLAN_LABEL,
                "id" => STRIPE_MONTH_GOLDEN_PLAN_ID,
                "interval" => "month",
                "currency" => "usd",
                "amount" => STRIPE_MONTH_GOLDEN_PLAN_AMOUNT,
                "trial_period_days" => STRIPE_MONTH_GOLDEN_PLAN_TRIAL_PERIOD
            ));

            if ($monthly_plan):
                $status = 1;
            else:
                $message = 'Plan cannot be created.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function createYearlySilverPlan() {
        $status = 0;
        $message = '';
        $data = [];

        $plan_obj = new Plan();

        try {
            $yearly_plan = $plan_obj->create(array(
                "name" => STRIPE_YEAR_SILVER_PLAN_LABEL,
                "id" => A23883D,
                "interval" => "year",
                "currency" => "usd",
                "amount" => STRIPE_YEAR_SILVER_PLAN_AMOUNT,
                "trial_period_days" => STRIPE_YEAR_SILVER_PLAN_TRIAL_PERIOD
            ));

            if ($yearly_plan):
                $status = 1;
            else:
                $message = 'Plan cannot be created.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function createYearlyGoldenPlan() {
        $status = 0;
        $message = '';
        $data = [];

        $plan_obj = new Plan();

        try {
            $yearly_plan = $plan_obj->create(array(
                "name" => STRIPE_YEAR_GOLDEN_PLAN_LABEL,
                "id" => STRIPE_YEAR_GOLDEN_PLAN_ID,
                "interval" => "year",
                "currency" => "usd",
                "amount" => STRIPE_YEAR_GOLDEN_PLAN_AMOUNT,
                "trial_period_days" => STRIPE_YEAR_GOLDEN_PLAN_TRIAL_PERIOD
            ));

            if ($yearly_plan):
                $status = 1;
            else:
                $message = 'Plan cannot be created.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_array['status'] = $status;
        $return_array['message'] = $message;
        $return_array['data'] = $data;

        return $return_array;
    }

    public function checkAndSubscribeMonthlySilverPlan($customer_id) {
        $status = 0;
        $message = '';
        $data = [];

        $is_plan_exists = $this->isPlanExists(STRIPE_MONTH_SILVER_PLAN_ID);
        if (!$is_plan_exists['status']):
            $silver_plan = $this->createMonthlySilverPlan();
            if (!$silver_plan['status']):
                $message = $silver_plan['message'];
                $return_array['status'] = $status;
                $return_array['message'] = $message;
                $return_array['data'] = $data;
                return $return_array;
            endif;
        endif;

        try {
            $subscription_obj = new Subscription();
            $subscription = $subscription_obj->create([
                "customer" => $customer_id,
                "plan" => STRIPE_MONTH_SILVER_PLAN_ID
            ]);
            if ($subscription):
                $status = 1;
                $message = 'Plan subscribed successfully.';
                $data['subscription_id'] = $subscription->id;
            else:
                $message = 'Plan not subscribed.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_data['status'] = $status;
        $return_data['message'] = $message;
        $return_data['data'] = $data;

        return $return_data;
    }

    public function checkAndSubscribeMonthlyGoldenPlan($customer_id) {
        $status = 0;
        $message = '';
        $data = [];

        $is_plan_exists = $this->isPlanExists(STRIPE_MONTH_GOLDEN_PLAN_ID);
        if (!$is_plan_exists['status']):
            $golden_plan = $this->createMonthlyGoldenPlan();
            if (!$golden_plan['status']):
                $message = $golden_plan['message'];
                $return_array['status'] = $status;
                $return_array['message'] = $message;
                $return_array['data'] = $data;
                return $return_array;
            endif;
        endif;

        try {
            $subscription_obj = new Subscription();
            $subscription = $subscription_obj->create([
                "customer" => $customer_id,
                "plan" => STRIPE_MONTH_GOLDEN_PLAN_ID
            ]);
            if ($subscription):
                $status = 1;
                $message = 'Plan subscribed successfully.';
                $data['subscription_id'] = $subscription->id;
            else:
                $message = 'Plan not subscribed.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_data['status'] = $status;
        $return_data['message'] = $message;
        $return_data['data'] = $data;

        return $return_data;
    }

    public function checkAndSubscribeYearlySilverPlan($customer_id) {
        $status = 0;
        $message = '';
        $data = [];

        $is_plan_exists = $this->isPlanExists(STRIPE_YEAR_SILVER_PLAN_ID);
        if (!$is_plan_exists['status']):
            $silver_plan = $this->createYearlySilverPlan();
            if (!$silver_plan['status']):
                $message = $silver_plan['message'];
                $return_array['status'] = $status;
                $return_array['message'] = $message;
                $return_array['data'] = $data;
                return $return_array;
            endif;
        endif;

        try {
            $subscription_obj = new Subscription();
            $subscription = $subscription_obj->create([
                "customer" => $customer_id,
                "plan" => STRIPE_YEAR_SILVER_PLAN_ID
            ]);
            if ($subscription):
                $status = 1;
                $message = 'Plan subscribed successfully.';
                $data['subscription_id'] = $subscription->id;
            else:
                $message = 'Plan not subscribed.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_data['status'] = $status;
        $return_data['message'] = $message;
        $return_data['data'] = $data;

        return $return_data;
    }

    public function checkAndSubscribeYearlyGoldenPlan($customer_id) {
        $status = 0;
        $message = '';
        $data = [];

        $is_plan_exists = $this->isPlanExists(STRIPE_YEAR_GOLDEN_PLAN_ID);
        if (!$is_plan_exists['status']):
            $silver_plan = $this->createYearlyGoldenPlan();
            if (!$silver_plan['status']):
                $message = $silver_plan['message'];
                $return_array['status'] = $status;
                $return_array['message'] = $message;
                $return_array['data'] = $data;
                return $return_array;
            endif;
        endif;

        try {
            $subscription_obj = new Subscription();
            $subscription = $subscription_obj->create([
                "customer" => $customer_id,
                "plan" => STRIPE_YEAR_GOLDEN_PLAN_ID
            ]);
            if ($subscription):
                $status = 1;
                $message = 'Plan subscribed successfully.';
                $data['subscription_id'] = $subscription->id;
            else:
                $message = 'Plan not subscribed.';
            endif;
        } catch (Exception $ex) {
            $message = $ex->getMessage();
        }

        $return_data['status'] = $status;
        $return_data['message'] = $message;
        $return_data['data'] = $data;

        return $return_data;
    }

    public function updateStripeCard() {
        try {
            $stripe_customer_id = 'cus_AtdxOMdvcnghr5';
            $customer = Customer::retrieve($stripe_customer_id);
            $card = $customer->sources->retrieve($card_id);
            $card->name = 'test';
            $card->save();
        } catch (Exception $ex) {
            
        }
    }

    public function deleteStripeCard() {
        try {
            $stripe_customer_id = 'cus_AtdxOMdvcnghr5';
            $customer = Customer::retrieve($stripe_customer_id);
            $card = $customer->sources->retrieve($card_id)->delete();
        } catch (Exception $ex) {
            
        }
    }

    public function getAllStripeCard() {

        try {

            $stripe_customer = new Customer();
            $stripe_customer_id = 'cus_AtdxOMdvcnghr5';
            $all_stripe_cards = $stripe_customer->retrieve($stripe_customer_id)->sources->all(array(
                "object" => "card"
            ));
        } catch (Exception $ex) {
            
        }
        die;
    }

    public function changeDefaultStripeCard() {

        try {

            $customer->default_source = $is_card_save->id;
            $customer->save();

            $stripe_customer = new Customer();
            $stripe_customer_id = 'cus_AtdxOMdvcnghr5';
            $all_stripe_cards = $stripe_customer->retrieve($stripe_customer_id)->sources->all(array(
                "object" => "card"
            ));
        } catch (Exception $ex) {
            
        }
        die;
    }

    public function createPlans() {

        $monthly_plan = $plan_obj->create(array(
            "name" => STRIPE_MONTH_PLAN_LABEL,
            "id" => STRIPE_MONTH_PLAN_ID,
            "interval" => "month",
            "currency" => "usd",
            "amount" => STRIPE_MONTH_PLAN_AMOUNT,
            "trial_period_days" => STRIPE_MONTH_PLAN_TRIAL_PERIOD
        ));

        $yearly_plan = $plan_obj->create(array(
            "name" => STRIPE_YEAR_PLAN_LABEL,
            "id" => STRIPE_YEAR_PLAN_ID,
            "interval" => "year",
            "currency" => "usd",
            "amount" => STRIPE_YEAR_PLAN_AMOUNT,
            "trial_period_days" => STRIPE_YEAR_PLAN_TRIAL_PERIOD
        ));
    }
	
	public function createmyPlans($id,$name,$amount,$currency,$interval,$trial_period_days,$turn_around_days) {
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		$params = array(
            "name" => $name,
            "id" => $id,
            "interval" => $interval,
            "currency" => "usd",
            "amount" => $amount,
            "trial_period_days" => $trial_period_days
        );
		$params["metadata"]["turn_around_days"] = $turn_around_days;
		$plan_obj = new Plan();
		$monthly_plan = $plan_obj->create($params);
		
		return $monthly_plan;
		
    }

    public function subscribePlan() {
        $subscription_obj = new Subscription();
        try {
            $subscription = $subscription_obj->create([
                "customer" => "cus_B4Nike6LBg229c",
                "plan" => STRIPE_YEAR_PLAN_ID
            ]);
        } catch (Exception $ex) {
            
        }
    }
	
	public function getallsubscriptionlist(){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		//$subscription = new Subscription();
		//$getsubscriptionlist =  $subscription->all();
		//return $getsubscriptionlist;
		$plan = new Plan();
		$getplanlist =  $plan->all();
		
		$i=0;
		foreach ($getplanlist['data'] as $plan) {
			
			$allplan[$i]['id'] = $plan['id'];
			$allplan[$i]['amount'] = $plan['amount'];
			$allplan[$i]['interval'] = $plan['interval'];
			$allplan[$i]['name'] = $plan['name'];
			$allplan[$i]['trial_period_days'] = $plan['trial_period_days'];
			$i++;
			
		}
		return $allplan;
	}
	
	public function retrieveoneplan($id){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		//$subscription = new Subscription();
		//$getsubscriptionlist =  $subscription->all();
		//return $getsubscriptionlist;
		$plan = new Plan();
		$getplanlist =  $plan->retrieve($id);
		return $getplanlist;
	}
	
	public function updateplan($id,$params){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		//$subscription = new Subscription();
		//$getsubscriptionlist =  $subscription->all();
		//return $getsubscriptionlist;
		$plan = new Plan();
		$getplanlist =  $plan->retrieve($id);
		$getplanlist->name = $params['name'];
		$getplanlist->id = $id;
		// $getplanlist->amount = $params['amount'];
		// $getplanlist->interval = $params['interval'];
		$getplanlist->trial_period_days = $params['trial_period_days'];
		$getplanlist->metadata = array('turn_around_days'=>$_POST['turn_around_days']);
		$getplanlist->save();
		return $getplanlist;
	}
	
	public function deleteplan($id){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		$plan = new Plan();
		$getplanlist =  $plan->retrieve($id);
		$getplanlist->delete();
		return $getplanlist;
	}
	
	public function getcurrentplan($id){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		$subscription = new Subscription();
		$currentplan =  $subscription->retrieve($id);
		
		return $currentplan;
	}
	
	public function updateuserplan($id,$planid){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		try{
			$subscription = new Subscription();
			$currentplan =  $subscription->retrieve($id);
			// echo '<pre>';
			// print_R($currentplan->items->data[0]->plan); echo '</pre>'; exit;
			$currentplan->plan = $planid;
			$currentplan->save();
		 } catch (Exception $ex) {
            $message = $ex->getMessage();
			$data[0] = "error";
			$data[1] = $message;
			return $data;
        }
		
		$data[0] = "success";
		$data[1] = "Plan Update Succsessfully !!";
		return $data;
	}
	
	public function getcustomerdetail($id){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		$subscription = new Subscription();
		$currentplan =  $subscription->retrieve($id);
		$customer = new Customer();
		$customerdata = $customer->retrieve($currentplan->customer);
		return $customerdata;
	}
	
	public function updatecard($id,$params){
		require_once ROOT . DS . 'vendor' . DS . 'stripe-php-4.13.0' . DS . 'init.php';
		//echo '<pre>'; print_r($params); echo '</pre>'; exit;
		
		try{
			$expiry = explode('/', $params['exp_month']);
			$expiry_month = $expiry[0];
			$expiry_year = $expiry[1];
			
			$customer = new Customer();
			$customerdata = $customer->retrieve($id);
			//echo $customerdata->sources->data[0]->id;
			//echo '<pre>'; print_r($customerdata);echo $id; echo '</pre>'; exit;
			
			
			$stripe_token_data = [
				"card" => [
					"number" => $params['last4'],
					"exp_month" => $expiry_month,
					"exp_year" => $expiry_year,
					"cvc" => $params['cvc']
				]
			];
			$stripe_token = new Token();
			$stripe_token = $stripe_token->create($stripe_token_data);
			
			if($customerdata->id){
				//echo "available";
				
			/*	$card = $customerdata->sources->retrieve($customerdata->sources->data[0]->id);
				$card->exp_month = $expiry_month;
				$card->exp_year = $expiry_year;
				$card->save();
				*/
				$new_card = $customerdata->sources->create(array("source" => $stripe_token->id));
				$customerdata->default_source = $new_card->id;
				$customerdata->save();
				if ($customerdata):
					$data[0] = "success";
					$data[1] = "Card Updated Succsessfully !!";
					return $data;
				else:
					print_r($card); exit;
					$message = 'Card cannot be created';
				endif;
			}else{
				

	//            $stripe_customer_id = 'cus_AtdxOMdvcnghr5';
			   
				$card = $customerdata->sources->create(array("source" => $stripe_token->id));
				if ($card):
					$status = 1;
					$message = 'Card created successfully.';
					$data['card_id'] = $card->id;
				else:
					$message = 'Card cannot be created';
				endif;
			}
		// echo '<pre>'; print_r($customerdata); echo '</pre>';  exit;
		 } catch (Exception $ex) {
            $message = $ex->getMessage();
			$data[0] = "error";
			$data[1] = $message;
			return $data;
        }
		
		$data[0] = "success";
		$data[1] = "Card Create Succsessfully !!";
		return $data;
	}

}
