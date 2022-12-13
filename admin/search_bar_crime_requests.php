<form name="frmRegistration" method="post" action="index.php?pid=<?php echo $_REQUEST['pid']; if(isset($search_default_p_query)){ echo $search_default_p_query;} ?>" enctype="multipart/form-data">
<?php
if(isset($_REQUEST['master_search']))
{
	
	// $search_status = $_REQUEST['search_status'];
	$search_from = $_REQUEST['search_from'];
	$search_to = $_REQUEST['search_to'];
	$search_request_by = $_REQUEST['search_request_by'];
	// $search_mobile = $_REQUEST['search_mobile'];
	// $search_emailid = $_REQUEST['search_emailid'];
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
            <!-- <input type="text" name="search_request_by" id="search_request_by" value="<?php if(isset($search_request_by)){echo $search_request_by;} ?>" class="form-control" placeholder="Search by Name"> -->
			<select class="form-control select2"  data-is_validate="1" name="search_request_by" id="search_request_by">
				<option value="">Select User</option>
				<?php
				$users_list=GetConditionalDetailsFromTable("cz_users"," cid>'0' ","1");
				if(isset($users_list) && count($users_list)>0)
				{
					for($i=0;$i<count($users_list); $i++)
					{
					$selected_catgory="";
					if(isset($_REQUEST['id']) && $search_request_by==$users_list[$i]['cid'])
					{
						$selected_catgory="selected";
					}
					if(isset($users_list[$i]['cid']) && $users_list[$i]['cid']!="")
					{
						echo '<option value="'.$users_list[$i]['cid'].'" '.$selected_catgory.'>'.$users_list[$i]['fname'].' '.$users_list[$i]['lname'].'</option>';
					}
					}
				}
				?>
				
			</select>			
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
    <!-- <div class="col-md-2 no-print" style="display: none;">
    	<div class="form-group text-center">
    		<button type="button" name="print_stock" id="print_stock" onclick="window.print();" class="btn btn-primary" >Print</button>
    	</div>
    </div> -->
	</form>
	
	<?php
	
	if(!isset($search_request_condition))
	{
		$search_request_condition="";	
	}
if(isset($_REQUEST['master_search']))
{
	    
		if(isset($_REQUEST['search_status'])){ $search_status = $_REQUEST['search_status']; }else{ $search_status="";}
		if(isset($_REQUEST['search_request_by'])){ $search_request_by = $_REQUEST['search_request_by']; }else{ $search_request_by="";}
		$search_from = $_REQUEST['search_from'];
		$search_to = $_REQUEST['search_to'];
		// if($search_status!="")
		// {
		// 	$search_request_condition .= " and status='".$search_status."'";		
		// }

		
		if($search_request_by!="")
		{
			$search_request_condition .= " and request_by='".$search_request_by."'";	
		}
		$search_page_query="&master_search=&search_request_by=".$search_request_by."&search_from=".$search_from."&search_to=".$search_to;
		if($search_from!="0000-00-00" && $search_to!="0000-00-00" && $search_from!="" && $search_to!="")
		{
			$fdate = date('Y-m-d',strtotime($search_from));
			$tdate = date('Y-m-d',strtotime($search_to));
			$search_request_condition .= " and ( date >= '".$fdate."' and date <= '".$tdate."' ) ";	
		}
		
		
		
}
	?>