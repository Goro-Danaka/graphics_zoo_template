<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestCustomerFile Entity
 *
 * @property int $id
 * @property int $request_id
 * @property int $customer_id
 * @property string $file_name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\Customer $customer
 */
class RequestCustomerFile extends Entity
{

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
}
