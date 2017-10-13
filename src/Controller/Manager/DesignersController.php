<?php

namespace App\Controller\Manager;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class DesignersController extends AppController {

    public function index() {
        $designers = $this->Designers
                ->find()
                ->where(['Designers.role' => USER_DESIGNER])
                ->andWhere(['Designers.manager_id' => $this->current_user->id])
                ->contain(['Managers'])
                ->all();
        $this->set(compact(['designers']));
    }

    public function add() {
        $designer = $this->Designers->newEntity();
        if ($this->request->is('post')) {
            $designer = $this->Designers->patchEntity($designer, $this->request->getData());
            $designer->role = USER_DESIGNER;
            $designer->manager_id = $this->current_user->id;
            if ($this->Designers->save($designer)) {
                $this->uploadManagerProfilePicture($designer->id, $this->request->getData('profile_picture'));
                $this->Flash->success(__('The designer has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The designer could not be saved. Please, try again.'));
        }
        $this->set(compact('designer'));
    }

    public function edit($designer_id = null) {
        $designer = $this->Designers
                ->find()
                ->where(['Designers.role' => USER_DESIGNER, 'Designers.id' => $designer_id])
                ->first();

        if (!$designer):
            $this->Flash->error('No designer found.');
            return $this->redirect(Router::url($this->referer('/', TRUE), TRUE));
        endif;

        if ($this->request->is(['post', 'put'])):
            $designer = $this->Designers->patchEntity($designer, $this->request->getData());
            if ($this->Designers->save($designer)) {
                $this->uploadManagerProfilePicture($designer->id, $this->request->getData('profile_picture1'));
                $this->Flash->success(__('The designer has been saved.'));
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        endif;

        $this->set(compact('designer'));
    }

    public function delete($id) {
        //        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The manager has been deleted.'));
        } else {
            $this->Flash->error(__('The manager could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function view($designer_id) {
        $designer = $this->Designers
                ->find()
                ->where(['Designers.role' => USER_DESIGNER, 'Designers.id' => $designer_id])
                ->first();

        $designs_queue = $this->Requests
                ->find()
                ->where(['Requests.designer_id' => $designer->id])
                ->contain(['Customers', 'Designers'])
                ->all();

        $designs_approved = $this->Requests
                ->find()
                ->where([
                    'Requests.designer_id' => $designer->id,
                    'Requests.status' => REQUEST_STATUS_APPROVED
                ])
                ->contain(['Customers', 'Designers'])
                ->all();

        $this->set(compact('designer', 'designs_queue', 'designs_approved'));
    }

}
