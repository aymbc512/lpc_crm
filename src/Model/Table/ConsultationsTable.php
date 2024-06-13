<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Consultations Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Lawyers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Creators
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Updaters
 * @property \App\Model\Table\AdvisorContractsTable&\Cake\ORM\Association\HasMany $AdvisorContracts
 * @property \App\Model\Table\CorporateContactAssignmentsTable&\Cake\ORM\Association\HasMany $CorporateContactAssignments
 *
 * @method \App\Model\Entity\Consultation newEmptyEntity()
 * @method \App\Model\Entity\Consultation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Consultation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Consultation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Consultation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Consultation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Consultation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Consultation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Consultation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Consultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Consultation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Consultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Consultation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Consultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Consultation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Consultation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Consultation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ConsultationsTable extends Table
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

        $this->setTable('consultations');
        $this->setDisplayField('consultations_id');
        $this->setPrimaryKey('consultations_id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'stakeholder_id',
            'className' => 'Stakeholders',
        ]);
        $this->belongsTo('Lawyers', [
            'className' => 'Users',
            'foreignKey' => 'lawyer_id',
        ]);
        $this->belongsTo('Creators', [
            'className' => 'Users',
            'foreignKey' => 'creator_id',
        ]);
        $this->belongsTo('Updaters', [
            'className' => 'Users',
            'foreignKey' => 'updater_id',
        ]);
        $this->hasMany('AdvisorContracts', [
            'foreignKey' => 'consultation_id',
        ]);
        $this->hasMany('CorporateContactsAssignment', [
            'foreignKey' => 'consultation_id',
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
            ->integer('stakeholder_id')
            ->allowEmptyString('stakeholder_id');

        $validator
            ->scalar('lawyer_id')
            ->maxLength('lawyer_id', 255)
            ->allowEmptyString('lawyer_id');

        $validator
            ->scalar('creator_id')
            ->maxLength('creator_id', 255)
            ->allowEmptyString('creator_id');

        $validator
            ->scalar('updater_id')
            ->maxLength('updater_id', 255)
            ->allowEmptyString('updater_id');

        $validator
            ->scalar('consultation_kbn')
            ->allowEmptyString('consultation_kbn');

        $validator
            ->date('created_at')
            ->allowEmptyDate('created_at');

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
        $rules->add($rules->existsIn(['stakeholder_id'], 'Clients'), ['errorField' => 'stakeholder_id']);
        $rules->add($rules->existsIn(['lawyer_id'], 'Lawyers'), ['errorField' => 'lawyer_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Creators'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Updaters'), ['errorField' => 'updater_id']);

        return $rules;
    }
}


