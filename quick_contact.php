<div id="contact_wrapper">
                                           	 
											
		<div class="contact_container" >
											   
						<div class="contact_detail fl" style="width:200px;">
											
												<ul style="font-family: "Lato";font-size:17px;">
													<p>Links</p>
													<br /><br />
													<li style="padding-top:7px;"><a href="http://cio.fountaintechies.com" style="text-decoration:none;">Home</a></li>
													<li style="padding-top:7px;"><a href="http://cio.fountaintechies.com" style="text-decoration:none;">About</a></li>
													<li style="padding-top:7px;"><a href="" style="text-decoration:none;">Advisory Panel</a></li>
													<li style="padding-top:7px;"><a href="" style="text-decoration:none;">Events</a></li>
													<li style="padding-top:7px;"><a href="" style="text-decoration:none;">Awards</a></li>
													
												</ul>
						</div>

                        <div class="contact_detail fl" style="width:350px;">
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
                                                    	
                                                       <p style="font-size:17px;"><b>
													   		Contact:
															<br /><br />
                                                        	Email : <a href="mailto:contactus@cio-honour.sg"><?php echo $quick_contact_email; ?></a><br>
															<br />
                                                            Telephone : +65 9668 2895<br>
                                                             <br />
                                                        	Address : <?php echo $quick_contact_address; ?>
                                                        </b></p>
						</div>
                                                   
                        <div class="contact_detail fl" style="width:350px;">
											<?php echo $quick_contact_map; ?> 
													
                        </div>
                        
         </div>
											
											  
</div>
