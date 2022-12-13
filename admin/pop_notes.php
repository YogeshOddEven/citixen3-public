<?php 
# +------------------------------------------------------------------------+
# | Artlantis CMS Solutions                                                |
# +------------------------------------------------------------------------+
# | Caledonian PHP Calendar & Event System                                 |
# | Copyright (c) Artlantis Design Studio 2013. All rights reserved.       |
# | Version       2.2                                                      |
# | Last modified 27.02.14                                                 |
# | Email         developer@artlantis.net                                  |
# | Web           http://www.artlantis.net                                 |
# +------------------------------------------------------------------------+
session_start();
include_once('process/config.php');
include_once('inc/calendar_functions.php');
include('inc/lang/'. $caLang .'.php');
/* date settings */
$om = (int) ($_GET['om'] ? $_GET['om'] : date('m'));
$oy = (int)  ($_GET['oy'] ? $_GET['oy'] : date('Y'));
$od = (int)  ($_GET['od'] ? $_GET['od'] : date('n'));
if(!isset($_GET["id_event"])){$id_event=0;}else{$id_event=intval($_GET["id_event"]);}
if(!isset($_GET["pos"])){$pos=0;}else{$pos=intval($_GET["pos"]);}
$full_content_date = date("d.m.Y",strtotime($od.'.'.$om.'.'.$oy));
$pgGo = @$_GET["pgGo"];if(empty($pgGo) or !is_numeric($pgGo)) {$pgGo = 1;}
$errText = '';


	# Add Note
	if(isset($_POST['addNote']))
	{
	
		if(demo_mode)
		{ # *** DEMO MODE *******************************************************************
			$errText = '<div class="alert alert-danger">'.lang_demo_mode_alert.'</div>';
		} else {  # *** DEMO MODE **********************************************************************
			if(!admin_logged)
			{
				$errText = '<div class="alert alert-danger">'. lang_user_auth_err .'</div>';
			}
			if(empty($_POST['orgDate'])){$errText .='* '. lang_required_date .'<br />';}
			if(empty($_POST['orgHour'])){$errText .='* '. lang_required_hour .'<br />';}
			if(empty($_POST['title'])){$errText .='* '. lang_required_title .'<br />';}
			if(empty($_POST['notes'])){$errText .='* '. lang_required_note .'<br />';}
			$conv_date = $_POST['orgDate'] ;
			$conv_time =  $_POST['orgHour'];
			$conv_date = date("Y-m-d",strtotime($conv_date));
			$conv_time = date("H:i:s",strtotime($conv_time));

			//if(!validateMysqlDate(mysqli_prep2($conv_date),"Y-m-d H:i:s")){$errText .='* '. lang_invalid_date .' '. $conv_date .'<br />';}
			if($errText == '')
			{
				mysqli_query($conn,"INSERT INTO ". db_table_pref ."event_details (exname,title,description,date,time,ip_address)VALUES (". admin_ID .",'". mysqli_prep2($_POST['title']) ."','". mysqli_prep2($_POST['notes']) ."','". $conv_date ."','".$conv_time ."','". $_SERVER['REMOTE_ADDR'] ."')");
				$errText = '<div class="alert alert-success"><strong>'. mysqli_prep2($_POST['title']) .'</strong><br />'. lang_success_record .'</div>';
				$_POST = array();
			} else {
				$errText = '<div class="alert alert-danger">'. $errText .'</div>';
			}
		}
	}
	# ** Edit Note
	if(isset($_POST['editNote']))
	{
		$errText = '';
		if(demo_mode)
		{ 
			# *** DEMO MODE *******************************************************************
			$errText = '<div class="alert alert-danger">'.lang_demo_mode_alert.'</div>';
		} else {  # *** DEMO MODE **********************************************************************
			if(!admin_logged)
			{
				$errText = '<div class="alert alert-danger">'. lang_user_auth_err .'</div>';
			}
			if(isset($_POST['sil']))
			{
				if($errText=='')
				{
					mysqli_query($conn,"DELETE FROM ". db_table_pref ."event_details WHERE id_event=". $id_event ."");
					$pos=0;
				}
			} else {
				if(!isset($_POST['orgDate']) || empty($_POST['orgDate'])){$errText .='* '. lang_required_date .'<br />';}
				if(!isset($_POST['orgHour']) || empty($_POST['orgHour'])){$errText .='* '. lang_required_hour .'<br />';}
				if(!isset($_POST['title']) || empty($_POST['title'])){$errText .='* '. lang_required_title .'<br />';}
				if(!isset($_POST['notes']) || empty($_POST['notes'])){$errText .='* '. lang_required_note .'<br />';}
				$conv_date = $_POST['orgDate'] ;
				$conv_time =  $_POST['orgHour'];
				$conv_date = date("Y-m-d",strtotime($conv_date));
				$conv_time = date("H:i:s",strtotime($conv_time));
				//if(!validateMysqlDate(mysql_prep($conv_date),"Y-m-d H:i:s")){$errText .='* '. lang_invalid_date .' '. $conv_date .'<br />';}
				if($errText == '')
				{
					mysqli_query($conn,"UPDATE ". db_table_pref ."event_details SET title='". mysqli_prep2($_POST['title']) ."',description='". mysqli_prep2($_POST['notes']) ."',date='". $conv_date ."',time='". $conv_time ."' WHERE id_event=". $id_event ."")or die(mysqli_error($conn));
					$errText = '<div class="alert alert-success"><strong>'. mysqli_prep2($_POST['title']) .'</strong><br />'. lang_success_update .'</div>';
					$_POST = array();
				} else {
					$errText = '<div class="alert alert-danger">'. $errText .'</div>';
				}
			}
		}
	}
	
	if(isset($_REQUEST['deleteNote']))
	{
	
		$errText = '';
		if($errText == '')
		{
			
			mysqli_query($conn,"DELETE FROM ". db_table_pref ."event_details WHERE id_event='". $id_event ."'")or die(mysqli_error($conn));
			$errText = '<div class="alert alert-success">Note deleted Successfully...</div>';
			$_POST = array();
		} else {
			$errText = '<div class="alert alert-danger">'. $errText .'</div>';
		}
	}
