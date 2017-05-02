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
          <li><a href="./index.php">Accueil <span class="sr-only">(current)</span></a></li>
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
      <div class="panel panel-default">
  <div class="panel-heading"><h2><i class="fa fa-server"></i> Installation Serveur</h2></div>
  <div class="panel-body">
    <div id="installationServeur">
      <div id="installed"></div>
      <p><ul><li>Installer Debian à partir de l’ISO ci-dessous : <a href="http://cdimage.debian.org/debian-cd/current/amd64/iso-cd/debian-8.7.1-amd64-netinst.iso" target="_blank">Debian-8.7.1-amd64.iso</a></li></ul></p>
      <p><ul><li>Bien configurer son /etc/network/interfaces en mettant une adresse fixe</p></li></ul>
      <p><ul><li>Mettre à jour la liste des paquets</p></li></ul>
      <code>aptitude update && aptitude upgrade</code>
      <p><ul><li>Créer les dossiers dépôts des paquets que l'on va télécharger.</p></li></ul>
      <code>mkdir /srv/apt-mirror/{mirror,skel,var}</code>
      <p><ul><li>Copier les fichier scripts sh de /var/spool/apt-mirror/var vers /srv/apt-mirror/var</p></li></ul>
      <code>cp /var/spool/apt-mirror/var/*.sh /srv/apt-mirror/var</code>
      <p><ul><li>Changer le propriétaire des dossiers apt-mirror</p></li></ul>
      <code>chown /srv/apt-mirror apt-mirror:apt-mirror<br>chown /srv/www www-data:www-data</code>
      <p><ul><li>Modifier le fichier mirror.list (fichier qui cible le téléchargment des paquets)</p></li></ul>
      <code>nano /etc/apt/mirror.list</code>
      <p><ul><li>Vérifier bien defaultarch (la version que vous allez rendre disponible à vos clients)</p></li></ul>
      <code>set defaultarch amd64</code><br>
      <p><ul><li>Décommenter toutes les variables sauf set run post_mirror.</p></li></ul>
      <p><ul><li>Rajouter ces lignes là (l'endroit des dépôts exact selon la version que je veux rendre disponible):</p></li></ul>
      <code>deb http://ftp.fr.debian.org/debian jessie main contrib non-free<br>
        deb http://security.debian.org/ jessie/updates main contrib non-free<br>
        deb http://ftp.fr.debian.org/debian/ jessie-updates main contrib non-free<br>
        deb http://ftp.fr.debian.org/debian jessie-backports main</code>

      <p><ul><li>Maintenant lancer le téléchargement des paquets<br><i class="fa fa-warning"></i> Cela peut dûrer plusieurs heures selon votre connexion</p></li></ul>
      <code>apt-mirror</code>
      <p>Le téléchargement des paquets est terminé, il faut maintenant ordonner au serveur de lancer le téléchargement tous les soirs (20h)</p>
      <p><ul><li>Modifier le fichier /etc/cron.d/apt-mirror</p></ul></li>
      <p>On lui mettra "20" pour 20h, "root" pour l'utilisateur éxécutant la commande et le fichier log dans lequel nous voulons voir toute les erreurs de téléchargement.</p>
      <code>0 20    * * *   root    /usr/bin/apt-mirror > /srv/apt-mirror/var/cron.log</code>
      <p>Maintenant notre Mirroir est configuré, les paquets sont téléchargés et ils seront actualisés tous les soirs à partir de 20h.<br>Il nous faut maintenant rendre disponible ces paquets aux clients pour qu'ils puissent les télécharger.<br> Nous allons alors installer Apache.</p>
      <p><ul><li>Installer Apache</p></li></ul>
      <code>aptitude install apache2</code>
      <p><ul><li>Modifier le fichier /etc/apache2/apache2.conf.</p></li></ul>
      <code>nano /etc/apache2/apache2.conf</code>
      <p><ul><li>Modifier cette partie du fichier, comme tel.</p></li></ul>
      <code>&lt;Directory /srv/www/&gt;<br>&nbsp;Options Indexes FollowSymlinks<br>&nbsp;AllowOverride All<br>&nbsp;Require all granted</code>
      <p><ul><li>Modifier /etc/apache2/sites-available/000-default.conf en mettant: </p></li></ul>
      <code>DocumentRoot&nbsp;/srv/www</code>
      <p><ul><li>Enfin, faisons les liens symboliques du dépôt des paquets, vers notre serveur internet.</p></li></ul>
      <code>ln -s /srv/apt-mirror/mirror/ftp.fr.debian.org/debian/ /srv/www<br>ln -s /srv/apt-mirrror/mirror/security.debian.org/ /var/www/secudebian</code>

      <p>Voilà votre mirroir Debian est bien configuré, vous êtes fin prêt à le déclarer sur tous vos clients.</p>
    </div>
    </div>
    <div id="space">
    </div>
    <!-- FOOTER -->
    <div id="footer">
  <hr>
  <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
</div>
</body>
</html>
