<?php
session_start();

// Connexion à la base de données
try {
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database;charset=utf8", "root", "root");
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier ma recette</h1>
    <form action="update-recette.php" method="POST">
        <input type="text" name="titre" placeholder="Nom de la recette" required>
        <input type="text" name="ingredient" placeholder="ingrédients" required>
        <input type="text" name="recettes" placeholder="Modifier la recette" required>
        <button type="submit">Modifier recette</button>
    </form>  
    <a href="index.php">retourner à l'acceuil</a> 
</body>
</html>