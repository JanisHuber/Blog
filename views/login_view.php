<?php 
    require "views/templates/header.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'models/login_model.php';
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/registerStyle.css">
</head>
<body>
    <div id="test">
    <div class="form-container">
        <h1>login</h1>
        <form action="login" method="POST">
            <label for="username">Benutzername</label>
            <input type="text" name="username" id="username" placeholder="Benutzername">

            <label for="password">Passwort</label>
            <input type="password" name="password" id="password" placeholder="Passwort">

            <button type="submit">einloggen</button>
        </form>
    </div>
    </div>
</body>
</html>