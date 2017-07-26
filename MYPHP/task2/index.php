<?php
include 'lib/Calc.php';
include 'config.php';

$calc = new Calc;

$calc->setA(2);
$calc->setB(3);
$resPlus = $calc->getA() . " + " . $calc->getB() . " = " . $calc->plus() . "<br>";

$calc->setA(2);
$calc->setB(0);
$resDelenie = $calc->getA() . " / " . $calc->getB() . " = " . $calc->delenie() . "<br>";

$calc->setA(10);
$calc->setB(8);
$resMinus = $calc->getA() . " - " . $calc->getB() . " = " . $calc->minus() . "<br>";

$calc->setA(5);
$calc->setB(2);
$resUmnoj = $calc->getA() . " * " . $calc->getB() . " = " . $calc->umnoj() . "<br>";

$calc->setNum(5);
$resKoren = "Korenb iz " . $calc->getNum() . " = " . $calc->koren() . "<br>";

$calc->setNum(1000);
$proc = 50;
$resProc = "$proc% iz " . $calc->getNum() . " = " . $calc->proc($proc) . "<br>";

/* Operation with memory */
$calc->setA(2);
$calc->setB(3);

$res = $calc->getA() . " * " . $calc->getB() . " = " . $calc->umnoj() . "<br>";
$calc->mPlus($calc->umnoj());
$resRm1 = "$res Saved!<br>";

$res = $calc->getA() . " + " . $calc->getB() . " = " . $calc->plus() . "<br>";
$calc->mPlus($calc->plus());
$resRm2 = "$res Saved!<br>";

$resRm3 = "In memory is " . $calc->mR() . "<br>";

$calc->setNum(2);
$resRm4 = "-" . $calc->getNum() . " from memory be " . $calc->mMinus($calc->getNum()) . $calc->mR() . "<br>";

$resRm5 = "Delete memory<br>" . $calc->mC() . "Memory is now " . $calc->mR();





include 'template/index.php';
