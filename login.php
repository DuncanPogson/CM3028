<?php
/**
 * Created by PhpStorm.
 * User: 1405466
 * Date: 29/11/2016
 * Time: 14:04
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("header.php");
    //html code to collect information from a form
    ?>
    <main>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="username">
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            <p><input type="submit" value="Login"></p>
        </form>
    </main>
    <?
    //
    include("footer.php");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //connect to the database
    include("Database/LoginSystem/DB_Connect.php");

    //saving user input as variables
    $username = $_POST["username"];
    $password = $_POST["password"];
    function checklogin($username, $password, $conn)
    {
        //sql query to test the username and password against ones already in the database
        $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";

        //run the sql script
        $result = $conn->query($sql);
        while ($row = $result->fetch_array()) {
            return true;
        }
        return false;
    }
    if (checklogin($username, $password, $conn)) {
        session_start();
        $_SESSION['username'] = $username;
        header("home.php");
    } else {
        header("login.php");
    }
} else {
    // nothing works
    print('all kinds of errors');
}
?>