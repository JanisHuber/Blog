<?php 
    require "views/templates/header.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'models/register_model.php';
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/registerStyle.css">
</head>
<body>
    <div id="test">
    <div class="form-container">
        <h1>Account Erstellen</h1>
        <form action="register" method="POST">
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username" placeholder="Benutzername">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email">

            <label for="password">Passwort</label>
            <input type="password" name="password" id="password" placeholder="Passwort">

            <button type="submit">Erstellen</button>
        </form>
    </div>
    </div>
</body>
</html>
