<?php


try
{
      $conn = new PDO('mysql:host=localhost;dbname=frikhaimmobilier;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



if(isset($_POST['titre']) && isset($_POST['supert']) )
{
  $sql = 'INSERT INTO maison(Titre,Superficie) VALUES(?,?)';
  $query =  $conn->prepare($sql);
  $titre = htmlspecialchars($_POST['titre']);
  $supert = htmlspecialchars($_POST['supert']);
  $query-> execute(array($titre,$supert));
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
        <button type="submit">Enregistrer</button>
    </form>




              
              
  </body>


