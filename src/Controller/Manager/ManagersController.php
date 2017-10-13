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
class ManagersController extends AppController {

    public function index() {
        $managers = $this->Managers
                ->find()
                ->where(['Managers.role' => USER_MANAGER])
                ->all();
        $this->set(compact(['managers']));
    }

    public function add() {
        $manager = $this->Managers->newEntity();
        if ($this->request->is('post')) {
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            $manager->role = USER_MANAGER;
            if ($this->Managers->save($manager)) {
                $this->uploadManagerProfilePicture($manager->id, $this->request->getData('profile_picture'));
                $this->Flash->success(__('The manager has been saved.'));
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('manager'));
    }

    public function edit($manager_id = null) {
        $manager = $this->Managers
                ->find()
                ->where(['Managers.role' => USER_MANAGER, 'Managers.id' => $manager_id])
                ->first();

        if (!$manager):
            $this->Flash->error('No manager found.');
            return $this->redirect(Router::url($this->referer('/', TRUE), TRUE));
        endif;

        if ($this->request->is(['post', 'put'])):
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            if ($this->Managers->save($manager)) {
                $this->uploadManagerProfilePicture($manager->id, $this->request->getData('profile_picture1'));
                $this->Flash->success(__('The manager has been saved.'));
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        endif;

        $this->set(compact('manager'));
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

    public function view($manager_id = null) {
        $manager = $this->Managers
                ->find()
                ->where(['Managers.role' => USER_MANAGER, 'Managers.id' => $manager_id])
                ->first();

        if ($manager):
            $designers = $this->Designers->getAllDesignersOfManager($manager->id);
            $designer_ids = $this->getDesignerIdsOfManager($manager_id);
            if ($designer_ids):
                $designs_queue = $this->Requests
                        ->find()
                        ->where(['Requests.designer_id IN' => $designer_ids])
                        ->contain(['Customers', 'Designers'])
                        ->all();

                $designs_approved = $this->Requests
                        ->find()
                        ->where([
                            'Requests.designer_id IN' => $designer_ids,
                            'Requests.status' => REQUEST_STATUS_APPROVED
                        ])
                        ->contain(['Customers', 'Designers'])
                        ->all();
            endif;
        endif;

        $this->set(compact('manager', 'designers', 'designs_queue', 'designs_approved'));
    }

    public function statusChange($manager_id, $manager_status) {
        $manager_id = $manager_id;
        $manager_current_status = $manager_status;
        $change_manager_status = '';
        if ($manager_current_status == STATUS_ACTIVE):
            $change_manager_status = STATUS_DEACTIVE;
        elseif ($manager_current_status == STATUS_DEACTIVE):
            $change_manager_status = STATUS_ACTIVE;
        endif;

        $manager = $this->Users
                ->find()
                ->where(['Users.id' => $manager_id])
                ->andWhere(['Users.status' => $manager_current_status])
                ->first();
        if ($manager):
            $manager->status = $change_manager_status;
            if ($this->Users->save($manager)):
                $this->Flash->success("Activation status change successfully.");
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            else:
                $this->Flash->error("Activation status not change.");
                return $this->redirect(Router::url(['action' => 'index'], TRUE));
            endif;
        endif;
    }

}
