<?php
    require("database/database.php");
?>

<!DOCTYPE html>

<html>
    <head>
        
        <meta charset="UTF-8">
        <title> Family Movies </title>
        <meta name="author" content="Zane White">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="main.css">
    </head>

<?php include "modules/header.php" ?>
    <body>
        <div class="container-fluid">
        <main>
            
            <h1> Movie Rental Database </h1>
            <br>
            <p>To browse entire movie Database</p>
            <a href="allMovies.php"> Click here </a> 
            
            
             
            
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
        </div>
        <?php include "modules/footer.php" ?>

        
    </body>
</html>
