<?php

namespace App\Controller\Admin;

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
        $admin = $this->Admins
                ->find()
                ->where([
                    'Admins.role' => USER_ADMIN,
                    'Admins.id' => $this->current_user->id,
                ])
                ->first();

        if (!$admin):
            $this->Flash->error('No administrator found.');
            return $this->redirect($this->referer('/', TRUE));
        endif;
		
		if(isset($_POST['update_profile'])){
			
			if($_POST['firstname'] != $admin->first_name || $_POST['lastname'] || $admin->last_name && $_POST['phone'] != $admin->phone){
				$admin->first_name = $_POST['firstname'];
				$admin->last_name = $_POST['lastname'];
				$admin->phone = $_POST['phone'];
				if ($this->Customers->save($admin)):
					$this->Flash->success('Update Profile Successfully.');
					return $this->redirect($this->referer('/', TRUE));
				else:
					$this->Flash->error('Profile not Update.');
					return $this->redirect($this->referer('/', TRUE));
				endif;
			}else{
				
				$this->Flash->error('Please Change any criteria and then Edit Your Profile.');
				return $this->redirect($this->referer('/', TRUE));
			}
		} 
        if ($this->request->is(['post', 'put'])):
            $default_password_hasher = new \Cake\Auth\DefaultPasswordHasher();
            if (!$default_password_hasher->check($this->request->getData('old_password'), $admin->password)):
                $this->Flash->error('Please enter right old password.');
                return $this->redirect($this->referer('/', TRUE));
            endif;

            if ($this->request->getData('new_password') !== $this->request->getData('confirm_password')):
                $this->Flash->error('New password and confirm password are not same.');
                return $this->redirect($this->referer('/', TRUE));
            endif;
            $admin->password = $this->request->getData('new_password');
            if ($this->Admins->save($admin)):
                $this->Flash->success('Password changed successfully.');
                return $this->redirect($this->referer('/', TRUE));
            else:
                $this->Flash->error('Password not change.');
                return $this->redirect($this->referer('/', TRUE));
            endif;
        endif;

        $this->set(compact('admin'));
    }

}
