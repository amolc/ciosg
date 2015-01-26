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
                
<style type="text/css">
.video_1 div iframe {
width:435px!important;
height: 200px!important;
}


div.pagination {
	padding: 3px;
	margin: 3px;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
	
</style>

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
                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" id="myForm" onsubmit="return validateForm(this.id)" >
                                         
                                            <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <h1>Media</h1>
                                                  <div class="contact_details_2 fl">
                                                  	<a href="media.php">GALLERY</a>
                                                    <a href="video.php"class="active">VIDEO</a> 
													<br />
                                                  </div>
                                                  <div class="video_main fl"> 
												  
												  <?php
	/*
		Place code to connect to your DB here.
	*/
	// include('config.php');	// include your code to connect to DB.

	$tbl_name="";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 1;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $gallery";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "pagi_video.php"; 	//your file name  (the name of this file)
	$limit = 1; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM gallery where type = 'video' LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
		else
			$pagination.= "<span class=\"disabled\">� previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		
	}
?>

	<?php
		while($row = mysql_fetch_array($result))
		{
	
		// Your while loop here?>
		   	<div class="red_carpet fl">
                                                   	  <h1><?php echo $row['title']; ?></h1>
                                                     
												
												   <div class="facebook_scroll owl-carousel" style="clear: both;overflow: hidden;" >
                                                           <?php 
														$gallery_id = $row['gallery_id'];;
													   $result2 = mysql_query("select * from gallery_videos where gallery_id = '$gallery_id'") or die (mysql_error());
												  while ($row2 = mysql_fetch_array($result2))  
												{ ?>
                                                        <div class="video_1 fl">
                                                       		<div style="float:left;"><?php 
															
															echo str_replace("<i>"," ",$row2['video_path']); ?></div>
															 <div style="clear:both;"></div>
                                                            <h2><?php echo $row2['video_title']; ?></h2>
                                                            <h3>Posted: <span><?php echo $row2['video_date']; ?></span></h3>
                                                            <p><?php echo $row2['video_description']; ?></p>
                                                        </div>
                                                        <div class="video_1 fl">
                                                       		<div style="float:left;"><?php 
															
															echo str_replace("<i>"," ",$row2['video_path']); ?></div>
															 <div style="clear:both;"></div>
                                                            <h2><?php echo $row2['video_title']; ?></h2>
                                                            <h3>Posted: <span><?php echo $row2['video_date']; ?></span></h3>
                                                            <p><?php echo $row2['video_description']; ?></p>
                                                        </div>
												<?php } ?>		
                                                            <?php
                                                              // $query1 = mysql_query("select * from event_fb_images where event_id='".$id."' LIMIT 1000");
                                                              // while($res1 = mysql_fetch_array($query1))
                                                              // {
                                                                  // $fb_image = $res1['event_fb_pic'];
                                                                   // if (!empty($fb_image)) {
                                                                ?>
                                                           
                                                              
                                                                
                                                             
                                                                


                                                             <?php   
                                                               
                                                                // }
                                                              // }
                                                            ?>
                                                     
                                                           
                                                              </div>
                                                        
                                                     
                                                    </div>
		
		<?php
	
		}
	?>

