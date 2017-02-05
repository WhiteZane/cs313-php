<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Movie
        </title>
         <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <main>
         <?php include "modules/header.php" ?>
        <h1> Add A movie to the database </h1>
        <form method="POST" action="movies.php">
                             Movie Title:<input name="newTitle" type="text">

                            <br>
            Select Rating: <select name="newRating">
                                <option value="1">G</option>
                                <option value="2">PG</option>
                                <option value="3">PG-13</option>
                                <option value="4">TV-14</option>
                                <option value="5">TV-MA</option>
                                <option value="6">Not Rated</option>
                            </select><br>
            Select Genre: <select name="genre">
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

                            </select><br>
                            Description:<input name="newDesc" type="text"><br>
                            Owner:<input name="newOwner" type="text">
                            <br>
                            <input type="submit">
                        </form>
        </main>
    </body>

</html>
   