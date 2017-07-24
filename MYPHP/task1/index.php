<?php 
include 'config.php';
include 'lib/func.php';

$files = scan(UPL);

include 'templates/index.php';
