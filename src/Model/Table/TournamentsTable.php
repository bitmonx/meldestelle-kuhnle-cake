<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tournaments Model
 *
 * @method \App\Model\Entity\Tournament get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tournament newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tournament[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tournament|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tournament|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tournament patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TournamentsTable extends Table {
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tournaments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Hosts');
        $this->belongsTo('Files');
    }

    public function validationDefault(Validator $validator) {

        $validator
            ->requirePresence([
            'start',
            'end',
            'host_id',
            'disciplines'
        ])
            ->notEmpty([
                'start',
                'end',
                'disciplines'
            ], 'Das Feld darf nicht leer sein.');

        return $validator;
    }
}
