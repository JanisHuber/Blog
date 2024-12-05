<?php
require 'views/templates/header.php';
require 'models/blog_model.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <link rel="stylesheet" href="css/blogstyle.css">
</head>

<body>
  <div class="container">
    <main class="main-content">
      <?php foreach ($blogs as $post) { ?>
        <div class="blog-post">
          <div class="blog-header">
            <h2><?php echo htmlspecialchars($post['post_title']) ?></h2>
            <p><?php echo htmlspecialchars($post['created_by']) ?>, am: <?php echo htmlspecialchars($post['created_at']) ?></p>
            <div class="menu-container data-post-id=" <?php echo htmlspecialchars($post['id']); ?>">
              <button class="menu-button" aria-label="Mehr Optionen">⋮</button>
              <div class="menu-content">
                <a href="mailto:<?php echo htmlspecialchars($post['email']) ?>">Kontaktieren</a>
                <a href="bewertung?post_id=<?php echo $post['id']; ?>">Bewerten</a>
              </div>
            </div>
          </div>
          <div class="blog-body">
            <p><?php echo htmlspecialchars($post['post_text']) ?></p>
            <?php if ($post['imgLink']) { ?>
              <img class="blogImg" src="<?= htmlspecialchars($post["imgLink"]) ?>" alt="Bild zum Eintrag">
            <?php } ?>
            <br>
            <a href="blogFull?id=<?php echo $post["id"]; ?>" class="read-more-btn">mehr →</a>
            <div class="heart-container">
              <a href="saveTags?post_id=<?php echo $post['id']; ?>">
                <img
                  src="https://cdn-icons-png.flaticon.com/512/4209/4209081.png"
                  alt="Herz"
                  class="heart-icon">
              </a>
            </div>
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

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.menu-container').forEach(menu => {
      const button = menu.querySelector('.menu-button');
      button.addEventListener('click', () => {
        menu.classList.toggle('open');
      });
    });

    document.addEventListener('click', (event) => {
      document.querySelectorAll('.menu-container').forEach(menu => {
        if (!menu.contains(event.target)) {
          menu.classList.remove('open');
        }
      });
    });
  });
</script>

</html>