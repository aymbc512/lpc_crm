<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdvisorConsultations Model
 *
 * @property \App\Model\Table\StakeholdersTable&\Cake\ORM\Association\BelongsTo $Stakeholders
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AdvisorContractsTable&\Cake\ORM\Association\BelongsTo $AdvisorContracts
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CasesTable&\Cake\ORM\Association\HasMany $Cases
 *
 * @method \App\Model\Entity\AdvisorConsultation newEmptyEntity()
 * @method \App\Model\Entity\AdvisorConsultation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AdvisorConsultation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdvisorConsultation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AdvisorConsultation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AdvisorConsultation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AdvisorConsultation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdvisorConsultation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AdvisorConsultation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorConsultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorConsultation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorConsultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorConsultation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorConsultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorConsultation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorConsultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorConsultation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AdvisorConsultationsTable extends Table
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

        $this->setTable('advisor_consultations');
        $this->setDisplayField('advisor_consultations_id');
        $this->setPrimaryKey('advisor_consultations_id');

        $this->belongsTo('Stakeholders', [
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'lawyer_id',
        ]);
        $this->belongsTo('AdvisorContracts', [
            'foreignKey' => 'advisor_contract_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'paralegal_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'creator_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'updater_id',
        ]);
        $this->hasMany('Cases', [
            'foreignKey' => 'advisor_consultation_id',
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
            ->scalar('consultation_name')
            ->maxLength('consultation_name', 255)
            ->allowEmptyString('consultation_name');

        $validator
            ->date('consultation_at')
            ->allowEmptyDate('consultation_at');

        $validator
            ->scalar('consultation_content')
            ->allowEmptyString('consultation_content');

        $validator
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

        $validator
            ->scalar('lawyer_id')
            ->maxLength('lawyer_id', 255)
            ->allowEmptyString('lawyer_id');

        $validator
            ->integer('advisor_contract_id')
            ->allowEmptyString('advisor_contract_id');

        $validator
            ->scalar('paralegal_id')
            ->maxLength('paralegal_id', 255)
            ->allowEmptyString('paralegal_id');

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
        $rules->add($rules->existsIn(['customer_id'], 'Stakeholders'), ['errorField' => 'customer_id']);
        $rules->add($rules->existsIn(['lawyer_id'], 'Users'), ['errorField' => 'lawyer_id']);
        $rules->add($rules->existsIn(['advisor_contract_id'], 'AdvisorContracts'), ['errorField' => 'advisor_contract_id']);
        $rules->add($rules->existsIn(['paralegal_id'], 'Users'), ['errorField' => 'paralegal_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Users'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Users'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
