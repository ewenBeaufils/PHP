<?php
require_once "action/config.php"; 

function headerPage($pdo) {
  unset($_SESSION['HTTP_REFERER']);

  $sql = "SELECT id, name FROM users WHERE as_portfolio=1";
  $pre = $pdo->prepare($sql);
  $pre->execute();
  $users = $pre->fetchAll(PDO::FETCH_ASSOC);

  ?>
  <!DOCTYPE html>
  
  <html lang="fr">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Page Acceuil du portfolio de Gwendal Acquart--Reylans et de Ewen Beaufils.">
    <link rel="shortcut icon" href="#">
    <title>Portfolio Gwendal et Ewen</title>
    <link rel="shortcut icon" href="img/title.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  </head>
  
  <body class="color perso-1">
    <!-- NavBar -->
    <nav class="color perso-2 z-depth-0">
      <div class="nav-wrapper container">
        <a href="" class="brand-logo">Portfolio</a>
        <a href="#" data-target="mobile-links" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="./index.php"><i class="material-icons left">home</i>Home</a></li>
          <li><a href="#contact" class="modal-trigger"><i class="material-icons left">phone</i>Contact</a> </li>
          <li><a href="#" class="dropdown-trigger" data-target="dropdown-team"><i class="material-icons left">group</i>Team</a> </li>
          
          <?php if (!isset($_SESSION['user'])) { ?>
          <li><a href="#signUp" class="modal-trigger"><i class="material-icons left">input</i>Sign Up</a></li>
          <li><a href="#login" class="modal-trigger"><i class="material-icons left">login</i>Login</a></li>
          <?php }else{ ?>
            <?php if ($_SESSION['user']['admin'] == 1) { ?>
            <li><a href="admin.php"><i class="material-icons left">security</i>Admin</a></li>
            <?php } ?>
            <li><a href="#logout" class="modal-trigger"><i class="material-icons left">logout</i>Logout</a></li>
          <?php } ?>
        </ul>

        <!-- Dropdown menu -->

        <ul id="dropdown-team" class="dropdown-content color perso-2">
          <li><a href="#team" class="white-text">Team</a></li>
          <?php foreach ($users as $dropUser) { ?>
            <li><a href="./identity-card.php?id=<?= $dropUser['id'] ?>" class="white-text"><?= $dropUser['name'] ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </nav>
    <header>
      <div class="parallax-container">
        <div class="parallax"><img src="img/image-nav-bar.jpg" alt="Voie lactée en parallaxe"></div>
      </div>
    </header>
    <ul class="sidenav color perso-2" id="mobile-links">
      <li><a href="" onclick="sidenavClose()" class="white-text"><i class="material-icons left">home</i>Home</a> </li>
      <li><a href="#team" onclick="sidenavClose()" class="white-text"><i class="material-icons left">phone</i>Team</a></li>
      <li><a href="#contact" onclick="sidenavClose()" class="modal-trigger white-text"><i class="material-icons left">group</i>Contact</a></li>
          <?php if (!isset($_SESSION['user'])) { ?>
          <li><a href="#signUp" class="modal-trigger white-text"><i class="material-icons left">input</i>Sign In</a></li>
          <li><a href="#login" class="modal-trigger white-text"><i class="material-icons left">login</i>Login</a></li>
          <?php }else{ ?>
            <?php if ($_SESSION['user']['admin'] == 1) { ?>
            <li><a href="admin.php" class=" white-text"><i class="material-icons left">security</i>Admin</a></li>
            <?php } ?>
            <li><a href="#logout" class="modal-trigger white-text"><i class="material-icons left">logout</i>Logout</a></li>
          <?php } ?>
    </ul>


    <!-- Contact -->
    <div class="container">
      <div class="modal color perso-2 border-radius" id="contact">
        <form action="./action/contact.php" method="post">
          <div class="row">
            <div class="input-field col s12 l5">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" id="name-input" class="name" name="name">
              <label for="name-input">NOM Prénom</label>
            </div>
            <div class="input-field col s12 l7">
              <i class="material-icons prefix">mail</i>
              <input type="text" id="email-input" class="email" name="email">
              <label for="email-input">Email</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">star</i>
              <input type="text" id="object-input" class="object" name="object">
              <label for="object-input">Sujet</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">textsms</i>
              <textarea id="message-input" class="message materialize-textarea" name="message"></textarea>
              <label for="message-input">Message</label>
            </div>
          </div>
          <div class="modal-close color perso-2 center" id="suprise">
            <button class="btn waves-effect waves-light">
              <input type="submit" value="Envoyer">
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>

    <?php if (!isset($_SESSION['user'])) { ?>
      
    <!-- Login -->
    <div class="container">
      <div class="modal color perso-2 border-radius" id="login">
        <form action="action/login.php" method="post">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" id="pseudo-input" class="name" name="name">
              <label for="pseudo-input">NOM Prénom ou Mail</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">lock</i>
              <input type="password" id="password" class="object" name="password">
              <label for="password">Mot de passe</label>
            </div>
          </div>
          <div class="modal-close color perso-2 center" id="suprise">
            <button class="btn waves-effect waves-light">
              <input type="submit" value="Envoyer">
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>

  <!-- Sign up -->
  <div class="container">
    <div class="modal color perso-2 border-radius" id="signUp">
      <form action="action/singup.php" method="post">
        <div class="row">
          <div class="input-field col s12 l5">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" id="pseudo-signUp" class="name" name="name">
            <label for="pseudo-signUp">NOM Prénom</label>
          </div>
          <div class="input-field col s12 l7">
              <i class="material-icons prefix">mail</i>
              <input type="email" id="email-signUp" class="email" name="email">
              <label for="email-signUp">Email</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input type="password" id="password-signUp" class="object" name="password">
            <label for="password-signUp">Mot de passe</label>
          </div>
        </div>
        <div class="modal-close color perso-2 center" id="suprise">
          <button class="btn waves-effect waves-light">
            <span>Envoyer</span>
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>

      <?php }else{ ?>

  <!-- Logout -->
  <div class="container">
      <div class="modal color perso-2 border-radius" id="logout">
      <form action="action/logout.php" method="post">
          <p> Êtes-vous sûr de vouloir vous déconnecter ? </p>
          <div class="modal-close color perso-2 center" id="suprise">
            <button class="btn waves-effect waves-light">
              <span>Se déconnecter</span>
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>
  <?php
    }
}
function footerPage() {
  ?>
    <!-- Footer -->
    <footer class="page-footer color perso-2">
      <div class="footer-copyright">
        <div class="container">
          <p class="left">&copy; 2022 Copyright ACQUART--REYLANS Gwendal</p>
          <p class="right">&copy; 2022 Copyright BEAUFILS Ewen</p>
        </div>
      </div>
    </footer>

    <!-- Easter Egg -->
    <div class="easter-gif border-radius">
      <img src="./img/hastley-rick.gif" alt="you rick rolled">
    </div>

    <!-- Scripts js -->
    <script src="https://kit.fontawesome.com/63d128608a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      function changeButton() {
        if ($('.carousel-item.gb').hasClass('active')) {
          $('.btn-change').prop('href', 'gang-beasts.php');
        };
      };
    </script>
    <script src="./scripts/script.js"></script>
    <script>
      <?php
      if (isset($_SESSION['toast'])) {
        foreach ($_SESSION['toast'] as $toast) {
          echo "M.toast({html: '" . $toast['text'] . "', classes: '" . $toast['classes'] . "'});";
        }unset($_SESSION['toast']);
      }
      
      if (isset($_SESSION['modal'])) {
      ?>
        $(document).ready(function(){
          $('#<?= $_SESSION['modal'] ?>').modal('open');
        });
        <?php 
      unset($_SESSION['modal']);} ?>
    </script>

  </body>

  </html>
  <?php
}