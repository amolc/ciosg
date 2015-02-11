<div class="footer_links">
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48216053-1', 'cio-choice.sg');
  ga('send', 'pageview');

</script>
											<?php
													//footer
													$footer_query = mysql_query("select * from footer");
													while($footer_res = mysql_fetch_array($footer_query))
													{
														$footer_text = $footer_res['footer_text'];
													}
											?> 
                                            	   <div class="footer_link">
                                                    
                                                        <p><?php echo $footer_text;?></p>
                                                    </div>
												<div style="padding-top:10px; margin-right:5px;">
												<a href="http://www.cxohonour.com"><img width="150px;" src="images/CXO_logo.png" align="right"></a>
													
												</div>
                                            	
</div>