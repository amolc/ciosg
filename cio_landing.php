<?php
session_start();
include('sql_config/database/cio_db.php');
if (isset($_SESSION['username']) && isset($_SESSION['cio']))
{
    $name = $_SESSION['username'];
    $type = $_SESSION['cio'];
    if (isset($_SESSION['corperate_email'])) {

        $corperate_email = $_SESSION['corperate_email'];
        $disnone="";
        $login_type_linkedin="";
        $login_type_result = mysql_query("SELECT login_type FROM cio_user WHERE emailID ='$corperate_email'");
        while ($login_type_row = mysql_fetch_array($login_type_result))
        {
            $login_type_linkedin = $login_type_row['login_type'];

        }
        if($login_type_linkedin == 'Linkedin')
        {
            $disnone = 'none';
        }
        else {
            $disnone = 'block';
        }

    }
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
	<link href="css/text_style.css" rel="stylesheet" type="text/css">

    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="css/tinycarousel.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.tinycarousel.js"></script>

    <!-- Carousel -->
    <link href="css/bootstrap-carousel.css" rel="stylesheet" type="text/css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // alert('okk');
            $("#slider5").tinycarousel({
                axis: "y"
            });

            $('.carousel').carousel({
                interval: 7000
            });
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
	<script>
		
function getCategory()
{
	
	
	$("#div_2").html("<img src=images/loadingAnimation.gif width='550px' align=center>");
	$.getJSON('http://www.globalprompt.org/sg/cio/category/list_category/?callback=?' , function(array) {

	var tbl_body = "";
	var tbl_row ="<tr>";
	var id='';
	var i=0;
	name='';
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {

      
        })
		id=array[i].catID;
		name=array[i].cat_name;
		if(i%2==0)
		{
			tbl_row +="<tr class=\""+( odd_even ? "odd" : "even")+"\">"
		}
		
		tbl_row += "<td><div class='btn-box'><div class='clsButton_red fr'><a href='javascript:void(0);'class='mrgn partner' onClick='get_div(3);get_item("+id+","+'/'+name+'/'+");'>"+array[i].cat_name+"</a></div></div></td>";
		tbl_row +="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		if(i%2==0)
		{
			tbl_body +="</tr>";
		}
		tbl_body += ""+tbl_row+"";

        odd_even = !odd_even; 
		 i++;            
		          
    })
	
	 $("#div_2").html(tbl_body);
	 $("#div_2").show();
 	   
});



}
function get_item(catID,name)
{

	$("#div_3").html("<img src=images/loadingAnimation.gif width='550px' align=center>");
	var tbl_body ="<table>";
	
	
	 tbl_body +="<th>Product List->Survey list</th><th></th><th align='right'>Please enter company name.</th>";
	$.getJSON('http://www.globalprompt.org/sg/cio/category/get_item_for/'+catID+'?callback=?' , function(array) {


	var id='';
	var i=0;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
          
        
        })
		id=array[i].item_ID;
		name=array[i].item_name;
		
		tbl_row += "<td><div class='btn-box'><div class='clsButton_item fr'>"+array[i].item_name+"</div></div></td><td></td><td ><div align='center'><br><textarea value="+id+" name='item'></textarea></div></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even; 
		 i++;            
		          
    })
	  tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";
	   tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";
	 tbl_body += "<td><div align='right'><button class='clsButton_checkout' style='width:200px' onClick='get_div(4);insrt_into_cart("+catID+");'>Submit Survey</button></div></td><td></td><td><div align='right'><button class='clsButton_checkout' onClick='get_div(2);'>Back</button></div></td>";
	
	
	 tbl_body +="</table>"
	 $("#div_3").html(tbl_body);
	 $('#div_3').show();
});
}
function get_div(id)
	{
		for(i=1;i<=4;i++)
		{
			$('#div_'+i).hide();
		
		}
		
		$('#div_'+id).show();
		
	}
</script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(".logincontainer").click(function () {

                $(".logbar").toggle("slow");

            });

        });
    </script>
    <style type="text/css">
        #container {
            width:918px;
            position: relative;
            margin: 0 auto;
            background:#e73535;
        }


        .carousel-indicators li {
            display: inline-block;
            width: 15px;
            height: 15px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #000;
            border: 0px solid #000;
        }

        .carousel-indicators .active {
            width: 13px;
            height: 13px;
            margin: 0;
            background-color: #fff;
            border: 3px solid #000;
        }


    </style>
    <style type="text/css">
        .logout a:hover {
            color: #ADADAD!important;

        }
    </style>

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
// include('sql_config/database/cio_db.php');
include('top_header.php');
?>


