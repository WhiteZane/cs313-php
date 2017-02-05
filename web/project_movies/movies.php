<?php

				
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

	
 
                    
                    
                    $name = $_POST['title'];
                ?>
                

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
        <title> Search </title>
        <meta name="author" content="Zane White">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
        
        <?php include "modules/header.php" ?>
    <body>
        
        <main>
            <h1> Movie Rental Database </h1>
	<br>
        <p> Click here to browse entire movie Database</p>
        
        <a href="allMovies.php"> click </a><br><br>
            <?php    // Prepare statement
                    $search = $db->prepare("SELECT rentalid, movietitle,genre_fk, rating_fk, description, borrowed, owner FROM rental WHERE movietitle LIKE ?");
                    // Execute with wildcards
                    $search->execute(array("%$name%"));
                    // Echo results
                    foreach($search as $s) {
                      echo '<table style="width:40%">' . '<tr><th> movie title </th> <th> desc. </th> <th>Owner </th></tr><tr><th>' .$s['movietitle'] . '</th> <th>' .
                              $s['description'] . '</th> <th>' . $s['borrowed'].'<th>'. $s['owner'].'</th></tr> </table>' ;
                      
                    }
                     print "<b>".$row['movietitle']."<br></b>";
                     
                          echo ' ' . $row['description'] . '<br>';
                                if ($row['borrowed'] == '0'){
                                    echo 'False';}
                                echo ' <br></b>' . $row['owner'];
                                echo '<br/>';
                    
                    
                
                
                ?>
        
        </main>

        <footer></footer>
    </body>
</html>

            