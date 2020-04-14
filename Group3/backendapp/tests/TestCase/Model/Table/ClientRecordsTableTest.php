<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientRecordsTable Test Case
 */
class ClientRecordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientRecordsTable
     */
    public $ClientRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ClientRecords',
        'app.Clients',
        'app.Exercises',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ClientRecords') ? [] : ['className' => ClientRecordsTable::class];
        $this->ClientRecords = TableRegistry::getTableLocator()->get('ClientRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClientRecords);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
