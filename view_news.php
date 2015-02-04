
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>
    
	<script type="text/javascript">
    $(document).ready( function() {
	//alert('developer');
      $('#tab-container').easytabs();
    });
    </script> 
		<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "66f4fd4a-f716-4744-b336-7d26381fd2d2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

</head>

<body>
                                   
												<?php
												
													include('sql_config/database/cio_db.php'); 
													include('top_header.php');
													include('header.php');
													
														// $result = mysql_query("SELECT * FROM news");
												$total_news = mysql_query("select count(1) FROM news");
												$total_row = mysql_fetch_array($total_news);

												$total = $total_row[0];
												// echo "Total rows: " . $total;

 													function check_input($value)
                                                            {
                                                            // Stripslashes
                                                            if (get_magic_quotes_gpc())
                                                              {
                                                              $value = stripslashes($value);
                                                              }
                                                            // Quote if not a number
                                                            if (!is_numeric($value))
                                                              {
                                                              $value = "'" . mysql_real_escape_string($value) . "'";
                                                              }
                                                            return $value;
                                                            }
												
													
													$id = check_input($_REQUEST['id']);
													$result = mysql_query("SELECT * FROM news WHERE news_id=$id");
													$row = mysql_fetch_array($result);	
												?>
                                        
                                         
                                                                                
                                  
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                                <div class="news_container mrgn_top" style="height:auto;">
                                                  <div class="overview_left fl">
                                                  	<div class="about fl">
                                                    	<h1>NEWS</h1>
                                                        <h1 style="background: none;"><a style="font-size: 24px;font-weight: bold;" id="total_news" href="news.php">2014 &nbsp;( <?php echo $total;?> )</a></h1>
														 <?php
															
															$result2 = mysql_query("SELECT * FROM news limit 7 ");
															while($row2 = mysql_fetch_array($result2)){
															$title = $row2['news_title'];
																if (strlen($title) > 25) 
																{
																	$stringCut = substr($title, 0, 25);
																	$title = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
																}
															
																echo '<a style="line-height:22px;" href="/view_news.php?id='.$row2['news_id'].'">'.$title.'</a>';
															}
														?>
                                                        
                                                        
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="singapore_news_right fr">
                                               	    <div class="singapore_news fl">
                                                        	<h1>CIO HONOUR Singapore News</h1>
															 	<div  style="width: 40%;" class="latest_news">
																	<a href="#" class="active">News</a>
																	<span style="float:left;">></span>
																	<a href="#">
																		Latest News
																	</a>
                                                                </div>
                                                            
                                                        </div>
                                                        <div class="singapore_news_detail fl">
                                                        	<img src="admin/upload/news/<?php echo $row['news_img']; ?>" width="661">
                                                            <h1 style="line-height: 24px;height: auto;margin-top: 10px;margin-bottom: 10px;"><?php echo $row['news_title']; ?></h1>
                                                            <h2>Posted: <span><?php echo $row['news_inserted_date']; ?></span></h2>
                                                            <p><?php echo $row['news_description']; ?></p>
                                                            <?php 
																// $result = mysql_query("SELECT * FROM `news` ORDER BY `news`.`news_inserted_date` DESC");
																// $news_tags = mysql_result($result, 'news_tags');
																$news_tags = $row['news_tags']; 
															?>
                                                            	<div class="included_topics fl">
                                                                	<span>INCLUDED TOPICS: </span>
                                                                 	<?php
																	$comma_separated = explode(",", $news_tags);
																	foreach($comma_separated as $key2 ) {
																		
																		 echo '<a href="news.php?tags='.$key2.'">'.$key2.'</a>';
																	}
																	?>
                                                                    
                                                                </div>
                                                                <div class="included_topics fl mrgn_bottom">
                                                                 
																	
																		<div class="social_media fr" style="width:145px;">
																		<span class='st_sharethis'></span>
																		<span class='st_facebook'></span>
																		<span style="margin-top: -99px;" class='st_twitter'></span>
																		<span class='st_linkedin'></span>
																		<span class='st_pinterest'></span>
																		<span class='st_email'></span>
																		<!--<span>
																			<a target="_blank" href="http://www.linkedin.com/company/cio-choice-singapore/" style="margin:0px 0px 0px 5px;"><img src="images/linkedin.png" width="30" height="31"></a>
																			<a target="_blank" href="https://twitter.com/CIOCHOICE_SG" style="margin:0px 0px 0px 5px;"><img src="images/twitter.png" width="30" height="31"></a>
																			<a target="_blank" href="https://plus.google.com/+CiochoiceSg1/posts" style="margin:0px 0px 0px 5px;"><img src="images/google_plus.png" width="30" height="31"></a>
																			<a target="_blank" href="https://www.facebook.com/ciochoice.sg" style="margin:0px 0px 0px 5px;"><img src="images/facebook.png" width="30" height="31"></a>
																		</span> -->
																	</div>
																	
                                                                    
                                                                </div>
                                                            
                                                        </div>
                                                                                                          
                                                        
                                               	  </div>
                                                  <div style="clear:both"></div>
                                                </div>
                                                
                                            </div>
                                        
                                            	<?php 
           
			//								include('events_panel.php');
											include('quick_contact.php');
											include('footer.php');
											
											 ?>
                                            
                                           
                                      
                                            
                                        


    <!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">
		(function($){
			$(window).load(function(){
				$("#content_6").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
				$("#content_7").mCustomScrollbar({
					scrollButtons:{
						enable:true
					},
					theme:"dark-thick"
				});
			});
		})(jQuery);
	</script>

</body>
</html>
