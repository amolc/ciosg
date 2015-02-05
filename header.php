<?php
$header__query = mysql_query("select * from header");
while($header__res = mysql_fetch_array($header__query))
{
	$header_bg_pic = $header__res['header_bg_image'];
	$header_email = $header__res['header_email'];
	$header_phone = $header__res['header_phone'];
}
?>
 
<div id="shadow_wrapper">
  <div style="background: url(admin/upload/<?php echo $header_bg_pic; ?>) no-repeat center bottom;" id="header_wrapper">
	  <div class="header_container">
			<div class="header_logo fl"> 
			<div class="clsLogo" style="padding:9px -15px 20px;">
			<img width="220px;" src="images/logo3.png">
			</div>			<?php
			
				$logo_query = mysql_query("select logo_image from logo");
				while($logo_res = mysql_fetch_array($logo_query))
				{
					$logo = $logo_res['logo_image'];
				}
			?>
               
			</div>
			<?php
						session_start();
						if(!isset($_SESSION['username']))
						{ ?>
	
			 <ul class="ict_vendor fr" >
			  
             	<li><a href="vendor_login.php" target="_self"> VENDOR LOGIN</a></li>
		<li><a href="cio_login.php" target="_self" > CIO LOGIN</a></li> 												 		
                                                 
			</ul>
			<?php }?>
			<div class="phone fr">
				<p style="font-weight: 300"><img src="images/email.png" width="21" height="19">Email: <a href="mailto:hello@cxohonour.com" style="color:#fff"><?php echo $header_email; ?></a></p>
				<p style="margin-top:15px; font-weight: 300"><img src="images/phone.png" width="21" height="19">Telephone: <span class="tel_bold">+65 9668 2895</span></p>
			</div>
			
				<!-- <a href="http://staging.cio-choice.sg/ict_vendor_landing.php#tab5" target="_self">ICT VENDOR? ENTER NOW</a> -->
				
			
	  </div>
	  
</div>
  </div>

 <div id="gray_wrapper"></div>
