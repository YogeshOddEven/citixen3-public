<?php
ob_start();
session_start();
require_once("config.php");
include("../functions.php");
include "api_action_list_data.php";

$redirect_url="../index.php?pid=home";

if(isset($_REQUEST['action']))
{
	$call_to_action=$_REQUEST['action'];
	$redirect_url_success=$_REQUEST['redirect_url_success'];
	$redirect_url_error=$_REQUEST['redirect_url_error'];
	$API_Call_Method="POST";
	if(isset($action_API_list[($call_to_action)]))
	{
		if($call_to_action=="login")
		{
			$cur_API_URL=$action_API_list[($call_to_action)];
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=(array) json_decode($APIReturnDataJSON);
			// print_r($APIReturnDataArr);
		}else
		{
			$cur_API_URL=$action_API_list[($call_to_action)];
			$APIReturnDataJSON=CallAPI($API_Call_Method, $cur_API_URL, $_REQUEST);
			$APIReturnDataArr=(array) json_decode($APIReturnDataJSON);
		}
		
		
	}
	
} 
// header("Location:".$redirect_url);
?>