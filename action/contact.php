<?php
require_once "config.php";

$headers = array('MIME-Version: 1.0','Content-type: text/html; charset=utf8');
$emailGwen = "gacquart-reylans@gaming.tech";
$emailEwen = "ebaufils@gaming.tech";
$objet = $_POST['object'];
$content = "send by ".$_POST['name']." with the mail ".$_POST['email']."<br><br>".$_POST['content'];

if(mail($emailGwen,$objet,$content,$headers) || mail($emailEwen,$objet,$content,$headers)){
    $objet = $_POST['name'].", your mail is correctly send";
    $content = $_POST['content'];
}else{
    $objet = $_POST['name'].", your mail is don't send";
    $content = "You have an error on your mail, but you can try again";
}
$email = $_POST['email'];
mail($email,$objet,$content,$headers);
include "./go-back.php";
?>