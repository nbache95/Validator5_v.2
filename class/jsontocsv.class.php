<?php

	class jsonToCsv {
		
		public $json;
		public $csv;
		public $fichiercsv;
		
		public function __construct ($json){
			$this->json = $json;
		}
		public function convertJsonToCsv(){
			$jsonDecoded = jspn_decode($this->json, true);
			$this->csv = fopen('file.csv', 'w');
			if (is_array($jsonDecoded)){
				print_r('variable output <br>');
				foreach($jsonDecoded as $line){
					foreach($line as $key => $value){
						if (is_array($value)){
							$line[$key] = $value[0];
						}
					}
					print_r($line);
					if (is_array($line)){
						fputcsv($this->csv,$line);
					}
				}
			}
			$this->fichiercsv = fclose($this->csv);
			var_dump($this->fichiercsv);
			// if (($json = file_get_contents($jfilename)) == false)
            //     die('Error reading json file...');
            // $data = json_decode($json, true);
            // $fp = fopen($cfilename, 'w');
            // $header = false;
            // foreach ($data as $row)
            // {
            //     if (empty($header))
            //     {
            //         $header = array_keys($row);
            //         fputcsv($fp, $header);
            //         $header = array_flip($header);
            //     }
            //     fputcsv($fp, array_merge($header, $row));
            // }
            // fclose($fp);
			
		}


		public function __toString(){
			// print_r($jsonText);
			return 'csv créé<br>' . $this->fichiercsv;
			// echo '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
			// $jsonArray = json_decode($jsonText, false);
			// echo '<pre>';
			// print_r($jsonArray);
			// echo '</pre>';
		}
		}


?>
