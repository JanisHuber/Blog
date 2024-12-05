<?php
require "./core/userdatabase.php";

$post_id = $_GET['id'];

$pdo = connectToDatabaseUsers();
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
$stmt->execute(['id' => $post_id]);
$blog = $stmt->fetch();


$stmt = $pdo->prepare('SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC');
$stmt->execute(['post_id' => $post_id]);
$comments = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO comments (post_id, author, comment_text, created_at) VALUES (:post_id, :author, :comment, NOW())');
    $stmt->execute(['post_id' => $_POST['post_id'], 'author' => $_SESSION['username'], 'comment' => $_POST['comment']]);
    header("Location: blogFull?id=" . $_POST['post_id']);
    exit();
}
?>
