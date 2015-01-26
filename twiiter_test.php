<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>ciochoice.sg</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<!-- Required CSS -->

	<!--[if lt IE 9]>
	<link href="css/movingboxes-ie.css" rel="stylesheet" media="screen" />
	<![endif]-->
	
	<!-- Required script -->
	<!-- <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="slider_style.css">
	
	<script type="text/javascript" src="js/jcarousellite.js"></script>-->
	<script src="http://jwpsrv.com/library/c+e6yqaJEeO1oCIACmOLpg.js"></script>

	
<!--<script type="text/javascript" async="" src="js/ga.js"></script>
<script src="js/jquery.min.js"></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/mytweets.js"></script>
<link href="css/developerdevday7.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.sky.carousel-1.0.2.min.js"></script>
<link href="//vjs.zencdn.net/4.4/video-js.css" rel="stylesheet">
<script src="//vjs.zencdn.net/4.4/video.js"></script> 
<script type="text/javascript">
  document.createElement('video');document.createElement('audio');document.createElement('track');
</script>
<script>
  videojs.options.flash.mp4 = "admin/upload/Intro_Compressed_736x414.mp4"
</script>

<script type="text/javascript">
//JQuery Twitter Feed. Coded by Tom Elliott @ www.webdevdoor.com (2013) based on https://twitter.com/javascripts/blogger.js
//Requires JSON output from authenticating script: http://www.webdevdoor.com/php/authenticating-twitter-feed-timeline-oauth/

