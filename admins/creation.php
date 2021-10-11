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
  <title>Prestance Autos annonces creation</title>
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
                  <img src="../images/logoprestance.png" alt="Logo prestance autos" width="150" height="75">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ms-2" href="#about">Nos voitures</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>
      <!-- INSERTION D'UN NOUVEAU VEHICULE -->

      <main class="fond">

<div class="container mt-5">
    <h2 class="text-center">Créer une nouvelles carte</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">
            <!--Form with header-->

            <form action="insertion.php " method="post" enctype="multipart/form-data">
                <div class="card border-primary rounded-0">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2">
                            <h3><i class="fa fa-envelope"></i> Ajouter</h3>
                            <p class="m-0">Une nouvelle carte</p>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                </div>
                                <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Titre de la carte" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                </div>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Déscription" required>
                            </div>
                        </div>

                         <div class="form-group">
                                <div class="input-group mb-2 ">
                                    <div class="input-group-prepend">

                                    </div>
                                    <input type="file" class="form-control" id="image" name="image"  required>
                                </div>
                         </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                    </div>

                                </div>
                            </div>


                        <div class="text-center">
                            <input type="submit" name="submit" value="enregistrer" class="btn btn-info btn-block rounded-0 py-2">
                        </div>
                    </div>

                 </div>
            </form>
            <!--Form with header-->
        </div>
    </div>
</div>
</main>

     

      
    <?php
      include_once __DIR__ . "/../footer.php";
    ?>

      </body>
  </html>      