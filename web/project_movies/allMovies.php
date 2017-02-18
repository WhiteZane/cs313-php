<?php
                    
require("database/database.php");

                            


?>

<!DOCTYPE html>

<html>
<head>
        
	<title> Family Movies List</title>
        <meta name="author" content="Zane White">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="main.css">

</head>
        <?php include "modules/header.php" ?>
	<body> 
            <div class="container-fluid text-center">
            <main>
                <h1> Movie Rental Database </h1>

                <h3> Search for a movie title </h3>
                <form method="POST" action="movies.php">
                             Search:<input name='title' type="text">

                            <br><br>
                            <input type="submit">
                        </form>

                <h1> All current Movies in Database </h1>
                <p>If the movie was just updated it will appear at the end of the list.</p>
                        <?php 
                        
                        $allMovies = 'SELECT rental.rentalid, rental.movietitle, rental.description, rental.borrowed, rental.owner, genre.genrecategory, ratings.rating
                                                    FROM rental
                                                    INNER JOIN genre on rental.genre_fk=genre.genreid
                                                    INNER JOIN ratings on rental.rating_fk=ratings.ratingid';
                        
                        $statement = $db->prepare($allMovies);
                            $statement->execute();
                            $search = $statement->fetchAll(PDO::FETCH_ASSOC);
                            $statement->closeCursor();
            
            //$search->debugDumpParams();
            //var_dump($search);
             
                print "<table>";
                foreach ($search as $s)
          
		{
		  if ($s == 0 ){
                      echo "<h2>No Entries Available</h2>";
                  }
                    echo '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
                            . '<th>Borrowed</th> <th>Owner </th></tr>';
                            print "<tr><th>".$s['movietitle'] . "</th>" ;
                            print "<th>".$s['description'] . "</th>";
                            print "<th>".$s['genrecategory'] . "</th>";
                            print "<th>".$s['rating'] . "</th>";
                            if ($s['borrowed'] == '0'){
                            print "<th>False</th>";}
                            else {print "<th>True</th>";};
                            print "<th>".$s['owner'] . "</th>";
                            print "</tr> <tr class='blank_row'><td class='blank_row'>&nbsp;</td></tr>" ;
                        
                        
		} 
                print "</table>";
                        
                            /*echo '<table>' . '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
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
                        }*/
                        ?> 
            
            </main>
            </div>
            <?php include "modules/footer.php" ?>
                
        
		
		
	</body>
</html>
