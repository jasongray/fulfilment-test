<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockMovementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockMovementsTable Test Case
 */
class StockMovementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StockMovementsTable
     */
    protected $StockMovements;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StockMovements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('StockMovements') ? [] : ['className' => StockMovementsTable::class];
        $this->StockMovements = TableRegistry::getTableLocator()->get('StockMovements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StockMovements);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
