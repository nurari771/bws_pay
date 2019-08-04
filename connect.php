<?php
$servername = "localhost";
$username = "root";
$password = "monday110";
$dbname = "bws1";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die('Connection failed: ' . $conn->connect_error);
}

?>
