<?php



require_once 'Connexion/connexion.php' ;

if(isset($_POST['titre']) && isset($_POST['supert']) && isset($_FILES['file']) )
{

$req_membres = $mysqlClient->prepare("INSERT INTO  maison(Titre,Superficie) VALUES(?,?)");
$titre = htmlspecialchars($_POST['titre']);
$superficie = htmlspecialchars($_POST['supert']);
$req_membres->execute(array($titre,$superficie));                                     
$idm = $mysqlClient->lastInsertId();    



$tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $maxSize = 400000;
    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        $uniqueName = uniqid('', true);
        $file = $uniqueName.".".$extension;
        move_uploaded_file($tmpName, '../Images/'.$file);
        $req_compte = $mysqlClient->prepare("INSERT INTO image(titre,maison_id) VALUES(?, ?)");
        $titreimg = htmlspecialchars($_POST['file']);
        $req_compte->execute(array($titreimg,$idm));
        echo "image inserted successfully.";
    }


     
    echo "Records inserted successfully.";

} 
else{
      echo "chap vide " ;
  }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <body>


  
  <form action="insert.php" method="POST" enctype="">
        <input type="text" name="titre">
        <input type="text" name="supert">
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>




              
              
  </body>




