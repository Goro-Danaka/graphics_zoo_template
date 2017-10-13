<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Phinx\Migration\AbstractMigration;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Phinx\Db\Table;
use App\Controller\StripesController;
use StripPlan;
/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class SubscriptionsController extends AppController {

    public function index() {
        $portfolios = $this->Portfolios
                ->find()
                ->contain(['PortfolioImages', 'PortfolioCategories'])
//                ->where(['PortfolioImages.image_type' => 'featured'])
                ->all();

        $portfolioImages = $this->PortfolioImages
                ->find()
                ->where(['PortfolioImages.image_type' => 'featured'])
                ->all();
        $featuredImage = [];
        foreach ($portfolioImages as $portfolioImage):
            $featuredImage[] = $portfolioImage->image;
        endforeach;

        $this->set(compact(['portfolios', 'featuredImage']));
    }

    public function add() {

        $Portfolio = $this->Portfolios->newEntity();
        if ($this->request->is('post')) {

            $Portfolio->title = $this->request->getData('title');
            $Portfolio->body = $this->request->getData('body');
            $Portfolio->potfolio_category_id = $this->request->getData('potfolio_category_id');
            if ($this->Portfolios->save($Portfolio)):

                if ($this->request->getData('featured_image')):

                    if (
                            $this->request->getData('featured_image')['type'] == 'image/jpeg' ||
                            $this->request->getData('featured_image')['type'] == 'image/png' ||
                            $this->request->getData('featured_image')['type'] == 'image/gif'
                    ):
                        $this->uploadPortfoliosPicture($Portfolio->id, $this->request->getData('featured_image'));
                        $this->Flash->success(__('The portfolio has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    else:
                        $this->Flash->error(__('The portfolio accept only " JPEG, PNG and GIF image"'));
                    endif;
                endif;

//                if ($this->request->getData('gallery_images')):
//                    foreach ($this->request->getData('gallery_images') as $galleryImage):
//                        $this->uploadPortfolioGalleryPicture($Portfolio->id, $galleryImage);
//                    endforeach;
//                endif;
            else:
                $this->Flash->error(__('The portfolio has been saved.'));
            endif;
        }

        $portfoliosCategories = $this->getPortfoliosCategoriesArray();
        $this->set(compact(['portfoliosCategories']));
    }

    public function allCategories() {
		
        $portfolioCategories = $this->Subscriptions
                ->find()
                ->all();
		$stripe_controller = new StripesController();

		$allplan =	$stripe_controller->getallsubscriptionlist();
		
		
        $this->set(compact(['portfolioCategories','allplan']));
		
    }

    public function addCategories() {
        $PortfolioCategory = $this->PortfolioCategories->newEntity();
        if ($this->request->is('post')) {
			//print_r($_POST); exit;
			
			$id = $_POST['id'];
			$name = $_POST['name'];
			$amount = $_POST['amount'] * 100;
			$currency = $_POST['currency'];
			$interval = $_POST['interval'];
			$trial_period_days = $_POST['trial_period_days'];
			$turn_around_days = $_POST['turn_around_days'];
			//$data->description = $_POST['description'];
			//print_r($data); exit;
			//$PortfolioCategory = $this->Posts->patchEntity($PortfolioCategory, $this->request->getData());
			//print_r($PortfolioCategory); exit;
			$params = array(
				"name" => $name,
				"id" => $id,
				"interval" => $interval,
				"currency" => "usd",
				"amount" => $amount,
				"trial_period_days" => $trial_period_days
			);
			$params["metadata"]["turn_around_days"] = $turn_around_days;
			//echo json_encode($params);
			//print_r($params); exit;
			$stripe_controller = new StripesController();
			//$monthly_plan = $plan_obj->create($params);
			if($stripe_controller->createmyPlans($id,$name,$amount,$currency,$interval,$trial_period_days,$turn_around_days)){
				$this->Flash->success(__('The Subscription has been saved.'));
                return $this->redirect(['action' => 'allCategories']);
			}else{
				$this->Flash->error(__('The Subscription has been saved.'));
			}
			//print_r($PortfolioCategory); exit;
            // $PortfolioCategory = $this->Posts->patchEntity($PortfolioCategory, $this->request->getData());
            // if ($this->PortfolioCategories->save($PortfolioCategory)):
                // $this->Flash->success(__('The portfolio has been saved.'));
                // return $this->redirect(['action' => 'allCategories']);
            // else:
                // $this->Flash->error(__('The portfolio has been saved.'));
            // endif;
			
			 // if ($this->Subscriptions->save($PortfolioCategory)):
                // $this->Flash->success(__('The Subscription has been saved.'));
                // return $this->redirect(['action' => 'allCategories']);
            // else:
                // $this->Flash->error(__('The Subscription has been saved.'));
            // endif;
        }
    }

    public function editCategory($id) {
		
        $portfolioCategory = $this->Subscriptions
                ->find()
                ->where(['Subscriptions.id' => $id])
                ->first();
		
		// $portfolioCategory = $this->PortfolioCategories
                // ->find('all');	
		// $mytable = new Table();		
		// $table = $mytable->table(PortfolioCategories);
        // $table->addColumn('price', 'string')
              // ->update();
		// $table = $this->PortfolioCategories('subscriptions');
        // $table->addColumn('description', 'string', [
            // 'default' => null,
            // 'limit' => 500,
            // 'null' => false,
        // ])->update();
		
        if ($this->request->is(['post', 'put'])):
            $params = array(
				"name" => $_POST['name'],
				"id" => $_POST['id'],
				"interval" => $_POST['interval'],
				"currency" => "usd",
				"amount" => $_POST['amount'],
				"trial_period_days" => $_POST['trial_period_days']
			);
			$params["metadata"]["turn_around_days"] = $_POST['turn_around_days'];
			
			$stripe_controller = new StripesController();
			//$monthly_plan = $plan_obj->create($params);
			if($stripe_controller->updateplan($id,$params)){
				$this->Flash->success(__('The Subscription has been updated.'));
                return $this->redirect(['action' => 'allCategories']);
			}else{
				$this->Flash->error(__('The Subscription has been updated.'));
			}
        endif;
		$stripe_controller = new StripesController();
			
		$monthly_plan =	$stripe_controller->retrieveoneplan($id);
		
		//print_r($monthly_plan);	
		$portfolioCategory->id = $monthly_plan['id'];
		$portfolioCategory->amount = $monthly_plan['amount']/100;
		$portfolioCategory->interval = $monthly_plan['interval'];
		$portfolioCategory->name = $monthly_plan['name'];
		$portfolioCategory->trial_period_days = $monthly_plan['trial_period_days'];
		$portfolioCategory->turn_around_days = $monthly_plan['metadata']->turn_around_days;
		
        $this->set(compact(['portfolioCategory']));
    }

    public function viewPortfolioImage($id) {
        $portfolioImages = $this->PortfolioImages
                ->find()
                ->where(['PortfolioImages.portfolio_id' => $id])
                ->andWhere(['PortfolioImages.image_type' => PORTFOLIO_GALLERY_IMAGES])
                ->all();
        $this->set(compact(['portfolioImages']));
    }

    public function deletePortfolioImages($id) {

        $deletePortfolio = $this->Subscriptions
                ->find()
                ->where(['Portfolios.id  ' => $id])
                ->first();
        if ($deletePortfolio):
				$id = $deletePortfolio->id;
				$this->Model->delete($id);
        endif;
    }

    public function editPortfolio($id) {
        $portfolio = $this->Portfolios
                ->find()
                ->where(['Portfolios.id' => $id])
                ->contain(['PortfolioImages'])
                ->first();
        if ($this->request->is(['post', 'put'])):
            $portfolio = $this->Portfolios->patchEntity($portfolio, $this->request->getData());
            if ($this->Portfolios->save($portfolio)) {
                if ($this->request->getData('featured_image')):
                    if (
                            $this->request->getData('featured_image')['type'] == 'image/jpeg' ||
                            $this->request->getData('featured_image')['type'] == 'image/png' ||
                            $this->request->getData('featured_image')['type'] == 'image/gif'
                    ):
//                        $this->uploadEditedPortfoliosPicture($portfolio->id, $this->request->getData('featured_image'));
                        $this->uploadPortfoliosPicture($portfolio->id, $this->request->getData('featured_image'));
                        $this->Flash->success(__('The portfolio has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    else:
                        $this->Flash->error(__('The portfolio accept only " JPEG, PNG and GIF image"'));
                    endif;
                else:
                    $this->Flash->error(__('The portfolio has been saved.'));
                endif;
            }
        endif;
        $portfoliosCategories = $this->getPortfoliosCategoriesArray();

        $this->set(compact(['portfolio', 'portfoliosCategories']));
    }

    public function deletePortfolioCategory($id) {
        $deletePortfolioImages = $this->Subscriptions
                ->find()
                ->where(['Subscriptions.id' => $id])
                ->first();
				
		$stripe_controller = new StripesController();
			//$monthly_plan = $plan_obj->create($params);
			if($stripe_controller->deleteplan($id)){
				$this->Flash->success(__('The Subscription has been deleted.'));
                return $this->redirect(['action' => 'allCategories']);
			}else{
				$this->Flash->error(__('The Subscription has been deleted.'));
			}
       
    }

}
