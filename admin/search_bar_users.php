<form name="frmRegistration" method="post" action="index.php?pid=<?php echo $_REQUEST['pid']; if(isset($search_default_p_query)){ echo $search_default_p_query;} ?>" enctype="multipart/form-data">
<?php
if(isset($_REQUEST['master_search']))
{
	
	$search_status = $_REQUEST['search_status'];
	$search_from = $_REQUEST['search_from'];
	$search_to = $_REQUEST['search_to'];
	$search_uname = $_REQUEST['search_uname'];
	$search_mobile = $_REQUEST['search_mobile'];
	$search_emailid = $_REQUEST['search_emailid'];
}

$currentdate = date('d-m-Y',time()); 
$from_date=date('d-m-Y',strtotime($currentdate.' -6 months'));
$to_date=date('d-m-Y',time());
if(isset($search_from) && $search_from!="0000-00-00"  && $search_from!="1970-01-01")
{
  $from_date=date('d-m-Y',strtotime($search_from));
}
if(isset($search_to) && $search_to!="0000-00-00"  && $search_to!="1970-01-01")
{
  $to_date=date('d-m-Y',strtotime($search_to));
}
?>
<legend><i class="fa fa-search"></i>&nbsp;&nbsp; Search</legend>
		<?php   if(isset($_REQUEST['dsbinqid']))
				{
					$dsbinqid=$_REQUEST['dsbinqid']; ?>
			  <input type="hidden" name="dsbinqid" id="dsbinqid" class="form-control" value="<?php echo $dsbinqid; ?>">

			<?php 	}
		?>
    <div class="col-md-4">
       	<div class="form-group">
            <input type="text" name="search_uname" id="search_uname" value="<?php if(isset($search_uname)){echo $search_uname;} ?>" class="form-control" placeholder="Search by Name">
	    </div>
    </div>
    <div class="col-md-4">
       	<div class="form-group">
            <input type="text" name="search_mobile" id="search_mobile" class="form-control" value="<?php if(isset($search_mobile)){echo $search_mobile;} ?>" placeholder="Search by Mobile">
	    </div>
    </div>
    <div class="col-md-4">
       	<div class="form-group">
            <input type="text" name="search_emailid" id="search_emailid" class="form-control" value="<?php if(isset($search_emailid)){echo $search_emailid;} ?>" placeholder="Search by Email ID">
	    </div>
    </div>
    
    <div class="col-md-6">
       <?php $currentdate = date('d-m-Y',time()); ?>
       <div class="input-group input-large">
    	 <input type="text" class="form-control dpd1 datepicker" name="search_from" id="search_from" value="<?php if(isset($from_date)){ echo $from_date; }else{ echo date('d-m-Y',strtotime($currentdate.' -6 months'));} ?>">
	     <div class="input-group-prepend">
    		<span class="input-group-text" id="">To</span>
  		 </div>
         <input type="text" class="form-control dpd2 datepicker" name="search_to" id="search_to" value="<?php if(isset($to_date)){ echo $to_date; }else{  echo $currentdate; } ?>">
       </div>
     </div>
    <div class="col-md-2 no-print">
        <div class="form-group">
         	   <button type="submit" name="master_search" id="master_search" class="btn btn-primary" >Search Details</button>
         	   
         </div>
    </div>
    <div class="col-md-2 no-print">
        <div class="form-group">
         	   
         	   <a class="btn btn-default" href="index.php?pid=<?php echo $_REQUEST['pid']; if(isset($search_default_p_query)){ echo $search_default_p_query;} ?>">Reset Search</a>
         </div>
    </div>
    <div class="col-md-2 no-print" style="display: none;">
    	<div class="form-group text-center">
    		<button type="button" name="print_stock" id="print_stock" onclick="window.print();" class="btn btn-primary" >Print</button>
    	</div>
    </div>
	</form>
	
	<?php
	
	if(!isset($search_user_condition))
	{
		$search_user_condition="";	
	}
if(isset($_REQUEST['master_search']))
{
	    
		if(isset($_REQUEST['search_status'])){ $search_status = $_REQUEST['search_status']; }else{ $search_status="";}
		if(isset($_REQUEST['search_uname'])){ $search_uname = $_REQUEST['search_uname']; }else{ $search_uname="";}
		if(isset($_REQUEST['search_mobile'])){ $search_mobile = $_REQUEST['search_mobile']; }else{ $search_mobile="";}
		if(isset($_REQUEST['search_emailid'])){ $search_emailid = $_REQUEST['search_emailid']; }else{ $search_emailid="";}
		$search_from = $_REQUEST['search_from'];
		$search_to = $_REQUEST['search_to'];
		// if($search_status!="")
		// {
		// 	if($search_status=="2")
		// 	{
		// 		$ulist_pen=GetDocumentVerifcationPendingUsers();		
		// 		if($ulist_pen!="")
		// 		{
		// 			$search_user_condition.=" AND (status = '2' OR cid IN ($ulist_pen)) ";	
		// 		}else
		// 		{
		// 			$search_user_condition.=" AND status = '2' ";		
		// 		}	
		// 	}else
		// 	{
		// 		$search_user_condition .= " and status='".$search_status."'";	
		// 	}
		// }

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
		$search_page_query="&master_search=&search_uname=".$search_uname."&search_emailid=".$search_emailid."&search_mobile=".$search_mobile."&search_status=".$search_status."&search_from=".$search_from."&search_to=".$search_to;
		if($search_from!="0000-00-00" && $search_to!="0000-00-00" && $search_from!="" && $search_to!="")
		{
			$fdate = date('Y-m-d',strtotime($search_from));
			$tdate = date('Y-m-d',strtotime($search_to));
			$search_user_condition .= " and ( date_added >= '".$fdate."' and date_added <= '".$tdate."' ) ";	
		}
		
		
		
}
	?>