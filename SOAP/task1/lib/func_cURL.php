<?php

function cURL1()
{
    //Data, connection, auth
    $soapUrl = "http://www.freewebservicesx.com/GetGoldPrice.asmx?op=GetCurrentGoldPrice";
    $soapUser = "lamburii@yahoo.com";
    $soapPassword = "123456";

    // xml post structure
    $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                        <soap:Body>
                            <GetCurrentGoldPrice xmlns="http://freewebservicesx.com/">
                            <UserName>' .$soapUser. '</UserName>
                            <Password>' .$soapPassword. '</Password>
                            </GetCurrentGoldPrice>
                        </soap:Body>
                        </soap:Envelope>';

    $headers = array(
                     "Content-type: text/xml;charset=\"utf-8\"",
                     "Accept: text/xml",
                     "Cache-Control: no-cache",
                     "Pragma: no-cache",
                     "SOAPAction: http://freewebservicesx.com/GetCurrentGoldPrice", 
                     "Content-length: ".strlen($xml_post_string)
    );

    $url = $soapUrl;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    if( ($response = curl_exec($ch)) === false)
    {
        $err = 'Curl error: ' . curl_error($ch) . '<br>';
        curl_close($ch);
        print $err;
        exit;
    }
    else
    {
        curl_close($ch);
    }
    
    // converting
    $response1 = str_replace("<soap:Body>","",$response);
    $response2 = str_replace("</soap:Body>","",$response1);

    // xml2array:
    $xml = simplexml_load_string($response2);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    $resArr = [];

    if ($array)
    {
        $resArr['Gold Spot Price'] = $array['GetCurrentGoldPriceResponse']['GetCurrentGoldPriceResult']['string'][0];
        $resArr['Change (%)'] = $array['GetCurrentGoldPriceResponse']['GetCurrentGoldPriceResult']['string'][2];
    }
    
    return $resArr;
}

function cURL2($num)
{
//Data, connection, auth
$dataFromTheForm = $num; // request data from the form
$soapUrl = "http://footballpool.dataaccess.eu/data/info.wso?op=TopGoalScorers"; // asmx URL of WSDL

// xml post structure
$xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <TopGoalScorers xmlns="http://footballpool.dataaccess.eu">
                    <iTopN>' .$dataFromTheForm. '</iTopN>
                    </TopGoalScorers>
                </soap:Body>
                </soap:Envelope>';   // data from the form, e.g. some ID number

$headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            // "SOAPAction: http://freewebservicesx.com/GetCurrentGoldPrice", 
            "Host: footballpool.dataaccess.eu",
            "Content-length: ".strlen($xml_post_string),
        ); //SOAPAction: your op URL

$url = $soapUrl;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

if( ($response = curl_exec($ch)) === false)
{
    $err = 'Curl error: ' . curl_error($ch) . '<br>';
    curl_close($ch);
    print $err;
    exit;
}
else
{
    curl_close($ch);
}


// converting
$response1 = str_replace("<soap:Body>", "", $response);
$response2 = str_replace("</soap:Body>", "", $response1);
$response3 = str_replace("m:", "", $response2);

// xml2array:
$xml = simplexml_load_string($response3);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$i = 0;
$resArr = [];
foreach ($xml->TopGoalScorersResponse->TopGoalScorersResult->tTopGoalScorer as $obj)
{
    $resArr[$i]['name'] = $obj->sName;
    $resArr[$i]['goals'] = $obj->iGoals;
    $resArr[$i]['flag'] = $obj->sFlag;
    $resArr[$i]['big_flag'] = $obj->sFlagLarge;
    $i++;
}

return $resArr;    
}