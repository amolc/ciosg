<?php
    session_start();
	echo $email = $_GET['email'];
	
	
    $config['base_url']             =   'http://www.cio-choice.sg/auth.php?email='.$email.'';
    $config['callback_url']         =   'http://www.cio-choice.sg/demo.php?email='.$email.'';
     // $config['callback_url']         =   'http://staging.cio-choice.sg/advisory_panel.php';
      $config['linkedin_access']      =   '75vpkjynmfidn6';
    $config['linkedin_secret']      =   'JOXmgMgfHkzoiefw';   
	// $config['linkedin_access']      =   '1fc97dd4-06ee-4d20-bad2-7752278f8f59';
    // $config['linkedin_secret']      =   '0a92d6ba-4d9b-40b7-a913-64d093115a51';

    include_once "linkedin.php";
   
    
    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

   if (isset($_REQUEST['oauth_verifier'])){
        $_SESSION['oauth_verifier']     = $_REQUEST['oauth_verifier'];

        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->getAccessToken($_REQUEST['oauth_verifier']);

        $_SESSION['oauth_access_token'] = serialize($linkedin->access_token);
        header("Location: " . $config['callback_url']);
        exit;
   }
   else{
        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->access_token     =   unserialize($_SESSION['oauth_access_token']);
   }


    # You now have a $linkedin->access_token and can make calls on behalf of the current member
    $xml_response = $linkedin->getProfile("~:(id,first-name,last-name,email-address,headline,picture-url)");
// if($xml_response) 
// {
	// echo "nameee".$xml_response->first-name;
// }

					// $response 				= $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url)');
					 $result         		= new SimpleXMLElement($xml_response);
					
					$registration_email = $result->{'email-address'};
					$registration_name = $result->{'first-name'};
					// $registration_email = mysql_real_escape_string($_POST['session_key']);
					// $registration_password = mysql_real_escape_string($_POST['session_password']);
					$registration_password = $result->id; 
          			// $registration_name ="";
          			$registration_type	= "";
          			// $_SESSION['passcode'] 	= $result->id; 
          			// $_SESSION['fname'] 		= $result->{'first-name'};
          			// $_SESSION['lname'] 		= $result->{'last-name'};
					// echo $result->id; 
          			$result->{'first-name'};
          			// echo $result->{'last-name'};
          			  $result->{'email'}; 
          			 
          			 $registration_email; 
          			 $result->{'picture-url'};
          		
					
				    include('sql_config/database/cio_db.php'); 
					$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
					$current_date = date("m/d/Y", $today_date);
					$result1 = mysql_query("SELECT registration_name ,registration_email ,corperate_email,registration_type FROM registration WHERE registration_email = '$registration_email' and registration_status='accepted' and login_type='Linkedin'");
					
					$row1 = mysql_fetch_array($result1);
					
					$row1['registration_email']; 
				
					 $num_rows = mysql_num_rows($result1);
					
					if($num_rows == 0){
						/* fix : issue 1 - linkedin email update if no email is found. */
						
						
						if(isset($email)){
											 	
							
							$update_query = "update registration set registration_email ='$registration_email' , registration_password ='$registration_password' where registration_email ='$email' and registration_status='accepted' and login_type='Linkedin'";
						    mysql_query($update_query)or die(mysql_error());
							
							
						}else{
							
							echo "Sorry, there was a problem to identify your email against our system. Please contact support@cio-choice.sg" ;
						}
						
							
					}
					
					
					$result = mysql_query("SELECT registration_name ,registration_email ,corperate_email,registration_type FROM registration WHERE registration_email = '$registration_email' and registration_status='accepted' and login_type='Linkedin'");
					$row = mysql_fetch_array($result);
					
						if (mysql_num_rows($result) > 0)
						{
									
						
							if($row['registration_type']=='CIO') 
							{
								session_start();
								// store session data
								$_SESSION['username']=$row['registration_email'];
								$_SESSION['user_name']=$row['registration_name'];
								$_SESSION['cio']=$row['registration_type'];
								$_SESSION['type']='cio_landing.php';
								$_SESSION['corperate_email']=$row['corperate_email'];
								header("location:cio_landing.php?action=yes");
							
							}
							else if($row['registration_type']=='ICTVendor') 
							{
								session_start();
								// store session data
								$_SESSION['username']=$row['registration_email'];
								$_SESSION['user_name']=$row['registration_name'];
								$_SESSION['ict']=$row['registration_type'];
								$_SESSION['corperate_email']=$row['corperate_email'];
								$_SESSION['type']='ict_vendor_landing.php';
								header("location:ict_vendor_landing.php?action=yes");
							}
							// session_start();
							// $_SESSION['username'] = $registration_email;
							// $_SESSION['ict'] = "ICTVendor";
							// header("location:ict_vendor_landing.php?action=yes");
							// echo "<h1 style='margin-bottom: 22px;text-align: center;'>Already Email Exit Please Enter New Email</h1>";
						}
						else 
						{
							// mysql_query("update registration set registration_password ='".$registration_password."' where registration_email ='".$registration_email."'");
							// $sql   = "insert into registration(registration_name,registration_email,registration_password,registration_type,registration_insert_date,registration_status) values('".$registration_name."','".$registration_email."','".$registration_password."','".$registration_type."','".$current_date."','pending')";
							// $query = mysql_query($sql);
							 
							// if($query)
							// {
							// echo "inserted";
							// }
							// $_SESSION['username'] = $registration_email;
							// header("location:registration.php?action=yes");
							echo "Error: Your email address is not found in our system. Please confirm if you email address is the same as your Linkedin";
						}

    // echo '<pre>';
    // echo 'My Profile Info';
    // echo $xml_response;
    // echo '<br />';
    // echo '</pre>';


    // $search_response = $linkedin->search("?company-name=facebook&count=10");
    //$search_response = $linkedin->search("?title=software&count=10");

    //echo $search_response;
    // $xml = simplexml_load_string($search_response);

    // echo '<pre>';
    // echo 'Look people who worked in facebook';
    // print_r($xml);
    // echo '</pre>';
?>
