<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrammarsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrammarsTable Test Case
 */
class GrammarsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GrammarsTable
     */
    public $Grammars;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Grammars',
        'app.Lessons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Grammars') ? [] : ['className' => GrammarsTable::class];
        $this->Grammars = TableRegistry::getTableLocator()->get('Grammars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grammars);

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
