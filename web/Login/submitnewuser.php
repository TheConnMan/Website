<?php
session_start();

define('CLIENT_LONG_PASSWORD', 1);
$username=$_POST["username"];
$query = sprintf("SELECT COUNT(*) AS count FROM Users WHERE username='$username'");
$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
mysql_select_db("bcconn+Website", $con);
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if ($row['count']==0) {
    $query = sprintf("INSERT INTO Users (username) VALUES ('$username')");
    mysql_query($query);
    $_SESSION["username"] = $username;
    $_SESSION["newmessage"] = null;
    mysql_close($con);
    $redirect = sprintf("Location: ../Setup/index.php");
    header($redirect);
} else {
    $_SESSION["newmessage"] = "Username already taken.";
    mysql_close($con);
    $redirect = sprintf("Location: ../Login/Login.php");
    header($redirect);
}
?>
