<?php

namespace App\Controller\Designer;

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
        $designer = $this
                ->Designers
                ->find()
                ->where([
                    'Designers.role' => USER_DESIGNER,
                    'Designers.id' => $this->current_user->id,
                ])
                ->first();

        if (!$designer):
            $this->Flash->error('No designer found.');
            $this->redirect($this->referer('/', TRUE));
        endif;

		if(isset($_POST['update_profile'])){
			
			if($_POST['firstname'] != $designer->first_name || $_POST['lastname'] || $designer->last_name && $_POST['phone'] != $designer->phone){
				$designer->first_name = $_POST['firstname'];
				$designer->last_name = $_POST['lastname'];
				$designer->phone = $_POST['phone'];
				if ($this->Customers->save($designer)):
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
            $designer = $this->Designers->patchEntity($designer, $this->request->getData());
            $default_password_hasher = new \Cake\Auth\DefaultPasswordHasher();
            if (!($default_password_hasher->check($this->request->getData('old_password'), $designer->password))):
                $this->Flash->error('Please enter right old password.');
                return $this->redirect($this->referer('/', TRUE));
            endif;

            if ($this->request->getData('new_password') !== $this->request->getData('confirm_password')):
                $this->Flash->error('New password and confirm password are not same.');
                return $this->redirect($this->referer('/', TRUE));
            endif;
            $designer->password = $this->request->getData('new_password');
            if ($this->Designers->save($designer)):
                $this->Flash->success('Password changed successfully.');
                return $this->redirect($this->referer('/', TRUE));
            else:
                $this->Flash->error('Password not change.');
                return $this->redirect($this->referer('/', TRUE));
            endif;
        endif;

        $this->set(compact('designer'));
    }

}
