<!DOCTYPE html>
<?php require_once "action/config.php";?>
<html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Page easter-egg, ceci est confidentiel.">
    <title>Don't Click</title>
    <link rel="shortcut icon" href="./img/title.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  </head>


  <body class="color perso-1 easter-egg">
    <div class="bubble-text">
      <p class="bubble-content">Bonjour</p>
    </div>
    <div class="robot center-box">
      <img class="responsive-img robot" src="./img/robot-easter-egg.png" alt="Robot Mechant">
    </div>
    <h1 class="center animate__animated animate__rubberBand">
    <button class="btn dont-click border-radius waves-effect waves-light">Don't click</button></h1>

    <!-- Scripts js -->
    <script src="https://kit.fontawesome.com/63d128608a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./scripts/easter-egg.js"></script>
    
  </body>
</html>