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
      <li class="bouton_gauche"><i class="fa fa-cogs"></i> <a href="./configuration.php">Configuration</a></li>
      <li class="bouton_gauche"><i class="fa fa-wrench"></i> <b>Installation</b></li>
      <li class="bouton_droite"><i class="fa fa-envelope"></i> <a href="./contact.php">Contact</a></li>
    </ul>
    <hr/>
    </div>

    <!-- CONTENT -->
    <div id="content">


      <div id="installationClient">
        <h2><i class="fa fa-user"></i> Installation Client</h2>
        <hr>
        <p style="text-align:center">Si Debian</p>
        <p id="notInstalled"><a href="#notInstalled">n'est pas installé</a></p><p id="installed"><a href="#installed">est déjà installé</a></p>
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
        <p class="code">nano /etc/apt/sources.list</p>
        <p><ul><li>Si une ligne CD apparaît, vous n’en avez plus besoin, alors commentez le avec «#».</p></li></ul>
        <p><ul><li>Ajouter au fichier sources.list</p></li></ul>
        <p class="code">deb http://192.168.0.31/debian jessie main contrib non-free</p>
        <p><ul><li>Et voilà, vous n’avez plus qu’à mettre à jour vos paquets premièrement</p></li></ul>
        <p class="code">apt-get update</p>
        <p>Et désormais lorsque vous voulez télécharger un paquet quelqu’il soit, vous aurez un téléchargement rapide et efficace depuis votre Dépôt Local Debian.</p>
        <hr>
      </div>

      <div id="installationServeur">
        <h2><i class="fa fa-server"></i> Installation Serveur</h2>
        <hr>

        <div id="installed"></div>
        <p><ul><li>Installer Debian à partir de l’ISO ci-dessous : <a href="http://cdimage.debian.org/debian-cd/current/amd64/iso-cd/debian-8.7.1-amd64-netinst.iso" target="_blank">Debian-8.7.1-amd64.iso</a></li></ul></p>
        <p><ul><li>Bien configurer son /etc/network/interfaces en mettant une adresse fixe</p></li></ul>
        <p><ul><li>Mettre à jour la liste des paquets</p></li></ul>
        <p class="code">aptitude update && aptitude upgrade</p>
        <p><ul><li>Créer les dossiers dépôts des paquets que l'on va télécharger.</p></li></ul>
        <p class="code">mkdir /srv/apt-mirror/{mirror,skel,var}</p>
        <p><ul><li>Copier les fichier scripts sh de /var/spool/apt-mirror/var vers /srv/apt-mirror/var</p></li></ul>
        <p class="code">cp /var/spool/apt-mirror/var/*.sh /srv/apt-mirror/var</p>
        <p><ul><li>Changer le propriétaire des dossiers apt-mirror</p></li></ul>
        <p class="code">chown /srv/apt-mirror apt-mirror:apt-mirror</p>
        <p class="code">chown /srv/www www-data:www-data</p>
        <p><ul><li>Modifier le fichier mirror.list (fichier qui cible le téléchargment des paquets)</p></li></ul>
        <p class="code">nano /etc/apt/mirror.list</p>
        <p><ul><li>Vérifier bien defaultarch (la version que vous allez rendre disponible à vos clients)</p></li></ul>
        <p class="code">set defaultarch amd64<br>
        <p><ul><li>Décommenter toutes les variables sauf set run post_mirror.</p></li></ul>
        <p><ul><li>Rajouter ces lignes là (l'endroit des dépôts exact selon la version que je veux rendre disponible):</p></li></ul>
        <p class="code">deb http://ftp.fr.debian.org/debian jessie main contrib non-free<br>
          deb http://security.debian.org/ jessie/updates main contrib non-free<br>
          deb http://ftp.fr.debian.org/debian/ jessie-updates main contrib non-free<br>
          deb http://ftp.fr.debian.org/debian jessie-backports main</p>

        <p><ul><li>Maintenant lancer le téléchargement des paquets<br><i class="fa fa-warning"></i> Cela peut dûrer plusieurs heures selon votre connexion</p></li></ul>
        <p class="code">apt-mirror</p>
        <p>Le téléchargement des paquets est terminé, il faut maintenant ordonner au serveur de lancer le téléchargement tous les soirs (20h)</p>
        <p><ul><li>Modifier le fichier /etc/cron.d/apt-mirror</p></ul></li>
        <p>On lui mettra "20" pour 20h, "root" pour l'utilisateur éxécutant la commande et le fichier log dans lequel nous voulons voir toute les erreurs de téléchargement.</p>
        <p class="code">0 20    * * *   root    /usr/bin/apt-mirror > /srv/apt-mirror/var/cron.log</p>
        <p>Maintenant notre Mirroir est configuré, les paquets sont téléchargés et ils seront actualisés tous les soirs à partir de 20h.<br>Il nous faut maintenant rendre disponible ces paquets aux clients pour qu'ils puissent les télécharger.<br> Nous allons alors installer Apache.</p>
        <p><ul><li>Installer Apache</p></li></ul>
        <p class="code">aptitude install apache2</p>
        <p><ul><li>Modifier le fichier /etc/apache2/apache2.conf.</p></li></ul>
        <p class="code">nano /etc/apache2/apache2.conf</p>
        <p><ul><li>Modifier cette partie du fichier, comme tel.</p></li></ul>
        <p class="code">&lt;Directory /srv/www/&gt;<br>&nbsp;Options Indexes FollowSymlinks<br>&nbsp;AllowOverride All<br>&nbsp;Require all granted</p>
        <p><ul><li>Modifier /etc/apache2/sites-available/000-default.conf en mettant: </p></li></ul>
        <p class="code">DocumentRoot&nbsp;/srv/www</p>
        <p><ul><li>Enfin, faisons les liens symboliques du dépôt des paquets, vers notre serveur internet.</p></li></ul>
        <p class="code">ln -s /srv/apt-mirror/mirror/ftp.fr.debian.org/debian/ /srv/www<br>ln -s /srv/apt-mirrror/mirror/security.debian.org/ /var/www/secudebian

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
