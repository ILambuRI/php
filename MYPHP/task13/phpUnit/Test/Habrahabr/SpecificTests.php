<?php
require_once 'MyClassTest.php';
class SpecificTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('MySuite');
        // добавляем тест в набор
        $suite->addTestSuite('MyClassTest'); 
        return $suite; 
    }
}