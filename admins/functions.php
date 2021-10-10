<?php



/*=================== FONCTION du Login ================*/

function validateForm (string $input): string {
    $safe = trim($input);
    $safe = htmlentities($safe);
    $safe = stripslashes($safe);

    return $safe;

}
/*===============================================*/
/*============== Auhtentification ===============*/

function signIn(string $login, string $password): array {

    include_once __DIR__ . "/admins/inc/database.php";

    try{
        $db = new pdo("mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8;",Database::DBUSER, Database::DBPASS , array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));
    }catch(PDOException $pe){
        echo $pe->getMessage();
    }
    
    $sql = "SELECT * FROM admins WHERE login = :login ;";
    $req = $db -> prepare ($sql);
    $req-> bindParam(':login', $login, PDO::PARAM_STR);
    $req-> execute ();

    $results = $req -> fetchAll();

    foreach($results as $item ) {

        if(password_verify($password, $item["password"] )) {
            return $item;
        } else {
            return array();
        }

    }
    return array();
}
