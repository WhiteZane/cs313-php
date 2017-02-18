<?php
    require("database/database.php"); 
    $genre = $_POST['genre'];  
                  
                            		
?>



<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
        <title> Search Genre </title>
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
            <?php 
                
            $checkGenre = 'SELECT rental.rentalid, rental.movietitle, rental.description, rental.borrowed, rental.owner, genre.genrecategory, ratings.rating
                                                    FROM rental
                                                    INNER JOIN genre on rental.genre_fk=genre.genreid
                                                    INNER JOIN ratings on rental.rating_fk=ratings.ratingid
                                                    Where rental.genre_fk = :genre';  
            $statement = $db->prepare($checkGenre);
            $statement->bindValue(':genre', $genre, PDO::PARAM_INT );
            $statement->execute();
            $search = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            
            //$search->debugDumpParams();
            //var_dump($search);
            //start table
            print "<table>";
            
            foreach ($search as $s)
          
		{
		  if ($s == 0 ){
                      echo "<h2>No Entries Available</h2>";
                  }
                    echo  '<tr><th> Movie Title </th> <th> Desc. </th> <th>Genre</th><th>Rating</th>'
                            . '<th>Borrowed</th> <th>Owner </th></tr>';
                            print "<tr><th>".$s['movietitle'] . "</th>" ;
                            print "<th>".$s['description'] . "</th>";
                            print "<th>".$s['genrecategory'] . "</th>";
                            print "<th>".$s['rating'] . "</th>";
                            if ($s['borrowed'] == '0'){
                            print "<th>False</th>";}
                            else {print "<th>True</th>";};
                            print "<th>".$s['owner'] . "</th>";
                            print "</tr><tr class='blank_row'><td class='blank_row'>&nbsp;</td></tr>" ;
                        
                        
		} 
                print "</table>";
                
                ?> 
        
	</main>
        </div>
        <?php include "modules/footer.php" ?>
    </body>
</html>