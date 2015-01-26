<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>WebSpeaks.in | Upload images to Facebook</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
html{
	font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
}
.main{
	width:400px;
	margin:auto;
	border:2px solid #0066CC;
	color:#3B5998;
	padding:20px;
	font-size: 11px;
    -moz-border-radius: 4px 4px 4px 4px;
    border-radius: 4px 4px 4px 4px;
    -moz-box-shadow: 1px 1px 0 #d5d5d5;
	background: none repeat scroll 0 0 #F2F2F2;
}
.text{
	color: #777777;
	border: 1px solid #BDC7D8;
	font-size: 11px;
	height: 15px;
}
.post_but {
    background: none repeat scroll 0 0 #EEEEEE;
    border-color: #999999 #999999 #888888;
    border-style: solid;
    border-width: 1px;
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    padding: 2px 6px;
    text-align: center;
    text-decoration: none;
}
a{
	color:#3B5998;
}
</style>
</head>

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'library/facebook.php';
$facebook = new Facebook(array(
	'appId'  => '640514199331406',
	'secret' => 'ef8e51c4d7030d7dd5bc6de3fba37b6a',
	'fileUpload' => true
));


#It can be found at https://developers.facebook.com/tools/access_token/
#Change to your token.
$access_token = 'CAAJGi1VTIk4BAPiCPnYnmxVHiuZC6CyZB2LnSHjmvyIgwH1McmODklowegV96JHFA6K0G7LHxXPATlvhrD4ABiRlEZAraCq1JAf5hsbQ6ycEvMKINBQTT7T68A71jdX3dSV8owl6FGcS5FaoGeIpRWzexyMZAPpBSjlFzZAYg3sl347tZAH3FF92GVxIZBcaHMedgR8prbuRgZDZD';

$params = array('access_token' => $access_token);

#The id of the fanpage
$fanpage = '259233347462505';

#The id of the album
$album_id ='706157212770114.1073741825';

$accounts = $facebook->api('/me/accounts', 'GET', $params);

foreach($accounts['data'] as $account) {
	if( $account['id'] == $fanpage || $account['name'] == $fanpage ){
		$fanpage_token = $account['access_token'];
	}
}


$valid_files = array('image/jpeg', 'image/png', 'image/gif');

if(isset($_FILES) && !empty($_FILES)){
	if( !in_array($_FILES['pic']['type'], $valid_files ) ){
		echo 'Only jpg, png and gif image types are supported!';
	}else{
		$img = realpath($_FILES["pic"]["tmp_name"]);

		$args = array(
			'message' => 'This photo was uploaded via WebSpeaks.in',
			'image' => '@' . $img,
			'aid' => $album_id,
			'no_story' => 1,
			'access_token' => $fanpage_token
		);

		$photo = $facebook->api($album_id . '/photos', 'post', $args);
		if( is_array( $photo ) && !empty( $photo['id'] ) ){
			echo '<p><a target="_blank" href="http://www.facebook.com/photo.php?fbid='.$photo['id'].'">Click here to watch this photo on Facebook.</a></p>';
		}
	}
}

?>
	<div class="main">
		<p>Select a photo to upload on Facebook Fan Page</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<p>Select the image: <input type="file" name="pic" /></p>
		<p><input class="post_but" type="submit" value="Upload to my album" /></p>
		</form>
	</div>

</body>
</html>
