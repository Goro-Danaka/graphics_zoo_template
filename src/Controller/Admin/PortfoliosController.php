<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Phinx\Migration\AbstractMigration;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;
use Phinx\Db\Table;

/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class PortfoliosController extends AppController {

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
        $portfolioCategories = $this->PortfolioCategories
                ->find()
                ->all();
        $this->set(compact(['portfolioCategories']));
    }

    public function addCategories() {
        $PortfolioCategory = $this->PortfolioCategories->newEntity();
        if ($this->request->is('post')) {
			//print_r($_POST); exit;
			$data->name = $_POST['name'];
			$data->price = $_POST['price'];
			$data->permonthperyear = $_POST['permonthperyear'];
			$data->days = $_POST['days'];
			$data->description = $_POST['description'];
			$serialize_data = serialize($data);
			$data = array("name"=> $serialize_data);
			$PortfolioCategory = $this->Posts->patchEntity($PortfolioCategory, $this->request->getData());
			//print_r($PortfolioCategory); exit;
            // $PortfolioCategory = $this->Posts->patchEntity($PortfolioCategory, $this->request->getData());
            // if ($this->PortfolioCategories->save($PortfolioCategory)):
                // $this->Flash->success(__('The portfolio has been saved.'));
                // return $this->redirect(['action' => 'allCategories']);
            // else:
                // $this->Flash->error(__('The portfolio has been saved.'));
            // endif;
			
			 if ($this->PortfolioCategories->save($data)):
                $this->Flash->success(__('The portfolio has been saved.'));
                return $this->redirect(['action' => 'allCategories']);
            else:
                $this->Flash->error(__('The portfolio has been saved.'));
            endif;
        }
    }

    public function editCategory($id) {
        $portfolioCategory = $this->PortfolioCategories
                ->find()
                ->where(['PortfolioCategories.id' => $id])
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
            $portfolioCategory = $this->PortfolioCategories->patchEntity($portfolioCategory, $this->request->getData());
            if ($this->PortfolioCategories->save($portfolioCategory)) {
                return $this->redirect(['action' => 'allCategories']);
                $this->Flash->success(__('The category has been saved.'));
            }
            $this->Flash->error(__('The category has been saved.'));
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

        $deletePortfolio = $this->Portfolios
                ->find()
                ->where(['Portfolios.id  ' => $id])
                ->first();
        if ($deletePortfolio):
            $deletePortfolioImages = $this->PortfolioImages
                    ->find()
                    ->where(['PortfolioImages.portfolio_id' => $id])
                    ->first();
            if ($this->PortfolioImages->delete($deletePortfolioImages)):
                $this->Portfolios->delete($deletePortfolio);
                if ($this->PortfolioImages->save($deletePortfolioImages)):
                    $this->Flash->success(__('The portfolio image has been deleted.'));
                    return $this->redirect(['action' => 'index']);
                else:
                    $this->Flash->error(__('The portfolio image has been deleted.'));
                endif;
            endif;
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
        $deletePortfolioImages = $this->PortfolioCategories
                ->find()
                ->where(['PortfolioCategories.id' => $id])
                ->first();
        if ($this->PortfolioCategories->delete($deletePortfolioImages)):
            $this->Flash->success(__('The portfolio category has been deleted.'));
            return $this->redirect(['action' => 'allCategories']);
        else:
            $this->Flash->error(__('The portfolio category has been deleted.'));
        endif;
    }

}
