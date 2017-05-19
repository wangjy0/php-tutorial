<?php
require_once '../src/Demo.php';

/**
 * Demo test case.
 */
class DemoTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var Demo
     */
    private $demo;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        // TODO Auto-generated DemoTest::setUp()
        
        $this->demo = new Demo(/* parameters */);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated DemoTest::tearDown()
        $this->demo = null;
        
        parent::tearDown();
    }

    /**
     * Constructs the test case.
     */
    public function __construct()
    {
        // TODO Auto-generated constructor
    }

    public function testAdd()
    {
        $this->assertEquals(4, $this->demo->add(2, 2));
    }
}

