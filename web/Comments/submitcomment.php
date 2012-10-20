<?php
define('CLIENT_LONG_PASSWORD', 1);
$date = time();
$author=$_POST["author"];
$comment=$_POST["comment"];
$page=$_POST["page"];
$pageurl=$_POST["pageurl"];
$query = sprintf("INSERT INTO Comments VALUES ('$page','$author','$comment','$date')");
$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
mysql_select_db("bcconn+Website", $con);
mysql_query($query);
mysql_close($con);
$redirect=sprintf("Location: $pageurl");
header($redirect) ;
?>