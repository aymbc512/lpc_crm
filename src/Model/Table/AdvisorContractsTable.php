<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdvisorContracts Model
 *
 * @property \App\Model\Table\StakeholdersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\ConsultationsTable&\Cake\ORM\Association\BelongsTo $Consultations
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Lawyers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Paralegals
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Creators
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Updaters
 * @property \App\Model\Table\AdvisorConsultationsTable&\Cake\ORM\Association\HasMany $AdvisorConsultations
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices
 *
 * @method \App\Model\Entity\AdvisorContract newEmptyEntity()
 * @method \App\Model\Entity\AdvisorContract newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AdvisorContract> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdvisorContract get(mixed $primaryKey, array|string $finder = 'all', \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AdvisorContract findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AdvisorContract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AdvisorContract> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdvisorContract|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AdvisorContract saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorContract>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorContract>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorContract>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorContract> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorContract>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorContract>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AdvisorContract>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AdvisorContract> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AdvisorContractsTable extends Table
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

        $this->setTable('advisor_contracts');
        $this->setDisplayField('advisor_contracts_id');
        $this->setPrimaryKey('advisor_contracts_id');

        $this->belongsTo('Customers', [
            'className' => 'Stakeholders',
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsTo('Consultations', [
            'foreignKey' => 'consultation_id',
        ]);
        $this->belongsTo('Lawyers', [
            'className' => 'Users',
            'foreignKey' => 'lawyer_id',
        ]);
        $this->belongsTo('Paralegals', [
            'className' => 'Users',
            'foreignKey' => 'paralegal_id',
        ]);
        $this->belongsTo('Creators', [
            'className' => 'Users',
            'foreignKey' => 'creator_id',
        ]);
        $this->belongsTo('Updaters', [
            'className' => 'Users',
            'foreignKey' => 'updater_id',
        ]);
        $this->hasMany('AdvisorConsultations', [
            'foreignKey' => 'advisor_contract_id',
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'advisor_contracts_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation.Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

        $validator
            ->date('advisor_start_at')
            ->allowEmptyDate('advisor_start_at');

        $validator
            ->date('advisor_end_at')
            ->allowEmptyDate('advisor_end_at');

        $validator
            ->integer('advisor_fee')
            ->allowEmptyString('advisor_fee');

        $validator
            ->scalar('advisor_content')
            ->allowEmptyString('advisor_content');

        $validator
            ->integer('consultation_id')
            ->allowEmptyString('consultation_id');

        $validator
            ->date('initial_contract_at')
            ->allowEmptyDate('initial_contract_at');

        $validator
            ->date('initial_consultation_at')
            ->allowEmptyDate('initial_consultation_at');

        $validator
            ->date('payment_at')
            ->allowEmptyDate('payment_at');

        $validator
            ->scalar('payment_method_kbn')
            ->allowEmptyString('payment_method_kbn');

        $validator
            ->scalar('lawyer_id')
            ->maxLength('lawyer_id', 255)
            ->allowEmptyString('lawyer_id');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'), ['errorField' => 'customer_id']);
        $rules->add($rules->existsIn(['consultation_id'], 'Consultations'), ['errorField' => 'consultation_id']);
        $rules->add($rules->existsIn(['lawyer_id'], 'Lawyers'), ['errorField' => 'lawyer_id']);
        $rules->add($rules->existsIn(['paralegal_id'], 'Paralegals'), ['errorField' => 'paralegal_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Creators'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Updaters'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
