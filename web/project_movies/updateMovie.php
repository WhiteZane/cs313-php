<?php
require("database/database.php"); 
    
     $upId = $_POST["upId"];
        echo $upId;
    $upTitle = $_POST["upTitle"];
        echo $upTitle;
    $upOwner = $_POST["upOwner"];
        echo $upOwner;
    $upRating = $_POST["upRating"];
        echo $upRating;
    $upGenre = $_POST["upGenre"];
        echo $upGenre;
    $upDesc = $_POST["upDesc"];
        echo $upDesc;
    $upBorrow = $_POST["upBorrow"];
        echo $upBorrow;
    
       try
{       
        $query = 'UPDATE rental
              SET movietitle = :title,
                 genre_fk = :genreFk,
                  rating_fk = :ratingFk,
                   description = :desc,
                  borrowed = :borrowed,
                  owner = :owner
              WHERE rentalid = :rental_id';
	
	// bind to place holders
        $statement = $db->prepare($query);
        
	$statement->bindValue(':rental_id', $upId);
        
        $statement->bindValue(':title', $upTitle);
	$statement->bindValue(':genreFk', $upGenre);
	$statement->bindValue(':ratingFk', $upRating);
        $statement->bindValue(':desc', $upDesc);
        $statement->bindValue(':borrowed',$upBorrow );
        $statement->bindValue(':owner', $upOwner);
                                  
        
        $statement->execute();
        $statement->closeCursor();
        //$statement->debugDumpParams();
}
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
      //header('Location: edit_Movies.php');
        //exit; 
        header('Location: allMovies.php');
        

        ?>

