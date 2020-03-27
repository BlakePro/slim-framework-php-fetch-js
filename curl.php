<?php
error_reporting(E_ALL);
$url = 'https://api.tenor.com/v1/search?key=1';

//VIA CURL TERMINAL
$api = shell_exec("curl $url");
echo $api;

//VIA PHP CURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
echo  curl_exec($ch);
//print curl_error($ch);
curl_close($ch);
