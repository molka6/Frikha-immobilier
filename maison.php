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
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Maison</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="Accueil.php">Accueil</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                Maison
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <?php 
if(isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = (int) strip_tags($_GET['page']);
}else{
  $currentPage = 1;
}
require_once 'Connexion/connexion.php' ;
$sql ='SELECT COUNT(*) AS nb_articles FROM `maison` ' ;
$query =  $mysqlClient->prepare($sql);
$query-> execute(); 
$result = $query->fetch();
$nbArticles = (int) $result['nb_articles'];
?>
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>All</option>
                  <option value="1">Disponible</option>
                  <option value="2">For Rent</option>
                  <option value="3">For Sale</option>
                </select>
              </form>
              <p style="color : black ; float: left ; margin-left:3% ;" >  <?php echo $nbArticles;  ?>  Biens </p>
            </div>
          </div>          
<!-- ----------------------------------------------------------------------------------- -->
<?php
$parPage = 12;
$pages = ceil($nbArticles / $parPage);
$premier = ($currentPage * $parPage) - $parPage;
$sql = 'SELECT * FROM `maison` ORDER BY `Date_Creation` DESC LIMIT :premier, :parpage;';
$query =  $mysqlClient->prepare($sql);
$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
$query-> execute(); 
$recipes = $query->fetchAll(PDO::FETCH_ASSOC);
$recipesStatement = $mysqlClient->prepare($sql);
foreach ($recipes as $key => $recipe) {
?>
    <div class="col-md-3">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="style/img/property-1.jpg" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">204 Mount
                        <br /> <?php echo $recipe['Titre']; ?>
                       </a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?php echo $recipe['disponibilité']; ?></span>
                    </div>
                   
                    <a href='detail.php?id=<?php echo $recipe['Id'];?>' class="link-a">Voir détails
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Superficie</h4>
                        <span> <?php echo $recipe['Superficie'];?>m
                          <sup>2</sup> 
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Construite</h4>
                        <span> <?php echo $recipe['Superficie construite'];?>m
                          <sup>2</sup> 
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php
}
require_once('Connexion/close.php');
?>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item   <?= ($currentPage == 1) ? "disabled" : "" ?>">
                  <a class="page-link" href="maison.php?page=<?= $currentPage - 1 ?>" tabindex="-1">
                    <span class="bi bi-chevron-left"></span>
                  </a>
                </li>
               
               
                <?php for($page = 1; $page <= $pages; $page++): ?>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="maison.php?page<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                

                <li class="page-item next <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                  <a class="page-link" href="maison.php?page=<?= $currentPage + 1 ?>">
                    <span class="bi bi-chevron-right"></span>
                  </a>
                </li>

              </ul>
            </nav>
          </div>
        </div> 
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