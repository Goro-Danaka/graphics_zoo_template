<?php

namespace App\Controller\Manager;

use App\Controller\AppController;

/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class SettingsController extends AppController {

    public function changePassword() {
        $manager = $this
                ->Managers
                ->find()
                ->where([
                    'Managers.role' => USER_MANAGER,
                    'Managers.id' => $this->current_user->id,
                ])
                ->first();

        if (!$manager):
            $this->Flash->error('No manager found.');
            $this->redirect($this->referer('/', TRUE));
        endif;

        if ($this->request->is(['post', 'put'])):
            $manager = $this->Managers->patchEntity($manager, $this->request->getData());
            $default_password_hasher = new \Cake\Auth\DefaultPasswordHasher();
            if (!($default_password_hasher->check($this->request->getData('old_password'), $manager->password))):
                $this->Flash->error('Please enter right old password.');
                return $this->redirect($this->referer('/', TRUE));
            endif;

            if ($this->request->getData('new_password') !== $this->request->getData('confirm_password')):
                $this->Flash->error('New password and confirm password are not same.');
                return $this->redirect($this->referer('/', TRUE));
            endif;
            $manager->password = $this->request->getData('new_password');
            if ($this->Managers->save($manager)):
                $this->Flash->success('Password changed successfully.');
                return $this->redirect($this->referer('/', TRUE));
            else:
                $this->Flash->error('Password not change.');
                return $this->redirect($this->referer('/', TRUE));
            endif;
        endif;

        $this->set(compact('manager'));
    }

}
