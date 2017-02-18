<?php
	
 
    require("database/database.php");            
    $name = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
?>
                

<!DOCTYPE html>

<html>
    <head>
        
        <meta charset="UTF-8">
        <title> Search </title>
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
	<br>
        <p> Click here to browse entire movie Database</p>
        
        <a href="allMovies.php"> click </a><br><br>
            <?php    // Prepare statement
                    $search = $db->prepare('SELECT rental.rentalid, rental.movietitle, rental.description, rental.borrowed, rental.owner, genre.genrecategory, ratings.rating
                                                    FROM rental
                                                    INNER JOIN genre on rental.genre_fk=genre.genreid
                                                    INNER JOIN ratings on rental.rating_fk=ratings.ratingid
                                                    Where lower(rental.movietitle) Like ?');
                    // Execute with wildcards
                    $search->execute(array("%$name%"));
                    // Echo results
                    print '<table>';
                    foreach($search as $s) {
                      
                        echo '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
                            . '<th>Borrowed</th> <th>Owner </th></tr>';
                            print "<tr><th>".$s['movietitle'] . "</th>" ;
                            print "<th>".$s['description'] . "</th>";
                            print "<th>".$s['genrecategory'] . "</th>";
                            print "<th>".$s['rating'] . "</th>";
                            if ($s['borrowed'] == '0'){
                            print "<th>False</th>";}
                            else {print "<th>True</th>";}
                            print "<th>".$s['owner'] . 
                            "</th> </tr> <tr class='blank_row'><td class='blank_row'>&nbsp;</td></tr>";
                      
                    }
                    print "</table>";
                     
                    
                    
                
                
                ?>
        
        </main>
        </div>
        <?php include "modules/footer.php" ?>
        
    </body>
</html>

            