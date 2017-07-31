<?php
//CURLOPT_RETURNTRANSFER - string
//$fp = fopen("html.html", "w");
// $url = "http://getbootstrap.com/"; 
//$ch = curl_init(); 
//curl_setopt($ch, CURLOPT_URL,$url); // set url to post to 
//curl_setopt($ch, CURLOPT_FAILONERROR, 1); 
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects 
//curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable 
//curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s 
//curl_setopt($ch, CURLOPT_POST, 1); // set POST method 
//curl_setopt($ch, CURLOPT_POSTFIELDS, "cat"); // add POST fields
//curl_setopt($ch, CURLOPT_FILE, $fp);
//curl_setopt($ch, CURLOPT_HEADER, 0); 
//$result = curl_exec($ch); // run the whole process 
//print_r(curl_getinfo($ch));   
//echo "\n\ncURL error number:" .curl_errno($ch);   
//echo "\n\ncURL error:" . curl_error($ch);   
//curl_close($ch);
//fclose($fp);
//echo $result; 

//$ch = curl_init('https://www.google.com.ua/search?q=dog');
//curl_setopt  ($ch, CURLOPT_HEADER, true);
//curl_exec($ch); // ×ÐÌÑÍÚÐÏ curl
//curl_close($ch);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_VERBOSE, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
curl_setopt($curl, CURLOPT_COOKIEFILE, $GLOBALS['cookie_file']);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl);
