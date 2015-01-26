			<?php
													session_start();
													require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
													 
													$twitteruser = "CIOCHOICE_SG";
													$notweets = 10;
													$consumerkey = "2tyTuWygMyihibQqjuqiQ";
													$consumersecret = "mx6v0Bkd9owx9yrt9NolznoE2LGVX7K8ljlymmUeVc";
													$accesstoken = "80256651-VvqDj1EDmY5T4yyM6WLL5NO6GxJ3rE6VGBPAgCzHE";
													$accesstokensecret = "G9fVKJe0H2q8LcUIQtnaPPHS7SyrxgD4FjWqjV9TEI7Ma";
													 
													function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
													  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
													  return $connection;
													} 
													 
													$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
													 
													$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
													 
													echo json_encode($tweets);
													// echo $tweets;
													?>