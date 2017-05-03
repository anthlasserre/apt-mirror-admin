<!DOCTYPE HTML>
<html>
<head>
  <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
  <title>aptMirrorAdmin - Piloter votre mirroir debian en toute sécurité.</title>
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
  <h1 class="head-title"><img src="./images/aptMirrorAdminLogo.png" height="50px"/>aptMirrorAdmin</h1>
  <p style="text-align:center; margin-top:-10px">Pour contribuer au développement de cet outil ayant l'objectif de devenir un jour un paquet Debian<br>
                                Aller sur le repository <b><a href="https://github.com/anthlasserre/aptMirrorAdmin" target="_blank"><i class="fa fa-github"></i></a></b></p>
  <p class="connect"><?php
  include('./info/userConnected.php');
  if ($_SESSION['login_user'] == "root") {
    echo 'Bonjour ' . $_SESSION['login_user'] . '  <i class="fa fa-user-circle-o"></i>'  . '<br>';
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
        <a class="navbar-brand" href="./index.php">aptMirrorAdmin</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="./index.php">Accueil</a></li>
          <li><a href="./configuration.php">Configuration</a></li>
          <li class="dropdown">
            <a href="./installation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Installation <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./installation_client.php">Installation Client</a></li>
              <li><a href="./installation_serveur.php">Installation Serveur</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="./include/search.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="package" placeholder="Rechercher un paquet" required>
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
      <div class="panel panel-default">
  <div class="panel-heading"><h2><i class="fa fa-user"></i> Installation Client</h2></div>
  <div class="panel-body">
    <div id="installationClient">
      <p style="text-align:center">Si Debian</p>
      <div class="btn-group btn-group-justified">
        <a href="#notInstalled" class="btn btn-default">n'est pas installé</a>
        <a href="#installed" class="btn btn-default">est déjà installé</a>
      </div>
      <hr>

      <div id="notInstalled"></div>
      <h3>Si Debian n'est pas installé</h3>
      <p><ul><li>Installer Debian à partir de l’ISO ci-dessous : <a href="http://cdimage.debian.org/debian-cd/current/amd64/iso-cd/debian-8.7.1-amd64-netinst.iso" target="_blank">Debian-8.7.1-amd64.iso</a></li></ul></p>
      <p><ul><li>Procédez à l’installation puis vous allez arriver à l’étape : «Configurer l’outil de gestion des paquets»</p></li></ul>
      <p><ul><li>Faites «Oui» à la question «Faut-il utiliser un miroir sur le réseau ?»</p></li></ul>
      <img src="./images/configurerOutilGestionPaquets.png" alt="Configurer Outil de Gestion de Paquets - 1ère étape" width=90% />
      <p><ul><li>Remontez tout en haut de la liste des pays pour arriver à « Saisie manuelle » et saisissez l’adresse IP « 192.168.0.31 » puis continuer et laisser les paramètres par défaut.</p></li></ul>
      <p>Voilà ça y est votre dépôt est configuré pour votre machine client.</p>
      <hr>

      <div id="installed"></div>
      <h3>Si Debian est déjà installé</h3>
      <p><ul><li>Si vous avez déjà installer votre Debian, vous pouvez toujours modifier le fichier «sources.list» pour rajouter notre Dépôt Local Debian.</li></ul></p>
      <code>nano /etc/apt/sources.list</code>
      <p><ul><li>Si une ligne CD apparaît, vous n’en avez plus besoin, alors commentez le avec «#».</p></li></ul>
      <p><ul><li>Ajouter au fichier sources.list</p></li></ul>
      <code>deb http://192.168.0.31/debian jessie main contrib non-free</code>
      <p><ul><li>Et voilà, vous n’avez plus qu’à mettre à jour vos paquets premièrement</p></li></ul>
      <code>apt-get update</code>
      <p>Et désormais lorsque vous voulez télécharger un paquet quelqu’il soit, vous aurez un téléchargement rapide et efficace depuis votre Dépôt Local Debian.</p>
      <hr>
    </div>

  </div>
  </div>
</div>



    <div id="space">
    </div>
    <!-- FOOTER -->
    <div class="panel-footer">
      <hr>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>
  </body>
</html>
