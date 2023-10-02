<?php



include './stager.php';
include './ville.php';

class GestionStagiaire
{


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
    

    public function getStagiaire(){

        $sql = "SELECT personne.id, personne.nom, personne.prenom, personne.ville_id, ville.ville FROM personne INNER JOIN ville ON personne.ville_id = ville.id;
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
            $stager->setVille($villes->getVille());
            $stager->setVille($StagiaireData['ville']);

           
            array_push($Stagiaires, $stager);
        }

        return $Stagiaires;



    }
    public function getVilles()
    {
        $sql = "SELECT id, nom_Ville FROM `ville`;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $VillesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($VillesData);
        return $VillesData;
    }


    public function createStagiaire($Gestions)
    {   
        $nom = $Gestions->getNom();
        $prenom = $Gestions->getPrenom();
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
            $sql = "INSERT INTO ville (id_personne, nom_ville) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$personneId, $ville]);
    
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
                $stager = new stager();
                $villes = new ville;
                $stager->setId( $StagiaireData['id']);
                $stager->setnom($StagiaireData['nom']);
                $stager->setprenom($StagiaireData['prenom']);
                $stager->setVille($villes->getVille());
                // $stager->setVille($StagiaireData['nom_ville']);
                return $stager;
            } else {
                return null; // Stagiaire with the given ID not found
            }
        } catch (PDOException $e) {
            echo "Failed to fetch Stagiaire: " . $e->getMessage();
            return null;
        }
    }
    
    public function updateStagiaire($id, $nom, $prenom) {
        try {
            // Update the 'personne' table
            $sqlPersonne = "UPDATE personne SET nom=:nom, prenom=:prenom WHERE id=:id";
            $stmtPersonne = $this->pdo->prepare($sqlPersonne);
            $stmtPersonne->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmtPersonne->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmtPersonne->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtPersonne->execute();
    
            // Update the 'ville' table
            $sqlVille = "UPDATE ville SET nom_ville=:ville WHERE id_personne=:id";
            $stmtVille = $this->pdo->prepare($sqlVille);
            $stmtVille->bindParam(':ville', $ville, PDO::PARAM_STR);
            $stmtVille->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtVille->execute();
    
            return true;
        } catch (PDOException $e) {
            echo "Failed to update Stagiaire: " . $e->getMessage();
            return false;
        }
    }
    public function getVillesData(){
        $sql = "SELECT * FROM ville ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $StagiaireData = $stmt->fetch(PDO::FETCH_ASSOC);
        $stager->setVille($villes->getVille());
        $stager->setVille($StagiaireData['ville']);

        foreach($StagiairesData as $StagiaireData){
            $villes = new ville;
            $stager->setVille($villes->getVille());
            $stager->setVille($StagiaireData['ville']);

           
            array_push($Stagiaires, $stager);
        }

        return $Stagiaires;
        
    
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
