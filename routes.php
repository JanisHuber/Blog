<?php

$page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$routes = [
    'starterkit'    => 'views/home_view.php',
    'janis'         => 'views/home_view.php',
    'home'          => 'views/home_view.php',
    'blog'          => 'views/blog_view.php',
    'about'         => 'views/about_view.php',
    'newBlog'       => 'views/newBlog_view.php',
    'register'      => 'views/register_view.php',
    'login'         => 'views/login_view.php',
    'logout'        => 'views/logout_view.php',
    'account'       => 'views/account_view.php',
    'userBlogs'     => 'views/usersBlogs_view.php',
    'bewertung'     => 'views/bewertung_view.php',
    'changePassword' => 'views/changePassword_view.php',
    'blogFull'      => 'views/blogFull_view.php',
    'saveTags'      => 'models/saveTags.php',
];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} else {
    require 'views/404_view.php';
    http_response_code(404);
}
