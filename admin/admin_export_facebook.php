<?php 

	session_start();
	include('../sql_config/database/cio_db.php'); 
	require_once("include/facebook/facebook.php");
		$admin = $_SESSION['admin'];
		$id = $_REQUEST['id'];
    $page_id = $_REQUEST['page_id']  ; 

		 $res = mysql_query("select * from events where event_id = '$id'")or die (mysql_error());
		 $row = mysql_fetch_array($res);
$fbPermissions ="public_profile,photo_upload,manage_pages";
                
     $config = array(
	     'appId' => '722676594470286',//462044317259506
	    'secret' => 'ffb63402c947172ea0b085cea028ee29',//b2a70ea1e698df9651069477f42233b6
	    'scope' => $fbPermissions,
	    'fileUpload' => true,
	     'cookie' => true,
	    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );



  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
  $fbPage =    $facebook->api('me/accounts?until&type=pages');
 
  ?>
  <?php 
     if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        
            $params = $facebook->getAccessToken();
            $params = array('access_token' => $params);
            
            $pageDetail = $facebook->api("/me?fields=accounts");          
            $pageArray  = $pageDetail['accounts']['data'];

            $newPageAccessToken = '';
            foreach($pageArray as $rows)
            {
                if($page_id == $rows['id'] )
                {
                    $newPageAccessToken = $rows['access_token'];
                }
            }
        //echo $newPageAccessToken;
        //echo '<br>'.$page_id;
      
        
         //$access_token = $facebook->getAccessToken();
        // echo '<br>'.$access_token; die();
      
         
         $facebook->setAccessToken($newPageAccessToken);
 
        $facebook->setFileUploadSupport(true);
        
        //Create an album
        $album_details = array(
                'message'=>$row['event_name'],
                'name'=> $row['event_name'] //should be unique each time
        );
        
     
        //$create_album = $facebook->api('/me/albums', 'post', $album_details);       
       
        $create_album = $facebook->api('/'.$page_id.'/albums', 'POST', $album_details);
        
         
          
 
        //$facebook->setAccessToken($access_token);
        
    $accounts = $facebook->api('/me/accounts', 'GET', $params);
 
    
foreach($accounts['data'] as $account) {
        if( $account['id'] == $page_id || $account['name'] == $page_id ){
                $fanpage_token = $account['access_token'];
        }
}
//echo $fanpage_token.'<br>';
         $facebook->setFileUploadSupport(true);
                if(!empty($create_album)){
                    
                       $query1 = mysql_query("select * from event_fb_images where event_id='".$id."'");
         $album_uid = $create_album['id']; 
      
         while($res1 = mysql_fetch_array($query1)){
         	 $fb_image = $res1['event_fb_pic']; 
         	 if (!empty($fb_image)) {
                     
                      $img = realpath('user_data/'.$fb_image);
 
                $photo_details = array(
                        'message' => 'Event',
                        'image' => '@' .$img,
                        'aid' => $album_uid,
                        'no_story' => 0,
                        'access_token' => $fanpage_token
                );
                 //$caccid = $facebook->api('/'.$album_uid);
                //echo"<pre>";
               //print_r($caccid); die();
                //$photo_details['image'] = '@' . realpath('user_data/'.$fb_image);
         	// $upload_photo = $facebook->api('/'.$page_id.'/' . $album_uid . '/photos', 'post', $photo_details);
                 $photo = $facebook->api($album_uid . '/photos', 'post', $photo_details); 
                
                //echo"<pre>";
                //print_r($upload_photo);
                 //$photo = $facebook->api($album_uid . '/photos', 'post', $args);
                
         	 }
         }
                
        
        echo "Event's Name: ".$row['event_name'] ;
        echo '<br/>';
        echo '<br/>';
        echo "Name's Album : ".$row['event_name'];
        //echo "Name's Album : ".str_replace(' ', '_', $row['event_name']);
                }  else {
                    echo "Try again.";
                }
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      header('Location: '.$login_url);
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }

  ?>
