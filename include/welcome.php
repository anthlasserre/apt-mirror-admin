<?php
   include('./session.php');
?>
<html">

   <head>
      <title>Bienvenue </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "./logout.php">Se déconnecter</a></h2>
   </body>

</html>
