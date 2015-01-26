<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor2 extends CI_Controller {
	public function vendor2()
	{
		parent::__construct();
		
	}
	public function get_vendor()
	{
	
		if(!isset($_GET['vid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$vID=$_GET['vid'];
			$res=mysql_query("select * from user_vendor where vID='$vID'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
			
				
				$vendor_response['vendor_data']=mysql_fetch_array($res);
				$vendor_response['Result']='Success';
								
			
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	
	public function list_vendor()
	{
			$array=array();
			$res=mysql_query("select vID,firstname,lastname,company,business_title,emailID,mobile_number from user_vendor");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$response['Error']='No data found';
			}
			while($row=mysql_fetch_assoc($res))
			{
				/*$result['First Name']=$row['firstname'];
				$result['Last Name']=$row['lastname'];
				$result['emailID']=$row['emailID'];
				$result['company']=$row['company'];
				$result['mobile number']=$row['mobile_number'];
				$result['company address']=$row['company_address'];
				$result['secretary name']=$row['secretary_name'];
				$result['secretary email']=$row['secretary_email'];
				$result['secretary phone']=$row['secretary_phone'];
				$response['CEO data']=$result;
				$response['Result']='Success';*/
				array_push($array,$row);
				
			}
		
		echo $_GET['callback'] . '(' .json_encode($array) . ')';
		
	}
	
	public function add_vendor()
	{
		
		error_reporting(0);
		
		if(isset($_GET['firstname']))
		{
			$firstname=$_GET['firstname'];
			$lastname=$_GET['lastname'];
			$emailID=$_GET['emailID'];
			$company=$_GET['company'];
			$mobile_number=$_GET['mobile_number'];
			$business_title=$_GET['business_title'];
			$password=$_GET['password'];
		
			$res=mysql_query("insert into user_vendor(firstname,lastname,company,business_title,emailID,mobile_number,password) values('$firstname','$lastname','$company','$business_title','$emailID','$mobile_number','$password')")or die(mysql_error());
			$response['Result']='Vendor added successfully';

			
		}
		else
		{
			$response['Result']='Input required for add vendor';
		}
		
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	
	public function edit_vendor()
	{
			$vid=$_GET['edit_vid'];
			$edit_firstname=$_GET['edit_firstname'];
			$edit_lastname=$_GET['edit_lastname'];
			$edit_emailID=$_GET['edit_emailID'];
			$edit_company=$_GET['edit_company'];
			$edit_mobile_number=$_GET['edit_mobile_number'];
			$edit_business_title=$_GET['edit_business_title'];
			
		
			$res=mysql_query("UPDATE user_vendor SET `firstname`='$edit_firstname',`lastname`='$edit_lastname',`company`='$edit_company',`business_title`='$edit_business_title',`emailID`='$edit_emailID',`mobile_number`='$edit_mobile_number' WHERE `vID`='$vid'")or die(mysql_error());
			if($res){$response['Result']='Vendor updated successfully';}
			else{
			$response['Result']='Updation error';
			}
			
			
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	public function delete_vendor($vid)
	{
		if($vid<=0)
		{
			$response['Result']='Invalid Input';
		}
		else
		{
			$ans=mysql_query("select vID from user_vendor where vID='$vid'");
			if(!mysql_num_rows($ans))
			{
				$response['Result']='This record not present in Database';
			}
			else
			{
				$res=mysql_query("delete from user_vendor where vID='$vid'")or die(mysql_error());
				$response['Result']='vendor deleted successfully';
			}
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
}
?>

