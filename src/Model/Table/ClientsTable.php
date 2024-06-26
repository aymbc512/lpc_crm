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

        // Set table to stakeholders
        $this->setTable('Stakeholders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('stakeholder_id');

        // Add a condition to filter only clients
        $this->addBehavior('Filter', [
            'fields' => ['client' => 1]
        ]);

        // Add associations
        $this->hasMany('Cases', [
            'foreignKey' => 'case_id',
        ]);
        $this->belongsTo('Clients', [
            'className' => 'Stakeholders',
            'foreignKey' => 'stakeholder_id',
            'propertyName' => 'client_stakeholder'
        ]);
        $this->hasMany('AdvisorContracts', [
            'foreignKey' => 'advisorcontract_id',
        ]);
        $this->hasMany('Invoices', [
            'foreignKey' => 'invoice_id',
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
            $entity->set('client', 1);
        }
    }
}
