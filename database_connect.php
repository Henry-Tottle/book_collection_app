<?php
$db = new PDO('mysql:host=db; dbname=lit_logger','root','password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


$query = $db->prepare('SELECT * FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id`');
$query->execute();
$books = $query->fetchAll();

var_dump($books);


$query = $db->prepare('SELECT `image`, `title`, `author_id`, `publication_date`, `forename` , `surname`  FROM `books` INNER JOIN `authors` 
ON `authors`.`id` = `author_id` WHERE `rating` = 5;');
$query->execute();
$highRatings = $query->fetchAll();
echo '<br><br>';
var_dump($highRatings);
