<?php require_once "action/config.php"; ?><?php
include 'include.php';
headerPage($pdo);

$sql = "SELECT p.title, p.description , p.img_carousel, p.img_pres FROM projects as p join users as u on u.id = p.id_user where u.as_portfolio = 1 and p.id = :id";
$dataBinded=array(
    ':id'   => $_GET['id']
);
$pre = $pdo->prepare($sql);
$pre->execute($dataBinded);
$projects = $pre->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT  * FROM skills WHERE soft = 0";
$pre = $pdo->prepare($sql);
$pre->execute();
$skills = $pre->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT  * FROM skills WHERE soft = 1";
$pre = $pdo->prepare($sql);
$pre->execute();
$softSkills = $pre->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_GET['id'])) {
    require_once "go-back.php";
}

$sql = "SELECT *  FROM projects WHERE id=:id " ; 
$dataBinded=array(
    ':id'   => $_GET['id']
);
$pre = $pdo->prepare($sql); 
$pre->execute($dataBinded);
$url = $pre->fetchAll(PDO::FETCH_ASSOC);

if (count($url)!=1) {
    require_once "go-back.php";
}
$url = $url[0];

?>
    <!-- Content -->
    <div class="section">
      <div class="container">
        <h1 class="center animate__animated animate__rubberBand"><?= $projects["title"]?></h1>
        <img class="responsive-img center-box border-radius animate__animated animate__bounceIn" src="<?= $projects["img_pres"]?>" alt="Image du site Pac Man">
        <div class="row color perso-2 border-radius project-skill">
        <p class="col s12 center"><?= $projects["description"] ?></p>
        <div class="col s12 m4 offset-m1 center color perso-1 border-radius">
            <i class="fa-solid fa-code project-icons"></i>
            <h2 class="animate__animated animate__bounceInLeft">Skills</h2>
            <ul>
            <?php foreach( $skills as $skill) {
                $sql = "SELECT * FROM skills_projects WHERE id_skills=:id_skills AND id_projects=:id";
                $dataBinded=array(
                    ':id'   => $_GET['id'],
                    ':id_skills'   => $skill['id']
                );
                $pre = $pdo->prepare($sql);
                $pre->execute($dataBinded);
                $lien = $pre->fetchAll(PDO::FETCH_ASSOC);
                if (count($lien)>0) {
                ?>
                <li class="animate__animated animate__bounceInLeft"><i class="<?= $skill["icone"]?>"></i> <?= $skill["title"]?></li>
                <?php }} ?>
            </ul>
        </div>
        <div class="col s12 m4 offset-m2 center color perso-1 border-radius">
            <i class="fa-brands fa-connectdevelop project-icons"></i>
            <h2 class="animate__animated animate__bounceInRight">Soft Skills</h2>
            <ul>
                <?php foreach( $softSkills as $softSkill) {
                $sql = "SELECT * FROM skills_projects WHERE id_skills=:id_skills AND id_projects=:id";
                $dataBinded=array(
                    ':id'   => $_GET['id'],
                    ':id_skills'   => $softSkill['id']
                );
                $pre = $pdo->prepare($sql);
                $pre->execute($dataBinded);
                $lien = $pre->fetchAll(PDO::FETCH_ASSOC);
                if (count($lien)>0) {
                ?>
                    <li class="animate__animated animate__bounceInRight"><i class="<?= $softSkill["icone"]?>"></i> <?= $softSkill["title"]?></li>
                <?php }} ?>
            </ul>
        </div>
        </div>
        </div>
    </div>
    
<?php footerPage($pdo) ?>