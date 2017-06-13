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

    <?php

    include("connect.php");

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["Image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["Image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["Image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

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

        echo '<p>'.$value->Titre.'</p><img src="./uploads/'.$value->Image.'"></p><p>'.$value->Article.'</p><p>'.$value->Date.'</p><p><hr>';
        }
        ?>
    </form>



  </form>
</body>
</html>