<?php echo"pages". $pagination; ?>
	
												  
												  
												   <?php
	/*
                $i=0;
                $no=0;
                $hal = $_GET['hal'];
                if(!isset($_GET['hal']))
                {
                    $page = 1;
                }
                else
                {
                    $page = $_GET['hal'];
                }

                $max_show = 2;// this is the option that how many items do you want to show each page

                $from     = (($page * $max_show) - $max_show);
                $query_banner = mysql_query("SELECT * FROM gallery where type = 'video' ORDER BY gallery_id DESC LIMIT $from,$max_show") or die(mysql_error());
                    while($row=mysql_fetch_array($query_banner))
                    { 
						$gallery_id = $row['gallery_id'];
                        $no++;
                        if(($no%2)==0)
                            $color = '#f2f2f2'; 
                        else
                            $color = '#f9f9f9';
            ?>
                    	<div class="red_carpet fl">
                                                   	  <h1><?php echo $row['title']; ?></h1>
                                                     
												
												   <div class="facebook_scroll owl-carousel" style="clear: both;overflow: hidden;" >
                                                           <?php 
														$gallery_id = $row['gallery_id'];;
													   $result2 = mysql_query("select * from gallery_videos where gallery_id = '$gallery_id'") or die (mysql_error());
												  while ($row2 = mysql_fetch_array($result2))  
												{ ?>
                                                       
                                                        <div class="video_1 fl">
                                                       		<div style="float:left;"><?php 
															
															echo str_replace("<i>"," ",$row2['video_path']); ?></div>
															 <div style="clear:both;"></div>
                                                            <h2><?php echo $row2['video_title']; ?></h2>
                                                            <h3>Posted: <span><?php echo $row2['video_date']; ?></span></h3>
                                                            <p><?php echo $row2['video_description']; ?></p>
                                                        </div>
												<?php } ?>		
                                                            <?php
                                                              // $query1 = mysql_query("select * from event_fb_images where event_id='".$id."' LIMIT 1000");
                                                              // while($res1 = mysql_fetch_array($query1))
                                                              // {
                                                                  // $fb_image = $res1['event_fb_pic'];
                                                                   // if (!empty($fb_image)) {
                                                                ?>
                                                           
                                                              
                                                                
                                                             
                                                                


                                                             <?php   
                                                               
                                                                // }
                                                              // }
                                                            ?>
                                                     
                                                           
                                                              </div>
                                                        
                                                     
                                                    </div>
            <?php 
                }
            ?>      
  
    <!-- end of table_content 
  	<div class="pagination fl" style="margin-left:385px;">
                                                        	<a href="#" class="prev"></a>
                                                            <a href="#">1</a>
                                                            <a href="#">2</a>
                                                            <a href="#">3</a><a href="#" class="next"></a>
                                                            
                                                            
                                                        </div>
	-->
        <div id="pagination">
            <?php
                $total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM gallery where type = 'video' "),0); 

                $total_pages = ceil($total_results / $max_show); 

                echo "<center>"; 
                echo '<div class="pagination fl" style="margin-left:385px;">'; 

                if($hal > 1){ 
                    $prev = ($page - 1); 
                     echo "<a class='prev' style='color:red' href=$_SERVER[PHP_SELF]?hal=$prev></a> "; 
                } 

                for($i = 1; $i <= $total_pages; $i++){ 
                    if(($hal) == $i){ 
                       echo "<a style='color:black'>$i</a> ";  
                    } else { 
                         echo "<a style='color:red' href=$_SERVER[PHP_SELF]?hal=$i>$i</a> "; 
                } 
                }
        // Build Next Link 
                if($hal < $total_pages){ 
                    $next = ($page + 1); 
                   echo "<a class='next' style='color:red' href=$_SERVER[PHP_SELF]?hal=$next></a>"; 
                } 
                echo "</center>"; 
                echo "</div>"; 
        ?>
    </div><!-- end of pagination -->
												  
												  <?php */
												  /*
												  $result = mysql_query("select * from gallery where type = 'video'") or die (mysql_error());
												  while ($row = mysql_fetch_array($result))  
												{ 
												  ?>
                                                  	<div class="red_carpet fl">
                                                   	  <h1><?php echo $row['title']; ?></h1>
                                                     
												
												   <div class="facebook_scroll owl-carousel" style="clear: both;overflow: hidden;" >
                                                           <?php 
														$gallery_id = $row['gallery_id'];;
													   $result2 = mysql_query("select * from gallery_videos where gallery_id = '$gallery_id'") or die (mysql_error());
												  while ($row2 = mysql_fetch_array($result2))  
												{ ?>
                                                        <div class="video_1 fl">
                                                       		<div style="float:left;"><?php 
															
															echo str_replace("<i>"," ",$row2['video_path']); ?></div>
															 <div style="clear:both;"></div>
                                                            <h2><?php echo $row2['video_title']; ?></h2>
                                                            <h3>Posted: <span><?php echo $row2['video_date']; ?></span></h3>
                                                            <p><?php echo $row2['video_description']; ?></p>
                                                        </div>
                                                        <div class="video_1 fl">
                                                       		<div style="float:left;"><?php 
															
															echo str_replace("<i>"," ",$row2['video_path']); ?></div>
															 <div style="clear:both;"></div>
                                                            <h2><?php echo $row2['video_title']; ?></h2>
                                                            <h3>Posted: <span><?php echo $row2['video_date']; ?></span></h3>
                                                            <p><?php echo $row2['video_description']; ?></p>
                                                        </div>
												<?php } ?>		
                                                            <?php
                                                              // $query1 = mysql_query("select * from event_fb_images where event_id='".$id."' LIMIT 1000");
                                                              // while($res1 = mysql_fetch_array($query1))
                                                              // {
                                                                  // $fb_image = $res1['event_fb_pic'];
                                                                   // if (!empty($fb_image)) {
                                                                ?>
                                                           
                                                              
                                                                
                                                             
                                                                


                                                             <?php   
                                                               
                                                                // }
                                                              // }
                                                            ?>
                                                     
                                                           
                                                              </div>
                                                        
                                                     
                                                    </div>
													<?php } ?>
                                                   
                                                    
                                                    <div class="pagination fl" style="margin-left:385px;">
                                                        	<a href="#" class="prev"></a>
                                                            <a href="#">1</a>
                                                            <a href="#">2</a>
                                                            <a href="#">3</a><a href="#" class="next"></a>
                                                            
                                                            
                                                        </div>
                                                    */?>
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
$(".facebook_scroll").owlCarousel({autoPlay:true,items:2});

		})(jQuery);
	</script>

</body>
</html>
