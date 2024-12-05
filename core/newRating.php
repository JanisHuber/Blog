<?php 
    require 'userdatabase.php';

    $id = $_POST['post_id'];
    $rating = $_POST['rating'];

    $pdo = connectToDatabaseUsers();
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $post = $stmt->fetchColumn(5);

    $ratingFinal = ($post + $rating) / 2;

    $stmt = $pdo->prepare("UPDATE posts SET rating = :rating WHERE id = :id");
    $stmt->bindParam(':rating', $ratingFinal);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header ("Location: blogFull?id=$id");
