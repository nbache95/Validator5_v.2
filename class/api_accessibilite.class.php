<?php

	class ValidationAccessibilite {
		
		public $url;
		public $out;
		
		/**
		 * construct method of ValidationHtml
		 * @param string $url
		 */
		public function __construct ($url)
		{
			$this->url = $url;
		}
		public function setValAccessibilite(){
			$url_encode = urlencode($this->url);
			echo $url_encode;
			echo '<br> ----------------------------------<br>';
			$comple_url = 'https://www.webaccessibility.com/results/?url='.$url_encode;  //https://html5.validator.nu/?doc=
			echo $comple_url;
			// echo '<br>----------------------------------<br>';
			// $options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
			// echo $options;
			// echo '<br> ----------------------------------<br>';
			// $context  = stream_context_create($options);
			// echo $context;
			echo '<br> ----------------------------------<br>';
			$this->out = file_get_contents($comple_url, false);//, $context
			//print_r($jsonText);
		}
		public function __toString(){
			return $this->out;
			// echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			// $jsonArray = json_decode($jsonText, false);
			// echo '<pre>';
			// print_r($jsonArray);
			// echo '</pre>';
		}
	}
?>
