<div class="clsFooter">
				<div class="container">
					<div class="clsPadding_cont">
						<div class="row">
							<!--<div class="col-xs-6 col-sm-6">
								<div class="clsFut_menu">
								<ul>
									  <h1><span><img src="images/tab.png"/></span> Site Map</h1>	
									  <li>
									<?php
									include('sql_config/cio_db.php'); 

													//quick contact
													$quick_contact_query = mysql_query("select * from quick_contact");
													while($quick_contact_res = mysql_fetch_array($quick_contact_query))
													{
														$quick_contact_map = $quick_contact_res['quick_contact_map'];
													}
												?> 
                                                    	
														<?php echo $quick_contact_map; ?>
										</li>
									</ul>
								</div>	
							</div>-->
							
							
							
							<div class="col-xs-3 col-sm-3" style="color:#d8d0c1;">
								<div class="clsFut_menu">
									<ul>
									  <h1 style="color:#d8d0c1;"><span><!--<img src="images/tab.png"/>--></span> Links</h1>	
									  <li><a href="http://cio.fountaintechies.com/CXO_HONOUR/" style="color:#d8d0c1;">Home</a></li>
									  <li><a href="http://cio.fountaintechies.com/CXO_HONOUR/about.html" style="color:#d8d0c1;">Privacy Policy</a></li>
									  <li><a href="http://cio.fountaintechies.com/CXO_HONOUR/news.php" style="color:#d8d0c1;">Terms and Conditions</a></li>
									  <li><a href="http://cio.fountaintechies.com/CXO_HONOUR/contact.php" style="color:#d8d0c1;">GET IN TOUCH</a></li>
									 
									</ul>
								</div>				
							</div>
							
							<!--<div class="col-xs-3 col-sm-3">
								<div class="clsFut_menu">
									<ul>	
									  <li><img src="images/logo2.png" width="250px;"/></li>
									</ul>
								</div>				
							</div>-->
						</div>
					</div>	
				</div>	
		</div>
		
		<div class="clsCopyright">
			<p style="float:left">Copyright © 2014 CXO HONOUR Singapore. All Rights Reserved.</p>
			<!--<div class="clsLogo"><img src="images/logo.png"/></div>-->
		</div>
