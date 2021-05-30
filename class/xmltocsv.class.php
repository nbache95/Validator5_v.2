<?php

	class jsonToCsv {
		
		public $xml;
		public $csv;
		
		public function __construct ($xml){
			$this->xml = $xml;
		}
		public function convertJsonToCsv($xmlString){
			$xml = simplexml_load_string($xmlString);
	
            $header = false;
            
            $csv = '';
            
            foreach($xml as $key => $value){
                if(!$header) {
                    $csv .= implode(array_keys(get_object_vars($value)), ',');			
                    $header = true;
                }
                $csv .= nl2br("\n");
                $csv .= implode(get_object_vars($value), ',');
            }
			
		}


		public function __toString(){
			// print_r($jsonText);
			return $this->csv;
			// echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			// $jsonArray = json_decode($jsonText, false);
			// echo '<pre>';
			// print_r($jsonArray);
			// echo '</pre>';
		}
		}


?>
