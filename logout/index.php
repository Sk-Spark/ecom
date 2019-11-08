<?php
session_start();

$_SESSION["user"] = "";
$_SESSION["id"] = "";


header("Location: ../index.php");

?>