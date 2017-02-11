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

                <h3> Search for a movie title </h3>
                <form method="POST" action="movies.php">
                             Search:<input name='title' type="text">

                            <br><br>
                            <input type="submit">
                        </form>

                <h1> All current Movies in Database </h1>
				<h3> To easily search for you movie press ctrl + f, for a search menu</h3>
                <p>(If the movie was just updated it will appear at the end of the list.)</p>
                        <?php 
                        
                        foreach ($db->query('SELECT rental.rentalid, rental.movietitle, rental.description, rental.borrowed, rental.owner, genre.genrecategory, ratings.rating
                                                    FROM rental
                                                    INNER JOIN genre on rental.genre_fk=genre.genreid
                                                    INNER JOIN ratings on rental.rating_fk=ratings.ratingid;') as $row){
                        
                            echo '<table style="width:60%">' . '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
                            . '<th>Borrowed</th> <th>Owner </th></tr>';
                            print "<tr><th>".$row['movietitle'] . "</th>" ;
                            print "<th>".$row['description'] . "</th>";
                            print "<th>".$row['genrecategory'] . "</th>";
                            print "<th>".$row['rating'] . "</th>";
                            if ($row['borrowed'] == '0'){
                            print "<th>False</th>";}
                            else {print "<th>True</th>";};
                            print "<th>".$row['owner'] . "</th>";
                            print "</tr> </table>" ;
                        }
                        ?> 
            </main>
                
        
		
		
	</body>
</html>
