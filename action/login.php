<?php 

require_once "config.php";

$dataBinded=array(
    ':name'   => $_POST['name'],
    ':password'=> "€df:gù*:dcv65zefr53é#24.'".$_POST['password']
);


$sql = "SELECT id, name, email, img, admin, as_portfolio FROM users WHERE name = :name AND password = SHA1(:password)";
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);
$user = $pre->fetch(PDO::FETCH_ASSOC);

/*  Vérifie si l'utilisateur a rentré le bon mot de passe et username*/

if ($user == []) {
    $dataBinded=array(
        ':email'   => $_POST['name'],
        ':password'=> "€df:gù*:dcv65zefr53é#24.'".$_POST['password']
    );
    
    $sql = "SELECT id, name, email, img, admin, as_portfolio FROM users WHERE email = :email AND password = SHA1(:password)";
    $pre = $pdo->prepare($sql);
    $pre->execute($dataBinded);
    $email = $pre->fetch(PDO::FETCH_ASSOC);

    if ($email == []) {
        $_SESSION['toast'][] = [
            'text' => 'Mot de passe, mail ou nom incorrecte' ,
            'classes' => $_SESSION["toastConfig"]["redToast"]
        ];
        $_SESSION['modal'] = "login";
        $dataBinded=array(
            ':email'   => $_POST['name'],
            ':password'=> "€df:gù*:dcv65zefr53é#24.'".$_POST['password']
        );
    }else{
        $_SESSION['user'] = $email;
        $_SESSION['toast'][] = [
            'text' => 'Bienvenue '.$_SESSION['user']['name'] ,
            'classes' => $_SESSION["toastConfig"]["greenToast"]
        ];
    }
}else{
    $_SESSION['user'] = $user;
    $_SESSION['toast'][] = [
        'text' => 'Bienvenue '.$_SESSION['user']['name'] ,
        'classes' => $_SESSION["toastConfig"]["greenToast"]
    ];
}

require_once "go-back.php";
?>