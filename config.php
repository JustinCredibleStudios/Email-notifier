<?php 

// Server information
$servername = "localhost";
$username = "jmiller";
$password = "StarShine2024!";

// Instablishing a connection
$connect = new mysqli($servername, $username, $password);

// Verifying Connection has been established
if($connect->connect_error){
    die("Conneection failed: ". $connect->connect_error);
} else {
    echo "The connection has been established successfully!";
}
