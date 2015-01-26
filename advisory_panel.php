<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>
    
	<script type="text/javascript">
    $(document).ready( function() {
	//alert('developer');
      $('#tab-container').easytabs();
    });
    </script> 
</head>

<body>
                                        <?php													
											include('sql_config/database/cio_db.php'); 
											include('top_header.php');
											include('header.php');
                                        ?>
                                        
                                        
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
										
                                            <div id="advisory_wrapper">
                                                <div class="advisory_panel_1 mrgn_top">
                                                  <h1>Advisory Panel</h1>
													<div class="contact_details_2 fl">
													
														<a href="#" class="active">2015</a>
														<a href="advisory_panel_13.php">2014</a>
													</div>
                                                  <div id="content_8" class="advisory_panel">
												  <?php
															$year ="2015";
															$advisory_query = mysql_query("select * from advisory_panel  where advisory_years = '".$year."' ORDER BY advisory_name asc");
															while($advisory_res = mysql_fetch_array($advisory_query))
															{
																$advisory_name= $advisory_res['advisory_name'];
																$advisory_desination = $advisory_res['advisory_desination'];
																$advisory_company = $advisory_res['advisory_company'];
																 $advisory_image = $advisory_res['advisory_image'];
																 $advisory_description = $advisory_res['advisory_description'];
																 $advisory_description = str_replace("<div>","",$advisory_description);
																 $advisory_description = str_replace("</div>","",$advisory_description);
															         $advisory_description1 = $advisory_description;

                                                                                                                                            if (strlen($advisory_description) > 190)
                                                                                                                                   {

                                                                                                                                       // truncate string
                                                                                                                                       $stringCut = substr($advisory_description, 0, 300);
                                                                                                                                       $advisory_description = substr($stringCut, 0, strrpos($stringCut, ' ')) ;
                                                                                                                                   }
													
													$image = explode("=", $advisory_image); 
													?>
															
																 <div class="alice_abigail fl">
                                                       	  		<div class="alice_abigail_pic"><img class="advisor_img" src="<?php echo $image[1]; ?>"></div>
                                                                        <div class="fl" style="width: 650px;">
                                                                <h1 style=""><?php echo $advisory_name; ?></h1>
                                                              <h2><?php echo $advisory_desination; ?></h2>
                                                              <h3><?php echo $advisory_company; ?></h3>
                                                              <div id="shortDetail<?php echo $advisory_res['advisory_id']; ?>">
                                                                <p class="textContainer_Truncate "><?php echo $advisory_description; ?></p>                                                                
                                                                <?php //echo  '<a style="font-weight:bold;" href="advisory_detail.php?id=' . $advisory_res['advisory_id'] . '" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               echo  '<a style="font-weight:bold;" href="javascript:void(0)" onclick="return readmore('.$advisory_res['advisory_id'].');" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               ?>
                                                              </div>
                                                              <div id="longdetail<?php echo $advisory_res['advisory_id']; ?>" style="display: none;">
                                                                <p class="textContainer_Truncate " ><?php echo $advisory_description1; ?></p>
                                                               <?php //echo  '<a style="font-weight:bold;" href="advisory_detail.php?id=' . $advisory_res['advisory_id'] . '" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               echo  '<a style="font-weight:bold;" href="javascript:void(0)" onclick="return hidemore('.$advisory_res['advisory_id'].');" class="readmore-js-toggle" target="_blank" > Hide</a>';
                                                               ?>
                                                                </div>
                                                              </div>
                                                            </div>
															<?php                                                                                                                      
                                                                                                                                   } ?>
			 
                                                  </div>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
											<?php 
											
											//	include('events_panel.php');
												include('quick_contact.php');
												include('footer.php');
												
										   ?>

<!--    <script src="js/readmore.js" ></script>-->

  <script>
   // $('.textContainer_Truncate').readmore({maxHeight: 50});
  </script>
    <!-- Google CDN jQuery with fallback to local -->
	<!--<script type="text/javascript" src="js/jquery.min.js"></script>--> 
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
			advanced:{
     		   updateOnContentResize:true
    			},


					theme:"dark-thick"
				});
			});
		})(jQuery);
                
                function readmore(cid)
                {
                   $('#shortDetail'+cid).hide(); 
                   $('#longdetail'+cid).show();
                }
                
                function hidemore(cid)
                {
                    $('#shortDetail'+cid).show(); 
                   $('#longdetail'+cid).hide();
                }
	</script>

</body>
</html>
