<div id="contact_wrapper">
                                           	 
											
		<div class="contact_container" >
											   
						<div class="contact_detail fl" style="width:27%;">
											
												<ul style="font-family: "Lato";font-size:17px;">
													<p>Links</p>
													<br /><br />
													<li style="padding-top:7px;"><a href="index.php" style="text-decoration:none;">Home</a></li>
													<li style="padding-top:7px;"><a href="cio_choice_overview.php" style="text-decoration:none;">About</a></li>
													<li style="padding-top:7px;"><a href="advisory_panel.php" style="text-decoration:none;">Advisory Panel</a></li>
													<li style="padding-top:7px;"><a href="events.php" style="text-decoration:none;">Events</a></li>
													<li style="padding-top:7px;"><a href="awards.php" style="text-decoration:none;">Awards</a></li>
													
												</ul>
						</div>

                        <div class="contact_detail fl" >
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
                                                    	<ul style="font-family: "Lato";font-size:17px;color:#FFFFFF;">
													<p>Contact:</p>
													<br /><br />
													<li style="padding-top:7px;"><p>Email : <a href="mailto:contactus@cio-honour.sg"><?php echo $quick_contact_email; ?></a></p></li>
													<li style="padding-top:7px;"</li>
													<li style="padding-top:11px;"><p>Telephone : +65 9668 2895</p></li>
													<li style="padding-top:18px;"></li>
													<li style="padding-top:17px;"><p>Address : <?php echo $quick_contact_address; ?></p></li>
													
												</ul>
                                                       
						</div>
                                                   
                        <div class="contact_detail fl" style="style="width:40%;padding-top:10px">
											<?php echo $quick_contact_map; ?> 
													
                        </div>
                        
         </div>
											
											  
</div>
