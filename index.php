<?php 
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- todo: Anpassen an deine Umgebung -->
        <base href="/2024/blogs/janis/home">
        <!--<base href="http://localhost/projekt/home">-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/styles.css">
        <title>Blog</title>
    </head>
    <body>
        <?php 
            require "routes.php"; 
        ?>
    </body>
</html>