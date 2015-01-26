<?php
session_start();
// include('../include/database/db.php'); 
if (isset($_SESSION['username']) && isset($_SESSION['ict']))
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

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.theme.css">
<script src="admin/include/resource/js/jquery-1.10.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{

	$('#cio_category').on('change',function()
	{
              
					$('.category1').remove();
					$('.categroy_created').remove();
                    var value = $(this).val();
					
                    if(value >0) 
					{
                       for (var i = 1; i <=value; i++) 
					    {
							$('.category').before('<div class="categroy_created"><h2 class="form_heading" style="color:#c5ac35;">Entry '+i+'</h2><div class="field fl"><span class="input_lable fl">ICT Category & Code: </span> <span class="input_lable fl"  style="width:320px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please see categories found on the <u>categories</u>  tab)</span><br /><input type="text" name="category_code[]" id="category_code" class="fl input_field" required/></div> <div class="field fl"><span class="input_lable fl" style="width:438px; height:25px; display:block; padding:0px;">&nbsp;</span><span class="input_lable fl">Product/ Service/ Solution Name:</span><br /><input type="text" name="solution[]" id="solution" class="fl input_field" required/></div><div class="field fl"><span class="input_lable fl">Brand Name:</span><br /><input type="text" name="brand_name[]" id="country" class="fl input_field" required/></div><div class="field fl" style="width:910px; margin:0px;"><span class="input_lable fl">Product Description: </span><span class="input_lable fl"  style="width:910px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please do not make description longer than 100 words)</span><br /> <textarea name="product_description[]" class="fl input_field" id="post_code" style="width:890px; height:180px; padding:10px;" required></textarea></div></div>');													
						}
                    }
            
	}); 
});
</script>

