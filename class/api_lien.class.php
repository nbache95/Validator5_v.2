<?php

	class ValidationLien {
		
		public $url;
		public $lien;
		
		public function __construct ($url){
			$this->url = $url;
			}
		public function setValUrlLien(){
			$url_encode = urlencode($this->url);
			echo $url_encode;
			echo '<br> ----------------------------------<br>';
			//$comple_url = 'https://validator.w3.org/checklink?uri='.$url_encode.'&hide_type=all&depth=&check=Check';  //&hide_type=dir&depth=&check=Vérifier#results1
			$comple_url ='https://validator.w3.org/checklink?uri='.$url_encode.'&hide_type=dir&depth=&check=V%C3%A9rifier#results1';
			echo $comple_url;
			echo '<br>----------------------------------<br>';
			$options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
			echo $options;
			echo '<br> ----------------------------------<br>';
			$context  = stream_context_create($options);
			echo $context;
			echo '<br> ----------------------------------<br>';
			$this->lien = file_get_contents($comple_url, false, $context);
			
		}


		public function __toString(){
			// print_r($jsonText);
			return $this->lien;
			// echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			// $jsonArray = json_decode($jsonText, false);
			// echo '<pre>';
			// print_r($jsonArray);
			// echo '</pre>';
		}
		}


?>
