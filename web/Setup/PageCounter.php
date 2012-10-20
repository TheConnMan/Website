<?php

define('CLIENT_LONG_PASSWORD', 1);
$page_name=$path_parts['filename'];
$query = sprintf("SELECT * FROM ViewCounts WHERE PAGE='$page_name'");
$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
mysql_select_db("bcconn+Website", $con);
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
    $count = $row['ViewCount']+1;
}
$query = sprintf("UPDATE ViewCounts SET ViewCount=$count WHERE page='$page_name'");
mysql_query($query);
mysql_close($con);
?>