<?php

$id = $_REQUEST['id'];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cio Choice</title>
<link rel="icon" type="image/png" href="http://cio.fountaintechies.com/cxo_fav_ico.png">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/twitterfeed.js"></script>
<link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />


<link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

        <!-- Required CSS -->

        <!--[if lt IE 9]>
        <link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
        <![endif]-->

        <!-- Required script -->
        <!-- <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
        <script type="text/javascript" src="js/jquery.js"></script> 
        <!--<link rel="stylesheet" href="slider_style.css">
        
        <script type="text/javascript" src="js/jcarousellite.js"></script>-->
        <script src="http://jwpsrv.com/library/c+e6yqaJEeO1oCIACmOLpg.js"></script>


<!--<script type="text/javascript" async="" src="js/ga.js"></script>-->
<!--<script src="js/jquery.min.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/mytweets.js"></script>-->
        <link href="css/developerdevday7.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.sky.carousel-1.0.2.min.js"></script>
        <script type="text/javascript" src="js/twitterfeed.js"></script>
        <link href="css/twitter-styles.css" rel="stylesheet" type="text/css" />
		<link href="css/rcarousel.css" rel="stylesheet" type="text/css">

        <!--  added for the video player -->
        <!-- Chang URLs to wherever Video.js files will be hosted -->
        <link href="video-js.css" rel="stylesheet" type="text/css">
        <!-- video.js must be in the <head> for older IEs to work. -->
        <script src="video.js"></script>
		 <style type="text/css">
          #container {
 width:737px;
 position: relative;
 margin: 0 auto;
 background:#e73535;
}

#carousel {
 width:737px;
 margin: 0 auto;
}

#ui-carousel-next, #ui-carousel-prev {
 width: 60px;
 height:60px;
 background: url(images/arrow-left.png) #fff center center no-repeat;
 display: block;
 position: absolute;
 top: 0;
 z-index: 100;
}

#ui-carousel-next {
 right: 0;
 top:45%;
 background-image: url(images/arrow-right.png);
}

#ui-carousel-prev {
 left: 0;
 top:45%;
}

#ui-carousel-next > span, #ui-carousel-prev > span {
 display: none;
}

.slide {
 margin: 0;
 position: relative;
}

.slide  h1 {
 font: 45px/1 'Source Sans Pro'; 
 color: #fff;
 font-weight:bold;
 margin:-30px 0px 0px 140px;
 height:auto;
 line-height:50px;
 padding: 0;
 width:630px;
 text-transform:capitalize;
}

.slide  p {
 font: 20px/1 'Source Sans Pro'; 
 color: #fff;
 margin-top:15px;
 padding: 0;
}

#slide01 > img {
 position: absolute;
 bottom:77px;
 right:285px;
}

#slide01 > .text {
 position: absolute;
 left:0px;
 top: 115px;
}

#slide02 > img {
 position: absolute;
 bottom:77px;
 right:285px;
}

#slide02 > .text {
 position: absolute;
 left:0px;
 top:115px;
}

#slide03 > img {
 position: absolute;
 bottom:77px;
 right:285px;
}

#slide03 > .text {
 position: absolute;
 left:0px;
 top:115px;
}

#slide04 > img {
 position: absolute;
 bottom:77px;
 right:285px;
}

#slide04 > .text {
 position: absolute;
 left:0px;
 top:115px;
}

#slide05 > img {
 position: absolute;
 bottom:77px;
 right:285px;
}

#slide05 > .text {
 position: absolute;
 left:0px;
 top:115px;
}

#slide06 > img {
 position: absolute;
 bottom: 10px;
 right: 20px;
}

#slide06 > .text {
 position: absolute;
 left:0px;
 top:115px;
}

#pages {
    bottom: -40px;
    left: 45%;
    margin: 0 auto;
    position: absolute;
    width: 150px;
}

.bullet {
 background: url(images/page-off.png) center center no-repeat;
 display: block;
 width: 18px;
 height: 18px;
 margin: 0;
 margin-right: 5px;
 float: left;    
}

