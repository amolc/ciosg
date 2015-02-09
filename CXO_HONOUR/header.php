	<?php
	$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$numSegments = count($segments); 
$currentSegment = $segments[$numSegments - 1];


	?>
	
		<div class="clsTop_bar">
				<div class="container">
					<div class="row">
					<div class="col-md-1">
						<div class="social_media fr">
							<span>
								<a href="" title="" target="" style="margin-right:0;"><img src="images/Singapore.png" width="30" height="30"></a>
							</span>
						</div>
					</div>
						<div class="col-md-7">
							<div class="clsMenu">
								<nav class="navbar navbar-default clsMenu" role="navigation" > 
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
											<?php
												include('sql_config/database/cio_db.php');
													 $menu_query = mysql_query("select * from menu order by menu_order");
													while($menu_res = mysql_fetch_array($menu_query))
													{
														$menu = $menu_res['menu_name'];
														$menu_link = $menu_res['menu_link'];
														$menu_id = $menu_res['menu_id'];
														
														echo '<li><a class="menu_ancher"  href="'.$menu_link.'">'.$menu.'</a>'; 
														
															$menu_query2 = mysql_query("select * from sub_menu where parent_id = '$menu_id'");
															if(mysql_num_rows($menu_query2) > 0)
															{
															echo "<ul>";
																while($menu_res2 = mysql_fetch_array($menu_query2))
																{
																	$menu2 = $menu_res2['sub_name'];
																	$menu_link2 = $menu_res2['sub_link'];
																	
																	echo '<li><a href="'.$menu_link2.'">'.$menu2.'</a></li>';
																	
																}
																echo "</ul>";
															}
														echo "</li>";
													}
											?>																
										  </ul>
									  </div><!-- /.navbar-collapse -->
								  </div><!-- /.container-fluid -->
								</nav>
							</div>	<!--clsMenu-->
						</div>
						<div class="col-md-3">
							<div class="social_media fr">
		
								<span>
									<a href="https://www.linkedin.com/company/cxohonour" title="Linkedin" target="_blank"><img src="images/linkedin.png" alt="Linkedin" title="Linkedin" width="30" height="31"></a>
									<a href="https://twitter.com/cxohonour" title="Twitter" target="_blank"><img src="images/twitter.png" width="30" height="31"></a>
									<a href="https://plus.google.com/+Cxohonour8102014/" title="Google Plus" target="_blank"><img src="images/google_plus.png" alt="" width="30" height="31"></a>
									<a href="https://www.facebook.com/cxohonour?ref=br_tf" title="Facebook" target="_blank"><img src="images/facebook.png" width="30" height="31"></a>
									<a href=" https://www.youtube.com/channel/UCo57R1G9SLKqqXyl_-iScOQ" title="Youtube" target="_blank" ><img src="images/play.png" width="30" height="31"></a>
									<!--<a href="" title="" target="" style="margin-right:0;"><img src="images/ico5.png" width="30" height="30"></a>-->
								</span> 
							</div>
								<?php 
								
									include("geoiploc.php"); // Must include this
									$ip = $_SERVER["REMOTE_ADDR"];
									
									 $country = getCountryFromIP($ip, " NamE ");
									if($country =="Singapore")
									{
										
								?>
									<!--<span><a href=""><img src="images/Singapore.png"  width="30px" height="31px"></a></span>-->
									
								<?php  }elseif($country == 'Indonesia') {?>
									<!--<span><a href=""><img src="images/Indonezia.png"  width="30px" height="31px"></a></span>-->
									
								<?php }elseif($country == 'Malaysia') {?>
									<!--<span><a href=""><img src="images/Malaysia.png"  width="30px" height="31px"></a></span>-->
								<?php }?>
							</div>	<!--clsSocial_menu-->
						</div>
					</div>
				</div>	<!--container-->
			</div>	<!--clsTop_bar-->
