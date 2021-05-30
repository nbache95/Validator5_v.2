<?php

	class ValidationMobile {
		
		public $url;
		public $xml;
		public $errorXml;
		
		public function __construct ($url){
			
			$this->url = $url;
			/*$url_encode = urlencode($url);
			echo $url_encode;
			echo '<br> ----------------------------------<br>';
			$comple_url = 'http://jigsaw.w3.org/css-validator/validator?uri='.$url_encode.'&warning=0&profile=css3' ; 
			/*echo $comple_url;
			echo '<br>----------------------------------<br>';
			$options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
			/*echo $options;
			echo '<br> ----------------------------------<br>';
			$context  = stream_context_create($options);
			/*echo $context;
			echo '<br> ----------------------------------<br>';
			$jsonText = file_get_contents($comple_url, false, $context);
			print_r($jsonText);

			echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			$jsonArray = json_decode($jsonText, false);*/
			//echo '<pre>';
			//print_r($jsonArray);
			//echo '</pre>';
			
		}
		public function setValUrlMobile(){
            echo $this->url;
            echo strlen($this->url);
			$urlAPI = 'https://searchconsole.googleapis.com/v1/urlTestingTools/mobileFriendlyTest:run?key=AIzaSyA4WVYApWoOhrC55TBF2purhUcO8M1K_cg';
			$ch = curl_init($urlAPI);
			// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			// 	'Content-Type: application/json',
			// 	'Accept: application/json'
			// 	));
			curl_setopt($ch, CURLOPT_URL, $urlAPI);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$postfield = array (
			    "url"=>$this->url
			);
			
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfield));//,\"requestScreenshot\":false "{\"url\":\"'.$this->url.'\"}"
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
//'.$this->url.'
			$headers = array();
			$headers[] = 'Accept: application/json';
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			
			
			
			// curl_setopt($ch, CURLOPT_URL, $this->url);
			$this->xml = curl_exec($ch);
			//echo '<pre>';
			//$this->xml =curl_getinfo($ch);
			//echo '</pre>';
			$this->errorXml= curl_error($ch);
			curl_close($ch);
		}
		public function setValUrlMobileCss(){
			$url_encode = urlencode($url);
			/*echo $url_encode;
			echo '<br> ----------------------------------<br>';*/
			$comple_url = 'http://jigsaw.w3.org/css-validator/validator?uri='.$url_encode.'&warning=0&profile=mobile' ; 
			/*echo $comple_url;
			echo '<br>----------------------------------<br>';*/
			$options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
			/*echo $options;
			echo '<br> ----------------------------------<br>';*/
			$context  = stream_context_create($options);
			/*echo $context;
			echo '<br> ----------------------------------<br>';*/
			$jsonText = file_get_contents($comple_url, false, $context);
		}
		public function __toString(){
			return $this->xml .'<br>'. $this->errorXml;
			// return $jsonText;
			//echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			//$jsonArray = json_decode($jsonText, false);
		}
	}

 //curl -H 'Content-Type: application/json' --data '{url: "http://cinemaneverland.alwaysdata.net/"}' 'https://searchconsole.googleapis.com/v1/urlTestingTools/mobileFriendlyTest:run?key=AIzaSyA4WVYApWoOhrC55TBF2purhUcO8M1K_cg'

?>
