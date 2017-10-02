<?php
ini_set("soap.wsdl_cache_enabled", "0");
require_once ('config.php');

function __autoload($class){
  require_once('model/' . $class . '.php');
}

$server = new SoapServer(LINK_WSDL);
$server->setClass('Auto');
$server->handle();