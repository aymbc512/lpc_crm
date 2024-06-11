<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorporateContactsAssignment Model
 *
 * @property \App\Model\Table\CorporateContactsTable&\Cake\ORM\Association\BelongsTo $CorporateContacts
 * @property \App\Model\Table\CasesTable&\Cake\ORM\Association\BelongsTo $Cases
 * @property \App\Model\Table\ConsultationsTable&\Cake\ORM\Association\BelongsTo $Consultations
 * @property \App\Model\Table\AdvisorConsultationsTable&\Cake\ORM\Association\BelongsTo $AdvisorConsultations
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CorporateContactsAssignment newEmptyEntity()
 * @method \App\Model\Entity\CorporateContactsAssignment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CorporateContactsAssignment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorporateContactsAssignment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CorporateContactsAssignment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CorporateContactsAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CorporateContactsAssignment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateContactsAssignment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CorporateContactsAssignment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContactsAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContactsAssignment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContactsAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContactsAssignment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContactsAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContactsAssignment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CorporateContactsAssignment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CorporateContactsAssignment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CorporateContactsAssignmentTable extends Table
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

        $this->setTable('corporate_contacts_assignment');
        $this->setDisplayField('corporate_contact_assignment_id');
        $this->setPrimaryKey('corporate_contact_assignment_id');

        $this->belongsTo('CorporateContacts', [
            'foreignKey' => 'corporate_contact_id',
        ]);
        $this->belongsTo('Cases', [
            'foreignKey' => 'case_id',
        ]);
        $this->belongsTo('Consultations', [
            'foreignKey' => 'consultation_id',
        ]);
        $this->belongsTo('AdvisorConsultations', [
            'foreignKey' => 'advisor_consultation_id',
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
            ->scalar('assignment_kbn')
            ->maxLength('assignment_kbn', 255)
            ->allowEmptyString('assignment_kbn');

        $validator
            ->integer('corporate_contact_id')
            ->allowEmptyString('corporate_contact_id');

        $validator
            ->integer('case_id')
            ->allowEmptyString('case_id');

        $validator
            ->integer('consultation_id')
            ->allowEmptyString('consultation_id');

        $validator
            ->integer('advisor_consultation_id')
            ->allowEmptyString('advisor_consultation_id');

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
        $rules->add($rules->existsIn(['corporate_contact_id'], 'CorporateContacts'), ['errorField' => 'corporate_contact_id']);
        $rules->add($rules->existsIn(['case_id'], 'Cases'), ['errorField' => 'case_id']);
        $rules->add($rules->existsIn(['consultation_id'], 'Consultations'), ['errorField' => 'consultation_id']);
        $rules->add($rules->existsIn(['advisor_consultation_id'], 'AdvisorConsultations'), ['errorField' => 'advisor_consultation_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Users'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Users'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
