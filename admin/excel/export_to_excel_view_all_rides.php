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
$objPHPExcel->getActiveSheet()->setCellValue('B1','Ride Source');
$objPHPExcel->getActiveSheet()->setCellValue('C1','Ride Destination');
$objPHPExcel->getActiveSheet()->setCellValue('D1','Ride Code');
$objPHPExcel->getActiveSheet()->setCellValue('E1','Total Distance');
$objPHPExcel->getActiveSheet()->setCellValue('F1','Ride Date');
$objPHPExcel->getActiveSheet()->setCellValue('G1','Ride Time');
$objPHPExcel->getActiveSheet()->setCellValue('H1','Ride Cost');
$objPHPExcel->getActiveSheet()->setCellValue('I1','Ride Payment Mode');
$objPHPExcel->getActiveSheet()->setCellValue('J1','Ride Coupone Code');
$objPHPExcel->getActiveSheet()->setCellValue('K1','Ride Discount');
$objPHPExcel->getActiveSheet()->setCellValue('L1','Ride Driver Commission');
$objPHPExcel->getActiveSheet()->setCellValue('M1','Ride Current Status');
$objPHPExcel->getActiveSheet()->setCellValue('N1','Rider Name');
$objPHPExcel->getActiveSheet()->setCellValue('O1','Rider Email');
$objPHPExcel->getActiveSheet()->setCellValue('P1','Rider Mobile');
$objPHPExcel->getActiveSheet()->setCellValue('Q1','Rider Ratings');
$objPHPExcel->getActiveSheet()->setCellValue('R1','Driver Name');
$objPHPExcel->getActiveSheet()->setCellValue('S1','Driver Email');
$objPHPExcel->getActiveSheet()->setCellValue('T1','Driver Mobile');
$objPHPExcel->getActiveSheet()->setCellValue('U1','Driver Ratings');
$objPHPExcel->getActiveSheet()->setCellValue('V1','Vehical Number');
$objPHPExcel->getActiveSheet()->setCellValue('W1','Vehical Comapny');
$objPHPExcel->getActiveSheet()->setCellValue('X1','Vehical Model');
$objPHPExcel->getActiveSheet()->setCellValue('Y1','Vehical Category');
$objPHPExcel->getActiveSheet()->setCellValue('Z1','Vehical Type');

$search_user_condition = '';
/*
| Create Query 
*/
$where = ' id > 0 '.$search_user_condition;
$sql = "SELECT * FROM rido_ride_offers_details WHERE ".$where." ORDER BY id DESC";

$setRecord = mysqli_query($conn, $sql);
// print_r(mysqli_fetch_assoc($setRecord));  
$fetch_all = fetch_assoc($sql,'array');
// print_r($fetch);  
$columnHeader = '';  
$columnHeader = "#"."\t".  "Ride Source"."\t". "Ride Destination"."\t". "Ride Code"."\t"."Total Distance"."\t"."Ride Date"."\t"."Ride Time"."\t"."Ride Cost"."\t"."Ride Payment Mode"."\t".  "Ride Coupone Code"."\t".  "Ride Discount"."\t".  "Ride Driver Commission"."\t".  "Ride Current Status"."\t".  "Rider Name"."\t".  "Rider Email"."\t".  "Rider Mobile"."\t".  "Rider Ratings"."\t".  "Driver Name"."\t".  "Driver Email"."\t".  "Driver Mobile"."\t".  "Driver Ratings"."\t".  "Vehical Number"."\t".  "Vehical Comapny"."\t". "Vehical Model"."\t". "Vehical Category"."\t". "Vehical Type"."\t";
$setData = '';  
$rowData = '';  
$value = "";

$i = 2;
$sr_no = 1;

