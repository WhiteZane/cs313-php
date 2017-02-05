<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');



try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
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
