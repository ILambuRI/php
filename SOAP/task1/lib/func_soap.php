<?php

function soap1()
{
    $params = ['UserName' => 'lamburii@yahoo.com', 'Password' => '123456'];

    try
    {
        $client = new SoapClient("http://www.freewebservicesx.com/GetGoldPrice.asmx?WSDL");
        $res = $client->GetCurrentGoldPrice($params);
    }
    catch (SoapFault $fault)
    {
        trigger_error("Error SOAP: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
    }

    $resArr = [];
    if ($res)
    {
        $resArr = ['Gold Spot Price' => $res->GetCurrentGoldPriceResult->string[0],
                   'Change (%)' => $res->GetCurrentGoldPriceResult->string[2]
        ];
    }

    return $resArr;
}

function soap2($num)
{
    try
    {
        $client = new SoapClient("http://footballpool.dataaccess.eu/data/info.wso?WSDL");
        $params['iTopN'] = $num;
        $res = $client->TopGoalScorers($params);
    }
    catch (SoapFault $fault)
    {
        trigger_error("Error SOAP: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
    }

    $i = 0;
    $resArr = [];
    if ($res)
    {
        if ($params['iTopN'] == 1)
        {
            foreach ($res->TopGoalScorersResult as $obj)
            {
                $resArr[$i]['name'] = $obj->sName;
                $resArr[$i]['goals'] = $obj->iGoals;
                $resArr[$i]['flag'] = $obj->sFlag;
                $resArr[$i]['big_flag'] = $obj->sFlagLarge;
                $i++;
            }
        }
        else
        {
            foreach ($res->TopGoalScorersResult->tTopGoalScorer as $obj)
            {
                $resArr[$i]['name'] = $obj->sName;
                $resArr[$i]['goals'] = $obj->iGoals;
                $resArr[$i]['flag'] = $obj->sFlag;
                $resArr[$i]['big_flag'] = $obj->sFlagLarge;
                $i++;
            }
        }
    }

    return $resArr;    
}