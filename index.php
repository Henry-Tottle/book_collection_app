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
                . '<br>ISBN-13: ' . $book['isbn']
                . '<br>Rating: ' . $book['rating']
                . '<br>Genre: ' . $book['genre_1']
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
                    <option value="author">Author</option>
                    <option value="publication_date">Publication Date</option>
                    <option value="genre">Genre</option>
                    <option value="rating">Rating</option>
                </select>
                <label for="sortBy"> by: </label>
                <select name="sortBy" id="sortBy">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
        </div>
        
        <div>
                <label for="filter">Filter: </label>
                <select name="filter" id="filter">
                    <option value="blank" selected disabled hidden>Select an option</option>
                    <option value="Contemporary">Contemporary</option>
                    <option value="Dystopia">Dystopia</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Satire">Satire</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="War">War</option>
                    <option value="Western">Western</option>
                </select>
            <input type="submit" value="Punch it!">

            </form>

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

if (isset($_GET['sort'], $_GET['sortBy'])) {
    if ($_GET['sort'] === 'author') {
        $sort = 'surname';
    } elseif ($_GET['sort'] === 'genre') {
        $sort = 'genre_1';
    } else {
        $sort = $_GET['sort'];
    }
    if ($_GET['sortBy'] === 'asc') {
        $sortBy = 'ASC';
    } else {
        $sortBy = 'DESC';
    }

    $query = $db->prepare("SELECT `image`, `title`,`forename`,`isbn`, `surname`, `publication_date`, `rating`, 
       `genre_1` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` ORDER BY `$sort` $sortBy ");
    $query->execute();
    $sortBooks = $query->fetchAll();


}

if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $query = $db->prepare("SELECT `image`, `title`,`forename`,`isbn`, `surname`, `publication_date`, `rating`, 
       `genre_1` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` WHERE `genre_1` = '$filter'");
    $query->execute();
    $filterBooks = $query->fetchAll();
    if (isset($_GET['sort'], $_GET['sortBy'])) {
        if ($_GET['sort'] === 'author') {
            $sort = 'surname';
        } elseif ($_GET['sort'] === 'genre') {
            $sort = 'genre_1';
        } else {
            $sort = $_GET['sort'];
        }
        if ($_GET['sortBy'] === 'asc') {
            $sortBy = 'ASC';
        } else {
            $sortBy = 'DESC';
        }

        $query = $db->prepare("SELECT `image`, `title`,`forename`,`isbn`, `surname`, `publication_date`, `rating`, 
       `genre_1` FROM `books` INNER JOIN `authors` ON `authors`.`id` = `author_id` WHERE `genre_1` = '$filter' ORDER BY `$sort` $sortBy ");
        $query->execute();
        $filterBooks = $query->fetchAll();


    }
}

if (isset($filterBooks) || isset($sortBooks))
{


    ?>
<section class="library">
<?php if(isset($sort)) {
echo "<h1>Your books, sorted by " . $_GET['sort'] . "</h1>";
}
else
{
    echo '<h1>Your results: </h1>';
}?>

        <div class="list">
            <?php
            if (isset($_GET['filter']))
            {
                echo dataDisplay($filterBooks);
            }
            else
            {
                echo dataDisplay($sortBooks);
            }
            ?>
        </div>
    <div class="unSort"><a href="index.php">un-sort ⎌</a></div>
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
    <a href="#">↑ Back to top ↑</a>
</footer>
</body>
</html>
