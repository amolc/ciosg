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
    header('Location: cio_login.php');
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cio Choice</title>
	<link rel="icon" type="image/png" href="cxo_fav_ico.png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/text_style.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="css/tinycarousel.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.tinycarousel.js"></script>
	
    <!-- Carousel -->
    <link href="css/bootstrap-carousel.css" rel="stylesheet" type="text/css" />
	 <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>

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
//var companytag=[];

function autosuggest(i)
{
	//$.post('.php', function(data) {
  		// $('#textarea_'+i).autocomplete("hii");

  		// });
		 

  function split( val ) {
return val.split( /,\s*/ );
}
function extractLast( term ) {
return split( term ).pop();
}
$( '#textarea_'+i )
// don't navigate away from the field on tab when selecting an item
.bind( "keydown", function( event ) {
if ( event.keyCode === $.ui.keyCode.TAB &&
$( this ).autocomplete( "instance" ).menu.active ) {
event.preventDefault();
}
})
.autocomplete({
source: function( request, response ) {
$.getJSON( "search.php", {
term: extractLast( request.term )
}, response );
},
/*search: function() {
// custom minLength
var term = extractLast( this.value );
if ( term.length < 2 ) {
return false;
}
},*/
focus: function() {
// prevent value inserted on focus
return false;
},
select: function( event, ui ) {
var terms = split( this.value );
// remove the current input
terms.pop();
// add the selected item
terms.push( ui.item.value );
// add placeholder to get the comma-and-space at the end
terms.push( "" );
//companytag.push(this.value);

this.value = terms.join( ", " );

return false;
}
});
 
 
}
function tagvalues()
{
	$.post("tag.php" ,{'company': companytag}).done(function( data ) {   
	if(data=='OK')
		{
			alert("company inserted");
		}
	
	});
}
		
function getCategory()
{
	
	
	$("#div_2").html("<div align='center' style='margin-top:150px;margin-bottom:150px;'><img src=images/loader.gif width='150px' align=center></div>");
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

	$("#div_3").html("<div align='center' style='margin-top:150px;margin-bottom:150px;'><img src=images/loader.gif width='150px' align=center></div>");
	var tbl_body ="<table>";
	
	
	 tbl_body +="<th>Product List->Survey list</th><th></th>";
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
		/*height:173px;*/
		tbl_row += "<td><div class='btn-box'><div class='clsButton_item fr' style='height: 18px;'>"+array[i].item_name+"</div></div></td><td></td><tr><td ><div align='center'><br><textarea  name='item' placeholder='Please let us know the vendors who provide the best "+array[i].item_name+"' style='width: 729px; height: 50px;font-size: 16px;' id='textarea_"+i+"' onClick='autosuggest("+i+");'></textarea><input type='hidden' value='"+id+"' id='item_"+i+"'></div></td></tr>";
        tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\">"+tbl_row+"</tr>";
        odd_even = !odd_even; 
		 i++;            
		          
    })
	  tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";
	   tbl_body += "<tr class=\""+( odd_even ? "odd" : "even")+"\"><td><br></td></tr>";tbl_body += "<td><div align='center'><button class='clsButton_checkout' style='width:200px;background-color: #e73535;font-size: 17px;border-color: #e73535;' onClick='insrt_into_cart("+i+","+catID+");'>Submit Survey</button></div><br /></td>";
	
	
	 tbl_body +="</table>"
	 $("#div_3").html(tbl_body);
	 $('#div_3').show();
});
}
function insrt_into_cart(n,catID)
{
	var survey = [];
	var itemID=[];
	for(i=0;i<n;i++)
	{
		if(document.getElementById('textarea_'+i).value!='')
		{
			survey.push(document.getElementById('textarea_'+i).value);
			itemID.push(document.getElementById('item_'+i).value);
		}
	}
	$.post("survey.php" ,{'survey_array': survey,'item_id':itemID,'catID':catID}).done(function( data ) {   
	if(data=='OK')
	{
    	alert("inserted");
	}
});
}
function listCategory()
{
	
	$("#category_div").html("<div align='center' style='margin-top:150px;margin-bottom:150px;'><img src=images/loader.gif width='150px' align=center></div>");
	$.getJSON('http://www.globalprompt.org/sg/cio/category/list_category/?callback=?' , function(array) {

	var tbl_body = "<div class='clsCat_tlt'><h2>Dashboard</h2></div>";
	var tbl_row ="";
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
		
		tbl_row +="<div class='clsLD_Cont clearfix'>";
		if(i%2==0)
		{
			
			tbl_row +="<div class='clsLD_Bx'>";
		}
		else
		{
			tbl_row +="<div class='clsLD_Bx2'>";
		}
		
		tbl_row +="<div class='clsCo_frt_top_LD'><div class='clsC1_list_cont'>";
		
		tbl_row += "<div class='clsLD_cont1'><h1><a onclick='get_div(3);get_item("+id+",/Enterprise Business Management/);' href='javascript:void(0);' style='color: black'>"+array[i].cat_name+"</a></h1></div>";
		
		
		
		tbl_row +="<div class='clsLD_cont2 clearfix'><div class='clsChart_bx' style='text-align:center;'><img src='images/chart_img.jpg' width='200px;'/></div><div class='clsChart_cont'  id='item_div'><h1>Item1</h1><h1>Item2</h1><h1>Item3</h1></div></div>";
		
		tbl_body +="</div></div><br /></div>";
		
		tbl_body += ""+tbl_row+"";

        odd_even = !odd_even; 
		 i++;            
		          
    })
	
	 $("#category_div").html(tbl_body);
	 $("#category_div").show();
 	   
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
	
<script>
listCategory();
</script>
</head>

<body>
<?php
// include('sql_config/database/cio_db.php');
include('top_header.php');
include('header.php');
?>


<div id="shadow_wrapper"></div>
<div id="black_wrapper">
    <div class="inner_nav">
		<div class="nav fl">
        	<ul>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(1);listCategory();">HOME</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);">PROFILE</a></li>
			  <li><a class="menu_ancher" href="javascript:void(0);" onClick="get_div(2);getCategory();">SURVEY</a></li>
			  <li><a class="menu_ancher">FAQ</a></li>
			  <li><a class="menu_ancher">CONTACT US</a></li> 
			</ul>
		</div>
    </div>
</div>
<div class="landing_head advisory_wrapper" style="margin-top:0px;" id="div_1" >
      <div class="clsMiddle">
			<div class="clsMid_cont_cio" id="category_div">
				
				
				
				
				
				
			</div>	<!--clsMid_cont_cio-->
			
		</div>	
</div>

<div class="advisory_wrapper landing_head" style="margin-top:30px;" style="display:none;" id="div_2">
</div>
<div class="advisory_wrapper landing_head" style="margin-top:30px;" style="display:none;" id="div_3">
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

<!--<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>-->



</body>
</html>
