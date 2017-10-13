<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestFile Entity
 *
 * @property int $id
 * @property int $request_id
 * @property int $user_id
 * @property string $user_type
 * @property string $file_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\User $user
 */
class RequestFile extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_virtual = ['file_picture_path', 'file_picture_url'];
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _getFilePicturePath() {
        $file_path = '';
        if ($this->_properties['file_name']):
            $file_path = REQUEST_IMG_PATH . $this->_properties['request_id'] . DS . $this->_properties['file_name'];
        endif;
        return $file_path;
    }

    protected function _getFilePictureUrl() {
        $file_path = '';
        if ($this->_properties['file_name']):
            $file_path = REQUEST_IMG_URL . $this->_properties['request_id'] . DS . $this->_properties['file_name'];
        endif;
        return $file_path;
    }

    public function download($id = null) {
        $filePath = WWW_ROOT . 'files' . DS . $id;
        $this->response->file($filePath, array('download' => true, 'name' => 'file name'));
    }

}
