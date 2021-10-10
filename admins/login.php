<?php
//declare(strict_types= 1);


session_name ("login");
session_start();



include_once __DIR__ . "/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));
}catch(PDOException $pe){
    echo $pe->getMessage();
}
include_once __DIR__ . "/functions.php";



$erreur = false;


$login = " ";

if(isset($_POST) && !empty($_POST)) {

    $login = validateForm($_POST["login"]);
    $password = trim($_POST["password"]) ;

    if(strpos($login, "&gt;") > 0) {
        header("location: honney.php");
    }

    $admin = signIn($login, $password);

    if (!empty($admin)) {
        if ($admin["id"] > 0) {
            $_SESSION["login"] = $admin["login"];
            header("Location: index.php");
        } else {
            $erreur = true;
        }
    } else {
        $erreur = true;
    }

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
  <title>Prestance Autos connexion administrateur</title>
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
                <a class="nav-link me-3" href="../index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="" href="#">
                  <img src="../images/logoprestance.png" alt="Logo prestance autos" width="150" height="75">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link ms-2" href="../index.php#about">Nos voitures</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>
          
      <!--==================== FORMULAIRE LOGIN ADMIN  =======================-->
      <div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h3 class="mb-3">Administration</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="" id="form" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Login<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-user-shield"></i></div>
                                                <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Mot de passe<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="****">
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">Soumettre</button>
                                        </div>
                                        <?php if($erreur){ ?>
                                            <div class="alert alert-danger">
                                                <h6 class="alert-title">Erreur</h6>
                                                <p>Impossible de vous connecter</p>
                                                <hr>
                                                <pre>Veuillez vérifier vos saisies</pre>
                                            </div>

                                        <?php } ?>
                                </form>
                                
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 text-center pt-5 bg-primary p-2 text-dark bg-opacity-25">
                            <h5 class="text-uppercase">prestance autos</h5>
                                <img src="../images/mercedes-logo.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-end text-secondary mt-3">Web-Concept-Site Login Page Design</p>
            </div>
        </div>
    </div>
</div>

      
    <?php
      include_once __DIR__ . "../../footer.php";
    ?>

      </body>
  </html>      