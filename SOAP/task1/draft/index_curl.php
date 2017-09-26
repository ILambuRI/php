<?php 
        //Data, connection, auth
        $dataFromTheForm = $_POST['fieldName']; // request data from the form
        $soapUrl = "http://www.freewebservicesx.com/GetGoldPrice.asmx?op=GetCurrentGoldPrice"; // asmx URL of WSDL
        $soapUser = "lamburii@yahoo.com";  //  username
        $soapPassword = "123456"; // password

        // xml post structure

        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                            <soap:Body>
                                <GetCurrentGoldPrice xmlns="http://freewebservicesx.com/">
                                <UserName>' .$soapUser. '</UserName>
                                <Password>' .$soapPassword. '</Password>
                                </GetCurrentGoldPrice>
                            </soap:Body>
                            </soap:Envelope>';   // data from the form, e.g. some ID number

           $headers = array(
                        "Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache",
                        "Pragma: no-cache",
                        "SOAPAction: http://freewebservicesx.com/GetCurrentGoldPrice", 
                        "Content-length: ".strlen($xml_post_string),
                    ); //SOAPAction: your op URL

            $url = $soapUrl;

            // PHP cURL  for https connection with auth
            $ch = curl_init();
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
            // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            // curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            if( ($response = curl_exec($ch)) === false)
            {
                $err = 'Curl error: ' . curl_error($ch) . '<br>';
                curl_close($ch);
                print $err;
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

            // 
            // $parser = simplexml_load_string($response2);
            // var_dump($response2);
            var_dump($array['GetCurrentGoldPriceResponse']['GetCurrentGoldPriceResult']['string'][0]);
            var_dump($array['GetCurrentGoldPriceResponse']['GetCurrentGoldPriceResult']['string'][2]);
            // var_dump($parser->GetCurrentGoldPriceResponse->GetCurrentGoldPriceResult);
            // user $parser to get your data out of XML response and to display it.
            ########################################################################################################
        //Data, connection, auth
        $dataFromTheForm = 1; // request data from the form
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

            // PHP cURL  for https connection with auth
            $ch = curl_init();
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
            // curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            // curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            if( ($response = curl_exec($ch)) === false)
            {
                $err = 'Curl error: ' . curl_error($ch) . '<br>';
                curl_close($ch);
                print $err;
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

            foreach ($xml->TopGoalScorersResponse->TopGoalScorersResult->tTopGoalScorer as $obj)
            {
                echo $obj->sName . '<br>';
                echo $obj->iGoals . '<br>';
                echo $obj->sFlag . '<br>';
                echo $obj->sFlagLarge . '<br>';
            }
            // 
            // $parser = simplexml_load_string($response2);
            // var_dump($xml);
            // var_dump($array['GetCurrentGoldPriceResponse']['GetCurrentGoldPriceResult']['string'][2]);
            // var_dump($parser->GetCurrentGoldPriceResponse->GetCurrentGoldPriceResult);
            // user $parser to get your data out of XML response and to display it.
            ########################################################################################################
    ?>