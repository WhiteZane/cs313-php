<?php
     
    require("database/database.php"); 
    $rateMovie = $_POST['rating'];
    

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
        
        <?php include "modules/header.php"; ?>
    <body>
        
        <main>
            <?php 
                    if($rateMovie == 0){
                    echo "<p>Nothing here</p>";
                    }
                    foreach ($db->query("SELECT rentalid, movietitle, genre_fk, rating_fk, description, borrowed, owner FROM rental WHERE rating_fk = '$rateMovie' ") as $row)
                    {
                      echo '<b>'. $row['movietitle'].'<br>';
                              echo ' ' . $row['description'] . '<br>';
                                    if ($row['borrowed'] == '0'){
                                        echo 'False';}
                                    echo ' <br></b>' . $row['owner'];
                                    echo '<br/>';


                    } 
                ?> 
        
		</main>

        <footer></footer>
    </body>
</html>
