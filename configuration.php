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
  <?php include "./include/session.php" ?>
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
          <li  class="active"><a href="./configuration.php">Configuration <span class="sr-only">(current)</span></a></li>
          <li class="dropdown">
            <a href="./installation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Installation <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./installation_client.php">Installation Client</a></li>
              <li><a href="./installation_serveur.php">Installation Serveur</a></li>
            </ul>
          </li>
        </ul>
        <form action="./search.php" class="navbar-form navbar-left" role="search" action="./include/search.php" method="post">
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
    <div id="action" style="float:left;width:40%;height:100%">
      <div class="panel panel-default" style="width:100%;position:relative">
        <div class="panel-heading">Apache<i style="text-align:right;color:green;padding-left:20px;"class="fa fa-toggle-on fa-lg"></i></div>
        <div class="panel-body">
          <a href="?restart=apache" class="btn btn-default">Redémarrer Apache</a>
          <a href="?display=apacheErrorLog" class="btn btn-default">Fichier error.log</a>
        </div>
      </div>
      <div class="panel panel-default" style="width:100%;position:relative">
        <div class="panel-heading">Apt-Mirror<i style="text-align:right;color:green;padding-left:20px;"class="fa fa-toggle-on fa-lg"></i></div>
        <div class="panel-body">
          <a href="?force=download" class="btn btn-default">Forcer le téléchargement des paquets</a><br>
        </div>
      </div>
      <div class="panel panel-default" style="width:100%;position:relative">
        <div class="panel-heading">Serveur</div>
        <div class="panel-body">
          <a href="?display=syslog" class="btn btn-default">Fichier syslog</a>
        </div>
      </div>
      <?php
    if ($_SESSION['login_user'] == "root") {
    	if (!empty($_GET['restart'])) {
      		$outpout = shell_exec("/srv/www/scripts/apacheRestart.sh");
          header('Location: ');
          ?><div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Parfait!</strong> Le redémarrage d'Apache s'est bien effectué</a>.
            </div><?php
      		}
     	if (!empty($_GET['force'])) {
      		$outpout = shell_exec("/srv/www/scripts/forceDownload.sh");
          echo "<pre>$output</pre>";
      		header('Location: ./configuration.php?success=true');
      		}
      	if (!empty($_GET['display'])) {
      		header("Refresh: 1;Location: ./configuration.php?success=true");
			       $output = shell_exec('tail -f /var/log/syslog');
			       echo "<pre>$output</pre>";
			}
    }
    ?>

    </div>
    <div id="action" style="margin-left:45%;margin-right:0px">
    <div class="panel panel-default">
      <div class="panel-heading">Console</div>
      <div class="panel-body">
        <code style="height:80%"></code>
      </div>
    </div>
    </div>

	</div>
    <!-- FOOTER -->
    <div class="panel-footer">
      <hr/>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>
  </body>
</html>
