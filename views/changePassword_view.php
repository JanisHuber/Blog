<?php 
    require 'templates/header.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require './model/change';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort ändern</title>
    <link rel="stylesheet" href="./css/changePasswordStyle.css">
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <h1>Passwort ändern</h1>
            <form action="" method="POST">
                <label for="neuesPasswort">Neues Passwort</label>
                <input type="password" name="neuesPasswort" id="neuesPasswort" placeholder="Neues Passwort eingeben" required>
                <label for="neuesPasswortWiederholen">Neues Passwort wiederholen</label>
                <input type="password" name="neuesPasswortWiederholen" id="neuesPasswortWiederholen" placeholder="Passwort wiederholen" required>
                <button type="submit">Passwort ändern</button>
            </form>
        </div>
    </div>
</body>
</html>
