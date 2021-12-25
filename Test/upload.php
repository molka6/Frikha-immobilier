<?php

require_once '../Connexion/connexion.php' ;


var_dump($_POST);
var_dump($_FILES);

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    //Taille max que l'on accepte
    $maxSize = 400000;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, '../Images/'.$file);

        $req = $mysqlClient->prepare('INSERT INTO image_appartement (titre) VALUES (?)');
        $req->execute([$file]);
        echo "Image enregistrée";

 
    }
    else{
        echo "Une erreur est survenue";
    }

}

// $file = $uniqueName.".".$extension;
// //$file = 5f586bf96dcd38.73540086.jpg
// move_uploaded_file($tmpName, './Images/'.$file);
// $req = $mysqlClient->prepare('INSERT INTO image (titre) VALUES (?)');
// $req->execute([$file]);
// echo "Image enregistrée";



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>
<body>




    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>


    <h2>Mes images</h2>
    <?php 
        $req = $mysqlClient->query('SELECT titre FROM appartement');
        while($data = $req->fetch()){
            var_dump($data);
        }
    ?>
   <?php 
    $req = $mysqlClient->query('SELECT titre FROM image_appartement');
    while($data = $req->fetch()){
        echo "<img src='./Images/".$data['titre']."' width='300px' ><br>";
    }
?>




</body>
</html>

