<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestDiscussions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Requests
 * @property \Cake\ORM\Association\BelongsTo $Senders
 * @property \Cake\ORM\Association\BelongsTo $Recievers
 *
 * @method \App\Model\Entity\RequestDiscussion get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestDiscussion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestDiscussion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestDiscussion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestDiscussion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestDiscussion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestDiscussion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestDiscussionsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('request_discussions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
//            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Senders', [
            'foreignKey' => 'sender_id',
            'className' => 'Users',
//            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Recievers', [
            'foreignKey' => 'reciever_id',
            'className' => 'Users',
//            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('sender_type');

        $validator
                ->allowEmpty('reciever_type');

        $validator
                ->allowEmpty('message');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
//        $rules->add($rules->existsIn(['request_id'], 'Requests'));
//        $rules->add($rules->existsIn(['sender_id'], 'Senders'));
//        $rules->add($rules->existsIn(['reciever_id'], 'Recievers'));

        return $rules;
    }

}
