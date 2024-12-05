<?php
    $postId = isset($_GET['post_id']) ? $_GET['post_id'] : '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_SESSION['username'])) {
            if (empty($_POST['rating'])) {
                $_SESSION['error'] = "Bitte fülle alle Felder aus";
                header("Location: bewertung");
                exit();
            } else if ($_POST['rating'] < 1 || $_POST['rating'] > 5) {
                $_SESSION['error'] = "Bitte gebe eine Bewertung zwischen 1 und 5 ab";
                header("Location: bewertung");
                exit();
            } else {
                $postId = $_POST['post_id'];
                require './core/newRating.php';
            } 
        } else {
            $_SESSION['error'] = "Bitte logge dich ein um eine Bewertung abzugeben";
            header("Location: bewertung");
            exit();
        }    
    }
?>


<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewertung</title>
    <link rel="stylesheet" href="css/bewertungStyle.css">
</head>

<body>
    <header>
        <?php require 'templates/header.php';?>
    </header>
    <div class="form-container">
        <h1>Bewertung</h1>
        <form action="bewertung" method="POST">
            <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
            <input type="text" placeholder="Gebe eine Bewertung ab (1 - 5)" name="rating">
            <button type="submit">Bewerten</button>
            <?php if (isset($_SESSION['error'])): ?>
                <p style="color: red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>