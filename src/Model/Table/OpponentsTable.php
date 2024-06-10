<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;

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

        // Add a condition to filter only opponents
        $this->addBehavior('Filter', [
            'fields' => ['opponent' => 1]
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
        $validator = parent::validationDefault($validator);

        // Additional validation rules specific to opponents can be added here

        return $validator;
    }

    /**
     * Apply filters to query to fetch only opponents
     *
     * @param \Cake\Event\EventInterface $event The beforeFind event
     * @param \Cake\ORM\Query $query The query to modify
     * @param \ArrayObject $options The options for the query
     * @param bool $primary Whether this is the primary query being executed
     * @return \Cake\ORM\Query The modified query
     */
    public function beforeFind(EventInterface $event, Query $query, \ArrayObject $options, bool $primary): Query
    {
        // Ensure that only opponents are fetched
        return $query->where(['Opponents.opponent' => 1]);
    }
}
