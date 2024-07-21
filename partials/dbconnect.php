<?php
// script to connect to the database
$servername = "db"; // The service name of the database container in the Docker network
$username = "umair123"; // The username defined in docker-compose.yml
$password = "umair@123"; // The password defined in docker-compose.yml
$database = "mariadb"; // The database name defined in docker-compose.yml

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}

// Your additional code here

?>
