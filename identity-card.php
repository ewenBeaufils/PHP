<?php
include 'include.php';
headerPage($pdo);

if (!isset($_GET['id'])) {
    require_once "go-back.php";
}

$sql = "SELECT id, name, img, description FROM users WHERE as_portfolio = 1 AND id=:id " ; 
$dataBinded=array(
    ':id'   => $_GET['id']
);
$pre = $pdo->prepare($sql); 
$pre->execute($dataBinded);
$card = $pre->fetchAll(PDO::FETCH_ASSOC);

if (count($card)!=1) {
    require_once "go-back.php";
}
$card = $card[0];

$sql = "SELECT p.title, p.description , p.img_carousel, p.img_pres FROM projects as p where p.id_user = :id";
$dataBinded=array(
    ':id'   => $_GET['id']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);
$projects = $pre->fetchAll(PDO::FETCH_ASSOC);


?>

    <!-- Infos -->
    <div class="container">
        <div class="row padding-info">
            <img class="col s12 m5 border-radius responsive-img animateanimated animatebounceInLeft" src="<?= $card['img'] ?>" alt="Photo de <?= $card['name'] ?>">
            <div class="col s12 l6 offset-l1 m7">
                <h1 class="center animateanimated animaterubberBand"><?= $card['name'] ?></h1>
                <p class="animateanimated animatezoomInUp"><?= $card['description'] ?></p>
            </div>
        </div>
    </div>



<?php
footerPage($pdo);