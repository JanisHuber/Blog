<?php
require './core/userdatabase.php';

$postId = intval($_GET['post_id']);

$pdo = connectToDatabaseUsers();

$stmt = $pdo->prepare("SELECT tags FROM posts WHERE id = :post_id");
$stmt->bindParam(':post_id', $postId);
$stmt->execute();

$tags = $stmt->fetchColumn();

if ($tags === false) {
    echo "Fehler beim Laden der Tags!";
    exit;
}

$stmt = $pdo->prepare("SELECT likedTags FROM users WHERE username = :username");
$stmt->bindValue(':username', $_SESSION['username']);
$stmt->execute();
$likedTags = $stmt->fetchColumn();

$likedTagsArray = $likedTags ? explode(',', $likedTags) : [];
$newTagsArray = $tags ? explode(',', $tags) : [];

$mergedTagsArray = array_unique(array_merge($likedTagsArray, $newTagsArray));

$updatedTags = implode(',', $mergedTagsArray);

$stmt = $pdo->prepare("UPDATE users SET likedTags = :tags WHERE username = :username");
$stmt->bindParam(':tags', $updatedTags);
$stmt->bindValue(':username', $_SESSION['username']);
$stmt->execute();

echo "Tags gespeichert: " . $updatedTags;
header('Location: blog');