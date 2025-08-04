<?php

function connect_database(): PDO
{
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    return $bdd;
}


function add_recette(string $titre, ?string $description, string $ingrédient, int $userID)
{
    $bdd = connect_database();
    $addRecette = $bdd->prepare("INSERT INTO recettes (titre, description, ingédient, userID) VALUES (?, ?, ?, ?)");
    $addRecette->execute([
        $titre,
        $description,
        $ingrédient,
        $userID
    ]);
}

function delete_recette($recetteID)
{
    $bdd = connect_database();
    $deleteRecette = $bdd->prepare("DELETE FROM recettes WHERE id=$recetteID");
    $deleteRecette->execute([
        $recetteID
    ]);
}

function get_recette($recetteID)
{
    $bdd = connect_database();
    $getRecette = $bdd->prepare("SELECT * FROM recettes WHERE id=?");
    $getRecette->execute([
        $recetteID
    ]);
    return $getRecette->fetch(PDO::FETCH_ASSOC);
}

// function update_recette($recetteID)
// {
//     $bdd = connect_database();
//     $update_recette = $bdd->prepare("UPDATE recettes SET description WHERE id=?");
//     $update_recette->execute([
//         $recetteID
//     ]);
// }
