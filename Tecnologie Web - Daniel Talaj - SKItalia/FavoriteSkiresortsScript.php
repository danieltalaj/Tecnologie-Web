<?php
include("database.php");
$UserName = $_SESSION["name"]; // based on currently loged user
getFavoriteSkiresorts($UserName);
?>