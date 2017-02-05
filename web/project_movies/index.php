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
        <link rel="stylesheet" href="main.css">
        <meta charset="UTF-8">
        <title> Family Movies </title>
        <meta name="author" content="Zane White">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
        
        <?php include "modules/header.php" ?>
    <body>
        
        <main>
            <h1> Movie Rental Database </h1>
	<br>
        <p> Click here to browse entire movie Database</p>
        <br>
        <a href="allMovies.php"> click </a><br>
                <form method="POST" action="movies.php">
                     Search:<input name="title" type="text">
                     
                    <br><br>
                    <input type="submit">
                    <br><br>
                </form>
                
                <form method="POST" action="movieRatings.php">>
                     <select name="rating">
                            <option value="1">G</option>
                            <option value="2">PG</option>
                            <option value="3">PG-13</option>
                            <option value="4">TV-14</option>
                            <option value="5">TV-MA</option>
                            <option value="6">Not Rated</option>
                          </select>
                    <input type="submit">
                </form>
        
                <form method="POST" action="movieGenre.php">>
                     <select name="genre">
                            <option value="1">Action</option>
                            <option value="2">Adventure</option>
                            <option value="3">Animation</option>
                            <option value="4">Comedy</option>
                            <option value="5">Documentary</option>
                            <option value="6">Drama</option>
                            <option value="7">Family</option>
                            <option value="8">Fantasy</option>
                            <option value="9">Horror</option>
                            <option value="10">Mystery</option>
                            <option value="11">Romance</option>
                            <option value="12">Sci-Fi</option>
                            <option value="13">Thriller</option>
                            <option value="14">Western</option>
                            
                          </select>
                    <input type="submit">
                </form>
        
		</main>

        <footer></footer>
    </body>
</html>
