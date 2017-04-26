<?php
   include("./config.php");
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
         header("location: ../index.php");

      } else {
         $error = "Votre identifiant ou mot de passe est invalide";
      }
   }
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta name="keywords" content="mirroir, aptmirror, mirror, debian, packages, amd64">
    <title>Mirroir Debian GRETA</title>
    <link rel="icon" type="image/png" href="../images/aptMirrorLogo.png" />
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
  </head>
  <body>
    <?php include('./include/session.php') ?>

    <!-- HEADER -->
    <div id="header">
    <h1>Bienvenue sur le Mirroir Debian du GRETA</h1>
    <p style="text-align:center">Cette page permet de visualiser le fonctionnement et la configuration du Mirroir Debian</p>
    <p class="connect"><?php
    include('./include/userConnected.php');
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
