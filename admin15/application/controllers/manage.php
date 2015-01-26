<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {
	public function post()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
			$data['msg'] = '';
			$this->load->view('login');
	}
	
	function signup()
	{
		
		if($_POST)
		{
			$username = $this->input->post('username');
			$emailID = $this->input->post('emailID');
			$password = $this->input->post('password');
			$retypepassword = $this->input->post('retypepassword');
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$zipcode = $this->input->post('zipcode');
			$country = $this->input->post('country');
			$contact_no = $this->input->post('contact_no');
			
			
			$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
			$this->form_validation->set_rules('emailID', 'Email ID', 'required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('retypepassword', 'Re-Type Password', 'required|matches[password]');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('zipcode', 'Zip Code', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|numeric|max_length[11]');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{					
	
				$cnt = 1;
				if($emailID && $username)
					{
						$sql = mysql_query("SELECT * FROM sg_users WHERE emailID = '$emailID' or username = '$username'") or die(mysql_error()); $cnt = mysql_num_rows($sql);
					}
				if($cnt)
					{
						$data['msg'] = "<div class='alert alert-error'>Email Address or Username Already Exists! Please use another one.</div>";
					}
				else
					{
						
						
						$ins_data['username'] = $this->input->post('username');
						$ins_data['contact_no'] = $this->input->post('contact_no');
						$ins_data['password'] = $this->input->post('password');
						$ins_data['emailID'] = strtolower($this->input->post('emailID'));
						$ins_data['firstname'] = $this->input->post('firstname');
						$ins_data['lastname'] = $this->input->post('lastname');
						$ins_data['address'] = $this->input->post('address');
						$ins_data['gender'] = $this->input->post('gender');
						$ins_data['city'] = $this->input->post('city');
						$ins_data['state'] = $this->input->post('state');
						$ins_data['country'] = $this->input->post('country');
						$ins_data['zipcode'] = $this->input->post('zipcode');
						$ins_data['subscribed'] = 0;
						$ins_data['accountExpireDate'] = 0; /*$row['joinDate'] + (60*60*24*36);*/
						$ins_data['joinDate'] = time();
						$ins_data['status'] = 1;
						
						$userID = $this->zll->gInsert('users',$ins_data);
						
						 // insert into system log
						$this->zll->log_entry("User has just sign up ",$userID);

						$where['userID'] = $userID;
						  
						
						 $rs = $this->zll->gSelectWhere('users',$where);
						 $emwhere['id'] = 1;
						 $emdata = $this->zll->gSelectWhere('emailtemplate',$emwhere);
						 $name = $emdata[0]['name'];
						 $webPage = $emdata[0]['details_eng'];
						 $Subject = $emdata[0]['subject'];
						 $fromName = $emdata[0]['fromName'];
						 $fromID  = $emdata[0]['fromID'];
						 $replyTo = $emdata[0]['replyTo'];
				
						$patterns[0] = '/{FULLNAME}/';
						$patterns[1] = '/{USERNAME_U}/';
						$patterns[2] = '/{PASSWORD_P}/';
						$replacements[0] = $rs[0]['firstname']." ".$rs[0]['lastname'];
						$replacements[1] = $rs[0]['username'];
						$replacements[2] = $rs[0]['password'];
						$emailid=$rs[0]['emailID'];
						$details = preg_replace($patterns, $replacements, $webPage);
						$TO = $emailid;
						
						$this->zll->email($TO,$fromID,$fromName,$Subject,$details);
									
						$data['msg'] = "<div class='alert alert-error'>Your login details has been sent to your email</div>";
						$this->zll->refresh_data($userID);
						header("location:".base_url()."ma/process/".$plan);
					}
				
			  }
			
		
			
		}
	
		
		$this->load->view('signup',$data);
	}
	
	public function login()
	{
		
		 
		if($_POST)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$this->form_validation->set_rules('username', 'Username', 'required|alpha');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
					$where['username'] = $username;
					$where['password'] = $password;
					$rs = $this->zll->gSelectWhere('users',$where);
					
					if($rs)
					{
					
						   $this->zll->refresh_data($rs[0]['userID']);
						   header("location:".base_url()."manage/dashboard/");
					}
					else
					{
						$data['msg'] = "<div class='alert alert-error'>Invalid Login Details</div>";
					}
			}
		
		
		}	
		$data['pr'] = 'login';
		$this->load->view('login',$data);	
	}
	
	public function logout()
	{
		$login_session['userID'] = '';
			
		$this->session->set_userdata($login_session);			
		header("location:".base_url()."manage/login/");
	}
	
	public function dashboard()
	{
		$data['pr'] = 'add_cio';
		$this->load->view('cio',$data);
	}
	
	
	public function manage_vendor()
	{
		
		
		$this->load->view('vendor');
	}
	public function edit_vendor()
	{
		$this->load->view('edit_vendor');
		
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
	public function get_vendor()
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