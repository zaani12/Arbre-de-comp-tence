<?php



include './stager.php';

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

        $sql = "SELECT * FROM personne";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $StagiairesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $Stagiaires = array();

        foreach($StagiairesData as $StagiaireData){
            $stager = new stager;
            $stager->setId( $StagiaireData['id']);
            $stager->setnom($StagiaireData['nom']);
            $stager->setprenom($StagiaireData['prenom']);
            array_push($Stagiaires, $stager);
        }

        return $Stagiaires;

    }

    public function createStagiaire($nom, $prenom)
    {
        try {
            $sql = "INSERT INTO personne (nom, prenom) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nom, $prenom]);
            return true;
        } catch (PDOException $e) {
            header("Location: index.php");
            echo "Failed to create Stagiaire: " . $e->getMessage();
            return false;
        }
    }

    public function updateStagiaire($id, $nom, $prenom)
    {
        try {
            $sql = "UPDATE personne SET nom = ?, prenom = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $id]);
            return true;
        } catch (PDOException $e) {
            echo "Failed to update Stagiaire: " . $e->getMessage();
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
    } else {
        echo "Failed to update Stagiaire.";
    }
}

// Delete a Stagiaire
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    if ($GestionStagiaire->deleteStagiaire($id)) {
        echo "Stagiaire deleted successfully!";
    } else {
        echo "Failed to delete Stagiaire.";
    }
}