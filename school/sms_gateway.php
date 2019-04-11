 <?php
 /*
	$username = "Digitalcoorg"; 
	 $pass = "9481030162"; 
	 $priority = "ndnd";
	 $stype = "normal";
	 $sms_url = "http://trans.smsfresh.co/api/sendmsg.php?user=$username&pass=$pass&sender=$approved_senderid&phone=$mob_number&text=$sms&priority=$priority&stype=$stype";
	 
	 
	 $ch=curl_init();
	 curl_setopt($ch,CURLOPT_URL,$sms_url);
	 curl_setopt($ch, CURLOPT_POST, 1);
	 curl_setopt($ch,CURLOPT_POSTFIELDS,1);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($ch,CURLOPT_TIMEOUT, '3');
	 $content = trim(curl_exec($ch));
	 curl_close($ch);
	*/
	$username ="ma.musthafa6@gmail.com";
	$password ="ajmal524";
	$enc_msg= rawurlencode($message); // Encoded message
	$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
	$ch = curl_init($fullapiurl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); 
	curl_close($ch);
	echo "<p>SMS Request Sent - Message id </p>";	
	 
	 
	 ?>