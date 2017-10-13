<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestDiscussion Entity
 *
 * @property int $id
 * @property int $request_id
 * @property int $sender_id
 * @property string $sender_type
 * @property int $reciever_id
 * @property string $reciever_type
 * @property string $message
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\Sender $sender
 * @property \App\Model\Entity\Reciever $reciever
 */
class RequestDiscussion extends Entity
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
