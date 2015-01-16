<?php

$goog_user = 'ty0U45v4tzsZDXDl';
$goog_pass = 'vEhiktac6MzizMAP';
$domain = 'your.domain.com';

function checkLast($external){
	//open txt
	$handle = @fopen("lastip.txt", "r+");
	$ip = fgets($handle);
    	
	if ($external != $ip){
		rewind($handle);
		$change = fwrite($handle, $external);
		fclose($handle);
		return true;
	}else{
		fclose($handle);
		return false;		
	}
	
}

function getExternal(){
	$externalContent = file_get_contents('http://checkip.dyndns.com/');
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	return $m[1];
}
	
$external = getExternal();
$ipchanged = checklast($external);

if ($ipchanged){
echo 'yes';
	$url = 'https://' . $goog_user . ':' . $goog_pass . '@domains.google.com/nic/update?hostname=' . $domain . '&myip=' . $external . '';

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt ($ch, CURLOPT_CAINFO, "c:\cacert.pem");

	curl_exec($ch);

	if($errno = curl_errno($ch)) {
		$error_message = curl_strerror($errno);
		echo "cURL error ({$errno}):\n {$error_message}";
	}

	curl_close($ch);
}

?>