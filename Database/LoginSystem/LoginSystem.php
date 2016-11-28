<?php
/**
 * Created by Duncan Pogson.
 * User: 1405466
 * Date: 14/11/2016
 * Time: 15:38
 */
//Start the session
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    ?>
    <main>
        <form action="LoginSystem.php" method="post">
        Name:<br>
        <input type="text" name="login_username" placeholder="Username">
        <br>
        Password:<br>
        <input type="password" name="login_password" placeholder="Password">
        <br><br>
        <input type="submit" value="Login">
        </form>
    </main>
    <?
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("DB_Connect.php");
    $log_username = $_POST["login_username"];
    $log_password = $_POST["login_password"];
    function check_login($log_username, $log_password, $conn)
    {
        //Check the database to see if the details match
        $sql = "SELECT * FROM users WHERE username='" . $log_username . "' and
password='" . $log_password . "'";

        //return the result of the sql query
        $result = $conn->query($sql);
        while ($row = $result->fetch_array()) {
            return true;
        }
        return false;
    }
    if (check_login($log_username, $log_password, $conn)) {
        session_start();
        $_SESSION['login_username'] = $log_username;
        header("../../index.php");
    } else {
        header("location:shite");
    }
} else {
    // everything is awful
    print('Invalid login details');
}
?>