</head>

											<?php
											include('sql_config/database/cio_db.php'); 
											
											if(isset($_POST['Submit']))
											{
											
											$first_name = mysql_real_escape_string($_REQUEST['first_name']);
											$last_name = mysql_real_escape_string($_REQUEST['last_name']);
											$title = mysql_real_escape_string($_REQUEST['title']);
											$email = mysql_real_escape_string($_REQUEST['email']);
											$user_telephone = mysql_real_escape_string($_REQUEST['telephone']);
											$user_mobile = mysql_real_escape_string($_REQUEST['mobile']);
											$company_name = mysql_real_escape_string($_REQUEST['company_name']);
											$company_address = mysql_real_escape_string($_REQUEST['company_address']);
											$company_telephone = mysql_real_escape_string($_REQUEST['company_telephone']);
											$post_code = mysql_real_escape_string($_REQUEST['post_code']);
											$country = mysql_real_escape_string($_REQUEST['country']);
											$city = mysql_real_escape_string($_REQUEST['city']);
											$state = mysql_real_escape_string($_REQUEST['state']);
											$company_size = mysql_real_escape_string($_REQUEST['company_size']);
											$cio_category_no = mysql_real_escape_string($_REQUEST['cio_category_no']);
											$category_code = mysql_real_escape_string($_REQUEST['category_code']);
											$solution = mysql_real_escape_string($_REQUEST['solution']);
											$brand_name = mysql_real_escape_string($_REQUEST['brand_name']);
											$product_des = mysql_real_escape_string($_REQUEST['product_description']);
											$term = mysql_real_escape_string($_REQUEST['term']);
											$fee_part = mysql_real_escape_string($_REQUEST['fee_part']);
											//echo $term;exit;
							$filter = explode("@",$email);
							if($filter[1] == "gmail.com" || $filter[1] == "yahoo.com" || $filter[1] == "hotmail.com"|| $filter[1] == "outlook.com")  {
								header("Location: enter_form.php?email_error=ok"); 
							}
							else
							{
												if ($term == '1')
												{
													$sql="insert into ictpartners 
													(first_name,last_name,title,email,telephone,mobile,company_name,company_address,company_telephone,post_code,country,company_size,total_products,city,state,fee_part)
													values
													('$first_name','$last_name','$title','$email','$user_telephone','$user_mobile','$company_name','$company_address','$company_telephone','$post_code','$country','$company_size','$cio_category_no','$city','$state','$fee_part')";
													mysql_query($sql)or die(mysql_error());
													$partner_id = mysql_insert_id();
													
													for($i=0;$i<$cio_category_no;$i++)
													{
														$sql2="insert into ictpartners_products
														(partner_id,category_code,solution,brand_name,product_description)
														values
														('$partner_id','$category_code[$i]','$solution[$i]','$brand_name[$i]','$product_des[$i]')";
														mysql_query($sql2)or die(mysql_error());
													}
													
													$headers  = 'MIME-Version: 1.0' . "\r\n";
													$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
													
													$headers .= 'From: contactus@cio-choice.sg' . "\r\n";
													
													$to = $email;
													$subject = "ICT Partners - Submission Form";
													// $message = '<a href="http://staging.cio-choice.sg/pdf/htmlTO_pdf/form.php?vendor_id='.$partner_id.'">Click here</a> to download PDF';
													$message = '
													<html>
													<body style="padding:0px; margin:0px;">
													<div style=" height:100%; float:left; padding:25px; background:#eaeaea;">

									<div style="float:left; width:100%; margin:0px 0px 25px 0px; background:white; box-shadow:0px 2px 5px #7d7c7c;">
										<div style=" float:left; width:100%; height:225px;min-height: 225px; background:url('.$web_url.'/images/cio_choice_head_bg.png) repeat-x  100px top;">
											<div style=" width:210px;height: 225px; margin:0 auto;">
												<a href="#" style="height:245px;">
													<img src="'.$web_url.'/images/cio_choice_head_logo.png" alt="" width="207" height="221"></a>
												<div style="clear:both;"></div>
											</div>
										</div>
										<div style="width:100%; height:65px; float:left; background:#20201f;">
											<div style=" width:115px;text-align:center; float:left;">
												<a href="'.$web_url.'/index.php" style=" text-decoration:none; padding:0px 27px; text-align:center; float:left; line-height:65px; font-family: Lato; color:#FFF; font-size:17.5px; font-weight:bold; text-transform:uppercase; text-shadow:0px 2px #000; letter-spacing:1px; background:url('.$web_url.'/images/border.jpg) no-repeat right">
													home
												</a>
											</div>
											
											<div style="float:right; margin:15px 20px 0px 0px;">
												<a href="'.$web_url.'/pdf/htmlTO_pdf/form.php?vendor_id='.$partner_id.'" style="width:200px; text-align: left; line-height:35px; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
													<img src="'.$web_url.'/images/download_pdf.png" width="23" height="22" style="margin: 6px 10px 0 13px; float:left;">
													Download PDF
												</a>
											</div>
										</div>
										<div style="width:100%; float:left; padding:20px 0px; text-align:center; color:#20201f;">
											<h1 style=" float:left; width:90%; font-family:Lato; font-size:26px; font-weight:bold; margin:0% 5%; padding:0px;">
												Thank you for your submission<br>
												to CIO CHOICE
											</h1>
											<p style=" float:left; width:90%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; text-align: left; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
												1. Please <strong>download your CIO CHOICE pdf entry form</strong> and proceed to <strong>stamp, sign</strong> and <strong>authorize it by a representative</strong> of your company.</p>
												
												<div style="float:left; margin:20px 20px 10px 35px;">
                       		<a href="'.$web_url.'/pdf/htmlTO_pdf/form.php?vendor_id='.$partner_id.'" style="width:200px; text-align: left; line-height:35px; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
													<img src="'.$web_url.'/images/download_pdf.png" width="23" height="22" style="margin: 6px 10px 0 13px; float:left;">
													Download PDF
												</a>
                        </div>
                        
                        <p style=" float:left; width:90%; display:block; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">2.  Scan and return your completed form to <a href="#" style="color:#312f2f; font-weight:bold;">registration@cio-choice.sg</a><br>
<br>
Once we receive your completed form, we&acute;ll be in touch to confirm your details and let you know you are successfully registered for your selected CIO CHOICE Categories.<br>
<br>
<strong>The CIO CHOICE team</strong></p>
												
										</div>
										
										
										<div style="float:left; width:100%;">
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 10px;"></div>
										<div style="float:left; margin:18px 0px 0px 0px;"><img src="'.$web_url.'/images/star_rating.jpg" width="82" height="11"></div>
										<div style="float:left; width:43%; background:#eaeaea; height:1px; margin:28px 0px 0px 0px;"></div>
										</div>
										<div style="float:left; width:98.8%; padding:0px; margin-left:10px">
										<div style="width:60%; float:left; height:80px;">
												<span style="float:left; margin:15px 12px 0px 0px; display:block;"><img src="'.$web_url.'/images/question.jpg" alt="" width="41" height="41"></span>
												<span style="float:left; width:50%; margin:15px 20px 0px 0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161">Need help?</span>
											  <a href="'.$web_url.'/contact_us.php" style="float:left; width:50%; margin:0px; display:block; text-transform:uppercase; font-family: Arial, Helvetica, sans-serif; color:#616161; font-weight:bold;">Send us your question</a>
										  </div>
										<div style="width:170px; float:right; margin-top:22px; margin-right:1%;">
											<a href="http://www.linkedin.com/company/cio-choice-singapore/" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/linkedin.png"></a>
											<a href="https://twitter.com/CIOCHOICE_SG" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/twitter.png"></a>
											<a href="https://plus.google.com/+CiochoiceSg1/posts" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/google_plus.png"></a>
											<a href="https://www.facebook.com/ciochoice.sg" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/facebook.png"></a>
											<a href="http://www.youtube.com/user/CIOCHOICEsingapore" target="_blank"><img width="30" height="31 " alt="" src="'.$web_url.'/images/play.png"></a>
										</div>
										
										<div style="float:left; width:100%; border-top: #EAEAEA solid 1px;">
											<div style="float:left; margin:0px; width:96%;">
											  <ul style="	float:left; margin:20px 0px 0px 0px; padding:0px; display:block;">
																						
												<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="#" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>
																						
												<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="#" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>
																						
												<li style="	float:left; list-style-type: none; margin:0px;"><a href="#" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
											  </ul>
											  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
										  </div>
										</div>
										  
									  </div>
									  
										
										
									</div>
									
									<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family: Arial, Helvetica, sans-serif; font-weight:400px;">
									This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$registration_email.'</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>
									
									<div style="clear:both;"></div>
							</div></body></html>'; 
													$from = "contactus@cio-choice.sg";
													
													mail($to,$subject,$message,$headers);
													
													echo'<script>window.location.replace("enter_form.php?add=ok");</script>';	
												}
												}
																																
											}	
											?>


