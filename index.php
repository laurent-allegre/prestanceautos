<?php

 include_once __DIR__ . "/admins/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}catch(PDOException $pe){
    echo $pe->getMessage();
}

$req = "SELECT * FROM vehicules";
$stmt = $db->prepare($req);
$stmt->execute();
$vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Prestance Autos le concessionnaire de véhicules de luxe à Monteux">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Prestance Autos</title>
  </head>
    <body>
      <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Prestance Autos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link me-3" href="index.html">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="" href="index.html">
                  <img src="images/logoprestance.png" alt="logo prestance autos" width="150" height="75">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ms-2" href="#about">Nos voitures</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>
    <!--CAROUSSEL-->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/carousel1.jpg" class="d-block w-100" alt="image 1 du carousel">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/carousel2.jpg" class="d-block w-100" alt="image 2 du carousel">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/carousel3.jpg" class="d-block w-100" alt="image 3 du carousel">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <!--FIN-----CAROUSSEL-->
    <!--SECTION---ABOUT-->
    <div class=" mx-auto mt-5">
      <section class="tm-section tm-section-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="tm-bg-circle-white tm-flex-center-v">
                        <header class="text-center">
                            <h1 class="tm-site-title">Prestance Autos</h1>
                            <p class="tm-site-subtitle">VENTE DE VOITURE DE PRESTIGE ET LUXE D'OCCASION</p>
                        </header>
                        <p>Prestance Autos vous propose un large choix de véhicules d'exception, rigoureusement sélectionnés, contrôlés et révisés* (*suivant les préconisations constructeurs).
                          Retrouvez un ensemble de marques prestigieuses telles que Aston Martin, Lamborghini, Maserati, Porsche, Ferrari, Chevrolet, Mercedes. 
                          Tous nos véhicules sont garantis 6 mois minimum et sont éligibles à une extension de garantie jusqu'à 60 mois.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>  
    <!--FIN--SECTION---ABOUT-->
    <div class="container mb-4">
      <div class="row justify-content-center">

        <div class="card" style="width: 22rem;">
          <i class="far fa-4x fa-handshake mx-auto tm-section-icon"></i>
          <div class="card-body">
            <h5 class="card-title">REPRISE</h5>
            <p class="card-text">Vous souhaitez une offre de reprise de votre ancien véhicule ? Prestance Autos vous fera une offre sans engagement.</p>
          </div>
        </div>
        
        <div class="card" style="width: 22rem;">
          <i class="fas fa-4x fa-file-signature mx-auto tm-section-icon"></i>
          <div class="card-body">
            <h5 class="card-title">GARANTIE</h5>
            <p class="card-text">Nos véhicules sont révisés et garantis. Nous sommes également en mesure de vous proposer une extension de garantie de 6 ans, renseignez-vous auprès de nos conseillers.</p>
          </div>
        </div>

        <div class="card" style="width: 22rem;">
          <i class="fab fa-4x fa-cc-mastercard mx-auto tm-section-icon"></i>
          <div class="card-body">
            <h5 class="card-title">FINANCEMENT</h5>
            <p class="card-text">Nous pouvons vous proposer des offres de financement afin de vous aider dans l'acquisition de votre nouveau véhicule.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Liste des véhicules-->
     <!-- PARTIE GAUCHE DE LA PAGE-->      
    <section id="about" class="mt-5">
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-4 col-md-10 col-sm-12 offset-xl-1 left">
               <div class="sticky-element">
                  <h2>Catalogue</h2>
                  <h3>De nos vehicules disponibles.</32>
                  <img src="images/audi.png" alt="" class="img-fluid">
               </div>
            </div>
            
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 right">
               <div class="row">
                <!--============ DEBUT DES CARTES DES VEHICULES ===========-->
                  <?php foreach ($vehicules as $vehicule) : ?>
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 col-flex">
                     <div class="about-card h-100">
                       <!--image miniature-->
                        <img src="images/<?= $vehicule['images'] ?>" class="img-fluid" alt="Miniature du site web webConceptSite" data-bs-toggle="modal" data-bs-target="#Modal">
                        <h4 class="text-heading"><?= $vehicule['title']; ?></h4>
                        <div class="d-inline p-2 bg-secondary text-white"><?= $vehicule['datemisecirculation']; ?></div>
                        <div class="d-inline p-2 bg-secondary text-white"><?= $vehicule['kilometre']." Km"; ?></div>
                          <p class="mt-4 text-center  bg-secondary text-white"><?= $vehicule['prix'] . " €";?></p>
                 
                        <div class="d-grid gap-2 d-md-flex justify-content-center mt-5">
                          <a href="annonce.php?id=<?= $vehicule["id"] ?> " class="btn btn-success me-md-2" role="button">Voir l'annonce</a>
                        </div>
                     </div>
                  </div>
                  <!-- Fin de la card-->

                  <?php endforeach ; ?>
                </div>
            </div>
         </div>
      </div>
   </section>


    <!-- FOOTER -->
<div class="container-fluid my-5">

  <footer class="text-white text-center text-lg-start bg-dark">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row mt-4">
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Prestance Autos</h5>

          <p>
            Prestance Autos vous propose un large choix de véhicules d'exception, rigoureusement sélectionnés, contrôlés et révisés
          </p>

          <p>
            Aston Martin, Lamborghini, Maserati, Porsche, Ferrari, Chevrolet, Mercedes.
          </p>

          <div class="mt-4">
            <!-- Facebook -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
            <!-- Dribbble -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-dribbble"></i></a>
            <!-- Twitter -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
            <!-- Google + -->
            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google-plus-g"></i></a>
            <!-- Linkedin -->
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          

          <ul class="fa-ul" style="margin-left: 1.65em;">
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">78 Allée de la résistance 84170 Monteux</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">contact@example.com</span>
            </li>
            <li class="mb-3">
              <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 06 89 38 34 90</span>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Horaires d'ouvertures</h5>

          <table class="table text-center text-white">
            <tbody class="fw-normal">
              <tr>
                <td>Lundi - jeudi:</td>
                <td>8h - 18h</td>
              </tr>
              <tr>
                <td>vendredi - Samedi:</td>
                <td>8h - 19h</td>
              </tr>
              <tr>
                <td>Dimanche:</td>
                <td>Fermée</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white" href="https://web-concept-site.fr/">Web-Concept-Site</a>
    </div>
    <!-- Copyright -->
  </footer>

</div>
<!-- End of .container -->
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>