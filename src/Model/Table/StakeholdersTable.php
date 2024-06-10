<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stakeholders Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Stakeholder newEmptyEntity()
 * @method \App\Model\Entity\Stakeholder newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Stakeholder> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stakeholder get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Stakeholder findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Stakeholder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Stakeholder> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stakeholder|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Stakeholder saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Stakeholder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stakeholder>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Stakeholder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stakeholder> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Stakeholder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stakeholder>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Stakeholder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Stakeholder> deleteManyOrFail(iterable $entities, array $options = [])
 */
class StakeholdersTable extends Table
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

        $this->setTable('stakeholders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('stakeholder_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'lawyer_id',
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
            ->integer('post_cd')
            ->allowEmptyString('post_cd');

        $validator
            ->scalar('prefectures')
            ->maxLength('prefectures', 255)
            ->allowEmptyString('prefectures');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmptyString('city');

        $validator
            ->scalar('kuchouson')
            ->maxLength('kuchouson', 255)
            ->allowEmptyString('kuchouson');

        $validator
            ->scalar('adress_below')
            ->maxLength('adress_below', 255)
            ->allowEmptyString('adress_below');

        $validator
            ->integer('phone_number')
            ->allowEmptyString('phone_number');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('stakeholder_kbn')
            ->allowEmptyString('stakeholder_kbn');

        $validator
            ->boolean('client')
            ->allowEmptyString('client');

        $validator
            ->boolean('opponent')
            ->allowEmptyString('opponent');

        $validator
            ->scalar('lawyer_id')
            ->maxLength('lawyer_id', 255)
            ->allowEmptyString('lawyer_id');

        $validator
            ->scalar('stakeholder_remarks')
            ->allowEmptyString('stakeholder_remarks');

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
        $rules->add($rules->existsIn(['lawyer_id'], 'Users'), ['errorField' => 'lawyer_id']);
        $rules->add($rules->existsIn(['creator_id'], 'Users'), ['errorField' => 'creator_id']);
        $rules->add($rules->existsIn(['updater_id'], 'Users'), ['errorField' => 'updater_id']);

        return $rules;
    }
}
