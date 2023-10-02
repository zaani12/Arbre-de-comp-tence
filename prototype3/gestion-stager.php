<?php



include './stager.php';
<<<<<<< HEAD
include './ville.php';
=======
include './viile.php';
>>>>>>> fc7c9315fef9c1ccbd699bb55e2ffb04447f3cf6

class GestionStagiaire
{


    private $serverName = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname  = "prototype1";
    private $charset = "utf8mb4";
    private $pdo;


    public function __construct()
    {
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "prototype1";
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
    

    public function getStagiaire(){

        $sql = "SELECT personne.id, personne.nom, personne.prenom, ville.ville
        FROM personne
        INNER JOIN ville ON personne.id = ville.id_personne;
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $StagiairesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $Stagiaires = array();

        foreach($StagiairesData as $StagiaireData){
            $stager = new stager();
            $villes = new ville;
            $stager->setId( $StagiaireData['id']);
            $stager->setnom($StagiaireData['nom']);
            $stager->setprenom($StagiaireData['prenom']);
<<<<<<< HEAD
            $stager->setVille($Villes->getVille());
            $stager->setVille($StagiaireData['ville']);

           
=======
            $villes->setVille($StagiaireData['ville']);
            $stager->setVille($villes->getVille());
>>>>>>> fc7c9315fef9c1ccbd699bb55e2ffb04447f3cf6
            array_push($Stagiaires, $stager);
        }

        return $Stagiaires;



    }
    public function getVilles()
    {
        $sql = "SELECT ville_id, Ville FROM `ville`;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $VillesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($VillesData);
        return $VillesData;
    }


    public function createStagiaire($Gestions)
    {    $nom = $Gestions->getNom();
        $CNE = $Gestions->getCNE();
        $ville = $Gestions->getVille();

        try {
            // Start a database transaction.
            $this->pdo->beginTransaction();
    
            // Insert data into the personne table.
            $sql = "INSERT INTO personne (nom, prenom) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nom, $prenom]);
    
            // Get the last insert ID from the personne table.
            $personneId = $this->pdo->lastInsertId();
    
            // Insert data into the ville table.
            $sql = "INSERT INTO ville (ville) VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$ville]);
    
            // Commit the database transaction.
            $this->pdo->commit();
    
            return true;
        } catch (PDOException $e) {
            // Roll back the database transaction.
            $this->pdo->rollback();
    
            header("Location: index.php");
            echo "Failed to create Stagiaire: " . $e->getMessage();
            return false;
    
        }
    }
    
    public function deleteStagiaire($id)
    {
        try {
            $sql = "DELETE FROM personne WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Failed to delete Stagiaire: " . $e->getMessage();
            return false;
        }
    }

    public function getStagiaireById($id) {
        try {
            $sql = "SELECT * FROM personne WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $StagiaireData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($StagiaireData) {
                $stager = new stager;
                $stager->setId($StagiaireData['id']);
                $stager->setNom($StagiaireData['nom']);
                $stager->setPrenom($StagiaireData['prenom']);
                return $stager;
            } else {
                return null; // Stagiaire with the given ID not found
            }
        } catch (PDOException $e) {
            echo "Failed to fetch Stagiaire: " . $e->getMessage();
            return null;
        }
    }
    


}

$GestionStagiaire = new GestionStagiaire();
// Create a new Stagiaire
if (isset($_POST['create'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    
    if ($GestionStagiaire->createStagiaire($nom, $prenom)) {
        echo "Stagiaire created successfully!";
        header("Location: index.php");

    } else {
        echo "Failed to create Stagiaire.";
    }
}

// Update an existing Stagiaire
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    
    if ($GestionStagiaire->updateStagiaire($id, $nom, $prenom)) {
        echo "Stagiaire updated successfully!";
        header("Location: index.php");

    } else {
        echo "Failed to update Stagiaire.";
    }
}

// Delete a Stagiaire
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    if ($GestionStagiaire->deleteStagiaire($id)) {
        echo "Stagiaire deleted successfully!";
        header("Location: index.php");

    } else {
        echo "Failed to delete Stagiaire.";
    }
}