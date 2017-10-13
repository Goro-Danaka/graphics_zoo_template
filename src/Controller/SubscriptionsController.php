<?php

namespace App\Controller;

use App\Controller\AppController;
use Phinx\Migration\AbstractMigration;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Phinx\Db\Table;
use App\Controller\StripesController;
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
        $this->set(compact(['portfolioCategories']));
    }

    public function addCategories() {
        $PortfolioCategory = $this->PortfolioCategories->newEntity();
        if ($this->request->is('post')) {
			//print_r($_POST); exit;
			
			$id = $_POST['id'];
			$name = $_POST['name'];
			$amount = $_POST['amount'];
			$currency = $_POST['currency'];
			$interval = $_POST['interval'];
			$trial_period_days = $_POST['trial_period_days'];
			//$data->description = $_POST['description'];
			//print_r($data); exit;
			$PortfolioCategory = $this->Posts->patchEntity($PortfolioCategory, $this->request->getData());
			//print_r($PortfolioCategory); exit;
			$stripe_controller = new StripesController();
			if($stripe_controller->createmyPlans($id,$name,$amount,$currency,$interval,$trial_period_days)){
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
            $portfolioCategory = $this->Subscriptions->patchEntity($portfolioCategory, $this->request->getData());
            if ($this->Subscriptions->save($portfolioCategory)) {
                $this->Flash->success(__('The Subscriptions has been updated.'));
				return $this->redirect(['action' => 'allCategories']);
                
            }
            $this->Flash->error(__('The Subscriptions has been not updated.'));
        endif;
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
        if ($this->Subscriptions->delete($deletePortfolioImages)):
            $this->Flash->success(__('The portfolio category has been deleted.'));
            return $this->redirect(['action' => 'allCategories']);
        else:
            $this->Flash->error(__('The portfolio category has been not deleted.'));
        endif;
    }

}
