<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    // $(document).ready(function () {
      // var maxheight=180;
      // var showText = "More";
      // var hideText = "Less";

      // $('.textContainer_Truncate').each(function () {
        // var text = $(this);
        // if (text.height() > maxheight){
            // text.css({ 'overflow': 'hidden','height': maxheight + 'px' });

            // var link = $('<a style="float: right;margin-right: 620px;margin-top: 2px;" href="#">' + showText + '</a>');
            // var linkDiv = $('<div></div>');
            // linkDiv.append(link);
            // $(this).after(linkDiv);

            // link.click(function (event) {
              // event.preventDefault();
              // if (text.height() > maxheight) {
                  // $(this).html(showText);
                  // text.css('height', maxheight + 'px');
              // } else {
                  // $(this).html(hideText);
                  // text.css('height', 'auto');
              // }
            // });
        // }       
      // });
   // });
</script>
<style type="text/css">

</style>
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
														<a href="advisory_panel.php">2015</a>
														<a href="#" class="active">2014</a>
													</div>
                                                  <div id="content_7" class="advisory_panel">
												  <?php
														$year ="2014";
															$advisory_query = mysql_query("select * from advisory_panel where advisory_years='".$year."'");
															while($advisory_res = mysql_fetch_array($advisory_query))
															{
																$advisory_name= $advisory_res['advisory_name'];
																$advisory_desination = $advisory_res['advisory_desination'];
																$advisory_company = $advisory_res['advisory_company'];
																$advisory_image = $advisory_res['advisory_image'];
																$advisory_description = $advisory_res['advisory_description'];
																$advisory_description = str_replace("<div>","",$advisory_description);
																$advisory_description = str_replace("</div>","",$advisory_description);
															

													// if (strlen($advisory_description) > 190) {

														// $stringCut = substr($advisory_description, 0, 300);

														 // $advisory_description = substr($stringCut, 0, strrpos($stringCut, ' ')).'<a class="act" style="font-weight:bold;">Read more</a>';
													// }
													
													$image = explode("=", $advisory_image); 
													?>
															
																 <div class="alice_abigail fl">
                                                       	  		<div class="alice_abigail_pic"><img class="advisor_img" src="<?php echo $image[1]; ?>"></div>
                                                                <h1 style=""><?php echo $advisory_name; ?></h1>
                                                              <h2><?php echo $advisory_desination; ?></h2>
                                                              <h3><?php echo $advisory_company; ?></h3>
                                                                <p class="textContainer_Truncate"><?php echo $advisory_description; ?></p>
                                                                
                                                            </div>
															<?php } ?>
			 
                                                  </div>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
											<?php 
											
											//	include('events_panel.php');
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
			});
		})(jQuery);
	</script>
<script src="js/readmore.js"></script>

  <script>
    $('.textContainer_Truncate').readmore({maxHeight: 111});
  </script>
</body>
</html>
