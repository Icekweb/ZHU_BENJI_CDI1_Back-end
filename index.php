<?php
include 'db.php';

// Récupération du critère de tri depuis l'URL
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'nom';

// Exécution de la requête de lecture avec tri
$stmt = $pdo->query("SELECT * FROM produits ORDER BY $tri ASC");
$skins = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes sous forme de tableau
?>

<a href="?tri=nom">Trier par Nom</a> | <a href="?tri=prix">Trier par Prix</a>

<div class="skin-list">
    <?php foreach ($skins as $skin): ?>
        <div class="skin-item">
            <h3><?php echo htmlspecialchars($skin['nom']); ?></h3>
            <p>Prix : <?php echo $skin['prix']; ?> RP</p>
            <a href="delete.php?id=<?php echo $skin['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce skin ?')">Supprimer</a>
        </div>
    <?php endforeach; ?>
</div>