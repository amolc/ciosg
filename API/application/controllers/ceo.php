<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CEO extends CI_Controller {
	public function ceo()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function get_ceo()
	{
	
		if(!isset($_GET['cid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$cID=$_GET['cid'];
			$res=mysql_query("select * from user_cio where cID='$cID'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
				$vendor_response['ceo_data']=mysql_fetch_array($res);
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	
	public function list_ceo()
	{
			$array=array();
			$res=mysql_query("select * from user_cio");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$response['Error']='No data found';
			}
			while($row=mysql_fetch_assoc($res))
			{
				
				array_push($array,$row);
				
			}
		
		echo $_GET['callback'] . '(' .json_encode($array) . ')';
		
	}
	public function add_ceo()
	{
		if(isset($_GET['firstname']))
		{
			$firstname=$_GET['firstname'];
			$lastname=$_GET['lastname'];
			$emailID=$_GET['emailID'];
			$company=$_GET['company'];
			$mobile_number=$_GET['mobile_number'];
			
			$company_address=$_GET['company_address'];
			$secretary_name=$_GET['secretary_name'];
			$secretary_email=$_GET['secretary_email'];
			$secretary_phone=$_GET['secretary_phone'];
			$password=$_GET['password'];
			
			$res=mysql_query("insert into user_cio(firstname,lastname,company,emailID,mobile_number,password,secretary_name,secretary_email,secretary_phone,company_address) values('$firstname','$lastname','$company','$emailID','$mobile_number','$password','$secretary_name','$secretary_email','$secretary_phone','$company_address')")or die(mysql_error());
			$response['Result']='CEO added successfully';

			
		}
		else
		{
			$response['Error']='Input required';
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
		
	}
	public function edit_ceo()
	{
		
		
			$cid=$_GET['edit_cid'];
			$firstname=$_GET['edit_firstname'];
			$lastname=$_GET['edit_lastname'];
			$emailID=$_GET['edit_emailID'];
			$company=$_GET['edit_company'];
			$mobile_number=$_GET['edit_mobile_number'];
			
			$company_address=$_GET['edit_company_address'];
			$secretary_name=$_GET['edit_secretary_name'];
			$secretary_email=$_GET['edit_secretary_email'];
			$secretary_phone=$_GET['edit_secretary_phone'];
			
			$res=mysql_query("update user_cio set firstname='$firstname',lastname='$lastname',company='$company',emailID='$emailID',mobile_number='$mobile_number',secretary_name='$secretary_name',secretary_email='$secretary_email',secretary_phone='$secretary_phone',company_address='$company_address' where cID='$cid'")or die(mysql_error());
			if($res) {$response['Result']='CEO updated successfully';}
			else
			{
				$response['Result']='Updation error';
			}
			
			echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	public function delete_ceo($cid)
	{
		if($cid<=0||$cid=='')
		{
			$response['Error']='Invalid Input';
		}
		else
		{
			$ans=mysql_query("select cID from user_cio where cID='$cid'");
			if(!mysql_num_rows($ans))
			{
				$response['Error']='This record not present in Database';
			}
			else
			{
				$res=mysql_query("delete from user_cio where cID='$cid'")or die(mysql_error());
				$response['Result']='CEO deleted successfully';
				
			}
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	public function login()
	{
		$userid='';
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
				//$qur=mysql_query("select * from sessions where userID='$userid'");
				$response['session_data']=mysql_fetch_array($rs);
				$response['Success']='Success';
				
			}
			
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function get_session_data()
	{
		if($_GET['userID'])
		{
			$userID=$_GET['userID'];
			
			$qur=mysql_query("select sessionNo from sessions where userID='$userID'");
			$response['s_data']=mysql_fetch_array($qur);
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	
}
?>
