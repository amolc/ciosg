<?php
session_start();
include('sql_config/database/cio_db.php');
if (!empty($_SESSION['username']) && !empty($_SESSION['ict']))
{
    $email = $_SESSION['username'];
    $name = $_SESSION['user_name'];

    if (isset($_SESSION['corperate_email'])) {

        $corperate_email = $_SESSION['corperate_email'];
        $disnone="";
        $login_type_linkedin="";
        $login_type_result = mysql_query("SELECT login_type FROM user_vendor WHERE emailID ='$corperate_email'");
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
<link href="css/text_style.css" rel="stylesheet" type="text/css">

<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link href="css/tinycarousel.css" rel="stylesheet" type="text/css" />

<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/jquery.tinycarousel.js"></script>

<!-- Carousel -->
<link href="css/bootstrap-carousel.css" rel="stylesheet" type="text/css" />




<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // alert('okk');
        $("#slider5").tinycarousel({
            axis: "y"
        });

        $('html, body').animate({scrollTop: 0}, 300);
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
function getContract()
{
	
	
	$("#div_6").html("<img src=images/loadingAnimation.gif width='550px' align=center>");
	$.getJSON('get_contract.php/?callback=?' , function(array) {

	var tbl_body = "<table width='100%'><tbody><tr><th>Contract_id</th><th>Date</th><th>Action</th></tr>";
	var tbl_row ="";
	var id='';
	var i=0;
	name='';
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {

      
        })
		
		
		tbl_row += "<tr><td>"+array[i].contract_id+"</td><td>"+array[i].date+"</td><td><button onClick='view_pdf("+array[i].contract_id+");'>Download</button></td></tr>";
		tbl_row +="<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
		
		tbl_body += ""+tbl_row+"";

       
		 i++;            
		          
    })
	
	 $("#div_6").html(tbl_body);
	 $("#div_6").show();
 	   
});
}

function view_pdf(cid)
{
	//window.open('view_pdf.php');
	
	$.getJSON('view_pdf.php/?callback=?' ,"cid="+cid+"",function( data ) {   
	window.location.href = "http://cio.fountaintechies.com/view_pdf.php"
	var doc=window.open('view_pdf.php');
	doc.document.write(data);
		
	});
}


function get_item(catID,name)
{

	$("#div_3").html("<img src=images/loadingAnimation.gif width='550px' align=center>");
	var tbl_body ="<table>";
	
	
	 tbl_body +="<th>Product List->"+name+"</th><th></th><th align='right'>Please check the Sub-Category you would like to participate.</th>";
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
		
		tbl_row += "<td><div class='btn-box'><div class='clsButton_item fr'><a 'class='mrgn partner'>"+array[i].item_name+"</a></div></div></td><td></td><td ><div align='center'><input type='checkbox' value="+id+" name='item'></div></td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even; 
		 i++;            
		          
    })
	  tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";
	   tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";
	 tbl_body += "<td><div align='right'><button class='clsButton_checkout' style='width:200px' onClick='get_div(4);insrt_into_cart("+catID+");'>Proceed to Participation</button></div></td><td></td><td><div align='right'><button class='clsButton_checkout' onClick='get_div(2);'>Back</button></div></td>";
	
	
	 tbl_body +="</table>"
	 $("#div_3").html(tbl_body);
	 $('#div_3').show();
});
}
function insrt_into_cart(catID)
{
	
	var items = [];
	$.each($("input[name='item']:checked"), function(){            
		items.push($(this).val());
		
	});
	$.post("cart.php" ,{'item_array': items,'catID':catID}).done(function( data ) {   
	if(data=='OK')
	{
    	shopping_cart();
	}
});
 
	
}
function shopping_cart()
{
	
	var id='';
	var i=0;
    var odd_even = false;
	$("#div_4").html("<img src=images/loadingAnimation.gif width='550px' align=center>");
	  var tbl_body ="<div align='right'><button class='clsButton_checkout' style='width:250px' onClick='get_div(2);'>Continue Shopping</button>&nbsp;&nbsp;&nbsp;<button class='clsButton_checkout'  style='width:250px' onClick='generate_pdf();'>Proceed to Participation</button></div>";
	tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td>Check-Out</td></tr>";
    tbl_body +="<table class='table'>";
	tbl_body +="<th>Category</th><th>Item</th><th></th><th>Total</th>";
	tbl_body +="<tr><div class='clsLine' ></div></tr>";
	$.getJSON('get_cart.php?callback=?',function(array){
	
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
          
        
        })
		id=array[i].item_ID;
		tbl_row += "<td>"+array[i].cat_name+"</td><td>"+array[i].item_name+"</td><td><a href='javascript:void(0);' onClick='remove_item("+id+")'><img src=images/delete.png width='20px'></a></td><td>"+array[i].item_price+"</td>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
		tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";
        odd_even = !odd_even; 
		 i++;            
		          
    })
	
	 tbl_body +="</table>"
	 tbl_body +="<div class='clsLine' ></div>";
	
	 tbl_body +="<div align='right'><button class='btn btn-warning' type='button' style='height:33px'>Do you have promotional code?</button>&nbsp;&nbsp;&nbsp;<input type='text' name='' value='' style='height:27px;'>&nbsp;&nbsp;&nbsp;<button class='clsButton_checkout' type='submit'>Apply</button></div>";
	 tbl_body +="<br>";
	tbl_body +="<div align='right'><div class='box'><h5>Estimated Tax:$0<br>Sub-Total:$0<br>Sub-Total:$0</h5></div></div>";
	tbl_body +="<br>";
	  tbl_body +="<div align='right'><button class='clsButton_checkout' style='width:250px' onClick='get_div(2)'>Continue Shopping</button>&nbsp;&nbsp;&nbsp;<button class='clsButton_checkout'  style='width:250px' onClick='generate_pdf();'>Proceed to Participation</button></div>";
	
	 $("#div_4").html(tbl_body);
	 $('#div_4').show();

});
/*alert(items);
*/
}

