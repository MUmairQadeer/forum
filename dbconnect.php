<?php


//script to connect the database
$servername ="localhost";
$username ="root";
$password ="";
$database ="idiscuss";

$conn =mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Error is with database connection.. " .mysqli_connect_error());
}

   
?>