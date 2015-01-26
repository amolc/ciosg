<?php
ob_start();
    session_start();
		$email = $_GET['email'];
        $config['base_url']             =   'http://www.cio-choice.sg/auth.php?email='.$email.'';
    $config['callback_url']         =   'http://www.cio-choice.sg/demo.php?email='.$email.'';
    // $config['callback_url']         =   'http://staging.cio-choice.sg/advisory_panel.php';
    $config['linkedin_access']      =   '75iy9759ka2tc1';
    $config['linkedin_secret']      =   'tfvcnVBYVZGsXYvO';
	      // $config['linkedin_access']      =   '1fc97dd4-06ee-4d20-bad2-7752278f8f59';
    // $config['linkedin_secret']      =   '0a92d6ba-4d9b-40b7-a913-64d093115a51';

    include_once "linkedin.php";

    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

    # Now we retrieve a request token. It will be set as $linkedin->request_token
    $linkedin->getRequestToken();
    

    $_SESSION['requestToken'] = serialize($linkedin->request_token);
    $requestTokenNew = serialize($linkedin->request_token);
  
    setcookie("requestTokenNew", $requestTokenNew, time()+3600);
    # With a request token in hand, we can generate an authorization URL, which we'll direct the user to
    //echo "Authorization URL: " . $linkedin->generateAuthorizeUrl() . "\n\n";
    header("Location: " . $linkedin->generateAuthorizeUrl());
?>
