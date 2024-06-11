<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporateContactsAssignmentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporateContactsAssignmentTable Test Case
 */
class CorporateContactsAssignmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporateContactsAssignmentTable
     */
    protected $CorporateContactsAssignment;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CorporateContactsAssignment',
        'app.CorporateContacts',
        'app.Cases',
        'app.Consultations',
        'app.AdvisorConsultations',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CorporateContactsAssignment') ? [] : ['className' => CorporateContactsAssignmentTable::class];
        $this->CorporateContactsAssignment = $this->getTableLocator()->get('CorporateContactsAssignment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CorporateContactsAssignment);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CorporateContactsAssignmentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CorporateContactsAssignmentTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
