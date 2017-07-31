<?PHP

$client_id = $_POST["client_id"];
$client_secret = $_POST["client_secret"];
$redirect_uri = $_POST["redirect_uri"];
$code = $_POST["code"];
$grant_type = $_POST["grant_type"];

/*
echo $client_id;
echo "<br />";
echo $client_secret;
echo "<br />";
echo $redirect_uri;
echo "<br />";
echo $code;
echo "<br />";
echo $grant_type;
echo "<br />";
*/

$options[CURLOPT_URL] = 'https://api.login.yahoo.com/oauth2/get_token';
$options[CURLOPT_POST] = 1;
$options[CURLOPT_POSTFIELDS] = "client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirect_uri."&code=".$code."&grant_type=".$grant_type."";
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