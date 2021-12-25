<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>الفريخة للعقارات</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="style/image/icon1.jpg" rel="icon">
  <link href="style/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="style/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="style/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="style/css/style.css" rel="stylesheet"> 
</head>
<body>
<div class="click-closed"></div>
  <?php include 'navbar.php';?>
  <main id="main">
  <?php
require_once 'Connexion/connexion.php' ;
  $sql = 'SELECT * FROM appartement WHERE id = '.$_GET['id'];
  $query =  $mysqlClient->prepare($sql);
  $query-> execute();
  $recipes = $query->fetchAll(PDO::FETCH_ASSOC);  
foreach ($recipes as $key => $recipe) {
?>
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> <?php echo $recipe['Titre']; ?></h1>
              <span class="color-text-a"><?php echo $recipe['Adresse']; ?></span>
              <h3 style="color: #df591e" class="title-d detSyle"><?php echo $recipe['prix']; ?> TND</h3>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="maison.php">Maison</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <?php echo $recipe['Titre']; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="property-single nav-arrow-b">
      <div class="container">
                      <?php 
                      $req = $mysqlClient->query('SELECT image_appartement.titre , image_appartement.id  From image_appartement join appartement on appartement.id = image_appartement.appartement_id where image_appartement.appartement_id='.$_GET['id'] );
                      while($data = $req->fetch())
                      $tab[] =$data['titre']; 
                      ?>



<!-- ------------------------------bloc1--------------------------------- -->
        <div class="row ">
                <div class="col-lg-6">
                  <div id="property-single-carousel" class="swiper">
                    <div class="swiper-wrapper taille">
                            <?php  for ($i=0 ; $i< count($tab) ; $i++) { ?>
                                            <div class="carousel-item-b swiper-slide">
                                              <?php echo "<img src='./Images/".$tab[$i]."' width='500px' height='500px' ><br>";
                                              ?>
                                            </div>
                            <?php   } ?> 
                    </div>
                  </div>
                              <div class="property-single-carousel-pagination carousel-pagination"></div>
                        
                              <!-- -------------social--------- -->
                          
  <div class="fb-share-button" style="" data-href="https://frikha.herokuapp.com/detail.php?id=<?php echo $recipe['Id'];?>" 
  data-layout="button" data-size="small">
  <a target="_blank"
   href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" 
   class="fb-xfbml-parse-ignore">Partager sur facebook 
  </a>
</div>
                            
                            <br/>
                            
                            
                            
                              <h3> Description </h3>
                             <hr> 
                            <p> <?php echo $recipe['plus'];?> </p> 
                              <!-- --------------end social ------------ -->
                </div>
                          <?php } ?>

                         
