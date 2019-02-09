<?php

# simple logout
# 1. destroying the session
# 2. redirecting to login page (index.php)
require_once("database.php");

session_unset();
session_destroy();

# Logout working, just not the "Logout successful" message!!!
# este skontrolovat tu spravu, nech ju niekde spravne vypise

redirect("index.php", "Logout successful.");
?>
