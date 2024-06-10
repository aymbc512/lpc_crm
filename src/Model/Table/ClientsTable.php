<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;

/**
 * Clients Model
 */
class ClientsTable extends StakeholdersTable
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

        // Add a condition to filter only clients
        $this->addBehavior('Filter', [
            'fields' => ['client' => 1]
        ]);

        // Add associations
        $this->hasMany('Cases', [
            'foreignKey' => 'customer_id',
        ]);
        $this->hasMany('AdvisorContracts', [
            'foreignKey' => 'customer_id',
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'customer_id',
            'bindingKey' => 'stakeholder_id',
            'joinType' => 'INNER',
            'conditions' => [
                'OR' => [
                    'Invoices.case_id = Cases.case_id',
                    'Invoices.advisor_contracts_id = AdvisorContracts.advisor_contracts_id'
                ]
            ]
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

        // Additional validation rules specific to clients can be added here

        return $validator;
    }

    /**
     * Apply filters to query to fetch only clients
     *
     * @param \Cake\Event\EventInterface $event The beforeFind event
     * @param \Cake\ORM\Query $query The query to modify
     * @param \ArrayObject $options The options for the query
     * @param bool $primary Whether this is the primary query being executed
     * @return \Cake\ORM\Query The modified query
     */
    public function beforeFind(EventInterface $event, Query $query, \ArrayObject $options, bool $primary): Query
    {
        // Ensure that only clients are fetched
        return $query->where(['Clients.client' => 1]);
    }
}


