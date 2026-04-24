<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM produits ORDER BY $tri ASC");
$skins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sylas Skins Store</title>
    <link rel="stylesheet" href="style-css.css"> 
</head>
<body>
    <header>
        <h1>Gestion des Skins de Sylas</h1>
    </header>

    <main>
        <div class="container">
            <a href="?tri=nom" class="btn">Trier par Nom</a>
            <a href="?tri=prix" class="btn">Trier par Prix</a>

            <div class="skin-list">
                <?php foreach ($skins as $skin): ?>
                    <div class="skin-card"> <img src="images/sylas.jpg" alt="Skin"> <h3><?php echo htmlspecialchars($skin['nom']); ?></h3>
                        <p class="price"><?php echo $skin['prix']; ?> RP</p>
                        <div class="actions">
                            <a href="update.php?id=<?php echo $skin['id']; ?>" class="btn-edit">Modifier</a>
                            <a href="delete.php?id=<?php echo $skin['id']; ?>" 
                               class="btn-delete" 
                               onclick="return confirm('Supprimer ?')">Supprimer</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer></footer>
</body>
</html>
