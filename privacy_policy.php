<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link rel="icon" type="image/png" href="http://cio.fountaintechies.com/cxo_fav_ico.png">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {
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
                                                <div class="our_advisory_panel mrgn_top" style="height:auto;">
                                                  <div class="overview_left fl">
                                                  	<div class="about fl">
                                                    	<h1></h1>
                                                        <a href="careers.php">Careers</a>
                                                        <a href="privacy_policy.php">Privacy Policy</a>
                                                    </div>
                                                  </div>
                                                  
                                               	  <div class="overview_right fr">
                                               	    <div class="choice_overview fl">
                                            	<?php 
                                                $result = mysql_query("SELECT * FROM enter_page where enter_type='policy' ");
                                                $row = mysql_fetch_array($result);
                                                ?>
															
                    <h1><?php echo $row['enter_heading']; ?></h1>
                    <br/> <br/>
                    <div class="textdescription"><?php echo $row['enter_description']; ?></div>
														
                                                           
                                                        </div>
                                               	  </div>
                                                  <div style="clear:both"></div>
                                                </div>
                                                
                                            </div>
                                        
<?php include('events_panel.php'); ?>


<?php
include('quick_contact.php');
include('footer.php');
?>                                   
                                           


    <!-- Google CDN jQuery with fallback to local -->
	<script src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">
		(function($){
                $(window).load(function() {
                    $("#content_6").mCustomScrollbar({
                        scrollButtons: {
                            enable: true
                        },
                        theme: "dark-thick"
                    });
                    $("#content_7").mCustomScrollbar({
                        scrollButtons: {
                            enable: true
                        },
                        theme: "dark-thick"
                    });
                    $("#content_8").mCustomScrollbar({
                        scrollButtons: {
                            enable: true
                        },
                        theme: "dark-thick"
                    });
                });
            })(jQuery);
</script>

</body>
</html>
