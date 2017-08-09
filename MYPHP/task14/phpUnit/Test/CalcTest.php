<?php
include __DIR__ . '/../Calc.php';

class CalcTest extends PHPUnit_Framework_TestCase 
{
    
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new Calc(); 
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    public function testFailure()
    {
        $this->assertClassHasAttribute('a', 'Calc');
        $this->assertClassHasAttribute('b', 'Calc');
        $this->assertClassHasAttribute('num', 'Calc');
        $this->assertClassHasAttribute('rm', 'Calc');
    }

    /** 
    * @dataProvider providerPlus 
    */
    public function testPlus($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }
    
    public function providerPlus()
    {
        return array(
            array(2, 2, 4), 
            array(2, 3, 5), 
            array(-3, 5, 2)
        ); 
    }

    /** 
    * @dataProvider providerMinus 
    */
    public function testMinus ($a, $b, $c)
    {
        $this->assertEquals($c, $a - $b);
    }
    
    public function providerMinus ()
    {
        return array(
            array(2, 2, 0), 
            array(2, 3, -1), 
            array(-3, 5, -8)
        ); 
    }

    /** 
    * @expectedException Exception 
    */

    public function testDelenie1()
    {
        1 / 0;
    }

    /** 
    * @dataProvider providerDelenie
    */

    public function testDelenie2($a, $b, $c)
    {
        $this->assertEquals($c, $a / $b);
    }

    public function providerDelenie()
    {
        return array(
            array(8, 3, 2.666666666666667), 
            array(899, 25, 35.96), 
            array(7539, 100, 75.39)
        ); 
    }

    /** 
    * @dataProvider providerUmnoj
    */

    public function testUmnoj($a, $b, $c)
    {
        $this->assertEquals($c, $a * $b);
    }

    public function providerUmnoj()
    {
        return array(
            array(89, 123, 10947), 
            array(95, 0.9, 85.5), 
            array(-123, 27, -3321)
        ); 
    }

    /** 
    * @dataProvider providerKoren
    */

    public function testKoren($a, $b)
    {
        $this->assertEquals($b, sqrt($a));
    }

    public function providerKoren()
    {
        return array(
            array(10, 3.162277660168379), 
            array(2.5, 1.58113883008419), 
            array(123.8, 11.1265448365609)
        ); 
    }

    /** 
    * @dataProvider providerProc
    */

    public function testProc($a, $b, $c)
    {
        $this->assertEquals($c, $a * $b / 100);
    }

    public function providerProc()
    {
        return array(
            array(1000, 10, 100), 
            array(95, 90, 85.5), 
            array(-1234, 22, -271.48)
        ); 
    }


}

