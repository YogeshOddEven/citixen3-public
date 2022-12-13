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
$objPHPExcel->getActiveSheet()->setCellValue('B1','ID');
$objPHPExcel->getActiveSheet()->setCellValue('C1','Name');
$objPHPExcel->getActiveSheet()->setCellValue('D1','Mobile');
$objPHPExcel->getActiveSheet()->setCellValue('E1','Email');
$objPHPExcel->getActiveSheet()->setCellValue('F1','State');
$objPHPExcel->getActiveSheet()->setCellValue('G1','City');
$objPHPExcel->getActiveSheet()->setCellValue('H1','Assigned State');
$objPHPExcel->getActiveSheet()->setCellValue('I1','Assigned City');
$objPHPExcel->getActiveSheet()->setCellValue('J1','Designation');
$objPHPExcel->getActiveSheet()->setCellValue('K1','Manager');
$objPHPExcel->getActiveSheet()->setCellValue('L1','Type');

$search_user_condition = '';

/*
| Create Query 
*/
$where = ' id > 0 '.$search_user_condition;
$sql = "SELECT * FROM rido_team_member WHERE ".$where." ".$search_user_condition." ORDER BY id desc";

$setRecord = mysqli_query($conn, $sql);
// print_r(mysqli_fetch_assoc($setRecord));  
$fetch_all = fetch_assoc($sql,'array');
// print_r($fetch);  
$columnHeader = '';  
$columnHeader = "#"."\t". "ID"."\t". "Name"."\t". "Mobile"."\t". "Email"."\t". "State"."\t". "City"."\t". "Assigned State"."\t". "Assigned City"."\t". "Designation"."\t". "Manager"."\t". "Type"."\t";
$setData = '';  
$rowData = '';  
$value = "";
$i = 2;
$sr_no = 1;
foreach($fetch_all AS $fetch) 
{  
    // print_r($fetch).'<br>';

    if(GetSingleFieldDataFromTable("rido_state_details","name"," id='".$fetch['state']."' ",$is_stat_chk="0")!="0"){ $State = GetSingleFieldDataFromTable("rido_state_details","name"," id='".$fetch['state']."' ",$is_stat_chk="0"); }else{ $State = ''; }
    
    if(GetSingleFieldDataFromTable("rido_distirct_details","name"," id='".$fetch['district']."' ",$is_stat_chk="0")!="0"){ $City = GetSingleFieldDataFromTable("rido_distirct_details","name"," id='".$fetch['district']."' ",$is_stat_chk="0");}else{ $City = ''; }
    
    if(GetSingleFieldDataFromTable("rido_state_details","name"," id='".$fetch['assigned_state']."' ",$is_stat_chk="0")!="0"){ $AssignedState = GetSingleFieldDataFromTable("rido_state_details","name"," id='".$fetch['assigned_state']."' ",$is_stat_chk="0");}else{ $AssignedState = ''; }
    
    if(GetSingleFieldDataFromTable("rido_distirct_details","name"," id='".$fetch['assigned_district']."' ",$is_stat_chk="0")!="0"){ $AssignedCity =  GetSingleFieldDataFromTable("rido_distirct_details","name"," id='".$fetch['assigned_district']."' ",$is_stat_chk="0"); }else{ $AssignedCity = ''; }
    
    $Designation = $fetch['designation']; 
    
    if(GetSingleFieldDataFromTable("rido_team_member","fname"," id='".$fetch['manager_id']."' ",$is_stat_chk="0")!="0"){ $Manager = GetSingleFieldDataFromTable("rido_team_member","fname"," id='".$fetch['manager_id']."' ",$is_stat_chk="0");}else{ $Manager = ""; }
   
    if($fetch['utype'] == 2 ) { $Type = 'Employee';    
    }elseif($fetch['utype'] == 1) { $Type = 'Volunteer'; }
    
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$sr_no++);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$fetch['auto_id']);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$fetch['fname']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$fetch['mobile']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$fetch['emailid']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$State);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$City);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$AssignedState);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$AssignedCity);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$Designation);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$Manager);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$i,$Type);
    $i++;
}
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet\ml.sheet');
$excel_name = 'ExcelExportTeamMember'.date('dmY_his',time()).'.xlsx';
header('Content-Disposition: attachment;filename="'.$excel_name.'"');
header('Cache-Control: max-age=0');
ob_end_clean();
$objWriter->save('php://output');

?>