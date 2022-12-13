<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 1234560);
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
include("../process/config.php");
require_once dirname(__FILE__) . '/PHPExcel-develop/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Index');
$style = array(
       'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
     )
 );
$styleArray = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '438eb9'),
        'size'  => 13,
        'name'  => 'Verdana'
    ));

$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);

$objPHPExcel->getActiveSheet()->getStyle("A")->applyFromArray($style); // for one cell
$objPHPExcel->getActiveSheet()->getStyle("C")->applyFromArray($style); // for one cell
$objPHPExcel->getActiveSheet()->getStyle("D")->applyFromArray($style); // for one cell
$objPHPExcel->getActiveSheet()->getStyle("E")->applyFromArray($style); // for one cell
$objPHPExcel->getActiveSheet()->getStyle("F")->applyFromArray($style); // for one cell

// $sheet->getDefaultStyle()->applyFromArray($style); // for all cell
$objPHPExcel->getActiveSheet()->setCellValue('A1','Sheet No.');
$objPHPExcel->getActiveSheet()->setCellValue('B1','Name Of Range');
$objPHPExcel->getActiveSheet()->setCellValue('C1','Range Of HP Single Phase');
$objPHPExcel->getActiveSheet()->setCellValue('D1','Range Of HP Three Phase');
$objPHPExcel->getActiveSheet()->setCellValue('E1','Total Model');
$objPHPExcel->getActiveSheet()->setCellValue('F1','Model SrNo');

