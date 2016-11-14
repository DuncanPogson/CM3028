<?php
/**
 * Created by Duncan Pogson.
 * User: 1405466
 * Date: 14/11/2016
 * Time: 15:38
 */
//Variables to store the username and password
$username = $_POST["name"];
$password = $_POST["password"];

//Testing to see if the details were correct
//Sets the user to the corresponding access level
if($username =="username" && $password=="password")
{
    setcookie('access_level_cookie','standarduser');
}