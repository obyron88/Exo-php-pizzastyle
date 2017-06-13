<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <script src="jquery-3.2.1.js"></script>
  <link rel="stylesheet"href="Style.css"/>
  <title>Exo-php-pizzastyle</title>
</head>
<body>
<form method="post" action="returna.php">
    <?php

    include("connect.php");


      $reponse = $pdo->query('SELECT * FROM Journal');
      $reponse1 = $reponse->fetchAll();
      // var_dump($reponse1);
      foreach ($reponse1 as $value) {

          echo "<p>".$value->$Titre. $value->$Image. $value->$Article. .$value->$Date."</p>";
      }
      ?>

  </form>
</body>
</html>
