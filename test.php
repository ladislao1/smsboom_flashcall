<?php
$ch = curl_init();

$recipient = '79000000000'; // client's phone number
$sender_id = 'sms-boom';    // do not change
$message = '1234';          // your XXXX client's code. You can generate random from your side



curl_setopt($ch, CURLOPT_URL, 'https://my.sms-boom.ru/api/v3/sms/send');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: Bearer  5|q7TwDJrpmDxx2H3NXkfVpkKuTndvrLtj5csvT3kg',
  'Content-Type: application/json'
]);


// json body
$json_array = [
            'recipient' => $recipient,
            'sender_id' => $sender_id,
            'message' => $message,
            'Authorization' => 'Bearer XXXXXXXXXXXXXXXXX'    // your Bearer token. Copy it from your cabinet - https://my.sms-boom.ru/developers, "API Token"
];
$body = json_encode($json_array);

// set body
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

// send the request and save response to $response
$response = curl_exec($ch);

// stop if fails
if (!$response) {
  die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
echo 'Response Body: ' . $response . PHP_EOL;
curl_close($ch);

?>
