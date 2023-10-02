<?php
include "./gestion-stager.php";
$GestionStagiaire = new GestionStagiaire();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stagiaire = $GestionStagiaire->getStagiaireById($id);

    if ($stagiaire) {
        // Display the edit form
        if (isset($_POST['update'])) {
            $newNom = $_POST['nom'];
            $newPrenom = $_POST['prenom'];
            $newVille = $_POST['ville'];

            if ($GestionStagiaire->updateStagiare($id, $newNom, $newPrenom, $newVille)) {
                echo "Stagiaire updated successfully!";
                header("Location: index.php");
            } else {
                echo "Failed to update Stagiaire.";
            }
        }

        // Display the edit form
        ?>
 <!DOCTYPE html>
        <html>

        <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>

        <body>
            <div class="container">
                <h2 class="mt-4">Edit Stagiaire</h2>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $stagiaire->getId() ?>">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" id="nom" name="nom" value="<?= $stagiaire->getNom() ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" value="<?= $stagiaire->getPrenom() ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ville">ville:</label>
                        <input type="text" id="ville" name="ville" value="<?= $stagiaire->getPrenom() ?>" class="form-control" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
            </div>
        </body>

        </html>
        <?php
    } else {
        echo "Stagiaire not found.";
    }
} else {
    echo "Invalid Stagiaire ID.";
}
?>
