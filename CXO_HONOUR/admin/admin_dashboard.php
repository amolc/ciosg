<?php
	session_start();
	include('../sql_config/database/cio_db.php'); 
	if(isset($_SESSION['admin']))
	{

	}
	else 
	{
		header('Location: index.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="Laborator.co" />
	
	<title>ciochoice.sg</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="include/resource/css/custom.css"  id="style-resource-6">

	<script src="include/resource/js/jquery-1.10.2.min.js"></script> 
		<script type="text/javascript">
		$(document).ready(function(){
		$('.loading').hide();
/*
*
*@author:			developer<developer@day7.co>
*@Date & Time:		13-march-2014 2:00pm GM +5
*@Modified Date:	13-march-2014 2:00pm GM +5
*/
				$('.accept').click(function()
				{
				$('.loading').show();
				var registration_id = $( this ).attr('id');
			// alert(registration_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_accept_register.php',
						data: {registration_id:registration_id},

						success: function(mesg) {
							$('.loading').hide();
							$('.msg').empty().html('Accepted').show('fast').animate({opacity: 1.0}, 3000).fadeOut('slow');
							//alert(mesg);
							location.reload();

						}

				});

			});		
			
				$('.decline').click(function(){
				$('.loading').show();	
				var registration_id = $( this ).attr('id');
				// $( this ).parent().parent().remove();
						// alert(tour_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_decline_register.php',
						data: {registration_id:registration_id},

						success: function(mesg) {
							$('.loading').hide();
							$('.msg2').empty().html('Declined').show('fast').animate({opacity: 1.0}, 3000).fadeOut('slow');							
							//alert(mesg);
							location.reload();
							
						}

				});

			});
				$('.delete').click(function(){
				$('.loading').show();		
				var registration_id = $( this ).attr('id');
				// $( this ).parent().parent().remove();
						// alert(tour_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_delete_register.php',
						data: {registration_id:registration_id},

						success: function(mesg) {
							$('.loading').hide();
							$('.msg2').empty().html('Deleted').show('fast').animate({opacity: 1.0}, 3000).fadeOut('slow');							
							
							location.reload();
							
						}

				});

			});
			
			
		});
	</script>
	<!--contact us-->
			<script type="text/javascript">
		$(document).ready(function(){
/*
*
*@author:			developer<developer@day7.co>
*@Date & Time:		1-Jan-2014 GM +5
*@Modified Date:	1-Jan-2014 GM +5
*/
			
			
				$('.contact_delete').click(function(){
					
				var contact_us_id = $( this ).attr('id');
				// $( this ).parent().parent().remove();
						// alert(tour_id);
				$.ajax({
						type: 'post',
						url: 'ajax_request_function/ajax_delete_contact_us.php',
						data: {contact_us_id:contact_us_id},

						success: function(mesg) {
							alert(mesg);
							location.reload();
							
						}

				});

			});
			
			
		});
	</script>
</head>
<body class="page-body page-fade">

<div class="page-container">	
	<?php include('include/admin_side_menu/admin_side_menu.php'); ?>
<div class="main-content">
		
<?php include('include/admin_header/admin_header.php'); ?>



<div class="row">
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<?php
				$cio_result = mysql_query("SELECT * FROM registration WHERE registration_type = 'CIO'");
				$cio_num_rows = mysql_num_rows($cio_result);
			?>
			<div class="num" data-start="0" data-end="<?php echo $cio_num_rows; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>CIO</h3>
			<p></p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<?php
				$ict_result = mysql_query("SELECT * FROM registration WHERE registration_type = 'ICTVendor'");
				$ict_num_rows = mysql_num_rows($ict_result);
			?>
			<div class="num" data-start="0" data-end="<?php echo $ict_num_rows; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>ICT Vendor</h3>
			<p></p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<?php
				$contact_result = mysql_query("SELECT * FROM contact_us");
				$contact_num_rows = mysql_num_rows($contact_result);
			?>
			<div class="num" data-start="0" data-end="<?php echo $contact_num_rows; ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3>Contact Message</h3>
			<p></p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<?php
				$Subscribers_result = mysql_query("SELECT * FROM registration");
				$Subscribers_num_rows = mysql_num_rows($Subscribers_result);
			?>
			<div class="num" data-start="0" data-end="<?php echo $Subscribers_num_rows; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
			<h3>Subscribers</h3>
			<p></p>
		</div>
		
	</div>
</div>

<br />

<div class="row">
			
<h2>Pending Registrations</h2>
<div style="margin-left: 352px;display:none;" class="loading">Your Request is processing <img src="upload/loading_gif.gif" alt="" width=80px/></div>
<div style="color:green;margin-left: 352px;" class="msg"></div>
<div style="color:red;margin-left: 352px;" class="msg2"></div>
<?php
if(isset($_REQUEST['del'])){
echo '<h2 style="color:red">Deleted</h2>'; 
}
if(isset($_REQUEST['edit'])){
echo '<h2 style="color:green">Updated</h2>'; 
}
 ?>
