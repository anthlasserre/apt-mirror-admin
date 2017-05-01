<!DOCTYPE HTML>
<html>
  <head>
    <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
    <title>Mirroir Debian Admin | Control Panel</title>
    <link rel="icon" type="image/png" href="./images/aptMirrorLogo.png" />
    <link rel="stylesheet" type="text/css" href="./style.css">
  	<link rel="stylesheet" href="./css/font-awesome/font-awesome.min.css">
  	<link rel="stylesheet" href="./css/font-awesome/font-awesome.css">
  </head>
  <body>

    <!-- HEADER -->
    <div id="header">
    <h1>Mirroir Debian Admin | Control Panel</h1>
    <p style="text-align:center; margin-top:-22px">Cette page permet de visualiser le fonctionnement et de configurer le serveur Mirroir Debian<br>
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
    <ul id="menu_horizontal">
      <li class="bouton_gauche"><i class="fa fa-home"></i> <b>Accueil</b></li>
      <li class="bouton_gauche"><i class="fa fa-cogs"></i> <a href="./configuration.php">Configuration</a></li>
      <li class="bouton_gauche"><i class="fa fa-wrench"></i> <a href="./installation.php">Installation</a></li>
      <li class="bouton_droite"><i class="fa fa-envelope"></i> <a href="./contact.php">Contact</a></li>
    </ul>
    <hr/>
    </div>

    <!-- CONTENT -->
    <div id="content">
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
