<?php

$conn = mysqli_connect("localhost", "root", "", "giftly");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

echo "Database connected successfully!";

?>