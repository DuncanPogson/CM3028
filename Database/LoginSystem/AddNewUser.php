<?php
/**
 * Created by Duncan Pogson.
 * User: 1405466
 * Date: 21/11/2016
 * Time: 14:28
 */

include("DB_Connect.php");

$fullName = $_POST["FullName"];
$email = $_POST["Email"];
$password = $_POST["Password"];
$userID = 1;
$accessLevel = 1;


$sql = "INSERT INTO users (UserEmail, userName, UserPassword, UserId, AccessLevel) VALUES ('$email', '$fullName', '$password', '$userID', '$accessLevel')";

if(mysqli_query($db, $sql)){
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:index.php");
?>