<?php
require_once './core/userdatabase.php';

$pdo = connectToDatabaseUsers();

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(':username', $_POST['username']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        header('Location: account');
        exit();
    } else {
        echo '<script>alert("Falsches Passwort."); window.location.href = "login";</script>';
        exit();
    }
} else {
    echo '<script>alert("Benutzer nicht gefunden."); window.location.href = "login";</script>';
    exit();
}
?>
