<?php
include 'lib/Calc.php';
include 'config.php';

$calc = new Calc;
$calc->setA(2);
$calc->setB(3);
$resPlus = $calc->plus();

$calc = new Calc;
$calc->setA(2);
$calc->setB(0);
$resDelenie = $calc->delenie();

$calc = new Calc;
$calc->setA(10);
$calc->setB(8);
$resMinus = $calc->minus();

$calc = new Calc;
$calc->setA(5);
$calc->setB(2);
$resUmnoj = $calc->umnoj();

$calc = new Calc;
$calc->setNum(5);
$resKoren = $calc->koren();

$calc = new Calc;
$calc->setNum(1000);
$resProc = $calc->proc(50);

include 'template/index.php';
