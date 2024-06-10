<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvisorContractsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvisorContractsTable Test Case
 */
class AdvisorContractsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvisorContractsTable
     */
    protected $AdvisorContracts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.AdvisorContracts',
        'app.Stakeholders',
        'app.Consultations',
        'app.Users',
        'app.AdvisorConsultations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdvisorContracts') ? [] : ['className' => AdvisorContractsTable::class];
        $this->AdvisorContracts = $this->getTableLocator()->get('AdvisorContracts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AdvisorContracts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdvisorContractsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdvisorContractsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
