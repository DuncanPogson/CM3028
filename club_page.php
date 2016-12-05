<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 05/12/2016
 * Time: 20:14
 */
session_start();

include ("Database/LoginSystem/DB_Connect.php");
include ("header.php");

if (isset($_GET['ID'])) {
    echo $_GET['ID'];
    $_selected_club = $_GET['ID'];
}else{
    // Fallback behaviour
    echo "Uh Oh, this club seems to be missing, please go back and pick another club.";
}

$sql = "SELECT * FROM clubs where clubID ='" . $_selected_club . "'";
$result = $conn->query($sql);

while($row = $result->fetch_array())
    {
        $_articleName = $row['title'];
        $_articleAuthor = $row['userID'];
        $_articleText = $row['content'];

        echo "
        <article>
            Title: {$clubName} \n
            Genre: {$clubGenre} \n
            Contact Us: \n
            Email: {$clubEmail} \n
            Website: {$clubWebsite} \n
            Contact: {$clubContact} \n
            Phone Number: {$clubContactNo} \n
            Description: \n
            {$clubDescription}
        </article>";
    }

include ("footer.php");