<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th> Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Accept / Decline</th>
			<th>Decline</th>
		</tr>
	</thead>
	<tbody>
	<?php
	/**
*	Recent Tour in admin for approval
*@author:			developer<developer@day7.co>
*@Date & Time:		13-march-2014 GM +5
*@Modified Date:	13-march-2014 GM +5
*/
$result = mysql_query("SELECT
						*
						FROM
						registration 
						where registration_status ='pending'
						");

		//fetch tha data from the database 
		while ($row = mysql_fetch_array($result)) 
		{ 
			
			echo'
				<tr class="odd gradeX" id="'.$row['registration_id'].'">
					<td>'.$row['registration_name'].'</td>
					<td>'.$row['registration_email'].'</td>
					<td>'.$row['registration_type'].'</td>
					<td>
						<a style="" id="'.$row['registration_id'].'"  class="accept">
							Accept 
						</a>   /  
						<a style="color: red;" id="'.$row['registration_id'].'" class="decline">
							 Decline
						</a>
					</td>
					<td>
						<a id="'.$row['registration_id'].'" class="delete">
							<i class="entypo-cancel"></i>
				
						</a>
					</td>
				</tr>
				';
		
		}
	?>
		

	</tbody>
	<tfoot>
		<tr>
			<th> Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Accept / Decline</th>
			<th>Decline</th>
		</tr>
	</tfoot>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#table-1").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	}); 
</script>
<br />
<div class="row">

	
	<div class="col-sm-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Contact Message</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
				
			
<table class="table table-bordered datatable" id="table-2">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Message</th>
			<th>Date</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php
	/**
*	Recent Tour in admin for approval
*@author:			developer<developer@day7.co>
*@Date & Time:		13-march-2014 2:00pm GM +5
*@Modified Date:	13-march-2014 2:00pm GM +5
*/
$result2 = mysql_query("SELECT
						*
						FROM
						contact_us
						");

		//fetch tha data from the database 
		while ($row2 = mysql_fetch_array($result2)) 
		{ 
			
			echo'
				<tr class="odd gradeX" id="">
					<td>'.$row2['contact_us_first_name'].'</td>
					<td>'.$row2['contact_us_last_name'].'</td>
					<td>'.$row2['contact_us_email'].'</td>
					<td>'.$row2['contact_us_im'].'</td>
					<td>'.$row2['contact_us_message'].'</td>
					<td>'.$row2['contact_us_insert_date'].'</td>
					<td>
						<a id="'.$row2['contact_us_id'].'" class="contact_delete">
							<i class="entypo-cancel"></i>
				
						</a>
					</td>
				</tr>
				';
		
		}
	?>
		

	</tbody>
	<tfoot>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Message</th>
			<th>Date</th>
			<th>Delete</th>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#table-2").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	}); 
</script>
		</div>
		
	</div>
	
</div>



<!-- Footer -->
	<?php include('include/admin_footer/admin_footer.php'); ?>	

</div>
	
	


</div>







	<link rel="stylesheet" href="include/resource/js/jvectormap/jquery-jvectormap-1.2.2.css"  id="style-resource-111">
	<link rel="stylesheet" href="include/resource/js/rickshaw/rickshaw.min.css"  id="style-resource-112">
	
<link rel="stylesheet" href="include/resource/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/js/select2/select2.css"  id="style-resource-2">
	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/jvectormap/jquery-jvectormap-1.2.2.min.js" id="script-resource-71"></script>
	<script src="include/resource/js/jvectormap/jquery-jvectormap-europe-merc-en.js" id="script-resource-18"></script>
	
	<script src="include/resource/js/jquery.dataTables.min.js" id="script-resource-7"></script>  
	<script src="include/resource/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="include/resource/js/select2/select2.min.js" id="script-resource-9"></script>
	
	<script src="include/resource/js/jquery.sparkline.min.js" id="script-resource-19"></script>
	<script src="include/resource/js/rickshaw/vendor/d3.v3.js" id="script-resource-10"></script>
	<script src="include/resource/js/rickshaw/rickshaw.min.js" id="script-resource-11"></script>
	<script src="include/resource/js/raphael-min.js" id="script-resource-12"></script>
	<script src="include/resource/js/morris.min.js" id="script-resource-13"></script>
	<script src="include/resource/js/toastr.js" id="script-resource-14"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-15"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-16"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-17"></script>
	<script type="text/javascript">
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-28991003-3']);
		_gaq.push(['_setDomainName', 'laborator.co']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>
	
</body>
</html>