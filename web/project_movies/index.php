<?php
    require("database/database.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
        <title> Family Movies </title>
        <meta name="author" content="Zane White">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<?php include "modules/header.php" ?>
    <body>

        <main>
            <h1> Movie Rental Database </h1>
            <br>
            <p> Click here to browse entire movie Database</p>
            <br>
            <a href="allMovies.php"> click </a><br>
            
            <h3>Search Movies by Title</h3>
            
            <form method="POST" action="movies.php">
                Search:<input name='title' type="text">

                <br><br>
                <input type="submit">
                <br><br>
            </form>
            <h3> Search by Rating and Genre</h3>
                <form method="POST" action="movieRatings.php">

                <?php
                    $statement = $db->prepare('SELECT ratingId, rating FROM ratings');
                    $statement->execute();
                    // Go through each genre make a option with value
                    echo "<select name='rating'>";
                    while ($rowRate = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $idRate = $rowRate['ratingid'];
                        $rateName = $rowRate['rating'];

                        echo "<option value='$idRate'>$rateName</option><br />";
                    }
                    echo "</select>";
                ?>
                    
                    <input type="submit">

                </form><br>

                <form method="POST" action="movieGenre.php">
                    <?php
                    $statement2 = $db->prepare('SELECT genreId, genreCategory FROM genre');
                    $statement2->execute();
                    // Go through each genre make a option with value
                    echo "<select name='genre'>";
                    while ($row = $statement2->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['genreid'];
                        $category = $row['genrecategory'];

                        echo "<option value='$id'>$category</option><br />";
                    }
                    echo "</select>";
                    ?>
                    <input type="submit">
                </form>

        </main>

        <footer></footer>
    </body>
</html>
