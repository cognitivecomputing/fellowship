<?php
	// Fellowship Channel Telegram Bot
	// Control the broadcast message of a Fellowship Administrative Telegram bot
	// Channel chat_id is : @FellowshipChannel
	// Bot Token is : 172691706:AAExvitPuvYGRBiKBsNc9738zh2YcN4MsOc
	$botToken = "172691706:AAExvitPuvYGRBiKBsNc9738zh2YcN4MsOc";
	$botURL = "https://api.telegram.org/bot".$botToken."/sendMessage";
  
  	// set up the message to be broadcast
	// $inspiration->text should come from database ....
  	$inspiration = new stdClass();
	$inspiration->chat_id = '@FellowshipChannel';
	$inspiration->text = 'PHP Testing .... Phillipians 4:13 I can do this through him who gives me strength';
	
	// Telegram API requires messages to be JSON encoded
	$json_inspiration = json_encode($inspiration);
	
	// Create an http stream
	$opts = array(
		'http'=>array(
			'protocol_version' => 1.1,
			'user_agent' => 'FellowshipBot',
			'method'=>"POST",
			'header'=>"Content-type: application/json\r\n".
                              "Connection: close\r\n" .
                              "Content-length: " . strlen($json_inspiration) . "\r\n",
        	'content'=> $json_inspiration
		)
	);
	
	// Create the HTTP stream context
	$context = stream_context_create($opts);
	
	// Open the file using the HTTP stream context
	$file = file_get_contents($botURL, false, $context);
?>