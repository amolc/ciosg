<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Tourbooking.co" />
	<meta name="author" content="Laborator.co" />

	<title>ciochoice.sg</title>

	<link rel="stylesheet" href="include/resource/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
	<link rel="stylesheet" href="include/resource/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
	<link rel="stylesheet" href="include/resource/css/neon.css"  id="style-resource-5">
	<link rel="stylesheet" href="include/resource/css/custom.css"  id="style-resource-6">
	<link rel="stylesheet" type="text/css" href="master/jquery.datetimepicker.css" />
	
	<script src="include/resource/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="master/jquery.js"></script>               
	<script type="text/javascript" src="master/jquery.datetimepicker.js"></script>  

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<!-- TS1387507274: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body">

<div class="page-container">

<?php include('include/admin_side_menu/admin_side_menu.php'); ?>
	<div class="main-content">
<?php include('include/admin_header/admin_header.php'); ?>

			<ol class="breadcrumb bc-3">
				<li>
					<a href="admin_dashboard.php"><i class="entypo-home"></i>Home</a>
				</li>
				
				<li class="active">
					<strong>survey reports</strong>
				</li>
			</ol>

			<h2>Survey Reports</h2>
			<br />

<div class="row">
	<div class="col-md-12">

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					 Survey
				</div>

				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>

			<div class="panel-body">
		<?php
				$cid='';

				 include('../sql_config/database/cio_db.php'); ?>

			


				<form role="form" action="<?php $_SERVER["PHP_SELF"];?>" method="post"  enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
				
				<?php $query=mysql_query("select catID,cat_name from category");?>
				
						
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Select Category</label>

						<div class="col-sm-4">
							<select name="award_category" style="height:35px; width:300px;">
							<option value="">---Select---</option>
						<?php	while($row2=mysql_fetch_array($query)){
								?>
								
								<option value="<?php echo $row2['catID'];?>"><?php echo $row2['cat_name'];?></option>
							
								<?php }?>
							</select>
						</div>
						<div class="col-sm-3">
						<input type="submit" name="catid" value="Get Survey" style="width:120px;height:35px">
						</div>
					</div>
				</form>
					<script>
					function get_item_survey(item_id,item_name)
					{
						var tbl_row = "<table id='table-1' class='table table-bordered datatable dataTable' aria-describedby='table-1_info'>";
						tbl_row +="<tr><h2>Survey of selected item</h2></tr>";
						tbl_row +="<tr><th>Company Name</th><th>Count</th></tr>";
						var tbl_body='';
						var i=0;
						var j=0;
						$.getJSON('survey_report.php?callback=?',"item_id="+item_id+"",function(array){
							$.each(array, function(key,val) {
						 		var tbl_data = "";
								$.each(this, function(k , v) {
								})
									tbl_data +="<td>"+array[i].company_name+"</td><td>"+array[i].count+"</td>";
									i++;
									tbl_row += "<tr>"+tbl_data+"</tr>";
							})
							tbl_row +='</table>';	
					 		tbl_body +=""+tbl_row+"";
					 		$("#reports").html(tbl_body);
						});	
					}
					</script>
					
					<div class="form-group" style="margin-top:40px;">
					<?php if($_POST['catid'] == "Get Survey") {
							if($_POST['award_category']=='')
							{?>
								<script>alert("Please Select Category");</script>
							<?php }
							else
							{
					     $cid=$_POST['award_category'];?>
						<div style="overflow:scroll;">
						<table class="table table-bordered datatable" id="table-1">
						<thead>
							<tr role="row">						
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="table-1">Item Name/UserID</th>
						<?php
						$query3=mysql_query("select item_ID,item_name from item where catID='$cid'")or die(mysql_error());
						while($row3=mysql_fetch_array($query3))
						{
							$itemID=$row3['item_ID'];
							$item_name=$row3['item_name'];
							echo '<th><a  href="#reports"  onClick="get_item_survey('.$itemID.');">'.$row3['item_name'].' </a></th>';
							
							
						}?>
						</tr>
						</thead>
						<tbody>
						
						<?php $table="survey_".$cid;

						$query=mysql_query("select distinct userID from ".$table."") or die(mysql_error());
						
						while($row=mysql_fetch_array($query))
						{
							$userID=$row['userID'];
							$p=0;
							$x=0;
							?><tr><td><?php echo $userID; ?></td><?php
							
							$query6=mysql_query("select itemID,company_name from ".$table." where userID='$userID' order by itemID ") or die(mysql_error());
							while($row6=mysql_fetch_array($query6))
							{

								$flag=0;
								
							
								$query2=mysql_query("select item_ID from item where catID='$cid' order by item_ID")or die(mysql_error());
								$n=mysql_num_rows($query2);
								$x=$n;
								while($row2=mysql_fetch_array($query2))
								{
								?>
									
									
									
										
									<?php
									 
									if($p>=$row2['item_ID'])
									{
									
									}else
									{?>
									
									<td>
										<?php if($row6['itemID']==$row2['item_ID']) 
										{
											$p=$row2['item_ID'];
											$n--; ?>
											<?php $company=unserialize($row6['company_name']);
											$tag = explode(",",$company);
											$cnt=sizeof($tag);
											for($i=0;$i<$cnt;$i++)
											{
												echo $tag[$i].",";
												
											}?>
											
											<?php $flag=1;
											
										 }
										 if($flag==1)
											break;
										?></td><?php	
										}
									
								
								
							 }?>
						
						<?php }?>
							</tr>
					<?php }?>
						</tbody>
						</table>
					
					</div>
					<?php }}?>
					</div>
					<div class="form-group"  >
						<div class="col-sm-5" id="reports">
						</div>
						
					</div>

			
			

		</div>

	</div>
