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
            <form method="GET">
                <label for="sort">Sort: </label>
                <select name="sort" id="sort">
                    <option value="blank" selected disabled hidden>Select an option</option>
                    <option value="title">Title</option>
                    <option value="publication_date">Publication Date</option>
                    <option value="genre_1">Genre</option>
                    <option value="rating">Rating</option>
                </select>
                <label for="sortBy"> by: </label>
                <select name="sortBy" id="sortBy">
                    <option value="blank" selected disabled hidden>Ascending/Descending</option>
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
                <input type="submit" value="sort!">
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
        <a href="log_book.php"><button>Log Book</button></a>
    </div>
</section>
<?php
if (isset($_GET['sort'], $_GET['sortBy']))
{
    if($_GET['sortBy'] === 'desc')
    {
        if ($_GET['sort'] === 'title')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `title` DESC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
        elseif ($_GET['sort'] === 'publication_date')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `publication_date` DESC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
        elseif ($_GET['sort'] === 'genre')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `genre_1` DESC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
        elseif ($_GET['sort'] === 'rating')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `rating` DESC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
    }
    elseif ($_GET['sortBy'] === 'asc')
    {
        if ($_GET['sort'] === 'title')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `title` ASC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
        elseif ($_GET['sort'] === 'publication_date')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `publication_date` ASC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
        elseif ($_GET['sort'] === 'genre')
        {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `genre_1` ASC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
        elseif ($_GET['sort'] === 'rating') {
            $query = $db->prepare('SELECT `image`, `title`, `forename`, `surname`, `publication_date`, `rating` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `rating` ASC ');
            $query->execute();
            $sortBooks = $query->fetchAll();
        }
    }

        ?>
<section class="library">

        <h1>Your books, sorted!</h1>
        <div class="list">
            <?php
            echo dataDisplay($sortBooks);
            ?>
        </div>
    <div><a href="index.php">un-sort</a></div>
</section>
<?php
}
?>
<section class="highRatings">
    <h1>Your highest rated reads</h1>
    <div class="list">
        <?php
        echo dataDisplay($highRatings);
        ?>
    </div>

</section>
<section class="library" id="library">
    <h1>Your Library</h1>
    <div class="list">
        <?php
        echo dataDisplay($books);
        ?>
    </div>
</section>


<footer>
    <a href="#">Back to top ↑</a>
</footer>
</body>
</html>
