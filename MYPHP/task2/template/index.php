<?php
echo $resPlus;

echo $resMinus;

echo $resDelenie;

echo $resUmnoj;

echo $resKoren;

echo $resProc;

$calc = new Calc;
$calc->setA(5);
$calc->setB(10);
$res = $calc->umnoj();
echo "$res saved!";
$calc->mPlus($res);
$res = $calc->plus();
$calc->mPlus($res);
echo "$res saved!";