<!-- ******************** -->
                <div class="col-lg-6 details">


                <!-- ------------------block2 ------------------------- -->
                    <div id="property-single-carousel" class="swiper">
                      <div class="swiper-wrapper taille">
                            <div class="property-summary" style="margin-left: 2%; width: 100%">



                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div style="box-sizing: content-box;
                                                              width: 94%;
                                                              background-color :#ECF8F6;
                                                              border: solid #ECF8F6 3px;
                                                              padding: 12px;
                                                              padding-bottom: 0px;
                                                              text-align: center;
                                                              border-radius: 20px;
                                                              margin-bottom: 14px ;">
                                                    <h3 class="title-d detSyle ">Détails</h3>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="summary-list">
                                    <ul class="list">
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/surface.png" alt="" style="width: 6%; margin-right: 9px;">
                                            <strong>Superficie</strong>
                                        </div>
                                        <span><?php echo $recipe['Superficie'];?>m²</span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/esquisser.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Superficie construite: </strong>
                                        </div>
                                        <span><?php echo $recipe['Superficie_construite']; ?>m²</span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/esquisser.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de pièce: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre_piece']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/chambre.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de chambre: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre_chambre']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/salle.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de salle d'eau: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre_salle_deau']; ?></span>
                                      </li>
                                        <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/salle-de-bains.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de salle de bain: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre_salle_bain']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/chambre3.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de couchage: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre_couchage']; ?></span>
                                      </li>
                                    </ul>
                                  </div>



                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div style="box-sizing: content-box;
                                                              width: 94%;
                                                              background-color :#ECF8F6;
                                                              border: solid #ECF8F6 3px;
                                                              padding: 12px;
                                                              padding-bottom: 0px;
                                                              text-align: center;
                                                              border-radius: 20px;
                                                              margin-bottom: 14px ;">
                                                    <h3 class="title-d detSyle ">Options </h3>
                                      </div>
                                    </div>
                                  </div>






                      <?php 
                      $req2 = $mysqlClient->query('SELECT *   From options join maison on maison.id = options.maison_id where options.maison_id='.$_GET['id'] );
                      $recipes = $req2->fetchAll(PDO::FETCH_ASSOC);  
                      foreach ($recipes as $key => $recipe);
                      {
                      ?>
                                  <div class="col-md-7 col-lg-7 section-md-t3" style="width: 100%">
                                        <div class="">
                                          <ul >
                                          <?php if($recipe['Balcon'] ==1){?>
                                               <li class="list-a">Balcon </li>
                                          <?php } ?> 
                                          <?php if($recipe['Terrasse'] ==1) {?>
                                              <li class="list-a">Terrasse  </li> 
                                          <?php } ?> 
                              
                                          <?php if(  $recipe['Videophone'] == 1 ) {?>
                                              <li class="list-a">Videophone</li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['EspaceGazon'] == 1 ){ ?>
                                              <li class="list-a">Gazon	 </li> 
                                              <?php } ?> 
                              
                                            <?php if(  $recipe['Alarme'] == 1 ){ ?>
                                              <li class="list-a">	Alarme	 </li> 
                                              <?php } ?> 
                              
                                            <?php if(  $recipe['Jardin'] == 1 ){ ?>
                                              <li class="list-a">Jardin	 </li> 
                                              <?php } ?> 
                              
                                            <?php if(  $recipe['Chauffage_centrale'] == 1 ) {?>
                                              <li class="list-a">Chauffage Centrale</li> 
                                              <?php } ?> 
                              
                                            <?php if(  $recipe['PhotoVoltaique'] == 1 ){ ?>
                                              <li class="list-a">PhotoVoltaique	 </li> 
                                              <?php } ?> 
                              
                                            <?php if(  $recipe['Chauffage_Eau_Solaire'] == 1 ){ ?>
                                              <li class="list-a">Chauffage Eau Solaire	</li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Garage'] == 1 ){ ?>
                                              <li class="list-a">Garage	 </li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Picine'] == 1 ){ ?>
                                              <li class="list-a">Picine	 </li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Kitchinette'] == 1 ) {?>
                                              <li class="list-a">Kitchinette	 </li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Marbre'] == 1 ){ ?>
                                              <li class="list-a">Marbre	 </li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Jacousie'] == 1 ) {?>
                                              <li class="list-a">Jacousie	 </li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Gaz_de_ville'] == 1 ){ ?>
                                              <li class="list-a">Gaz de ville	 </li> 
                                              <?php } ?> 
                              
                                              <?php if(  $recipe['Prio_de_voiture'] == 1 ){ ?>
                                              <li class="list-a">Prio de voiture	 </li> 
                                              <?php } ?> 
                              
                                          </ul>
                                        
                                          

                                         

                                    
                                      
                                         
                                        
                                         
                                          
                                      <?php }   ?> 
                        
                                   
             
                                        </div>
                                      </div>
                                  </div>


           </div>      
                      </div>
                  </div> 
                  <!-- ------------------end block2 ------------------------- -->
        





                        

          
  
      </div>
    </section>
  </main>

  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v12.0&appId=766586264037870&autoLogAppEvents=1" nonce="7xVL6cLu"></script>




  <?php include 'footer.php';?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="style/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="style/vendor/php-email-form/validate.js"></script>
  <script src="style/js/main.js"></script>
</body>
</html>















         