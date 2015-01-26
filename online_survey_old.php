<?php
session_start();
// include('../include/database/db.php'); 
if (isset($_SESSION['username']) && isset($_SESSION['cio']))
{
    $name = $_SESSION['user_name'];
    $type = $_SESSION['cio'];
} else
{
    header('Location: login.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function(){
// alert('alert');
	// $('.sLogo').css({
		// "display":"none"
	// });	
	// $('.sLogo').css("display","none");
	// $('.developer').click(function(){
	
		// $('.sLogo').addClass( "yourClass" );
	// var ddd = $(".notranslate").text();
	// alert(ddd);
	// });

});
</script>

</head>

<body>
                                        	<?php
													include('sql_config/database/cio_db.php'); 
														include('top_header.php');
														
													?>
                                        
                                        
                                        <div id="shadow_wrapper"></div>
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                   <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
            <div class="landing_head" style="margin-top:0px;">
                <p><img src="images/Landing_logo.jpg" width="240" height="238"></p>
                <h1>Hi</h1>
                <h2><?php echo $name; ?><strong style="color:#20201f;">,</strong> </h2>
                <h3>Welcome to CIO CHOICE <span>SINGAPORE</span></h3>
            </div>
        </div>
                                            <div id="cio_area">
                                            	<div class="landing_head" style="margin-top:0px;height: 50px;">
                                                	<div class="cio_area_head fl">
                                                    	<div class="cio_area fl">
                                                        	<h6><img src="images/cio_area_icon.jpg" width="41" height="34">  THE CIO area</h6>
                                                        </div>
                                                        
                                                        <div class="logout fr">
                                                        	<a href="logout.php"><img src="images/logout.jpg" width="17" height="25">logout</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <div class="contact_details_2 fl">
                                                  	<a href="cio_landing.php">NOTICES</a>
                                                    <a href="#" class="active">ONLINE SURVEY</a>
                                                  </div>
                                                  <div class="online_voting_main fl">
														<!--
														<div id="surveyMonkeyInfo"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=R7gdr4H4ovq9Y_2bo2OYufQw_3d_3d"> </script></div>Create your free online surveys with <a href="https://www.surveymonkey.com">SurveyMonkey</a> , the world's leading questionnaire tool.</div>
														-->
														<div id="surveyMonkeyInfo"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=S_2fRXJEuFz5poMxdJMCgOMw_3d_3d"> </script></div>Create your free online surveys with <a href="https://www.surveymonkey.com">SurveyMonkey</a> , the world's leading questionnaire tool.</div>

												 </div>
                                                  <div style="clear:both;"></div>
                                              </div>
                                              <div style="clear:both;"></div>
                                        	</div>
                                                  <?php   include('quick_contact.php');
                                                    include('footer.php');
                                              ?>    

                                            



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
<script type="text/javascript" src="js/scripts.js"></script>



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

<script>
$("#accordion > li").click(function(){
  $("#accordion li").removeClass("active");
        $(this).addClass("active");
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});

$('#accordion > ul:eq(0)').show();

</script>

</body>
</html>
