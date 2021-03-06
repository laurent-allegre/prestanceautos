<?php

include_once __DIR__ . "/inc/database.php";

try {
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;", Database::DBUSER, Database::DBPASS, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
} catch (PDOException $pe) {
    echo $pe->getMessage();
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_name("login");
session_start();


if (!empty($_GET['id'])) {
    $id = CheckInput($_GET['id']);
}



$nameError = $titleError = $prixError = $marqueError = $modeleError = $btvError = $kilometreError = $datemisecirculationError = $cylindreeError =
    $nbcylindreError = $pfiscaleError = $pdinError = $temissionError = $cexterieurError = $cinterieurError = $nsiegesError = $nportesError = $transmissionError = $carosserieError = $energieError = $imagesError =
    $title = $prix = $marque = $modele = $btv = $kilometre = $datemisecirculation = $cylindree = $nbcylindre = $pfiscale = $pdin = $temission = $cexterieur =
    $cinterieur = $nsieges = $nportes = $transmission = $carosserie = $energie = $images = "";

if (!empty($_POST)) {
    $title        = CheckInput($_POST['title']);
    $prix         = CheckInput($_POST['prix']);
    $marque       = CheckInput($_POST['marque']);
    $modele       = CheckInput($_POST['modele']);
    $btv           = CheckInput($_POST['btv']);
    $kilometre       = CheckInput($_POST['kilometre']);
    $datemisecirculation       = CheckInput($_POST['datemisecirculation']);
    $cylindree       = CheckInput($_POST['cylindree']);
    $nbcylindre       = CheckInput($_POST['nbcylindre']);
    $pfiscale       = CheckInput($_POST['pfiscale']);
    $pdin       = CheckInput($_POST['pdin']);
    $temission       = CheckInput($_POST['temission']);
    $cexterieur       = CheckInput($_POST['cexterieur']);
    $cinterieur       = CheckInput($_POST['cinterieur']);
    $nsieges       = CheckInput($_POST['nsieges']);
    $nportes       = CheckInput($_POST['nportes']);
    $transmission       = CheckInput($_POST['transmission']);
    $carosserie       = CheckInput($_POST['carosserie']);
    $energie       = CheckInput($_POST['energie']);

    $images       = CheckInput($_FILES['images']['name']);
    $imagePath   = '../images/' . basename($images);
    $imageExtend  = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess   = true;


    if (empty($title)) {
        $titleError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($prix)) {
        $prixError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($marque)) {
        $marqueError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($modele)) {
        $modeleError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($btv)) {
        $btvError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($kilometre)) {
        $kilometreError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($datemisecirculation)) {
        $datemisecirculationError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($cylindree)) {
        $cylindreeError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($nbcylindre)) {
        $nbcylindreError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($pfiscale)) {
        $pfiscaleError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($pdin)) {
        $pdinError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($temission)) {
        $temissionError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($cexterieur)) {
        $cexterieurError = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($cinterieur)) {
        $cinterieur = "Ce champ ne peut pas ??tre vide";
        $isSuccess = false;
    }
    if (empty($images)) {
        $isImageUpdated = false;
    } else {
        $isImageUpdated = true;
        $isUploadSuccess = true;
        if ($imageExtend != 'jpg' && $imageExtend != 'png' && $imageExtend != 'jpeg' && $imageExtend != 'gif') {
            $imageError = "Les fichiers autoris??s sont : .jpg, .png, .jpeg, .gif";
            $isUploadSuccess = false;
        }
        if (file_exists($imagePath)) {
            $imageError = "le fichier existe d??j??";
            $isUploadSuccess = false;
        }
        if ($_FILES['images']['size'] > 500000) {
            $imageError = "le fichier ne doit pas d??passer les 500KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES['$images']['tmp_name'], $imagePath)) {
                $imagesError = "Il y a eu une erreur lors de l'upload ";
                $isUploadSuccess = false;
            }
        }
    }
    if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) {

        if ($isImageUpdated) {
            $statement = $db->prepare("UPDATE vehicules SET title = ?, prix = ?, marque = ?, modele = ?, btv = ?, kilometre = ?, datemisecirculation = ?, cylindree = ?, nbcylindre = ?, 
                    pfiscale = ?, pdin = ?, temission = ?, cexterieur = ?, cinterieur = ?, nsieges = ?, nportes = ?, transmission = ?, carosserie = ?, energie = ?, images = ?  WHERE id = ?");
            $statement->execute(array(
                $title, $prix, $marque, $modele, $btv, $kilometre, $datemisecirculation, $cylindree, $nbcylindre, $pfiscale, $pdin, $temission, $cexterieur, $cinterieur,
                $nsieges, $nportes, $transmission, $carosserie, $energie, $images, $id
            ));
        } else {
            $statement = $db->prepare("UPDATE vehicules SET title = ?, prix = ?, marque = ?, modele = ?, btv = ?, kilometre = ?, datemisecirculation = ?, cylindree = ?, nbcylindre = ?, 
                    pfiscale = ?, pdin = ?, temission = ?, cexterieur = ?, cinterieur = ?, nsieges = ?, nportes = ?, transmission = ?, carosserie = ?, energie = ? WHERE id = ?");
            $statement->execute(array(
                $title, $prix, $marque, $modele, $btv, $kilometre, $datemisecirculation, $cylindree, $nbcylindre, $pfiscale, $pdin, $temission, $cexterieur, $cinterieur,
                $nsieges, $nportes, $transmission, $carosserie, $energie, $id
            ));
        }


        header('Location: index.php');
    } else if ($isImageUpdated && !$isUploadSuccess) {

        $statement = $db->prepare("SELECT images FROM vehicules WHERE id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $images = $item['images'];
    }
} else {

    $statement = $db->prepare("SELECT * FROM vehicules WHERE id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();

    $title = $item['title'];
    $prix = $item['prix'];
    $marque = $item['marque'];
    $modele = $item['modele'];
    $btv = $item['btv'];
    $kilometre = $item['kilometre'];
    $datemisecirculation = $item['datemisecirculation'];
    $cylindree =$item['cylindree'];
    $nbcylindre = $item['nbcylindre'];
    $pfiscale = $item['pfiscale'];
    $pdin = $item['pdin'];
    $temission = $item['temission'];
    $cexterieur = $item['cexterieur'];
    $cinterieur = $item['cinterieur'];
    $nsieges = $item['nsieges'];
    $nportes = $item['nportes'];
    $transmission = $item['transmission'];
    $carosserie = $item['carosserie'];
    $energie = $item['energie'];
    $images = $item['images'];
}

if (!empty($_SESSION) && isset($_SESSION["login"])) {


?>


    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Prestance Autos le concessionnaire de v??hicules de luxe ?? Monteux">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Prestance Autos modifier une annonce</title>
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
                                <img src="../images/logoprestance.webp" alt="Logo prestance autos" width="150" height="75">
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
                     <h1><span class="fas fa-car "></span> Modifier un V??hicule <span class="fas fa-car"></span></h1><br>
                         <div class="col-7 col-sm-7"> <!--====== Debut Premi??re Colonne ========-->
                    
                            <form  class="form" role="form" action="<?= 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">titre:</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?= $title; ?>">
                                    <span class="help-inline"><?= $titleError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="prix">Prix:</label>
                                    <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?= $prix; ?>" >
                                    <span class="help-inline"><?= $prixError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Marque:</label>
                                    <input type="text" class="form-control" id="marque" name="marque" placeholder="marque" value="<?= $marque; ?>" >
                                    <span class="help-inline"><?= $marqueError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Mod??le:</label>
                                    <input type="text" class="form-control" id="modele" name="modele" placeholder="mod??le" value="<?= $modele; ?>" >
                                    <span class="help-inline"><?= $modeleError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Boite de vitesse:</label>
                                    <input type="text" class="form-control" id="btv" name="btv" placeholder="Boite de vitesse" value="<?= $btv; ?>" >
                                    <span class="help-inline"><?= $btvError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Nbs de Kilom??tre:</label>
                                    <input type="text" class="form-control" id="kilometre" name="kilometre" placeholder="Nbs Kilometre" value="<?= $kilometre; ?>" >
                                    <span class="help-inline"><?= $kilometreError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Mise en Circulation:</label>
                                    <input type="text" class="form-control" id="datemisecirculation" name="datemisecirculation" placeholder="date de mise en circulation" value="<?= $datemisecirculation; ?>" >
                                    <span class="help-inline"><?= $datemisecirculationError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Cylindr??e:</label>
                                    <input type="text" class="form-control" id="cylindree" name="cylindree" placeholder="Cylindr??e" value="<?= $cylindree; ?>" >
                                    <span class="help-inline"><?= $cylindreeError; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="marque">Nombres de cylindre:</label>
                                    <input type="text" class="form-control" id="nbcylindre" name="nbcylindre" placeholder="nombres de cylindres" value="<?= $nbcylindre; ?>" >
                                    <span class="help-inline"><?= $nbcylindreError; ?></span>
                                </div>
                          
                            <div class="form-group">
                                <label for="marque">Puissance Fiscale:</label>
                                <input type="text" class="form-control" id="pfiscale" name="pfiscale" placeholder="puissance fiscale" value="<?= $pfiscale; ?>" >
                                <span class="help-inline"><?= $pfiscaleError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Puissance Din:</label>
                                <input type="text" class="form-control" id="pdin" name="pdin" placeholder="puissance din" value="<?= $pdin; ?>" >
                                <span class="help-inline"><?= $pdinError; ?></span>
                            </div>
                       

                            <div class="form-group">
                                <label for="marque">Emission de Co2:</label>
                                <input type="text" class="form-control" id="temission" name="temission" placeholder="??mission de co2" value="<?= $temission; ?>" >
                                <span class="help-inline"><?= $temissionError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Couleur Ext??rieur:</label>
                                <input type="text" class="form-control" id="cexterieur" name="cexterieur" placeholder="couleur ext??rieur" value="<?= $cexterieur; ?>" >
                                <span class="help-inline"><?= $cexterieurError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Couleur Int??rieur:</label>
                                <input type="text" class="form-control" id="cinterieur" name="cinterieur" placeholder="couleur int??rieur" value="<?= $cinterieur; ?>" >
                                <span class="help-inline"><?= $cinterieurError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Nombres de si??ges:</label>
                                <input type="text" class="form-control" id="nsieges" name="nsieges" placeholder="nombres de si??ges" value="<?= $nsieges; ?>" >
                                <span class="help-inline"><?= $nsiegesError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Nombres de Portes:</label>
                                <input type="text" class="form-control" id="nportes" name="nportes" placeholder="nombres de portes" value="<?= $nportes; ?>" >
                                <span class="help-inline"><?= $nportesError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Transmission:</label>
                                <input type="text" class="form-control" id="transmission" name="transmission" placeholder="transmission" value="<?= $transmission; ?>" >
                                <span class="help-inline"><?= $transmissionError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Carosserie:</label>
                                <input type="text" class="form-control" id="carosserie" name="carosserie" placeholder="carosserie" value="<?= $carosserie; ?>" >
                                <span class="help-inline"><?= $carosserieError; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="marque">Energie:</label>
                                <input type="text" class="form-control" id="energie" name="energie" placeholder="??nergie" value="<?= $energie; ?>" >
                                <span class="help-inline"><?= $energieError; ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Image:</label>
                                <p><?= $images; ?></p>
                                <label for="images">S??lectionner une image:</label>
                                <input type="file" class="form-control" id="images" name="images">
                                <span class="help-inline"><?= $imagesError; ?></span>
                            </div>
                        
                        
                       
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><span class="fas fa-pencil-alt"> Modifier</span></button>
                                <a href="index.php" type="button"class="btn btn-primary"><span class="fas fa-arrow-left"> Retour</span></a>
                            </div>
                        </form>    
                    </div>
                        <div class="col-5 site bordure">
                            <img class="img-fluid mt-2" src="<?= '../images/' . $images; ?>" alt="sans" >
                                <p class="price"></p> 
                                <h5 class="card-title"><?= $title; ?></h5>
                                <p ><?= $title; ?></p>
                        </div>
                </div>        




        <?php
        include_once __DIR__ . "../../footer.php";
        ?>
        <!-- SI ON EST PAS CONNECTER ON AFFICHE LA PAGE D'ACCUEIL -->
    <?php } else {
    header("location: ./");
} ?>

    </body>

    </html>