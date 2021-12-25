<?php

require_once 'Connexion/connexion.php' ;

                        $req_membres = $mysqlClient->prepare("INSERT INTO  appartement(Titre,Superficie) VALUES(?,?)");
                        $titre = htmlspecialchars($_POST['titre']);
                        $superficie = htmlspecialchars($_POST['supert']);
                        $req_membres->execute(array($titre,$superficie));                                     
                        $idm = $mysqlClient->lastInsertId();    


                        $req_option= $mysqlClient->prepare("INSERT INTO option_appartement(appartement_id,Balcon,Climatisation) VALUES(?,?,?)");
                        $Balcon= htmlspecialchars($_POST['Balcon']);
                        $Climatisation= htmlspecialchars($_POST['Climatisation']);
                        $req_option->execute(array($idm,$Balcon,$Climatisation)); 


                        $tmpName = $_FILES['file']['tmp_name'];
                        $name= $_FILES['file']['name'];
                        $size = $_FILES['file']['size'];
                        $error = $_FILES['file']['error'];
                        for($i=0; $i<count($name); $i++) {
                            $tabExtension[$i] = explode('.', $name[$i]);
                            $extension[$i] = strtolower(end($tabExtension[$i]));
                            echo "extention =". $extension[$i];
                        }
                        $nbfichiersEnvoyes = count($tmpName);
                        for($i=0; $i<$nbfichiersEnvoyes; $i++) {
                            $tabExtension[$i]= explode('.', $name[$i]);
                            $extension[$i] = strtolower(end($tabExtension[$i]));
                            $uniqueName = uniqid('', true);
                            $file[$i] = $uniqueName.".".$extension[$i];
                            move_uploaded_file($tmpName[$i], './Images/'.$file[$i]);
                            $req = $mysqlClient->prepare('INSERT INTO image_appartement (titre,appartement_id) VALUES (?,?)');
                            $req->execute(array($file[$i],$idm));
                            echo "Image enregistrée";
                        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <form action="insertimage.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file[]" multiple>
        <label for="file">titer</label>
        <input type="text" name="titre">
        <label for="file">superficie</label>
        <input type="text" name="supert">

        
        <div> 
            <input type="checkbox" id="Balcon" name="Balcon">
            <label for="Balcon">Balcon</label>
        </div>


        <div>
            <input type="checkbox" id="Climatisation" name="Climatisation">
            <label for="Climatisation">Climatisation</label>
        </div>

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