</div>

<?php include('include/admin_footer/admin_footer.php'); ?>


</div>


<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

	<div class="chat-inner">


		<h2 class="chat-header">
			<a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>

			<i class="entypo-users"></i>
			Chat
			<span class="badge badge-success is-hidden">0</span>
		</h2>


		<div class="chat-group" id="group-1">
			<strong>Favorites</strong>

			<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
			<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
		</div>


		<div class="chat-group" id="group-2">
			<strong>Work</strong>

			<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
			<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
		</div>


		<div class="chat-group" id="group-3">
			<strong>Social</strong>

			<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
		</div>

	</div>

	<!-- conversation template -->
	<div class="chat-conversation">

		<div class="conversation-header">
			<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

			<span class="user-status"></span>
			<span class="display-name"></span>
			<small></small>
		</div>

		<ul class="conversation-body">
		</ul>

		<div class="chat-textarea">
			<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
		</div>

	</div>

</div>


<!-- Chat Histories -->
<ul class="chat-history" id="sample_history">
	<li>
		<span class="user">Art Ramadani</span>
		<p>Are you here?</p>
		<span class="time">09:00</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>This message is pre-queued.</p>
		<span class="time">09:25</span>
	</li>

	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>Whohoo!</p>
		<span class="time">09:26</span>
	</li>

	<li class="opponent unread">
		<span class="user">Catherine J. Watkins</span>
		<p>Do you like it?</p>
		<span class="time">09:27</span>
	</li>
</ul>




<!-- Chat Histories -->
<ul class="chat-history" id="sample_history_2">
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>I am going out.</p>
		<span class="time">08:21</span>
	</li>

	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>Call me when you see this message.</p>
		<span class="time">08:27</span>
	</li>
</ul></div>




	<script src="include/resource/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="include/resource/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="include/resource/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="include/resource/js/joinable.js" id="script-resource-4"></script>
	<script src="include/resource/js/resizeable.js" id="script-resource-5"></script>
	<script src="include/resource/js/neon-api.js" id="script-resource-6"></script>
	<script src="include/resource/js/fileinput.js" id="script-resource-71"></script>
	<script src="include/resource/js/bootstrap-switch.min.js" id="script-resource-7"></script>
	<script src="include/resource/js/neon-chat.js" id="script-resource-8"></script>
	<script src="include/resource/js/neon-custom.js" id="script-resource-9"></script>
	<script src="include/resource/js/neon-demo.js" id="script-resource-10"></script>
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