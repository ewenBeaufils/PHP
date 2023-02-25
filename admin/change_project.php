<?php
require_once "../action/config.php";
require_once "security.php";
require_once "upload_file.php";

if (isset($_POST['id_user'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':id_user'   => $_POST['id_user']
    );
    $sql = "UPDATE `projects` SET id_user=:id_user WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

$destination = upload('img_caraousel', $_POST["id"], 'img_carousel', 'projects', $pdo);

if (isset($destination)) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':img_carousel'   => $destination
    );
    $sql = "UPDATE `projects` SET img_carousel=:img_carousel WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

$destination = upload('img_pres', $_POST["id"], 'img_pres', 'projects', $pdo);

if (isset($destination)) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':img_pres'   => $destination
    );
    $sql = "UPDATE `projects` SET img_pres=:img_pres WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

if (isset($_POST['title'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':title'   => $_POST['title']
    );
    $sql = "UPDATE `projects` SET title=:title WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

if (isset($_POST['description'])) {
    $dataBinded=array(
        ':id'   => $_POST['id'],
        ':description'   => $_POST['description']
    );
    $sql = "UPDATE `projects` SET description=:description WHERE id=:id";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
}

$dataBinded=array(
    ':id'   => $_POST['id']
);
$sql = "DELETE FROM `skills_projects` WHERE id_projects=:id";
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

$sql = "SELECT * FROM skills";
$pre = $pdo->prepare($sql);
$pre->execute();
$skills = $pre->fetchAll(PDO::FETCH_ASSOC);

foreach ($skills as $skill) {

    if (isset($_POST[str_replace(' ', '|-|', $skill['title'])])) {
        $dataBinded=array(
            ':id_project'   => $_POST['id'],
            ':id_skill'   => $skill['id']
        );
        $sql = "INSERT INTO `skills_projects`(`id_projects`, `id_skills`) VALUES (:id_project,:id_skill)";
        $pre = $pdo->prepare($sql);
        $pre->execute($dataBinded);
    }
}

$_SESSION['toast'][] = [
    'text' => 'Projet sauvgardé' ,
    'classes' => $_SESSION["toastConfig"]["greenToast"]
];
require_once "../action/go-back.php";