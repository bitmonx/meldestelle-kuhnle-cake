<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hosts Model
 *
 * @method \App\Model\Entity\Host get($primaryKey, $options = [])
 * @method \App\Model\Entity\Host newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Host[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Host|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Host|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Host patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Host[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Host findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HostsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('hosts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Tournaments');
        $this->belongsTo('Files')
        ->setForeignKey('logo_id');
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50);

        $validator
            ->integer('logo_id');

        $validator
            ->scalar('website_url')
            ->maxLength('website_url', 50);

        $validator
            ->notEmpty(['name', 'logo_id', 'website_url']);

        $validator
            ->urlWithProtocol('website_url', 'Bitte gib eine gültige URL ein.');

        return $validator;
    }
}
