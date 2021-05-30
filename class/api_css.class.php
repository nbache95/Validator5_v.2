<?php

	class ValidationCss {
		
		public $url;
		public $xml;
		
		/**
		 * construct method of ValidationCss
		 * @param string $url
		 */
		public function __construct ($url){
			$this->url = $url;
		}
		public function setValUrlCss(){
			$url_encode = urlencode($url);
			/*echo $url_encode;
			echo '<br> ----------------------------------<br>';*/
			$comple_url = 'http://jigsaw.w3.org/css-validator/validator?uri='.$url_encode.'&warning=0&profile=css3' ; 
			/*echo $comple_url;
			echo '<br>----------------------------------<br>';*/
			$options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
			/*echo $options;
			echo '<br> ----------------------------------<br>';*/
			$context  = stream_context_create($options);
			/*echo $context;
			echo '<br> ----------------------------------<br>';*/
			$this->xml = file_get_contents($comple_url, false, $context);
			// $jsonArray = json_decode($xmlText, false);
			//echo '<pre>';
			//print_r($jsonArray);
			//echo '</pre>';
		}
		public function __toString(){
			return($this->xml);

			//echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
		}
	}
?>

