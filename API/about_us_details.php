<?php
header('Content-Type: application/json');
include("config.php");

$table_name="pns_about_page_details";
$order_by="id_page";
$order_type="DESC";
$select_fields="id_page,overview_details,contact_no,email,website";
$page="";
$limit="";
$is_multiple="0";
$id_page="1";
$condition=" id_page='$id_page'";
//$file_field=array("chk_file_path" => "../admin/upload/publication_book/","file_path" => ROOT."/upload/publication_book/","default_file" => ROOT."/assets/images/noimage.png","file_field_col" => "book_image");

$data=array();

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}
if(isset($id_page) && $id_page!="")
{

	$page_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field="",$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	//$page_details="";
	if($page_details!="")
	{
		
		
		$data=$page_details;
		//$data['condition']=$utype;
		$message="Product Details Available";
		$returnCode=true;																									
	}else
	{
		$data=null;
		$message="Product Details Not Available";
		$returnCode=false;
	}
}else
{
	$data=null;
	$message="Product Id must be required";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>