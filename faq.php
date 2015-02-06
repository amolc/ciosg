<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$("#accordion li").first().addClass("active_faq");
	
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
                                              <?php  include('navigation.php');?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <h1>Get in Touch</h1>
                                                  <div class="contact_details_2 fl">
                                                  	<a href="contact_us.php">Contact Details</a>
                                                    <a href="faq.php"class="active">FAQs</a>
                                                  </div>
                                                  <div class="advisory_panel fl" style="height:auto;">
                                                  	<div class="faqs fl">
                                                    	<!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>
<br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>-->
                                                    </div>
                                                    
                                                    	<div class="faqs_question fl">
                                                        	<ul id="accordion">
															<?php
																$faq_result = mysql_query("SELECT
																						*
																						FROM
																						faq 
																						");

																//fetch tha data from the database 
																while ($faq_row = mysql_fetch_array($faq_result))  
																{
															?>
																<li><?php echo $faq_row['faq_heading']; ?></li>
																<ul>
																	<li><?php echo $faq_row['faq_description']; ?></li>
																</ul>
															<?php
																
																}
															?>
                                                           <!-- <li class="active_faq">1. What is CIO HONOUR?</li>
                                                            <ul>
                                                                <li>
                                                                 
                                                                “CIO HONOUR” is a very powerful tool for organizations in the Information & Communications Technology space to promote and market their products, services and solutions.<br>
<br>
This B2B platform is uniquely positioned to recognize and honour products, services and solutions on the back of stated preferences of CIOs and ICT decision makers and to help marketers create a positive brand positioning for their products, services and/ or solutions by being the CIOs preferred choice.</li>
                                                            </ul>
                                                            <li>2. What is the need for having recognition and honour title like CIO HONOUR?</li>
                                                            <ul>
                                                                <li>
                                                                 
                                                                Large ICT products enjoy the CIOs mind recollect, however, there are several scores of products, which, actually are the backbone of the ICT economy, but are rarely exposed to media or the CIOs glare. They are the unsung Champions and represent products, services & solutions that work relentlessly towards developing a resilient ICT industry.<br>
<br>
With a heightened and collective interest in them, CIO HONOUR believes that it can provide a tremendous platform and service by identifying the innovative ICT vendors along with the established large ICT vendors who have maintained the highest standards of service quality and professionalism.<br>
<br>
Obviously, winners are not necessarily the highest selling products, but those that have worked hard to win the CIOs trust and hence their endorsement.<br>
<br>
CIO HONOUR aims to create the “BRAND” awareness and platform for ICT vendors to showcase their outstanding products, services & solutions to the whole industry.</li>
                                                            </ul>
                                                            <li>3. Why should vendors look or consider participating in the CIO HONOUR honour and recognition title? What are the associated benefits?</li>
                                                            <ul>
                                                                <li>
                                                                 
                                                                CIO HONOUR is a proven Sales Acceleration platform. The recipients of the CIO HONOUR honour titles have received significant recognition & favourable responses to their product(s) from newer prospects and clients subsequent to their recognition with CIO HONOUR.<br>
<br>
CIO HONOUR will help you stand out among your competitors since it is not an award, but it is the ‘Voice of the CIO’ - the voice exhibiting the trust and confidence of his/her purchase for your product(s). CIO HONOUR is a recognition and validation that industry CIOs can trust because it ‘By the CIO and for the CIO’.<br>
<br>
CIO HONOUR provides significant visibility and brand awareness for your product(s) in the local industry with significant coverage provided in the traditional & social media, post the Red Carpet Night Recognition event.</li>
                                                            </ul>
                                                            
                                                            <li>4. What is the process for recognising and honouring vendors with the CIO HONOUR Title?</li>
                                                            <ul>
                                                                <li>
                                                                 
                                                                The recognitions are determined by using an independent CIO survey from across the country on product performance, customer satisfaction and continued customer service backed by the verdict from our Advisory Panel that consists of some of the most respected and eminent CIOs and Industry Leaders.</li>
                                                            </ul>
                                                            
                                                            <li>5. What type of vendors can apply for this honour title?</li>
                                                            <ul>
                                                                <li>
                                                                 
                                                                All vendors in the Information and Communication Technology space can apply - including but not limited to Independent Software Vendors (ISVs), Original Equipment Manufacturers (OEMs), System Integrators, Solution Providers, Consulting & Advisory Services Providers.</li>
                                                            </ul>
                                                            
                                                            <li>6. How and When will the recognition happen?</li>
                                                            <ul>
                                                                <li> 
                                                                 
                                                                The recognitions will be announced and conferred upon at the Red Carpet Night event in a glamorous setting at the St. Regis Singapore. A large gathering of CIOs and Industry leaders will witness and celebrate the success of the industry’s most outstanding vendors in a fun-filled and entertaining evening.</li>
                                                            </ul>
                                                            
                                                            <li>7. Is this going to be a yearly recognition or just a one-time event?</li>
                                                            <ul>
                                                                <li>
                                                                 
                                                                This will be an annual event eagerly anticipated by the whole ICT industry.</li>
                                                            </ul>
															-->
                                                        
                                                        </ul>
                                                        </div>

                                                        
                                                    
                                                  </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                        
											<?php 
           
											include('quick_contact.php');
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
  $("#accordion li").removeClass("active_faq");
        $(this).addClass("active_faq");
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});

$('#accordion > ul:eq(0)').show();

</script>

</body>
</html>