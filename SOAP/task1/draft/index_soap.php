<?php
$params1 = ['UserName' => 'lamburii@yahoo.com', 'Password' => '123456'];
$client1 = new SoapClient("http://www.freewebservicesx.com/GetGoldPrice.asmx?WSDL");
// var_dump($client1->__getFunctions());
$res1 = $client1->GetCurrentGoldPrice($params1);

var_dump($res1->GetCurrentGoldPriceResult->string[0]);
var_dump($res1->GetCurrentGoldPriceResult->string[2]);

#######################################################################################

$client = new SoapClient("http://footballpool.dataaccess.eu/data/info.wso?WSDL");
$params['iTopN'] = 2;
$res = $client->TopGoalScorers($params);

// var_dump($res->TopGoalScorersResult->tTopGoalScorer->sName);

if ($params['iTopN'] == 1)
{
    foreach ($res->TopGoalScorersResult as $obj)
    {
        echo $obj->sName . '<br>';
        echo $obj->iGoals . '<br>';
        echo $obj->sFlag . '<br>';
        echo $obj->sFlagLarge . '<br>';
    }
}
else
{
    foreach ($res->TopGoalScorersResult->tTopGoalScorer as $obj)
    {
        echo $obj->sName . '<br>';
        echo $obj->iGoals . '<br>';
        echo $obj->sFlag . '<br>';
        echo $obj->sFlagLarge . '<br>';
    }
}
