<?php
require("database/database.php"); 

$editMovie = $_POST['movieId'];

//echo $editMovie;
$movieInfo;


$query = 'SELECT * FROM rental WHERE rentalid = :rental_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':rental_id', $editMovie);
    $statement->execute();
    $movieInfo = $statement->fetch();
    $statement->closeCursor();
$title = $movieInfo['movietitle'];
$desc = $movieInfo['description'];
$owner = $movieInfo['owner'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Edit Movie
        </title>
         <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <main>
         <?php include "modules/header.php" ?>
            
        <h1> Update a movie in the database </h1>
        
        <form action="updateMovie.php" method="post">
            
            <input type="hidden" name='upId'
             value="<?php echo $editMovie ?>" >
            Movie Title: <input type="text" name="upTitle" 
                                value="<?php echo htmlspecialchars($title) ?>"><br>
        
            Owner: <input type="text" name="upOwner"
                          value="<?php echo htmlspecialchars($owner) ?>"><br>
        
            <?php
                    $statement2 = $db->prepare('SELECT ratingId, rating FROM ratings');
                    $statement2->execute();
                    // Go through each genre make a option with value
                    echo "Rating : <select name='upRating'>";
                    
                    while ($rowRate = $statement2->fetch(PDO::FETCH_ASSOC)) {
                        $idRate = $rowRate['ratingid'];
                        $rateName = $rowRate['rating'];

                        echo "<option value='$idRate'>$rateName</option><br />";
                    }
                    echo "</select><br>";
            ?>
            <?php
                    $statement3 = $db->prepare('SELECT genreId, genreCategory FROM genre');
                    $statement3->execute();
                    // Go through each genre make a option with value
                    echo "Genre: <select name='upGenre'>";
                    while ($row = $statement3->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['genreid'];
                        $category = $row['genrecategory'];

                        echo "<option value='$id'>$category</option><br />";
                    }
                    echo "</select>";
            ?>
        <br><br>
            Borrowed: <select name='upBorrow'>
                <option value='false'>False</option>
                <option value='true'>True</option>
            </select><br><br>
        <label> Movie Description </label><br>
            <textarea name="upDesc" rows="5" cols="50"><?php echo htmlspecialchars(
                          $desc); ?></textarea>
        
        
        
        <input type="submit">
        </form>
        </main>
    </body>

</html>

