<?php
// require_once 'PHPUnit/Framework.php';
// include 'E:/OpenServer/domains/php/MYPHP/task13/phpUnit/MyClass.php';
include __DIR__ . '/../../Habrahabr/MyClass.php';
// namespace phpUnit\Test\Habrahabr;


class MyClassTest extends PHPUnit_Framework_TestCase 
{
    
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new MyClass (); 
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /** 
    * @dataProvider providerPower 
    */
    public function testPower($a, $b, $c)
    {
        $this->assertEquals($c, $this->fixture->power($a, $b));
    }
    
    public function providerPower()
    {
        return array(
            array(2, 2, 4), 
            array(2, 3, 8), 
            array(3, 5, 243)
        ); 
    }

    /** 
    * @expectedException MathException 
    */
    public function testDivision1()
    {
        $this->fixture->divide (8, 0); 
    }

    public function testDivision2 ()
    {
        $this->setExpectedException('MathException');
        $this->fixture->divide(8, 0); 
    }
}