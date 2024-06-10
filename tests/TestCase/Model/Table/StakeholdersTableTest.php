<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StakeholdersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StakeholdersTable Test Case
 */
class StakeholdersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StakeholdersTable
     */
    protected $Stakeholders;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Stakeholders',
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
        $config = $this->getTableLocator()->exists('Stakeholders') ? [] : ['className' => StakeholdersTable::class];
        $this->Stakeholders = $this->getTableLocator()->get('Stakeholders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Stakeholders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StakeholdersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StakeholdersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
