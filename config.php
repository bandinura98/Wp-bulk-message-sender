<?php


$servername = "localhost";
$username = "root";
$password = "baba1111";
$dbname = "new_schema";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}





?>