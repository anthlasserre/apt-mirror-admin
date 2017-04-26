<!DOCTYPE HTML>
<html>
  <head>
    <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
    <title>Mirroir Debian GRETA</title>
    <link rel="icon" type="image/png" href="./images/aptMirrorLogo.png" />
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.css">
  </head>
  <body>

    <!-- HEADER -->
    <div id="header">
    <h1>Bienvenue sur le Mirroir Debian du GRETA</h1>
    <p style="text-align:center">Cette page permet de visualiser le fonctionnement et la configuration du Mirroir Debian</p>
    <p class="connect"><?php
    include('./include/userConnected.php');
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
      <li class="bouton_gauche"><i class="fa fa-wrench"></i> <a href="./install.php">Installation</a></li>
      <li class="bouton_droite"><i class="fa fa-envelope"></i> <a href="./contact.php">Contact</a></li>
    </ul>
    <hr/>
    </div>

    <!-- CONTENT -->
    <div id="content">
      <img src="./images/aptMirrorLogo.png" alt="aptMirror Logo" height="300px">
      <div id="config">
          <p><?php
          include "./include/nbPaquets.php";
          include "./include/version.php";
          include "./include/lastDownloadFiles.php";
          echo '<b>Nom du paquet: </b> apt-mirror <br>';
          echo '<b>Version serveur: </b> apt-mirror ' . substr($version, 30, 8) . "<br>";
          echo '<b>Version client: </b> Debian-8.7.1-amd64  <br><br>';
          echo '<b>Nombres de paquets installés: </b>' . substr($nbPaquets, 0, 7) . "<br>";
          echo '<b>Derniers téléchargements de fichiers: </b>' . $lastDownloadFiles;
        ?></p>
      </div>
      <div id="syslog">
        <?php echo $syslog = shell_exec('tail -f /var/log/syslog');
        ?>
      </div>
    </div>
    <!-- FOOTER -->
    <div id="footer">
      <hr/>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>
  </body>
</html>