function generate_pdf()
{
		tbl_body ="<div class='btn-box'><div class='msg_box fl' style='width:auto'>Thank you for your interest to participate in CIO HONOUR. Contract for participation has been created.<br /><br /><div align='right'><button onClick='get_div(6);getContract();'>OK</button></div></div></div>";
		$("#div_5").html(tbl_body);
		get_div(5);
		window.open('generate_pdf.php');
	
}
function remove_item(itemID)
{
		
	$.getJSON('delete_item.php?callback=?',"itemID="+itemID+"",function(res){

	//$.post('delete_item.php',{itemID :itemID}).done(function(res){
	if(res.response=='OK')
	{
		shopping_cart();
	}
	
});
 
	
}
</script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="admin/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="admin/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
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
        setTimeout(function() {
            $('.your_register').remove();

        }, 30000); // <-- time in milliseconds

    });

    function myfunc(id){
        window.location.href = 'http://www.cio-choice.sg/ict_vendor_landing.php?#'+id;
        location.reload();
        $('html, body').animate({scrollTop: 0}, 300);
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".logincontainer").click(function () {

            $(".logbar").toggle("slow");

        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.fancybox').fancybox();

        /*
         *  Different effects
         */

        // Change title type, overlay closing speed
        $(".fancybox-effects-a").fancybox({
            helpers: {
                title : {
                    type : 'outside'
                },
                overlay : {
                    speedOut : 0
                }
            }
        });

        // Disable opening and closing animations, change title type
        $(".fancybox-effects-b").fancybox({
            openEffect  : 'none',
            closeEffect	: 'none',

            helpers : {
                title : {
                    type : 'over'
                }
            }
        });

        // Set custom style, close if clicked, change title type and overlay color
        $(".fancybox-effects-c").fancybox({
            wrapCSS    : 'fancybox-custom',
            closeClick : true,

            openEffect : 'none',

            helpers : {
                title : {
                    type : 'inside'
                },
                overlay : {
                    css : {
                        'background' : 'rgba(238,238,238,0.85)'
                    }
                }
            }
        });

        // Remove padding, set opening and closing animations, close if clicked and disable overlay
        $(".fancybox-effects-d").fancybox({
            padding: 0,

            openEffect : 'elastic',
            openSpeed  : 150,

            closeEffect : 'elastic',
            closeSpeed  : 150,

            closeClick : true,

            helpers : {
                overlay : null
            }
        });

        /*
         *  Button helper. Disable animations, hide close button, change title type and content
         */

        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',

            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,

            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },

            afterLoad : function() {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
            }
        });


        /*
         *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
         */

        $('.fancybox-thumbs').fancybox({
            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,
            arrows    : false,
            nextClick : true,

            helpers : {
                thumbs : {
                    width  : 50,
                    height : 50
                }
            }
        });

        /*
         *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
         */
        $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                openEffect : 'none',
                closeEffect : 'none',
                prevEffect : 'none',
                nextEffect : 'none',

                arrows : false,
                helpers : {
                    media : {},
                    buttons : {}
                }
            });

        /*
         *  Open manually
         */

        $("#fancybox-manual-a").click(function() {
            $.fancybox.open('1_b.jpg');
        });

        $("#fancybox-manual-b").click(function() {
            $.fancybox.open({
                href : 'iframe.html',
                type : 'iframe',
                padding : 5
            });
        });

        $("#fancybox-manual-c").click(function() {
            $.fancybox.open([
                {
                    href : '1_b.jpg',
                    title : 'My title'
                }, {
                    href : '2_b.jpg',
                    title : '2nd title'
                }, {
                    href : '3_b.jpg'
                }
            ], {
                helpers : {
                    thumbs : {
                        width: 75,
                        height: 50
                    }
                }
            });
        });


    });
</script>
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
	function get_div(id)
	{
		for(i=1;i<=6;i++)
		{
			$('#div_'+i).hide();
		
		}
		
		$('#div_'+id).show();
		
	}
</script>
<script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // alert('easytab');
        $('#tab-container').easytabs();

    });
</script>




</head>

<body>
<?php

include('top_header.php');
?>


<div id="shadow_wrapper"></div>
<div id="black_wrapper">
    <div class="inner_nav">
	
		<div class="nav fl">
      
			<ul>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(1);">HOME</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(2);getCategory();">CATEGORY</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(6);getContract();">MY PURCHASE</a></li>
			  <li><a class="menu_ancher">FAQ</a></li>
			  <li><a class="menu_ancher">CONTACT US</a></li> 
			</ul>
		</div>
    </div>
	
	</div>
<div class="advisory_wrapper landing_head" style="display:none;" id="div_1">
    
	 
       
        
        
        <h3>Welcome to CXO Honour <span>Singapore</span></h3>
  </div>
 
 <div class="advisory_wrapper landing_head" style="margin-top:0px;" id="div_2" style="display:none;" >
   
	
	
</div>
 <div class=" advisory_wrapper landing_head" style="margin-top:0px;" id="div_3" style="display:none;" >
   
	
	
</div>
 <div class="advisory_wrapper landing_head"  id="div_4" style="display:none;" >
 
</div>
<div class="advisory_wrapper landing_head"  id="div_5" style="display:none;" >
 

</div> 
<div class="advisory_wrapper landing_head"  id="div_6" style="display:none;" >
 

</div> 

