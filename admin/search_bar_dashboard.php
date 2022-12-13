<form name="frmRegistration" method="post" action="index.php?pid=<?php echo $_REQUEST['pid']; if(isset($search_default_p_query)){ echo $search_default_p_query;} ?>" enctype="multipart/form-data">
<?php
if(isset($_REQUEST['master_search']))
{
	
	$search_from = $_REQUEST['search_from'];
	$search_to = $_REQUEST['search_to'];
	
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
    <!-- <div class="col-md-2 no-print" style="display: none;">
    	<div class="form-group text-center">
    		<button type="button" name="print_stock" id="print_stock" onclick="window.print();" class="btn btn-primary" >Print</button>
    	</div>
    </div> -->
	</form>
	
	<?php
	
	if(!isset($search_crime_condition))
	{
		$search_crime_condition="";	
	}
    if(!isset($search_user_condition))
	{
		$search_user_condition="";	
	}
if(isset($_REQUEST['master_search']))
{
	    
		
		$search_from = $_REQUEST['search_from'];
		$search_to = $_REQUEST['search_to'];
		
		// $search_page_query="&master_search=&search_request_by=".$search_request_by."&search_status=".$search_status."&search_from=".$search_from."&search_to=".$search_to;
		if($search_from!="0000-00-00" && $search_to!="0000-00-00" && $search_from!="" && $search_to!="")
		{
			$fdate = date('Y-m-d',strtotime($search_from));
			$tdate = date('Y-m-d',strtotime($search_to));
			$search_crime_condition .= " and ( DATE(crime_date) >= '".$fdate."' and DATE(crime_date) <= '".$tdate."' ) ";	
			$search_user_condition .= " and ( date_added >= '".$fdate."' and date_added <= '".$tdate."' ) ";	

		}
		
		
		
}
	?>