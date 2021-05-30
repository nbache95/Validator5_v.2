<?php

	class ValidationHtml {
		
		public $url;
		public $json;
		public $matchesReturn;
		
		/**
		 * construct method of ValidationHtml
		 * @param string $url
		 */
		public function __construct ($url)
		{
			$this->url = $url;
			
		}
		public function getUrl (){
			return $this->url;
		}

		public function setValUrlHtml (){
			$word = file_get_contents($this->url); //real life example :/
			preg_match_all('#(?:src|href|path|xmlns(?::xsl)?)\s*=\s*(?:"|\')\s*(.+)?\s*(?:"|\')#Ui', $word, $matches);//PREG_PATTERN_ORDER
			$this->matchesReturn = $matches;
			// echo '<pre>';
			// var_dump($matches);
			// echo '</pre>';
			foreach ($matches[1] as $match){
			    $url1 = $match[0].$match[1];
                //echo "<br><br> $url1 <br>";
                $lastCaract = substr($this->url, -1, 1);
               // echo $lastCaract;   
                echo '<br />';
                // if($lastCaract == "/"){
                //     if(!$urlConcat[0] == "/"){
                //         $url_encode = urlencode($this->url . $match);
                //         echo $url_encode;
                //         echo '<br>';
                //     }
                //     else if($url1 == './'){
                //         $url_encode = urlencode($this->url . $match);
                //         echo $url_encode;
                //     }
                //     else{
                //         $url_encode = urlencode($this->url . $match);
                //         echo $url_encode;
                //     }
                // }
                // else {
                //     echo '<br>';
                //     if($match[0] == '/'){
                //         $url_comple = $this->url.$match;
                //         echo urlencode($url_comple)."<br>";
                //     }
                //     else if($url1 == './'){
                //         $url_comple = "$this->url/".substr($match, 2);
                //         echo urlencode($url_comple);
                //     }
                //     else{
                //         $url_comple = "$this->url/$match";
                //         echo urlencode($url_comple);
                //     }
                // }
				$url_encode = urlencode($this->url . '/' . $match);
				// // echo '<br>-----------';
				// var_dump($url_encode);
				// echo '<br> ----------------------------------<br>';
				$comple_url = 'https://validator.w3.org/nu/?doc='.$url_encode.'&out=json' ;  //https://html5.validator.nu/?doc=
				// echo $comple_url;
				// echo '<br>----------------------------------<br>';
				$options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
				// echo $options;
				// echo '<br> ----------------------------------<br>';
				$context  = stream_context_create($options);
				// echo $context;
				// echo '<br> ----------------------------------<br>';
				$this->json = file_get_contents($comple_url, false, $context);
				echo '<pre>'.$this->json.'</pre>';
				$jsonArray = json_decode($this->json, false);
				// echo $jsonArray;
			}
			// $url_encode = $this->url . $url_encode;
			// echo '<br>-----------';
			// var_dump($url_encode);
			//$sujet = $this->url; il faut récupérer le contenu de la page
			//$patern = $this->url;
			// $url_encode = urlencode($this->url);
			//echo $url_encode;
				// echo '<br> ----------------------------------<br>';
				// $comple_url = 'https://validator.w3.org/nu/?doc='.$url_encode.'&out=json' ;  //https://html5.validator.nu/?doc=
				// echo $comple_url;
				// echo '<br>----------------------------------<br>';
				// $options  = array('http' => array('user_agent' => 'User-Agent: W3C Validation bot'));
				// echo $options;
				// echo '<br> ----------------------------------<br>';
				// $context  = stream_context_create($options);
				// echo $context;
				// echo '<br> ----------------------------------<br>';
				// $this->json = file_get_contents($comple_url, false, $context);
				// $jsonArray = json_decode($this->json, false);
			//print_r($jsonText);
		}


		public function __toString(){
			return '<br> ----------------------------------<br><br><br><br><br><br><br><br><br><br><br><br><br> <pre>' .$this->json .'</pre>';
		}
	}
?>
