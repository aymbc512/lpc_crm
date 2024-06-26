<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Opponents Model
 */
class OpponentsTable extends StakeholdersTable
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

        $this->setTable('stakeholders');  // Ensure the correct table is being used
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator = parent::validationDefault($validator);
        // Additional validation rules specific to opponents can be added here

        return $validator;
    }

    /**
     * Before Save callback
     *
     * @param \Cake\Event\EventInterface $event The beforeSave event
     * @param \Cake\ORM\Entity $entity The entity being saved
     * @param \ArrayObject $options The options for the save operation
     * @return void
     */
    public function beforeSave(EventInterface $event, $entity, \ArrayObject $options)
    {
        if ($entity->isNew()) {
            $entity->set('opponent', 1);
        }
    }
}