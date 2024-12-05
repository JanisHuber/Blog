<?php
require './core/userdatabase.php';

$pw = $_POST['neuesPasswort'];
$pwWiederholen = $_POST['neuesPasswortWiederholen'];
if ($pw === $pwWiederholen) {
    $pdo = connectToDatabaseUsers();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    $user = $stmt->fetch();
    $stmt = $pdo->prepare('UPDATE users SET password = :password WHERE email = :email');
    $stmt->bindParam(':password', password_hash($pw, PASSWORD_DEFAULT));
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    header("Location: account");
    exit();
} else {
    echo 'Passwörter stimmen nicht überein';
}