<!--<div id="cio_area">
    <div class="landing_head" style="margin-top:0px;height:50px;">
        <div class="cio_area_head fl">
            <div class="cio_area fl">
                <h6><img src="images/world_icon.jpg" width="43" height="38">   THE ICT VENDOR area</h6>
            </div>

            <!--<div class="logout fr">
                <a href="logout.php"><img src="images/logout.jpg" width="17" height="25">logout</a>
            </div>-->

          
                <!--   <a href="change_password_ict.php">changePassword</a>-->
            <!--   <a class="logincontainer"><img src="images/change_pass_icon.png" width="22" height="25">Password</a>

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
            <!--<div id="inline" style="width:600px;display: none;">--->
            <!--<form id="myForm" onsubmit="return validateForm(this.id)" >-->



            <!--	 <div class="" style="height:auto;">


                    <div style="" class="contact_form fr">
                        <label>* Old Password:</label>
                        <input name="old"  class="old_pass" type="password" required>
                        <label>* New :</label>
                        <input name="new"  class="new_pass" type="password" required>
                        <label>* Retype:</label>
                        <input name="retype"  class="re_pass" type="password" required>

                        <input name="Submit" class="change_pass" value="Submit" type="submit">
                        <span class="mesg"></span>
                    </div>

                  </div>-->

            <!--</form>-->
            <!--</div><!--pop_div-->
      <!--  </div><!--open model-->

    <!--  </div>
</div>
<div style="clear:both;"></div>
</div>
<div id="advisory_wrapper">
<div class="get_in_touch mrgn_top">
<div id="tab-container">
<ul class='etabs' style="width:100%;">
    <li class='tab' style="	margin:0px 13px 0px 0px;"><a href="#tab1">NOTICES</a></li>
    <li class='tab' style="	margin:0px 13px 0px 0px;"><a href="#tab2" class="mrgn">CATEGORIES</a></li>
    <li class='tab'style="	margin:0px 13px 0px 0px;"><a href="#tab3"  class="mrgn">PARTICIPATION FEES  </a></li>
    <li class='tab' style="	margin:0px 13px 0px 0px;"><a href="#tab4" class="mrgn">T & Cs</a></li>
    <li class='tab'><a href="#tab5" class="mrgn">ENTER NOW</a></li>
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

             <!-- <div id="myCarousel" class="carousel slide" style="width:918px">

                <ol class="carousel-indicators">
                    <?//php $slide = mysql_query("select * from ict_vendor_landing");  ?>
                    <?//php $count = 0;  ?>
                    <?//php while ($row = mysql_fetch_array($slide)){ ?>
                        <?//php if ($count==0){ ?>
                            <li data-target="#myCarousel" data-slide-to="<?//php echo $count ?>" class="active"></li>
                        <?//php } else {  ?>
                            <li data-target="#myCarousel" data-slide-to="<?//php echo $count ?>"></li>
                        <?//php } ?>
                        <?//php $count++;  ?>
                    <?//php } ?>
                </ol>

                <div class="carousel-inner">

                    <?//php $slide = mysql_query("select * from ict_vendor_landing");  ?>
                    <?//php $count = 0;  ?>
                    <?//php while ($row = mysql_fetch_array($slide)){ ?>
                        <?//php if ($count==0){ ?>
                            <div class="item active">
                                <a target="_blank" href="<?//php echo $row['description'];?>"><img src="admin/<?p//hp echo $row['path'] ?>" style="margin: 0 auto; height:360px"/></a>
                            </div>
                        <?//php } else {  ?>
                            <div class="item">
                                <?//php if ($row['description']!=""){ ?>
                                    <a target="_blank" href="<?//php echo $row['description'];?>"><img src="admin/<?//php echo $row['path'] ?>" style="margin: 0 auto; height:360px" /></a>
                                <?//php } else {  ?>
                                    <img src="admin/<?//php echo $row['path'] ?>" style="margin: 0 auto; height:360px" />
                                <?//php } ?>
                            </div>
                        <?//php } ?>
                        <?//php $count++;  ?>
                    <?//php } ?>

                </div>

            </div>

        </div>

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
        <?//php
        $res = mysql_query("select * from message_board") or die();

        $row = mysql_fetch_array($res);

        ?>
        <div class="message_board fr">


            <h2><img src="images/message_icon.jpg" width="29" height="32">Message Board</h2>

            <div style="float: left;"> <span><img src="images/double_dot1.jpg" width="24" height="18"></span></div>
            <div  class="addMargin" style="float: left; width: 505px; "> <?//php echo $row['message'];?>
                <br />
                <br />

                <strong style="color: #fff;">The CIO CHOICE Team</strong>
            </div>
            <img style="float:right;" src="images/double_dot2.jpg" width="24" height="18">
        </div>


    </div>

</div><!--tab1 close-->

<!--<div id="tab2"  style="height: auto;width: auto;" class="content three_tabs fl">
	<script>getCategory();</script>
  <div id="category" class="advisory_panel" style="height:400px;">
</div>
    

</div><!--tab2 close-->


<!--</div>
<?php
$sql3 = mysql_query('SELECT * FROM landing_page_content WHERE tab="tab3"');
$row3 =  mysql_num_rows($sql3);
$data3 =  mysql_fetch_array($sql3);
$content_3 = ($row3 >0 ) ? $data3['content'] : '';
?>
<div id="tab3"  style="height: auto;width: auto;" class="content three_tabs fl">
    <div id="content_7" class="advisory_panel" style="height:400px;">

        <?php  //$data3['content'] ;?>

        <div class="article fl">
            <strong style="font-size:18px;">A. </strong>Participation Fee
            <br />
            <ul>
                <li>Registration Fee: <b><u>US$1,000</u></b> for each category of product, service and/or solution submitted.</li>
                <li>License Fee (per category), applicable <b><u>ONLY</u></b> when the specific category of product, service and/or solution registered is conferred CIO CHOICE 2014.</li>
                <ul style="margin-left: 10px;">
                    <li style="background:none;"> - <b><u>US$12,000</u></b> for Company with Local sales revenue USD > 15M.</li>
                    <li style="background:none;"> - <b><u>US$8,000</u></b> for Company with Local sales revenue USD <= 15M.</li>
                </ul>
                <li>All fees are exclusive of local taxes.</li>
                <li>Payment Terms: Net 30 days from Invoice date.</li>

            </ul>

            <p><strong style="font-size:18px;">B.</strong> Please submit a scanned copy of the completed & duly signed Registration Form via email to <a style="color:blue;" href="#">registration@cio-choice.sg</a></p>
            <p><strong style="font-size:18px;">C.</strong> Please send the cheque/ pay order/ demand draft to:</p>
            <p>CORE SERVICES (ASIA) PTE LTD<br>
                100 Cecil Street, #10-01 The Globe<br>
                Singapore 069532 </p>

        </div>

    </div>
