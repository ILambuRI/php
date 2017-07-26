<?php
include 'config.php';
include 'lib/Sql.php';

$sql = new Sql;
$sql->sel('pole1')->from('table1')->where('pole1','value1')->execute();

include 'template/index.php';
