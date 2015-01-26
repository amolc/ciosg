
  <html>
  <head></head>
  <body>
<h2>developera</h2>
<?php
require_once("facebook-php-sdk/src/facebook.php");

  $config = array(
      'appId' => '640514199331406',
      'secret' => 'ef8e51c4d7030d7dd5bc6de3fba37b6a',
	  'fileUpload' => true,
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
  $photo = 'Tulips.jpg'; // Path to the photo on the local filesystem
  $message = 'Photo upload via the PHP SDK!';

   /* if($user_id) { 

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }*/

    if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        // Upload to a user's profile. The photo will be in the
        // first album in the profile. You can also upload to png  
        // a specific album by using /ALBUM_ID as the path 
        $ret_obj = $facebook->api('/me/albums', 'POST', array(
                                         'source' => new CURLFile($photo, 'image/jpg'),
                                         'message' => $message,
                                         )
                                      );
        echo '<pre>Photo ID: ' . $ret_obj['message'] . '</pre>';
        echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'photo_upload'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      // To upload a photo to a user's wall, we need photo_upload  permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'photo_upload') );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  

  ?>

  </body>
</html>
  