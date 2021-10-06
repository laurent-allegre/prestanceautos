<?php

include_once __DIR__ . "/admins/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}catch(PDOException $pe){
    echo $pe->getMessage();
}

/**
 * Appel du cours
 */
if (isset($_GET["id"]) && !empty($_GET["id"]))
{
    $req = "SELECT * FROM vehicules WHERE id = " . $_GET["id"];
    $stmt = $db->prepare($req);
    $stmt = $db->query($req);
    $vehicules = $stmt->fetch(PDO::FETCH_ASSOC);

}  else {
    Header('Location: index.php');
}

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
          <a class="navbar-brand" href="index.php">Prestance Autos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link me-3" href="index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="" href="index.php">
                  <img src="images/logoprestance.png" alt="Logo prestance autos" width="150" height="75">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ms-2" href="#about">Nos voitures</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>

      <section>
          <div class="container-fluid mt-5">
              <div class="row">
                  <div class="col-xl-4 col-md-10 col-sm-12 offset-xl-1 left tarif">
                    <h3><?=$vehicules['title']; ?></h3>
                    <h4 class=""><?= $vehicules['prix']; ?> € TTC</h4>
                        <img src="images/<?= $vehicules['images'] ?>" alt="" class="img-fluid">
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 right">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"><i class="fas fa-3x fa-tachometer-alt"></i> </th>
                            <th scope="col"><i class="fas fa-3x fa-car"></i></th>
                            <th scope="col"><i class="fas fa-3x fa-gas-pump"></i></th>
                          </tr>
                        </thead>
                    </table>
                <!--TABLEAU 1 GAUCHE-->      
                <div class="row">
                    <div class="col-xl-6">
                        <table class="table table-striped">
                            <tbody>
                              <tr>
                                <th scope="row">Marque</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['marque']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Modèle</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['modele']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Boite de vitesse</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['btv']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Kilométrage</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['kilometre']; ?> Km</td>
                              </tr>
                              <tr>
                                <th scope="row">Date de mise en Circulation</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['datemisecirculation']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Cylindrée</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['cylindree']; ?> cm</td>
                              </tr>
                              <tr>
                                <th scope="row">Nombre de cylindres</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['nbcylindre']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Puissance fiscale</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['pfiscale']; ?> cv</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <!--TABLEAU 2 DROIT--> 
                    <div class="col-xl-6">
                        <table class="table table-striped">
                            <tbody>
                              <tr>
                                <th scope="row">Puissance DIN</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['pdin']; ?> Ch</td>
                              </tr>
                              <tr>
                                <th scope="row">Taux d'émission Co2</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['temission']; ?>g/km</td>
                              </tr>
                              <tr>
                                <th scope="row">Couleur extérieur</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['cexterieur']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Couleur intérieur</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['cinterieur']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Nombre de sièges</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['nsieges']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Nombre de portes</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['nportes']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Transmission</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['transmission']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Carosserie</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['carosserie']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Energie</th>
                                <td></td>
                                <td></td>
                                <td><?= $vehicules['energie']; ?></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>  
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