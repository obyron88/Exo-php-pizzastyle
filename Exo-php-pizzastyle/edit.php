<?php

include('connect.php');
include("image.php");
$ID = $_POST["ID"];
$Article = $_POST['Article'];
$Image = $_FILES['Image']["name"];
$Titre = $_POST['Titre'];

$req = $pdo->prepare(' UPDATE Journal SET Titre = :Titre, Image = :Image, Article = :Article WHERE ID = :ID');
$req->bindParam(':Titre', $Titre);
$req->bindParam(':Image', $Image);
$req->bindParam(':Article', $Article);
$req->bindParam(':ID', $ID);
$req->execute();
print_r($pdo->errorInfo());
header('Location: editf.php?ID='.$ID.'');
 ?>
