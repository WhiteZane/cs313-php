<?php
require("database/database.php"); 

$editMovie = filter_var($_POST['movieId'], FILTER_SANITIZE_STRING);

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="main.css">
         
         
         
        
    </head>
    <?php include "modules/header.php" ?>
    
    <body>
        <div class="container-fluid">
        <main>
         
        <h1> Update a movie in the database </h1>
        
        <form action="updateMovie.php" method="post">
            
            <input type="hidden" name='upId'
             value="<?php echo $editMovie ?>" >
            Movie Title: <input type="text" name="upTitle" autofocus=""
                                value="<?php echo $title ?>" required><br>
        
            Owner: <input type="text" name="upOwner"
                          value="<?php echo $owner ?>" required><br>
        
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
            <textarea name="upDesc" rows="5" cols="50"><?php echo
                    $desc; ?></textarea><br> <br>
        
        
        
        <input type="submit">
        </form>
        
        </main>
        </div>
        <?php include "modules/footer.php" ?>
    </body>

</html>

