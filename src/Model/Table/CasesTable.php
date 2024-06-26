<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cases Model
 *
 * @property \App\Model\Table\StakeholdersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\StakeholdersTable&\Cake\ORM\Association\BelongsTo $Opponents
 * @property \App\Model\Table\ConsultationsTable&\Cake\ORM\Association\BelongsTo $Consultations
 * @property \App\Model\Table\AdvisorConsultationsTable&\Cake\ORM\Association\BelongsTo $AdvisorConsultations
 * @property \App\Model\Table\CaseAssigneesTable&\Cake\ORM\Association\HasMany $CaseAssignees
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\CorporateContactsTable&\Cake\ORM\Association\BelongsToMany $CorporateContacts
 *
 * @method \App\Model\Entity\Case newEmptyEntity()
 * @method \App\Model\Entity\Case newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Case> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Case get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Case findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Case patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Case> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Case|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Case saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Case>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Case>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Case>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Case> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Case>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Case>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Case>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Case> deleteManyOrFail(iterable $entities, array $options = [])
 * 
 */
class CasesTable extends Table
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

        $this->setTable('cases');
        $this->setDisplayField('case_id');
        $this->setPrimaryKey('case_id');

        // Define the associations with aliases
        $this->belongsTo('Customers', [
            'className' => 'Stakeholders',
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsTo('Opponents', [
            'className' => 'Stakeholders',
            'foreignKey' => 'opponent_id',
        ]);
        $this->belongsTo('Consultations', [
            'foreignKey' => 'consultations_id',
        ]);
        $this->belongsTo('AdvisorConsultations', [
            'foreignKey' => 'advisor_consultation_id',
        ]);
        $this->hasMany('CaseAssignees', [
            'foreignKey' => 'case_id',
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'case_id',
        ]);
        $this->belongsToMany('CorporateContacts', [
            'through' => 'CorporateContactsAssignment',
            'foreignKey' => 'case_id',
            'targetForeignKey' => 'corporate_contact_id',
        ]);
        $this->belongsTo('Creators', [
            'className' => 'Users',
            'foreignKey' => 'creator_id',
        ]);
        $this->belongsTo('Updaters', [
            'className' => 'Users',
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
            ->scalar('case_name')
            ->maxLength('case_name', 255)
            ->allowEmptyString('case_name');

        $validator
            ->scalar('case_kbn')
            ->allowEmptyString('case_kbn');

        $validator
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

        $validator
            ->integer('opponent_id')
            ->allowEmptyString('opponent_id');

        $validator
            ->scalar('case_content')
            ->maxLength('case_content', 255)
            ->allowEmptyString('case_content');

        $validator
            ->scalar('memo')
            ->allowEmptyString('memo');

        $validator
            ->date('start_at')
            ->allowEmptyDate('start_at');

        $validator
            ->date('expected_end_at')
            ->allowEmptyDate('expected_end_at');

        $validator
            ->date('end_at')
            ->allowEmptyDate('end_at');

        $validator
            ->scalar('resolution_result')
            ->allowEmptyString('resolution_result');

        $validator
            ->integer('consultations_id')
            ->allowEmptyString('consultations_id');

        $validator
            ->scalar('case_goal')
            ->allowEmptyString('case_goal');

        $validator
            ->integer('case_amount')
            ->allowEmptyString('case_amount');

        $validator
            ->date('goal_achievement_deadline_at')
            ->allowEmptyDate('goal_achievement_deadline_at');

        $validator
            ->integer('advisor_consultation_id')
            ->allowEmptyString('advisor_consultation_id');

        $validator
            ->scalar('case_status_kbn')
            ->allowEmptyString('case_status_kbn');

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
        $rules->add($rules->existsIn(['opponent_id'], 'Opponents'), ['errorField' => 'opponent_id']);
        $rules->add($rules->existsIn(['consultations_id'], 'Consultations'), ['errorField' => 'consultations_id']);
        $rules->add($rules->existsIn(['advisor_consultation_id'], 'AdvisorConsultations'), ['errorField' => 'advisor_consultation_id']);

        return $rules;
    }
}


