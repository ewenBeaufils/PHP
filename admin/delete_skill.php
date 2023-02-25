<?php 
require_once "../action/config.php";
require_once  "security.php";

$sql = "DELETE FROM skills WHERE id = :id";

$dataBinded=array(
    ':id'   => $_POST['id'],
);

$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);

$_SESSION['toast'][] = [
    'text' => 'skill supprimé avec succès' ,
    'classes' => $_SESSION["toastConfig"]["redToast"]
];

require_once "../action/go-back.php";

?>