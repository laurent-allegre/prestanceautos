<?php

include_once __DIR__ . "/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}catch(PDOException $pe){
    echo $pe->getMessage();
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

      <!--==================== LISTE DES VEHICULES=======================-->
            <div class="container admin">
                <div class="row table-responsive">
                    <h2><strong>Liste des Véhicules :</strong><a href="insert.php" type="button"class="btn btn-success btn-sm ms-3"><span class="fas fa-plus"></span> Ajouter</a><a href="../index.php" type="button"class="btn btn-primary btn-sm ms-1"><span class="fas fa-arrow-left"></span> retour </a></h2>
                
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Mise en circulation</th>
                                <th>Kilomètre</th>
                                <th>Prix</th>
                                <th>Couleurs</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $statement = $db->query('SELECT vehicules.id, vehicules.title, vehicules.datemisecirculation, vehicules.kilometre, vehicules.prix, vehicules.cexterieur FROM vehicules ORDER BY vehicules.id DESC');
                                while($item = $statement->fetch())
                                {
                                echo '<tr>';
                                  echo '<td>' . $item['title'] . '</td>'; 
                                  echo '<td>' . $item['datemisecirculation'] . '</td>'; 
                                  echo '<td>' . $item['kilometre'] . ' Kms</td>'; 
                                  echo '<td>' . $item['prix'] . ' €</td>';
                                  echo '<td>' . $item['cexterieur'] . '</td>';

                                  echo '<td class="action">';
                                  echo '<a type="button"class="btn btn-outline-secondary btn-sm" href="view.php?id=' . $item['id'] .'"><span class="fas fa-eye"></span>  voir</a>';
                                  echo ' ';
                                  echo '<a type="button"class="btn btn-primary btn-sm" href="update.php?id=' . $item['id'] .'"><span class="fas fa-edit"></span>  Modifier</a>';
                                  echo ' ';
                                  echo '<a type="button"class="btn btn-danger btn-sm" href="delete.php?id=' . $item['id'] .'"><span class="fas fa-edit"></span>  Supprimer</a>';
                                  
                                  echo '</td>';     
                                echo '</tr>';    

                                }
                        
                            ?>
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>

      
    <?php
      include_once __DIR__ . "../../footer.php";
    ?>

      </body>
  </html>      