<body>

     <?php             

											   include('top_header.php');
											  
									?>
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
            <div class="landing_head" style="margin-top:0px;height:50px;">
                <div class="cio_area_head fl">
                    <div class="cio_area fl">
                        <h6><img src="images/world_icon.jpg" width="43" height="38">   THE ICT VENDOR area</h6>
                    </div>

                    <div class="logout fr">
                        <a href="logout.php"><img src="images/logout.jpg" width="17" height="25">logout</a>
                    </div>
					
					<div style="width: 150px;" class="logout fr">
                        <a href="change_password_ict.php">changePassword</a>
                    </div>

                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
										
			
										 <!--<form  action="" method="post">-->
                        <form action="" method="post">
                                         
                                            <div id="advisory_wrapper">
											
                                                <div class="get_in_touch mrgn_top">
												
                                                  <div class="contact_details_2 fl">
                                                  	<a href="#" class="">NOTICES</a>
                                                    <a href="#"  class="">CATEGORIES</a>  
                                                    <a href="#"  class="">PARTICIPATION FEES</a>  
                                                    <a href="#"  class="">T & Cs</a>  
                                                    <a href="enter_form.php"  class="active">ENTER</a>  
													<br />
                                                  </div>
												  <?php
											if(isset($_REQUEST['add']))
											{
											echo '<div class="your_register">
                                                    	<h1>Your Registration form will be <span>emailed to you to be stamped</span>, <span>signed</span> and <span>authorized</span> by a representative of the company. </h1>
                                                        <p>Please return your a scanned copy to <a href="#">registration@cio-choice.sg</a>.</p>
                                                    </div><br /><br />';
											}
											else
											{
											?>
                                                  <div class="video_main fl">
										           
													<h2 class="form_heading">1. Contact Information </h2>
												
													<div class="field fl">
													<span class="input_lable fl">First Name:</span>
													<br />
													<input type="text" name="first_name" id="first_name" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Last Name:</span>
													<br />
													<input type="text" name="last_name" id="last_name" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Title:</span>
													<br />
													<input type="text" name="title" id="title" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Email:</span>
													<br />
													<input type="text" name="email" id="email" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Telephone Number:</span>
													<br />
													<input type="text" name="telephone" id="telephone" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Mobile No:</span>
													<br />
													<input type="text" name="mobile" id="mobile" class="fl input_field" required/>
													</div>
													<br />
													<h2 class="form_heading">2. Company Information </h2>
													
													
													<div class="field fl">
													<span class="input_lable fl">Company Name:</span>
													<br />
													<input type="text" name="company_name" id="company_name" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Company Address:</span>
													<br />
													<input type="text" name="company_address" id="company_address" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Post Code/Zip:</span>
													<br />
													<input type="text" name="post_code" id="post_code" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">City:</span>
													<br />
													<input type="text" name="city" id="post_code" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">State:</span>
													<br />
													<input type="text" name="state" id="post_code" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Country:</span>
													<br />
													<input type="text" name="country" id="country" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl">Telephone Number:</span>
													<br />
													<input type="text" name="company_telephone" id="company_telephone" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl" style="width:438px; display:block;">Company Revenue (Singapore):</span>
													<br />
													<label for="">Less than $USD 15 Million</label><input type="radio" name="company_size" id="company_size" value="less" class=""/>
													<label for="" style="margin-left:15px;">More than $USD 15 Million</label><input type="radio" name="company_size" id="company_size" value="more" class=""/>
													</div>
													
													<h2 class="form_heading">3. Product / Service / Solution Detail </h2>
                                                    
                                                    <div class="field fl" style="width:890px;">
													<span style=" display:block; float:left; margin:15px 0px 10px 0px;"><select style="width:70px; height:30px; padding:7px;" name="cio_category_no" id="cio_category" required>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    
													  </select>
                                                      </span>
                                                      <span class="input_lable fl" style="width:800px; margin:11px 0px 0px 15px; padding:0px;">Select the  Number of CIO CHOICE categories you would like to participate in.</span>
                                                      <span class="input_lable fl"  style="width:800px; font-weight:normal; padding:0px; margin-left:15px;">( Each category entry form must be completed, details of the ICT categories is found on the <u>categories</u>  tab)</span>
													</div>
                                                <div class="category"></div>    
                                                <div class="category1">
												
                                                    <h2 class="form_heading" style="color:#c5ac35;">Entry 1</h2>
                                                    
                                                    
                                                    <div class="field fl">
													<span class="input_lable fl">ICT Category & Code: </span>
                                                    <span class="input_lable fl"  style="width:320px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please see categories found on the <u>categories</u>  tab)</span>
													<br />
													<input type="text" name="category_code[]" id="category_code" class="fl input_field" required/>
													</div>
													
													<div class="field fl">
													<span class="input_lable fl" style="width:438px; height:25px; display:block; padding:0px;">&nbsp;</span>
                                                    <span class="input_lable fl">Product/ Service/ Solution Name:</span>
													<br />
													<input type="text" name="solution[]" id="solution" class="fl input_field" required/>
													</div>
                                                    
                                                    <div class="field fl">
													<span class="input_lable fl">Brand Name:</span>
													<br />
													<input type="text" name="brand_name[]" id="country" class="fl input_field" required/>
													</div>
                                                    
                                                    <div class="field fl" style="width:910px; margin:0px;">
													<span class="input_lable fl">Product Description: </span>
                                                    <span class="input_lable fl"  style="width:910px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please do not make description longer than 100 words)</span>
													<br />
                                                    <textarea name="product_description[]" class="fl input_field" id="post_code" style="width:890px; height:180px; padding:10px;" required></textarea>
													</div>
                                                </div>
                                                    <h2 class="form_heading">4. Build your application</h2>
                                                    
                                                    <div class="field fl" style="width:800px;">
													<input type="checkbox" name="term"  value="1" required/> <label for="" class="input_lable" style="padding:0px;">I agree with the <u>Terms and Condtions</u> related to CIO CHOICE registration</label>
													</div>
                                                    <div class="field fl" style="width:800px;">
													<input type="checkbox" name="fee_part"  value="yes" /> <label for="" class="input_lable" style="padding:0px;">I accept the CIO CHOICE  <u>Participation Fees</u></label>
													</div>
                                                    <div >
                                                        <input class="enter_form_send" type="submit" value="" name="Submit">
                                                    </div>
											</form>
                                                    
                                                    
                                                  </div>
												  <?php }?>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                      
                                           <?php 
           
											include('quick_contact.php');
											include('footer.php');
											
											 ?>


    <!-- Google CDN jQuery with fallback to local -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

	<script type="text/javascript">
		(function($){
        $(".facebook_scroll a[rel^='prettyPhoto']").prettyPhoto();
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
        $(".facebook_scroll a[rel^='prettyPhoto']").prettyPhoto({
          social_tools: ''
        });
$(".facebook_scroll").owlCarousel({autoPlay:true,items:4});

		})(jQuery);
	</script>
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
