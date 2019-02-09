<?php
include("database.php");
if (isset($_REQUEST["name"]) && isset($_REQUEST["password"])) {
    $name = $_REQUEST["name"];
    $password = $_REQUEST["password"];
    # if (is_password_correct($name, $password)) {
    if (password_check($name, $password)) {
        if (isset($_SESSION)) {
            session_regenerate_id(TRUE);
        }
        $_SESSION["name"] = $name;     # start session, remember user info
        // echo "Login successful! Welcome!";
        # redirect("index.php", "Login successful! Welcome to SKItaly!"); # if success -> move to main page
        redirect("mainpage.php", "Login successful! Welcome to SKItalia!");
    } else {
        // echo "Incorrect user name and/or password.";
        # redirect("mainpage.php", "Incorrect user name and/or password.");
        redirect("index.php", "Login not successful! Incorrect user name and/or password."); # if not success -> stay on login page
    }
}
?>