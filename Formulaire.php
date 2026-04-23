<?php 
include 'db.php'; 

// Vérifier la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $desc = trim($_POST['description']);

    // les champs obligatoires ne doivent pas être vides
    if (!empty($nom) && !empty($prix)) {

        $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, description) VALUES (:nom, :prix, :desc)");
        
        // Exécution de la requête 
        $stmt->execute([
            'nom' => $nom,
            'prix' => $prix,
            'desc' => $desc
        ]);
        
        echo "<p style='color:green;'>Skin ajouté avec succès ! ID : " . $pdo->lastInsertId() . "</p>"; [cite: 65, 1078]
    } else {
        echo "<p style='color:red;'>Veuillez remplir tous les champs obligatoires.</p>";
    }
}
?>

<form method="POST" action="Formulaire.php">
    <input type="text" name="nom" placeholder="Nom du skin" required>
    <input type="number" step="0.01" name="prix" placeholder="Prix" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Ajouter le Skin</button>
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="message-error">
    <ul></ul>
</div>

<div class="message-success">
    Formulaire envoyé !
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <label for="password">Entrer à nouveau le mot de passe</label>
        <input type="password" name="password" id="passwordRepeat">
    </div>

    <button type="submit">S'inscrire</button>

   
</form>
    <script src="main1.js"></script>
</body>
</html>


