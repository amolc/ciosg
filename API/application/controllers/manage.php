<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	public function Manage()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	
	function manage_company()// manage company data
	{
		$data['pr']='manage_company';
		$this->load->view('company',$data);
		
	}
	function add_company()//add new company
	{
		$data['msg']='';
		if($_POST)
		{
			$cname=$_POST['company_name'];	
			$caddress=$_POST['company_address'];
			$contact=$_POST['company_contact'];
			$city=$_POST['city'];
			$state=$_POST['state'];	
			$country=$_POST['country'];
			$zipcode=$_POST['zipcode'];
			mysql_query("insert into sg_company(cname,caddress,contact_no,city,state,country,zipcode) values('$cname','$caddress','$contact','$city','$state','$country','$zipcode')") or die(mysql_error());
			$data['msg']="<div class='alert-success'>Company Details Save Successfully</div>";
		}
		$data['pr']='add_company';
		$this->load->view('company',$data);
		
	}
	function edit_company($cID)//edit company data
	{
		$data['msg']='';
		if($_POST)
		{
			$cname=$_POST['company_name'];	
			$caddress=$_POST['company_address'];
			$contact=$_POST['company_contact'];
			$city=$_POST['city'];
			$state=$_POST['state'];	
			$country=$_POST['country'];
			$zipcode=$_POST['zipcode'];
			mysql_query("update sg_company set cname='$cname',caddress='$caddress',contact_no='$contact',city='$city',state='$state',country='$country',zipcode='$zipcode' where cID='$cID'") or die(mysql_error());
			$data['msg']="<div class='alert-success'>Company Details Updated Successfully</div>";
		}
		$data['cID']=$cID;
		$data['pr']='edit_company';
		$this->load->view('company',$data);
		
	}
	function delete_company($cID)//delete company data
	{
		mysql_query("delete from sg_company where cID='$cID'") or die(mysql_error());
		$data['msg']="<div class='alert-success'>Company Details Deleted Successfully</div>";
		$data['pr']='manage_company';
		$this->load->view('company',$data);
	}
	function manage_category()
	{
		$data['pr']='manage_category';
		$this->load->view('category',$data);
	}
	
	function add_category()//add new company
	{
		$data['msg']='';
		if($_POST)
		{
			$cname=$_POST['company_name'];	
			$caddress=$_POST['company_address'];
			$contact=$_POST['company_contact'];
			$city=$_POST['city'];
			$state=$_POST['state'];	
			$country=$_POST['country'];
			$zipcode=$_POST['zipcode'];
			mysql_query("insert into sg_company(cname,caddress,contact_no,city,state,country,zipcode) values('$cname','$caddress','$contact','$city','$state','$country','$zipcode')") or die(mysql_error());
			$data['msg']="<div class='alert-success'>Company Details Save Successfully</div>";
		}
		$data['pr']='add_category';
		$this->load->view('category',$data);
		
	}
	
}
?>
