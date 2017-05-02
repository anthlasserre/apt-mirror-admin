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
  <title>Mirroir Debian Admin | Control Panel</title>
  <link rel="icon" type="image/png" href="../images/aptMirrorLogo.png" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootswatch_solar.css">
  <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">
  <link rel="stylesheet" href="../css/font-awesome/font-awesome.css">
</head>
<body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../css/bootstrap/js/bootstrap.min.js"></script>

  <!-- HEADER -->
  <div id="header">
  <h1 class="head-title">Mirroir Debian Admin | Control Panel</h1>
  <p style="text-align:center; margin-top:-10px">Cette page permet de visualiser le fonctionnement et de configurer le serveur Mirroir Debian<br>
                                Pour contribuer au développement de cet outil ayant l'objectif de devenir un jour un paquet Debian<br>
                                Aller sur le repository <b><a href="https://github.com/anthlasserre/aptMirrorAdmin" target="_blank"><i class="fa fa-github"></i></a></b></p>
  <p class="connect"><?php
  include('../info/userConnected.php');
  if ($_SESSION['login_user'] == "root") {
    echo 'Bonjour ' . $_SESSION['login_user'] . '<br>';
    ?><p class="connect"><a href="./logout.php">Se déconnecter</a></p>
  <?php }
  else {
    ?><p class="connect"><a href="./login.php">Se connecter</a></p><?php
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
        <a class="navbar-brand" href="../index.php">AptMirrorAdmin</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">Accueil</span></a></li>
          <li><a href="../configuration.php">Configuration</a></li>
          <li class="dropdown">
            <a href="../installation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Installation <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="../installation_client.php">Installation Client</a></li>
              <li><a href="../installation_serveur.php">Installation Serveur</a></li>
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
      <div id="login" align = "center">
         <div style = "width:330px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Connexion Admin</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Utilisateur  : </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Mot de passe  : </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Se connecter"/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error ;?></div>

            </div>

         </div>

      </div>
    </div>
    <!-- FOOTER -->
    <div id="footer">
      <hr/>
      <p style="text-align:center; font-style: italic;">Le Mirroir Debian a été installé au GRETA par <a href="https://anthonylasserre.com" target="_blank">Anthony LASSERRE</a>, étudiant BTS SIO Promo2015
    </div>
  </body>
</html>
