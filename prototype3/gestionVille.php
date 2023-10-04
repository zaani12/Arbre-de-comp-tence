<?php
class GestionVille extends ville {

private $serverName = "localhost";
private $username = "root";
private $password = "";
private $dbname  = "arbre de comptence";
private $charset = "utf8mb4";
private $pdo;


public function __construct()
{
    $this->serverName = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "arbre de comptence";
    $this->charset = "utf8mb4";

    // Connect to the database 
    try {
        $DB_con = "mysql:host=" . $this->serverName . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
        $this->pdo = new PDO($DB_con, $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "is connected";
        return $this->pdo;
    } catch (PDOException $e) {
        // die("Failed to connect with MySQL: " . $e->getMessage());
        echo "Failed to connect with MySQL: " . $e->getMessage();
    }
}



public function getVilleById($Id) {

    $sql = "SELECT `ville` FROM `ville` WHERE `id` = $Id";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $villeData = $stmt->fetch(PDO::FETCH_ASSOC);
    return $this->setVille($villeData['ville'])   ;     
}


public function getVillesId()
{
    $sql = "SELECT id FROM `ville`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $StagiairesVilles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $getVillesIds = [];
    foreach($StagiairesVilles as $StagiairesVille){
        $Ville = new stager;
        $Ville->setId($StagiairesVille['id']);
    
        array_push($getVillesIds, $Ville);
    }


    return $getVillesIds;
}

}
?>