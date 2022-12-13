<?php
ob_start();
session_start();
include("../process/config.php");
include("../functions.php");
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 1234560);
include("excel/PHPExcel-develop/Classes/PHPExcel.php");

$objPHPExcel = new PHPExcel();

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Report');
$style = array(
    'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);

$style1 = array(
    'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => '64b853')
), 'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT),
    'font'  => array('bold'  => true,'color' => array('rgb' => 'ffff'),'size'  => 13,'name'  => 'Verdana')
);

$style2 = array(
    'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => '64b853')
), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
'font'  => array('bold'  => true,'color' => array('rgb' => 'ffff'),'size'  => 13,'name'  => 'Verdana')
);

$styleArray = array(
    'font'  => array('bold'  => true,
    'color' => array('rgb' => '64b853'),
    'size'  => 13,
    'name'  => 'Verdana'
));

$objPHPExcel->getActiveSheet()->setCellValue('A1','Id');
$objPHPExcel->getActiveSheet()->setCellValue('B1','Driver Name');
$objPHPExcel->getActiveSheet()->setCellValue('C1','Driver Email');
$objPHPExcel->getActiveSheet()->setCellValue('D1','Driver Mobile');
$objPHPExcel->getActiveSheet()->setCellValue('E1','Driver Rating');
$objPHPExcel->getActiveSheet()->setCellValue('F1','Vehicle No');
$objPHPExcel->getActiveSheet()->setCellValue('G1','Vehicle Type');
$objPHPExcel->getActiveSheet()->setCellValue('H1','Vehicle Company');
$objPHPExcel->getActiveSheet()->setCellValue('I1','Vehicle Model');
$objPHPExcel->getActiveSheet()->setCellValue('J1','State');
$objPHPExcel->getActiveSheet()->setCellValue('K1','City');
$objPHPExcel->getActiveSheet()->setCellValue('L1','Reference Code');
$objPHPExcel->getActiveSheet()->setCellValue('M1','Status');

$search_vehicle_condition = '';
if(isset($_REQUEST['master_search']))
{
    
    $search_state = $_REQUEST['search_state'];
    // $search_vehicle_type = $_REQUEST['search_vehicle_type'];
    $search_category = $_REQUEST['search_category'];
    $search_district = $_REQUEST['search_district'];
    // $search_from = $_REQUEST['search_from'];
    // $search_to = $_REQUEST['search_to'];
    if($search_state!="")
    {
        $search_vehicle_condition  .= " and state_id='".$search_state."'";	
    }
    
    if($search_district!="")
    {
        $search_vehicle_condition  .= " and city_id='".$search_district."'";	
    }
    if($search_category!="")
    {
        $search_vehicle_condition  .= " and sub_category='".$search_category."'";	
    }
    $search_page_query="&master_search=&search_state=".$search_state."&search_district=".$search_district."&search_category=".$search_category;	
    
}
/*
| Create Query 
*/
$where = ' id > 0 AND category = "2" '.$search_vehicle_condition;
$sql = "SELECT * FROM rido_vehicle_details WHERE ".$where." ORDER BY id DESC ";

// $user_rides = GetSearchRides(" ride_owner='".$_REQUEST['cid']."' ");
$fetch_all = fetch_assoc($sql,'array');
// print_r($fetch);  
$columnHeader = '';  
$columnHeader = "#"."\t". "Driver Name"."\t". "Driver Email"."\t". "Driver Mobile"."\t". "Driver Rating"."\t". "Vehicle No"."\t". "Vehicle Type"."\t". "Vehicle Company"."\t". "Vehicle Model"."\t". "State"."\t". "City"."\t". "Reference Code"."\t". "Status"."\t";
$setData = '';  
$rowData = '';  
$value = "";
$i = 2;
$sr_no = 1;
foreach($fetch_all AS $fetch_record) 
{  
    $vehicle_details = GetConditionalDetailsFromTable("rido_vehicle_details"," id='".$fetch_record['id']."' ",$is_multiple="0","0");
    // print_r($vehicle_details).'<br>';
    
    $driver_details = GetConditionalDetailsFromTable("rido_driver"," cid='".$vehicle_details['user_id']."' ",$is_multiple="0","0");
    
    $DriverName = (isset($driver_details) && isset($driver_details['fname'])) ? $driver_details['fname'] : ''; 
    
    $DriverEmail = (isset($driver_details) && isset($driver_details['emailid'])) ? $driver_details['emailid'] : '';
    
    $DriverMobile = (isset($driver_details) && isset($driver_details['mobile'])) ? $driver_details['mobile'] : '';
    
    $DriverRating = (isset($driver_details) && isset($driver_details['cid'])) ? GetDriverRatings($driver_details['cid']) : '';
    
    $VehicleNo = (isset($vehicle_details) && isset($vehicle_details['name'])) ? $vehicle_details['name'] : ''; 
    
    $VehicleType = (isset($vehicle_details) && isset($vehicle_details['sub_category'])) ? GetSingleFieldDataFromTable("rido_vehicle_sub_category",$field="name","id='".$vehicle_details['sub_category']."'",$is_stat_chk="0") : '';
    
    $VehicleCompany = (isset($vehicle_details) && isset($vehicle_details['company'])) ? GetSingleFieldDataFromTable("rido_vehicle_company",$field="name","id='".$vehicle_details['company']."'",$is_stat_chk="0") : '';
    
    $VehicleModel = (isset($vehicle_details) && isset($vehicle_details['model'])) ? GetSingleFieldDataFromTable("rido_vehicle_model",$field="name","id='".$vehicle_details['model']."'",$is_stat_chk="0") : '';
    
    $State = GetSingleFieldDataFromTable("rido_state_details","name"," id='".$vehicle_details['state_id']."' ",$is_stat_chk="0");
    
    $City = GetSingleFieldDataFromTable("rido_distirct_details","name"," id='".$vehicle_details['city_id']."' ",$is_stat_chk="0");
    
    $ReferenceCode = (isset($vehicle_details) && isset($vehicle_details['reference_code'])) ? $vehicle_details['reference_code'] : '';
    
    if($vehicle_details['status'] == 0){ $Status = "Offline"; }
    else if($vehicle_details['status'] == 1){ $Status =  "Online"; }
    else{ $Status = ''; };
    
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$sr_no++);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$DriverName);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$DriverEmail);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$DriverMobile);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$DriverRating);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$VehicleNo);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$VehicleType);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$VehicleCompany);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$VehicleModel);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$State);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$City);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$i,$ReferenceCode);
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$i,$Status);
    $i++;
}
// exit();
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet\ml.sheet');
$excel_name = 'ExcelExportAmbulances'.date('dmY_his',time()).'.xlsx';
header('Content-Disposition: attachment;filename="'.$excel_name.'"');
header('Cache-Control: max-age=0');
ob_end_clean();
$objWriter->save('php://output');

?>