<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <script src="jquery-3.2.1.js"></script>
  <link rel="stylesheet"href="Style.css"/>
  <title>Exo-php-pizzastyle</title>
</head>
<body>
  <form  enctype="multipart/form-data" method="post" action="index.php">
    <input placeholder="Titre" value="" name="Titre">
    <input type="file" value="" name="Image" >
    <input placeholder="Article" value="" name="Article">
    <input type="submit" value="Envoyer">
</form>

    <?php

    include("connect.php");

  include("image.php");

  $Article = $_POST['Article'];
  $Image = $_FILES['Image']["name"];
  $Titre = $_POST['Titre'];
  $Date = date("d/m/y H:i:s");


// tjr insert into dans l'ordre
    $req = $pdo->prepare("INSERT INTO Journal (Titre, Image, Article, Date)
    VALUES (:Titre, :Image, :Article, :Date)");

    $req->execute(array(
        'Article' => $Article,
        'Image' => $Image,
        'Titre' => $Titre,
        'Date' => $Date
    ));


        $reponse = $pdo->query('SELECT * FROM Journal');
        $reponse1 = $reponse->fetchAll();
        // var_dump($reponse1);
        foreach ($reponse1 as $value) {
        ?>
          <p><?= $value->Titre ?></p>

          <img src="./uploads/<?= $value->Image ?>">
          <p><?= $value->Article ?></p>
          <p><?= $value->Date ?></p>
          </form>
          <form class="" action="delete.php" method="post">
            <input hidden type="number" name="ID" value="<?= $value->ID?>">
            <input type="submit" value="supprimer l'article">
          </form>
          <form class="" action="editf.php" method="post">
            <input hidden type="number" name="ID" value="<?= $value->ID?>">
            <input type="submit" value="edit">
          </form>
            <hr>
        <?php
        }

        ?>



</body>
</html>
