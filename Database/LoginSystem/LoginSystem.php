<?php
/**
 * Created by Duncan Pogson.
 * User: 1405466
 * Date: 14/11/2016
 * Time: 15:38
 */
//Start the session
session_start();

//Include The database
include("DB_Connect.php");

//Variables to store the username and password
$username = $_POST["login_username"];
$password = $_POST["login_password"];

//Does the user exist
$_does_Username_Exist = "SELECT * FROM 'users' WHERE  username='$username' and password='$password'";

$_exist_Result = mysqli_query($conn, $_does_Username_Exist) or die(mysqli_error($conn));
$count = mysqli_num_rows($_exist_Result);
//A Session is created when the details are correct
if ($count == 1){
    $_SESSION['username'] = $username;
}else{
//If login fails user wil be notified
    $fail_msg = "Invalid Login Credentials.";
}
//If the user successfully logs in they will be greeted with a welcome message
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "Hello " . $username . "
";
    echo "This is the Members Area
";
    echo "<a href='logout.php'>Logout</a>";

}

//Testing to see if the details were correct
//Sets the user to the corresponding access level
//if($username =="username" && $password=="password")
//{
//    setcookie('access_level_cookie','standarduser');
//}

//header('Location: LoggingIn.php');
