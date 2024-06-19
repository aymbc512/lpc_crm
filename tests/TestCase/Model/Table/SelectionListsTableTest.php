<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SelectionListsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SelectionListsTable Test Case
 */
class SelectionListsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SelectionListsTable
     */
    protected $SelectionLists;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.SelectionLists',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SelectionLists') ? [] : ['className' => SelectionListsTable::class];
        $this->SelectionLists = $this->getTableLocator()->get('SelectionLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SelectionLists);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SelectionListsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
