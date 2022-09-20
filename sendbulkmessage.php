<?php
//        var datax = {'image':selectedimage, 'grupid':selector, 'message':text};


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

include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}












function GetMetodu($url) { 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
     curl_setopt($ch,CURLOPT_HEADER, false); 
    
    $output=curl_exec($ch); 
    curl_close($ch); 
    return $output; 
} 

echo GetMetodu("http://localhost:8000/sessions/find/john");

//echo "gurupid:" . $decoded["grupid"] . "   meşaj:" . $decoded["message"] . "    imaj" . $decoded["image"];+

function httpPost($url,$params) { 
    $ch = curl_init( $url );
    # Setup request to send json via POST.
    $payload = json_encode( $params );
    print_r($payload);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
    # Print response.
    echo "<pre>$result</pre>";
    return $result;
    
    /*$postData = '';
    //foreach($params as $k => $v) { 
    //    $postData .= $k . '='.$v.'&'; 
    //    echo $postData;
    //}
    $payload = json_encode($params);
    rtrim($postData, '&'); 
    
    $ch = curl_init(); 

    curl_setopt($ch,CURLOPT_URL,$url); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
    
    $output=curl_exec($ch); 

    curl_close($ch); 
    return $output; */
}

$params = array( 
    "name" => "Mustafa Çelik", 
    "age" => "26",
    "location" => "Istanbul" 
);
 













$sql = "SELECT * FROM persongroup  INNER JOIN new_schema.persons on  new_schema.persons.personid = persongroup.personid and persongroup.groupid=".$decoded['grupid'].";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($decoded["image"]=="unimaged"){
        $parameters = array( 
            "receiver" => $row["phone"], 
            "message" => array(
                "text" => $decoded['message']
            )
        );  echo 'http://localhost:8000/chats/send?id='.$decoded["ses"];
        httpPost('http://localhost:8000/chats/send?id='.$decoded["ses"],$parameters);
    }else{
        $parameters = array( 
            "receiver" => $row["phone"], 
            "message" => array(
                "image" => array(
                    "url" => dirname(__FILE__)."\\".$decoded["image"],
                ),
                "caption" => $decoded['message']
            )
        );
        print_r($parameters);
        httpPost('http://localhost:8000/chats/send?id=john',$parameters);
    }

  }
} else {
  echo "0 results";
}
$conn->close();





?>
