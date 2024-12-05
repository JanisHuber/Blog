<?php
    require 'core/userdatabase.php';
    $pdo = connectToDatabaseUsers();

    $stmt = $pdo->prepare('SELECT likedTags FROM users WHERE username = :username');
    $stmt->bindValue(':username', $_SESSION['username']);
    $stmt->execute();
    $likedTags = $stmt->fetchColumn();

    $likedTagsArray = $likedTags ? explode(',', $likedTags) : [];

    $stmt = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
    $stmt->execute();
    $cacheBlogs = $stmt->fetchAll();

    $blogs = array_filter($cacheBlogs, function ($blog) use ($likedTagsArray) {
        $tags = explode(',', $blog['tags']);
        return count(array_intersect($tags, $likedTagsArray)) > 0;
    });
?> 

