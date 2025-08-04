<?php
/**
 * Ce fichier contient les fonctions de CRUD pour les utilisateurs.
 * Il est utilisé pour interagir avec la base de données.
 * Les pages de l'application utilisent ce fichier.
 */

// ***** CRUD GESTION DES UTILISATEURS ***** //

// Fonction pour se connecter à la base de données
function connect_database() : PDO {
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    return $bdd;
}

//------------------------------------------------------------------//

// Creation utilisateur
function create_user(string $username, string $password): int|null {
    $bdd = connect_database();

    $request = $bdd->prepare("INSERT INTO User (username, password) VALUES (?, ?)");
    $isSuccess = $request->execute([
        $username,
        password_hash($password, PASSWORD_DEFAULT)
    ]);

    if ($isSuccess) {
        $user_id = $bdd->lastInsertId();
        echo "Utilisateur créé avec succès.";
        return $user_id;
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
        return null;
    }
}

//------------------------------------------------------------------//

// Fonction pour authentifier un utilisateur
function authenticate_user(string $username, string $password): array|null {
    $bdd = connect_database();

    $request = $bdd->prepare("SELECT * FROM User WHERE username = ?");
    $request->execute([$username]);
    $user = $request->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return [
            'id' => $user['id'],
            'username' => $user['username']
        ];
    }

    return null;
}

//------------------------------------------------------------------//

// Fonction pour mettre à jour le mot de passe d'un utilisateur
function update_user(int $id, string $newPassword): bool {
    $bdd = connect_database();
    $Password = password_hash($newPassword, PASSWORD_DEFAULT);

    $request = $bdd->prepare("UPDATE User SET password = ? WHERE id = ?");
    $isSuccessful = $request->execute([$Password, $id]);

    return $isSuccessful;
}

//------------------------------------------------------------------//

// Fonction pour supprimer un utilisateur
function delete_user(int $id): bool {
    $bdd = connect_database();
    $request = $bdd->prepare("DELETE FROM User WHERE id = ?");
    return $request->execute([$id]);
}

//------------------------------------------------------------------//






