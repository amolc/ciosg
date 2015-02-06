<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	public function category()
	{
		parent::__construct();
		
	}
	
	
	public function add_category()
	{
		if(isset($_GET['cat_name']))
		{
			$cat_name=$_GET['cat_name'];
			$cat_desc=$_GET['cat_desc'];
			
			
			$res=mysql_query("insert into category(cat_name,cat_description) values('$cat_name','$cat_desc')")or die(mysql_error());
			$response['Result']='Category added successfully';

			
		}
		else
		{
			$response['Error']='Input required';
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
		
	}
	public function list_category()
	{
			$array=array();
			$res=mysql_query("select * from category");
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
	public function get_category()
	{
	
		if(!isset($_GET['catid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$catid=$_GET['catid'];
			$res=mysql_query("select * from category where catID='$catid'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
				$vendor_response['cat_data']=mysql_fetch_array($res);
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	public function edit_category()
	{
		
		
			$edit_cat_ID=$_GET['edit_cat_ID'];
			$edit_cat_name=$_GET['edit_cat_name'];
			$edit_cat_desc=$_GET['edit_cat_desc'];
			
			$res=mysql_query("update category set cat_name='$edit_cat_name',cat_description='$edit_cat_desc' where catID='$edit_cat_ID'")or die(mysql_error());
			if($res) {$response['Result']='Category updated successfully';}
			else
			{
				$response['Result']='Updation error';
			}
			
			echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function delete_category($catid)
	{
		if($catid<=0||$catid=='')
		{
			$response['Error']='Invalid Input';
		}
		else
		{
			$ans=mysql_query("select catID from category where catID='$catid'");
			if(!mysql_num_rows($ans))
			{
				$response['Error']='This record not present in Database';
			}
			else
			{
				$res=mysql_query("delete from category where catID='$catid'")or die(mysql_error());
				$response['Result']='Category deleted successfully';
				
			}
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function add_item()
	{
		if(isset($_GET['item_name']))
		{
			$item_name=$_GET['item_name'];
			$item_desc=$_GET['item_desc'];
			$item_price=$_GET['item_price'];
			$cat=$_GET['category'];
			
			
			$res=mysql_query("insert into item(item_name,item_description,catID,item_price) values('$item_name','$item_desc','$cat','$item_price')")or die(mysql_error());
			$response['Result']='Item added successfully';

			
		}
		else
		{
			$response['Error']='Input required';
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
		
	}
	public function list_item()
	{
			$array=array();
			$res=mysql_query("select item_ID,item_name,item_price,cat_name,item_description from item,category where category.catID=item.catID")or die(mysql_error());
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
	public function get_item()
	{
	
		if(!isset($_GET['itemid']))
		{
			$vendor_response['Error']='Invalid input';
		}
		else
		{
			$itemid=$_GET['itemid'];
			$res=mysql_query("select * from item where item_ID='$itemid'");
			$n=mysql_num_rows($res);
			if(!$n)
			{
				$vendor_response['Error']='No data found';
			}
				$vendor_response['item_data']=mysql_fetch_array($res);
		}
		echo $_GET['callback'] . '(' .json_encode($vendor_response) . ')';
	}
	public function get_item_for($catID)
	{
		$array=array();
		$res=mysql_query("select * from item where catID='$catID'");
		$n=mysql_num_rows($res);
		if(!$n)
		{
			$vendor_response['Error']='No data found';
		}
		while($row=mysql_fetch_assoc($res))
			{
				
				array_push($array,$row);
				
			}
		
			echo $_GET['callback'] . '(' .json_encode($array) . ')';
	}
	public function edit_item()
	{
		
		
			$edit_item_ID=$_GET['edit_item_ID'];
			$edit_item_name=$_GET['edit_item_name'];
			$edit_item_desc=$_GET['edit_item_desc'];
			$edit_category=$_GET['edit_category'];
			$edit_item_price=$_GET['edit_item_price'];
			
			$res=mysql_query("update item set item_name='$edit_item_name',item_price='$edit_item_price',item_description='$edit_item_desc',catID='$edit_category' where item_ID='$edit_item_ID'")or die(mysql_error());
			if($res) {$response['Result']='Item updated successfully';}
			else
			{
				$response['Result']='Updation error';
			}
			
			echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function delete_item($itemid)
	{
		if($itemid<=0||$itemid=='')
		{
			$response['Error']='Invalid Input';
		}
		else
		{
			$ans=mysql_query("select item_ID from item where item_ID='$itemid'");
			if(!mysql_num_rows($ans))
			{
				$response['Error']='This record not present in Database';
			}
			else
			{
				$res=mysql_query("delete from item where item_ID='$itemid'")or die(mysql_error());
				$response['Result']='Item deleted successfully';
				
			}
			
		}
		echo $_GET['callback'] . '(' .json_encode($response) . ')';
	}
	public function list_pending_cio()
	{
			$array=array();
			$res=mysql_query("select cID,firstname,lastname,emailID,registration_status from user_cio where registration_status in('pending','declined')")or die(mysql_error());
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
	public function list_pending_vendor()
	{
			$array=array();
			$res=mysql_query("select vID,firstname,lastname,emailID,registration_status from user_vendor where registration_status in('pending','declined')")or die(mysql_error());
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
	public function accept_cio()
	{
		
		$cid=$_GET['cid'];
		$query=mysql_query("select firstname,lastname,emailID,registration_type,password from user_cio where cID='$cid'");
		$res['email_data']=mysql_fetch_array($query);
		echo $_GET['callback'] . '(' .json_encode($res) . ')';
		
		
	}
	public function cio_accepted()
	{
		$cid=$_GET['cid'];
		mysql_query("update user_cio set registration_status='accepted' where cID='$cid'");
		$res['result']="request accepted";
		echo $_GET['callback'] . '(' .json_encode($res) . ')';
	}
	public function accept_vendor()
	{
		
		$vid=$_GET['vid'];
		$query=mysql_query("select firstname,lastname,emailID,registration_type,password from user_vendor where vID='$vid'");
		$res['email_data']=mysql_fetch_array($query);
		echo $_GET['callback'] . '(' .json_encode($res) . ')';
		
		
	}
	public function vendor_accepted()
	{
		$vid=$_GET['vid'];
		mysql_query("update user_vendor set registration_status='accepted' where vID='$vid'");
		$res['result']="request accepted";
		echo $_GET['callback'] . '(' .json_encode($res) . ')';
	}
	
	public function vendor_declined()
	{
		$vid=$_GET['vid'];
		mysql_query("update user_vendor set registration_status='declined' where vID='$vid'");
		$res['result']="request declined";
		echo $_GET['callback'] . '(' .json_encode($res) . ')';
	}
	
	public function cio_declined()
	{
		$cid=$_GET['cid'];
		mysql_query("update user_cio set registration_status='declined' where cID='$cid'");
		$res['result']="request declined";
		echo $_GET['callback'] . '(' .json_encode($res) . ')';
	}
			
									
	
}
?>

