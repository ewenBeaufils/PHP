<?php
require_once "../action/config.php";
require_once "security.php";

$sql = "SELECT id FROM `users` WHERE as_portfolio = 1";
$pre = $pdo->prepare($sql);
$pre->execute();
$idUser = $pre->fetchAll(PDO::FETCH_ASSOC);

$sql = "INSERT INTO `projects`(id_user,img_carousel, img_pres, title, description) VALUES (:id, 'NULL', 'NULL', 'empty','empty')";

$dataBinded=array(
    ':id'   => $idUser[0]['id'],
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

$_SESSION['toast'][] = [
    'text' => 'Projet créer avec succès' ,
    'classes' => $_SESSION["toastConfig"]["greenToast"]
];
require_once "../action/go-back.php";