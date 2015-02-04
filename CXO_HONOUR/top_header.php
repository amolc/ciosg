<div id="top_wrapper">
	<div class="top_container">
	<div class="top_login fl" style="margin-left:5px; background:black; color:white;" >
					<?php
						session_start();
						if(isset($_SESSION['username']))
						{ 
							$username = $_SESSION['firstname']." ".$_SESSION['lastname'];
							if(isset($_SESSION['username']))
						{ 
							$type = $_SESSION['type'];
						}
							// $result = mysql_query("SELECT registration_type FROM registration WHERE registration_name = '$username' and registration_status='accepted'");
						// $row = mysql_fetch_array($result);
						// if($row['registration_type'] == 'ICTVendor')
						// {
							// $type = 'ict_vendor_landing.php';
						// }
						// else 
						// {
							// $type = 'cio_landing.php';
						// }
					?>	
							<li><a href=""></a></li>
							<a href="<?php echo $type ;?>"><img style="margin-top: 5px;" src="images/register_icon.png" width="12" height="16"><?php echo strtoupper($username); ?></a>
							<a href="javascript:void(0);"  data-toggle="modal"  data-target="#myModal" class="PasswordChange"><img style="margin-top: 5px;" src="images/change_pass_icon.png" width="12" height="16">PASSWORD</a>
						
			
							
							<a href="logout.php" class="border"><img style="margin-top: 6px;" src="images/login_icon.png" width="12" height="16">LOGOUT</a>
							

					<?php
						}
						else
						{
					?>
						
							
						
							<!--<a href="login.php"><img style="margin-top: 6px;" src="images/login_icon.png" width="12" height="16">LOGIN</a>
							<a href="registration.php" class="border"><img style="margin-top: 5px;" src="images/register_icon.png" width="12" height="16">REGISTER</a>-->
					<?php

						}
					?>
	
	  
	
	</div>
	<div class="top_login fl" style="margin-left:5px; background:#d8bd3b; color:white;">
					<?php
						session_start();
						if(isset($_SESSION['username']))
						{ 
							$username = $_SESSION['firstname']." ".$_SESSION['lastname'];
							if(isset($_SESSION['username']))
						{ 
							$type = $_SESSION['type'];
						}
							// $result = mysql_query("SELECT registration_type FROM registration WHERE registration_name = '$username' and registration_status='accepted'");
						// $row = mysql_fetch_array($result);
						// if($row['registration_type'] == 'ICTVendor')
						// {
							// $type = 'ict_vendor_landing.php';
						// }
						// else 
						// {
							// $type = 'cio_landing.php';
						// }
					?>	
							<li><a href=""></a></li>
							<a href="<?php echo $type ;?>"><img style="margin-top: 5px;" src="images/register_icon.png" width="12" height="16"><?php echo strtoupper($username); ?></a>
							<a href="javascript:void(0);"  data-toggle="modal"  data-target="#myModal" class="PasswordChange"><img style="margin-top: 5px;" src="images/change_pass_icon.png" width="12" height="16">PASSWORD</a>
						
			
							
							<a href="logout.php" class="border"><img style="margin-top: 6px;" src="images/login_icon.png" width="12" height="16">LOGOUT</a>
							

					<?php
						}
						else
						{
					?>
						
							
						
							<!--<a href="login.php"><img style="margin-top: 6px;" src="images/login_icon.png" width="12" height="16">LOGIN</a>
							<a href="registration.php" class="border"><img style="margin-top: 5px;" src="images/register_icon.png" width="12" height="16">REGISTER</a>-->
					<?php

						}
					?>
	
	  
	
	</div>
	  <div class="social_media fr">
		
			<span>
				<a href="http://www.linkedin.com/company/cio-choice-singapore/" title="Linkedin" target="_blank"><img src="images/linkedin-icon.png" alt="Linkedin" title="Linkedin" width="30" height="31"></a>
				<a href="https://twitter.com/CIOCHOICE_SG" title="Twitter" target="_blank"><img src="images/ico2.png" width="30" height="31"></a>
				<a href="https://plus.google.com/+CiochoiceSg1/posts" title="Google Plus" target="_blank"><img src="images/ico3.png" alt="" width="30" height="31"></a>
				<a href="https://www.facebook.com/ciochoice.sg" title="Facebook" target="_blank"><img src="images/ico1.png" width="30" height="31"></a>
				<a href="http://www.youtube.com/user/CIOCHOICEsingapore" title="Youtube" target="_blank" ><img src="images/ico4.png" width="30" height="31"></a>
				<a href="" title="" target="" style="margin-right:0;"><img src="images/ico5.png" width="30" height="30"></a>
			</span> 
		</div>
	</div>
</div>
<div style="width:100%; height:49px;"></div>

