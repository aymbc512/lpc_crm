<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;

/**
 * Clients Model
 */
class ClientsTable extends Table
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

        // Set table to stakeholders
        $this->setTable('stakeholders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('stakeholder_id');

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

        return $validator;
    }
}
