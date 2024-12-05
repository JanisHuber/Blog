<?php 
require 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Übersicht</title>
    <link rel="stylesheet" href="./css/accountStyle.css">
</head>

<body id="background">
    <div class="container">
        <h1>Account Übersicht</h1>
        <?php
        
        if (isset($_SESSION['username'])) { ?>
            <h3> <?php echo "Willkommen, " . $_SESSION['username'] . "!"; ?> </h3> <?php
        } else {
            header("Location: login");
            exit;
        }
        ?>

        <div class="account-actions">
            <a class="hover" href="logout" class="btn">Abmelden   |</a>
            <a class="hover" href="userBlogs" class="btn">    Meine Blogeinträge</a>
            <a class="hover" href="changePassword" class="btn">   |    Passwort ändern </a>
        </div>
    </div>
</body>

</html>