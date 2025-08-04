<?php
session_start();

// Redirection si non connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
try {
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database;charset=utf8", "root", "root");
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Afficher toutes les recettes
try {
    $stmt = $database->prepare("SELECT * FROM recettes WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $infirmiers = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des recettes : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
 <h1>Bienvenue sur notre page de recettes</h1>
 <a href="login.php">Se connecter</a> 
 <a href="inscription.php">S'inscrire</a>
 <a href="create-recette.php">Ajouter une recette</a>  
 <a href="update-recette.php">Modifier ma recette</a>
</body>
</html>