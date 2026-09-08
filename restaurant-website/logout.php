<?php

session_start();

// Session ke saare variables remove
session_unset();

// Session destroy
session_destroy();

// Login page par redirect
header("Location: login.php");
exit;
?>