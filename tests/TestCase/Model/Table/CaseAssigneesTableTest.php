<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaseAssigneesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaseAssigneesTable Test Case
 */
class CaseAssigneesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CaseAssigneesTable
     */
    protected $CaseAssignees;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CaseAssignees',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('CaseAssignees') ? [] : ['className' => CaseAssigneesTable::class];
        $this->CaseAssignees = $this->getTableLocator()->get('CaseAssignees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CaseAssignees);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CaseAssigneesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CaseAssigneesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
