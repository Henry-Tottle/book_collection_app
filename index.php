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
        <a href="log_book.php"><button>Log Book</button></a>
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


<footer>
    <a href="#">Back to top ↑</a>
</footer>
</body>
</html>
