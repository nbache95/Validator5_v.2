<?php

	class ValidationHtml {
		
		public $url;
		public $json;
		
		public function __construct ($url){
			
			$this->url = $url;
			$url_encode = urlencode($url);
			/*echo $url_encode;
			echo '<br> ----------------------------------<br>';*/
			$comple_url = 'https://html5.validator.nu/?doc='.$url_encode.'&out=json' ; 
			/*echo $comple_url;
			echo '<br>----------------------------------<br>';*/
			$options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
			/*echo $options;
			echo '<br> ----------------------------------<br>';*/
			$context  = stream_context_create($options);
			/*echo $context;
			echo '<br> ----------------------------------<br>';*/
			$jsonText = file_get_contents($comple_url, false, $context);
			print_r($jsonText);

			echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			$jsonArray = json_decode($jsonText, false);
			echo '<pre>';
			print_r($jsonArray);
			echo '</pre>';


			}


		}






?>
