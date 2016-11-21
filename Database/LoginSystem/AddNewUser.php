<?php
/**
 * Created by Duncan Pogson.
 * User: 1405466
 * Date: 21/11/2016
 * Time: 14:28
 */

include("DB_Connect.php");

$_username = $_POST["FullName"];
$_email = $_POST["Email"];
$_password = $_POST["Password"];
$_dateOfBirth = $_POST["Date of Birth"];
$_address = $_POST["Address"];
$_firstName = $_POST["First Name"];
$_lastName = $_POST["Last Name"];
$_userID = 1;
$_accessLevel = 1;


$sql = "INSERT INTO users (email, username, password, userID, dateOfBirth, address, firstName, lastName, accessLevel) VALUES ('$_email', '$_username', '$_password', '$_dateOfBirth', '$_address', '$_firstName', '$_lastName', '$_userID', '$_accessLevel')";

if(mysqli_query($db, $sql)){
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:CM3028/index.php");
?>