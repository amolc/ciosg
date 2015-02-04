
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
													//quick contact
													$quick_contact_query = mysql_query("select * from quick_contact");
													while($quick_contact_res = mysql_fetch_array($quick_contact_query))
													{
														$quick_contact_email = $quick_contact_res['quick_contact_email'];
														$quick_contact_phone = $quick_contact_res['quick_contact_phone'];
														$quick_contact_address = $quick_contact_res['quick_contact_address'];
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
									<ul style="margin-left:-35px;">
									  <h1 style="color:#d8d0c1;"><span><!--<img src="images/tab.png"/>--></span> Links</h1>	
									  <li style="padding-top:7px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/" style="color:#d8d0c1;">Home</a></li>
									  <li style="padding-top:7px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/about.html" style="color:#d8d0c1;">Privacy Policy</a></li>
									  <li style="padding-top:7px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/news.php" style="color:#d8d0c1;">Terms and Conditions</a></li>
									  <li style="padding-top:7px;"><a href="http://cio.fountaintechies.com/CXO_HONOUR/contact.php" style="color:#d8d0c1;">GET IN TOUCH</a></li>
									 
									</ul>
								</div>				
							</div>
							<div class="col-xs-4 col-sm-4" style="color:#d8d0c1;">
								<div class="clsFut_menu">
                                                    	<ul style="font-family: "Lato";font-size:17px;color:#FFFFFF;">
													 <h1 style="color:#d8d0c1;"><span><!--<img src="images/tab.png"/>--></span>Contact</h1>	
													
													<li style="padding-top:7px;">Email : <a href="mailto:contactus@cio-honour.sg"><?php echo $quick_contact_email; ?></a></li>
													<li style="padding-top:7px;"</li>
													<li style="padding-top:11px;">Telephone : +65 9668 2895</li>
													<li style="padding-top:18px;"></li>
													<li style="padding-top:0px;">Address : <?php echo $quick_contact_address; ?></li>
													
												</ul>
                                                       
								</ul>
								</div>				
							</div>
                         <div class="col-xs-3 col-sm-3" style="color:#d8d0c1;">
							<div class="clsFut_menu" style="margin-left:108px;">                          
                        		
											<?php echo $quick_contact_map; ?> 
													
                       		
						</div>				
							</div>						
						</div>
					</div>	
				</div>	
		</div>
		
		<div class="clsCopyright" style="margin-left:157px;">
			<?php
			
				$footer_query = mysql_query("select * from footer");
				while($footer_res = mysql_fetch_array($footer_query))
				{
					$footer_text = $footer_res['footer_text'];
				}
			?> 
			<p style="float:left"><?php echo $footer_text;?></p>
			
		</div>
		 <div style="margin-top:17px; margin-right:135px;" >
			<img width="200px;" height="50px;" src="images/logo.png" align="right">
		</div>
