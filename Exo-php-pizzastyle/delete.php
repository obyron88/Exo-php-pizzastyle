<?php
include("connect.php");

$ID = $_POST["ID"];


$req = $pdo->prepare('DELETE FROM Journal WHERE id= ?');
$req->execute(array($_POST['ID']));
header("location: index.php");
?>
