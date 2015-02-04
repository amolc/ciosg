<? include("index.php")?>
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
													
						</div>
					</div>	
				</div>	
		</div>
		
		<div class="clsCopyright">
			<?php
			
				$footer_query = mysql_query("select * from footer");
				while($footer_res = mysql_fetch_array($footer_query))
				{
					$footer_text = $footer_res['footer_text'];
				}
			?> 
			<p style="float:left"><?php echo $footer_text;?></p>
			
		</div>
		 <div style="margin-top:17px; margin-right:180px;" >
			<img width="200px;" height="50px;" src="images/logo.png" align="right">
		</div>
