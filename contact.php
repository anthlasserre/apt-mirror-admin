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
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Rechercher un paquet">
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

  			<div id="contactForm">

  						<!-- CONTACT FORM -->
  						<div id="contact-panel-2" class="tab-pane">

  							<!-- RESULTS MESSAGES -->

  							<!-- #CONTACT FORM -->
  							<form action="./include/contact/request.php" id="message-form" role="form" class="contact-form" method="post">
  								<div class="row form-list">

  									<!-- NAME -->
  									<div class="col-xs-12 col-md-6 col-lg-4">
  										<label class="bold text-capitalize">Nom *</label>
  										<input type="text" name="contact_name" class="form-control" required>
  									</div>

  									<!-- EMAIL -->
  									<div class="col-xs-12 col-md-6 col-lg-4">
  										<label class="bold text-capitalize">Email *</label>
  										<input type="email" name="contact_email" class="form-control" required>
  									</div>

  									<!-- SUBJECT -->
  									<div class="col-xs-12 col-md-6 col-lg-4">
  										<label class="bold text-capitalize">Sujet</label>
  										<input type="text" name="contact_subject" class="form-control">
  									</div>

  									<div class="col-xs-12">
  										<label class="bold text-capitalize">Message *</label>
  										<textarea name="contact_message" class="form-control" rows="15" required></textarea>
  									</div>

  									<!-- CAPTCHA & SUBMIT -->
  									<div class="col-xs-12">

  										<div class="inline-block captcha-holder">
  											<input type="text" name="#" class="captcha-number" value="1" readonly> +
  											<input type="text" name="#" class="captcha-number" value="1" readonly> =
  											<input id="captcha" class="captcha form-control" type="text" name="captcha" maxlength="2" required>
  										</div><!--
  										--><input type="submit" class="btn btn--main-inverted" value="Submit message">
  									</div>
  								</div>
  							</form>

  						</div>

  					</div>

  				</div>

    </div>
    <!-- FOOTER -->
    <div id="footer">
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
