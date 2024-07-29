<?php
$db = new PDO('mysql:host=db; dbname=lit_logger','root','password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$query = $db->prepare('SELECT * FROM `books`');
$query->execute();
$books = $query->fetchAll();
$query = $db->prepare('SELECT * FROM `authors`');
$query->execute();
$authors = $query->fetchAll();
var_dump($books);
echo '<br><br>';
var_dump($authors);

$query = $db->prepare('SELECT `image`, `title`, `author_id`, `publication_date` FROM `books` 

WHERE `rating` = 5;');
$query->execute();
$highRatings = $query->fetchAll(4);
echo '<br><br>';
var_dump($highRatings);
