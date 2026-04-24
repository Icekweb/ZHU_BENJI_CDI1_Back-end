<?php
include 'db.php';

// check ID
if (!isset($_GET['id'])) {
    die("ID manquant !");
}

$id = $_GET['id'];

// si tableau update alors renouvellement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prix = trim($_POST['prix']);
    $desc = trim($_POST['description']);

    if (!empty($nom) && !empty($prix)) {
        $stmt = $pdo->prepare("UPDATE produits SET nom = :nom, prix = :prix, description = :desc WHERE id = :id");
        $stmt->execute([
            'nom' => $nom,
            'prix' => $prix,
            'desc' => $desc,
            'id' => $id
        ]);
        header('Location: index.php'); // update retouner au index
        exit;
    } else {
        $erreur = "Veuillez remplir les champs obligatoires.";
    }
}

// prendre ID et le mettre dans le tableau
$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = :id");
$stmt->execute(['id' => $id]);
$skin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$skin) {
    die("Skin introuvable !");
}
?>

<?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
<form method="POST" action="">
    <input type="text" name="nom" value="<?php echo htmlspecialchars($skin['nom']); ?>" required>
    <input type="number" step="0.01" name="prix" value="<?php echo $skin['prix']; ?>" required>
    <textarea name="description"><?php echo htmlspecialchars($skin['description']); ?></textarea>
    <button type="submit">Mettre à jour</button>
</form>