</div><!--tab3 close-->
<?php
$sql4 = mysql_query('SELECT * FROM landing_page_content WHERE tab="tab4"');
$row4 =  mysql_num_rows($sql4);
$data4 =  mysql_fetch_array($sql4);
$content_4 = ($row4 >0 ) ? $data4['content'] : '';
?>
<!--<div id="tab4"  style="height: auto;width: auto;" class="content three_tabs fl">
    <div id="content_8" class="advisory_panel" style="height:500px;">
        <?php //  $data4['content'] ;?>

        <div class="article fl">
            <h1>Article 1</h1>
            <h2>1.1 Articles & Definitions</h2>
            <ul>
                <li>“Registration Form” as set out in Article 3.</li>
                <li>“Article” refers to any article in this Terms document.</li>
            </ul>


            <h2>1.2 Participation Fee</h2>
            <ul>
                <li>“CIO” refers to Chief Information Officer and/ or equivalent Decision Maker/ Influencer in the Information and Communications Technology (ICT) domain.</li>
                <li>“Documents” referred to signed copies of both the Terms and the Registration Form.
                    “License” as defined in Article 4.1.</li>
                <li>“License” as defined in Article 4.1.
                </li>
                <li>“License Period” as defined in Article 4.1</li>
                <li>“Organiser” is CORE Services (Asia) Pte Ltd, a company incorporated in Singapore with
                    Registration No. 201404305C with registered office at 100 Cecil St., #10-01 The Globe,
                    Singapore 069532
                </li>
                <li>“Product” refers to Enterprise ICT Product(s), Service(s) and /or Solution(s) generally available and sold in the specific geography
                </li>
                <li>“Programme” is the marketing programme operated by the Organiser known as the “CIO
                    CHOICE” programme as more fully described in these Terms.</li>
                <li>“Programme Year” is the year referred to in the title of a Programme (for example, the
                    Programme Year for “Recognised – CIO CHOICE of the Year 2014” will be 2014.)</li>
                <li>“Territory” is Singapore, unless otherwise specifically stated.</li>
                <li>“Signatory” is the individual who signs these Terms either in his own capacity or on behalf of another upon whose behalf he is authorized to act.</li>
                <li>“Trade Marks” refers to the name logo, devices and get up relating to “Recognised – CIO
                    CHOICE of the Year” or any of them.</li>
                <li>“You” refers to either the Signatory or, where the Signatory signs these Terms on behalf of a person on whose behalf he/ she is authorized to sign, such person. Yours will be interpreted accordingly.</li>
                <li>“Registration Cut-off Date” refers to the date after which Registration Form(s) will not be
                    accepted anymore for participation to the Programme. This date (subject to any changes that the Organiser may in its absolute discretion make and notify to You) will be published by the Organiser on its official website address at www.cio-choice.sg</li>
                <li>“Official Announcement Date” will be the date on which the Recognised status is announced in the recognition event ceremony. This date (subject to any changes that the Organiser may in its absolute discretion make and notify to You) will be published by the Organiser on its official website address at www.cio-choice.sg</li>

            </ul>

            <h2>1.3 Agreement</h2>
            <p>The Signatory, by signing a copy of these Terms (either in his own capacity or on behalf of a
                person upon whose behalf he is authorized to act), will create an Agreement between You and
                the Organiser which will come into force on the date the Terms are signed and which will
                continue until it is terminated in accordance with Articles 5.2 or 5.3.</p>

            <h1 style="margin-top:20px;">Article 2</h1>
            <h2>The Programme</h2>
            <h2>2.1</h2>
            <p>You acknowledge that the Programme is an innovative proprietary, annual marketing programme
                operated by the Organiser which is open, subject to these Terms to new/ existing Product(s) launched in the Territory</p>

            <h2>2.2</h2>
            <p>The Organiser intends that Product(s) of the type typically sold and available in the Territory entered by You into the Programme without limitation as per its relevant category.
            </p>

            <h2>2.3</h2>
            <p>You may submit any new Product of Yours that has been made generally available in the Territory for a minimum period of six months in the market to participate in the Programme.</p>

            <h2>2.4</h2>
            <p>There is a listing of categories in the Registration Form and You may select and propose the appropriate category, however, Product(s) will be classified by the Organiser at its absolute discretion into categories, if your proposed classification is found to be inappropriate. The decision of the Organiser in this regard will be final and binding. The Organiser reserves the absolute right to amend, add or withdraw one or more categories, depending, amongst other things, on the nature and number of applications received, and to assign the Product(s) to the category it deems appropriate.</p>
            <h2>2.5 Multiple Entries</h2>
            <p>You may enter Product(s) in the Programme in different categories. In the case of substantially similar Product(s),or the same Product sold in different sizes and/ or combinations, you may enter only one Product in any category in any Programme Year. However, so long as the Product is different in some significant manner, you may enter more than one Product in the same category. The Organiser will have absolute discretion to accept/ reject the Product(s) into the Programme or into any particular category, to assign Product(s) to categories and to determine if Product(s) that You submit are sufficiently different to warrant multiple entries in a category.</p>



            <h1 style="margin-top:20px;">Article 3</h1>
            <h2>Application to the Programme</h2>
            <h2>3.1 Application Entry</h2>
            <p>The completed Registration Form and full support materials must be sent by you to the Organiser at the latest by the Registration Cut-off Date. The Organiser will have the right to reject (without giving reasons) any Registration Form submitted.</p>

            <h2>3.2</h2>
            <p>You acknowledge that by submitting a completed Registration Form You commit yourself to the whole Programme and in particular to the payment of any fees that become due under Article 5.2. For the avoidance of doubt, you agree to pay these fees to the Organiser and you cannot withdraw from the Programme at any point in time post submitting the entry.</p>

            <h2>3.3</h2>
            <p>The Organiser agrees that, except as otherwise provided in Article 6.3, all information and documents submitted by You will be treated by the Organiser as confidential and will not be disclosed or published without Your consent, except as may be required by law or any regulatory authority. This does not include information that is already available on public domain or already known to the Organisers or and lawfully acquired from the third party.</p>

            <h2>3.4 Procedure to recognise a Product</h2>
            <p>The procedure to be adopted by the Organiser to recognise a Product is as follows: (subject to any changes that the Organiser may in its absolute discretion make and notify to You.):</p>

            <h2>3.4.1 CIO Votes</h2>
            <p>The Product(s) to be “Recognised – CIO CHOICE of the Year” for each category will be determined based on the votes expressed by those CIOs within the respondent group, who have/ may have purchased/ used one or more of the Product(s) in the particular category. The group will be reasonably representative of the population of CIOs (as determined by the Organiser) and will consist of statistically an appropriate sample size. The voting survey is conducted online on our website www.cio-choice.sg.</p>



            <h1 style="margin-top:20px;">Article 4</h1>
            <h2>4.1 Organiser´s rights in the Trade Marks</h2>
            <p>You acknowledge that the Trade Marks are the exclusive trademarks of the Organiser or its licensors. You agree not to apply for or obtain registration of the Trade Marks for any goods or services in any jurisdiction, nor use the Trade Marks (or anything confusingly similar to the Trade Marks) as a company, business, trade or Product name in any jurisdiction.</p>

            <h2>4.2 Recognised Product Trade Marks license</h2>
            <p>Subject to You making the payments set out in Article 5, if Your Product is selected Under Article 3.4.1. to be “Recognised – CIO CHOICE of the Year” in a particular category, You will be granted a limited, revocable, non transferable, non assignable license (License) to use the Trade Marks only in the assigned Territory subject to the following additional terms:</p>

            <ul>
                <li>The duration of such License is limited to the period of one year commencing from Official Announcement Date; time being of the essence.</li>
                <li>You (will obtain the Organiser’s approval for all uses of the Trade Marks and) will comply at all times with the reasonable instructions and the directions from the Organiser in relation to your use of the Trade Marks under License. The Trade Marks may only be used in the form, dimensions and graphic representation approved, in each instance, in writing by the Organiser in its sole discretion.</li>
                <li>You may use the Trade Marks only on or in relation to the recognised Product and that Product alone. Unless otherwise approved in each instance by the Organiser You may not use the Trade Marks on packaging or advertising, which includes products other than the Recognised Product.</li>
                <li>The Trade Marks may only be used in advertising aimed primarily within the assigned Territory and on products which are intended for sale within that territory.</li>
                <li>The Trade Marks may only be used in relation to the recognised Product in the same form and composition as the Product is presented in the Registration Form submitted in respect of it under Article 3.2.</li>
                <li>Every use of the Trade Marks will be accompanied by a reference to the Programme Year (e.g 2014), category (e.g. in the System Integrator category) for which the Product was recognised except on packaging where the space does provide for all the information, the Trade Mark and the category will suffice. (E.g.”Recognised: XYZ Category”) All creative material(s) for release must be approved by the Organiser for correctness of the recognised status reference.</li>
                <li>The Organiser will have the right, in its absolute discretion, to permit the use of the Trade Marks for groupings of some or all of the recognised Products for the purpose of promotions directly or indirectly referring to “CIO CHOICE 2014”, subject to Article 4.2e and 4.2f above.</li>
                <li>The Trade Marks may be used by the recognised products to advertise their “CIO CHOICE 2014” status but may not be used to make any reference to the other participants in any category. If there is any breach of Article 4, then the Organiser would be entitled to deprive You of the “CIO CHOICE 2014” status.</li>
            </ul>

            <h2>4.3 Termination of Use CIO Votes</h2>
            <p>You undertake to monitor the use of the Trade Marks under the License to ensure that it is no longer used on any product or advertising / marketing material after the License End Date, time being of the essence in particular, but without limitation. You will stop manufacturing or ordering Products and packaging incorporating the Trade mark sufficiently early so that all the Products and packaging incorporating the Trade Marks are reasonably likely to be sold before the expiry of the License.</p>

            <h2>4.4Limitations on Use / Right to terminate</h2>
            <p>Breach of Article 4 will give the Organiser, in its sole discretion, the right to terminate immediately and without notice the License granted to You under Article 4.2. Notwithstanding such termination, You shall remain liable to pay the Organiser the amount due under Article 5.</p>


            <h1 style="margin-top:20px;">Article 5</h1>
            <h2>Fees</h2>
            <h2>5.1 Registration Fee</h2>
            <p>You agree to pay the Registration Fee amount specified on the Registration Form or such other ordering document as otherwise agreed between You and the Organiser for participation of your Product in the Programme. The total fees payable is sum of the Registration Fee multiplied by the number of Products submitted for participation in the Programme.</p>

            <p>Unless otherwise provided in the Registration Form, all payments are due within thirty (30) days from date of invoice. In the event that you fail to make the payment within the stipulated time, your entry may be withdrawn solely at the discretion of the organiser but the liability to pay once entered continues irrespective of the discretion exercised by the organiser. Should your Registration Fee remain outstanding at the time of the official announcement of results, your product may not be declared the Recognised product, even if so voted and the next high scoring product may be selected for Recognition at the sole discretion of the Organiser.
            </p>

            <h2>5.2 License Fee</h2>
            <p>You agree to pay the License Fee amount specified on the Registration Form or such other ordering document as otherwise agreed between You and the Organiser in respect of each Product submitted by You being selected for Recognition by the Programme in consideration to the grant of the License under Article 4.1. The total fees payable is sum of the License Fee multiplied by the number of your Products recognised by the Programme.</p>

            <p>Unless otherwise provided in the Registration Form, all payments are due within thirty (30) days from date of invoice.You will not be allowed to make use of the Trade Mark prior to receipt of such payments. Failure to make such payments may at the discretion of the Organiser, result in all Your Products being disqualified from the Programme and, upon the Organiser giving You written notice, this agreement will being terminated immediately. Your liability to make any payment due will remain.</p>

            <p>The License Fee becomes payable upon your Product being selected for Recognition by the Programme and has no bearing whatsoever to whether you choose to use the Trade Marks or not during the License Period and whether You continue to market/sell the recognised Product during the year or part thereof.</p>



            <h1 style="margin-top:20px;">Article 6</h1>
            <h2>6.1 Force majeure</h2>
            <p>The Organiser will not be liable for failure to perform any obligation under these Terms to the extent that it is caused due to forces beyond its control.</p>

            <h2>6.2 Acceptance of Terms</h2>
            <p>Participation in the Programme involves full and entire acceptance of these Terms. You must accept these Terms by signing them personally or by having an authorized signatory sign them.</p>

            <h2>6.3 Agreement to use of name</h2>
            <p>If your Product(s) is / are selected for Recognition, You permit the Organiser to give out Your name, address and a description of the recognised Product(s) together with a qualitative analysis of the results of the CIO voting survey conducted by or on behalf of the Organiser under Article 3.4.1 as part of the publication and promotion of the Programme.You will also permit the Organiser to share Your name and the recognised product name, with the Organiser’s media partners for the duration of the Programme Year.</p>

            <h2>6.4 Interpretation by the Organiser</h2>
            <p>Any question regarding the interpretation or application of these Terms or any other questions relating to the Programme will be settled solely by the Organiser, in its discretion.</p>

            <h2>6.5 Headings</h2>
            <p>The headings in these Terms are for convenience only and are in no way intended to describe, interpret, define, or limit the scope, extent, or intent of these Terms or any of their provisions.</p>

            <h2>6.6 Entire agreement</h2>
            <p>These Terms and the documents referred to in them constitute the entire agreement between You and the Organiser and supersede all other agreements or arrangements, whether written or oral, express or implied, between You and the Organiser.</p>

            <h2>6.7 Taxes and Duties</h2>
            <p>All payments are to be made by You under these Terms are exclusive of all applicable taxes and duties, which will, where applicable, be paid in addition by You.</p>

            <h2>6.8 Authority to execute</h2>
            <p>The signatory executing these Terms on behalf of another person represents and warrants that he/ she is empowered to execute them and that all necessary action to authorise their execution has been taken.</p>

            <h2>6.9 Governing law and jurisdiction</h2>
            <p>This Agreement shall be governed, interpreted and enforced in accordance with the laws of Singapore without regard to conflict of law principles. The courts of Singapore will have sole and exclusive jurisdiction with respect to any disputes arising out of this Agreement.</p>



        </div>

    </div>