$(document).ready(function () {
    var displaylimit = 10;
    var twitterprofile = "markdevday7";
	var screenname = "Mark Lauw";
    var showdirecttweets = false;
    var showretweets = true;
    var showtweetlinks = true;
    var showprofilepic = true;
	var showtweetactions = true;
	var showretweetindicator = true;
	
	var headerHTML = '';
	var loadingHTML = '';
	headerHTML += '<a href="https://twitter.com/" target="_blank"><img src="images/twitter-bird-light.png" width="34" style="float:left;padding:3px 12px 0px 6px" alt="twitter bird" /></a>';
	headerHTML += '<h1>'+screenname+' <span style="font-size:13px"><a href="https://twitter.com/'+twitterprofile+'" target="_blank">@'+twitterprofile+'</a></span></h1>';
	loadingHTML += '<div id="loading-container"><img src="images/ajax-loader.gif" width="32" height="32" alt="tweet loader" /></div>';
	
	$('#twitter-feed').html(headerHTML + loadingHTML);
	 
    // $.getJSON('http://www.webdevdoor.com/demos/jquery-twitter-feed/get-tweets1.1.php', 
    // $.getJSON('https://api.twitter.com/1/statuses/show.json?id=80256651&callback=?',  
    // $.getJSON('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=markdevday7',
	   $.getJSON('http://staging.cio-choice.sg/get-tweets1.1.php', 
        function(feeds) {   
		   //alert(feeds);
            var feedHTML = '';
            var displayCounter = 1;         
            for (var i=0; i<feeds.length; i++) {
				var tweetscreenname = feeds[i].user.name;
                var tweetusername = feeds[i].user.screen_name;
                var profileimage = feeds[i].user.profile_image_url_https;
                var status = feeds[i].text; 
				var isaretweet = false;
				var isdirect = false;
				var tweetid = feeds[i].id_str;
				
				//If the tweet has been retweeted, get the profile pic of the tweeter
				if(typeof feeds[i].retweeted_status != 'undefined'){
				   profileimage = feeds[i].retweeted_status.user.profile_image_url_https;
				   tweetscreenname = feeds[i].retweeted_status.user.name;
				   tweetusername = feeds[i].retweeted_status.user.screen_name;
				   tweetid = feeds[i].retweeted_status.id_str;
				   status = feeds[i].retweeted_status.text; 
				   isaretweet = true;
				 };
				 
				 
				 //Check to see if the tweet is a direct message
				 if (feeds[i].text.substr(0,1) == "@") {
					 isdirect = true;
				 }
				 
				//console.log(feeds[i]);
				 
				 //Generate twitter feed HTML based on selected options
				 if (((showretweets == true) || ((isaretweet == false) && (showretweets == false))) && ((showdirecttweets == true) || ((showdirecttweets == false) && (isdirect == false)))) { 
					if ((feeds[i].text.length > 1) && (displayCounter <= displaylimit)) {             
						if (showtweetlinks == true) {
							status = addlinks(status);
						}
						 
						if (displayCounter == 1) {
							feedHTML += headerHTML;
						}
									 
						feedHTML += '<div class="twitter-article" id="tw'+displayCounter+'">'; 										                 
						feedHTML += '<div class="twitter-pic"><a href="https://twitter.com/'+tweetusername+'" target="_blank"><img src="'+profileimage+'"images/twitter-feed-icon.png" width="42" height="42" alt="twitter icon" /></a></div>';
						feedHTML += '<div class="twitter-text"><p><span class="tweetprofilelink"><strong><a href="https://twitter.com/'+tweetusername+'" target="_blank">'+tweetscreenname+'</a></strong> <a href="https://twitter.com/'+tweetusername+'" target="_blank">@'+tweetusername+'</a></span><span class="tweet-time"><a href="https://twitter.com/'+tweetusername+'/status/'+tweetid+'" target="_blank">'+relative_time(feeds[i].created_at)+'</a></span><br/>'+status+'</p>';
						
						if ((isaretweet == true) && (showretweetindicator == true)) {
							feedHTML += '<div id="retweet-indicator"></div>';
						}						
						if (showtweetactions == true) {
							feedHTML += '<div id="twitter-actions"><div class="intent" id="intent-reply"><a href="https://twitter.com/intent/tweet?in_reply_to='+tweetid+'" title="Reply">Reply</a></div><div class="intent" id="intent-retweet"><a href="https://twitter.com/intent/retweet?tweet_id='+tweetid+'" title="Retweet">Retweet</a></div><div class="intent" id="intent-fave"><a href="https://twitter.com/intent/favorite?tweet_id='+tweetid+'" title="Favourite">Favourite</a></div></div>';
						}
						
						feedHTML += '</div>';
						feedHTML += '</div>';
						displayCounter++;
					}   
				 }
            }
             
            $('#twitter-feed').html(feedHTML);
			
			//Add twitter action animation and rollovers
			if (showtweetactions == true) {				
				$('.twitter-article').hover(function(){
					$(this).find('#twitter-actions').css({'display':'block', 'opacity':0, 'margin-top':-20});
					$(this).find('#twitter-actions').animate({'opacity':1, 'margin-top':0},200);
				}, function() {
					$(this).find('#twitter-actions').animate({'opacity':0, 'margin-top':-20},120, function(){
						$(this).css('display', 'none');
					});
				});			
			
				//Add new window for action clicks
			
				$('#twitter-actions a').click(function(){
					var url = $(this).attr('href');
				  window.open(url, 'tweet action window', 'width=580,height=500');
				  return false;
				});
			}
			
			
    }).error(function(jqXHR, textStatus, errorThrown) {
		var error = "";
			 if (jqXHR.status === 0) {
               error = 'Connection problem. Check file path and www vs non-www in getJSON request';
            } else if (jqXHR.status == 404) {
                error = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                error = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                error = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                error = 'Time out error.';
            } else if (exception === 'abort') {
                error = 'Ajax request aborted.';
            } else {
                error = 'Uncaught Error.\n' + jqXHR.responseText;
            }	
       		alert("error: " + error);
    });
    

    //Function modified from Stack Overflow
    function addlinks(data) {
        //Add link to all http:// links within tweets
         data = data.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
            return '<a href="'+url+'"  target="_blank">'+url+'</a>';
        });
             
        //Add link to @usernames used within tweets
        data = data.replace(/\B@([_a-z0-9]+)/ig, function(reply) {
            return '<a href="http://twitter.com/'+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';
        });
		//Add link to #hastags used within tweets
        data = data.replace(/\B#([_a-z0-9]+)/ig, function(reply) {
            return '<a href="https://twitter.com/search?q='+reply.substring(1)+'" style="font-weight:lighter;" target="_blank">'+reply.charAt(0)+reply.substring(1)+'</a>';
        });
        return data;
    }
     
     
    function relative_time(time_value) {
      var values = time_value.split(" ");
      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
      var parsed_date = Date.parse(time_value);
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	  var shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);
      delta = delta + (relative_to.getTimezoneOffset() * 60);
     
      if (delta < 60) {
        return '1m';
      } else if(delta < 120) {
        return '1m';
      } else if(delta < (60*60)) {
        return (parseInt(delta / 60)).toString() + 'm';
      } else if(delta < (120*60)) {
        return '1h';
      } else if(delta < (24*60*60)) {
        return (parseInt(delta / 3600)).toString() + 'h';
      } else if(delta < (48*60*60)) {
        //return '1 day';
		return shortdate;
      } else {
        return shortdate;
      }
    }
     
});

