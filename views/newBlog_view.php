<?php
require "views/templates/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['title']) || empty($_POST['content'])) {
        $_SESSION['error'] = "Please fill in all fields";
        header("Location: newBlog");
        exit();
    } else {
        $_SESSION['success'] = "Blog created successfully";
        require 'models/newblog_model.php';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create a new blog</title>
    <link rel="stylesheet" href="./css/newBlogStyle.css">
</head>

<body>
    <form action="newBlog" method="POST">

        <div id="test">
            <div class="inputArea">
                <label id="title" for="title">Title</label>
                <input type="text" name="title" id="titleInput">
                <label for="content">Content</label>
                <textarea name="content" id="content"></textarea>
                <label for="content">Füge einen Bildlink hinzu</label>
                <textarea name="imgLink" id="content-img"></textarea>
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo '<p style="color:white;">' . $_SESSION['success'] . '</p>';
                    unset($_SESSION['success']);
                }
                ?>

                <button id="submit" type="submit">Submit</button>
                
            </div>
        </div>
</body>

</html>