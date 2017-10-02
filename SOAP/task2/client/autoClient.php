<?php
ini_set("soap.wsdl_cache_enabled", "0");
require_once ('config.php');

try
{
    $client = new SoapClient(LINK_WSDL, array('trace' => true, 'keep_alive' => false));
    reset($_POST);
    $postType = key($_POST);
    $postValue = current($_POST);

    switch ($postType) {
        case 'getAutoByParams':
            echo $client->getAutoByParams($postValue);
        break;

        case 'getAutoById':
            echo $client->getAutoById($postValue);
        break;

        case 'getAutoList':
            echo $client->getAutoList();
        break;

        case 'getAllDistinct':
            echo $client->getAllDistinct();
        break;

        case 'addOrder':
            echo $client->addOrder($postValue);
        break;
        
        default:
            echo json_encode(['error' => 'Bad request for the client!']);
        break;
    }
}
catch (SoapFault $e)
{
    echo json_encode($e->getMessage());
}