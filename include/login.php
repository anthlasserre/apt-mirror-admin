<?php
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];

      $link = mysql_connect("localhost", "root", "root");
      mysql_select_db("aptMirrorAdmin", $link);

      $result = mysql_query("SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'", $link);
      $num_rows = mysql_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($num_rows == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: ../configuration.php");

      } else {
         $error = "Votre identifiant ou mot de passe est invalide";
      }
   }
?>

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
        <form class="navbar-form navbar-left" role="search" action="./search.php" method="post">
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
      <div id="login" align = "center">
        <div class="panel panel-default" style="margin-left:300px;margin-right:300px">
          <div class="panel-heading">Connexion Admin</div>
          <div class="panel-body" style="padding-left:50px;padding-right:50px">

               <form action = "" method = "post" class="form-horizontal">
                 <fieldset>

                   <div class="form-group">
                  <label class="control-label" for="inputSmall">Utilisateur  : </label>
                  <input type="text" name="username" class="form-control input-sm" id="inputSmall" placeholder="utilisateur.."/><br /><br />
                  <label class="control-label" for="inputPassword">Mot de passe  : </label>
                  <input type = "password" name="password" class="form-control" id="inputPassword" placeholder="mot de passe.."/><br/><br />
                  <input type = "submit" class="btn btn-primary" value = "Se connecter"/><br />
               </form>
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
