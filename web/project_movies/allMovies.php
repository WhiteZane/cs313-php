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

                            


?>

<!DOCTYPE html>

<html>
<head>
        
	<title> Family Movies </title>
        <link rel="stylesheet" href="main.css">

</head>
        <?php include "modules/header.php" ?>
	<body> 
            <main>
                <h1> Movie Rental Database </h1>

                <h3> Search for a movie title </h3>
                <form method="POST" action="movies.php">
                             Search:<input name="title" type="text">

                            <br><br>
                            <input type="submit">
                        </form>

                <h1> All current Movies in Database </h1>
                        <?php foreach ($db->query('SELECT rentalid, movietitle, genre_fk, rating_fk, description, borrowed, owner FROM rental') as $row)
                        {
                          echo '<b>'. $row['movietitle'].'<br>';
                          echo ' ' . $row['description'] . '<br>';
                                if ($row['borrowed'] == '0'){
                                    echo 'False';}
                                echo ' <br></b>' . $row['owner'];
                                echo '<br/>';


                        } ?> 
            </main>
                
        
		
		
	</body>
</html>
