<?php
// Client ID of Imgur App 
$IMGUR_CLIENT_ID = "3320946e5e49594"; 
 
// Source image 
$image_source = file_get_contents("resources/avatar.png"); 
 
// Post image to Imgur via API 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image'); 
curl_setopt($ch, CURLOPT_POST, TRUE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image_source))); 
$response = curl_exec($ch); 
curl_close($ch); 
 
// Decode API response to array 
$responseArr = json_decode($response); 
 
// Print API response 
print '<pre>'; print_r($responseArr); print '</pre>'; 
 
// Display image from Imgur 
printf('<img height="180" src="%s" >', $responseArr->data->link);