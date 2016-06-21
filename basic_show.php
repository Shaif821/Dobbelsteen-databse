<?php
require_once("db_const.php");

function laatZien(){

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection

    if ($mysqli->connect_errno) {
    echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
    exit();
    }

    //haal de gegevens op
    $sql = "SELECT User_ID , Worp , Score, Time FROM dobbel_scores ORDER BY Time DESC";
    $result = $mysqli -> query($sql);
    if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div>" . "User_ID: " . $row["User_ID"]. " Worp: " . $row["Worp"]. " Score " .
    $row["Score"]. " Tijd " . $row['Time'] . "<br>" . "</div";
    }
    } else {
    echo "Niets gevonden";
    }
    $mysqli -> close(); // save resources
 }
?>