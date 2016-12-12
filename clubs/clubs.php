
<!DOCTYPE HTML>
<link href="http://belekaslol.azurewebsites.net/css/clubs.css" rel="stylesheet">
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Club Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
session_start();

include ("../Database/LoginSystem/DB_Connect.php");
include ("../calendar_start.php");
include ("../header.php");?>
<body>

<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
            </h1>
        </div>
    </div>
    <!-- /.row -->





    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
<?
            $sql = "SELECT * FROM club";
            $result = $conn->query($sql);

            while($row = $result->fetch_array()) {
                $clubID = $row['clubID'];
                $clubGenre = $row['genre'];
                $clubName = $row['clubName'];
                $clubEmail = $row['clubEmail'];

                echo "
    <li class="list-group-item">
    <a href='../club_page.php/?ID={$clubID}'>{$clubName}</a> Contact: {$clubEmail}, Genre: {$clubGenre}.
  </li>
";
            }

?>
        </div>
        <div class="col-md-6">
<?
            include "../calendar.php";
?>
        </div>
    </div>
</div>
    <hr>


</div>
<!-- /.container -->

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
