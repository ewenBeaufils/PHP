<?php
require_once "../action/config.php";
require_once "security.php";

if (isset($_POST['title'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':title'   => $_POST['title']
    );
    $sql = "UPDATE `skills` SET title=:title WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}
if (isset($_POST['icone'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':icone'   => $_POST['icone']
    );
    $sql = "UPDATE `skills` SET icone=:icone WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}
if (isset($_POST['soft'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':soft'   => $_POST['soft']
    );
    $sql = "UPDATE `skills` SET soft=:soft WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

if (isset($_POST['skills'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':description'   => $_POST['description']
    );
    $sql = "UPDATE `skills` SET description=:description WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

$_SESSION['toast'][] = [
    'text' => 'skill sauvegardée avec succès' ,
    'classes' => $_SESSION["toastConfig"]["greenToast"]
];
require_once "../action/go-back.php";