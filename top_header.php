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
							
					?>	
							<li><a href=""></a></li>
							<a href="<?php echo $type ;?>"><img style="margin-top: 5px;" src="images/register_icon.png" width="12" height="16"><?php echo strtoupper($username); ?></a>
							<a href="javascript:void(0);"  data-toggle="modal"  data-target="#myModal" class="PasswordChange"><img style="margin-top: 5px;" src="images/change_pass_icon.png" width="12" height="16">PASSWORD</a>
						
			
							<?php if($type == 'cio_landing.php')
							{?>
								<a href="cio_logout.php" class="border"><img style="margin-top: 6px;" src="images/login_icon.png" width="12" height="16">LOGOUT</a>
							<?php }else {?>
									<a href="vendor_logout.php" class="border"><img style="margin-top: 6px;" src="images/login_icon.png" width="12" height="16">LOGOUT</a>
							<?php }?>
							

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
	<?php if(!isset($_SESSION['username']))
	{?>
	<div class="social_media fr" style="float:left;margin-left:-312px;">
							<span>
								<a href="" title="" target=""><img src="images/Singapore.png" width="30" height="30"></a>
							</span>
						</div>
	<?php }?>
	  <div class="social_media fr">
		
			<span>
				
				<a href="http://www.linkedin.com/company/cio-choice-singapore/" title="Linkedin" target="_blank"><img src="images/linkedin.png" alt="Linkedin" title="Linkedin" width="30" height="31"></a>
				<a href="https://twitter.com/CIOCHOICE_SG" title="Twitter" target="_blank"><img src="images/twitter.png" width="30" height="31"></a>
				<a href="https://plus.google.com/+CiochoiceSg1/posts" title="Google Plus" target="_blank"><img src="images/google_plus.png" alt="" width="30" height="31"></a>
				<a href="https://www.facebook.com/ciochoice.sg" title="Facebook" target="_blank"><img src="images/facebook.png" width="30" height="31"></a>
				<a href="http://www.youtube.com/user/CIOCHOICEsingapore" title="Youtube" target="_blank" ><img src="images/play.png" width="30" height="31"></a>
				<?php if(isset($_SESSION['username']))
				{?>
				<a href="" title="" target="" style="margin-right:0;"><img src="images/Singapore.png" width="30" height="30"></a>
				<?php }?>
			</span> 
		</div>
	</div>
</div>
<div style="width:100%; height:49px;"></div>

