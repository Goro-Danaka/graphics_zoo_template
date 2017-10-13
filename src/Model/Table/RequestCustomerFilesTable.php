<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestCustomerFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Requests
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\RequestCustomerFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestCustomerFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestCustomerFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestCustomerFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestCustomerFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestCustomerFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestCustomerFile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestCustomerFilesTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('request_customer_files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
//            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
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
                ->allowEmpty('file_name');

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
//        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }

}
