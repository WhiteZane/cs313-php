<?php
    $genre = $_POST['genre'];  
                  
                            try
				{
					$user = 'postgres';
					$password = 'root';
					$db = new PDO('pgsql:host=127.0.0.1; dbname=rent_movies', $user, $password);
				} 
				catch (PDOException $ex)
				{
					echo 'Error!: ' . $ex->getMessage();
					die();
				}			
    

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
            <?php foreach ($db->query("SELECT rentalid, movietitle, genre_fk, rating_fk, description, borrowed, owner FROM rental WHERE genre_fk = '$genre' ") as $row)
		{
		  echo '<b>'. $row['movietitle'].'<br>';
                          echo ' ' . $row['description'] . '<br>';
                                if ($row['borrowed'] == '0'){
                                    echo 'False';}
                                echo ' <br></b>' . $row['owner'];
                                echo '<br/>';
                        
                        
		} ?> 
        
	</main>

        <footer></footer>
    </body>
</html>