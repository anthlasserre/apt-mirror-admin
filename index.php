<!DOCTYPE HTML>
<html>
  <head>
    <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
    <title>Mirroir Debian Admin | Control Panel</title>
    <link rel="icon" type="image/png" href="./images/aptMirrorLogo.png" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap/css/bootswatch_solar.css">
  	<link rel="stylesheet" href="./css/font-awesome/font-awesome.min.css">
  	<link rel="stylesheet" href="./css/font-awesome/font-awesome.css">
  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./css/bootstrap/js/bootstrap.min.js"></script>

    <!-- HEADER -->
    <div id="header">
    <h1 class="head-title">Mirroir Debian Admin | Control Panel</h1>
    <p style="text-align:center; margin-top:-10px">Cette page permet de visualiser le fonctionnement et de configurer le serveur Mirroir Debian<br>
                                  Pour contribuer au développement de cet outil ayant l'objectif de devenir un jour un paquet Debian<br>
                                  Aller sur le repository <b><a href="https://github.com/anthlasserre/aptMirrorAdmin" target="_blank"><i class="fa fa-github"></i></a></b></p>
    <p class="connect"><?php
    include('./info/userConnected.php');
    if ($_SESSION['login_user'] == "root") {
      echo 'Bonjour ' . $_SESSION['login_user'] . '<br>';
      ?><p class="connect"><a href="./include/logout.php">Se déconnecter</a></p>
    <?php }
    else {
      ?><p class="connect"><a href="./include/login.php">Se connecter</a></p><?php
    }
    ?>



    <!-- MENU -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AptMirrorAdmin</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Accueil <span class="sr-only">(current)</span></a></li>
            <li><a href="./configuration.php">Configuration</a></li>
            <li class="dropdown">
              <a href="./installation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Installation <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="./installation_client.php">Installation Client</a></li>
                <li><a href="./installation_serveur.php">Installation Serveur</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Rechercher un paquet">
            </div>
            <button type="submit" class="btn btn-default">Rechercher</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- CONTENT -->
    <div id="content">

      <div class="jumbotron">
        <h1>aptMirrorAdmin</h1>
        <p>Un outil hors du commun vous permettant de piloter votre mirroir debian en toute sécurité.</p>
        <p><a class="btn btn-primary btn-lg" href="./installation_client.php">En savoir plus</a></p>
      </div>
      <p>Ceci est un prototype, il n'est pas encore en production. Veuillez contribuer au développement sur <b><a href="https://github.com/anthlasserre/aptMirrorAdmin" target="_blank"><i class="fa fa-github"></i></a></b>.</p>
      <div class="progress progress-striped active">
        <div class="progress-bar" style="width: 70%"></div>
      </div>
      <h2 style="text-align:center">Voici les paquets utilisés par aptMirrorAdmin</h2>
      <img src="./images/aptMirrorLogo.png" alt="aptMirror Logo" height="190px">
      <div id="aptmirror">
          <p><?php
          include "./info/nbPaquets.php";
          include "./info/version.php";
          include "./info/lastDownloadFiles.php";
          echo '<b>Nom du paquet: </b> apt-mirror <br>';
          echo '<b>Version serveur: </b> apt-mirror ' . substr($version, 30, 8) . "<br>";
          echo '<b>Version client: </b> Debian-8.7.1-amd64  <br><br>';
          echo '<b>Nombres de paquets installés: </b>' . substr($nbPaquets, 0, 7) . "<br>";
          echo '<b>Derniers téléchargements de fichiers: </b>' . $lastDownloadFiles;
        ?></p>
      </div>
      <img src="./images/apacheLogo.png" alt="Apache Logo" width="250px" style="margin-top:30px">
      <div id="apache">
          <p><?php
          include "./info/apacheVersion.php";
          echo '<b>Nom du paquet: </b> apache2 <br>';
          echo '<b>Version serveur: </b> ' . substr($apacheVersion,16,24) . "<br>";
        ?></p>
      </div>
      <img src="./images/mysqlLogo.png" alt="mySQL Logo" height="100px" width="250px" style="margin-top:10px">
      <div id="mysql">
          <p><?php
          include "./info/mysqlVersion.php";
          echo '<b>Nom du paquet: </b> mysql-server <br>';
          echo '<b>Version serveur: </b> ' . substr($mysqlVersion,12) . "<br>";
        ?></p>
      </div>
      <img src="./images/phpmyadminLogo.png" alt="phpmyadmin Logo" height="150px" width="250px" style="margin-top:0px">
      <div id="phpmyadmin">
          <p><?php
          include "./info/phpmyadminVersion.php";
          echo '<b>Nom du paquet: </b> phpmyadmin <br>';
          echo '<b>Version: </b> ' . "<br>";
          echo '<b>Lien: </b> <a href="' . 'http://' . $_SERVER['HTTP_HOST'] . '/phpmyadmin' . "\" target=\"_blank\">phpmyadmin</a><br>";
        ?></p>
      </div>
    </div>
    <!-- FOOTER -->
    <div id="footer">
      <hr/>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>
  </body>
</html>
