
<?php
    
    include_once __DIR__ . "/inc/database.php";
    
    try{
        $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
    }catch(PDOException $pe){
        echo $pe->getMessage();
    }
    

    if(!empty($_GET['id'])) {

    $id = checkInput($_GET['id']);  
    }

    $statement = $db->prepare('SELECT vehicules.title, vehicules.prix, vehicules.images, vehicules.marque, vehicules.modele, vehicules.btv,
        vehicules.kilometre, vehicules.datemisecirculation, vehicules.cylindree, vehicules.nbcylindre, vehicules.pfiscale, vehicules.pdin,
        vehicules.temission, vehicules.cexterieur, vehicules.cinterieur, vehicules.nsieges, vehicules.nportes, vehicules.transmission,
        vehicules.carosserie, vehicules.energie FROM vehicules  WHERE vehicules.id = ?');
    $statement->execute(array($id));   
    $item = $statement->fetch();
                           


function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
  <link rel="stylesheet" href="../css/style.css">
  <title>Prestance Autos annonces</title>
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
                <a class="" href="#">
                  <img src="../images/logoprestance.png" alt="Logo prestance autos" width="150" height="75">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ms-2" href="index.php#about">Nos voitures</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>

            <div class="container admin">
                <div class="row table-responsive">

                   <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title">Voir un Vehicules :</h5>
                                        <p class="card-text"><strong>Marque: </strong> <?= ' ' . $item['marque']; ?></p>
                                        <p class="card-text"><strong>Modèle: </strong> <?= ' ' . $item['modele']; ?></p>
                                        <p class="card-text"><strong>Prix: </strong> <?= ' ' . $item['prix'] . ' €'; ?></p>
                                        <p class="card-text"><strong>Mise en circulation: </strong> <?= ' ' . $item['datemisecirculation']; ?></p>
                                        <p class="card-text"><strong>Kilométrages: </strong> <?= ' ' . $item['kilometre'] . ' Kms'; ?></p>
                                        <p class="card-text"><strong>Boite de vitesse: </strong> <?= ' ' . $item['btv']; ?></p>
                                        <p class="card-text"><strong>Cylindrée: </strong> <?= ' ' . $item['cylindree'] . ' cm3'; ?></p>
                                        <p class="card-text"><strong>Nb de cylindres: </strong> <?= ' ' . $item['nbcylindre'] . ' cylindres'; ?></p>
                                        <p class="card-text"><strong>Puissance fiscale: </strong> <?= ' ' . $item['pfiscale'] . ' Cv'; ?></p>
                                        <p class="card-text"><strong>Puissance Din: </strong> <?= ' ' . $item['pdin'] . ' Cv'; ?></p>
                                        <p class="card-text"><strong>Emission Co2: </strong> <?= ' ' . $item['temission'] . ' g/Km'; ?></p>
                                        <p class="card-text"><strong>Couleur Exterieur: </strong> <?= ' ' . $item['cexterieur']; ?></p>
                                        <p class="card-text"><strong>Couleur Intérieur: </strong> <?= ' ' . $item['cinterieur']; ?></p>
                                        <p class="card-text"><strong>Nbs de Sieges: </strong> <?= ' ' . $item['nsieges'] . ' sieges'; ?></p>
                                        <p class="card-text"><strong>Nbs de Portes: </strong> <?= ' ' . $item['nportes'] . ' portes'; ?></p>
                                        <p class="card-text"><strong>Transmission: </strong> <?= ' ' . $item['transmission']; ?></p>
                                        <p class="card-text"><strong>Carosserie: </strong> <?= ' ' . $item['carosserie']; ?></p>
                                        <p class="card-text"><strong>Energie: </strong> <?= ' ' . $item['energie']; ?></p>
                                        <a href="index.php" type="button"class="btn btn-success btn-sm"><span class="fas fa-arrow-left"></span> Retour</a>
                                    </div>
                                    <div class="col-sm-6 site bordure">
                                        <img class="img-fluid mt-4" src="<?= '../images/' . $item['images']; ?>" alt="image du vehicule" >
                                        <p class="price mt-2"><?= number_format((float) $item['prix'],2,'.',''). ' €'; ?></p> 
                                        <h5 class="card-title mt-5"><?= $item['title']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>        
    
    


            </section>

    <?php
      include_once __DIR__ . "../../footer.php";
    ?>

      </body>
  </html>  