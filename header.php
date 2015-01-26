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
			 <div class="ict_vendor fr" style="float:left; left: 522px;;">
			  <?php if($_SESSION['username']){ ?>
                                                 <!--         <a href="http://www.cio-choice.sg/<?php// echo $_SESSION['type']?>#tab5" target="_self"  >ICT VENDOR? ENTER NOW</a>-->
														   <a href="vendor_registration.php"  >ICT VENDOR? ENTER NOW</a>
														   <br /> <br />
														  <!--     <a href="cio_registration.php"  >ICT CIO? ENTER NOW</a>-->
                                                   <?php }else{ ?>
                                                 <a href="vendor_registration.php" target="_self"  > VENDOR LOGIN</a>
												 
                                                   <?php } ?>
			</div>
 			 <div class="ict_vendor fr" style="left: 745px; padding-left: unset;">
			  <a href="cio_registration.php" target="_self" > CIO LOGIN</a> 
			 </div>
			<div class="phone fr">
				<p style="font-weight: 300"><img src="images/email.png" width="21" height="19">Email: <a href="mailto:contactus@cio-choice.sg"><?php echo $header_email; ?></a></p>
				<p style="margin-top:15px; font-weight: 300"><img src="images/phone.png" width="21" height="19">Telephone: <span class="tel_bold">+65 9668 2895</span></p>
			</div>
			
				<!-- <a href="http://staging.cio-choice.sg/ict_vendor_landing.php#tab5" target="_self">ICT VENDOR? ENTER NOW</a> -->
				
			
	  </div>
	  
</div>
  </div>

 <div id="gray_wrapper"></div>
