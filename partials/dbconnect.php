<?php


//script to connect the database
$servername ="db";
$username ="umair123";
$password ="umair@123";
$database ="mariadb";

$conn =mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Error is with database connection.. " .mysqli_connect_error());
}

   
?>