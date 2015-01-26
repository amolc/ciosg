<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_companies extends CI_Controller {
	public function Manage_companies()
	{
		parent::__construct();
		
	}
	public function get_parent_company()
	{
	
		if(!isset($_GET['pid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$pID=$_GET['pid'];
			$res=mysql_query("select * from parent_company where pID='$pID'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
			$vendor_response['pc_data']=mysql_fetch_array($res);
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	public function get_regional_company()
	{
	
		if(!isset($_GET['rid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$rID=$_GET['rid'];
			$res=mysql_query("select * from regional_company where rID='$rID'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
			$vendor_response['rc_data']=mysql_fetch_array($res);
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	
	public function list_parent_company()
	{
			$array=array();
			$res=mysql_query("select * from parent_company");
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
	public function add_parent_company()
	{
		if(isset($_GET['parent_company_name']))
		{
			$parent_company_name=$_GET['parent_company_name'];
			$parent_domain_name=$_GET['parent_domain_name'];
			$parent_company_country=$_GET['parent_company_country'];
			
			$res=mysql_query("insert into parent_company(name,domain_name,country) values('$parent_company_name','$parent_domain_name','$parent_company_country')")or die(mysql_error());
			$response['Result']='Parent company added successfully';

			
		}
		else
		{
			$response['Result']='Input required';
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
		
	}
	public function edit_parent_company()
	{
		
		
			$pid=$_GET['edit_pid'];
			$edit_parent_company_name=$_GET['edit_parent_company_name'];
			$edit_parent_domain_name=$_GET['edit_parent_domain_name'];
			$edit_parent_company_country=$_GET['edit_parent_company_country'];
			
			
			$res=mysql_query("update parent_company set name='$edit_parent_company_name',domain_name='$edit_parent_domain_name',country='$edit_parent_company_country' where pID='$pid'")or die(mysql_error());
			if($res) {$response['Result']='company details updated successfully';}
			else
			{
				$response['Result']='Updation error';
			}
			
			echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function edit_regional_company()
	{
		
		
			$rid=$_GET['edit_rid'];
			$edit_regional_company_name=$_GET['edit_regional_company_name'];
			$edit_regional_domain_name=$_GET['edit_regional_domain_name'];
			$edit_regional_company_country=$_GET['edit_regional_company_country'];
			
			$pID=$_GET['edit_regional_parent_company'];
			$query=mysql_query("select name from parent_company where pID='$pID'");
			$row=mysql_fetch_row($query);
			$name=$row[0];
			
			$res=mysql_query("update regional_company set name='$edit_regional_company_name',domain_name='$edit_regional_domain_name',country='$edit_regional_company_country',pID='$pID',parent_company='$name' where rID='$rid'")or die(mysql_error());
			if($res) {$response['Result']='company details updated successfully';}
			else
			{
				$response['Result']='Updation error';
			}
			
			echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	public function delete_parent_company($pcid)
	{
		if($pcid<=0||$pcid=='')
		{
			$response['Error']='Invalid Input';
		}
		else
		{
			$ans=mysql_query("select pID from parent_company where pID='$pcid'");
			if(!mysql_num_rows($ans))
			{
				$response['Error']='This record not present in Database';
			}
			else
			{
				$res=mysql_query("delete from parent_company where pID='$pcid'")or die(mysql_error());
				$response['Result']='Parent company deleted successfully';
				
			}
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function add_regional_company()
	{
		if(isset($_GET['regional_company_name']))
		{
			$regional_company_name=$_GET['regional_company_name'];
			$regional_domain_name=$_GET['regional_domain_name'];
			$regional_company_country=$_GET['regional_company_country'];
			$pID=$_GET['regional_primary_company'];
			$query=mysql_query("select name from parent_company where pID='$pID'");
			$row=mysql_fetch_row($query);
			$name=$row[0];
			
			
			
			$res=mysql_query("insert into regional_company(name,domain_name,country,pID,parent_company)values('$regional_company_name','$regional_domain_name','$regional_company_country','$pID','$name')")or die(mysql_error());
			$response['Result']='Regional company added successfully';

			
		}
		else
		{
			$response['Result']='Input required';
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
		
	}
	
	public function list_regional_company()
	{
			$array=array();
			$res=mysql_query("select rID,name,domain_name,country,parent_company from regional_company");
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
	
	public function delete_regional_company($rcid)
	{
		if($rcid<=0||$rcid=='')
		{
			$response['Error']='Invalid Input';
		}
		else
		{
				$res=mysql_query("delete from regional_company where rID='$rcid'")or die(mysql_error());
				$response['Result']='Regional company deleted successfully';
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	
	
}

?>
