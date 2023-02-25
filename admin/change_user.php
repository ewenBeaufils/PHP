<?php
require_once "../action/config.php";
require_once "security.php";
require_once "upload_file.php";


if (isset($_POST['name'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':name'   => $_POST['name']
    );
    $sql = "UPDATE `users` SET name=:name WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}
if (isset($_POST['email'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':email'   => $_POST['email']
    );
    $sql = "UPDATE `users` SET email=:email WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}


$destination = upload('img', $_POST["id"], 'img', 'users', $pdo);

if (isset($destination)) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':img'   => $destination
    );
    $sql = "UPDATE `users` SET img=:img WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}
if (isset($_POST['admin'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':admin'   => $_POST['admin']
    );
    $sql = "UPDATE `users` SET admin=:admin WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}
if (isset($_POST['as_portfolio'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':as_portfolio'   => $_POST['as_portfolio']
    );
    $sql = "UPDATE `users` SET as_portfolio=:as_portfolio WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}
if (isset($_POST['description'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':description'   => $_POST['description']
    );
    $sql = "UPDATE `users` SET description=:description WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

$_SESSION['toast'][] = [
    'text' => 'user sauvegardée avec succès' ,
    'classes' => $_SESSION["toastConfig"]["greenToast"]
];
require_once "../action/go-back.php";