<?php
/*
 * login_with_linkedin.php
 *
 * @(#) $Id: login_with_linkedin.php,v 1.2 2013/07/31 11:48:04 mlemos Exp $
 *
 */

	/*
	 *  Get the http.php file from http://www.phpclasses.org/httpclient
	 */
	require('linkedin/oauth/http.php');
	require('linkedin/oauth/oauth_client.php');

	$client = new oauth_client_class;
	$client->debug = 1;
	$client->debug_http = 1;
	$client->server = 'LinkedIn';
	$client->redirect_uri = 'http://www.cio-choice.sg/';

	$client->client_id = '75iy9759ka2tc1'; 
	$application_line = __LINE__;
	$client->client_secret = 'tfvcnVBYVZGsXYvO';

	/*  API permission scopes
	 *  Separate scopes with a space, not with +
	 */
	$client->scope = 'r_fullprofile r_emailaddress';

	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->access_token))
			{
				$success = $client->CallAPI(
					'http://api.linkedin.com/v1/people/~:(id,headline,industry,distance,current-share,summary,specialties,positions,public-profile-url,formatted-name,formatted-phonetic-name,first-name,last-name,picture-url,email-address,phone-numbers)', 
					'GET', array(
						'format'=>'json'
					), array('FailOnAccessError'=>true), $user);

				// GET http://api.linkedin.com/v1/people/~:(email-address)

				
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
	if(strlen($client->authorization_error))
	{
		$client->error = $client->authorization_error;
		$success = false;
	}
	if($success)
	{
		$nowUser = array();	
		$user_nameArr = explode("@",$user->emailAddress);
		$nowUser['display_name'] = $user->formattedName;
		$nowUser['email'] = $user->emailAddress;
		$nowUser['user_name'] = $user_nameArr[0];
		$nowUser['user_id'] = $user->id;
		$nowUser['user_data'] = $user; 		
	}
	else
	{
		echo HtmlSpecialChars($client->error);
		exit;
	}
?>