?>
<!doctype html>
<html>
<head>
<?php include_once('inc/head.php');?>
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link href="assets/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
<style type="text/css">
	.bootstrap-timepicker table tr,.bootstrap-timepicker table td
	{
		border: 0!important;
	}
</style>
</head>
<body id="pop">

<div class="panel panel-primary cst-panel-master">
  <!-- Default panel contents -->
  <div class="panel-heading">Event</div>
  <div class="panel-body">
<!-- START PANEL -->

<?php if($pos==0){?>
<?php echo($errText); ?>
<div id="top-pager"></div> 
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-hover">
<thead>
                <tr>
                  <th width="124" height="25"><?php echo(lang_hour);?></th>
                  <th width="67" align="center">&nbsp;</th>
                  <th width="1187" height="25"><?php echo(lang_title);?></th>
                  <th width="1187" height="25">Action</th>
                </tr>
</thead>
<tbody>
<?php

$srcQuery = "&amp;od=". $od ."&amp;om=". $om ."&amp;oy=". $oy ."";
$addQuery = " DATE_FORMAT(date, '%Y-%m-%d')='". date("Y-m-d",strtotime($full_content_date)) ."' and exname = ".admin_ID."";
$sortQuery = " ORDER BY date DESC";
$sortList = "";

 $limit = 25;
 $select = "SELECT id_event FROM ". db_table_pref ."event_details where $addQuery";
 $count	 = mysqli_num_rows(mysqli_query($conn,$select));
 $toplamsayfa	 = ceil($count / $limit);
 $baslangic	 = ($pgGo-1)*$limit;
				
	if($count > 0)
	{			
		  $getRs = mysqli_query($conn,"select * from ". db_table_pref ."event_details where $addQuery $sortQuery LIMIT $baslangic,$limit");
		  while ($rs = mysqli_fetch_assoc($getRs)){
?>
                <tr>
                  <td height="30" class="org-list-h-cell"><?php echo(date('h:i A',strtotime($rs['time'])));?></td>
                  <td align="center" class="org-list-line-cell"><div class="org-icons"></div></td>
                  <td height="25" class="org-list-line-cell"><a href="<?php echo('?pos=2&amp;od='. $od .'&amp;om='. $om .'&amp;oy='. $oy .'&amp;id_event='. $rs['id_event'] .'');?>"><?php echo($rs['title']);?></a></td>
                  <td>
                  	<a href="<?php echo('?pos=3&amp;od='. $od .'&amp;om='. $om .'&amp;oy='. $oy .'&amp;id_event='. $rs['id_event'] .'');?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?php echo('?deleteNote=deleteNote&pos=0&amp;od='. $od .'&amp;om='. $om .'&amp;oy='. $oy .'&amp;id_event='. $rs['id_event'] .'');?>" onClick="return confirm('<?php echo "Are you sure to delete the details";?>')" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
		                
                 </td>
                </tr>
                      <?php 
				}?>
                <tr class="non-striped-cell">
                  <td colspan="4" class="pages"><?php $pgVar='?pos='.$pos.$srcQuery.$sortList.'';include("inc/inc_pagination.php");?></td>
                  </tr>
    <?php }  else { ?>
    	<tr><td align="center" colspan="4">Not any remainder today.</td></tr>
    <?php } ?>
</tbody>
              </table>
              
<?php }elseif($pos==1){
	
		if(!isset($_POST['orgDate'])){
			$_POST['orgDate'] = str_replace('.','-',$full_content_date);
			}
			
if(!admin_logged){
	$errText = '<div class="alert alert-danger">'. lang_user_auth_err .'</div>';
	echo($errText);
}else{
	echo($errText);
	
	?>
	<form name="form1" method="post" action="" role="form">
		<div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_title);?></label>
           <div class="col-sm-7">
           		<input name="title" class="form-control" type="text" id="title" value="<?php if(isset($_POST['title'])){ echo $_POST['title'];}?>" size="40">
           </div>
        </div>
    	<div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_date);?></label>
           <div class="col-sm-7">
           		<input class="form-control datepicker" name="orgDate" id="orgDate" type="text" value="<?php echo($_POST['orgDate']);?>" required />
           </div>
        </div>
        <div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_hour);?></label>
           <div class="col-sm-7">
           		<input class="form-control timepicker" name="orgHour" id="orgHour" type="text" value="<?php if(isset($_POST['orgHour'])){ echo date("h:i A",strtotime($_POST['orgHour']));}else{echo date('h:i A');}?>" required />
           </div>
           
        </div>	
        
        <div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_note);?></label>
           <div class="col-sm-7">
           		<textarea name="notes" id="notes" class="mceEditor form-control"><?php if(isset($_POST['notes'])){ echo $_POST['notes'];}?></textarea>
           </div>
        </div>
        <div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label">&nbsp;</label>	
           <div class="col-sm-7">
           		<button name="addNote" id="addNote" value="addNote" type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> <?php echo(lang_add);?> Event</button>
           </div>
        </div>
      </form>
