<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SelectionLists Model
 *
 * @method \App\Model\Entity\SelectionList newEmptyEntity()
 * @method \App\Model\Entity\SelectionList newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SelectionList> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SelectionList get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SelectionList findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SelectionList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SelectionList> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SelectionList|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SelectionList saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SelectionList>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SelectionList>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SelectionList>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SelectionList> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SelectionList>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SelectionList>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SelectionList>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SelectionList> deleteManyOrFail(iterable $entities, array $options = [])
 */

 

class SelectionListsTable extends Table
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

        $this->setTable('selection_lists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }



   public function getNamesByDataId($data_id)
    {
       $query = $this->find()
                     ->select(['name'])
                     ->where(['data_id' => $data_id]);
        
           
       //  return $query->all();

       $results = $query->all();

    // $results はデータの配列であり、それを名前の配列に変換する
    $names = [];
    foreach ($results as $result) {
        $names[] = $result->name;
    }

    return $names;

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
            ->integer('data_id')
            ->allowEmptyString('data_id');

        $validator
            ->integer('detail_id')
            ->requirePresence('detail_id', 'create')
            ->notEmptyString('detail_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
