<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->belongsTo('Creators', [
            'foreignKey' => 'creator_id',
            
            'className' => 'Users'
        ]);

        $this->belongsTo('Updaters', [
            'foreignKey' => 'updater_id',
            
            'className' => 'Users'
        ]);

        $this->belongsTo('Lawyers', [
            'foreignKey' => 'lawyer_id',
            
            'className' => 'Users'
        ]);

        $this->belongsTo('Paralegals', [
            'foreignKey' => 'paralegal_id',
            
            'className' => 'Users'
        ]); 
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 255)
            ->allowEmptyString('user_name');

        $validator
            ->scalar('role_kbn')
            ->allowEmptyString('role_kbn');

        $validator
            ->scalar('department_kbn')
            ->allowEmptyString('department_kbn');

        $validator
            ->scalar('expertise_kbn')
            ->allowEmptyString('expertise_kbn');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 15)
            ->allowEmptyString('phone_number');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->integer('lawyer_no')
            ->allowEmptyString('lawyer_no');

        $validator
            ->scalar('creator_id')
            ->maxLength('creator_id', 255)
            ->allowEmptyString('creator_id');

        $validator
            ->date('created_at')
            ->allowEmptyDate('created_at');

        $validator
            ->scalar('updater_id')
            ->maxLength('updater_id', 255)
            ->allowEmptyString('updater_id');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn(['creator_id'], 'Creators'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Updaters'), ['errorField' => 'updater_id']);
            return $rules;   
    }
    public function validationPassword(Validator $validator): Validator
    {
        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->add('password', [
                'rule' => function ($value, $context) {
                    // Check if the password is at least 8 characters long and contains both letters and numbers
                    return preg_match('/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/', $value);
                },
                'message' => 'パスワードは文字と数字の両方を含む8文字以上でなければなりません。',
            ]);
    
        return $validator;
    }
}
