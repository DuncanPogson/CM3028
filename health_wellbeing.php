<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 28/11/2016
 * Time: 20:59
 */
include ("/Database/LoginSystem/DB_Connect.php");
include ("header.php");
echo "
<main>
<h2>Health Articles</h2>
<ul>
";
$sql = "SELECT * FROM blogArticles ";
$result = $db->query($sql);
while($row = $result->fetch_array())
{
    $articleID = $row['articleID'];
    $articleName = $row['articleName'];
    $articleAuthor = $row['articleAuthor'];
    echo "<li><a href='blog/{$articleID}'>{$articleName}</a> by {$articleAuthor}</
li>";
}
echo "
</main>
";
include ("footer.php");