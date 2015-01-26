<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Tourbooking.co" />
	<meta name="author" content="Laborator.co" />
	
	<title>cio-choice.sg</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="include/resource/css/custom.css"  id="style-resource-6">

	<script src="include/resource/js/jquery-1.10.2.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>

<?php
				 include('../sql_config/database/cio_db.php');  
				if(isset($_POST['send_email']))
				{
					$email = $_POST['email'];
					echo $email; 
					
					$sql = mysql_query("select password,email from admin where email = '$email'")or die(mysql_error());					
					$row = mysql_fetch_array($sql);
			
					if($row['email'] == $email)
					{
					$password = $row['password'];	
					
					$to = $email;
					$subject = "Forgot Password"; 
					$message = "Your password is '".$password."'"; 
									
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= 'To: '.$email.'' . "\r\n";
					$headers .= 'From: apache@iamamol.com' . "\r\n";

					$mail_sent = mail( $to, $subject, $message, $headers );
					
					header("Location:index_pass.php?sent=ok");
					//echo $mail_sent ? " Your Tour Detail Sent To Your Inbox" : "Mail failed";
					}
					else
					{
						header("Location:index_pass.php?error=ok");
					} 
					
				
				}
			
			?>


<body class="page-body login-page login-form-fall">

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="index.php" class="logo">
				<h1 style="color:#fff;">cio-choice.sg</h1>
			</a>
			
			<p class="description">We will send your password detail to your given email.</p>
			
			<?php
			if(isset($_REQUEST['sent']))
			{
			echo '<h3 style="color:green;">Email has been sent.....</h3>';
			}
			if(isset($_REQUEST['error']))
			{
			echo '<h3 style="color:red;">Email You enterd is Invalid !!</h3>';
			}
			?>
			<!-- progress bar indicator -->
			
		</div>
		
	</div>
	
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form method="post" role="form" action="<?php $_server['PHP_SELF']?>" >
				
				<div class="form-group">
					<div class="form-group">
						<h3 style="color:#fff;" class="mesg"></h3>
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-mail"></i>
						</div>
						
						<input type="text" name="email" class="form-control" placeholder="E-Mail" autocomplete="off" />
					</div>
					
				</div>
				
				
				
				<div class="form-group">
					<button type="submit"  name="send_email" class="btn btn-primary btn-block btn-login">
						Send Email
						<i class="entypo-mail"></i>
					</button>
				</div>
				
			</form>
					
		
			
		</div>
		
	</div>
	
</div>


	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/jquery.validate.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-login.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-10"></script>
	<script type="text/javascript">
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>
	
</body>
</html>