<div id="shadow_wrapper"></div>
<div id="black_wrapper">
    <div class="inner_nav">
		<div class="nav fl">
        	<ul>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(1);">HOME</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);">PROFILE</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(2);getCategory();">SURVEY</a></li>
			  <li><a class="menu_ancher">FAQ</a></li>
			  <li><a class="menu_ancher">CONTACT US</a></li> 
			</ul>
		</div>
    </div>
</div>
<div class="landing_head advisory_wrapper" id="div_1">
      <h3>Welcome to CIO Honour <span>SINGAPORE</span></h3>
</div>
<div class="advisory_wrapper landing_head" style="margin-top:30px;" style="display:none;" id="div_2">
</div>
<div class="advisory_wrapper landing_head" style="margin-top:30px;" style="display:none;" id="div_3">
</div>

<!--<div id="cio_area">
    <div class="landing_head" style="margin-top:0px;height:50px;">
        <div class="cio_area_head fl">
            <div class="cio_area fl">
                <h6><img src="images/cio_area_icon.jpg" width="41" height="34">  THE CIO area</h6>
            </div>

            <!--<div class="logout fr">
                <a href="logout.php"><img src="images/logout.jpg" width="17" height="25">logout</a>
            </div>-->
          <!--  <div style="width:115px;display:<?//php echo $disnone; ?>;" class="logout fr">
                <!--   <a href="change_password_ict.php">changePassword</a>-->
              <!--  <a class="logincontainer"><img src="images/change_pass_icon.png" width="22" height="25">Password</a>

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
<?//php
if(isset($_REQUEST['send']))
{
    echo '<div style="text-align: center;width: 760px;margin-left: 287px;color:#585858;margin-top: 20px;font-weight: normal;font-size: 18px;">Thank you for your interest in the survey. It will be mailed to you in the next 12-24 hours. </div>';											}
