<?php

				$hello = 'Hello World';
				try
				{
					$user = 'postgres';
					$password = 'root';
					$db = new PDO('pgsql:host=127.0.0.1; dbname=rent_movies', $user, $password);
				} 
				catch (PDOException $ex)
				{
					echo 'Error!: ' . $ex->getMessage();
					die();
				}
?>

