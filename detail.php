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
  $sql = 'SELECT * FROM maison WHERE Id = '.$_GET['id'];
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
              <span class="color-text-a">Route Gremda klm 8</span>
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
                      $req = $mysqlClient->query('SELECT image.titre , image.id  From image join maison on maison.id = image.maison_id where image.maison_id='.$_GET['id'] );
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
                                        <span><?php echo $recipe['Superficie construite']; ?>m²</span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/esquisser.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de pièce: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre de piéce']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/chambre.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de chambre: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre de chambre']; ?></span>
                                      </li>
                                      <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/salle.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de salle d'eau: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre de salle deau']; ?></span>
                                      </li>
                                        <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/salle-de-bains.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de salle de bain: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre de salle de bain']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                        <div>
                                            <img src="style/image/chambre3.png" alt="" style="width: 7%; margin-right: 9px;">
                                            <strong>Nombre de couchage: </strong>
                                        </div>
                                        <span><?php echo $recipe['Nombre de couchage']; ?></span>
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
                      $req2 = $mysqlClient->query('SELECT option.nom   From option  join maison on maison.id = option.maison_id where option.maison_id='.$_GET['id'] );
                      $recipes = $req2->fetchAll(PDO::FETCH_ASSOC);  
                    
                      ?>
                                  <div class="col-md-7 col-lg-7 section-md-t3" style="margin-left: 2%; width: 100%">
                                        <div class="">
                                          <?php foreach ($recipes as $key => $recipe) {
                                            ?>
                                          <ul class="list-a">
                                               <li class="etique"><?php echo $recipe['nom']  ?></li> 
                                          </ul>
                                          
                                          <?php }  ?>  
             
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
  <?php include 'footer.php';?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="style/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="style/vendor/php-email-form/validate.js"></script>
  <script src="style/js/main.js"></script>
</body>
</html>















         