<?php
//<?xml version="1.0" encoding="utf-8" ?/>

// header('Content-type: application/xml');
$headers = [
            // 'authority:www.google.com.ua',
            // 'method:GET',    
            // 'path:/search?q=dog',
            // 'path:/gen_204?atyp=i&ct=slh&cad=&ei=YI1_Wf75KMShUcCPmtgB&s=2&v=2&pv=0.18980989703025086&me=12:‎1501531489424,V,0,0,0,0:51,U,51:0,V,0,0,1366,163:5743,e,H&zx=‎1501531495218',
            // 'scheme:https',
            // 'accept:*/*',
            // 'accept:application/xml',
            // 'accept-language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
            // 'cache-control:max-age=0',
            // 'content-length:0',
            // 'content-type:text/html;charset=UTF-8',
            // 'content-type:application/xml',
            // 'cookie:XDEBUG_SESSION=PHPSTORM; NID=108=s-tO0gCk1SxV8ZyBJVxwpGAiM0BQq2OYXX9XAxcCl46CrttFteJXwVCZzqwZDduk2gTeUGjPUWp26bKCrsiVTSBQh5GXrGlJ9_9SsH5Gplqd9BqOR6hS3B3L2vP3jDHdmYAeLwTy4pGlk_i_Hmqzod8bXDTYmAk1zcbDuhk3PZ__EXSIPz37gGmKpcB64zM8EKzmMJYb6EHLeCDZhakJ1G7mAAyatYAcic4IVmM; DV=U0l6_aZ4IlMt4Ga-ULf03c-TNASk2VW48WNVQ7njPqIwAQA; UULE=a+cm9sZToxIHByb2R1Y2VyOjEyIHByb3ZlbmFuY2U6NiB0aW1lc3RhbXA6MTUwMTUzMTQ4ODUyNzAwMCBsYXRsbmd7bGF0aXR1ZGVfZTc6NDY5NjYzODM1IGxvbmdpdHVkZV9lNzozMjAyMTQyOTl9IHJhZGl1czozMDM4MA==',
            'cookie:SID=UQTaX3l9rQ-8guNAHttdSzS9Vi5h4ouSH_pmQDxHaFOCAwrHgan1mkkE2vdyyRJJb5zpIw.; HSID=ANV23ivanWyZmM-2T; SSID=A2WYbdvvBjQgCsHBI; APISID=Ewlw080MeQwTPpGE/AFqggYbVCh0au0LtR; SAPISID=d5lzdOzeXK1EXRA1/Aleqnk82Zo5HkVFuW; UULE=a+cm9sZToxIHByb2R1Y2VyOjEyIHByb3ZlbmFuY2U6NiB0aW1lc3RhbXA6MTUwMTU3ODM4MTU3NzAwMCBsYXRsbmd7bGF0aXR1ZGVfZTc6NDY4NjE4MjMxIGxvbmdpdHVkZV9lNzozMjAxMDQ5OTl9IHJhZGl1czozMjY4MDIw; NID=109=Csv-9HSK7voe3WI3B9cDymz3MDLnY0Ek59X1jt2CiaeQp6JgGHihgVi28F79RA8RmSTUF908eGZQNPSJNLm-puHa6dBM1MqF4Ne20yZukoyN6w16iMvEXjE4m1NVFO42RT-t-vpg4pi9HdR1yIL1mEkCKiWJTKzo9PmzU8cL7mMdnpSJbINFYVS-1hTA276jVVqG_W6kWK8WF0ijnQ',
            // 'origin:https://www.google.com.ua',
            // 'referer:https://www.google.com.ua/',
            'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36',
            // 'x-chrome-uma-enabled:1',
            // 'x-client-data:CI+2yQEIorbJAQjEtskBCPqcygEIqZ3KAQ=='
            ];

