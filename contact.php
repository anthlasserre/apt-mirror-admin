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
          <li><a href="./index.php">Accueil</span></a></li>
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
          <li class="active"><a href="./contact.php">Contact <span class="sr-only">(current)</a></li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- CONTENT -->
    <div id="content">

      <!-- ========================================= -->
  		<!-- $CONTACT SECTION                          -->
  		<!-- ========================================= -->
      <div class="panel panel-default">
        <div class="panel-heading">Contact</div>
        <div class="panel-body">
            <form class="form-horizontal" action="./include/contact/request.php">
              <fieldset>
                <div class="form-group">
                  <label for="inputSmall" class="col-lg-2 control-label">Nom*</label>
                  <div class="col-lg-10">
                  <input class="form-control input-sm" type="text" name="contact_name" id="inputSmall" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Email*</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEmail" name="contact_email" placeholder="beaugossedu64@hotmail.fr" required>
                  </div>
                </div>
                <div class="form-group">
                  <label  for="inputSmall" class="col-lg-2 control-label">Sujet*</label>
                  <div class="col-lg-10">
                  <input class="form-control input-sm" type="text" id="inputSmall" name="contact_subject" placeholder="Vous avez fait une faute d'orthographe... Ce serait bien de faire ça..." required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="textArea" class="col-lg-2 control-label">Message*</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" rows="3" name="contact_message" id="textArea" required></textarea>
                    <span class="help-block">Ecrivez dont votre demande.</span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Annuler</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>


    </div>
    <!-- FOOTER -->
    <div class="panel-footer">
      <hr/>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>

    <!-- ========================================= -->
		<!-- $SCRIPTS                                  -->
		<!-- ========================================= -->

		<!-- #LIBS -->
		<script src="js/libs/jquery-latest.min.js"></script>
		<script src="js/libs/modernizr-latest.min.js"></script>
		<script src="js/libs/bootstrap.min.js"></script>

		<!-- #PLUGINS -->
		<script src="js/plugins/jquery.malihu.PageScroll2id.min.js"></script>
		<script src="js/plugins/jquery.shuffle.min.js"></script>
		<script src="js/plugins/jquery.sticky-kit.min.js"></script>
		<script src="js/plugins/jquery.magnific-popup.min.js"></script>
		<script src="js/plugins/jquery.quovolver.min.js"></script>
		<script src="js/plugins/jquery.inview.min.js"></script>
		<script src="js/plugins/jquery.countTo.min.js"></script>

		<!-- #CUSTOM -->
		<script src="js/script.js"></script>
  </body>
</html>
