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
<title>CIO HONOUR</title>
<link rel="icon" type="image/png" href="cxo_fav_ico.png">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style_vendor.css" rel="stylesheet" type="text/css">


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
	$("#div_2").html("<div align='center' style='margin-top:150px;margin-bottom:150px;'><img src=images/loader.gif width='150px' align=center></div>");
	$.getJSON('http://www.globalprompt.org/sg/cio/category/list_category/?callback=?' , function(array) {

	var tbl_body = "<div class='clsMiddle'><div class='clsMid_cont_cio'><div class='clsCat_tlt'><h2>Category</h2></div><div class='clsCo_Serv_cont clearfix'>";
	
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
		if(i%3==0)
		{
			tbl_row +="<div class='clsCo_Serv_cont clearfix'>";
		}
		
		tbl_row += "<a href='javascript:void(0);' class='clsCo_frt_serv_bx' onClick='get_div(3);get_item("+id+","+'/'+name+'/'+");'><b>"+array[i].cat_name+"</b></a>";
		
		if(i%3==0)
		{
			tbl_body +="</div>";
		}
		tbl_body += ""+tbl_row+"";

        odd_even = !odd_even; 
		 i++;            
		          
    })
	tbl_body +="</div></div>";
	 $("#div_2").html(tbl_body);
	 $("#div_2").show();
 	   
});



}
function getContract(status)
{
	
	
	get_div(6);
	$("#div_6").html("<div align='center'  style='margin-top:150px;margin-bottom:350px;'><img src=images/loader.gif width='150px' align=center></div>");
	$.getJSON('get_contract.php/?callback=?' , function(array) {

	var tbl_body = "<div class='clsMiddle'><div class='clsMid_cont_cio'><div id='contract_msg'><h2>Your contract created successfully</h2></div><div class='clsCat_tlt'><h2>Contract List</h2></div><div class='clsCo_frt_top'><div class='clsC1_list_cont clearfix'><div class='clsC1_list_bx'><h1>Contract_id</h1></div><div class='clsC1_list_bx'><h1>Date</h1></div><div class='clsC1_list_bx'><h1>Action</h1></div></div></div>";
	var tbl_row ="";
	var id='';
	var i=0;
	name='';
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {

      
        })
		
		
		
		tbl_row +="<div class='clsCo_frt_1'><div class='clsC1_list_cont clearfix'><div class='clsC1_list_bx'><h2>"+array[i].contract_id+"</h2></div><div class='clsC1_list_bx'><h2>"+array[i].date+"</h2></div><div class='clsC1_list_bx'><div class='clsCo_frt_btn_sml' style='width:150px;'><h2><a href='/view_pdf.php?id="+array[i].contract_id+"' target='_blank'>Download</a></h2></div></div></div></div>";
		
		tbl_body += ""+tbl_row+"";

       
		 i++;            
		          
    })
	tbl_row +="<div class='clsCo_frt_bot clearfix'><div class='clsCo_frt_btn2' style='width:100px;'><h2>Back</h2></div></div></div></div>";
	tbl_body += ""+tbl_row+"";
	
	 $("#div_6").html(tbl_body);
	 $("#div_6").show();
	 if(status==1)
	{
		$('#contract_msg').show().delay(5000).hide(0);;
	}
	else
	{
		$('#contract_msg').hide();
	}
 	   
});
}
function view_pdf(cid)
{
	$.post('view_pdf.php',{'cid':cid},function(res){
		//var doc=window.open('view_pdf.php');
	});
	
}
function get_item(catID,name)
{

	$("#div_3").html("<div align='center'  style='margin-top:150px;margin-bottom:150px;'><img src=images/loader.gif width='150px' align=center></div>");
	var tbl_body ="<div class='clsMiddle'><div class='clsMid_cont_cio'><div class='clsCat_tlt'><h2>Category"+name+"</h2></div><div class='clsCo_frt_top'><h2>Please select the Sub-Category you would like to participate.</h2></div>";
	$.getJSON('http://www.globalprompt.org/sg/cio/category/get_item_for/'+catID+'?callback=?' , function(array) {

	var id='';
	var i=0;
	var j=1;
    var odd_even = false;
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
          
        
        })
		
		id=array[i].item_ID;
		name=array[i].item_name;
		tbl_row += "<div class='clsCo_frt_"+j+"'><div class='clsCio_inp'><input type='checkbox' value="+id+" name='item'></div><h2>"+array[i].item_name+"</h2></div>";
		
       	if(i%2==0)
		{
			j=2;
		}
		else
		{
			j=1;
		}
		 i++;   
		 tbl_body += ""+tbl_row+"";         
		          
    })
	    
	    tbl_body +="<div class='clsCo_frt_bot clearfix'><a href='javascript:void(0);' class='clsCo_frt_btn' style='width:200px;' style='width:200px' onClick='get_div(4);insrt_into_cart("+catID+");'>Proceed to Participation</a><a href='javascript:void(0);' class='clsCo_frt_btn2' style='width:100px;'  onClick='get_div(2);'>Back</a></div>";
	 
	 tbl_body +="</div></div>";
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
	j=1;
	var total=0;
    var odd_even = false;
	$("#div_4").html("<div align='center'  style='margin-top:150px;margin-bottom:150px;'><img src=images/loader.gif width='150px' align=center></div>");
	  var tbl_body ="<div class='clsMid_cont_cio'><div class='clsCat_tlt'><h2>Check-Out</h2></div><div class='clsCo_frt_top'><div class='clsC1_list_cont clearfix'><div class='clsC1_list_bx2'><h1><b>Category</b></h1></div><div class='clsC1_list_bx2'><h1><b>Item</b></h1></div><div class='clsC1_list_bx3'><h1><b>Delete</b></h1></div><div class='clsC1_list_bx3'><h1><b>Total</b></h1></div></div></div>";
	
	$.getJSON('get_cart.php?callback=?',function(array){
	
    $.each(array, function(key,val) {
        var tbl_row = "";
        $.each(this, function(k , v) {
          
        
        })
		id=array[i].item_ID;
		total +=parseInt(array[i].item_price);
		tbl_row +="<div class='clsCo_frt_"+j+"'><div class='clsC1_list_cont clearfix'><div class='clsC1_list_bx2'><h2>"+array[i].cat_name+"</h2></div><div class='clsC1_list_bx2'><h2>"+array[i].item_name+"</h2></div><div class='clsC1_list_bx3'><h2><a href='javascript:void(0);' onClick='remove_item("+id+")'><img src='images/dlt_ico.png' width='15px;'/></a></h2></div><div class='clsC1_list_bx3'><h2>S$"+array[i].item_price+".00</h2></div></div></div>";
		if(i%2==0)
		{
			j=2;
		}
		else
		{
			j=1;
		}
      
		 i++;    
		 tbl_body += ""+tbl_row+"";           
		          
    })
	tbl_body +="<div class='clsCo_frt_2'><div class='clsC1_list_cont'><h2><div align='right'><button style='height:33px;' type='button' class='btn btn-warning'>Do you have promotional code?</button>&nbsp;&nbsp;&nbsp;<input type='text' style='height:27px;'>&nbsp;&nbsp;&nbsp;<button style='height:33px;' type='button' class='btn btn-warning'>Apply</button></div></h2></div></div>";
	 tbl_body +="<div class='clsCo_frt_1'><div class='clsC1_list_cont clearfix'><div class='clsC1_list_bx2'><h2></h2></div><div class='clsC1_list_bx2'><h2></h2></div><div class='clsC1_list_bx3'><h2 style='width:100px;'>Estimated Tax : </h2></div><div class='clsC1_list_bx3'><h2>S$00.00</h2></div></div></div>";
	 tbl_body +="<div class='clsCo_frt_2'><div class='clsC1_list_cont clearfix'><div class='clsC1_list_bx2'><h2></h2></div><div class='clsC1_list_bx2'><h2></h2></div><div class='clsC1_list_bx3'><h2>Total : </h2></div><div class='clsC1_list_bx3'><h2>$"+total+".00</h2></div></div></div>";
	
	/*tbl_body +="<div class='clsCo_frt_2'><div align='right'><div class='clsCo_frt_btn3' style='width:200px;'><p style='font-size:14px;' ><b>Estimated Tax : $0</b></p><br><p style='font-size:18px;'><b>Total : $"+total+".00<b></p></div></div></div>";
	
	 /*tbl_body +="<div class='clsCo_frt_2'><div class='clsC1_list_cont'><h2><div align='right'><button style='height:33px;' type='button' class='btn btn-warning'>Do you have promotional code?</button>&nbsp;&nbsp;&nbsp;<input type='text' style='height:27px;'>&nbsp;&nbsp;&nbsp;<button type='submit' class='clsButton_checkout'>Apply</button></div></h2></div>	
</div>";generate_pdf();*/

	 tbl_body +="<div class='clsCo_frt_bot clearfix'><div class='clsCo_frt_btn2' style='width:200px;'><h2><a href='javascript:void(0);' onClick='proceed_to_oarticipation();'>Proceed to Participation</a></h2></div><div style='width:200px;' class='clsCo_frt_btn'><h2><a href='javascript:void(0);' onClick='get_div(2);getCategory();'>Continue Shopping</a></h2></div></div>";
	
	 tbl_body +="<br />";
	// tbl_body +="<div class='clsCat_tlt'><h2>Enterprise Participation Form</h2></div><div class='clsCont_form_bx'><div class='clsC1_list_cont clearfix'><div class='clsLD_Bx_frm'><div class='clsCont_form'><h2>Company Name</h2><div><input type='text' class='clsInput' name='cname' id='cname' ></div><h2>Address 1</h2><div><input type='text' class='clsInput' name='add1' id='add1' ></div><h2>Address 2</h2><div><input type='text' class='clsInput' name='add2' id='add2' ></div><h2>City</h2><div><input type='text' class='clsInput' name='city' id='city'></div><h2>Country</h2><div><input type='text' class='clsInput' name='country' id='country'></div></div></div><div class='clsLD_Bx_frm'><div class='clsCont_form'><h2>Website</h2><div><input type='text' class='clsInput' name='website' id='website'></div><h2>Email</h2><div><input type='text' class='clsInput' name='email' id='email'></div><h2>Contact Name</h2><div><input type='text' class='clsInput' name='contact_name' id='contact_name'></div><h2>Designation</h2><div><input type='text' class='clsInput' id='desg' name='desg'></div><h2>Phone Number</h2><div><input type='text' class='clsInput' name=''></div></form></div></div><div style='width:200px;margin-left:17px;' class='clsCo_frt_btn'><h2>SUBMIT</h2></div></div></div></div>	</div>	";
		
		
	  tbl_body +="</div>";
	
	 $("#div_4").html(tbl_body);
	 $('#div_4').show();

});
/*alert(items);
*/
}
function proceed_to_oarticipation()
{
	 get_div(7);
	 $('#middle').show();

}
function save_contract()
{
				var cname=document.getElementById('cname').value;
				var add1=document.getElementById('add1').value;
				var add2=document.getElementById('add2').value;
				var city=document.getElementById('city').value;
				var country=document.getElementById('country').value;
				var website=document.getElementById('website').value;
				var email=document.getElementById('email').value;
				var designation=document.getElementById('designation').value;
				var contact_name=document.getElementById('contact_name').value;
				var phone_number=document.getElementById('phone_number').value;
				
	$.post("generate_pdf.php" ,{'cname': cname,'add1':add1,'add2':add2,'city': city,'country':country,'website': website,'email':email,'designation': designation,'contact_name':contact_name,'phone_number': phone_number}).done(function( data ) {   
	if(data=='OK')
	{
    	/*tbl_body ="<div class='btn-box'><div class='msg_box fl' style='width:auto'>Thank you for your interest to participate in CIO HONOUR. Contract for participation has been created.<br /><br /><div align='right'><button onClick='get_div(6);getContract();'>OK</button></div></div></div>";
		$("#div_5").html(tbl_body);
		get_div(5);*/
		//alert("hiii");
		
		getContract("1");
		
	}
});
		
	
}
function remove_item(itemID)
{
//$.getJSON('delete_item.php?callback=?',"itemID="+itemID+"",function(res){
		
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
		for(i=1;i<=7;i++)
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
include('header.php');

?>


<div id="shadow_wrapper">
<div id="black_wrapper">
    <div class="inner_nav">
	
		<div class="nav fl">
      
			<ul>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(1);">HOME</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(2);getCategory();">CATEGORY</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(6);getContract();">MY PARTICIPATION</a></li>
			  <li><a class="menu_ancher">FAQ</a></li>
			  <li><a class="menu_ancher">CONTACT US</a></li> 
			</ul>
		</div>
    </div>
	
	</div>
	
<div class="advisory_wrapper landing_head" style="margin-bottom:30px;margin-top:20px" style="display:none;" id="div_1">
   <?php 
	session_start();
	$name=$_SESSION['firstname'];?>
        <h3>Welcome <?php echo $name;?></h3>
		<br><br><br>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
		<br>
		<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
		<br>
		<br>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
		<br>
		
		
		<br>
		
  </div>
 
 <div class="advisory_wrapper landing_head" style="margin-bottom:30px;margin-top:20px" id="div_2" style="display:none;">
  
	
	
</div>
 <div class=" advisory_wrapper landing_head" style="margin-bottom:30px;margin-top:20px" id="div_3" style="display:none;">
   
	
	
</div>
<div class="advisory_wrapper landing_head"  id="div_4" style="margin-bottom:30px;margin-top:20px"  style="display:none;">
 
		
		
				
				
</div>
<div class="advisory_wrapper landing_head"  id="div_5" style="margin-bottom:360px;margin-top:20px"  style="display:none;">
 

</div> 
<div class="advisory_wrapper landing_head"  id="div_6" style="margin-bottom:30px;margin-top:20px"  style="display:none;">
 

</div> 
<div class="advisory_wrapper landing_head"  id="div_7" style="margin-bottom:30px;margin-top:20px"  style="display:none;">

 	
			<div class="clsMid_cont_cio" id="middle" style="display:none">
				<div class="clsCat_tlt"><h2>Enterprise Participation Form</h2></div>
				
				<div class="clsCont_form_bx">
					<div class="clsC1_list_cont clearfix">
						<div class="clsLD_Bx_frm">
							<div class="clsCont_form">
								
									<h2>Company Name</h2>
									<div><input type="text" class="clsInput" value="" name="cname" id="cname"></div>
									<h2>Address 1</h2>
									<div><input type="text" class="clsInput" value="" name="add1" id="add1"></div>
									<h2>Address 2</h2>
									<div><input type="text" class="clsInput" value="" name="add2" id="add2"></div>
									<h2>City</h2>
									<div><input type="text" class="clsInput" value="" name="city" id="city"></div>
									<h2>Country</h2>
									<div><input type="text" class="clsInput" value="" name="country" id="country"></div>
								
							</div>
						</div>	<!--clsLD_Bx_frm-->
						
						<div class="clsLD_Bx_frm">
							<div class="clsCont_form">
								
									<h2>Website</h2>
									<div><input type="text" class="clsInput" value="" name="website" id="website"></div>
									<h2>Email</h2>
									<div><input type="text" class="clsInput" value="" name="email" id="email"></div>
									<h2>Contact Name</h2>
									<div><input type="text" class="clsInput" value="" name="contact_name" id="contact_name"></div>
									<h2>Designation</h2>
									<div><input type="text" class="clsInput" value="" name="designation" id="designation"></div>
									<h2>Phone Number</h2>
									<div><input type="text" class="clsInput" value="" name="phone_number" id="phone_number"></div>
								
							</div>
						</div>	<!--clsLD_Bx_frm-->
						
						
							<a href="javascript:void(0);"  class="clsCo_frt_btn" style="width:200px; height:35px;margin-right:35px;color:#FFFFFF;" onClick="save_contract();" >Submit</a>
						<!--	<button type="submit" style="width:200px; height:35px;margin-right:35px;color:#FFFFFF;" class="clsCo_frt_btn">Submit</button>-->
						
						
					</div>	<!--clsC1_list_cont-->
				
				</div>
			
		</div>	

</div> 
<?php
include('quick_contact.php');
include('footer.php');
?>

</div>

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
