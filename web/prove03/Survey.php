<?php
   //start session
    session_start();
    
	if ($_COOKIE["submit"] == "yes") {
		header('Location: http://lit-refuge-30680.herokuapp.com/home/assignments/prove/results.php');
			exit(); // for security use exit function after redirect
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Assignment PHP Survey</title>
	</head>

	<body>
		<form method="POST" action="results.php">
			<h2>Please vote on the following questions:</h2>
                        
                        Which Temple is you favorite?<br />
			<!-- Notice that each radio button has the same name, but
			different a different id -->
			<input type="radio" name="temple" value="Salt Lake City Temple" id="temple-slc"><label for="temple-slc">Salt Lake City Temple</label><br />
			<input type="radio" name="temple" value="Redlands Temple" id="temple-redlands"><label for="temple-redlands">Redlands California Temple</label><br />
			<input type="radio" name="temple" value="Idaho Falls Temple" id="temple-if"><label for="temple-if"> Idaho Falls Temple</label><br />
			<input type="radio" name="temple" value="Other" id="temple-other"><label for="temple-other">Other</label><br />
			<br />
                        
                        What is you favorite computer language?<br />
			<!-- Notice that each radio button has the same name, but
			different a different id -->
			<input type="radio" name="lang" value="C# and ASP.net" id="lang-c"><label for="lang-c">C# and ASP.net</label><br />
			<input type="radio" name="lang" value="PHP and HTML" id="lang-php"><label for="lang-php">PHP and HTML</label><br />
			<input type="radio" name="lang" value="JavaScript and HTML" id="lang-javascript"><label for="lang-javascript">JavaScript and HTML</label><br />
			<input type="radio" name="lang" value="Other" id="lang-other"><label for="lang-other">Other</label><br />
			<br />
                        
                        Who is your favorite Disney character?<br />
			<!-- Notice that each radio button has the same name, but
			different a different id -->
			<input type="radio" name="disneyChar" value="Mickey Mouse" id="disney-mickey"><label for="disney-mickey">Mickey Mouse</label><br />
			<input type="radio" name="disneyChar" value="Minnie Mouse" id="disney-minnie"><label for="disney-minnie">Minnie Mouse</label><br />
			<input type="radio" name="disneyChar" value="Donald Duck" id="disney-donald"><label for="disney-donald">Donald Duck</label><br />
			<input type="radio" name="disneyChar" value="Goofy" id="disney-goofy"><label for="disney-goofy">Goofy</label><br />
			<br />
                        
                        Which layer of the OSI model is used for packets?<br />
			<!-- Notice that each radio button has the same name, but
			different a different id -->
			<input type="radio" name="osi" value="Application" id="osi-app"><label for="osi-app">Application</label><br />
			<input type="radio" name="osi" value="Session" id="osi-session"><label for="osi-session">Session</label><br />
			<input type="radio" name="osi" value="Data Link" id="osi-data"><label for="osi-data">Data Link</label><br />
			<input type="radio" name="osi" value="Network" id="osi-network"><label for="osi-network">Network</label><br />
			<br />
                         <input type="hidden" name="count" value="1">  
			<br />
			<input type="submit" value="Submit Answers">


		</form>
            <a href = "results.php"> Check Results</a>

	</body>

</html>