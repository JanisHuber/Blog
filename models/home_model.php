<?php 
require 'core/database.php';

$title = "Home";

$dbCon = connectToDatabase(); 
$stmt = $dbCon->prepare('select * from blogs where jahr = :year');
$stmt->execute([':year' => 2024]);

$bloggers = $stmt->fetchAll();
