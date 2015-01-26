	<?php
	$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$numSegments = count($segments); 
$currentSegment = $segments[$numSegments - 1];


	?>
		<div class="clsTop_bar">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="clsMenu">
								<nav class="navbar navbar-default clsMenu" role="navigation">
								  <div class="container-fluid">
									<!-- Brand and toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										  <span class="sr-only">Toggle navigation</span>
										  <span class="icon-bar"></span>
										  <span class="icon-bar"></span>
										  <span class="icon-bar"></span>
										</button>
									  </div>
									  <div id="navbar" class="navbar-collapse collapse">
										  <ul class="nav navbar-nav navbar-left">
											<li <?php if($currentSegment == 'CXO_HONOUR') { ?>class="active"<?php }?>><a href="http://cio.fountaintechies.com/CXO_HONOUR/">HOME</a></li>
											<li <?php if($currentSegment == 'about.php') { ?>class="active"<?php }?>><a href="http://cio.fountaintechies.com/CXO_HONOUR/about.php">ABOUT US</a></li>
											<li <?php if($currentSegment == 'news_page.php') { ?>class="active"<?php }?>><a href="http://cio.fountaintechies.com/CXO_HONOUR/news_page.php">NEWS</a></li>	
											<li <?php if($currentSegment == 'contact.php') { ?>class="active"<?php }?>><a href="http://cio.fountaintechies.com/CXO_HONOUR/contact.php">CONTACT US</a></li>															
										  </ul>
									  </div><!-- /.navbar-collapse -->
								  </div><!-- /.container-fluid -->
								</nav>
							</div>	<!--clsMenu-->
						</div>
						<div class="col-md-4">
							<div class="clsSocial_menu pull-right">
								<span><a href=""><img src="images/ico1.png"  width="26px" height="27px"></a></span>
								<span><a href=""><img src="images/ico2.png"  width="26px" height="27px"></a></span>
								<span><a href=""><img src="images/ico3.png"  width="26px" height="27px"></a></span>
								<span><a href=""><img src="images/ico4.png"  width="26px" height="27px"></a></span>
								<span><a href=""><img src="images/linkedin-icon.png" width="30px" height="31px"></a></span>
								<?php 
								
									include("geoiploc.php"); // Must include this
									$ip = $_SERVER["REMOTE_ADDR"];
									
									 $country = getCountryFromIP($ip, " NamE ");
									if($country =="Singapore")
									{
										
								?>
									<span><a href=""><img src="images/Singapore.png"  width="30px" height="31px"></a></span>
									
								<?php  }elseif($country == 'Indonesia') {?>
									<span><a href=""><img src="images/Indonezia.png"  width="30px" height="31px"></a></span>
									
								<?php }elseif($country == 'Malaysia') {?>
									<span><a href=""><img src="images/Malaysia.png"  width="30px" height="31px"></a></span>
								<?php }?>
							</div>	<!--clsSocial_menu-->
						</div>
					</div>
				</div>	<!--container-->
			</div>	<!--clsTop_bar-->
