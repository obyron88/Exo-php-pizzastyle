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




<!-- - - - - - - - - - - -formulaire de modif- - - - - - - - - - - - -->

<?php
$ID = $_POST["ID"];
$req = $pdo->prepare('SELECT * FROM Journal WHERE id=?');
$req->execute(array($_GET['ID']));
$data=$req->fetch();
?>

<h3>-Modifier l'article-</h3>

<!-- - - - - -on affiche les champs avec les données deja enregistrées - - - -->

<form method="post" action="index.php" enctype="multipart/form-data">

    <input type="hidden" name="ID" value="<?php echo($data->ID); ?>">
    <label for="Titre">Titre de l'article</label>
    <input type="text"  name="Titre" value="<?php echo($data->Titre); ?>" >


    <p><img  src="./uploads/<?php echo($data->Image); ?>"></p>
    <input type="file" name="userfile" size="50">


    <label for="Article">Texte de l'article</label>
    <textarea  name="Article" ><?php echo($data->Article); ?></textarea>

  <input  type="submit" name="submit" value="Soumettre">
</form>

 <!-- - - - - - - - afficher l'article concerné - - - - - - -  -->




</body>
</html>
