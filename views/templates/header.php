<header>
    <link rel="stylesheet" href="./css/headerStyle.css">
    <nav>
        <a class="nav-left" href="home">Home</a>
        <a class="nav-left" href="blog">Blog</a>
        <a class="nav-left" href="about">About</a>
        <div class="nav-account">
            <?php

            if (isset($_SESSION['username'])) { ?>
                <a class="nav-createBlog" href="newBlog">create a new Blog</a>
                <a href="account">
                    <img src="https://cdn-icons-png.flaticon.com/512/3276/3276535.png" alt="Beispielbild" class="nav-avatar">
                </a>
                <a class="nav-logout" href="logout">logout</a> <?php
                } else { ?>
                <a class="nav-register" href="register">register</a>
                <a class="nav-login" href="login">login</a> <?php
                }
                ?>
        </div>
    </nav>
</header>