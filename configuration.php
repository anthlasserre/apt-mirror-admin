<!DOCTYPE HTML>
<html>
<head>
  <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
  <title>Mirroir Debian Admin | Control Panel</title>
  <link rel="icon" type="image/png" href="./images/aptMirrorLogo.png" />
  <link rel="stylesheet" type="text/css" href="./style.css">
  <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.css">
</head>
<body>
  <?php include('./include/session.php') ?>
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
      <li class="bouton_gauche"><i class="fa fa-home"></i> <a href="./index.php">Accueil</a></li>
      <li class="bouton_gauche"><i class="fa fa-cogs"></i> <b>Configuration</b></li>
      <li class="bouton_gauche"><i class="fa fa-wrench"></i> <a href="./installation.php">Installation</a></li>
      <li class="bouton_droite"><i class="fa fa-envelope"></i> <a href="./contact.php">Contact</a></li>
    </ul>
    <hr/>
    </div>

    <!-- CONTENT -->
    <div id="content">
    <div id="action">

    <?php
    if ($_SESSION['login_user'] == "root") {
    	if (!empty($_GET['restart'])) {
      		shell_exec("/srv/www/scripts/apacheRestart.sh");
      		header('Location: ./configuration.php?success=true');
      		}
     	if (!empty($_GET['force'])) {
      		shell_exec("/srv/www/scripts/forceDownload.sh");
      		header('Location: ./configuration.php?success=true');
      		}
      	if (!empty($_GET['display'])) {
      		header("Refresh: 1;Location: ./configuration.php?success=true");
			$output = shell_exec('tail -f /var/log/syslog');
			echo "<pre>$output</pre>";
			}
    }
    ?>

    <!-- Actions -->
    <a href="?restart=apache">Redémarrer Apache</a><br>
    <a href="?force=download">Forcer le téléchargement des paquets</a><br>
    <a href="?display=syslog">Fichier syslog</a>
    

    </div>

	</div>
    <!-- FOOTER -->
    <div id="footer">
      <hr/>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>
  </body>
</html>
