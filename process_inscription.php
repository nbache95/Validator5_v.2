<?php 
// début phpMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

include_once("./class/register.class.php"); 
include_once("./class/database.class.php");


$name = $_POST["nom"];
$surname = $_POST["prenom"];
$email_to = $_POST["email"];
$soc = $_POST["societe"];
$pass1 = $_POST["mdp"];
$pass2 = $_POST["mdpCheck"];

$longueurKey = 15;
$key = "";
for($i=1;$i<$longueurKey;$i++) {
$key .= mt_rand(0,9);
}

$mail = new PHPMailer(true);
try {
    $name = $_POST["nom"];
$surname = $_POST["prenom"];
$email_to = $_POST["email"];
$soc = $_POST["societe"];
$pass1 = $_POST["mdp"];
$pass2 = $_POST["mdpCheck"];
    $mail->SMTPDebug = 0;                                               //Enable verbose debug output
    $mail->IsSMTP();                                            
    $mail->Host = 'smtp-validator5.alwaysdata.net';                      //Adresse IP ou DNS du serveur SMTP
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = 'validator5@alwaysdata.net';                    //SMTP username
    $mail->Password   = 'mdpProjet5*';                                  //SMTP password
    //$mail->SMTPSecure = 'ssl';                                      
    $mail->Port       = 587;                                            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPSecure = 'tls';                                            //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    // $mail->Port = 465;                                              //Port TCP du serveur SMTP
    // $mail->SMTPAuth = 1;                                            //Utiliser l'identification
    // $mail->CharSet = 'UTF-8';                                       //Format d'encodage à utiliser pour les caractères
    
    // if($mail->SMTPAuth){
    //    $mail->SMTPSecure = 'ssl';                                   //Protocole de sécurisation des échanges avec le SMTP
    //    $mail->Username   =  'noreply.validator5@gmail.com';         //Adresse email à utiliser
    //    $mail->Password   =  'password';                             //Mot de passe de l'adresse email à utiliser
    // }
    
    //$mail->smtpConnect();
    
    // $mail->setFrom       =  'noreply.validator5@gmail.com';            //L'email à afficher pour l'envoi
    // $mail->FromName   = 'Contact de Validator5';                    //L'alias à afficher pour l'envoi
    
     //Recipients
     $mail->setFrom('validator5@alwaysdata.net', 'Validator5');
    //  $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
     $mail->addAddress("$email_to", $name);               //Name is optional
    //  $mail->addReplyTo('info@example.com', 'Information');
     $mail->addCC('projet5.lpi@gmail.com');
    //  $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8'; 
    $mail->Subject = 'Confirmation d\'inscription | validator5';
    $mail->Body    = '<p>Plus qu\'une étape avant de finir votre inscription, veuillez cliquer sur le lien ci-dessous :</p>
                        <a href="https://validator5.alwaysdata.net/confirmation.php?pseudo='.urlencode($email_to).'&key='.$key.'">Cliquez ici</a>';
    $mail->AltBody = 'Plus qu\'une étape avant de finir votre inscription, veuillez copier le lien suivant dans votre barre de recherche : https://validator5.alwaysdata.net/confirmation.php?pseudo='.urlencode($email_to).'&key='.$key;

    $mail->send();
    echo 'Message has been sent';
    // $mail->Subject    =  'Mon sujet';                               //Le sujet du mail
    // $mail->WordWrap   = 50; 			                            //Nombre de caracteres pour le retour a la ligne automatique
    // $mail->AltBody = 'Mon message en texte brut'; 	                //Texte brut
    // $mail->IsHTML(false);                                           //Préciser qu'il faut utiliser le texte brut
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// if($Use_HTML == true){
//    $mail->MsgHTML('<div>Mon message en <code>HTML</code></div>'); 		                //Le contenu au format HTML
//    $mail->IsHTML(true);
// }

// $mail->addBCC('projet5.lpi@gmail.com','vérification envoie mail');
// $mail->send();
// if (!$mail->send()) {
//     echo $mail->ErrorInfo;
// } else{
//     echo 'Message bien envoyé';
// }

//echo "---".$pass1; 

$reg = new Register($name, $surname, $email_to, $soc, $pass1, $pass2); //, $key
//echo $reg; 

$reg->add_user();
?>