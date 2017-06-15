<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <script src="jquery-3.2.1.js"></script>
  <link rel="stylesheet"href="Style.css"/>
  <title>Exo-php-pizzastyle</title>
</head>
<body>
<?php

include('connect.php');
?>


<h1>Liste des Articles</h1>

<?php
//-----------------Requete pour lire l'ensemble des articles---------------//
$req = $pdo->query('SELECT * FROM Journal');
while ($data = $req->fetch()){
    ?>
      <h3><?php echo htmlspecialchars($data->Titre); ?></h3>

      <?php echo '<img src="uploads/'.$data->Image.'">' ?>

      <p><?php echo htmlspecialchars($data->Article); ?></p>

      <em>le <?php echo $data->Date; ?></em><hr>


<!-- - - - - - - - - -boutons choix- - - - - - - - - - - - - - - - - - -->

      <a href="com.php?ID=<?php echo ($data->ID); ?>">Commentaires</a></em>
      <a href="edit.php?ID=<?php echo ($data->ID); ?>">
      <span class="glyphicon glyphicon-edit"></span> Edit</a>
      <a href="delete.php?ID=<?php echo ($data->ID); ?>">
      <span class="glyphicon glyphicon-remove-circle"></span> Delete</a><hr><br>

    <?php
}
    $req->closeCursor();
    ?>

</section>
</body>
</html>
