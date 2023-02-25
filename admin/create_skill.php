<?php
require_once "../action/config.php";
require_once "security.php";

$sql = "INSERT INTO `skills` (`title`, `icone`, `soft`) VALUES ('empty', 'fa-solid fa-square-xmark', '0')";
$pre = $pdo->prepare($sql);
$pre->execute();

$_SESSION['toast'][] = [
    'text' => 'skill créer avec succès' ,
    'classes' => $_SESSION["toastConfig"]["greenToast"]
];
require_once "../action/go-back.php";