</script>
<style type="text/css">
 
img  {
    border:none;
}
 
#loading-container {
    padding:16px 0px 16px 0px;
    text-align:center;  
}
  
#twitter-feed {
    width:258px;
    margin:auto;
    font-family: Arial, Helvetica, sans-serif;
    margin-top:60px;
    padding:8px 10px 5px 10px;
    border-radius:12px;
    background-color:#FFF;
    color:#333;
    overflow:auto;
}
  
#twitter-feed h1 {
    color:#5F5F5F;
    margin:0px;
    padding:9px 0px 9px 0px;
    font-size:18px;
    font-weight:lighter;    
}
  
.twitter-article, #loading-container {
    width:100%;
    border-top:1px dotted #CCC;
    float:left; 
    padding:8px 0px 8px 0px;
    position:relative;
} 
.twitter-pic {
    position:absolute;
}
  
.twitter-pic img {
    float:left;
    border-radius:7px;  
    border:none;
      
}
  
/* -------- TEXT STYLING ------*/
.twitter-text {
    width:100%;
    float:left;
    font-size:11px;
    padding-left:52px;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.twitter-text p {
    margin:0px;
    line-height:15px;   
}
.twitter-text a,  h1 a {
    color: #00acee;
    text-decoration: none;
}
.twitter-text a:hover,  h1 a:hover {
    text-decoration: underline;
    color: #00acee;
}
  
.tweet-time {
    font-size:10px;
    color:#878787;
    float:right;
}
.tweet-time a, .tweet-time a:hover {
    color:#878787;
}
  
.tweetprofilelink a {
    color:#444;
}
.tweetprofilelink a:hover {
    color:#444;
}
  
/* -------- FEED  ACTIONS ------*/
#twitter-actions {
    width:75px;
    float:right;
    margin-right:5px;   
    margin-top:3px;
        display:none;
}
.intent {
    width:25px;
    height:16px;
    float:left; 
}
.intent a{
    width:25px;
    height:16px;
    display:block;
    background-image:url(../images/tweet-actions.png);
    float:left; 
} 
.intent a:hover{
    background-position:-25px 0px;
} 
  
#intent-retweet a{
    background-position:0px -17px;
} 
#intent-retweet a:hover{
    background-position:-25px -17px;
} 
#intent-fave a{
    background-position:0px -36px;
} 
#intent-fave a:hover{
    background-position:-25px -36px;
} 
  
/* -------- RETWEET INDICATOR ------*/
#retweet-indicator {
    width:14px;
    height:10px;
    background-image:url(../images/tweet-actions.png);
    background-position:-5px -54px;
    margin-top:3px;
    float:left;
}
</style>
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
<script type="text/javascript">
$(function() {
$('video').on('click', function (e) {
    if (this.paused) {
        this.play();
    }
    else {
        this.pause();
    }
    e.preventDefault();
});
});

