<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporateContactsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporateContactsTable Test Case
 */
class CorporateContactsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporateContactsTable
     */
    protected $CorporateContacts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CorporateContacts',
        'app.Stakeholders',
        'app.Cases',
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
        $config = $this->getTableLocator()->exists('CorporateContacts') ? [] : ['className' => CorporateContactsTable::class];
        $this->CorporateContacts = $this->getTableLocator()->get('CorporateContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CorporateContacts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CorporateContactsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CorporateContactsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
