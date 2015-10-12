<?php 

//Slack Details
$command = $_POST['command'];
$text = $_POST['text'];

//Parse
$pieces = explode(" ", $text, 2);

//Sinch API Details
$key = "ebb7918d-5eca-4d01-a975-b5996f856825";    
$secret = "my9j3z7bdUOThTKQ+Hiavw=="; 

//Query
$phone_number = $pieces[0];
$user = "application\\" . $key . ":" . $secret;    
$message = array("message"=> $pieces[1]);    
$data = json_encode($message);    
$ch = curl_init('https://messagingapi.sinch.com/v1/sms/' . $phone_number);    
curl_setopt($ch, CURLOPT_POST, true);    
curl_setopt($ch, CURLOPT_USERPWD,$user);    
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);    
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));    

//Results
$result = curl_exec($ch);    
if(curl_errno($ch)) {    
    echo 'Curl error: ' . curl_error($ch);    
} else {    
    echo $result;    
}   
curl_close($ch);

//Final Output
echo "\n Your message was sent.";

?>