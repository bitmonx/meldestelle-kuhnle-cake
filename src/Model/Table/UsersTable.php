<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config){
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Userroles');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 20)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('email')
            ->maxLength('email', 50)
            ->notEmpty('email', 'Dieses Feld darf nicht leer bleiben.')
            ->email('email', false, 'Bitte gib eine gültige E-Mail Adresse ein.');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->notEmpty('name', 'Dieses Feld darf nicht leer bleiben.');

        $validator
            ->scalar('street')
            ->maxLength('street', 50)
            ->notEmpty('street', 'Dieses Feld darf nicht leer bleiben.');

        $validator
            ->integer('house_number')
            ->maxLength('house_number', 4, 'Die Hausnummer darf max. 4 Ziffern haben.')
            ->notEmpty('house_number', 'Dieses Feld darf nicht leer bleiben.');

        $validator
            ->integer('plz')
            ->maxLength('plz', 6, 'Die Postleitzahl darf max. 6 Ziffern haben.')
            ->notEmpty('plz', 'Dieses Feld darf nicht leer bleiben.');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->notEmpty('city', 'Dieses Feld darf nicht leer bleiben.');

        $validator
            ->scalar('password')
            ->maxLength('password', 80)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('newPassword');

        $validator
            ->add('newPassword', 'passwordCheck', [
                'rule' => function($value, $context) {
                    if ($value === $context['data']['passwordCheck']) {
                        return true;
                    } else {
                        return 'Die beiden Passwörter stimmen nicht überein.';
                    }
                }
            ]);

        $validator
            ->integer('userrole')
            ->requirePresence('userrole', 'create')
            ->notEmpty('userrole');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules){
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options){
        $query
          ->select(['id', 'username', 'password', 'name', 'Userroles.role'])
          ->contain(['Userroles']);

        return $query;
    }
}
