<?php

# arvin castro, arvin@codecri.me
# http://codecri.me/case/411/how-to-create-an-album-and-upload-a-photo-on-a-facebook-user-fan-page-profile-in-php
# April 6, 2011
 
header('content-type: text/plain');

$profile_id   = '640514199331406';
$access_token = 'ef8e51c4d7030d7dd5bc6de3fba37b6a';

$create_album = true;
$album_name   = 'developer';
$album_caption= 'This is the album caption.';

if($create_album) {
	# Create a new album
	$data = array();
	$data['post'] = array(
		'access_token' => $access_token,
		'name' => $album_name,
		'message' => $album_caption,
	);
	$response = xhttp::fetch("https://graph.facebook.com/{$profile_id}/albums", $data);

	$var = json_decode($response['body'], true);
	$album_id = $var['id'];
	
} else {
	# Specify an album ID here:
	$album_id = $profile_id;
	# When using the profile_id, a unique album for the application will be created if it does not exist already
}

# To upload multiple photos, you can start a loop here
# foreach($photos as $photo_source) {

$photo_caption = 'This is the photo caption.';
$photo_source  = 'http://a4.sphotos.ak.fbcdn.net/hphotos-ak-snc6/180136_501228456723_684586723_6353111_4438738_n.jpg';
$no_story = 1;

# Upload a photo to the newly created album
$data = array();
$data['post'] = array(
	'access_token' => $access_token,
	'message' => $photo_caption,
	'no_story' => $no_story,
	);
$data['files'] = array(
	'source' => $photo_source,
	);
$response = xhttp::fetch("https://graph.facebook.com/{$album_id}/photos", $data);

$var = json_decode($response['body'], true);
$photo_id = $var['id'];

# Optionally, retrieve the details for the new photo
$response = xhttp::fetch("https://graph.facebook.com/{$photo_id}");
$photo = json_decode($response['body'], true);

print_r($photo);

?>
