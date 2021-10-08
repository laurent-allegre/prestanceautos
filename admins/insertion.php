<?php

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Vérifiez si le fichier image est une image réelle ou une fausse image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["images"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Vérifier si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Vérifier la taille du fichier
if ($_FILES["images"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Autoriser certains formats de fichiers
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Vérifiez si $uploadOk est défini sur 0 par une erreur
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// si tout va bien, télécharger le fichier
} else {
    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["images"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/**
 * connection et insertion en Bdd
 */

include_once __DIR__ . "/inc/database.php";

try{
    $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ));





$pdostat= $db->prepare ('INSERT IGNORE INTO vehicules VALUES
    (NULL, :title, :prix, :images, :marque, :modele, :btv, :kilometre, :datemisecirculation, :cylindree, :nbcylindre, :pfiscale, :pdin, :temission,
    :cexterieur, :cinterieur, :nsieges, :nportes, :transmission, :carosserie, :energie)');

// on lie les valeurs
$pdostat->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$pdostat->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
$pdostat->bindValue(':images', $_FILES["images"]["name"], PDO::PARAM_STR);
$pdostat->bindValue(':marque', $_POST['marque'], PDO::PARAM_STR);
$pdostat->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
$pdostat->bindValue(':btv', $_POST['btv'], PDO::PARAM_STR);
$pdostat->bindValue(':kilometre', $_POST['kilometre'], PDO::PARAM_STR);
$pdostat->bindValue(':datemisecirculation', $_POST['datemisecirculation'], PDO::PARAM_STR);
$pdostat->bindValue(':cylindree', $_POST['cylindree'], PDO::PARAM_STR);
$pdostat->bindValue(':nbcylindre', $_POST['nbcylindre'], PDO::PARAM_STR);
$pdostat->bindValue(':pfiscale', $_POST['pfiscale'], PDO::PARAM_STR);
$pdostat->bindValue(':pdin', $_POST['pdin'], PDO::PARAM_STR);
$pdostat->bindValue(':temission', $_POST['temission'], PDO::PARAM_STR);
$pdostat->bindValue(':cexterieur', $_POST['cexterieur'], PDO::PARAM_STR);
$pdostat->bindValue(':cinterieur', $_POST['cinterieur'], PDO::PARAM_STR);
$pdostat->bindValue(':nsieges', $_POST['nsieges'], PDO::PARAM_STR);
$pdostat->bindValue(':nportes', $_POST['nportes'], PDO::PARAM_STR);
$pdostat->bindValue(':transmission', $_POST['transmission'], PDO::PARAM_STR);
$pdostat->bindValue(':carosserie', $_POST['carosserie'], PDO::PARAM_STR);
$pdostat->bindValue(':energie', $_POST['energie'], PDO::PARAM_STR);

$pdostat->execute();

}catch(PDOException $pe){
    echo $pe->getMessage();
}

header ("location:../index.php");
?>
