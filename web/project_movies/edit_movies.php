<?php
                    
require("database/database.php");

                            


?>

<!DOCTYPE html>

<html>
<head>
        
	<title> Family Movies Edit</title>
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
                <h1> Movie Rental Database </h1><br>

                

                <h1> To edit a movie select the edit button or remove button </h1>
                <h3> To easily search for you movie press ctrl + f, for a search menu</h3>
                        <?php 
                        
                        $editMovies = 'SELECT rental.rentalid, rental.movietitle, rental.description, rental.borrowed, rental.owner, genre.genrecategory, ratings.rating
                                                    FROM rental
                                                    INNER JOIN genre on rental.genre_fk=genre.genreid
                                                    INNER JOIN ratings on rental.rating_fk=ratings.ratingid';
                        
                        $statement = $db->prepare($editMovies);
                            $statement->execute();
                            $search = $statement->fetchAll(PDO::FETCH_ASSOC);
                            $statement->closeCursor();
                        print '<table style="width:100%">';
                        foreach ($search as $s){
                        
                    echo '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
                            . '<th>Borrowed</th> <th>Owner </th> <th>Edit </th> <th>Delete </th> </tr>';
                            print "<tr><th>".$s['movietitle'] . "</th>" ;
                            print "<th>".$s['description'] . "</th>";
                            print "<th>".$s['genrecategory'] . "</th>";
                            print "<th>".$s['rating'] . "</th>";
                            if ($s['borrowed'] == '0'){
                            print "<th>False</th>";}
                            else {print "<th>True</th>";};
                            print "<th>".$s['owner'] . "</th>";
                           
                            // create a button to pass rentalId to a new form to Edit
                            print "<th>"
                            . "<form method='POST' action='edit_form.php'> "
                            . "<input type='hidden' name='movieId'
                                value=' " . $s['rentalid'] ."' >
                                <input type='submit' value='Edit'> </form></th>";
                            
                            
                            // Create a button to pass rentalId to delete from database
                            print "<th>"
                            . "<form method='POST' action='deleteMovie.php'> "
                            . "<input type='hidden' name='movieId'
                                value=' " . $s['rentalid'] ."' >
                                <input type='submit' value='Delete'> </form></th>";
                            print "</tr> <tr class='blank_row'><td class='blank_row'>&nbsp;</td></tr>" ;
                            
                      } 
                      print "</table>";
                      ?> 
            </main>
            </div>
            <?php include "modules/footer.php" ?>
		
		
	</body>
</html>

