<?php

session_start();

$_SESSION["username"] = null;
$redirect = sprintf("Location: ../Setup/index.php");
header($redirect);
?>