</script>
<style type="text/css">
	@media only screen and (min-width: 960px) {#portfolio-wrapper img {min-height: 147px;}} 
	@media only screen and (min-width: 768px) and (max-width: 959px) {#portfolio-wrapper img {min-height: 115px;}}
</style>

</head>

<body>
       
                                        		<?php
													include('sql_config/database/cio_db.php'); 
														include('top_header.php');
														
														include('header.php');
													?>
                                                                        
                                        <div id="black_wrapper">
                                            <div class="black_container">
											<?php include('navigation.php'); ?>
                                               
                                                    <div class="video fl">
														<?php
														
															$video_query = mysql_query("select * from videos");
															while($video_res = mysql_fetch_array($video_query))
															{
																$video = $video_res['video_embed_code'];
															}
															// echo $video;
														?>
														
													<div>
															<!--<video width="737" height="415" controls>
															  <source src="admin/upload/<?php //echo $video; ?>" type="video/mp4"  codecs="avc1.42E01E, mp4a.40.2"'>
															  <source src="admin/upload/<?php //echo $video; ?>" type="video/mov">
															  <source src="movie.ogg" type="video/ogg">
															  Your browser does not support the video tag.
															</video>-->
															<video id="example_video_1" class="video-js vjs-default-skin"
															  controls preload="auto" width="737" height="415" 
															  data-setup='{"example_option":true}'>
															 <source src="<?php echo $video; ?>" type='video/mp4' />
															 <source src="<?php echo $video; ?>"  type='video/webm' />
															 <source src="<?php echo $video; ?>"  type='video/ogg' />
															</video>

														</div>
                                                       <!-- <img src="images/video.jpg" width="737" height="415">-->
                                                    </div>
                                            </div>
                                        </div>
										<!--<div style="padding-top:50px;height: 560px;" id="advisory_wrapper">-->
										<div style="padding-top:50px;height: 630px;" id="advisory_wrapper">
										
											
														<div class="sixteen columns">
			<div class="project">
				<div class="sky-carousel sc-no-select" style="visibility: visible;">
					<div class="sky-carousel-wrapper" style="visibility: visible; opacity: 1;">
					 <h1 style="margin-left: 552px;margin-top: 56px;font-size: 29px;font-weight: bold;">Our Advisory Panel</h1>
						<ul class="sky-carousel-container" style="margin-top: 40px!important; left: -1405px;">
						<?php
													$advisory_query1 = mysql_query("select * from advisory_panel");
													$counter=0;
													while($advisory_res = mysql_fetch_array($advisory_query1))
													{
														$advisory_image = $advisory_res['advisory_image'];
														$advisory_name = $advisory_res['advisory_name'];
														$advisory_desination = $advisory_res['advisory_desination'];
														$advisory_description = $advisory_res['advisory_description'];
											
               

													 if (strlen($advisory_description) > 190) {

													  // truncate string
													  $stringCut = substr($advisory_description, 0, 300);

													  // make sure it ends in a word so assassinate doesn't become ass...
													  // $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
													   $advisory_description = substr($stringCut, 0, strrpos($stringCut, ' ')).'<a style="font-weight:bold;" href="#"> Read more</a>';
													 }
											
													
												?>
														
															<li style="-webkit-transform-origin: 50% 139px; -webkit-transform: translate(0px, 0px) scale(0.5) translateZ(0px); opacity: 0.6;">
																<img src="<?php echo $advisory_image; ?>" alt="" class="sc-image">
																<div class="sc-content">
																	<h2><?php echo $advisory_name; ?></h2>
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
				<h2>Dori Moss</h2><p></p></div></div></div> 
				<canvas class="sc-overlay sc-overlay-left" width="190" height="1" style="width: 370px;background: #FFF;"></canvas>
				<canvas class="sc-overlay sc-overlay-right" width="190" height="1" style="width: 370px;background: #FFF;"></canvas>
				<a href="http://www.skyplugins.com/sky-jquery-touch-carousel/tooltip_skin_variation.html#" class="sc-nav-button sc-prev sc-no-select"></a>
				<a href="http://www.skyplugins.com/sky-jquery-touch-carousel/tooltip_skin_variation.html#" class="sc-nav-button sc-next sc-no-select">
				</a>
				
				</div>
			</div>
		</div>




																		
												
											
															
														
												
												</div>
                                            </div>
											<!--<img src="timthumb.php?src=/admin/advisory_panel_img/Alice-Abigail-Tan.jpg&h=150&w=150&zc=1" alt="some text" />-->
                                            <div style="display:none;" id="advisory_wrapper">
                                                <div class="our_advisory_panel">
                                                  <h1>Our Advisory Panel</h1>
                                                    <span><img src="images/alice_abigail.jpg" alt="" width="863" height="298"></span>
                                                  <h2>Alice Abigail</h2>
                                                  <p>Ms Alice Abigail, an Information Technology Head of Department with over 20 years<br>
                                                  of regional experience in leading and managing a team of IT managers and executives in IT goal setting, initiatives and support for the organization Find out more</p>
                                                        
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
                                             <div id="previous_events_wrapper"> 

                                                <div class="previous_events_container">
                                                    <div class="previous_events fl">
                                                    	<h3>Previous Events</h3>
                                                      <div id="content_6" class="content">
															<?php
															
																$event_query = mysql_query("select * from events");
																while($event_res = mysql_fetch_array($event_query))
																{
																	$event_name = $event_res['event_name'];
																	$event_image = $event_res['event_image'];
																	$event_held_date = $event_res['event_held_date'];
																	$event_description = $event_res['event_description'];
																	
																
															?>
																	<div class="singapore_night fl">
																		<img src="admin/upload/<?php echo $event_image; ?>" width="356" height="128">
																		<h4><?php echo $event_name; ?></h4>
																		<span>Held <?php echo $event_held_date; ?></span>
																		<p>
																			<?php echo $event_description; ?>
																		</p>
																		<a href="#">read more</a>
																	</div>
                                                            <?php
																}	
															?>
                                                            <div style="display:none" class="singapore_night fl">
                                                       	  		<img src="images/singapore_night.jpg" width="356" height="128">
                                                                <h4>Singapore Opening Night 2014</h4>
                                                                <span>Held 01/02/2014</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec nibh pharetra, hendrerit nunc dictum, hendrerit tellus. Vivamus dapibus pulvinar fringilla... </p>
                                                                <a href="#">read more</a>
                                                            </div>
                                                            
                                                      </div>
                                                    </div>
                                                    
                                                <div id="twitter-feed" class="live_twitter fl">
									
												
												</div>
                                                <div style="display:none;" class="live_twitter fl">
                                               	    <?php 
													
													 // require __DIR__ . '/twitteroauth/twitteroauth/twitteroauth.php';
													 
													// define('CONSUMER_KEY', '2tyTuWygMyihibQqjuqiQ');
													// define('CONSUMER_SECRET', 'mx6v0Bkd9owx9yrt9NolznoE2LGVX7K8ljlymmUeVc');
													// define('ACCESS_TOKEN', '80256651-VvqDj1EDmY5T4yyM6WLL5NO6GxJ3rE6VGBPAgCzHE');
													// define('ACCESS_TOKEN_SECRET', 'G9fVKJe0H2q8LcUIQtnaPPHS7SyrxgD4FjWqjV9TEI7Ma');
													 
													// $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
													/* $query = array(
																	"q" => "#WorldSeries"
																	);
														 
														$results = $toa->get('search/tweets', $query);
														 
														foreach ($results->statuses as $result) {
														  echo $result->user->screen_name . "COMDEXvirtual " . $result->text . "\n";
														  echo "imagess".$result->entities->media[0]->media_url  . "\n";
														}*/
													// $user = 'markdevday7';
													
													// entities->urls[0]->expanded_url) && !empty($result->entities->urls[0]->expanded_url)) {
														// if (strpos($result->entities->urls[0]->expanded_url,'instagram') !== false) {
															// echo "entities->urls[0]->expanded_url."media/?size=t'>";
														// }
													// }
													
													
													// $user = 'COMDEXvirtual';
													 
													// $timeline = $toa->get('statuses/user_timeline', array('screen_name' => $user));
													 ?>
													   <div class="live fl">
                                                   	  <h1>LIVE on Twitter</h1>
                                                    </div>
													<div style="padding-bottom: 10px;" class="twitter">
														<img src="images/twitter.jpg" width="17" height="15">
														@CIOCHOICE_SG
													</div>
													<div id="content_7" class="content" style="overflow-y: auto;height: 377px;width: 420px;">
													<div style="width: 400px;">
													
													 <?php
												// foreach ($timeline as $i => $tweet) {
													
														// echo '<div class="cio_choice fl">
																	// <span><img src="images/small_pic.jpg" alt="" width="59" height="59"></span>
																	// <h1>CIO CHOICE Singapore @CIOCHOICE_SG</h1>
																	// <p>';
																		// echo "$tweet->text" . PHP_EOL;
														// echo'
																	// <br>
																		// <a href="#">http://t.co/zyF6FzkQ4V</a>
																	// </p>
																	// </div>';
														
													
														
													// }
													?>
													
													</div>
													</div>
                                                  </div>
											   <div style="display:none;" class="live_twitter fl">
                                               	    <div class="live fl">
                                                   	  <h1>LIVE on Twitter</h1>
                                                    </div>
                                                          <div class="twitter">
                                                    		<img src="images/twitter.jpg" width="17" height="15">
                                                            @CIOCHOICE_SG
                                                    </div>
                                                    	<div class="cio_choice fl">
                                                        	<span><img src="images/small_pic.jpg" alt="" width="59" height="59"></span>
                                                            <h1>CIO CHOICE Singapore @CIOCHOICE_SG</h1>
                                                          <p>Lorem ipsum dolor sit amet, con adipiscing eliuis nec nibh pharetra, hendrerit nunc dictum, 				hendrerit <br>
                                                          <a href="#">http://t.co/zyF6FzkQ4V</a></p>
                                                        </div>
                                                        <div class="cio_choice fl">
                                                        	<span><img src="images/small_pic.jpg" alt="" width="59" height="59"></span>
                                                            <h1>CIO CHOICE Singapore @CIOCHOICE_SG</h1>
                                                          <p>Lorem ipsum dolor sit amet, con adipiscing eliuis nec nibh pharetra, hendrerit nunc dictum, 				hendrerit <br>
                                                          <a href="#">http://t.co/zyF6FzkQ4V</a></p>
                                                        </div>
                                                        <div class="cio_choice fl">
                                                        	<span><img src="images/small_pic.jpg" alt="" width="59" height="59"></span>
                                                            <h1>CIO CHOICE Singapore @CIOCHOICE_SG</h1>
                                                          <p>Lorem ipsum dolor sit amet, con adipiscing eliuis nec nibh pharetra, hendrerit nunc dictum, 				hendrerit <br>
                                                          <a href="#">http://t.co/zyF6FzkQ4V</a></p>
                                                        </div>
                                                  </div>
                                                    
                                                </div>
                                            </div>
                                              
                                           
                                            <?php   include('quick_contact.php');
                                                    include('footer.php');
                                              ?>                                   
                                            

 

    <!-- Google CDN jQuery with fallback to local 
	<script type="text/javascript" src="js/jquery.min.js"></script>-->
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

</body>
</html>
