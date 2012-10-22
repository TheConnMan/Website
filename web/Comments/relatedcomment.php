<?php
define('CLIENT_LONG_PASSWORD', 1);
$date = mktime(date('H')-6,date('i'),date('s'),date("m"),date("d"),date("Y"));
$preauthor=$_POST["author"];
$author=str_replace("'","''",$preauthor);
$precomment=$_POST["comment"];
$comment=str_replace("'","''",$precomment);
$page=$_POST["page"];
$pageurl=$_POST["pageurl"];
$reference=$_POST["reference"];
$query = sprintf("INSERT INTO RelatedComments VALUES ('$page','$author','$comment','$date','$reference')");
$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
mysql_select_db("bcconn+Website", $con);
mysql_query($query);
mysql_close($con);
$redirect=sprintf("Location: $pageurl");
header($redirect) ;
?>