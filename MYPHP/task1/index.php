<?php
include 'config.php';
include 'lib/func.php';

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $upf = upload();
    if ($upf['success']) {
        // echo "Все хорошо!";
        $info = $upf['message'];
    } elseif (!$upf['success']) {
        // echo "Все плохо!";
        $info = $upf['message'];
    }
}

if ('GET' == $_SERVER['REQUEST_METHOD'] and $_GET['name']) {
    $file = $_GET['name'];
    $info = delFile($file);
}

$files = dirScan(UPL);

include 'templates/index.php';
