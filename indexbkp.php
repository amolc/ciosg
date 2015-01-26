<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="description" content="CIO HONOUR is a B2B platform that enables industry leading CIOs to share and exchange their success with ICT vendors in their peer networks and the community at large. The platform truly promotes the \"Voice of the CIO \" to select and honour Products, Services and Solutions; recognising the ICT vendors for their outstanding commitment to service quality and professionalism in the \'local\' context.">
        <meta name="author" content="CIO HONOUR">
        <meta name="keywords" content="CIO, ICT Vendor, products, services, solutions, success">

        <title>CIO Honour.sg</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

        <!-- Required CSS -->

        <!--[if lt IE 9]>
        <link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
        <![endif]-->
        <script type="text/javascript" src="js/jquery.js"></script> 
        <script src="http://jwpsrv.com/library/c+e6yqaJEeO1oCIACmOLpg.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
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

    <body style="margin:0px;padding:0px;">

        <?php
        include('sql_config/database/cio_db.php');
        include('top_header.php');
        include('header.php');
        ?>

        <div id="black_wrapper">
            <div class="black_container">
                <?php include('navigation.php'); ?>
			  <div class="video fl">
               	 <!--carousel start-->
                        <div id="container"> 
                            <div id="carousel">
							   <?php 
								$video_query = mysql_query("SELECT * FROM videos order by ordernum ASC");
								$list_count  = mysql_num_rows($video_query);	
								
								while ($video_res = mysql_fetch_array($video_query))
								{

                                    //$count ++;
									$sql_tmp = mysql_query("SELECT * FROM videos_type WHERE video_id = '".$video_res['video_id']."'");
									if(mysql_num_rows($sql_tmp) > 0){
									
									?>
								
									<div>
										<video style="cursor: pointer;" id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="737" height="415"
										poster="admin/upload/Intro_frame_01.jpg" onplay="$(this).videoPlay()" onpause="$(this).videoPause()"
										> 
											<?php 
											while( $row_tmp =  mysql_fetch_array($sql_tmp)):

											$video = $row_tmp['path'];
											$ext = explode('.', $row_tmp['path']);
											if($ext[1] =='ogv'){$type  = "video/ogv"; }
											if($ext[1] =='mp4'){$type  = "video/mp4"; }
											if($ext[1] =='webm'){$type  = "video/webm"; }
											
											?>
										<source src="admin/<?php echo $video; ?>" type='<?php echo $type; ?>' />							
											<?php   endwhile;    ?>
										</video>
										
									</div>
									<?php }?>	

									<?php $sql_img_type = mysql_query("SELECT * FROM image_type WHERE video_id = '".$video_res['video_id']."'"); 
									 if(mysql_num_rows($sql_img_type) > 0) {
										 while($row_tmp =  mysql_fetch_array($sql_img_type)){?>
                                            <?php  $path_page  = $video_res['path'] ? $video_res['path'] : 'registration.php' ?>
										 		<div>
												<a href="<?php echo $path_page ?>">
													<img style="height: 415px;width: 737px;" src="admin/<?php  echo $row_tmp['path'] ?>" alt="" />
												</a>
												</div>
									<?php   } 
								    	 }
								} ?>

                            </div>
                            <div id="pages"></div>
                        </div>
                        <!--carousel end-->
				
            </div>
            </div>
            <!-- VIDEO GALLERY -->
        </div>
    </div>
    
    <div style="padding-top:75px;height: 630px;" id="advisory_wrapper">
        <div class="sixteen columns">
            <div class="project">
                <div class="sky-carousel sc-no-select" style="visibility: visible;">
                    <div class="sky-carousel-wrapper" style="visibility: visible; opacity: 1;">
                        <h1 style="text-align:center; margin-top:37px; color:#20201F; font-size: 30px;font-weight: bold;">Our Advisory Panel</h1>
                        <ul class="sky-carousel-container" style=" left: -1405px;">
                            <?php
                            $advisory_query1 = mysql_query("select * from advisory_panel");
                            $counter = 0;$imageSlider ='';
                            while ($advisory_res = mysql_fetch_array($advisory_query1))
                            {
                                $advisory_image = $advisory_res['advisory_image'];
                                $advisory_name = $advisory_res['advisory_name'];
                                $advisory_desination = $advisory_res['advisory_desination'];
                                $advisory_description = $advisory_res['advisory_description'];

                                $advisory_description = str_replace("<div>", "", $advisory_description);
                                $advisory_description = str_replace("</div>", "", $advisory_description);
                                 $advisory_description = str_replace("<p>", "", $advisory_description);
                                $advisory_description = str_replace("</p>", "", $advisory_description);    
                                
                                if (strlen($advisory_description) > 190)
                                {

                                    // truncate string
                                    $stringCut = substr($advisory_description, 0, 300);
                                    $advisory_description = substr($stringCut, 0, strrpos($stringCut, ' ')) . '<a style="font-weight:bold;" href="advisory_detail.php?id=' . $advisory_res['advisory_id'] . '"> Read more</a>';
                                }
                                
                             // $imageSlider = explode("=", $advisory_image); 
                                ?>

                                <li style="-webkit-transform-origin: 50% 139px; -webkit-transform: translate(0px, 0px) scale(0.5) translateZ(0px); opacity: 0.6;">
                                    <img style="" src="<?php echo $advisory_image; ?>&h=190&w=190&zc=1"  alt="" class="sc-image">

                                   
                                    <div class="sc-content">
                                        <h2><a style="font-weight:bold; border:none; font-size:26px;" href="advisory_detail.php?id=<?php echo $advisory_res['advisory_id']; ?>"><?php echo $advisory_name; ?></a></h2>
                                        <p><?php echo $advisory_description; ?></p>
                                    </div>
                                </li>


                                <?php
                                $counter++;
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="sc-preloader" style="display: none;"></div><div class="sc-content-wrapper">
                        <div class="sc-content-container" style="visibility: visible; opacity: 1;">
                            <div class="sc-content">
                                <h2></h2><p></p></div></div></div> 
                    <div class="sc-overlay sc-overlay-left" width="190" height="1" style="width: 370px;background: #FFF;"></div>
                    <div class="sc-overlay sc-overlay-right" width="190" height="1" style="width: 370px;background: #FFF;"></div>
                    <a href="#" class="sc-nav-button sc-prev sc-no-select"></a>
                    <a href="#" class="sc-nav-button sc-next sc-no-select">
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>

<?php
	//include('events_panel.php'); 
	include('quick_contact.php');
	include('footer.php');
?>                                
</body>
</html>