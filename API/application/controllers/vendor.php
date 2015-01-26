<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller {
	public function Manage()
	{
		parent::__construct();
		
	}
	/*function set_connection()
	{
	  $conn = mysqli_connect($servername, $username, $password, $dbname);
       // Check connection
     if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
     }
	}*/
	// this fuction add vendors
	public function manage_vendor()
	{
	  $data['msg'] = '';
	  $data['pr'] = '';
	  if($_POST)
	  {
	     $firstname = $_POST['first_name'];
		 $lastname = $_POST['last_name']; 
		 $companyname = $_POST['company_name'];
		 $emailid = $_POST['emailID'];
		 $password = $_POST['password'];
		 $mobno = $_POST['mob_no'];
		/* $result = mysql_query("select*from sg_vendor where firstName='$firstname'")or die(mysql_error());
		 $count = count($result);
		 
		 if($count==1)
		 {
		   $data['msg'] = "vendor already exists try again.!";
         }
	   else
	    {*/
	     $result = mysql_query("insert into sg_vendor(firstName,lastName,companyName,emailID,password,mob_no)values('$firstname','$lastname','$companyname','$emailid','$password','$mobno')")or die(mysql_error());
	 $data['msg'] = "Details has been save successfully";
	   // }
	 } 
	   $data['pr'] = 'add_vendor';
	   $this->load->view('vendor',$data);
	}
	public function show_vendors() // manage vendor
	{ 
	   $data['msg'] = '';
	   $data['pr'] = 'show_vendor';
	   $this->load->view('vendor',$data);
	}
	public function edit_vendor($vendor_id)//edit vendor
	{
	    $data['msg'] = '';
	    $data['pr'] = '';
	    if($_POST)
		{
		 $firstname = $_POST['first_name'];
		 $lastname = $_POST['last_name']; 
		 $companyname = $_POST['company_name'];
		 $emailid = $_POST['emailID'];
		 $password = $_POST['password'];
		 $mobno = $_POST['mob_no'];
	   mysql_query("update sg_vendor set firstName = '$firstname',lastName = '$lastname',companyName = '$companyname',emailID = '$emailid',password = $password,mob_no = '$mobno' where vendor_id = '$vendor_id'")or die(mysql_error());
	   $data['msg'] = "Details has been save successfully";
	   }
	   $data['venID'] = $vendor_id;
	   $data['pr'] = 'edit_vendor';
	   $this->load->view('vendor',$data);  
	}
	public function delete_vendor($vendor_id)//delete vendor
	{
	  mysql_query("delete from sg_vendor where vendor_id='$vendor_id'")or die(mysql_error());
	  $data['msg'] = "record deleted successfully";
	  header("location:".base_url()."vendor/show_vendors/");
	}
	
	
}	