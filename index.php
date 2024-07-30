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
        foreach ($highRatings as $book) {
            echo '<div><img alt="cover image for book" src="' . $book['image'] . '"><div class="data">' . $book['title'] .
                '<br>' . $book['forename'] . ' ' . $book['surname'] . '<br>' . $book['publication_date'] .
                '<br>Rating: ' . $book['rating'] . '
                </div></div>';
        }
        ?>
    </div>

</section>
<section class="library" id="library">
    <h1>Your Library</h1>
    <div>
        <?php
        foreach ($books as $book) {
            echo '<div><img alt="cover image for book" src="' . $book['image'] . '"><div>' . $book['title'] .
                '<br>' . $book['forename'] . ' ' . $book['surname'] . '<br>' . $book['isbn'] .
                '<br>Rating: ' . $book['rating'] .
                '</div></div>';
        }
        ?>
    </div>
</section>
<footer>
    <a href="#">Back to top ↑</a>
</footer>
</body>
</html>
