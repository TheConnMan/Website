<?php

define('CLIENT_LONG_PASSWORD', 1);
$date = mktime(date('H')- 6, date('i'), date('s'), date("n"), date("j"), date("Y"));
$preauthor = $_POST["author"];
$author = str_replace("'", "''", $preauthor);
$precomment = $_POST["comment"];
$comment = str_replace("'", "''", $precomment);
$page = $_POST["page"];
$pageurl = $_POST["pageurl"];
$commenttype = $_POST["commenttype"];
if ($commenttype == 'related') {
    $reference = $_POST["reference"];
    $query = sprintf("INSERT INTO Comments (page, author, comment, date, reference) VALUES ('$page','$author','$comment','$date','$reference')");
} else {
    if ($page == 'Bugs') {
        $type = $_POST["type"];
        $query = sprintf("INSERT INTO Comments (page, author, comment, date, type) VALUES ('$page','$author','$comment','$date','$type')");
    } else {
        $query = sprintf("INSERT INTO Comments (page, author, comment, date) VALUES ('$page','$author','$comment','$date')");
    }
}

$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
mysql_select_db("bcconn+Website", $con);
mysql_query($query);
mysql_close($con);
$redirect = sprintf("Location: $pageurl");
header($redirect);
?>