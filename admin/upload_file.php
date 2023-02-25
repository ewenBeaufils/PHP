<?php
//sauvegarder le fichier dans un dossier spécifique



function upload($img, $id, $place, $bdd, $pdo){
    if ($_FILES[$img]['name'] != '') {
        $destination = "upload/".$_FILES[$img]['name']; //dossier "upload"
        move_uploaded_file($_FILES[$img]['tmp_name'],"../".$destination);
    } else {
        $dataBinded=array(
            ':id'   => $id
        );
        $sql = "SELECT * FROM $bdd WHERE id=:id";
        $pre = $pdo->prepare($sql);
        $pre->execute($dataBinded);
        $imgUpload = $pre->fetch(PDO::FETCH_ASSOC);
        $destination = $imgUpload[$place];
    }
    return $destination ;
}
?>