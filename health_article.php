<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 28/11/2016
 * Time: 21:25
 */
session_start();

include ("Database/LoginSystem/DB_Connect.php");
include ("header.php");
echo "
<main>
";

$_selected_article = $_GET['itemID'];

$sql = "SELECT * FROM healthnews where itemID = '$_selected_article'";
$result = $conn->query($sql);

while($row = $result->fetch_array())
{
    $_articleID = $row['itemID'];
    $_articleName = $row['title'];
    $_articleAuthor = $row['userID'];
    $_articleText = $row['content'];

    echo "
<article>
    <h2>{$_articleName}</h2>
    <h3>by {$_articleAuthor}</h3>
    {$_articleText}
 </article>";
}
echo "
</main>
";
include ("footer.php");
