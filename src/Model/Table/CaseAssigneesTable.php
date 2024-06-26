<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaseAssignees Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CasesTable&\Cake\ORM\Association\BelongsTo $Cases
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Creators
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Updaters
 *
 * @method \App\Model\Entity\CaseAssignee newEmptyEntity()
 * @method \App\Model\Entity\CaseAssignee newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CaseAssignee> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CaseAssignee get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CaseAssignee findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CaseAssignee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CaseAssignee> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CaseAssignee|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CaseAssignee saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CaseAssignee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaseAssignee>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CaseAssignee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaseAssignee> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CaseAssignee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaseAssignee>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CaseAssignee>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CaseAssignee> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CaseAssigneesTable extends Table 
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

        $this->setTable('case_assignees');
        $this->setDisplayField('case_assignees');
        $this->setPrimaryKey('case_assignees');

        $this->belongsTo('Users', [
            'foreignKey' => 'lawyer_id',
            'bindingKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cases', [
            'foreignKey' => 'case_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Creators', [
            'className' => 'Users',
            'foreignKey' => 'creator_id',
            'bindingKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Updaters', [
            'className' => 'Users',
            'foreignKey' => 'updater_id',
            'bindingKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->integer('case_assignees')
            ->allowEmptyString('case_assignees', null, 'create');

        $validator
            ->scalar('lawyer_id')
            ->maxLength('lawyer_id', 255)
            ->requirePresence('lawyer_id', 'create')
            ->notEmptyString('lawyer_id');

        $validator
            ->scalar('case_role_kbn')
            ->requirePresence('case_role_kbn', 'create')
            ->allowEmptyString('case_role_kbn');

        $validator
            ->integer('case_id')
            ->requirePresence('case_id', 'create')
            ->notEmptyString('case_id');

        $validator
            ->scalar('creator_id')
            ->maxLength('creator_id', 255)
            ->requirePresence('creator_id', 'create')
            ->notEmptyString('creator_id');

        $validator
            ->date('created_at')
            ->allowEmptyDate('created_at');

        $validator
            ->scalar('updater_id')
            ->maxLength('updater_id', 255)
            ->requirePresence('updater_id', 'update')
            ->notEmptyString('updater_id');

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
        $rules->add($rules->existsIn(['lawyer_id'], 'Users'), ['errorField' => 'lawyer_id']);
        $rules->add($rules->existsIn(['case_id'], 'Cases'), ['errorField' => 'case_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Users'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Users'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
