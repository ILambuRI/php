<?php
include 'config.php';
include 'lib/func.php';

if ('POST' == $_SERVER['REQUEST_METHOD'])
{
    $upf = upload();
    if ($upf['success'])
    {
        $info = $upf['message'];
    }
    elseif (!$upf['success'])
    {
        $info = $upf['message'];
    }
}

if ('GET' == $_SERVER['REQUEST_METHOD'] and $_GET['name'])
{
    $file = $_GET['name'];
    $info = delFile($file, UPL);
}

$files = dirScan(UPL);
// $content = mktable($files);

include 'templates/index.php';