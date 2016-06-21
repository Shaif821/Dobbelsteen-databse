<?php
require_once("db_const.php");


$userID = "666";
$aWorp = array (3,4,3,4,3);//initialiseer de array voor de test

function insertScore ($userID, $aWorp, $score){ 
$worp = implode($aWorp); //maak van array een string
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
# check connection
if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";

exit();
}
//echo $worp; //debug
//maak de sql
$sql = "INSERT INTO dobbel_scores (User_ID , Worp , Score)
VALUES ('$userID' , '$worp' , '$score')";
if ($mysqli -> query($sql) === TRUE){
echo "<br>update succesvol<br>";
echo $sql;//debug
}else{
echo "<br>Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli -> close(); // save resources
    
}
?>