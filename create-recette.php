
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create-recette.php" method="POST">
        <input type="text" name="recette" placeholder="Nom de la recette" required>
        <input type="text" name="description" placeholder="Description de la rectte" required>
        <button type="submit">Ajouter recette</button>
    </form>  
    <a href="index.php">retourner à l'acceuil</a>
</body>
</html>