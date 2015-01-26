<?php
ob_start();
session_start();

require_once 'linkedinSdk/linkedin.php';

 $email =  $_GET['email'];
$linkedin = new LinkedIn(array(
	'apiKey' => '75j51j72goh5dd',
	'apiSecret' => 'FWE7aDEfLiYB2PuF',
	'callbackUrl' => 'http://www.cio-choice.sg/linkLogin.php?email='.$email,
));
$token = '';
if (isset($_GET['code'])) {
  
    
   
  // Check to see if our states match
	//if ($_SESSION['state'] == $_GET['state']) {
	  // If alls good the pass the code to the get assess token function; returns (String) accesstoken
	
           
           
            $token = $linkedin->getAccessToken($_GET['code']);
                
              $linkedin->setAccessToken($token);
 
             
                $options = ":(id,first-name,last-name,email-address)";
                $userData = $linkedin->get('/people/~', $options);
                
                                        $registration_email = $userData->emailAddress;
					$registration_name = $userData->firstName;					
					$registration_password = $userData->id; 
                                        
                                        /*  echo "<br>".$registration_email."<br>".$registration_name."<br>".$registration_password;
                                         die();   */
                                        
                                    include('sql_config/database/cio_db.php'); 
					$today_date = mktime(0,0,0,date("m"),date("d"),date("Y"));
					$current_date = date("m/d/Y", $today_date);
                                        
                                        if(!empty($registration_email)){
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
                                                        // header("location:index.php");exit();   
						}
						
							
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
												}
						else 
						{
					
							echo "Error: Your email address is not found in our system. Please confirm if you email address is the same as your Linkedin";
						}
                                            
                                                   
            
    
                
	
} else { 
	// If we do not have an access token, send the user through the authenication process
	if (empty($_SESSION['access_token'])) {
	  // Define the scope for what permissions we need to access the data we want
	  $scope = "r_fullprofile r_emailaddress r_basicprofile  ";
	  
	  // $linkedin->getLoginUrl() will build our url and pass it back to our script
	  $url = $linkedin->getLoginUrl($scope); 
		
      // Redirect the browser to LinkedIn for authenication
	  header("Location: " . $url);        
	}
}



?>
