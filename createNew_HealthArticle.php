<?php
/**
 * Created by PhpStorm.
 * User: 1405466
 * Date: 09/12/2016
 * Time: 14:20
 */

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("header.php");

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //html code to collect user input in the a html form and create a health article from the information
    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Article</title>
    </head>
    <body>
    <header>
        <h1>Create an new Health article</h1>
    </header>

    <main>
        <form action="createNew_HealthArticle.php" method="post" id="ha_form">
            <input type="text" name="ha_title" placeholder="title"><br>
            <br>
            <input type="number" name="ha_importance" placeholder="0" ><br>
            <br>
            <textarea name="ha_content" form="ha_form" placeholder="Enter article content here"> </textarea>
            <br><br>
            <input type="submit" value="Post">
        </form>
    </main>

    </body>
    </html>

    <?

    include("footer.php");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //connect to the database
    include("Database/LoginSystem/DB_Connect.php");

    $_SESSION['login_username'] = $_username;

    //get the user id from the username
    $sql = "SELECT userID FROM users WHERE username='" . $_username . "'";

    //run the sql script
    $result = $conn->query($sql);

    $_ha_userID = $result;

    $_ha_title = $_POST["ha_title"];
    $_ha_importance = $_POST["ha_importance"];
    $_ha_content = $_POST["ha_content"];


    $sql = "INSERT INTO healthnews (title, content, importance, userID) VALUES ('$_ha_title', '$_ha_content', '$_ha_importance', '$_ha_userID')";

    if(mysqli_query($conn, $sql)){
        header("location:health_wellbeing.php");
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "post failed, please try again later.";
    }


} else {
    // nothing works
    print('all kinds of errors');
}
?>