$ch = curl_init("https://www.google.com.ua/search?q=dog");
curl_setopt ($ch, CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
curl_close($ch);


$dom = new DOMDocument('1.0', 'UTF-8');
$dom->strictErrorChecking=false;
$html = @ $dom->loadHTML($res);

if($html)
{
    $tags = $dom->getElementsByTagName('h3');
    foreach ($tags as $h3) 
    {
        if($h3->hasAttribute('class'))
        {
            if ($h3->getAttribute('class') == 'r')
            {
                $childs = $h3->childNodes;
                $h3_text = $h3->textContent;
                echo $h3_text;
                foreach ($childs as $a)
                {
                    if ($a->nodeType == 1)
                        if ($a->localName == 'a')
                            $href = $a->getAttribute('href');
                            echo $href;
                }
            }
        }
    }

    $spans = $dom->getElementsByTagName('span');
    foreach ($spans as $span) 
    {
        if($span->hasAttribute('class') and $span->getAttribute('class') == 'st')
        {
            if ($span->getAttribute('class') == 'st')
            {
                $span = $span->textContent;
                echo $span;
            }
        }

    }
}
include ('templates/index.php');
// $html = $dom->saveHTML();
// echo $root;

// // Использование SAX
// // Создание парсера
// $sax = xml_parser_create("utf-8");
// // Декларация функций обработки событий
// function onStart($parser, $tag, $attributes)
// {
//     if ($tag == 'H3' and $attributes == 'class=r')
//         echo 'STAR SSILKA: '.$tag.$attributes;
// }
// function onEnd($parser, $tag)
// {
//     if ($tag == 'H3')
//         echo 'END SSILKA';
// }
// function onText($parser, $text)
// {
//     echo $text;
// }
// // Регистрация функций как обработчиков событий
// xml_set_element_handler($sax, "onStart", "onEnd");
// xml_set_character_data_handler($sax, "onText");
// // Запуск парсера

// // Обработка ошибок
// echo "ERRORs: " . xml_error_string( xml_get_error_code($sax) ) . "<br>";



        // // create curl resource 
        // $ch = curl_init(); 

        // // set url 
        // curl_setopt($ch, CURLOPT_URL, "https://www.google.com.ua/search?q=dog"); 

        // //return the transfer as a string 
        
        // curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/html; charset=UTF-8",
        //                                             "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8"
        //                                             ));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);

        // // $output contains the output string 
        // $output = curl_exec($ch); 

        // // close curl resource to free up system resources 
        // curl_close($ch);      
        // echo $output;

// //CURLOPT_RETURNTRANSFER - string
// //$fp = fopen("html.html", "w");
// // $url = "http://getbootstrap.com/"; 
// //$ch = curl_init(); 
// //curl_setopt($ch, CURLOPT_URL,$url); // set url to post to 
// //curl_setopt($ch, CURLOPT_FAILONERROR, 1); 
// //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects 
// //curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable 
// //curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s 
// //curl_setopt($ch, CURLOPT_POST, 1); // set POST method 
// //curl_setopt($ch, CURLOPT_POSTFIELDS, "cat"); // add POST fields
// //curl_setopt($ch, CURLOPT_FILE, $fp);
// //curl_setopt($ch, CURLOPT_HEADER, 0); 
// //$result = curl_exec($ch); // run the whole process 
// //print_r(curl_getinfo($ch));   
// //echo "\n\ncURL error number:" .curl_errno($ch);   
// //echo "\n\ncURL error:" . curl_error($ch);   
// //curl_close($ch);
// //fclose($fp);
// //echo $result; 

// //$ch = curl_init('https://www.google.com.ua/search?q=dog');
// //curl_setopt  ($ch, CURLOPT_HEADER, true);
// //curl_exec($ch);
// //curl_close($ch);

//  $url = 'https://www.google.com.ua/search?q=dog';

// // $url = 'https://www.google.com.ua/';
// // $curl = curl_init();
// // curl_setopt($curl, CURLOPT_URL, $url);
// // curl_setopt ($ch, CURLOPT_HTTPHEADER, Array("Content-Type: charset=utf-8; text/html"));
// // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
// // curl_setopt($curl, CURLOPT_VERBOSE, true);
// // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
// // curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
// // curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']);
// // curl_setopt($curl, CURLOPT_TIMEOUT, 30);
// // curl_setopt($curl, CURLOPT_HEADER, 0);
// // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// // curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');
// // curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
// // $html = curl_exec($curl);
// // echo $html;

// $ch=curl_init($url);
// curl_setopt($ch, CURLOPT_URL, $url); 
// curl_setopt($ch, CURLOPT_USERAGENT, 'FIREFOX 5');
// curl_setopt($ch, CURLOPT_TIMEOUT,50); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
// curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);
// curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile);

// $answer=curl_exec($ch);

// curl_close($ch);
// echo $answer;