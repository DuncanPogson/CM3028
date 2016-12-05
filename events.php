<?php
/**

 **/

include("Database/LoginSystem/DB_Connect.php");

$sql_query = "SELECT * FROM event";
    
$result = $db->query($sql_query);

while($row = $result->fetch_array()){

    echo "<p>".$row['eventName']."</p>";
}