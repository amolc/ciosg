<?php

// Fill the keys and secrets you retrieved after registering your app
$oauth = new OAuth("abcd123456", "efgh987654");
$oauth->setToken("abcd1234-efgh987-9988", "9876abcd-123asdf-1122");
 
$params = array();
$headers = array();
$method = OAUTH_HTTP_METHOD_GET;
  
// Specify LinkedIn API endpoint to retrieve your own profile
$url = "http://api.linkedin.com/v1/people/~";
 
// By default, the LinkedIn API responses are in XML format. If you prefer JSON, simply specify the format in your call
// $url = "http://api.linkedin.com/v1/people/~?format=json";
 
// Make call to LinkedIn to retrieve your own profile
$oauth->fetch($url, $params, $method, $headers);
  
echo $oauth->getLastResponse();
?>