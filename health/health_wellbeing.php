<!DOCTYPE html>
<html lang="en">
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="images/sportsz.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 style="color:cadetblue;">Portlethen's guide to healthy living and keeping active</h1>
                    <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
                    <p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Sign up today
                        </button></p>
                </div>
            </div>
        </div>
        <!-- boom -->
        <div class="item">
            <img class src="images/Clubs.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Explore clubs</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="images/zen.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Health And Wellbeing</h1>
                    <p>Tips for healthy life</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
<?php
/**
 * Created by PhpStorm.
 * User: duncanpogson
 * Date: 28/11/2016
 * Time: 20:59
 */
session_start();

include("../Database/LoginSystem/DB_Connect.php");
include("../header.php");

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
include("../footer.php");