.video {
    border: 1px solid #A70707;
    box-shadow: 0 5px 5px #231F20;
    height: 415px;
    left: 110px;
    margin: 0;
    position: absolute;
    top: 88px;
    width: 737px;
    z-index: 1;
}
        </style>
        
        <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
        <script>
            videojs.options.flash.swf = "video-js.swf";
        </script>

        <!-- added for the video player -->


        <script type="text/javascript">
            $(function() {
                $('.sky-carousel').carousel({
                    itemWidth: 260,
                    itemHeight: 260,
                    distance: 12,
                    selectedItemDistance: 75,
                    selectedItemZoomFactor: 1,
                    unselectedItemZoomFactor: 0.5,
                    unselectedItemAlpha: 0.6,
                    motionStartDistance: 210,
                    topMargin: 115,
                    circular: true,
                    loop: true,
                    preload: true,
                    loopRewind: true,
                    gradientStartPoint: 0.35,
                    gradientOverlayColor: "#ebebeb",
                    gradientOverlaySize: 190,
                    selectByClick: false
                });
            });
        </script>
        <style type="text/css">
            @media only screen and (min-width: 960px) {#portfolio-wrapper img {min-height: 147px;}} 
            @media only screen and (min-width: 768px) and (max-width: 959px) {#portfolio-wrapper img {min-height: 115px;}}
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
											include('sql_config/database/cio_db.php'); 
											include('top_header.php');
											include('header.php');
                                        ?>
                                        
                                        
                                        <div id="black_wrapper">
                                            <div class="inner_nav">
                                                <?php include('navigation.php'); ?>
                                            </div>
                                        </div>
                                            <div id="advisory_wrapper">
                                                <div class="advisory_panel_1 mrgn_top">
                                                  <h1>Advisory Panel</h1>
                                                  <div id="content_7" class="advisory_panel" style="height:auto;">
												  <?php

                                                  function check_input($value)
                                                            {
                                                            // Stripslashes
                                                            if (get_magic_quotes_gpc())
                                                              {
                                                              $value = stripslashes($value);
                                                              }
                                                            // Quote if not a number
                                                            if (!is_numeric($value))
                                                              {
                                                              $value = "'" . mysql_real_escape_string($value) . "'";
                                                              }
                                                            return $value;
                                                            }
														

                                                            $id = check_input($id);
															$advisory_query = mysql_query("select * from advisory_panel where advisory_id = '$id'");
															while($advisory_res = mysql_fetch_array($advisory_query))
															{
																$advisory_name= $advisory_res['advisory_name'];
																$advisory_desination = $advisory_res['advisory_desination'];
																$advisory_company = $advisory_res['advisory_company'];
																$advisory_image = $advisory_res['advisory_image'];
																$advisory_description = $advisory_res['advisory_description'];
																$advisory_description = str_replace("<div>","",$advisory_description);
																$advisory_description = str_replace("</div>","",$advisory_description);
															

													
													$image = explode("=", $advisory_image); 
													?>
															
																 <div class="alice_abigail_detail fl">
                                                       	  		<div class="alice_abigail_pic"><img class="advisor_img" src="<?php echo $image[1]; ?>"></div>
                                                                <h1 style=""><?php echo $advisory_name; ?></h1>
                                                              <h2><?php echo $advisory_desination; ?></h2>
                                                              <h3><?php echo $advisory_company; ?></h3>
                                                                <p><?php echo $advisory_description; ?></p>
                                                                
                                                            </div>
															<?php } ?>
			 
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
			});
		})(jQuery);
	</script>

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
  <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
 <script type="text/javascript" src="js/jquery.ui.rcarousel.js"></script>
  

        <script type="text/javascript">
        jQuery(function($) {
            function generatePages() {
                var _total, i, _link;

                _total = $("#carousel").rcarousel("getTotalPages");

                for (i = 0; i < _total; i++) {
                    _link = $("<a href='#'></a>");

                    $(_link)
                            .bind("click", {page: i},
                            function(event) {
                                $("#carousel").rcarousel("goToPage", event.data.page);
                                event.preventDefault();
                            }
                            )
                            .addClass("bullet off")
                            .appendTo("#pages");
                }

                // mark first page as active
                $("a:eq(0)", "#pages")
                        .removeClass("off")
                        .addClass("on")
                        .css( "background-image", "url(images/page-on.png)");

            }

            function pageLoaded(event, data) {
                $("a.on", "#pages")
                        .removeClass("on")
                        .css( "background-image", "url(images/page-off.png)");

                $("a", "#pages")
                        .eq(data.page)
                        .addClass("on")
                        .css( "background-image", "url(images/page-on.png)");
            }

            $("#carousel").rcarousel(
                    {
                        visible: 1,
                        step: 1,
                        speed: 700,
                        auto: {
                            enabled: false
                        },
                        width: 737,
                        height: 415,
                        start: generatePages,
                        pageLoaded: pageLoaded
                    }
            );

            $( "#ui-carousel-next")
                    .add("#ui-carousel-prev")
                    .add( ".bullet")
                    .hover(
                            function() {
                                $(this).css( "opacity", 0.7);
                            },
                            function() {
                                $(this).css( "opacity", 1.0);
                            }
                    );
        });
        </script>
	
</body>
</html>