// Column headings in the second row
$select = "select * from prithvi_range";
$query = mysql_query($select);
$i=2;
$j = 1;
while($fetch = mysql_fetch_array($query))
{                                            
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$j);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$fetch['rname']);

	$sel = "select * from prithvi_product where prange='".$fetch['rid']."'";
	$qry = mysql_query($sel) or die(mysql_error());
	$pid = "";
	while($fet = mysql_fetch_array($qry))
	{
		$sel1 = "select * from prithvi_product_phase where pid='".$fet['pid']."' and price !=''";
		$qry1 = mysql_query($sel1) or die(mysql_error());
		$fet1 = mysql_fetch_array($qry1);
		if($fet1['pname'] == 2 or $fet1['pname'] == 10 or $fet1['pname'] == 12)
		{
			if($pid == "")
			{
				$pid = $fet['pid'];
			} else {
				$pid = $pid." , ".$fet['pid'];
			}
		}
	}
	$pid_arr = explode(",",$pid);
	$hp = "";
	foreach($pid_arr as $val)
	{
		$sel2 = "select hp from prithvi_product where pid='".$val."'";
		$qry2 = mysql_query($sel2);
		$fet2 = mysql_fetch_array($qry2);
		if($hp == "")
		{ $hp = $fet2['hp']; } else { $hp = $hp." , ".$fet2['hp'];}
	}
	$hp_arr = explode(",",$hp);
	$h = "";
	foreach($hp_arr as $val)
	{
		$sel3 = "select hp from prithvi_hp where hid='".$val."'";
		$qry3 = mysql_query($sel3);
		$fet3 = mysql_fetch_array($qry3);
		if($h == "")
		{ $h = $fet3['hp']; } else { $h = $h." , ".$fet3['hp'];}
	}
	$sphase = "";
	if($h != "")
	{
		$h_arr = explode(",",trim($h));
		//print_r($h_arr);
		$max = 0;
		foreach($h_arr as $obj)
		{
			if(trim($obj) > trim($max))
			{
				$max = $obj;
			}
		}
		$sphase = min($h_arr)." To ".$max;
	} else {
		$sphase = "-";
	}
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$sphase);

	$sel = "select * from prithvi_product where prange='".$fetch['rid']."'";
	$qry = mysql_query($sel) or die(mysql_error());
	$pid = "";
	while($fet = mysql_fetch_array($qry))
	{
		$sel1 = "select * from prithvi_product_phase where pid='".$fet['pid']."' and price !='' order by p_id desc";
		$qry1 = mysql_query($sel1) or die(mysql_error());
		$fet1 = mysql_fetch_array($qry1);
		if($fet1['pname'] == 3 or $fet1['pname'] == 5 or $fet1['pname'] == 6 or $fet1['pname'] == 7 or $fet1['pname'] == 9 or $fet1['pname'] == 11)
		{
			if($pid == "")
			{
				$pid = $fet['pid'];
			} else {
				$pid = $pid." , ".$fet['pid'];
			}
		}
	}
	$pid_arr = explode(",",$pid);
	$hp = "";
	foreach($pid_arr as $val)
	{
		$sel2 = "select hp from prithvi_product where pid='".$val."'";
		$qry2 = mysql_query($sel2);
		$fet2 = mysql_fetch_array($qry2);
		if($hp == "")
		{ $hp = $fet2['hp']; } else { $hp = $hp." , ".$fet2['hp'];}
	}
	$hp_arr = explode(",",$hp);
	$h = "";
	foreach($hp_arr as $val)
	{
		$sel3 = "select hp from prithvi_hp where hid='".$val."'";
		$qry3 = mysql_query($sel3);
		$fet3 = mysql_fetch_array($qry3);
		if($h == "")
		{ $h = $fet3['hp']; } else { $h = $h." , ".$fet3['hp'];}
	}
	$tphase = "";
	if($h != "")
	{
		$h_arr = explode(",",$h);
		$min = "5.00";
		foreach($h_arr as $obj)
		{
			if(intval($obj) < intval($min))
			{
				$min = $obj;
			}
		}
		$max = 0;
		foreach($h_arr as $obj)
		{
			if(intval($obj) > intval($max))
			{
				$max = $obj;
			}
		}
		$tphase = $min." To ".$max;
	} else {
		$tphase = "-";
	}
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$tphase);
	
	$sel4 = "select * from prithvi_product where prange='".$fetch['rid']."'";
    $qry4 = mysql_query($sel4) or die(mysql_error());
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i,mysql_num_rows($qry4));
	
	$sel5 = "select * from prithvi_product where prange='".$fetch['rid']."'";
    $qry5 = mysql_query($sel5) or die(mysql_error());
    $fet5 = mysql_fetch_array($qry5);
	$srno = "";
    if(mysql_num_rows($qry5) > 0)
    {
	  $sel6 = "select * from prithvi_product where prange='".$fetch['rid']."' order by pid desc";
	  $qry6 = mysql_query($sel6) or die(mysql_error());
	  $fet6 = mysql_fetch_array($qry6);
	  $sel7 = "select * from prithvi_product_code";
	  $qry7 = mysql_query($sel7);
	  $fet7 = mysql_fetch_array($qry7);
	  $srno = $fet7['value'].$fet5['srno']." To ".$fet7['value'].$fet6['srno'];
    } else {
	  $srno = "-";
    }
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$srno);
	
	$i++;
	$j++;
}
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$select1 = "select * from prithvi_range";
$query1 = mysql_query($select1);
$i = 1;
while($fetch1 = mysql_fetch_array($query1))
{
    $objPHPExcel->createSheet();
	$objPHPExcel->setActiveSheetIndex($i);
	$objPHPExcel->getActiveSheet()->setTitle("Sheet No ".$i);
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('3a87ad');
	$styleArray = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
        'size'  => 13,
        'name'  => 'Verdana'
    ));
	$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);

	$select = "select * from prithvi_range where rid='".$fetch1['rid']."'";
	$query = mysql_query($select);
	$fetch = mysql_fetch_array($query);
	$objPHPExcel->getActiveSheet()->setCellValue('A1',$fetch['rname']);
	
	$sel = "select * from prithvi_product where prange='".$fetch1['rid']."' group by head order by pid asc";
    $qry = mysql_query($sel) or die(mysql_error());
	$m = 2;
    while($fet = mysql_fetch_array($qry))
    {
		$sel1 = "select * from prithvi_total_head where hid='".$fet['head']."'";
		$qry1 = mysql_query($sel1) or die(mysql_error());
		$fet1 = mysql_fetch_array($qry1);
		
		$objPHPExcel->getActiveSheet()->mergeCells('A'.$m.":".'F'.$m);
		
		$styleArray = array(
		'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => 'dd5a43'),
			'size'  => 13,
			'name'  => 'Verdana'
		));
		$objPHPExcel->getActiveSheet()->getStyle('A'.$m.":".'F'.$m)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$m.":".'F'.$m)->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$m,$fet1['hname']);
		$m++;

		$sel11 = "select * from prithvi_product where prange='".$fetch['rid']."' and head='".$fet['head']."' group by model order by pid asc";
		$qry11 = mysql_query($sel11) or die(mysql_error());
		while($fet11 = mysql_fetch_array($qry11))
		{
				$sel2 = "select * from prithvi_model where mid='".$fet11['model']."'";
				$qry2 = mysql_query($sel2) or die(mysql_error());
				$fet2 = mysql_fetch_array($qry2);
				$styleArray = array(
				'font'  => array(
					'bold'  => true,
					'color' => array('rgb' => 'FFFFFF'),
					'size'  => 13,
					'name'  => 'Verdana'
				));
				$objPHPExcel->getActiveSheet()->getStyle('A'.$m.":".'B'.$m)->applyFromArray($styleArray);
				$objPHPExcel->getActiveSheet()->mergeCells('A'.$m.":".'B'.$m);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$m.":".'B'.$m)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('A'.$m.":".'B'.$m)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('000000');
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$m,$fet2['mname']);
				$objPHPExcel->getActiveSheet()->mergeCells('D'.$m.":".'F'.$m);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$m,strip_tags($fet2['model_detail']));
			
				$m++;
				$styleArray = array(
						'font'  => array(
						'bold'  => true,
						'color' => array('rgb' => '000000'),
						'size'  => 13,
						'name'  => 'Verdana'
				));
				$objPHPExcel->getActiveSheet()->getStyle('A'.$m.":".'H'.$m)->applyFromArray($styleArray);
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$m,'Sr. No.');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$m,'Pump Bowl');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$m,'Model');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$m,'H.P.');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$m,'STG.');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$m,'OUT LET Ø In Inch');
	
			    $sel3 = "select * from prithvi_product where model='".$fet2['mid']."' and prange='".$fetch['rid']."'";
		        $qry3 = mysql_query($sel3);
		        $valsArray=array();
				while($fet3 = mysql_fetch_array($qry3))
		        {
		            $sel4 = "select * from prithvi_product_phase where pid='".$fet3['pid']."'";
		            $qry4 = mysql_query($sel4) or die(mysql_error());
		            while($fet4 = mysql_fetch_array($qry4))
					{
			            $pname = $fet4['pname'];
			            if(!isset($valsArray))
			            {
			                $valsArray[] = $pname;
			            } else {	
			                if(!in_array($pname, $valsArray))
			                {
			                     $valsArray[] = $pname;	
			                }
			            }
					}
		        }
				$k = 1;
				foreach($valsArray as $val)
		        {
		           $sel5 = "select * from prithvi_phase where pid='".$val."'";
			       $qry5 = mysql_query($sel5);
		           $fet5 = mysql_fetch_array($qry5);
				   if($k == 1)
				   {
				      $objPHPExcel->getActiveSheet()->setCellValue('G'.$m,$fet5['pname']);
					  $k++;
				   } else {
					  $objPHPExcel->getActiveSheet()->setCellValue('H'.$m,$fet5['pname']);
				   }
				}
					
				$m++;
				$sel9 = "select * from prithvi_product where model='".$fet11['model']."' and prange='".$fetch1['rid']."'";
			    $qry9 = mysql_query($sel9) or die(mysql_error());
				while($fet9 = mysql_fetch_array($qry9))
			    {
				    $sel10 = "select * from prithvi_product_code";
				    $qry10 = mysql_query($sel10);
				    $fet10 = mysql_fetch_array($qry10);
					
					$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
					$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

				    $objPHPExcel->getActiveSheet()->getStyle("A".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("B".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("C".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("D".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("E".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("F".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("G".$m)->applyFromArray($style);
					$objPHPExcel->getActiveSheet()->getStyle("H".$m)->applyFromArray($style);
					
			        $objPHPExcel->getActiveSheet()->setCellValue('A'.$m,$fet10['value'].$fet9['srno']);
	  		        $objPHPExcel->getActiveSheet()->setCellValue('B'.$m,$fet9['bowl']);
  				    $objPHPExcel->getActiveSheet()->setCellValue('C'.$m,$fet9['minner']);
		
					$sel12 = "select * from prithvi_hp where hid='".$fet9['hp']."'";
					$qry12 = mysql_query($sel12);
					$fet12 = mysql_fetch_array($qry12);
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$m,$fet12['hp']);
					$sel12 = "select * from prithvi_stage where sid='".$fet9['stage']."'";
					$qry12 = mysql_query($sel12);
					$fet12 = mysql_fetch_array($qry12);
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$m,$fet12['sname']);
					$sel12 = "select * from prithvi_outlet where oid='".$fet9['outlet']."'";
					$qry12 = mysql_query($sel12);
					$fet12 = mysql_fetch_array($qry12);
					$objPHPExcel->getActiveSheet()->setCellValue('F'.$m,$fet12['oname']);
					
					$sel4 = "select * from prithvi_product_phase where pid='".$fet9['pid']."'";
					$qry4 = mysql_query($sel4) or die(mysql_error());
					$l = 1;
					while($fet4 = mysql_fetch_array($qry4))
					{
					   if($l == 1)
					   {
							$objPHPExcel->getActiveSheet()->setCellValue('G'.$m,$fet4['price']);
							$l++;
					   } else {
							$objPHPExcel->getActiveSheet()->setCellValue('H'.$m,$fet4['price']);
					   }
					}
				  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				  $m++;
				}
			}	
		}
	$i++;
}

$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet\ml.sheet');
header('Content-Disposition: attachment;filename="MEMBERS.xls"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

?>