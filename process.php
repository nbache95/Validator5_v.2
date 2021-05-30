<?php
include_once('./class/api_html.class.php');
include_once('./class/api_css.class.php');
include_once('./class/api_lien.class.php');
include_once('./class/api_mobile.class.php');
include_once('./class/api_accessibilite.class.php');

$url = $_POST['url'];
$checkValued = array();
$checkValued = $_POST['checkUrl'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title> Validateur norme w3c </title>
        <link rel="stylesheet" type="text/css" href="./assets/style.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="icon" href="./assets/check-circle-regular.png">
    </head>
    <body>
        <div class="container">
            <h1>Résultat de la validation </h1>
            <?php

            //$ctrl=sizeof($checkValued);

            echo"<p>Vous avez choisi de faire ces vérifications:</p><br>";
            if(is_array($checkValued)){
                foreach ($checkValued as $valeur){
                    echo $valeur.".<br>";
                    if($valeur == 'checkCSS'){
                        $valCss = new ValidationCss($url);
                        $valCss->setValUrlCss();
                        echo($valCss);
                        echo '<div><a href="./index.php">Retour à la page d\'accueil</a></div>';
                    }
                    if($valeur == 'checkhtml'){
                        $valHtml = new ValidationHtml($url);
                        $valHtml->setValUrlHtml();
                        echo '<pre>';
                        print_r($valHtml);
                        echo '</pre><br>';
                        echo '<div><a href="./index.php">Retour à la page d\'accueil</a></div>';
                    }
                    if ($valeur == 'checkMobileV'){
                        $valMobile = new ValidationMobile($url);
                        $valMobile->setValUrlMobile();
                        echo '<pre>';
                        print_r($valMobile);
                        echo '</pre><br>';
                        echo '<div><a href="./index.php">Retour à la page d\'accueil</a></div>';
                    }
                    if ($valeur == 'checkLink'){
                        $valLien = new ValidationLien($url);
                        $valLien->setValUrlLien();
                        echo($valLien);
                        echo '<div><a href="./index.php">Retour à la page d\'accueil</a></div>';
                    }
                    if ($valeur == 'checkAccess'){
                        echo 'La validation de l\'accessibilité sera bientôt disponible.';
                        echo '<div><a href="./index.php">Retour à la page d\'accueil</a></div>';
                        // $valAccessibilite = new ValidationAccessibilite($url);
                        // $valAccessibilite->setValAccessibilite();
                        // echo($valAccessibilite);
                    }
                }
            }else{ echo "ce n'est pas un tableau<br>";}

            ?>
            
        </div>
    </body>
</html>

<?php





//$tailleJsonHTML = $valHtml.message.length();
//echo $tailleJsonHTML;

//for($i=0; $i<=$tailleJsonHTML; $i++){
    
//}

// foreach ($valHtml->message as $row){
//     print_r($row->message->type);

// }

/*$site = file_get_contents('https://html5.validator.nu/?doc='.$url.'&out=xml');
echo nl2br($site); */

/*$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,'https://html5.validator.nu/?doc='.$url.'&out=xml');
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Validator5');
$query = curl_exec($curl_handle);
$info = curl_getinfo($curl_handle);
echo $info; 
curl_close($curl_handle);*/


/*$return = json_decode (file_get_contents($comple_url), true); 
echo $return ; */



//$response = file_get_contents('http://domain/path/to/uri', false, $context);
?>