</div><!--tab4 close-->
<?php


$inactive = 500;
if(isset($_SESSION['enter_now_msg']))
{
    $enter_now_msg = $_SESSION['enter_now_msg'];
    echo $enter_now_msg;

    $session_life = time() - $_SESSION['start'];
    if($session_life > $inactive)
    {
        session_destroy();
    }

}

?>
<!--<div id="tab5" style="height: auto;width: auto;" class="content three_tabs fl">

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
                    $('.category').before('<div class="categroy_created"><h2 class="form_heading" style="color:#c5ac35;">Entry '+i+'</h2><div class="field fl"><span class="input_lable fl">ICT Category & Code: </span> <span class="input_lable fl"  style="width:400px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please see categories found on the <a href="http://cio-choice.sg/ict_vendor_landing.php#tab2" target="_self" style="text-decoration:underline; font-weight:bold; color:#20201F;">categories</a>  tab)</span><br /><input type="text" name="category_code[]" id="category_code" class="fl input_field" required/></div> <div class="field fl"><span class="input_lable fl" style="width:438px; height:25px; display:block; padding:0px;">&nbsp;</span><span class="input_lable fl">Product/ Service/ Solution Name:</span><br /><input type="text" name="solution[]" id="solution" class="fl input_field" required/></div><div class="field fl"><span class="input_lable fl">Brand Name:</span><br /><input type="text" name="brand_name[]" id="country" class="fl input_field" required/></div><div class="field fl" style="width:910px; margin:0px;"><span class="input_lable fl">Product Description: </span><span class="input_lable fl"  style="width:910px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please do not make description longer than 100 words)</span><br /> <textarea name="product_description[]" class="fl input_field" id="post_code" style="width:890px; height:180px; padding:10px;" required></textarea></div></div>');
                }
            }

        });
    });
