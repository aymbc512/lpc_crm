<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorporateContacts Model
 *
 * @property \App\Model\Table\StakeholdersTable&\Cake\ORM\Association\BelongsTo $Stakeholders
 * @property \App\Model\Table\CasesTable&\Cake\ORM\Association\BelongsTo $Cases
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CorporateContact newEmptyEntity()
 * @method \App\Model\Entity\CorporateContact newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CorporateContact> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorporateContact get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CorporateContact findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CorporateContact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CorporateContact> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateContact|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CorporateContact saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContact>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContact> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContact>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContact> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CorporateContactsTable extends Table
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

        $this->setTable('corporate_contacts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('corporate_contact_id');

        $this->belongsTo('Stakeholders', [
            'foreignKey' => 'stakeholder_id',
        ]);
        $this->belongsTo('Cases', [
            'foreignKey' => 'case_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'creator_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'updater_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->integer('phone_number')
            ->allowEmptyString('phone_number');

        $validator
            ->scalar('corporate_contact_position_kbn')
            ->allowEmptyString('corporate_contact_position_kbn');

        $validator
            ->scalar('corporate_contact_remarks')
            ->allowEmptyString('corporate_contact_remarks');

        $validator
            ->integer('stakeholder_id')
            ->allowEmptyString('stakeholder_id');

        $validator
            ->integer('case_id')
            ->allowEmptyString('case_id');

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
        $rules->add($rules->existsIn(['stakeholder_id'], 'Stakeholders'), ['errorField' => 'stakeholder_id']);
        $rules->add($rules->existsIn(['case_id'], 'Cases'), ['errorField' => 'case_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Users'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Users'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
