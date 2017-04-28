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
      <li class="bouton_gauche"><i class="fa fa-wrench"></i> <a href="./installation.php">Installation</a></li>
      <li class="bouton_droite"><i class="fa fa-envelope"></i> <b>Contact</b></li>
    </ul>
    <hr/>
    </div>

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
