<?php

$consumerKey = "KCwKB1BJQM58QFlpRgDTld3V6Kvix2tGw5JKD8evREOhPtAg";
$consumerSecret = "3xkCENIEuT6iizxFlaQebrORzU3Ub6PGuCj2w1FocuSYUtGdQ0vZh2gK38X48v5x";
$access_token_url = '';
$headers = ['Content-Type:application/json; charset-utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD,$consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
echo $access_token = $result->$access_token;
curl_close($curl);  