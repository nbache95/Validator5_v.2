<?php

$word = file_get_contents('https://validator5.alwaysdata.net'); //real life example :/
preg_match_all('#(?:src|href|path|xmlns(?::xsl)?)\s*=\s*(?:"|\')\s*(.+)?\s*(?:"|\')#Ui', $word, $matches);
echo '<pre>';
var_dump($matches);
echo '</pre>';


/*$subject = file_get_contents('https://validator5.alwaysdata.net');
$pattern ='#(?:src|href|path|xmlns(?::xls)?)\s*=\s*(?:"|\')\s*(.+?)\s*(?\s*(?:"|\')#Ui';
$matches = array();
$result = if(@preg_match_all($pattern, $subject, $matches);)
var_dump($result);
echo '<br>'. $matches;*/
// $subject = file_get_contents($url);
// preg_match_all($patern, $matches);
// $paesingUrl = parse_url($url);
// $i=0;
// foreach ($matches[1] as $match){
//     $parsing = parse_url($match);
//     if ($parsing["scheme"]){
//         $ch = curl_init($match);
//         curl_setopt($ch, CURLOPT_FAILONERROR, true);
//         curl_setopt($ch, CURLOPT_NOBODY, true);
//         if (curl_exec($ch)=== false){
//             echo "qlqc";
//             $i++;
//         }
//         else{
//             continue;
//         }
//         curl_close($ch);
//     }
// }




?>
