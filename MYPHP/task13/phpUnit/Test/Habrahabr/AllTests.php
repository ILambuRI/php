<?php
// подключаем файл с набором тестов
require_once 'SpecificTests.php';

class AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('AllMySuite');
        // добавляем набор тестов
        $suite->addTest(SpecificTests::suite());
        return $suite; 
    }
}