<?php
/**
 * Created by PhpStorm.
 * User: 1405466
 * Date: 14/11/2016
 * Time: 15:44
 */

session_start();
$accessLevel = $_COOKIE['access_level_cookie'];

displayAccessLevelInformation($accessLevel);

function displayAccessLevelInformation($accessLevel)
{
    if($accessLevel == "standarduser"){
        echo "<p style = \"background-colour: lightgreen\">You are currently logged in as a 'Contributor'</p>";
    }
    elseif($accessLevel == "NKPAG"){
        echo"<p style = \"background-colour: lightblue\">You are currently logged in as a 'NKPAG' </p>";
        echo"<p style = \"background-colour: lightblue\">You may now confirm map information</p>";
    }
    elseif($accessLevel == "ClubAdmin"){
        echo"<p style = \"background-colour: lightyellow\">You are currently logged in as a 'Club Admin' </p>";
        echo"<p style = \"background-colour: lightyellow\">You may now Add/Edit club information/ add Clubs/ Update Own Club</p>";
    }
    elseif($accessLevel == "SiteAdmin"){
        echo"<p style = \"background-colour: lightPink\">You are currently logged in as a 'Site Admin' </p>";
        echo"<p style = \"background-colour: lightPink\">You may now confirm new users/ Set roles/ edit all information/ add/remove all information</p>";
    }
}