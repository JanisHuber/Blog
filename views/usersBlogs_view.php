<?php 
    require 'templates/header.php';
    require 'core/userdatabase.php';

    $pdo = connectToDatabaseUsers();
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE created_by = :username');
    $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
    $stmt->execute();
    $blogs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userBlogs</title>
    <link rel="stylesheet" href="./css/blogStyle.css">
</head>
<body>
<div class="container">
    <main class="main-content">
      <?php foreach ($blogs as $post) { ?>
      <div class="blog-post">
        <div class="blog-header">
          <h2><?php echo $post['post_title'] ?></h2>
          <p><?php echo $post['created_by'] ?>, am: <?php echo $post['created_at'] ?></p>
        </div>
        <div class="blog-body">
          <p><?php echo $post['post_text'] ?></p>
          <?php if ($post['imgLink']) { ?>
              <img class="blogImg" src="<?= htmlspecialchars($post["imgLink"]) ?>" alt="Bild zum Eintrag">
          <?php } ?>
        </div>
        <div class="rating">
          <span>Bewertung:</span>
          <div class="stars">
            <?php for ($i = 0; $i < $post['rating']; $i++) { ?>
            ★
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </main>
  </div>
</body>
</html>