<?php 
if(session_id() == '')
 {
      session_start();
 }
if (!isset($_SESSION["message"])) {
    $_SESSION["message"]="";
}
if (!isset($_SESSION["newmessage"])) {
    $_SESSION["newmessage"]="";
}
if (!isset($_SESSION["username"])) {
    $_SESSION["username"]="";
}
?>
<html>
    <body>
    <head>