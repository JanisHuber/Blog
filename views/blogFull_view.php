<?php 
require "./models/blogFull_model.php";
require "templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['post_title']); ?></title>
    <link rel="stylesheet" href="css/blogstyle.css">
    <link rel="stylesheet" href="css/blogFullStyle.css">
</head>

<body>
    <div class="container">
        <main class="main-content">
            <div class="blog-post">
                <div class="blog-header">
                    <h2><?php echo htmlspecialchars($blog['post_title']); ?></h2>
                    <p><?php echo htmlspecialchars($blog['created_by']); ?>, am: <?php echo htmlspecialchars($blog['created_at']); ?></p>
                </div>
                <div class="blog-body">
                    <p><?php echo nl2br(htmlspecialchars($blog['post_text'])); ?></p>
                    <?php if (!empty($blog['imgLink'])) { ?>
                        <img class="blogImg" src="<?= htmlspecialchars($blog["imgLink"]) ?>" alt="Bild zum Eintrag">
                    <?php } ?>
                </div>
                <div class="rating">
                    <span>Bewertung:</span>
                    <div class="stars">
                        <?php for ($i = 0; $i < $blog['rating']; $i++) { ?>
                            ★
                        <?php } ?>
                    </div>
                </div>
            </div>


            <div class="comment-section">
                <h3>Kommentare:</h3>
                <div class="comments-list">
                    <?php if (count($comments) > 0): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <p><strong><?php echo htmlspecialchars($comment['author'] ?? 'Anonym'); ?></strong> schrieb am <?php echo htmlspecialchars($comment['created_at']); ?>:</p>
                                <p><?php echo nl2br(htmlspecialchars($comment['comment_text'])); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Es gibt noch keine Kommentare. Schreibe den ersten!</p>
                    <?php endif; ?>
                </div>


                <h3>Hinterlasse einen Kommentar</h3>
                <form action="" method="POST" class="comment-form">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <textarea name="comment" rows="5" placeholder="Schreibe deinen Kommentar hier..." required></textarea>
                    <button type="submit">Kommentar senden</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
