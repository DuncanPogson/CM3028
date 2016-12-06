<!DOCTYPE HTML>
<link href="http://belekaslol.azurewebsites.net/css/clubs.css" rel="stylesheet">
<div class="container">

    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">About Us
                <small>It's Nice to Meet You!</small>
            </h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>
        </div>
    </div>

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
            <h3>John Smith
                <small>Job Title</small>
            </h3>
            <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
            <h3>John Smith
                <small>Job Title</small>
            </h3>
            <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
            <h3>John Smith
                <small>Job Title</small>
            </h3>
            <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
            <h3>John Smith
                <small>Job Title</small>
            </h3>
            <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
            <h3>John Smith
                <small>Job Title</small>
            </h3>
            <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center">
            <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
            <h3>John Smith
                <small>Job Title</small>
            </h3>
            <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
        </div>
    </div>

    <hr>

</div>
<!-- /.container -->
<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 28/11/2016
 * Time: 21:25
 */
session_start();

include("../Database/LoginSystem/DB_Connect.php");
include("../header.php");
echo "
<main>
";

$sql = "SELECT * FROM healthnews where itemID = '$_selectedArticle'";
$result = $conn->query($sql);

while($row = $result->fetch_array())
{
    $articleID = $row['itemID'];
    $articleName = $row['title'];
    $articleAuthor = $row['userID'];
    $articleText = $row['content'];

    echo "
<article>
    <h2>{$articleName}</h2>
    <h3>by {$articleAuthor}</h3>
    {$articleText}
 </article>";
}
echo "
</main>
";
include("../footer.php");
