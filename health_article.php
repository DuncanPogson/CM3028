<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 28/11/2016
 * Time: 21:25
 */
session_start();

$_selectedArticle = $_SESSION['selectedArticle'];

include ("Database/LoginSystem/DB_Connect.php");
include ("header.php");
echo "
<main>
";

$sql = "SELECT * FROM healthnews where itemID = '$articleID'";
$result = $conn->query($sql);

while($row = $result->fetch_array())
{
    $articleID = $row['itemID'];
    $articleName = $row['title'];
    $articleAuthor = $row['userID'];
    $articleText = $row['content'];

    echo "
<atricle>
    <h2>{$articleName}</h2>
    <h3>by {$articleAuthor}</h3>
    {$articleText}
 </atricle>";
}
echo "
</main>
";
include ("footer.php");
