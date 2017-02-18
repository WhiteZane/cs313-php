<?php
    require("database/database.php"); 
    
    $addTitle = filter_var($_POST["newTitle"], FILTER_SANITIZE_STRING);
        echo $addTitle;
    $addOwner = filter_var($_POST["newOwner"], FILTER_SANITIZE_STRING);
        echo $addOwner;
    $addRating = filter_var($_POST["newRating"], FILTER_SANITIZE_STRING);
        echo $addRating;
    $addGenre = filter_var($_POST["newGenre"], FILTER_SANITIZE_STRING);
        echo $addGenre;
    $addDesc = filter_var($_POST["newDesc"], FILTER_SANITIZE_STRING);
        echo $addDesc;
    $borrowed = 0;
    
       try
{
	$query = 'INSERT INTO rental(movieTitle, genre_fk, rating_fk, description, borrowed, owner) VALUES(:movie_title, :genre_fk, :rating_fk, :desc, :borrow, :owner)';
	//SELECT rentalid, movietitle, genre_fk, rating_fk, description, borrowed, owner FROM rental
        $statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	$statement->bindValue(':movie_title', $addTitle);
	$statement->bindValue(':genre_fk', $addGenre);
	$statement->bindValue(':rating_fk', $addRating);
        $statement->bindValue(':desc', $addDesc);
        $statement->bindValue(':borrow',$borrowed );
        $statement->bindValue(':owner', $addOwner);
                                  
        
        $statement->execute();
        $statement->closeCursor();

}
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
      header('Location: allMovies.php');
        exit;
        
        ?>



