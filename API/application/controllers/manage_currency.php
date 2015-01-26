<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_currency extends CI_Controller {
	public function Manage_currency()
	{
		parent::__construct();
		
	}
	public function get_currency()
	{
	
		if(!isset($_GET['currid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$currid=$_GET['currid'];
			$res=mysql_query("select * from currency where curr_ID='$currid'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
			$vendor_response['curr_data']=mysql_fetch_array($res);
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	
	public function list_currency()
	{
			$array=array();
			$res=mysql_query("select curr_ID,country_code,currency_label,conversion_rate from currency");
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
	public function add_currency()
	{
		if(isset($_GET['country_code']))
		{
			$country_code=$_GET['country_code'];
			$currency=$_GET['currency'];
			$conversion_rate=$_GET['conversion_rate'];
			$creation_date=date('Y-m-d H:i:s');
			$last_modified=date('Y-m-d H:i:s');
			
			$res=mysql_query("insert into currency(country_code,currency_label,conversion_rate,creation_date,last_modified) values('$country_code','$currency','$conversion_rate','$creation_date','$last_modified')")or die(mysql_error());
			$response['Result']='currency added successfully';

			
		}
		else
		{
			$response['Result']='Input required';
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
		
	}
	public function edit_currency()
	{
		
		
			$curr_id=$_GET['edit_currency_id'];
			$edit_country_code=$_GET['edit_country_code'];
			$edit_currency=$_GET['edit_currency'];
			$edit_conversion_rate=$_GET['edit_conversion_rate'];
			
			
			$res=mysql_query("update currency set country_code='$edit_country_code',currency_label='$edit_currency',conversion_rate='$edit_conversion_rate' where curr_ID='$curr_id'")or die(mysql_error());
			if($res) {$response['Result']='Currency details updated successfully';}
			else
			{
				$response['Result']='Updation error';
			}
			
			echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	
	public function delete_currency($currid)
	{
		if($currid<=0||$currid=='')
		{
			$response['Error']='Invalid Input';
		}
		else
		{
			$ans=mysql_query("select curr_ID from currency where curr_ID='$currid'");
			if(!mysql_num_rows($ans))
			{
				$response['Error']='This record not present in Database';
			}
			else
			{
				$res=mysql_query("delete from currency where curr_ID='$currid'")or die(mysql_error());
				$response['Result']='Currency deleted successfully';
				
			}
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	
	
}

?>
