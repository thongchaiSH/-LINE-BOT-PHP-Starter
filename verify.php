<?php
$access_token = 'E/G8MH8HOA8XG2PqnN9DtKDvmt84hOTQjvkiQeERkFgVKIWtqxwBiZfaRC6+onoeUXwXrfxTSxQb6jeLeiht4uOTgi5QbwC4/e3AnksfIbzUQ7S5rFtq43Oojhc3ReXf/M96/KS66kY2+fkYF/OjhwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;