<?php
/**
 * Created by Duncan Pogson - 1405466.
 * Date: 14/11/2016
 * Time: 15:07
 * Connect to groupD3 web app and select database
 */
//Defining variables to store the database info
//define('DB_SERVER', 'eu-cdbr-azure-north-e.cloudapp.net');
//define('DB_USERNAME', 'b4defdb830e2bc');
//define('DB_PASSWORD', '44f41f1c');
//define('DB_DATABASE', 'cm3028_groupd3_db');

$serverName = "eu-cdbr-azure-north-e.cloudapp.net";
$DB_name = "b4defdb830e2bc";
$DB_password = "44f41f1c";
$DB = "cm3028_groupd3_db";

//attempting to connect to the database
//$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$conn = new mysqli($serverName, $DB_name, $DB_password, $DB);

if($conn->connect_error){
    die('ConnectFailed['.$db->connect_error.']');
}
echo "connected Successfully";

//test if connection was established and print any errors
//if($db -> connect_errno){
//    die('ConnectFailed['.$db->connect_error.']');
//}

