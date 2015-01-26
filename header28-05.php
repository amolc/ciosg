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
			<?php
			
				$logo_query = mysql_query("select logo_image from logo");
				while($logo_res = mysql_fetch_array($logo_query))
				{
					$logo = $logo_res['logo_image'];
				}
			?>
                <a href="index.php"><img src="admin/upload/<?php echo $logo; ?>" alt="" width="294" height="315"></a>
			</div>
			<div class="phone fr">
				<p style="font-weight: 300"><img src="images/email.png" width="21" height="19">Email: <a href="mailto:contactus@cio-choice.sg"><?php echo $header_email; ?></a></p>
				<p style="margin-top:15px; font-weight: 300"><img src="images/phone.png" width="21" height="19">Telephone: <span class="tel_bold">+65 9668 2895</span></p>
			</div>
			<div class="ict_vendor fr">
				<!-- <a href="http://staging.cio-choice.sg/ict_vendor_landing.php#tab5" target="_self">ICT VENDOR? ENTER NOW</a> -->
				  <?php if($_SESSION['username']){ ?>
                                                          <a href="http://staging.cio-choice.sg/<?php echo $_SESSION['type']?>#tab5" target="_self"  >ICT VENDOR? ENTER NOW</a>
                                                   <?php }else{ ?>
                                                   <a href="http://staging.cio-choice.sg/enter.php" target="_self"  >ICT VENDOR? ENTER NOW</a>
                                                   <?php } ?>
			</div>
	  </div>
  </div>
</div>

 <div id="gray_wrapper"></div>