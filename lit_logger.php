<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
crossorigin="anonymous" referrerpolicy="no-referrer"/>
<title>Lit Logger</title>
    <?php

    require_once'database_connect.php';
    $query = $db->prepare('SELECT * FROM `books`, `authors`');
    $query->execute();
    $results = $query->fetchAll();
    var_dump($results);
    ?>
</head>
<body>
<header>
    <nav>
        <form>
            <input type="text" placeholder="search books"><input type="submit" value="search">
        </form>
        <button>Filter</button>
        <button>Library</button>
    </nav>
</header>
<section>
    <div></div>
</section>





</body>
</html>
