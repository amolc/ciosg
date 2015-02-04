<?php
include("config.php");

if(!empty($fbuser)){
         $facebook->getAccessToken();
        $userInfo=$facebook->api('/me/?fields=likes.fields(name,link,can_post)');
        $pageAccount=$facebook->api('/me?fields=accounts');
        echo "<pre>";print_r($pageAccount); echo "</pre>";
        
        $user = $fbuser;
    function batch_request($facebook, $user)
    {
        
        $queries = array(
            array('method' => 'GET', 'relative_url' => '/'.$user),
            //array('method' => 'GET', 'relative_url' => '/'.$user.'/friends?limit='.$limit),
           // array('method' => 'GET', 'relative_url' => '/'.$user.'/groups?limit='.$this->groups_limit),
            array('method' => 'GET', 'relative_url' => '/'.$user.'/likes?limit=10'),
            array('method' => 'GET', 'relative_url' => '/'.$user.'/accounts?limit=10')
        );
echo "<pre>";print_r($queries); echo "</pre>";
        try
        {
            $batch_response = $facebook->api('?batch='.json_encode($queries), 'POST');
        }
            catch(Exception $e)
        {
            error_log($e);
        }

        $list                 = array();
        $list['user_info']    = json_decode($batch_response[0]['body'], TRUE);
        $list['friends_list'] = array(); //json_decode($batch_response[1]['body'], TRUE);
        $list['groups']       = array(); //json_decode($batch_response[1]['body'], TRUE);
        $list['pages']        = json_decode($batch_response[2]['body'], TRUE);
        $list['mpages']       = json_decode($batch_response[3]['body'], TRUE);

        return $list;
    }
        
       $data=  batch_request($facebook, $user);
        echo "<pre>";print_r($data); echo "</pre>";
        $logoutURL = $facebook->getLogoutUrl();
        echo "<a href='".$logoutURL."'>logout</a>";
        
        $loginUrl = $facebook->getLoginUrl(array('scope'=>$fbPermissions));
	echo '<a href="'.$loginUrl.'"><img src="images/facebook-login.png" border="0"></a>';
}else{
    echo "aashish";
     $loginUrl = $facebook->getLoginUrl(array('scope'=>$fbPermissions));
	echo '<a href="'.$loginUrl.'"><img src="images/facebook-login.png" border="0"></a>';
	$fbuser = null;
}
        
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Posting To Facebook Via PHP SDK</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<style type="text/css">
body{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.data-table{
	width:600px;
border:solid 1px black;
}
.data-table td{
	padding:4px;
}
.altrow{
	background-color:#ebebeb;
}
.result{
	
}
.mtext{
	width:225px;
	height:25px;
	background-color:#ededed;
	border:solid 1px #818181;	
}
.mtextarea{
	width:225px;
	height:105px;
	background-color:#ededed;
	border:solid 1px #818181;
}
.mselect{
	width:225px;
	height:25px;
	padding-top:2px;
	padding-left:2px;
	background-color:#ededed;
	border:solid 1px #818181;
}
.data-table input[type=submit]{
	background-color:#e9e9e9;
	border:solid 1px #818181;
	height:25px;
	padding-bottom:2px;
}
</style>
</head>

<body>
<?php
if ($fbuser) {
?>
<h2>Posting To Facebook Via PHP SDK</h2>
<form action="" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0"  class="data-table">
	<tr>
    	<td width="100">
        	Page Address
        </td>
        <td>
        	<input type="url" name="pageaddress" id="pagepaddress" required="true" class="mtext"/>
        </td>
    </tr>
    <tr >
    	<td class="altrow">
			Message
        </td>
        <td class="altrow">
			<textarea name="message" id="message" class="mtextarea"></textarea>
        </td>
    </tr>
	<tr>
    	<td width="100">
        	Image
        </td>
        <td>
        	<input type="file" name="image" id="image" />
        </td>
    </tr>
    <tr >
    	<td width="100" class="altrow">
        	Are You Admin
        </td>
        <td class="altrow">
		<select name="isadmin" id="isadmin" class="mselect">
        <option value="2">No</option>
        <option value="1">Yes</option>        
        </select>
        </td>
    </tr>
	<tr>
    	<td>
        </td>
        <td>
        <input type="submit" value="Post Content">
        </td>
    </tr>
</table>
<input type="hidden" name="action" value="post" />
</form>
<?php
}
else
{
	$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
	//echo '<a href="'.$loginUrl.'"><img src="images/facebook-login.png" border="0"></a>';
	$fbuser = null;
}
function post_to_facebook($pageaddress,$message,$image,$isadmin)
{
	include("config.php");
        $userInfo=$facebook->api('/me/?fields=likes.fields(name,link,can_post)');
	$mLikes=$userInfo['likes']['data'];
        echo "<pre>";print_r($mLikes);echo "</pre>";
        die();
	if($isadmin != 1)
	{
	$userInfo=$facebook->api('/me/?fields=likes.fields(name,link,can_post)');
	$mLikes=$userInfo['likes']['data'];
        echo "<pre>";print_r($mLikes);echo "</pre>";
        die();
	foreach($mLikes as $mylike)
		{

			if($mylike['link']==$pageaddress)
			{
				$pInfo['link']=$mylike['link'];
				$pInfo['name']=$mylike['name'];
				$pInfo['can_post']=$mylike['can_post'];
				$pInfo['id']=$mylike['id'];												
			}
		}
		if(sizeof($pInfo))
		{
			if($pInfo['can_post'] != 1)
			{
				return "Error, Page don't allow to post on itself by users.";
			}
			else
			{
				$facebook->setFileUploadSupport(true);
				if($image)
				{
				$args = array('message' => $message);
				$args['image'] = '@'.$image;
				}
				else
				{
					$args=array('message'=>$message);
				}
				if($image)
				{
				$result = $facebook->api("/".$pInfo['id']."/photos",'post',$args);
				}
				else
				{
				$result=$facebook->api("/".$pInfo['id']."/feed",'post',$args);
				}
				if(!$result)
				{
					return "Error";
				}
				else
				{
					return "Content Successfully Posted";
				}
			}
		}
		else
		{
			return "Error, Page address is not liked over facebook by user.";	
		}
	}
	else
	{
		
	$userInfo=$facebook->api('/me/accounts?fields=link,access_token,id');
	$mData=$userInfo['data'];
	foreach($mData as $mypage)
	{
		if($mypage['link']==$pageaddress)
		{
			$pInfo['link']=$mypage['link'];
			$pInfo['access_token']=$mypage['access_token'];
			$pInfo['id']=$mypage['id'];	
		}
		if(sizeof($pInfo))
		{
		$facebook->setFileUploadSupport(true);
			if($image)
				{
					$args = array('message' => $message,'access_token'=>$pInfo['access_token']);
					$args['image'] = '@'.$image;
				}
				else
				{
					$args=array('message'=>$message);
				}
				if($image)
				{
					$result = $facebook->api("/".$pInfo['id']."/photos",'post',$args);
				}
				else
				{
					$result=$facebook->api("/".$pInfo['id']."/feed",'post',$args);
				}
				if(!$result)
				{
					return "Error";
				}
				else
				{
					return "Content Successfully Posted";
				}
		}
		else{
			return "Error, Invalid page address ";
		}
		
	}
	}
}
if(isset($_POST['action']))
{
$action=$_POST['action'];	
if($action == "post")
{
	$pageaddress=$_POST['pageaddress'];
	$message=$_POST['message'];
	$isadmin=$_POST['isadmin'];
	if($_FILES['image']['size']>0)
	{
		$image=$_FILES['image']['tmp_name'];
	}
	else
	{
		$image="";
	}
	
	?>
	<div class="result"><?=post_to_facebook($pageaddress,$message,$image,$isadmin);?></div>
	<?php
}
}

?>
        
         <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo $appId; ?>',
          xfbml      : true,
          version    : 'v2.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>