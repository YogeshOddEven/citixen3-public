<?php
header('Content-Type: application/json');
include("config.php");

$table_name="pns_ride_offers_details";
$order_by="id";
$order_type="DESC";
$select_fields="";
				
$condition="";


if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

if(isset($_REQUEST['passenger_lat']) && $_REQUEST['passenger_lat']!="" && isset($_REQUEST['passenger_lat']) && $_REQUEST['passenger_lat']!="" && isset($_REQUEST['driver_lat']) && $_REQUEST['driver_lat']!="" && isset($_REQUEST['driver_lat']) && $_REQUEST['driver_lat']!="")
{
	$passenger_lat=$_REQUEST['passenger_lat'];
	$passenger_lng=$_REQUEST['passenger_lng'];
	$driver_lat=$_REQUEST['driver_lat'];
	$driver_lng=$_REQUEST['driver_lng'];
	$condition.=" ride_owner = '".$ride_owner."'";
	$origin=$driver_lat.",".$driver_lng;
	$destination=$passenger_lat.",".$passenger_lng;
	
	
	$url="https://maps.googleapis.com/maps/api/directions/json?origin=".$origin."&destination=".$destination."&key=AIzaSyCFGtlwJwkgasKTqmnPB5FHBT0qYmaanFk";
	$response=CallAPI($method="GET", $url, $data = false);
	$response_arr=(array) json_decode($response);
	$distance="0";$duration="0";
	if(isset($response_arr['routes'][0]->legs[0]->distance->text))
	{
		$distance=$response_arr['routes'][0]->legs[0]->distance->text;
	}
	if(isset($response_arr['routes'][0]->legs[0]->duration->text))
	{
		$duration=$response_arr['routes'][0]->legs[0]->duration->text;
	}
	

	//page condition
	
	$data=array();
	$data['distance']=$distance;
	$data['duration']=$duration;
	if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
	{
		$message="Details available";
	}
	else
	{
		$message = "Detalles disponibles";
	}
	$returnCode=true;
}else
{

	$data['distance']="0";
	$data['duration']="0";
	
	if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
	{
		$message="LatLong Must require";
	}
	else
	{
		$message = "LatLong Debe requerir";
	}
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>