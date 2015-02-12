<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link rel="icon" type="image/png" href="cxo_fav_ico.png">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
<!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->




<script src="js/bootstrap.js" type="text/javascript"></script>

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
                                                  <h1 style="font-size: 30px; font-family: 'Lato';  text-transform: uppercase;">AWARDS</h1>
													<div class="contact_details_2 fl">
														<a href="#" class="active">2014</a>
														<a style="display:none;" href="advisory_panel_13.php">2013</a>
													</div>
                                                  <div id="content_8" class="advisory_panel">
												  <?php
															$year ="2014";
															$advisory_query = mysql_query("select * from awards order by award_company asc");
															
															while($advisory_res = mysql_fetch_array($advisory_query))
															{
																


																$advisory_name= $advisory_res['award_name'];
																$advisory_desination = $advisory_res['award_industry'];
																$advisory_company = $advisory_res['award_company'];
																 $advisory_image = $advisory_res['award_image'];
																 $advisory_description = $advisory_res['award_company_details'];
																 $video_embed_code= $advisory_res['video_embed_code'];
																 $company_profile= $advisory_res['company_profile'];
																 $advisory_description = str_replace("<div>","",$advisory_description);
																 $advisory_description = str_replace("</div>","",$advisory_description);
															         $advisory_description1 = $advisory_description;
																	 

                                                                                                                                            if (strlen($advisory_description) > 190)
                                                                                                                                   {

                                                                                                                                       // truncate string
                                                                                                                                       $stringCut = substr($advisory_description, 0, 300);
                                                                                                                                       $advisory_description = substr($stringCut, 0, strrpos($stringCut, ' ')) ;
                                                                                                                                   }
													//print_r($advisory_image);
													//$image = explode("=", $advisory_image); 
													/*echo "<br>llll ";
													print_r($image)*/
													?>
															
																 <div class="alice_abigail fl">
                                                       	  		<div class="alice_abigail_pic"><img class="advisor_img" src="admin/upload/<?php echo $advisory_image; ?>"></div>
                                                                        <div class="fl" style="width: 650px;">
                                                                <h1 style=""><?php echo $advisory_name; ?></h1>
                                                              <h2><?php echo $advisory_desination; ?></h2>
                                                              <h3><?php echo $advisory_company; ?></h3>
                                                              <div id="shortDetail<?php echo $advisory_res['awardID']; ?>">
                                                                <p class="textContainer_Truncate "><?php echo $advisory_description; ?></p>                                                                
                                                                <?php //echo  '<a style="font-weight:bold;" href="advisory_detail.php?id=' . $advisory_res['advisory_id'] . '" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                              // echo  '<a style="font-weight:bold;" href="javascript:void(0)" onclick="return readmore('.$advisory_res['awardID'].');" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               ?>
       
                                                             
															   <button type="button" style="font-weight:bold;" onClick="return readmore('<?php $advisory_res['awardID']?>');" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#longdetail<?php echo $advisory_res['awardID']; ?>">
  Read more
</button>
                                                              </div>
															 </div>
															  
											<div class="modal fade" id="longdetail<?php echo $advisory_res['awardID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:14%;">
												<div class="modal-dialog" style="width:70%; height:100%">
													<div class="modal-content">
													
													<div class="modal-body">
													
															<a href="javascript:void(0)" data-dismiss="modal" aria-hidden="true" style="float: right; margin-right:-17px;margin-top:-18px;"><img src="images/cross.png"  width="25px"/></a>
																
																	<div class="row">
																		<div class="col-md-7">
																		<img class="advisor_img" src="admin/upload/<?php echo $advisory_image; ?>">
																			<br /><br />
																			<strong style="font-size: 18px;color: #c5ac36;"><?php echo $advisory_name?></strong>
																			<br /><br />																	
																			<strong><?php echo $advisory_desination?></strong>
																			
																		</div>
																		<div class="col-md-5"><?php echo $video_embed_code?></div>
																	</div>
																	<br /><br />							
																<div class="row">
																	<div class="col-md-12" style="text-align: justify;font-size: 13px;">
																		<h3>About us:</h3>
																		<br /><br />
																		<?php echo $company_profile; ?>
																	</div>
																</div>
													
															
														</div>
													</div>
												</div>
                                                           
                                            </div>
                                                            </div>
															<?php } ?>
			 
                                                  </div>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
										</div>
									
											<?php 
											
												//include('events_panel.php');
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