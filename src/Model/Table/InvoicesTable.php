<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @property \App\Model\Table\CasesTable&\Cake\ORM\Association\BelongsTo $Cases
 * @property \App\Model\Table\StakeholdersTable&\Cake\ORM\Association\BelongsTo $Stakeholders
 * @property \App\Model\Table\AdvisorContractsTable&\Cake\ORM\Association\BelongsTo $AdvisorContracts
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Invoice newEmptyEntity()
 * @method \App\Model\Entity\Invoice newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Invoice> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Invoice findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Invoice> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Invoice saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Invoice>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Invoice> deleteManyOrFail(iterable $entities, array $options = [])
 */
class InvoicesTable extends Table
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

        $this->setTable('invoices');
        $this->setDisplayField('invoice_id');
        $this->setPrimaryKey('invoice_id');

        $this->belongsTo('Cases', [
            'foreignKey' => 'case_id',
        ]);
        $this->belongsTo('Stakeholders', [
            'foreignKey' => 'stakeholder_id',
        ]);
        $this->belongsTo('AdvisorContracts', [
            'foreignKey' => 'advisor_contracts_id',
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
            ->scalar('invoice_adress')
            ->maxLength('invoice_adress', 255)
            ->allowEmptyString('invoice_adress');

        $validator
            ->date('invoice_at')
            ->allowEmptyDate('invoice_at');

        $validator
            ->date('invoice_deadline_at')
            ->allowEmptyDate('invoice_deadline_at');

        $validator
            ->integer('invoice_amount')
            ->allowEmptyString('invoice_amount');

        $validator
            ->scalar('invoice_status_kbn')
            ->allowEmptyString('invoice_status_kbn');

        $validator
            ->date('invoice_creation_at')
            ->allowEmptyDate('invoice_creation_at');

        $validator
            ->date('invoice_updated_at')
            ->allowEmptyDate('invoice_updated_at');

        $validator
            ->date('invoice_payment_at')
            ->allowEmptyDate('invoice_payment_at');

        $validator
            ->integer('case_id')
            ->allowEmptyString('case_id');

        $validator
            ->integer('stakeholder_id')
            ->allowEmptyString('stakeholder_id');

        $validator
            ->integer('advisor_contracts_id')
            ->allowEmptyString('advisor_contracts_id');

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
        $rules->add($rules->existsIn(['case_id'], 'Cases'), ['errorField' => 'case_id']);
        $rules->add($rules->existsIn(['stakeholder_id'], 'Stakeholders'), ['errorField' => 'stakeholder_id']);
        $rules->add($rules->existsIn(['advisor_contracts_id'], 'AdvisorContracts'), ['errorField' => 'advisor_contracts_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Users'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Users'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
