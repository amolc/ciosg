<div id="contact_wrapper">
                                           	  <div class="contact_container">
                                               	<div class="contact_detail fl">
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
                                                    	<h1>Quick Contact details </h1>
                                                        <p>
                                                        	Email: <a href="mailto:contactus@cio-choice.sg"><?php echo $quick_contact_email; ?></a><br>
															<br>
                                                            Telephone: +65 9668 2895<br>
                                                            <br>
                                                        Address: <?php echo $quick_contact_address; ?>
                                                        </p>
                                                    </div>
                                                    
                                                    	<div class="contact_detail_map fr">
															<?php echo $quick_contact_map; ?>
                                                      	</div>
                                                    
                                              </div>
											  
											  <div id="footer_wrapper">
                                            	<div class="footer_social_media">
                                                	<div class="social_media fl" style="width:200px; margin-top:30px;">
                                                    <span class="fl">
                                                      <a href="http://www.linkedin.com/company/cio-choice-singapore/" title="Linkedin" target="_blank"><img src="images/linkedin.png" alt="Linkedin" title="Linkedin" width="30" height="31"></a>
                                                      <a href="https://twitter.com/CIOCHOICE_SG" title="Twitter" target="_blank"><img src="images/twitter.png" width="30" height="31"></a>
                                                      <a href="https://plus.google.com/+CiochoiceSg1/posts" title="Google Plus" target="_blank"><img src="images/google_plus.png" alt="" width="30" height="31"></a>
                                                      <a href="https://www.facebook.com/ciochoice.sg" title="Facebook" target="_blank"><img src="images/facebook.png" width="30" height="31"></a>
                                                      <a href="http://www.youtube.com/user/CIOCHOICEsingapore" title="Youtube" target="_blank"><img src="images/play.png" width="30" height="31"></a>
                                                  </span> 
                                            </div>
                                            	
                                                <div class="become_partner fr">
                                                	<a href="/contact_us.php" class="partner">BECOME A PARTNER</a>
                                                        <?php if($_SESSION['username']){ ?>
                                                          <a href="http://staging.cio-choice.sg/<?php echo $_SESSION['type']?>#tab5" target="_self" class="ict" >ICT VENDOR? ENTER NOW</a>
                                                   <?php }else{ ?>
                                                   <a href="http://staging.cio-choice.sg/enter.php" target="_self" class="ict" >ICT VENDOR? ENTER NOW</a>
                                                   <?php } ?>
                                
                                                </div>
                                                </div>
                                            </div>
											</div>