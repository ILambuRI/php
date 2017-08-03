<?php

class Model
{
	protected $html;

    public function __construct()
    {
    }
        
    public function getHtml($request)
    {
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
		'cookie:SID=UQTaX3l9rQ-8guNAHttdSzS9Vi5h4ouSH_pmQDxHaFOCAwrHgan1mkkE2vdyyRJJb5zpIw.; HSID=ANV23ivanWyZmM-2T; SSID=A2WYbdvvBjQgCsHBI; APISID=Ewlw080MeQwTPpGE/AFqggYbVCh0au0LtR; SAPISID=d5lzdOzeXK1EXRA1/Aleqnk82Zo5HkVFuW; UULE=a+cm9sZToxIHByb2R1Y2VyOjEyIHByb3ZlbmFuY2U6NiB0aW1lc3RhbXA6MTUwMTU3ODM4MTU3NzAwMCBsYXRsbmd7bGF0aXR1ZGVfZTc6NDY4NjE4MjMxIGxvbmdpdHVkZV9lNzozMjAxMDQ5OTl9IHJhZGl1czozMjY4MDIw; NID=109=Csv-9HSK7voe3WI3B9cDymz3MDLnY0Ek59X1jt2CiaeQp6JgGHihgVi28F79RA8RmSTUF908eGZQNPSJNLm-puHa6dBM1MqF4Ne20yZukoyN6w16iMvEXjE4m1NVFO42RT-t-vpg4pi9HdR1yIL1mEkCKiWJTKzo9PmzU8cL7mMdnpSJbINFYVS-1hTA276jVVqG_W6kWK8WF0ijnQ',
		// 'origin:https://www.google.com.ua',
		// 'referer:https://www.google.com.ua/',
		'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.78 Safari/537.36',
		// 'x-chrome-uma-enabled:1',
		// 'x-client-data:CI+2yQEIorbJAQjEtskBCPqcygEIqZ3KAQ=='
		];
		$request = $this->checkForm($request);
		$ch = curl_init('https://www.google.com.ua/search?q=' .$request);
		// $ch = curl_init('https://www.google.com.ua/search?q=dog+daw');
		curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$this->html = curl_exec($ch);
		if (!$this->html = curl_exec($ch))
			throw new Exception(NO_CURL);
		curl_close($ch);
		return $this;
    }
   
    public function htmlParser()
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
		$dom->strictErrorChecking=false;
		$html = @ $dom->loadHTML($this->html);
		if (!$html)
			throw new Exception(NO_DOM_LOAD);
		
		if (!$links = $this->htmlGetLinks($dom))
			throw new Exception(NO_DOM_TAG);

		if (!$text = $this->htmlGetText($dom))
			throw new Exception(NO_DOM_TAG);

		for ($i=0; $i < count($text); $i++)
		{ 
			$links[$i]['span'] = $text[$i];
		}
		
		return $links;
    }

	protected function htmlGetLinks($dom)
	{
		$data = [];
		$i = 0;
		$tags = $dom->getElementsByTagName('h3');
		foreach ($tags as $h3) 
		{
			if($h3->hasAttribute('class'))
			{
				if ($h3->getAttribute('class') == 'r')
				{
					$childs = $h3->childNodes;
					$data[$i]['h3_text'] = $h3->textContent;
					foreach ($childs as $a)
					{
						if ($a->nodeType == 1)
						{
							if ($a->localName == 'a')
							{
								$data[$i]['href'] = $a->getAttribute('href');
								$i++;
							}
						}
					}
				}
			}
		}

		return $data;
	}

	protected function htmlGetText($dom)
	{
		$data = [];
		$spans = $dom->getElementsByTagName('span');
		foreach ($spans as $span) 
		{
			if($span->hasAttribute('class') and $span->getAttribute('class') == 'st')
			{
				if ($span->getAttribute('class') == 'st')
					$data[] = $span->textContent;
			}
		}

		return $data;
	}

	public function checkForm($data)
    {
		$data = trim(strip_tags($data));
		$data = ereg_replace(" ", "+", $data);

		if (strlen($data) < 1)
            throw new Exception(NO_RESULTS);

        return $data;		
    }
}