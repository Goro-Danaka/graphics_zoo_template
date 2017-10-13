<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $activation
 * @property string $phone
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class User extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected $_virtual = ['profile_picture_path', 'profile_picture_url'];

    protected function _getProfilePicturePath() {
        $profile_path = '';
        if ($this->_properties['profile_picture']):
            $profile_path = USER_IMG_PATH . $this->_properties['profile_picture'];
        endif;
        return $profile_path;
    }

    protected function _getProfilePictureUrl() {
        $profile_path = '';
        if ($this->_properties['profile_picture']):
            $profile_path = USER_IMG_URL . $this->_properties['profile_picture'];
        endif;
        return $profile_path;
    }

    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }

}
