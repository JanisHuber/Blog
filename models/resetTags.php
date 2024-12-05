<?php
require 'core/userdatabase.php';
$pdo = connectToDatabaseUsers();

$stmt = $pdo->prepare('DELETE likedTags FROM users WHERE username = :username');
$stmt->bindValue(':username', $_SESSION['username']);
$stmt->execute();

header("Location: account");