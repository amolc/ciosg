<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Honour</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.theme.css">
<style type="text/css">
.owl-item {
padding-left: 5px;
padding-right: 5px;
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
                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post" id="myForm" onSubmit="return validateForm(this.id)" >
                                         
                                        <!--    <div id="advisory_wrapper">
                                                <div class="get_in_touch mrgn_top">
                                                  <h1>Media</h1>
                                                  <div class="contact_details_2 fl">
                                                  	<a href="media.php"class="active">GALLERY</a>
                                                    <a href="video.php">VIDEO</a> 
													<br />
                                                  </div>
                                                  <div class="video_main fl">
												  

            <?php
	
                $i=0;
                $no=0;
                $hal = $_GET['hal'];
                if(!isset($_GET['hal']))
                {
                    $page = 1;
                    $hal =1;
                }
                else
                {
                    $page = $_GET['hal'];
                }
                   
                $max_show = 2;// this is the option that how many items do you want to show each page

                $from     = (($page * $max_show) - $max_show);
                $query_banner = mysql_query("SELECT * FROM gallery where type = 'image' ORDER BY gallery_id DESC LIMIT $from,$max_show") or die(mysql_error());
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
                                                  	  <div>
                                                        <div class="video_1 fl" style="width:100%;">
                                                            <h2 style="width:100%;"><?php echo $row['title']; ?></h2>
                                                            <h3 style="width:100%;">Posted: <span><?php echo $row['date']; ?></span></h3>
															<p>
                                                            <div class="facebook_scroll owl-carousel" style="clear: both;" >
															
															<?php 
															$result2 = mysql_query("SELECT * FROM `gallery_stuff` WHERE `gallery_id` = '$gallery_id '")or die (mysql_error());
															while ($row2 = mysql_fetch_array($result2))  
															{ 
															//echo '&nbsp;<img src="admin/upload/gallery/images/'.$row2['stuff'].'"  width="217" height="143"/>';
															?>
															
															       <div><a href="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img style="width: 218px;height: 145px;" src="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" alt="" width="131" height="auto"/></a></div>
																
															    
															
															<?php } ?>
                                                           </div>
                                                            </p>
                                                        </div>
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
	
        <div id="pagination">
            <?php
                $total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM gallery where type = 'image' "),0); 

                $total_pages = ceil($total_results / $max_show); 

                echo "<center>"; 
                echo '<div class="pagination fl" style="margin-left:385px;">'; 

                if($hal > 1){ 
                    $prev = ($page - 1); 
                    echo "<a class='prev' href=$_SERVER[PHP_SELF]?hal=$prev></a> "; 
                } 

                for($i = 1; $i <= $total_pages; $i++){ 
                    if(($hal) == $i){ 
                        echo "<a>$i</a> ";  
                    } else { 
                        echo "<a href=$_SERVER[PHP_SELF]?hal=$i>$i</a> "; 
                } 
                }
        // Build Next Link 
                if($hal < $total_pages){ 
                    $next = ($page + 1); 
                    echo "<a class='next' href=$_SERVER[PHP_SELF]?hal=$next></a>"; 
                } 
                echo "</center>"; 
                echo "</div>"; 
        ?>
    </div><!-- end of pagination -->
										<?php 
										/*
											$result = mysql_query("SELECT * FROM gallery where type = 'image'");
		
												while ($row = mysql_fetch_array($result))  
												{ 
													$gallery_id = $row['gallery_id'];
						
												  ?>
                                                  	<div class="red_carpet fl">
                                                  	  <div>
                                                        <div class="video_1 fl" style="width:100%;">
                                                            <h2 style="width:100%;"><?php echo $row['title']; ?></h2>
                                                            <h3 style="width:100%;">Posted: <span><?php echo $row['date']; ?></span></h3>
															<p>
                                                            <div class="facebook_scroll owl-carousel" style="clear: both;" >
															
															<?php 
															$result2 = mysql_query("SELECT * FROM `gallery_stuff` WHERE `gallery_id` = '$gallery_id '")or die (mysql_error());
															while ($row2 = mysql_fetch_array($result2))  
															{ 
															//echo '&nbsp;<img src="admin/upload/gallery/images/'.$row2['stuff'].'"  width="217" height="143"/>';
															?>
															
															       <div><a href="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img style="width: 218px;height: 145px;" src="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" alt="" width="131" height="auto"/></a></div>
																
															       <div><a href="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img style="width: 218px;height: 145px;" src="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" alt="" width="131" height="auto"/></a></div>
																
															       <div><a href="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img style="width: 218px;height: 145px;" src="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" alt="" width="131" height="auto"/></a></div>
																
															       <div><a href="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img style="width: 218px;height: 145px;" src="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" alt="" width="131" height="auto"/></a></div>
																
															       <div><a href="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" rel="prettyPhoto[pp_gal]" title="">
                                                                    <img style="width: 218px;height: 145px;" src="admin/upload/gallery/images/<?php echo $row2['stuff'] ; ?>" alt="" width="131" height="auto"/></a></div>
																
															
															<?php } ?>
                                                           </div>
                                                            </p>
                                                        </div>
                                                      </div>
                                                    </div>
													
													<?php } ?>
                                       
                                                  	<div class="pagination fl" style="margin-left:385px;">
                                                        	<a href="#" class="prev"></a>
                                                            <a href="#">1</a>
                                                            <a href="#">2</a>
                                                            <a href="#">3</a><a href="#" class="next"></a>
                                                            
                                                            
                                                        </div>
														<?php 
													*/
													?>
                                                    
                                     <!--             </div>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
											    <div id="advisory_wrapper">
                                                <div class="advisory_panel_1 mrgn_top">
                                                  <h1>AWARDS</h1>
													<div class="contact_details_2 fl">
														<a href="#" class="active">2015</a>
														<a style="display:none;" href="advisory_panel_13.php">2013</a>
													</div>
                                                  <div id="content_8" class="advisory_panel">
												  <?php
															$year ="2014";
															$advisory_query = mysql_query("select * from advisory_panel  where advisory_years = '".$year."' ORDER BY advisory_name asc");
															while($advisory_res = mysql_fetch_array($advisory_query))
															{
																$advisory_name= $advisory_res['advisory_name'];
																$advisory_desination = $advisory_res['advisory_desination'];
																$advisory_company = $advisory_res['advisory_company'];
																 $advisory_image = $advisory_res['advisory_image'];
																 $advisory_description = $advisory_res['advisory_description'];
																 $advisory_description = str_replace("<div>","",$advisory_description);
																 $advisory_description = str_replace("</div>","",$advisory_description);
															         $advisory_description1 = $advisory_description;

                                                                                                                                            if (strlen($advisory_description) > 190)
                                                                                                                                   {

                                                                                                                                       // truncate string
                                                                                                                                       $stringCut = substr($advisory_description, 0, 300);
                                                                                                                                       $advisory_description = substr($stringCut, 0, strrpos($stringCut, ' ')) ;
                                                                                                                                   }
													
													$image = explode("=", $advisory_image); 
													?>
															
																 <div class="alice_abigail fl">
                                                       	  		<div class="alice_abigail_pic"><img class="advisor_img" src="<?php echo $image[1]; ?>"></div>
                                                                        <div class="fl" style="width: 650px;">
                                                                <h1 style=""><?php echo $advisory_name; ?></h1>
                                                              <h2><?php echo $advisory_desination; ?></h2>
                                                              <h3><?php echo $advisory_company; ?></h3>
                                                              <div id="shortDetail<?php echo $advisory_res['advisory_id']; ?>">
                                                                <p class="textContainer_Truncate "><?php echo $advisory_description; ?></p>                                                                
                                                                <?php //echo  '<a style="font-weight:bold;" href="advisory_detail.php?id=' . $advisory_res['advisory_id'] . '" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               echo  '<a style="font-weight:bold;" href="javascript:void(0)" onclick="return readmore('.$advisory_res['advisory_id'].');" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               ?>
                                                              </div>
                                                              <div id="longdetail<?php echo $advisory_res['advisory_id']; ?>" style="display: none;">
                                                                <p class="textContainer_Truncate " ><?php echo $advisory_description1; ?></p>
                                                               <?php //echo  '<a style="font-weight:bold;" href="advisory_detail.php?id=' . $advisory_res['advisory_id'] . '" class="readmore-js-toggle" target="_blank" > Read more</a>';
                                                               echo  '<a style="font-weight:bold;" href="javascript:void(0)" onclick="return hidemore('.$advisory_res['advisory_id'].');" class="readmore-js-toggle" target="_blank" > Hide</a>';
                                                               ?>
                                                                </div>
                                                              </div>
                                                            </div>
															<?php                                                                                                                      
                                                                                                                                   } ?>
			 
                                                  </div>
                                                </div>
                                                <div style="clear:both"></div>
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
$(".facebook_scroll").owlCarousel({autoPlay:true,items:4});

		})(jQuery);
	</script>


</body>
</html>
