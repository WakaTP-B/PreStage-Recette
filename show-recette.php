<?Php
require_once "crud-recettes.php";
session_start();
$recetteID = $_GET['recetteID'];
$recettes=get_recette($recetteID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($recettes as $recette): ?>
        <h2><?=$recette['titre']?></h2>
        <p><?=$recette['description']?></p>
        <p><?=$recette['ingrédient']?></p>
        <?php endforeach;?>
</body> 
</html>