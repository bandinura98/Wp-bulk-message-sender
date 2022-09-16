<?php

$content = file_get_contents("php://input");

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
  throw new Exception('Request method must be POST!');
}

//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
  throw new Exception('Content type must be: application/json');
}

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);

//If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
  throw new Exception('Received content contained invalid JSON!');
}

echo $decoded["personid"];


echo "person id php is : ".$decoded["personid"];echo "grup id php is : ".$decoded["grupid"];

include 'config.php';


$sql = "insert into new_schema.persongroup (groupid,personid) values (".$decoded["grupid"].",".$decoded["personid"].");";//"DELETE FROM new_schema.persongroup WHERE personid=" . $decoded["personid"] . " and " . $decoded["grupid"];

if ($conn->query($sql) === TRUE) {
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . $conn->error;
}

$conn->close();
//header('Location: person.php');  


?>