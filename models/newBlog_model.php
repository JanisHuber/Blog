<?php
require './core/userdatabase.php';

$data = print_r($_REQUEST, true);
$ip = $_SERVER['REMOTE_ADDR'];
$url = $_SERVER['REQUEST_URI'];
$log = "[IP: $ip] [URL: $url] [Data: $data]";

file_put_contents('logs/attack.log', $log . PHP_EOL, FILE_APPEND);
//Ip halt unnötig aber yolo



$apiKey = 'bf560cd411c98c04dbf9b8670c72c2b2';
$text = $_POST["content"];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.meaningcloud.com/class-2.0");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'key' => $apiKey,
    'txt' => $text,
    'model' => 'IPTC'
]));

$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);

$tags = [];
if (isset($responseData['category_list'])) {
    foreach ($responseData['category_list'] as $category) {
        $tags[] = $category['label'];
    }
}

$tagsString = implode(",", $tags);

$imgLink = $_POST['imgLink'];
if ($imgLink && !isImage($imgLink)) {
    echo "Bildlink ist kein Bild!";
    exit;
}

$pdo = connectToDatabaseUsers();
$created_by = $_SESSION['username'];
$email = $_SESSION['email'];
$stmt = $pdo->prepare("INSERT INTO posts (created_by, post_title, post_text, created_at, email, imgLink, tags) VALUES (:created_by, :post_title, :post_text, :created_at, :email, :imgLink, :tags)");
$stmt->bindParam(':created_by', $created_by);
$stmt->bindValue(':post_title', $_POST['title']);
$stmt->bindValue(':post_text', $_POST['content']);
$stmt->bindValue(':created_at', date('Y-m-d-H-i-s'));
$stmt->bindParam(':email', $email);
$stmt->bindValue(':imgLink', $_POST['imgLink']);
$stmt->bindValue(':tags', $tagsString);
$stmt->execute();


function isImage($url) { // lowk von lyan kopiert
    $imageInfo = @getimagesize($url);

    if ($imageInfo !== false) {
        $validMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (in_array($imageInfo['mime'], $validMimeTypes)) {
            return true;
        }
    }
    return false;
}