<?php
    require("database/database.php");
    
    $deleteMovie = $_POST['movieId'];
    print "this is my value" . $deleteMovie;
    
    
        $query = 'DELETE FROM rental WHERE rentalId = :movie_id'; 
    try {
        
        $statement = $db->prepare($query);
        $statement->bindValue(':movie_id', $deleteMovie);
        
        $statement->execute();
        $statement->closeCursor();
        
        
    } catch (Exception $ex) {
        // Please be aware that you don't want to output the Exception message in
        // a production environment
        echo "Error with DB. Details: $ex";
        die();
    }
    
    header('Location: allMovies.php');
    exit;
?>
