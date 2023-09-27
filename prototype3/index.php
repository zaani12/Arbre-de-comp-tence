<?php
// Include the necessary classes and initialize the database connection
// include './stager.php';
include "./gestion-stager.php";

$GestionStagiaire = new GestionStagiaire();
$StagiaresData = $GestionStagiaire->getStagiaire();

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
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Arbre Des Competences</h2>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
            <?php
            foreach ($StagiaresData as $Stagiaire) {
            ?>
                <tr>
                    <td><?= $Stagiaire->getId() ? $Stagiaire->getId() : "null" ?></td>
                    <td><?= $Stagiaire->getNom() ? $Stagiaire->getNom() : "null"; ?></td>
                    <td><?= $Stagiaire->getPrenom() ? $Stagiaire->getPrenom() : "null"; ?></td>
                    <td><?= $Stagiaire->getVille() ? $Stagiaire->getVille() : "null"; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $Stagiaire->getId() ?>" class="btn btn-primary">Edit</a>
                        <a href="?delete=<?= $Stagiaire->getId() ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Stagiaire?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <h2>Create Stagiaire</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>
            <button type="submit" name="create" class="btn btn-success">Create</button>
        </form>
    </div>
</body>

</html>

