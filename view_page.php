<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>
    

	<style type="text/css">
	#total_news:hover {
	color:#fff;
	}
		
	</style>
<script>

jQuery(document).ready(function($) { 
   
	$('#tab-container').easytabs(); 
	
   });

</script>



</head>

<body>
                            
										<?php													
											include('sql_config/database/cio_db.php'); 
											include('top_header.php');
											include('header.php');
											$id = $_REQUEST['id'];
											$result = mysql_query("SELECT * FROM pages WHERE page_id=$id");
											$row = mysql_fetch_array($result);
										
											
                                        ?>
                                       
                                        
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                         
										
										<div id="advisory_wrapper">
                                                <div class="our_advisory_panel mrgn_top" style="height:auto;">
												
												<?php if($row['page_type'] == 'tab')
												{
											
												$i = 0;
												echo '<div class="contact_details_2 fl">';            
												 $page_id = $row['page_id'];
												 $result2 = mysql_query("SELECT * FROM pages_tab WHERE page_id=$page_id");
												 while ($row2 = mysql_fetch_array($result2))
												 {
												  $tab = $row2['tab_name'];
												  if($i==0)
												  {
													echo '<a href="view_tab.php?id='.$row2['tab_id'].'" class="active tab">'.$tab.'</a>';
												  }
												  else
												  {
												  echo '<a <a href="view_tab.php?id='.$row2['tab_id'].'" class="tab">'.$tab.'</a>';
												  }
												  $i++;
												 }
												 echo "</div>";									
												
												} ?>		
												
												<?php if($row['page_type'] == 'column')
												{
												?>
                                                  <div class="overview_left fl">
                                                  	<div class="about fl">
                                                    	 <?php echo "<a>". $row['left_column']."</a>";  ?>
                                                    </div>
                                                  </div>
                                                  <?php } ?>
                                               	  <div class="overview_right fr">
                                               	    <div class="choice_overview fl">
                                                        	<?php echo "<p>". $row['page_description'] ."</p>";  ?>
                                                    </div>
                                                    <div class="network fl">
                                                        
                                                      
                                                    </div>
                                                   
                                                   
                                                    </div>
                                                  <div style="clear:both"></div>
                                                </div>
                                                
                                            </div>
									
										
											<?php
												include('events_panel.php');                                             
												include('quick_contact.php');
												include('footer.php');
											?>     
                                           
                                            


    <!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
				$("#content_8").mCustomScrollbar({
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
