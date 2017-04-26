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
