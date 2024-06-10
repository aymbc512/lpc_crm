<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvisorConsultationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvisorConsultationsTable Test Case
 */
class AdvisorConsultationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvisorConsultationsTable
     */
    protected $AdvisorConsultations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.AdvisorConsultations',
        'app.Stakeholders',
        'app.Users',
        'app.AdvisorContracts',
        'app.Cases',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AdvisorConsultations') ? [] : ['className' => AdvisorConsultationsTable::class];
        $this->AdvisorConsultations = $this->getTableLocator()->get('AdvisorConsultations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AdvisorConsultations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdvisorConsultationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AdvisorConsultationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
