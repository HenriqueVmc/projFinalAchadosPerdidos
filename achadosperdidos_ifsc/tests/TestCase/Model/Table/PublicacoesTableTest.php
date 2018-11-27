<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicacoesTable Test Case
 */
class PublicacoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicacoesTable
     */
    public $Publicacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publicacoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Publicacoes') ? [] : ['className' => PublicacoesTable::class];
        $this->Publicacoes = TableRegistry::getTableLocator()->get('Publicacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Publicacoes);

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
