<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LOGIN extends CI_Controller {
	public function login()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	public function login()
	{
	
		if($_GET['username'] == '' || $_GET['password'] == '')
		{
			
			$response['Error']='Please Enter Login Details';
		}
		else
		{
			$username = $_GET['username'];
			$password = $_GET['password'];
			
			$res=mysql_query("select * from users where username='$username' and password='$password'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				
				$response['Error']='Invalid Username or Password';
			}
			else
			{
				
				while($row=mysql_fetch_assoc($res))
				{
					$userid = $row['userID'];
				
				}
			
				$rand_no = rand(00000,99999)."-".rand(00000,99999)."-".rand(00000,99999);
				$expiry = time() * 60 * 60 * 2;
				
				$rs=mysql_query("select * from sessions where userID='$userid'");
				$cnt=mysql_num_rows($rs);
				if(!$cnt)
				{
					$sql=mysql_query("insert into sessions(userID,sessionNo,expiry) values ('$userid','$rand_no','$expiry')")or die(mysql_error());
				}
				$response['Success']='Success';
				
			}
			
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	
	
	
	
}
?>
