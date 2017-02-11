<?php
                    
require("database/database.php");

                            


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

                <!--<h3> Search for a movie title </h3>
                <form method="POST" action="movies.php">
                             Search:<input name='title' type="text">

                            <br><br>
                            <input type="submit">
                        </form> -->

                <h1> To edit a movie select the edit button or remove button </h1>
                <h3> To easily search for you movie press ctrl + f, for a search menu</h3>
                        <?php 
                        
                        foreach ($db->query('SELECT rental.rentalid, rental.movietitle, rental.description, rental.borrowed, rental.owner, genre.genrecategory, ratings.rating
                                                    FROM rental
                                                    INNER JOIN genre on rental.genre_fk=genre.genreid
                                                    INNER JOIN ratings on rental.rating_fk=ratings.ratingid;') as $row){
                        
                    print '<table style="width:70%"> ';
                    echo '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
                            . '<th>Borrowed</th> <th>Owner </th> <th>Edit </th> <th>Delete </th> </tr>';
                            print "<tr><th>".$row['movietitle'] . "</th>" ;
                            print "<th>".$row['description'] . "</th>";
                            print "<th>".$row['genrecategory'] . "</th>";
                            print "<th>".$row['rating'] . "</th>";
                            if ($row['borrowed'] == '0'){
                            print "<th>False</th>";}
                            else {print "<th>True</th>";};
                            print "<th>".$row['owner'] . "</th>";
                           
                            // create a button to pass rentalId to a new form to Edit
                            print "<th>"
                            . "<form method='POST' action='edit_form.php'> "
                            . "<input type='hidden' name='movieId'
                                value=' " . $row['rentalid'] ."' >
                                <input type='submit' value='Edit'> </form></th>";
                            
                            
                            // Create a button to pass rentalId to delete from database
                            print "<th>"
                            . "<form method='POST' action='deleteMovie.php'> "
                            . "<input type='hidden' name='movieId'
                                value=' " . $row['rentalid'] ."' >
                                <input type='submit' value='Delete'> </form></th>";
                            print "</tr> " ;
                            print "</table>";
                      } 
                      
                      ?> 
            </main>
                
        
		
		
	</body>
</html>

