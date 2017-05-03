<!DOCTYPE HTML>
<html>
<head>
  <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
  <title>aptMirrorAdmin - Piloter votre mirroir debian en toute sécurité.</title>
  <link rel="icon" type="image/png" href="./../images/aptMirrorAdminLogo.png" />
  <link rel="stylesheet" type="text/css" href="./../css/bootstrap/css/bootswatch_solar.css">
  <link rel="stylesheet" href="./../css/font-awesome/font-awesome.min.css">
  <link rel="stylesheet" href="./../css/font-awesome/font-awesome.css">
</head>
<body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="./../css/bootstrap/js/bootstrap.min.js"></script>

  <!-- HEADER -->
  <div id="header">
  <h1 class="head-title"><img src="../images/aptMirrorAdminLogo.png" height="50px"/>aptMirrorAdmin</h1>
  <p style="text-align:center; margin-top:-10px">Pour contribuer au développement de cet outil ayant l'objectif de devenir un jour un paquet Debian<br>
                                Aller sur le repository <b><a href="https://github.com/anthlasserre/aptMirrorAdmin" target="_blank"><i class="fa fa-github"></i></a></b></p>
  <p class="connect"><?php
  include('./../info/userConnected.php');
  if ($_SESSION['login_user'] == "root") {
    echo 'Bonjour ' . $_SESSION['login_user'] . '  <i class="fa fa-user-circle-o"></i>'  . '<br>';
    ?><p class="connect"><a href="./../include/logout.php">Se déconnecter</a></p>
  <?php }
  else {
    ?><p class="connect"><a href="./../include/login.php">Se connecter</a></p><?php
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
        <a class="navbar-brand" href="./../index.php">aptMirrorAdmin</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="./../index.php">Accueil</span></a></li>
          <li><a href="./../configuration.php">Configuration</a></li>
          <li class="dropdown">
            <a href="./../installation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Installation <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./../installation_client.php">Installation Client</a></li>
              <li><a href="./../installation_serveur.php">Installation Serveur</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="package" placeholder="Rechercher un paquet" required>
          </div>
          <button type="submit" class="btn btn-default">Rechercher</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./../contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENT -->
  <div id="content">

    <div class="panel panel-default">
      <div class="panel-body">
        <?php echo 'Vous avez recherché le paquet: \'<b>' . $_POST['package'] . '</b>\''; ?>
      </div>
    </div>
    <?php
      include('./../info/allPackages.php');
      if (!empty($_POST['package'])) {
        $search = strpos($allPackages, $_POST['package']);
        if ($search === false) {
          echo '<br><div class="alert alert-dismissible alert-warning">
                      <h4>Mince!</h4>
                      <p>Le paquet \'<b>' . $_POST['package'] . '</b>\' n\'est pas présent sur le mirroir. Veuillez en informer <a href="./../contact.php" target="_blank"><b>l\'administrateur</b></a> pour qu\'il puisse résoudre ce problème. </p>
                    </div>';
        } else {
          echo ' <div class="alert alert-dismissible alert-success">
                  <strong>Parfait!</strong> Le paquet est bien présent sur le mirroir.
                  </div>';
          echo 'Voici la liste de(s) paquet(s) \'<b>' . $_POST['package'] . '</b>\' présent(s) sur le mirroir:<br><br>';
          // $wordPackage = $_POST['package'];
          $pattern = preg_quote($_POST['package'], '/');
          $pattern = "/^.*$pattern.*\$/m";
          // echo $pattern;
          if(preg_match_all($pattern, $allPackages, $matches)) {
            echo "<div class=\"panel panel-default\"><div class=\"panel-body\">";
            echo implode("<br>", $matches[0]);
            echo "</div></div>";
      }
    }
  }
    ?>


  </div>
  <!-- FOOTER -->
  <div class="panel-footer">
    <hr/>
    <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
  </div>
</body>
</html>
