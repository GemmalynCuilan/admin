<?php
function sendFCM() {
  // FCM API Url
  $url = 'https://fcm.googleapis.com/fcm/send';

  // Put your Server Key here
  $apiKey = "AAAAeubZ7oo:APA91bHPQyAZTgM6oBOX5aqKfbrlT6-y774zWwMlDR8HE6rpUiZrr3Syzsvu_E82AmPqv1Lu79p5FkwhxKL2PgYtFaXF-Q9ZVCZnfZD2Kh1Oh_qmdIiK-b5RNMGHar6Wqn_oCKgEyPUl";

  // Compile headers in one variable
  $headers = array (
    'Authorization:key=' . $apiKey,
    'Content-Type:application/json'
  );

  // Add notification content to a variable for easy reference
  $notifData = [
    'title' => "Test Title",
    'body' => "Test notification body",
    //  "image": "url-to-image",//Optional
    'click_action' => "activities.NotifHandlerActivity" //Action/Activity - Optional
  ];

  $dataPayload = ['to'=> 'My Name', 
  'points'=>80, 
  'other_data' => 'This is extra payload'
  ];
  // Create the api body
  $apiBody = [
    'notification' => $notifData,
    'data' => $dataPayload, //Optional
    'time_to_live' => 600, // optional - In Seconds
    //'to' => '/topics/mytargettopic'
    //'registration_ids' = ID ARRAY
    'to' => 'f6SGIhtISxS_diCRdIjP8O:APA91bGQVbj4C2sAl_MU8eicKlrBXCf88nKl90Dy4rVF7j9oj0W5UcW1QdTVoNa0pShkbmqT6wJqhClZ2lcEbeeGoiYwAMLYXzlWw5bSTChxrUzbTb-Xgrxmw5a1wY7ivULv6aJXLPli'
  ];

  // Initialize curl with the prepared headers and body
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_POST, true);
  curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

  // Execute call and save result
  $result = curl_exec($ch);
  print($result);
  // Close curl after call
  curl_close($ch);

  return $result;
}
sendFCM();
?>