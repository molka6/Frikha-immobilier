<?php



require_once 'Connexion/connexion.php' ;

if(isset($_POST['titre']) && isset($_POST['supert']) )
{
  $sql = 'INSERT INTO maison(Titre,Superficie) VALUES(?,?)';
  $query = $mysqlClient->prepare($sql);
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