</script>



<?php
include('sql_config/database/cio_db.php');

if(isset($_POST['Submit']))
{

    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $title = $_REQUEST['title'];
    $email = $_REQUEST['email'];
    $user_telephone = $_REQUEST['telephone'];
    $user_mobile = $_REQUEST['mobile'];
    $company_name = $_REQUEST['company_name'];
    $company_address = $_REQUEST['company_address'];
    $company_telephone = $_REQUEST['company_telephone'];
    $post_code = $_REQUEST['post_code'];
    $country = $_REQUEST['country'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $company_size = $_REQUEST['company_size'];
    $cio_category_no = $_REQUEST['cio_category_no'];
    $category_code = $_REQUEST['category_code'];
    $solution = $_REQUEST['solution'];
    $brand_name = $_REQUEST['brand_name'];
    $product_des = $_REQUEST['product_description'];
    $term = $_REQUEST['term'];
    $fee_part = $_REQUEST['fee_part'];
    //echo $term;exit;
    // $filter = explode("@",$email);
    // if($filter[1] == "gmail.com" || $filter[1] == "yahoo.com" || $filter[1] == "hotmail.com"|| $filter[1] == "outlook.com")  {
    // header("Location: enter_form.php?email_error=ok");
    // }
    // else
    // {
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

        $headers .= 'From: registration@cio-choice.sg' . "\r\n";

        // $to = $email;
        $to = $corperate_email;

        $subject = "ICT Vendor - Submission Form";
        // $message = '<a href="http://cio-choice.sg/pdf/htmlTO_pdf/form.php?vendor_id='.$partner_id.'">Click here</a> to download PDF';
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
												Thank you for your participation<br>
												with CIO CHOICE
											</h1>
											<p style=" float:left; width:90%; display:block; font-family: Arial, Helvetica, sans-serif; line-height:20px; text-align: left; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">
												1. Please <a href="'.$web_url.'/pdf/htmlTO_pdf/form.php?vendor_id='.$partner_id.'" style="text-decoration:underline; font-weight:bold; color:#20201f;">download your CIO CHOICE pdf entry form</a> and proceed to <strong>stamp, sign</strong> and <strong>authorize it by a representative</strong> of your company.</p>

												<div style="float:left; margin:20px 20px 10px 35px;">
                       		<a href="'.$web_url.'/pdf/htmlTO_pdf/form.php?vendor_id='.$partner_id.'" style="width:200px; text-align: left; line-height:35px; text-shadow:0px 2px #4b0e0e; float:left; color:#FFF; font-family:Lato; font-weight:bold; font-size:16px; text-decoration:none; border-radius:15px; text-transform:uppercase; letter-spacing:1px; background: -webkit-linear-gradient(#e63535, #c11e1e); /* For Safari 5.1 to 6.0 */ background: -o-linear-gradient(#e63535, #c11e1e); /* For Opera 11.1 to 12.0 */ background: -moz-linear-gradient(#e63535, #c11e1e); /* For Firefox 3.6 to 15 */ background: linear-gradient(#e63535, #c11e1e); /* Standard syntax */">
													<img src="'.$web_url.'/images/download_pdf.png" width="23" height="22" style="margin: 6px 10px 0 13px; float:left;">
													Download PDF
												</a>
                        </div>

                        <p style=" float:left; width:90%; display:block; font-family: Arial, Helvetica, sans-serif; text-align: left; line-height:20px; margin:15px 5% 0px 5%; padding:0px; font-size:15px; font-weight:400;">2.  Scan and return your completed form to <a href="mailto:registration@cio-choice.sg" style="color:#312f2f; font-weight:bold;">registration@cio-choice.sg</a><br>
<br>
Once we receive your completed form, we&acute;ll be in touch to confirm your details and let you know you are successfully registered for your selected CIO CHOICE Categories.<br>
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

												<li style="	float:left; list-style-type: none; border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/index.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px 0px 0px;">Home</a></li>

												<li style="	float:left; list-style-type: none;  border-right:#504d4d solid 2px; margin:0px;"><a href="'.$web_url.'/login.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 10px;">Login</a></li>

												<li style="	float:left; list-style-type: none; margin:0px;"><a href="'.$web_url.'/privacy_policy.php" style="float:left; font-family: Arial, Helvetica, sans-serif; display: block; font-size:13px; font-weight:bold; color:#585858; text-decoration: underline; padding:0px 0px 0px 10px;">Privacy Policy</a></li>
											  </ul>
											  <p style=" float:left; font-family: Arial, Helvetica, sans-serif; width:100%; display:block; font-size:13px; font-weight:400; color:#504d4d; margin:15px 0px;">Copyright &copy; 2014 CIO CHOICE Singapore. All Rights Reserved.</p>
										  </div>
										</div>

									  </div>



									</div>

									<div style="float:left; margin:0px; width:100%; font-size:12px; color:#616161; font-family: Arial, Helvetica, sans-serif; font-weight:400px;">
									This e-mail was sent to <a href="#" style="color:#616161; text-decoration:underline;">'.$corperate_email.'</a> and contains information directly related to your CIO CHOICE account. This is a one-time email. You received this email because you signed up for a CIO CHOICE account. Please do not reply to this email. If you want to contact us, please contact us directly. </div>

									<div style="clear:both;"></div>
							</div></body></html>';
        $from = "registration@cio-choice.sg";




        //mail($to,$subject,$message,$headers);
        require 'admin/classes/PHPMailer-master/PHPMailerAutoload.php';


        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';                       // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'dayseven';                   // SMTP username
        $mail->Password = '7sendgrid';               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
        $mail->setFrom('registration@cio-choice.sg', 'CIO CHOICE');     //Set who the message is to be sent from
        $mail->addReplyTo('registration@cio-choice.sg', 'CIO CHOICE');  //Set an alternative reply-to address

        $mail->addAddress($to);
        $mail->AddCC('registration@cio-choice.sg', 'CIO CHOICE');
        $mail->AddCC('andre.tan@day7.co');
        $mail->AddCC('matthew.harper@day7.co');
        $mail->AddCC('preeti@cio-choice.sg');


        $mail->WordWrap = 500;
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject ;
        $mail->Body    = $message ;

        if($mail->send()){


            echo'<script>window.location.replace("ict_vendor_landing.php?action=yes&email=ok#tab5");</script>';

           // echo'<script type="text/javascript"> $(document).ready(function() { $("html, body").animate({scrollTop: 0}, 300); }); </script>';

            session_start();
            $_SESSION['enter_now_msg']='
                                                        <div class="your_register">
                                                         <h1>Your Registration form will be <span>emailed to you to be stamped</span>, <span>signed</span> and <span>authorized</span> by a representative of the company. </h1>
                                                         <p>Please return your a scanned copy to <a href="mailto:registration@cio-choice.sg">registration@cio-choice.sg</a>.</p>
                                                        </div><br /><br />';
        }

    }
    // }

}
?>







