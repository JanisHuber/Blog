<?php
require "views/templates/header.php";
require "models/home_model.php";
require "models/homeBlog_model.php";


$user_ip = $_SERVER['REMOTE_ADDR'];

//if ($user_ip === '77.109.148.221') {
    //echo $user_ip;
    //echo "  Team Urs > Team Manuel";
    //exit;
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <aside class="blogger-list">
            <h2>Blogger</h2>
            <ul>
                <?php foreach ($bloggers as $blogger) : ?>
                    <li>
                    <a target="_blank" href="<?= htmlspecialchars($blogger["blog_url"]) ?>" title="<?= htmlspecialchars($blogger["blog_von"]) ?>">
                    <?= htmlspecialchars($blogger["blog_von"]) ?>
                    </a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </aside>

        <main class="blog-list">
            <h1><?= $title ?></h1>
            <?php 
            if (!isset($_SESSION['username']))
            {
                echo "<p>Logge dich ein um empfohlene Inhalte zu sehen!</p>";
            }
            else if (count($blogs) === 0) {
                    echo "<p>Like Posts um empfohlene Inhalte zu sehen!</p>";
            }
            else {
                echo "<p>Blogs die dir gefallen könnten:</p>";
            }
            ?>
            <ul>
                <?php
                foreach ($blogs as $post) : ?>
                    <li>
                        <h3><?php echo htmlspecialchars($post["post_title"]); ?></h3>
                        <p><?php echo htmlspecialchars(substr($post["post_text"], 0, 100)); ?>...</p>
                        <a href="blogFull?id=<?php echo $post["id"]; ?>" class="read-more-btn">mehr →</a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="more-blogs-container">
                <a href="blog" class="btn-more-blogs">Mehr Blogs</a>
            </div>
        </main>
    </div>
</body>

</html>