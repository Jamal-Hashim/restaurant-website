<?php

$conn = mysqli_connect("localhost", "root", "", "restaurant_db");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

?>