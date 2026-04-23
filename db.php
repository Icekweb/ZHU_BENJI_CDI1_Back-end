<?php

$host = 'localhost';
$dbname = 'db_sylas';
$user = 'root';
$pass = ''; // Pour WAMP garder vide

try {
    // Création de l'instance PDO avec le support de l'UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    // Configuration du mode d'erreur sur EXCEPTION pour le débogage
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Arrêt du script et affichage de l'erreur en cas de échec
    die("Erreur de connexion : " . $e->getMessage());
}
?>