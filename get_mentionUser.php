<?php
//Chamam os arquivos
require 'app_token.php';
require 'tmhOAuth.php';


// cria conexão com as Keys e os Tokens
$connection = new tmhOAuth(array(
	'consumer_key' => $consumer_key, 'consumer_secret' => $consumer_secret, 'user_token' => $user_token, 'user_secret' => $user_secret
));

$connection->request('GET', $connection->url('1.1/statuses/mentions_timeline'), array('screen_name' => 'DevfestNE'));
// Get the HTTP API request
$response_code = $connection->response['code'];
// Convert the JSON response into an array
$response_data = json_decode($connection->response['response'],true);
if ($response_code <> 200) {
	print "Error: $response_code\n"; }
$response_data = json_encode($response_data);
print_r($response_data);
?>