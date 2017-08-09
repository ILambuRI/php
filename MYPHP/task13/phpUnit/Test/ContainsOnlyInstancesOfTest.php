<?php
include __DIR__ . '/../Habrahabr/MyClass.php';
class ContainsOnlyInstancesOfTest extends PHPUnit_Framework_TestCase
{
    public function testFailure()
    {
        $this->assertContainsOnlyInstancesOf('MyClass', array(new MyClass(), new MyClass(), new MyClass()));
    }
}
?>