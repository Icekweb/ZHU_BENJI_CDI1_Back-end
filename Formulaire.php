<?php 
include 'db.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_skin'])) {
    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);

if (!empty($nom) && !empty($prix)) {
        try {
        
            $stmt = $pdo->prepare("INSERT INTO produits (nom, prix) VALUES (:nom, :prix)");
            $stmt->execute([
                'nom' => $nom,
                'prix' => $prix
            ]);
            $message = "<p style='color:green;'>Skin ajouté avec succès !</p>";
        } catch (PDOException $e) {
            $message = "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
        }
    } else {
        $message = "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style1.css"> </head>
<body>
    <div class="form-container">
        <h2>Ajouter un nouveau Skin</h2>
        <form method="POST" action="Formulaire.php">
            <input type="hidden" name="add_skin" value="1">
            
            <div class="input-group">
                <label>Nom du skin</label>
                <input type="text" name="nom" required>
            </div>
            <div class="input-group">
                <label>Prix</label>
                <input type="number" step="0.01" name="prix" required>
            </div>
            <button type="submit">Valider</button>
        </form>
    </div>
</body>
</html>
</html>


