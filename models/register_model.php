<?php
    require_once './core/userdatabase.php';
    $pdo = connectToDatabaseUsers();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $passwordHash);
    $stmt->execute();
    header('Location: login');
    exit();
?>