foreach($fetch_all AS $fetch) 
{      
    $RideSource = isset($fetch['source']) ? $fetch['source'] : '';
    $RideDestination = isset($fetch['destination']) ? $fetch['destination'] : '';
    $RideCode = isset($fetch['ride_code']) ? $fetch['ride_code'] : '';
    $TotalDistance = isset($fetch['total_distance']) ? $fetch['total_distance'] : '';
    
    if($fetch['date'] != '0000-00-00' && $fetch['date'] != "" && $fetch['date'] != null) { $RideDate = date('d-m-Y',strtotime($fetch['date'])); }else{ $RideDate = ''; }

    if($fetch['time'] != "" && $fetch['time'] != null) { $RideTime = date('H:i A',strtotime($fetch['time']));
    }else{ $RideTime = ''; }

    $RideCost = isset($fetch['price']) ? $fetch['price'] : '';
    $RidePaymentMode = isset($fetch['payment_mode']) ? $fetch['payment_mode'] : '';
    $RideCouponeCode = (isset($fetch['coupon_code'])) ? $fetch['coupon_code'] : '';
    $RideDiscount = (isset($fetch['coupon_discount'])) ? $fetch['coupon_discount'] : '';
    $RideDriverCommission = (isset($fetch['commission_amount'])) ? $fetch['commission_amount'] : '';
    
    if($fetch['status'] == 0)
    { $RideCurrentStatus = "Ride Created";
    }elseif($fetch['status'] == 1)
    { $RideCurrentStatus = "Ride Accepted";	
    } elseif($fetch['status'] == 2)
    { $RideCurrentStatus = "Driver Arrived";	
    } elseif($fetch['status'] == 3)
    { $RideCurrentStatus = "Ride Started";	
    } elseif($fetch['status'] == 4)
    {  $RideCurrentStatus = "Ride Completed";	
    } else{ $RideCurrentStatus = "Ride Cancelled"; }

    /* Rider Detail */
    $RiderName = GetSingleFieldDataFromTable("rido_customers","fname"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0")." ".GetSingleFieldDataFromTable("rido_customers","lname"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0");
    $RiderEmail = GetSingleFieldDataFromTable("rido_customers","emailid"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0");
    $RiderMobile = GetSingleFieldDataFromTable("rido_customers","mobile"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0");
    $RiderRatings = GetUserRatings($fetch['ride_owner']);
    
    $DriverName = GetSingleFieldDataFromTable("rido_driver","fname"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0")." ".GetSingleFieldDataFromTable("rido_driver","lname"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0");
    $DriverEmail = GetSingleFieldDataFromTable("rido_driver","emailid"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0");
    $DriverMobile = GetSingleFieldDataFromTable("rido_driver","mobile"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0");
    $DriverRatings = GetDriverRatings($fetch['id_driver']);

    $ride_vehicle_details = GetConditionalDetailsFromTable("rido_vehicle_details"," id='".$fetch['id_car']."' ",$is_multiple="0","0");
    print_r($ride_vehicle_details);

    $VehicalNumber = (isset($ride_vehicle_details['name'])) ? $ride_vehicle_details['name'] : '';
    $VehicalComapny = GetSingleFieldDataFromTable("rido_vehicle_company","name"," id='".$ride_vehicle_details['company']."' ",$is_stat_chk="0");
    $VehicalModel = GetSingleFieldDataFromTable("rido_vehicle_model","name"," id='".$ride_vehicle_details['model']."' ",$is_stat_chk="0");
    $VehicalCateogry = GetSingleFieldDataFromTable("rido_vehicle_category","name"," id='".$ride_vehicle_details['category']."' ",$is_stat_chk="0");
    $VehicalType = GetSingleFieldDataFromTable("rido_vehicle_sub_category","name"," id='".$ride_vehicle_details['sub_category']."' ",$is_stat_chk="0");
    
    print_r($fetch).'<br>';
    
    
    $status = 'In-Active';
    if(isset($fetch['status'])){
        $status = 'Active';
    }
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$sr_no++);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$RideSource);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$RideDestination);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$RideCode);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$TotalDistance);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$RideDate);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$RideTime);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$RideCost);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$RidePaymentMode);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$RideCouponeCode);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$RideDiscount);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$i,$RideDriverCommission);
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$i,$RideCurrentStatus);
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$i,$RiderName);
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$i,$RiderEmail);
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$i,$RiderMobile);
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$i,$RiderRatings);
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$i,$DriverName);
    $objPHPExcel->getActiveSheet()->setCellValue('S'.$i,$DriverEmail);
    $objPHPExcel->getActiveSheet()->setCellValue('T'.$i,$DriverMobile);
    $objPHPExcel->getActiveSheet()->setCellValue('U'.$i,$DriverRatings);
    $objPHPExcel->getActiveSheet()->setCellValue('V'.$i,$VehicalNumber);
    $objPHPExcel->getActiveSheet()->setCellValue('W'.$i,$VehicalComapny);
    $objPHPExcel->getActiveSheet()->setCellValue('X'.$i,$VehicalModel);
    $objPHPExcel->getActiveSheet()->setCellValue('Y'.$i,$VehicalCateogry);
    $objPHPExcel->getActiveSheet()->setCellValue('Z'.$i,$VehicalType);
    $i++;
}
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet\ml.sheet');
$excel_name = 'ExcelExportRide'.date('dmY_his',time()).'.xlsx';
header('Content-Disposition: attachment;filename="'.$excel_name.'"');
header('Cache-Control: max-age=0');
ob_end_clean();
$objWriter->save('php://output');

?>