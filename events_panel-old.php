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
																		<a href="previous_event_detail.php?id=<?php echo $event_res['event_id'];?>"><img src="admin/upload/<?php echo $event_image; ?>" width="356" height="128"></a>
																		<h4><a class="event_title" href="previous_event_detail.php?id=<?php echo $event_res['event_id'];?>"><?php echo $event_name; ?></a></h4>
																		<span>Held <?php echo $event_held_date; ?></span>
																		<p>
																			<?php echo $event_description; ?>
																		</p>
																		<a class="event_ancher" href="previous_event_detail.php?id=<?php echo $event_res['event_id'];?>">read more</a>
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
                                                    
                                               	  <div class="live_twitter fl">
                                               	    <?php 
													/*
													 require __DIR__ . '/twitteroauth/twitteroauth/twitteroauth.php';
													 
													define('CONSUMER_KEY', '2tyTuWygMyihibQqjuqiQ');
													define('CONSUMER_SECRET', 'mx6v0Bkd9owx9yrt9NolznoE2LGVX7K8ljlymmUeVc');
													define('ACCESS_TOKEN', '80256651-VvqDj1EDmY5T4yyM6WLL5NO6GxJ3rE6VGBPAgCzHE');
													define('ACCESS_TOKEN_SECRET', 'G9fVKJe0H2q8LcUIQtnaPPHS7SyrxgD4FjWqjV9TEI7Ma');
													 
													$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
													/* $query = array(
																	"q" => "#WorldSeries"
																	);
														 
														$results = $toa->get('search/tweets', $query);
														 
														foreach ($results->statuses as $result) {
														  echo $result->user->screen_name . "COMDEXvirtual " . $result->text . "\n";
														  echo "imagess".$result->entities->media[0]->media_url  . "\n";
														}*/
													// $user = 'markdevday7';
													/*$user = 'COMDEXvirtual';
													 
													$timeline = $toa->get('statuses/user_timeline', array('screen_name' => $user));
													 */
													 ?>
													 <div class="live fl">
                                                   	  <h1>LIVE on Twitter</h1>
                                                    </div>
													<div style="padding-bottom: 10px;" class="twitter">
														<a class="twitter_feeds_heading" href="https://twitter.com/CIOCHOICE_SG">
															<img src="images/twitter.jpg" width="17" height="15">
															@CIOCHOICE_SG
														</a>
													</div>
													<div id="content_7" class="content mrgn" style="overflow-y: auto;height: 363px;width: 420px;">
													<div id="twitter-feed" style="width: 340px;">
													
													 <?php
												/*foreach ($timeline as $i => $tweet) {
													
														echo '<div class="cio_choice fl">
																	<span><img src="images/small_pic.jpg" alt="" width="59" height="59"></span>
																	<h1>CIO CHOICE Singapore @CIOCHOICE_SG</h1>
																	<p>';
																		echo "$tweet->text" . PHP_EOL;
														echo'
																		
																	</p>
																	<p><a href="https://twitter.com/intent/retweet?tweet_id=326818042568921088" class="retweet" style="display:inline-block;font-family:georgia,serif;font-size:12px;color:#000;text-decoration:none;padding:1px 5px;border:1px solid #ccc;border-radius:3px;background-color:#ddd;background:linear-gradient(to bottom, #f6f6f6, #ddd)">Retweet</a>
																	<style>.retweet:hover{opacity:0.9}</style>
																	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
																	</div>';
														
													
														
													}*/
													
														// session_start(); 
														// require_once("twitteroauth/twitteroauth/twitteroauth.php"); // markdevday7/9cXWOqeaf Path to twitteroauth library
														 
														// $twitteruser = "markdevday7";
														// $notweets = 30;
														// $consumerkey = "iX5GlIojTNcIBS6lRxzXTQ";
														// $consumersecret = "rgDRfdwqFqUM6q5FQXPibAcrQQ2HFW4Thy1fWPBnEXI";
														// $accesstoken = "80256651-ibAGsCQqnKXb0iyhEOrh53gcr9JYbZsDnl7z5URWS";
														// $accesstokensecret = "V7BWmFvUlIe6ZBPsauaER3IoFhetslLqKs8zbEGX7RQh5";

														// function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {

														  // $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);

														  // return $connection;

														// }														 
														// $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
														// $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
													
														// echo json_encode($tweets);
														// echo $tweets;
														
															
															

																	?>
																	<?php
																	/*require_once ('codebird.php'); 
																	$CONSUMER_KEY = 'iX5GlIojTNcIBS6lRxzXTQ';     
																	$CONSUMER_SECRET = 'rgDRfdwqFqUM6q5FQXPibAcrQQ2HFW4Thy1fWPBnEXI';     
																	$ACCESS_TOKEN = '80256651-ibAGsCQqnKXb0iyhEOrh53gcr9JYbZsDnl7z5URWS';     
																	$ACCESS_TOKEN_SECRET = 'V7BWmFvUlIe6ZBPsauaER3IoFhetslLqKs8zbEGX7RQh5';       
																	Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);     
																	$cb = Codebird::getInstance();     
																	$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);
																	//retrieve posts
																	$q = $_POST['q'];
																	$count = $_POST['count'];
																	$api = $_POST['api'];
																	//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
																	//https://dev.twitter.com/docs/api/1.1/get/search/tweets
																	$params = array(
																	'screen_name' => $q, 
																	'q' => $q,
																	'count' => $count
																	);
																	//Make the REST call
																	$data = (array) $cb->$api($params);
																	//Output result in JSON, getting it ready for jQuery to process
																	echo json_encode($data);*/
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