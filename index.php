<?php
extract($_POST);
if(isset($send))
{
	$url="https://email-sender1.p.rapidapi.com/?"
			."txt_msg=".rawurlencode($message)
			."&to=".rawurlencode($to)
			."&from=".rawurlencode($from)
			."&subject=".rawurlencode($sub);			
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
	curl_setopt($curl,CURLOPT_ENCODING,"");
	curl_setopt($curl,CURLOPT_MAXREDIRS,10);
	curl_setopt($curl,CURLOPT_TIMEOUT,30);
	curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
	curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"POST");
	curl_setopt($curl,CURLOPT_POSTFIELDS,"{\r\n    \"key1\": \"value\",\r\n    \"key2\": \"value\"\r\n}");
	curl_setopt($curl,CURLOPT_HTTPHEADER,[
		"content-type: application/json",
		"x-rapidapi-host: email-sender1.p.rapidapi.com",
		"x-rapidapi-key: <API-KEY>"]);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if($err)
	{
		echo "Coundn't send the message!";
	} 
	else {
		header('location:index.php');
	}
}
?>
<html>
<head>
<title>Free Mail Box</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Mail Box</h1>
<div class="container">
  	<form method="post">
    		<label>To</label><input type="text" name="to">
    		<label>From</label><input type="text"  name="from">	
		<label>Subject</label><input type="text" name="sub">
    		<label>Message</label><textarea  name="message" style="height:200px"></textarea>
    		<input type="submit" name="send" value="Send">
  	</form>
</div>
</body>
</html>

