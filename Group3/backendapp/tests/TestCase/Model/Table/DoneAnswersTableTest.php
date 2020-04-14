<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoneAnswersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoneAnswersTable Test Case
 */
class DoneAnswersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DoneAnswersTable
     */
    public $DoneAnswers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DoneAnswers',
        'app.Clients',
        'app.Exercises',
        'app.Questions',
        'app.Answers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DoneAnswers') ? [] : ['className' => DoneAnswersTable::class];
        $this->DoneAnswers = TableRegistry::getTableLocator()->get('DoneAnswers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoneAnswers);

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
