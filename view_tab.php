<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/twitterfeed.js"></script>
    <link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.easytabs.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready( function() {
            //alert('developer');
            $('#tab-container').easytabs();
        });
    </script>

<script>

jQuery(document).ready(function(cash) {
    $("#network").hide();
    $("#achieve").hide();


	$( "#learn_over" ).mouseover(function() {

    $("#network").hide();
    $("#achieve").hide();
    $("#learn").show();


	});

	$( "#network_over" ).mouseover(function() {


    $("#achieve").hide();
    $("#learn").hide();
    $("#network").show();

	});


	$( "#achieve_over" ).mouseover(function() {


    $("#network").hide();
    $("#learn").hide();
    $("#achieve").show();

	});


   });

</script>



</head>

<body>
                            
										<?php													
											include('sql_config/database/cio_db.php'); 
											include('top_header.php');
											include('header.php');
											$id = $_REQUEST['id'];
											$result = mysql_query("SELECT * FROM pages_tab WHERE tab_id=$id");
											$row = mysql_fetch_array($result);
											$page_id = $row['page_id'];
											
											
											
                                        ?>
                                       
                                        
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                         																			
									
										
										<div id="advisory_wrapper">
                                                <div class="advisory_panel_1 mrgn_top">
                                                  
													<!--<div class="contact_details_2 fl">
														<a href="#" class="active"><?php //echo $row['tab_name'];  ?></a>
														
													</div> -->
													
													<?php 
													
												echo '<div class="contact_details_2 fl">';            
												
												 $result2 = mysql_query("SELECT * FROM pages_tab WHERE page_id=$page_id");
												 while ($row2 = mysql_fetch_array($result2))
												 {
												  $tab = $row2['tab_name'];
												  $tab_id = $row2['tab_id'];;
												  if($tab_id == $id)
												  {
													echo '<a href="view_tab.php?id='.$row2['tab_id'].'" class="active tab">'.$tab.'</a>';
												  }
												  else
												  {
													echo '<a href="view_tab.php?id='.$row2['tab_id'].'" class="tab">'.$tab.'</a>';
												  }
												  $i++;
												 }
												 echo "</div>";									
												
												 ?>
													
                                                  <div id="content_advisor" class="advisory_panel">
												  <?php   echo $row['tab_data'];  ?>
															
			 
                                                  </div>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
										
									
										
										
                                            <?php 
										   
												include('events_panel.php');                                             
												include('quick_contact.php');
												include('footer.php');
											?>     
                                           
                                            


    <!-- Google CDN jQuery with fallback to local -->
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

</body>
</html>
