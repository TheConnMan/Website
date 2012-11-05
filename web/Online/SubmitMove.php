<?php

if (!defined('CLIENT_LONG_PASSWORD')) {
    define('CLIENT_LONG_PASSWORD', 1);
}
$newdate = mktime(date('H') - 6, date('i'), date('s'), date("n"), date("j"), date("Y"));
$board = $_POST["board"];
$player = $_POST["opponent"];
$opponent = $_POST["player"];
$olddate = $_POST["date"];
$gametype = $_POST["gametype"];
$piece = $_POST["piece"];
$con = mysql_connect('sql.mit.edu', 'bcconn', 'MySQL2012', false, CLIENT_LONG_PASSWORD) or die(mysql_error());
mysql_select_db("bcconn+Website", $con);
if ($olddate=="") {
    $query = sprintf("INSERT INTO Games VALUES ('$gametype', '$board', '$player', '$opponent', '$piece', '$newdate')");
} else {
    $query = sprintf("UPDATE Games SET board='$board', curplayer='$player', oppplayer='$opponent', lastmove='$newdate', piece='$piece' WHERE lastmove='$olddate', curplayer='$opponent'");
}
mysql_query($query);
mysql_close($con);

$redirect = sprintf("Location: ../Online/Games.php");
header($redirect);
?>
