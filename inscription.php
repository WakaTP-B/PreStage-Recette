<?php
session_start();
require_once "crud-user.php";
if(isset($_POST["username"]) && isset($_POST["password"]) ){
    var_dump($_POST);
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
    <form action="" method="POST">
        <input type="text" name="username" placeholder="username" >
        <input type="password" name="password" placeholder="passsword">
        <button>Inscription</button>


    </form>
</body>
</html>