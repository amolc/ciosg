<?php
 session_start();
  // include('../include/database/db.php'); 
if(isset($_SESSION['username']) && isset($_SESSION['cio'])){
	$name = $_SESSION['user_name'];
	$type = $_SESSION['cio'];
}
else {
	header('Location: login.php');
}
?>
<?php
						

						include('sql_config/database/cio_db.php'); 

						if($_REQUEST['Submit'] == "Submit")
						{
						
							$name = $_SESSION['username'];
							
							$old = mysql_real_escape_string($_POST['old']);
							$new = mysql_real_escape_string($_POST['new']);
							$retype = mysql_real_escape_string($_POST['retype']);
							
							$sql = "select * from all_users where emailID='$name'";
							$res = mysql_query($sql)or die(mysql_error());
							$row = mysql_fetch_array($res);
							$password = $row['password'];
							
							
							if($new != $retype)
							{
							
							header("Location: change_password_cio.php?dm=ok");
							}
							
							elseif($old != $password)
							{
							
							header("Location: change_password_cio.php?old=ok");
							}
							elseif($old == $password)
							{
							$sql2 = "update all_users set password='$new' where emailID='$name'";
							mysql_query($sql2)or die(mysql_error());							
							header("Location: change_password_cio.php?change=ok");
							}
							else
							{
							
							header("Location: change_password_cio.php?error=ok");
							}
						}
					
					

						?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<!--javascript form validator start-->
<script>
function checkEmail(email) {   
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)) { return false }
    return true;
}
 
function validateForm(formName)
{    
    var obj = document.getElementById(formName);
    
    	if(obj.first_name.value == ""){ alert("First Name can not be blank."); obj.first_name.focus(); return false; } 
    	if(obj.last_name.value == ""){ alert("Last Name can not be blank."); obj.last_name.focus(); return false; } 
	if(obj.email.value == ""){ alert("Email can not be blank."); obj.email.focus(); return false; } 
    	if(obj.select.value == ""){ alert("'I am a' can not be blank."); obj.select.focus(); return false; } 
	if(checkEmail(obj.email.value) == false){ alert("Email must be valid."); obj.email.focus(); return false; }
	if(obj.message.value == ""){ alert("Message can not be blank."); obj.message.focus(); return false; } 
}            
</script>
<!--javascript form validator end-->
                


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
										
			
										 <!--<form  action="<?php $_SERVER["PHP_SELF"];?>" method="post">-->
                        
                                         
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <h1>Change Password</h1>
                                                 
						
													
													<?php if(isset($_REQUEST['dm'])){
														echo '<h1 style="color:red;">New and Confirm do not Match !!</h1>';
														}
														if(isset($_REQUEST['old'])){
														echo '<h1 style="color:red;">Old Password do not Match !!</h1>';
														}
														if(isset($_REQUEST['change'])){
														echo '<h1 style="color:green;">Password Changed !!</h1>';
														}
														if(isset($_REQUEST['error'])){
														echo '<h1 style="color:red;">Error !!</h1>';
														}
													
													?>
                                                  <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" id="myForm" onsubmit="return validateForm(this.id)" >
                                                  <div class="advisory_panel fl" style="height:auto;">
                                                  <!--	<div class="contact_address fl">
                                                    <span>Please feel free to get in touch using these details or the handy form on the right...</span>
                                                      <p>Email: <a href="mailto:contactus@cio-choice.sg">contactus@cio-choice.sg</a><br>
                                                      <br>
                                                        Telephone: +65 9668 2895<br>
                                                        <br>
                                                        Address: 100 Cecil Street,<br>
                                                        #10-01 The Globe, Singapore 069532</p>
                                                    </div> -->
                                                    
                                                    <div style="margin-right: 140px;" class="contact_form fr">
                                                    	<label>* Old Password:</label>
                                                        <input name="old" type="password" required>
                                                        <label>* New :</label>
                                                        <input name="new" type="password" required>
                                                        <label>* Retype:</label>
                                                        <input name="retype" type="password" required>
                                                       														
                                              			<input name="Submit" value="Submit" type="submit">
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                       </form>
                                           <?php
						
           
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

</body>
</html>
