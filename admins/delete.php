<?php 
 include_once __DIR__ . "/inc/database.php";

 try {
     $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;", Database::DBUSER, Database::DBPASS, array(
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     ));
 } catch (PDOException $pe) {
     echo $pe->getMessage();
 }
 
 
 
if(!empty($_GET['id'])) {
$id = checkInput($_GET['id']);
}
 
 
if(!empty($_POST)) {
	$errors = array();
	$id = checkInput($_POST['id']);
	$reponse = $db->prepare('SELECT images FROM vehicules WHERE id = ?');
	$reponse->execute(array($id));
  $donnees = $reponse->fetch();
  /* ON EFFACE L'IMAGE STOCKé DANS LE DOSSIER IMAGES */
  unlink(__DIR__."/../images/". $donnees[0]);
   
	$statement = $db->prepare("DELETE FROM vehicules WHERE id = ?");
	$statement->execute(array($id));
	echo 'Votre photo à bien été supprimée.';
  header("Location: index.php");
	
}
 
 
function checkInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 
?>
<?php
session_name("login");
session_start();

if(!empty($_SESSION) && isset($_SESSION["login"])) {
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
  <title>Prestance Autos Supprimer une annonce</title>
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
                <h1><span class="fas fa-car "></span> Supprimer un Véhicule : <span class="fas fa-car"></span></h1><br>
                <h3>Attention cette action est Irréversible</h3><br>
                        <form class="form" role="form" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <p class="alert alert-warning">Etes vous sur de vouloir supprimer le véhicule ? Cette action est irréversible  </p>
                            
                                                   
                            <div class="form-actions">
                                <button type="submit" class="btn btn-danger"><span class="fas fa-trash-alt"> Supprimer</span></button>
                                <a href="index.php" type="button"class="btn btn-primary"><span class="fas fa-arrow-left"> Non</span></a>
                            </div>
                        </form>    
                    
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