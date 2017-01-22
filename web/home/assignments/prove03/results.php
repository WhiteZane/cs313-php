<?php
// First let's process all the input
// using constants for the names of the elements in the form would be better...
// It would also be better to use an ID of some sort for the
// value that is submitted such as "cs" as opposed to "Computer Science",
// then in PHP we could process that value and determine the exact
// presentation text to render.
setcookie("submitted", "yes");
$temple = $temple = htmlspecialchars($_POST["temple"]);
$lang = $lang = htmlspecialchars($_POST["lang"]);
$disneyChar = $disneyChar = htmlspecialchars($_POST["disneyChar"]);
$osi = $osi = htmlspecialchars($_POST["osi"]);
$count = $count = htmlspecialchars($_POST["count"]);


$infotxt = file_get_contents('results.txt');
$info = unserialize($infotxt);


extract($info);
echo $temples1;
echo $language1;
echo $disney2;
echo $osi4;

// checks for which temple was selected and stores result in an array
if ($temple === "Salt Lake City Temple")
{
    $temple1 = 1 + $temples1 ; 
}else if ($temple === "Redlands Temple"){
    $temple2 = 1 + $temples2;
}else if ($temple === "Idaho Falls Temple"){
    $temple3 = 1 + $temples3;
}else if ($temple === "Other"){
    $temple4 = 1 + $temples4;
}

//checks the results for computer languages and store result in an array
if ($lang === "C# and ASP.net")
{
    $lang1 = 1 + $language1; 
}else if ($lang === "PHP and HTML"){
    $lang2 = 1 + $language2;
}else if ($lang === "JavaScript and HTML"){
    $lang3 = 1 + $language3;
}else if ($lang === "Other"){
    $lang4 = 1 + $language4;
}

//checks the results for Disney Characters and stores result in an array
if ($disneyChar === "Mickey Mouse")
{
    $dChar1 = 1 + $disney1 ; 
}else if ($disneyChar === "Minnie Mouse"){
    $dChar2 = 1 + $disney2;
}else if ($disneyChar === "Donald Duck"){
    $dChar3 = 1 + $disney3;
}else if ($disneyChar === "Goofy"){
    $dChar4 = 1 + $disney4;
}

//checks the results for Disney Characters and stores result in an array
if ($osi === "Application")
{
    $osi1 = 1 + $osiq1; 
}else if ($osi === "Session"){
    $osi2 = 1 + $osiq2;
}else if ($osi === "Data Link"){
    $osi3 = 1 + $osiq3;
}else if ($osi === "Network"){
    $osi4 = 1 + $osiq4;
}


//create variables and arrays to store results
/*$temples=array();
$languages = array();
$dCharacters = array();
$osiLayer = array();*/

//populate first question array with results
$questions = array(
    'temples1' => isset($temple1),
    'temples2' => isset($temple2),
    'temples3' => isset($temple3),
    'temples4' => isset($temple4),
    'language1' => $lang1,
    'language2' => $lang2,
    'language3' => $lang3,
    'language4' => $lang4,
    'disney1'  => $dChar1,
    'disney2'  => $dChar2,
    'disney3'  => $dChar3,
    'disney4'  => $dChar4,
    'osiq1' => $osi1,
    'osiq2' => $osi2,
    'osiq3' => $osi3,
    'osiq4' => $osi4
   
    
);

echo $osiq4;
echo $language1;
echo $language3;
echo $disney4;

//opens and writes to new file called results.txt
$fp = fopen('results.txt', 'w+');
fwrite($fp, serialize($questions));





?>
<!DOCTYPE html>
<html>
<head>
	<title>Voting  Results</title>
</head>

<body>
	<h1> Voting Results</h1>

	
	
        <h3> Results for question 1 </h3>
        <p> votes for Salt Lake City Temple: <?=$temple1 ?></p>
        <p> votes for Redlands California Temple: <?=$temple2?></p>
        <p> votes for Idaho Falls Temple: <?=$temple3 ?></p>
        <p> votes for Other: <?=$temple4 ?></p>
        
        <h3> Results for question 2 </h3>
        <p>Votes for C# and ASP.net: <?=$lang1?></p>
        <p>Votes for PHP and HTML: <?=$$lang2 ?></p>
        <p>Votes for JavaScript and HTML: <?=$lang3?></p>
        <p>votes for Other:  <?=$lang4 ?></p>
        
        <h3> Results for question 3 </h3>
        <p>Votes for Mickey Mouse: <?=$dChar1 ?></p>
        <p>Votes for Minnie Mouse: <?=$dChar2 ?></p>
        <p>Votes for Donald Duck:<?=$dChar3 ?></p>
        <p>Votes for Goofy: <?=$dChar4 ?></p>
        
        <h3> Results for question 4 </h3>
        <p>Votes for Application: <?=isset($osi1) ?></p>
        <p>Votes for Session: <?=isset($osi2) ?></p>
        <p>Votes for Data Link:  <?=isset($osi3) ?></p>
        <p>Votes for Network: <?=isset($osi4) ?></p>
	

</body>


</html>