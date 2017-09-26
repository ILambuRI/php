<?php
include 'lib/func_soap.php';
include 'lib/func_cURL.php';

$goldSoap = soap1();
$goldCurl = cURL1();

if ('POST' == $_SERVER['REQUEST_METHOD'] and (int) $_POST['userInput'] >= 1)
{
    $footballSoap = soap2($_POST['userInput']);
    $footballCurl = cURL2($_POST['userInput']);
}

include 'templates/index.php';