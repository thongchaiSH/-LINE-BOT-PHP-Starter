 
<?php
$access_token = 'E/G8MH8HOA8XG2PqnN9DtKDvmt84hOTQjvkiQeERkFgVKIWtqxwBiZfaRC6+onoeUXwXrfxTSxQb6jeLeiht4uOTgi5QbwC4/e3AnksfIbzUQ7S5rFtq43Oojhc3ReXf/M96/KS66kY2+fkYF/OjhwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [
					  [
						'type' => 'image',
						'originalContentUrl' => 'https://www.img.in.th/images/9c34af3b9d49fe333c8dc5e69d6a9314.jpg',
						'previewImageUrl' => 'https://www.img.in.th/images/9c34af3b9d49fe333c8dc5e69d6a9314.jpg',
					  ],
					]
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

