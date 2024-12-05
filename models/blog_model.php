<?php
    require 'core/userdatabase.php';
    $pdo = connectToDatabaseUsers();
    $stmt = $pdo->prepare('select * from posts ORDER BY created_at DESC');
    $stmt->execute();
    $blogs = $stmt->fetchAll();
?>

