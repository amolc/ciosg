<?php
include('sql_config/database/cio_db.php'); 

function oauth_session_exists() {
  if((is_array($_SESSION)) && (array_key_exists('oauth', $_SESSION))) {
    return TRUE;
  } else {
    return FALSE;
  }
}

if($_POST['register']){

	$fname 		= mysql_real_escape_string($_POST['fname']);
	$lname 		= mysql_real_escape_string($_POST['lname']);
	$email 		= mysql_real_escape_string($_POST['email']);	
	$passcode	= mysql_real_escape_string($_POST['passcode']);
	$loginwith	= mysql_real_escape_string($_POST['loginwith']);
	$status 	= 'active';
	
	$mysql = mysql_query("insert into registration set	registration_name	=	'".$fname."', 
													registration_email		=	'".$email."',
													registration_password	=	'".$passcode."',
													registration_type	=	'".$loginwith."',
													registration_status		= 	'".$status."'");
	
	header('Location:myaccount.php');
}

/* Login With Linked in */

include("linkedin/linkedin_function.php");


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Login System</title>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="content">
	<div class="login_left">
		<span class="linkedin">
			<?php
				if($_GET['login']=='linkedin'){
				
				$_SESSION['oauth']['linkedin']['authorized'] = (isset($_SESSION['oauth']['linkedin']['authorized'])) ? $_SESSION['oauth']['linkedin']['authorized'] : FALSE;
			         	if($_SESSION['oauth']['linkedin']['authorized'] === TRUE) {
			         		$OBJ_linkedin = new LinkedIn($API_CONFIG);
			           		$OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
			         		$OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
			         	}
         	
         	
					$response 				= $OBJ_linkedin->profile('~:(id,first-name,last-name,picture-url)');
					$result         		= new SimpleXMLElement($response['linkedin']);
          			$_SESSION['passcode'] 	= $result->id; 
          			$_SESSION['fname'] 		= $result->{'first-name'};
          			$_SESSION['lname'] 		= $result->{'last-name'};
          			
          			$loginwith = 'LinkedIn';
				}
            ?>
        <form id="linkedin_connect_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="hidden" name="<?php echo LINKEDIN::_GET_TYPE;?>" id="<?php echo LINKEDIN::_GET_TYPE;?>" value="initiate" />
        <input type="submit" value="Connect to LinkedIn" name="linkedin" />
        </form>
	</span> <br/>
	</div>
	
	<form method="POST" action="?register=true">
	<div class="login_right">
		<label>First Name</label> <span class="txtbox"> <input type="text" name="fname" class="input_box" placeholder="Enter First Name" autocomplete="off" required value="<?php print $_SESSION['fname']?>"> </span>
		<label>Last Name</label> <span class="txtbox"> <input type="text" name="lname" class="input_box" placeholder="Enter Last Name" autocomplete="off" required value="<?php print $_SESSION['lname']?>"> </span>
		<label>Email</label>     <span class="txtbox"> <input type="email" name="email" class="input_box" placeholder="Enter Email Address" autocomplete="off" required></span>
		<?php if($_GET['login']!= 'linkedin'){ ?>
		<label>Password</label>  <span class="txtbox"> <input type="password" name="password" class="input_box" placeholder="Enter Password" required></span>
		<?php } ?>
		<input type="text" name="passcode" value="<?php print $_SESSION['passcode']?>"></span>
		<input type="text" name="loginwith" value="<?php print $loginwith?>"></span>
		
		<div class="submit_box"><input type="submit" value="Submit" name="register"> </div>
	<div>
	</form>
</div>

</body>
</html>