if(isset($_REQUEST['error']))
{
    echo '<h1 style="color:red;margin-left: 550px;margin-top: 20px;">Survey Not Sent</h1>';
}
?>
<div class="get_in_touch mrgn_top">
    <div id="tab-container">
        <ul class='etabs' style="width:100%;">
            <li class='tab' style="	margin:0px 13px 0px 0px;"><a href="#tab1">NOTICES</a></li>
            <li class='tab' style="	margin:0px 13px 0px 0px;"><a href="#tab2" class="mrgn">REQUEST THE SURVEY</a></li>
        </ul>
        <?//php
        if(isset($_REQUEST['add']))
        {
            echo '<div class="your_register">
                                                    	<h1>Your Registration form will be <span>emailed to you to be stamped</span>, <span>signed</span> and <span>authorized</span> by a representative of the company. </h1>
                                                        <p>Please return your a scanned copy to <a href="#">registration@cio-choice.sg</a>.</p>
                                                    </div><br /><br />';
        }
        ?>
        <div id="tab1"  style="height: auto;width: auto;" class="content three_tabs fl">
            <div class="online_voting_main fl">
                <div class="online_voting fl">

                    <!--carousel start-->

                  <!--  <div id="myCarousel" class="carousel slide" style="width:918px">

                        <ol class="carousel-indicators">
                            <?//php $slide = mysql_query("select * from cio_landing");  ?>
                            <?/php $count = 0;  ?>
                            <?//php while ($row = mysql_fetch_array($slide)){ ?>
                                <?/php if ($count==0){ ?>
                                    <li data-target="#myCarousel" data-slide-to="<?/php echo $count ?>" class="active"></li>
                                <?/php } else {  ?>
                                    <li data-target="#myCarousel" data-slide-to="<?/php echo $count ?>"></li>
                                <?/php } ?>
                                <?/php $count++;  ?>
                            <?/php } ?>
                        </ol>


                        <div class="carousel-inner">

                            <?/php $slide = mysql_query("select * from cio_landing");  ?>
                            </body>?php $count = 0;  ?>
                            </body>?php while ($row = mysql_fetch_array($slide)){ ?>
                                <?/php if ($count==0){ ?>
                                    <div class="item active">
                                        <a target="_blank" href="<?/php echo $row['description'];?>"><img src="admin/<?/php echo $row['path'] ?>" style="margin: 0 auto; height:360px"/></a>
                                    </div>
                                <?/php } else {  ?>
                                    <div class="item">
                                        <?/php if ($row['description']!=""){ ?>
                                            <a target="_blank" href="<?/php echo $row['description'];?>"><img src="admin/<?/php echo $row['path'] ?>" style="margin: 0 auto; height:360px" /></a>
                                        <?/php } else {  ?>
                                            <img src="admin/<?/php echo $row['path'] ?>" style="margin: 0 auto; height:360px" />
                                        <?/php } ?>
                                    </div>
                                <?/php } ?>
                                </body>?php $count++;  ?>
                            <?/php } ?>

                        </div>

                    </div>

                    <!--carousel end-->


           <!--     </div>
                <div class="news fl">
                    <h1>News</h1>
                    <div id="slider5">
                        <a class="prev" href="#"></a>
                        <div class="viewport">
                            <ul class="overview">


                                <?//php
                                $result2 = mysql_query("SELECT * FROM news");
                                while ($row2 = mysql_fetch_array($result2))
                                {
                                    $title = $row2['news_title'];
                                    if (strlen($title) > 30)
                                    {
                                        $stringCut = substr($title, 0, 30);
                                        $title = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                                    }
                                    $description = $row2['news_description'];
                                    if (strlen($description) > 50)
                                    {
                                        $stringCut = substr($description, 0, 100);
                                        $description = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                                    }
                                    //echo '<a style="line-height:22px;" href="view_news.php?id='.$row2['news_id'].'" target="_blank">'.$title.'</a>';
                                    echo '<li><div class="news_detail fl">';
                                    echo '<h2>' . $title . '</h2>';
                                    echo '<h3>' . $row2['news_inserted_date'] . '</h3>';
                                    echo '<p>' . $description . '<a href="view_news.php?id=' . $row2['news_id'] . '" target="_blank">read more</a></p>';
                                    echo '</div></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <a class="next" href="#"></a>
                    </div>
                </div>
                <?/php
                $cio_res = mysql_query("select * from cio_message_board") or die();

                $cio_row = mysql_fetch_array($cio_res);
                ?>
                <div class="message_board fr" style="height:299px">
                    <div>
                        <h2><img src="images/message_icon.jpg" width="29" height="32">Message Board</h2>
                        <span><img src="images/double_dot1.jpg" width="24" height="18"></span>
                    </div>
                    <div class="fl addMargin" style=" width: 505px; ">
                        <?/php echo $cio_row['cio_message'];?>

                        <strong style="color: #fff;">The CIO CHOICE Team</strong>

                    </div>  <img style="float:right;" src="images/double_dot2.jpg" width="24" height="18">
                </div>

            </div>

            </div><!--tab1 close-->

         <!--   <div id="tab2"  style="height: auto;width: auto;" class="content three_tabs fl">

                <div class="online_voting_main fl">
                    <!--
                    <div id="surveyMonkeyInfo"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=R7gdr4H4ovq9Y_2bo2OYufQw_3d_3d"> </script></div>Create your free online surveys with <a href="https://www.surveymonkey.com">SurveyMonkey</a> , the world's leading questionnaire tool.</div>
                    -->
                <!--    <div class="online_survey fl">
                        <div class="send_btn fl"><a href="send_survey.php"></a></div>
                        <div class="online_survey_text fl">
                            <h1>CIO CHOICE <span>ONLINE SURVEY</span></h1>
                            <p>To request the survey, or if you would like to be re-sent a reminder </p>
                            <h2>HIT THE &acute;<a href="send_survey.php"><span>SEND ME THE SURVEY</span></a>&acute; BUTTON</h2>
                            <p>and we’ll have it delivered to your registered email address<br><br>
                                <strong>Registered Email Address: <a href="#" style="color:#e73535;"><?php echo $corperate_email;?></a></strong></p>
                        </div>
                    </div>
                    <div class="having_problems fl">
                        <h3>Having Problems with your Survey?</h3>
                        <p>Please feel free to get in touch by emailing <a href="mailto:survey@cio-choice.sg" style=" color:#616161; font-weight:bold; text-decoration:underline;">survey@cio-choice.sg</a></p>
                    </div>

                </div>

            </div><!--tab2 close-->
     <!--   </div>
        <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
</div>
<?php
include('quick_contact.php');
include('footer.php');
?>




<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
<script type="text/javascript" src="js/scripts.js"></script> -->



<!-- Google CDN jQuery with fallback to local -->
<!--<script type="text/javascript" src="js/jquery.min.js"></script>
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

</script> -->

<!--<script type="text/javascript" src="js/jquery-1.7.1.js"></script>-->
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>



</body>
</html>
