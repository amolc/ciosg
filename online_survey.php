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
<title>Cio HONOUR</title>
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
			<script type="text/javascript">
		$(document).ready(function(){
			
				$('.change_pass').click(function(){
				
				var old_pass = $('.old_pass').val();
				var new_pass = $('.new_pass' ).val();
				var re_pass = $( '.re_pass' ).val();

				$.ajax({
						type: 'post',
						url: 'ajax_change_password.php',
						data: {old_pass:old_pass,new_pass:new_pass,re_pass:re_pass,},
 
						success: function(mesg) {
							alert(mesg);
							$('.mesg').empty().append(mesg);
							 // $('#photo_detail').append(mesg);

						}

				});

			});		
			/*$('.keyup-email-2').keyup(function() {
				$('span.error-keyup-8').remove();
				var inputVal = $(this).val();
				var emailFreeReg= /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)(?!aol.com)([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailFreeReg.test(inputVal)) {
					$(this).after('<span style="position: absolute;height: 22px;margin-left: -38px;margin-top: 45px;color: #F00;" class="error error-keyup-8">No Free Email Addresses.</span>');
					// $('.enter_form_send').hide();
					 // $(".enter_form_send").prop('disabled', 'true');
				}
				else { 
				// $('.enter_form_send').show();
				 // $(".enter_form_send").prop('disabled', 'false');
				}
			});*/
			
			
		});
	</script>
<script type="text/javascript">
$(document).ready(function(){
 
     $(".logincontainer").click(function () {
 
     $(".logbar").toggle("slow");
 
  });
	
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
                <h3>Welcome to CIO HONOUR <span>SINGAPORE</span></h3>
            </div>
        </div>
                                            <div id="cio_area">
                                            	<div class="landing_head" style="margin-top:0px;height: 50px;">
                                                	<div class="cio_area_head fl">
                                                    	<div class="cio_area fl">
                                                        	<h6><img src="images/cio_area_icon.jpg" width="41" height="34">  THE CIO area</h6>
                                                        </div>
                                                        
                                                        <div style="width:115px;" class="logout fr">
                     <!--   <a href="change_password_ict.php">changePassword</a>-->
						<a class="logincontainer"><img src="images/change_pass_icon.png" width="22" height="25">Password</a>
						  
					<div class="logbar  change_pass_wrraper" style="display: none;">
						
						                      
						<div style="" class="">
							<label>Old Password:</label>
							<input name="old"  class="old_pass" type="password" required>
							<label>New Password:</label>
							<input name="new"  class="new_pass" type="password" required>
							<label style="width:180px;">Confirm New Password:</label>
							<input name="retype"  class="re_pass" type="password" required>
																				
							<input name="Submit" class="change_pass" value="Submit" type="submit">
							<span style="color:red" class="mesg"></span>
						</div>
					</div>
                    </div>
                                                        
                                                    </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <div class="contact_details_2 fl">
                                                  	<a href="cio_landing.php">NOTICES</a>
                                                    <a href="#" class="active">REQUEST THE SURVEY</a>
                                                  </div>
                                                  <div class="online_voting_main fl">
														<!--
														<div id="surveyMonkeyInfo"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=R7gdr4H4ovq9Y_2bo2OYufQw_3d_3d"> </script></div>Create your free online surveys with <a href="https://www.surveymonkey.com">SurveyMonkey</a> , the world's leading questionnaire tool.</div>
														-->
														<div class="online_survey fl">
                                                        	<div class="send_btn fl"><a href="#"><img src="images/send_survey.png" width="263" height="263"></a></div>
                                                            <div class="online_survey_text fl">
                                                            	<h1>CIO HONOUR <span>ONLINE SURVEY</span></h1>
                                                                <p>To request the survey, or if you would like to be re-sent a reminder </p>
                                                              <h2>HIT THE &acute;<span>SEND ME THE SURVEY</span>&acute; BUTTON</h2>
                                                              <p>and we’ll have it delivered to your registered email address<br><br>
                                                                <strong>Registered Email Address: <a href="#" style="color:red;">nicholas.m@cio.com</a></strong></p>
                                                          </div>
                                                        </div>
                                                        <div class="having_problems fl">
                                                        	<h3>Having Problems with your Survey?</h3>
                                                            <p>Please feel free to get in touch by emailing <a href="#" style=" color:#616161; font-weight:bold; text-decoration:underline;">survey@cio-choice.sg</a></p>
                                                        </div>

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