<!--<form  action="" method="post">-->
<!--<form action="" method="post">

    <div id="advisory_wrapper_bk">

        <div class="get_in_touch" style="margin-top:0px;">

            <?php


            if(isset($_REQUEST['add']) )
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
                    <input type="text" name="email" id="email" class="keyup-email-2 fl input_field" required/>
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
                    <span class="input_lable fl" style="width:438px; display:block;">Local Sales Revenue:</span>
                    <br />
                    <label for="" style="float:left; margin-top:7px; font-size:17px; color:#20201F;">Less than $USD 15 Million</label>
                    <input type="radio" name="company_size" id="company_size" value="less" class="" style="margin:10px 0px 0px 10px; float:left;"/>
                    <label for="" style="float:left; margin:7px 0px 0px 15px; font-size:17px; color:#20201F;">More than $USD 15 Million</label>
                    <input type="radio" name="company_size" id="company_size" value="more" class="" style="margin:10px 0px 0px 10px; float:left;"/>
                </div>

                <h2 style="width:435px" class="form_heading">3. Product / Service / Solution Detail </h2>

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
                    <span class="input_lable fl"  style="width:800px; font-weight:normal; padding:0px; margin-left:15px;">( Each category entry form must be completed, details of the ICT categories is found on the <a href="http://www.cio-choice.sg/ict_vendor_landing.php?#tab2" target="_blank" style="text-decoration:underline; font-weight:bold; color:#20201F;">categories</a> tab)</span>
                </div>
                <div class="category"></div>
                <div class="category1">

                    <h2 class="form_heading" style="color:#c5ac35;">Entry 1</h2>


                    <div class="field fl">
                        <span class="input_lable fl">ICT Category & Code: </span>
                        <span class="input_lable fl"  style="width:400px;height:25px; display:block; font-weight:normal; padding:0px; margin:0px;">(Please see categories found on the <a href="http://www.cio-choice.sg/ict_vendor_landing.php?#tab2" target="_blank" style="text-decoration:underline; font-weight:bold; color:#20201F;">categories</a>  tab)</span>
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
                <!-- <h2 class="form_heading">4. Build your application</h2> -->

              <!--  <div class="field fl" style="width:800px;">
                    <input type="checkbox" name="term"  value="1" required/> <label for="" class="input_lable" style="padding:0px;">I agree with the <a href="http://www.cio-choice.sg/ict_vendor_landing.php?#tab4" target="_blank" style="text-decoration:underline; font-weight:bold; color:#20201F;">Terms &amp; Conditions</a> related to CIO CHOICE registration</label>
                </div>
                <div class="field fl" style="width:800px;">
                    <input type="checkbox" name="fee_part"  value="yes" /> <label for="" class="input_lable" style="padding:0px;">I accept the CIO CHOICE  <a href="http://www.cio-choice.sg/ict_vendor_landing.php?#tab3" target="_blank" style="text-decoration:underline; color:#20201F; font-weight:bold;">Participation Fees</a></label>
                </div>
                <div >
                    <a href="#">
                        <input class="enter_form_send" type="submit" value="" name="Submit">
                    </a>
                </div>
