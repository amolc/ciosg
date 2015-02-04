<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {
	public function post()
	{
		parent::__construct();
		
	}
	function httpPost($url,$params)
	{
	  $postData = '';
	   //create name value pairs seperated by &
	   foreach($params as $k => $v)
	   {
		  $postData .= $k . '='.$v.'&';
	   }
	   rtrim($postData, '&');
	   
	 
		$ch = curl_init();       
	 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, count($postData));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);       
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);          
		$output=curl_exec($ch);
	 
		curl_close($ch);
		return $output;
	 
	}
	function get_vendor()
	{
		$para['firstname']=$_POST['firstname'];
		$para['lastname']=$_POST['lastname'];
		$para['mobile_number']=$_POST['mobile_number'];
		$para['emailID']=$_POST['emailID'];
		$para['company']=$_POST['company'];
		$para['business_title']=$_POST['business_title'];
		$para['password']=$_POST['password'];
	//	echo httpPost('http://192.168.1.33/dropbox/cio_choice/vendor2/add_vendor/',$para);

	}
}

?>