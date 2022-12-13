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
$objPHPExcel->getActiveSheet()->setCellValue('B1','Name');
$objPHPExcel->getActiveSheet()->setCellValue('C1','Email');
$objPHPExcel->getActiveSheet()->setCellValue('D1','Mobile Number');
$objPHPExcel->getActiveSheet()->setCellValue('E1','Status');
$objPHPExcel->getActiveSheet()->setCellValue('F1','Address');
$objPHPExcel->getActiveSheet()->setCellValue('G1','State');
$objPHPExcel->getActiveSheet()->setCellValue('H1','City');
$objPHPExcel->getActiveSheet()->setCellValue('I1','Account Detail Date');

$search_user_condition = '';

if(isset($_REQUEST['master_search']))
{
    $search_status = $_REQUEST['search_status'];
    $search_uname = $_REQUEST['search_uname'];
    $search_mobile = $_REQUEST['search_mobile'];
    $search_emailid = $_REQUEST['search_emailid'];
    // $search_from = $_REQUEST['search_from'];
    // $search_to = $_REQUEST['search_to'];
    if($search_status != "")
    {
        $search_user_condition .= " and status='".$search_status."'";	
    }
    
    if($search_emailid!="")
    {
        $search_user_condition .= " and emailid='".$search_emailid."'";	
    }
    if($search_mobile!="")
    {
        $search_user_condition .= " and mobile='".$search_mobile."'";	
    }
    if($search_uname!="")
    {
        $search_user_condition .= " and fname LIKE '%".$search_uname."%'";	
    }
    $search_page_query="&master_search=&search_uname=".$search_uname."&search_emailid=".$search_emailid."&search_mobile=".$search_mobile."&search_status=".$search_status;    
}
/*
| Create Query 
*/
$where = ' cid > 0 '.$search_user_condition;
$sql = "SELECT * FROM rido_customers WHERE ".$where." ORDER BY cid DESC";

$setRecord = mysqli_query($conn, $sql);
// print_r(mysqli_fetch_assoc($setRecord));  
$fetch_all = fetch_assoc($sql,'array');
// print_r($fetch);  
$columnHeader = '';  
$columnHeader = "#"."\t". "Name"."\t". "Email"."\t" ."Mobile No."."\t" ."Status" . "\t" . "Address" . "\t" . "State" . "\t". "City" . "\t". "Account Creation Date" . "\t";  
$setData = '';  
$rowData = '';  
$value = "";
$i = 2;
$sr_no = 1;
foreach($fetch_all AS $fetch) 
{  
    // print_r($fetch).'<br>';
    $name = $fetch['fname'].' '.$fetch['lname'];
    if($fetch['date_added'] != '0000-00-00' && $fetch['date_added'] != "" && $fetch['date_added'] != null) { $date = date('d-m-Y',strtotime($fetch['date_added']));
    }else{
        $date = '';
    }

    $status = 'In-Active';
    if(isset($fetch['status'])){
        $status = 'Active';
    }
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$sr_no++);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$name);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$fetch['emailid']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$fetch['mobile']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$status);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$fetch['address']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$fetch['state']);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$fetch['city']);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$date);
    $i++;
}
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet\ml.sheet');
$excel_name = 'ExcelExportRiders'.date('dmY_his',time()).'.xlsx';
header('Content-Disposition: attachment;filename="'.$excel_name.'"');
header('Cache-Control: max-age=0');
ob_end_clean();
$objWriter->save('php://output');

?>