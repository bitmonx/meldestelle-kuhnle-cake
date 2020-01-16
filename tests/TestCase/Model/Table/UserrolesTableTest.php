<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserrolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserrolesTable Test Case
 */
class UserrolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserrolesTable
     */
    public $Userroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.userroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Userroles') ? [] : ['className' => UserrolesTable::class];
        $this->Userroles = TableRegistry::getTableLocator()->get('Userroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Userroles);

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
}
