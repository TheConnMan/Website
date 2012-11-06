<?php

session_start();

$_SESSION["username"] = "";
$redirect = sprintf("Location: ../Setup/index.php");
header($redirect);
?>
