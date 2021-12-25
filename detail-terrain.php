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
  <?php require 'navbar.php';?>
  <main id="main">
  <?php
require_once 'Connexion/connexion.php' ;
  $sql = 'SELECT * FROM terrain WHERE id = '.$_GET['id'];
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
              <h1 class="title-single"> <?php echo $recipe['type_propriete']; ?></h1>
              <span class="color-text-a"><?php echo $recipe['adresse']; ?></span>
              <h3 style="color: #df591e" class="title-d detSyle"><?php echo $recipe['prix']; ?> TND</h3>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="terrain.php">Terrain</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <?php echo $recipe['type_propriete']; ?>
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
                      $req = $mysqlClient->query('SELECT image_terrain.titre , image_terrain.id  From image_terrain join terrain on terrain.id = image_terrain.terrain_id where image_terrain.terrain_id='.$_GET['id'] );
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
                              <br>
                            <!-- description  -->
                            <!--  end description -->
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

                  <!-- ////hna  -->


                  <div class="summary-list">
                                    <ul class="list">
                                      <li class="d-flex justify-content-between">
                                        <div>
        
                                            <strong>Type de propriété : </strong>
                                        </div>
                                        <span><?php echo $recipe['type_propriete'];?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                           
                                            <strong>Type des offres : </strong>
                                        </div>
                                        <span><?php echo $recipe['type_offres']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <strong>Cité : </strong>
                                        </div>
                                        <span><?php echo $recipe['cite']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            
                                            <strong>Route/Rue/Avenue : </strong>
                                        </div>
                                        <span><?php echo $recipe['adresse']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                          
                                            <strong>Surface du terrain : </strong>
                                        </div>
                                        <span><?php echo $recipe['surface_terrain']; ?>m² </span>
                                      </li>
                                        <li class="d-flex justify-content-between">
                                        <div>
                                            
                                            <strong>Gaz de Ville : </strong>
                                        </div>
                                        <span><?php echo $recipe['gaz_ville']; ?></span>
                                        </li>

                                        <li class="d-flex justify-content-between">
                                        <div>
                                            <strong>Réseau ONAS : </strong>
                                        </div>
                                        <span><?php echo $recipe['reseau_onas']; ?></span>
                                      </li>


                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <strong>Type de papiers : </strong>
                                        </div>
                                        <span><?php echo $recipe['type_papiers']; ?></span>
                                      </li>


                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <strong>Permis de construction : </strong>
                                        </div>
                                        <span><?php echo $recipe['permis_construction']; ?></span>
                                      </li>








                                    </ul>
                                  </div>






<!-- /////end hna  -->







                              
                                      </div>
                                  </div>


           </div>      
                      </div>
                  </div> 
                  <!-- ------------------end block2 ------------------------- -->
        


                  <h3> Description </h3>
                             <hr> 
                            <p> <?php echo $recipe['description'];?> </p> 


                        

          
  
      </div>
      
  
    </section>



  </main>
  <?php include 'footer.php';?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="style/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="style/vendor/php-email-form/validate.js"></script>
  <script src="style/js/main.js"></script>
</body>
</html>















         