</form>


</div>
<?php }?>
</div>
<div style="clear:both;"></div>
</div>
</div><!--tab2 close-->
<!--<div id="tab6" style="height: auto;width: auto;" class="content three_tabs fl" >
  <div id="item_display" class="advisory_panel" style="height:400px;">
	</div>
    
</div><!--tab-container end-->
</div><!---->
<!--<div style="clear:both;"></div>
</div>


<?php
include('quick_contact.php');
include('footer.php');
?>



<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js" type="text/javascript"></script>
<script type="text/javascript" src="js/scripts.js"></script>-->



<!-- Google CDN jQuery with fallback to local -->
<!-- <script type="text/javascript" src="js/jquery.min.js"></script>
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

</script>-->

<!-- <script type="text/javascript" src="js/jquery-1.7.1.js"></script>-->
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>

<script type="text/javascript" src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
    (function($){
        $(window).load(function(){
            $("#content_6").mCustomScrollbar({
                scrollButtons:{
                    enable:true
                },
                advanced:{
                    updateOnContentResize:true
                },
                theme:"dark-thick"
            });

            $("#content_7").mCustomScrollbar({
                scrollButtons:{
                    enable:true
                },
                advanced:{
                    updateOnContentResize:true
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
</script>

<script type="text/javascript">
    $(document).ready(function() {

        // Animate the scroll to top
        /*
        $('.enter_form_send').delay(500).click(function(event) {

            $('html, body').animate({scrollTop: 0}, 300);
        })
         */

        $(function(){
            $('.carousel').carousel({
                interval: 7000
            });
        });

    });

</script>


</body>
</html>
