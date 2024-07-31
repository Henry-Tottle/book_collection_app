<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles.css">
    <title>Lit Logger</title>
    <?php

    require_once 'database_connect.php';
    $query = $db->prepare('SELECT * FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id`');
    $query->execute();
    $books = $query->fetchAll();

    $query = $db->prepare('SELECT *  FROM `books` INNER JOIN `authors` 
    ON `authors`.`id` = `author_id` WHERE `rating` = 5;');
    $query->execute();
    $highRatings = $query->fetchAll();

    function dataDisplay($dataInput)
    {
        $display = '';
        foreach ($dataInput as $book) {

         $display .= '<div><img alt="cover image for book" src="'
                . $book['image'] . '"><div class="data">'
                . $book['title'] . '<br>' . $book['forename'] . ' '
                . $book['surname'] . '<br>'
                . date('d-m-Y',strtotime($book['publication_date']))
                . '<br>Rating: ' . $book['rating']
                . '</div></div>';
        }
        return $display;
    }

    ?>
</head>
<body>
<header>
    <nav>
        <div>
            <form>
                <input type="text" placeholder="search books"><input type="submit" value="search">
            </form>
        </div>
        <div>
            <button>Filter</button>
            <a href="#library">
                <button>Library</button>
            </a>
        </div>
    </nav>
</header>
<section class="hero">
    <div>
        <h1>Lit_Logger</h1>
        <button>Log Book</button>
    </div>
</section>
<section class="highRatings">
    <h1>Your highest rated reads</h1>
    <div>
        <?php
        echo dataDisplay($highRatings);
        ?>
    </div>

</section>
<section class="library" id="library">
    <h1>Your Library</h1>
    <div>
        <?php
        echo dataDisplay($books);
        ?>
    </div>
</section>
<section class="inputForm">
    <form method='POST'>
        <div>
            <label for="titleID">Title: </label>
            <input id="titleID" type="text" name="title">
            <label for="authorID">Author: </label>
            <input id="authorID" type="text" name="author">

            <label for="isbnID">ISBN: </label>
            <input id="isbnID" type="text" name="isbn" placeholder="ISBN 13">
            <label for="formatID">Format: </label>
            <input id="formatID" type="text" name="format" placeholder="hardback/paperback">

            <label for="publisherID">Publisher: </label>
            <input id="publisherID" type="text" name="publisher">
        </div>
        <div>
            <label for="pubDateID">Publication Date: </label>
            <input id="pubDatID" type="text" name="publication_date" placeholder="dd-mm-yyyy">

            <label for="genre1ID">Genre 1: </label>
            <input id="genre1ID" type="text" name="genre_1" placeholder="Fantasy?">

            <label for="genre2ID">Genre 2: </label>
            <input id="genre2ID" type="text" name="genre_2" placeholder="Grimdark?">

            <label for="genre3ID">Genre 3: </label>
            <input id="genre3ID" type="text" name="genre_3" placeholder="Coming of Age?">

            <input type="submit">
        </div>

    </form>
</section>
<?php
$title = trim($_POST['title']);
$author = trim($_POST['author']);
$author = explode(' ', $author);
if (preg_match('/[0-9]{13}/',$_POST['isbn']))
{
    $isbn = trim($_POST['isbn']);
}
else
{
    echo "Please enter a 13 digit ISBN number.";
}
$publisher = trim($_POST['publisher']);
$pubDate = $_POST['publication_date'];
$genre1 = trim($_POST['genre_1']);
$genre2 = trim($_POST['genre_2']);
$genre3 = trim($_POST['genre_3']);

$query = $db->prepare('INSERT INTO `authors` (`forename`, `surname`) VALUES (:forname,:surname)');
$query->bindParam(':forname', $author[0]);
$query->bindParam(':surname', $author[1]);
$query->execute();



?>
<footer>
    <a href="#">Back to top ↑</a>
</footer>
</body>
</html>
