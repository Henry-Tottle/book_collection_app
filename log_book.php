<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles.css">
    <title>Logger Page</title>
    <?php
    require_once "database_connect.php"
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
            <a href="index.php">
                <button>Library</button>
            </a>
        </div>
    </nav>
</header>
<section class="logPage">
    <div>
        <h1>This is where books live, log you one!</h1>
    </div>
</section>
<section class="inputForm">
    <form method='POST'>
        <div>
            <label for="titleID">* Title: </label>
            <input id="titleID" type="text" name="title" required>

            <label for="forenameID">* Author first name(s): </label>
            <input id="forenameID" type="text" name="forename" required placeholder="Michael Marshall">

            <label for="surnameID">* Author surname: </label>
            <input id="surnameID" type="text" name="surname" required placeholder="Smith">

            <label for="isbnID">* ISBN: </label>
            <input id="isbnID" type="text" name="isbn" placeholder="ISBN 13" required>

            <label for="formatID">Format: </label>
            <select name="format" id="formatID">
                <option value="paperback">paperback</option>
                <option value="hardback">hardback</option>
            </select>

            <label for="publisherID">Publisher: </label>
            <input id="publisherID" type="text" name="publisher">
        </div>
        <div>
            <label for="pubDateID">Publication Date: </label>
            <input id="pubDateID" type="date" name="publication_date">

            <label for="genre1ID">* Genre 1: </label>
            <input id="genre1ID" type="text" name="genre_1" placeholder="Fantasy?" required>

            <label for="genre2ID">Genre 2: </label>
            <input id="genre2ID" type="text" name="genre_2" placeholder="Grimdark?">

            <label for="genre3ID">Genre 3: </label>
            <input id="genre3ID" type="text" name="genre_3" placeholder="Coming of Age?">
        </div>
        <div>
            <label for="imageID">* Image address: </label>
            <input type="url" id="imageID" name="image" required>

            <label for="ratingID">Rating: </label>
            <input type="number" id="ratingID" name="rating" min="1" max="5" step="0.1">
            <input type="submit" class="submit">
        </div>
        <?php


        if (isset($_POST['title'],
            $_POST['forename'],
            $_POST['surname'],
            $_POST['isbn'],
            $_POST['genre_1'],
            $_POST['image']))
        {
            $title = trim($_POST['title']);
            if (ctype_alpha($_POST['forename'])) {
                $forename = trim($_POST['forename']);
            }
            if (ctype_alpha($_POST['surname'])) {
                $surname = trim($_POST['surname']);
            }
            if (ctype_digit($_POST['isbn'])) {
                $isbn = trim($_POST['isbn']);
            }
            $format = $_POST['format'];
            $publisher = trim($_POST['publisher']);
            $pubDate = $_POST['publication_date'];
            if (ctype_alpha($_POST['genre_1'])) {
                $genre1 = trim($_POST['genre_1']);
            }
            if (ctype_alpha($_POST['genre_2'])) {
                $genre2 = trim($_POST['genre_2']);
            }
            if (ctype_alpha($_POST['genre_3'])) {
                $genre3 = trim($_POST['genre_3']);
            }
            $image = $_POST['image'];
            $rating = $_POST['rating'];
            $query = $db->prepare('INSERT INTO `authors` (`forename`, `surname`) VALUES (:forename,:surname)');
            $query->bindParam(':forename', $forename);
            $query->bindParam(':surname', $surname);
            $query->execute();

            $authorID = $db->lastInsertId();
            $authorID = intval($authorID);

            $query = $db->prepare
            ('INSERT INTO `books` (`title`, `author_id`, `isbn`, `format`, `publisher`, `publication_date`, `genre_1`, `genre_2`, `genre_3`, `image`, `rating`)
    VALUES (:title, :author_id, :isbn, :format, :publisher, :publication_date, :genre_1, :genre_2, :genre_3, :image, :rating)');
            $query->bindParam(':title', $title);
            $query->bindParam(':author_id', $authorID);
            $query->bindParam(':isbn', $isbn);
            $query->bindParam(':format', $format);
            $query->bindParam(':publisher', $publisher);
            $query->bindParam(':publication_date', $pubDate);
            $query->bindParam(':genre_1', $genre1);
            $query->bindParam(':genre_2', $genre2);
            $query->bindParam(':genre_3', $genre3);
            $query->bindParam(':image', $image);
            $query->bindParam(':rating', $rating);
            $query->execute();
            echo '<div class="success"><h1>BOOK ADDED</h1></div>';
        } else {
            echo "<div><br>You must fill in required fields *</div>";
        }


        ?>
    </form>
</section>
<footer>
    <a href="index.php">Back to Library</a>
</footer>
</body>
</html>