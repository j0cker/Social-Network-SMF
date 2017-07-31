<?PHP

$client_id = $_POST["client_id"];
$client_secret = $_POST["client_secret"];
$guid = $_POST["guid"];
$access_token = $_POST["access_token"];

/*
echo $client_id;
echo "<br />";
echo $client_secret;
echo "<br />";
echo $guid;
echo "<br />";
echo $access_token;
echo "<br />";
*/

$authorization = "Authorization: Bearer ".$access_token."";
$options[CURLOPT_URL] = 'https://social.yahooapis.com/v1/user/'.$guid.'/contacts?format=json';
$options[CURLOPT_HTTPHEADER] = array('Content-Type: application/json' , $authorization);
//$options[CURLOPT_POST] = 1;
//$options[CURLOPT_POSTFIELDS] = "client_id=".$client_id."&client_secret=".$client_secret."";
$options[CURLOPT_RETURNTRANSFER] = true; // curl_exec will not return true if you use this, it will instead return the request body

// Preset $response var to false and output
$fb = "";
$response = false;// don't quote booleans
$curl = curl_init();
curl_setopt_array($curl, $options);
// If curl request returns a value, I set it to the var here. 
// If the file isn't found (server offline), the try/catch fails and var should stay as false.
$fb = curl_exec($curl);
curl_close($curl);
if($fb !== false) {
    $response = $fb;
} else {
    //header
    $response = $fb;
}
// If cURL was successful, $response should now be true, otherwise it will have stayed false.
echo $response;
?>