<?php }}elseif($pos==2){
	$getNote = mysqli_query($conn,"SELECT * FROM ". db_table_pref ."event_details WHERE id_event=". $id_event ."");
		  if(mysqli_num_rows($getNote)==0){echo('<div class="alert alert-danger">'. lang_no_record_found .'</div>');}else{
		  $rs = mysqli_fetch_assoc($getNote);
	?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                  <td><h2><?php echo($rs['title']);?></h2><?php echo($rs['description']);?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><strong><?php echo(lang_date);?>:</strong> <?php echo(setMyDate($rs['add_date'],6));?></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <?php if(admin_logged){?>
                <tr>
                  <td>
                  		<a href="<?php echo('?pos=0&amp;od='. $od .'&amp;om='. $om .'&amp;oy='. $oy .'&amp;id_event='. $rs['id_event'] .'');?>" class="btn btn-sm btn-primary">Back</a>
                 		
				  </td>
                </tr>
                <?php }?>
    </table>

<?php }?>
<?php }elseif($pos==3){
	
$getNote = mysqli_query($conn,"SELECT * FROM ". db_table_pref ."event_details WHERE id_event=". $id_event ."");
if(mysqli_num_rows($getNote)==0){echo('<div class="alert alert-danger">'. lang_no_record_found .'</div>');}else{
		  $rs = mysqli_fetch_assoc($getNote);

if(!admin_logged){
	$errText = '<div class="alert alert-danger">'. lang_user_auth_err .'</div>';
	echo($errText);
}else{
	echo($errText);
	?>
    	<form name="form1" method="post" action="" role="form">
    	<div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_title);?></label>
           <div class="col-sm-7">
           		<input name="title" type="text" class="form-control" id="title" value="<?php echo $rs['title'];?>" size="40">
           </div>
        </div>	
    	<div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_date);?></label>
           <div class="col-sm-7">
           		<input class="form-control datepicker" name="orgDate" id="orgDate" type="text" value="<?php echo date("d-m-Y",strtotime($rs['date']));?>" required />
           </div>
        </div>
        <div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label"><?php echo(lang_hour);?></label>
           <div class="col-sm-7">
           		<input class="form-control timepicker" name="orgHour" id="orgHour" type="text" value="<?php if(isset($rs['time'])){ echo date("h:i A",strtotime($rs['time']));}else{echo date('h:i A');}?>" required />
           </div>
        </div>	
        
        <div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label">Description</label>
           <div class="col-sm-7">
           		<textarea name="notes" id="notes" class="form-control"><?php echo stripslashes($rs['description']);?></textarea>
           </div>
        </div>
        <div class="row col-sm-12 form-group">
           <label for="firstname" class="col-sm-3 control-label">&nbsp;</label>	
           <div class="col-sm-7">
           		<button type="submit" name="editNote" value="editNote" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> <?php echo(lang_update);?> Event</button>
           </div>
        </div>
      </form>
<?php }}}?>

<!-- END PANEL -->
</div>
</div>

<!-- Date Picker-->
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript">
		$('.datepicker').datepicker({
			 format: 'dd-mm-yyyy',
			 autoclose:!0,
			 showOtherMonths: true,
			 selectOtherMonths: true
	    });
	    $('.timepicker').timepicker(
		{
				autoclose: true,
				startDate: new Date(),
				minuteStep: 15,
				showSeconds: 0,
				showMeridian: true
		});
</script>
</body>
</html>
