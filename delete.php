<?php
include 'db.php';

// Vérifier si un ID est présent dans l'URL
if (isset($_GET['id'])) {
    // Préparation de la requête de suppression sécurisée
    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = :id");
    
    // Exécution de la suppression 
    $stmt->execute(['id' => $_GET['id']]);
}

// Redirection vers la page d'accueil après l'opération
header('Location: Index.php');
exit;
?>