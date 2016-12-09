<!DOCTYPE html>
    <html>
<head>
    <title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


</head>

<body>










<?php
/**
 * Created by PhpStorm....

 */
include("header.php");
include("Database/LoginSystem/DB_Connect.php");

$sql_query = "SELECT * FROM photo";
echo "<table>";
while($row = $result->fetch_array()) {

    echo "<tr>";
    echo "<td>";?> <img src="<?php echo $row["1"]; ?> height="100" width="100"> <?php echo "</td>";
    echo "<td>"; echo $row["11"]; echo "</td>";
    echo "<td>"; echo $row["21"]; echo "</td>";



    echo "</tr>";





}
echo "</table>";




 include("footer.php")
?>

</body>
</html>
