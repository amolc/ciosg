<?php
include_once("inc/facebook.php"); //include facebook SDK
 
######### edit details ##########
$appId = '722676594470286'; //Facebook App ID
$appSecret = 'ffb63402c947172ea0b085cea028ee29'; // Facebook App Secret
$return_url = 'http://www.cio-choice.sg/admin/fbscripter/';  //return url (url to script)
$homeurl = 'http://www.cio-choice.sg/admin/fbscripter/';  //return to home
$fbPermissions = 'publish_stream,publish_actions,user_likes,manage_pages,photo_upload';  //Required facebook permissions
##################################

//Call Facebook API

$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
global $fbuser;
$fbuser = $facebook->getUser();

?>