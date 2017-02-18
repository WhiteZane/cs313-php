<?php
    require("database/database.php");   
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Movie
        </title>
        
        <meta name="author" content="Zane White">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="main.css">
        
    </head>
    <?php include "modules/header.php" ?>
    <body>
        
        <div class="container-fluid">
            
            <main>


            <h1> Add a movie to the database </h1>

                <form action="inputMovie.php" method="post">

                Movie Title: <input type="text" name="newTitle"><br>

                Owner: <input type="text" name="newOwner"><br>

                    <?php
                            $statement = $db->prepare('SELECT ratingId, rating FROM ratings');
                            $statement->execute();
                            // Go through each genre make a option with value
                            echo "Rating : <select name='newRating'>";

                            while ($rowRate = $statement->fetch(PDO::FETCH_ASSOC)) {
                                $idRate = $rowRate['ratingid'];
                                $rateName = $rowRate['rating'];

                                echo "<option value='$idRate'>$rateName</option><br />";
                            }
                            echo "</select><br>";
                    ?>
                    <?php
                            $statement2 = $db->prepare('SELECT genreId, genreCategory FROM genre');
                            $statement2->execute();
                            // Go through each genre make a option with value
                            echo "Genre: <select name='newGenre'>";
                            while ($row = $statement2->fetch(PDO::FETCH_ASSOC)) {
                                $id = $row['genreid'];
                                $category = $row['genrecategory'];

                                echo "<option value='$id'>$category</option><br />";
                            }
                            echo "</select>";
                    ?>
                <br><br>
                <label> Movie Description </label><br>
                    <textarea name="newDesc" rows="5" cols="50"></textarea>
                    <br><br>

                    <input type="submit">
                </form>

            </main>
        
        </div>
        
        <?php include "modules/footer.php" ?>
        
    </body>

</html>
   