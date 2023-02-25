<?php 

require_once "config.php";

$_SESSION['toast'][] = [
    'text' => 'A bientôt '.$_SESSION['user']['name'] ,
    'classes' => $_SESSION["toastConfig"]["greenToast"]
];
unset($_SESSION["user"]);

require_once "go-back.php";

?>