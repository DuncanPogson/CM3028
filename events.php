<?php
//include("header.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/**

 **/

include("Database/LoginSystem/DB_Connect.php");

$sql_query = "SELECT * FROM event";
    
$result = $conn->query($sql_query);

while($row = $result->fetch_array()){

    echo "<p>".$row['eventID'] . " ". $row['eventName'] . " ". $row['date'] . " ". ($row['time'] * -1). " ". $row['description']."</p>";
}
//include("footer.php");

