<?php

$hostname = 'localhost';
$username = 'root';
$password = 'asDF4carlos!';
$database = 'crud_poc';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
