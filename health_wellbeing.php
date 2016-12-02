<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 28/11/2016
 * Time: 20:59
 */
session_start();

include ("Database/LoginSystem/DB_Connect.php");
include ("header.php");
echo "
<main>
<h2>Health Articles</h2>
<ul>
";

$sql = "SELECT * FROM healthnews ";
$result = $conn->query($sql);
while($row = $result->fetch_array())
{
    $articleID = $row['itemID'];
    $articleName = $row['title'];
    $articleAuthor = $row['userID'];

    

    echo "<li><a href='health_article.php/{$articleID}'>{$articleName}</a> by {$articleAuthor}</li>";

}

echo "
</main>
";
include ("footer.php");