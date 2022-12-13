<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Driver Details</li>
	</ol>
</div>
<!-- <div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php include("search_bar_lead.php"); ?>
            </div>
        </div>
    </div>
</div>
<br> -->
<?php 
	if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
	{
		$driver_details=GetConditionalDetailsFromTable("cz_driver"," cid='".$_REQUEST['id']."' ",$is_multiple="0","0");
		$profile_image="img/user.png";
		$bank_account_image="img/noimage.png";
		if($driver_details=="")
		{
			header("Location: index.php?pid=view_all_drivers");		
		}else
		{
			if($driver_details['photo']!="" && file_exists("uploads/User/".$driver_details['photo']))
			{
				$profile_image="uploads/User/".$driver_details['photo'];	
			}
			if($driver_details['bank_account_image']!="" && file_exists("uploads/User/".$driver_details['bank_account_image']))
			{
				$bank_account_image="uploads/User/".$driver_details['bank_account_image'];	
			}
			if($driver_details['bank_account_image']!="" && file_exists("uploads/KYC/".$driver_details['bank_account_image']))
			{
				$bank_account_image="uploads/KYC/".$driver_details['bank_account_image'];	
			}
			// print_r($driver_details);
			// $ride_vehicle_details=GetConditionalDetailsFromTable("cz_vehicle_details"," id='".$driver_details['id_car']."' ",$is_multiple="0","0");

			// $passenger_rating_details=GetConditionalDetailsFromTable("cz_ride_rating_details"," id_ride='".$driver_details['id']."' AND type='0' ",$is_multiple="0","0");
			// $driver_rating_details=GetConditionalDetailsFromTable("cz_ride_rating_details"," id_ride='".$driver_details['id']."' AND type='1' ",$is_multiple="0","0");
		}
	}else
	{
		header("Location: index.php?pid=view_all_drivers");
	}
?>
<div class="row">
	
   	<div class="col-md-6 col-lg-4">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Driver Details</h2>
			</div>
			<div class="">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<tr>
							<th  class="text-center">
								<?php if(isset($profile_image)){ echo "<img  class='view_large_img' src='".$profile_image."' style='height: 105px;width: 105px;border-radius:50%;padding: 3px;border: 2px solid #009e1e;'/> "; }?>
								<label class="btn btn-sm btn-success" style="margin: 85px -75px;position: absolute;"><?php echo GetDriverRatings($driver_details['cid']); ?> <i class="fa fa-star"></i></label>
							</th>
						</tr>
						<tr>
							<td class="text-center">
							<strong>Wallet Balance: </strong>
							<?php echo GetWalletBalance($driver_details['cid'],$utype="1"); ?> </td>
						</tr>	
						<tr><td class="text-center"><a href="index.php?pid=driver_wallet&driver=<?php echo $driver_details['cid']; ?>" class="btn btn-sm btn-default">Manage Wallet</a></td></tr>
						
						
							
					</table>
                    
				</div>
            </div>
        </div>
        <br>
        <div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Bank Details</h2>
			</div>
			<div class="">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<tr>
							<th  class="text-center" colspan="2">
								<?php if(isset($bank_account_image)){ echo "<img  class='view_large_img' src='".$bank_account_image."' style='height: 105px;width: 105px;border-radius:5px;padding: 3px;border: 2px solid #009e1e;'/> "; }?>
								
							</th>
						</tr>
						<tr>
							<th>Bank Name: </th>
							<td><?php echo $driver_details['bank_name']; ?> </td>
						</tr>
						<tr>
							<th>Bank IFSC Code: </th>
							<td><?php echo $driver_details['bank_ifsc_code']; ?> </td>
						</tr>
						<tr>
							<th>Bank Account No: </th>
							<td><?php echo $driver_details['bank_account_no']; ?> </td>
						</tr>
								
						
						
						
							
					</table>
                    
				</div>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-6 col-lg-8">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Profile Details</h2>
			</div>
			<div class="">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
							
						<tr>
							<th>Name:</th>
							<td><?php echo $driver_details['fname']; ?></td>

						</tr>

						<tr>	
							<th>Email:</th>
							<td><?php echo $driver_details['emailid']; ?></td>
						</tr>
						<tr>	
							<th>Mobile:</th>
							<td><?php echo $driver_details['mobile']; ?></td>
						</tr>
						<tr>
							<th>Status:</th>
							<td><?php 
						                      if($driver_details['status'] == 0 || $driver_details['status'] == 1)
						                      {
						                        echo '<a href="#" class="btn btn-sm btn-danger">Verfication Pending</a>';
						                      
						                      }elseif($driver_details['status'] == 2)
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-warning">Documentation Pending</a>';	
						                      }
						                      elseif($driver_details['status'] == 3 && (CheckVehicleAdded($driver_details['cid'])=="0"))
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-primary">Vehicle Pending</a>';	
						                      }
						                      elseif($driver_details['status'] == 4 || (CheckVehicleAdded($driver_details['cid'])=="1"))
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-success">Active</a>';	
						                      }
						                      // echo CheckVehicleAdded($driver_details['cid']);
						                    ?></td>
						</tr>
						<tr>	
							<th>Address:</th>
							<td><?php echo $driver_details['address']; ?></td>
						</tr>
						<tr>	
							<th>State:</th>
							<td><?php echo GetSingleFieldDataFromTable("cz_state_details","name"," id='".$driver_details['state']."' ",$is_stat_chk="0"); ?></td>
						</tr>
						<tr>	
							<th>City:</th>
							<td><?php echo GetSingleFieldDataFromTable("cz_distirct_details","name"," id='".$driver_details['city']."' ",$is_stat_chk="0"); ?></td>
						</tr>
						<tr>	
							<th>Reference Code:</th>
							<td><?php echo $driver_details['reference_code']; ?></td>
						</tr>
						<tr>	
							<th>Referral Code:</th>
							<td><?php echo $driver_details['referral']; ?></td>
						</tr>

						<tr>	
							<th>Account Creation Date :</th>
							<td><?php if($driver_details['date_added']!="" && $driver_details['date_added']!=null) {echo date('d-m-Y',strtotime($driver_details['date_added']));} ?></td>
						</tr>
					</table>
                    
				</div>
            </div>
        </div>
        <br>
    </div>
    
    <div class="col-md-12" style="margin-top: 30px;">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Profile Document List</h2>
			</div>
			<div class="col-md-12">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center datatable">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Document Name</th>
                           <th>Image</th>
                           <th>Document No</th>
                           <th>Expiry Date</th>
                           
                           <th class="text-center">Status</th>
                           <th class="text-center" width="200">Actions</th>
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								
								$upload_kyc_path="uploads/KYC/";
								
								//echo $page_query_inquiry;
								$current_page=$_REQUEST['pid'];

								$where=" id_user='".$_REQUEST['id']."' AND image!='' ";
								$query2 = "select * from cz_driver_profile_document where ".$where." group by id_document,id order by id desc ";
								
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									$document_image="img/noimage.png";
									if($fetch['image']!="" && file_exists($upload_kyc_path.$fetch['image']))
									{
										$document_image=$fetch['image'];
										$ext = pathinfo($document_image, PATHINFO_EXTENSION);
                                              $img_preview="<img src='".$upload_kyc_path.$document_image."' class='view_large_img' height='50' width='50'/>";
                                              if($ext=="pdf" || $ext=="doc" || $ext=="docx" || $ext=="ppt" || $ext=="pptx")
                                              {
                                                $img_preview='<div class="fileuploader-item-image fileupload-no-thumbnail"><div style="background-color: #f23c0f" class="fileuploader-item-icon"><i>'.strtoupper($ext).'</i></div></div>';
                                              }

									}else
									{
										$img_preview="<img src='".$document_image."' class='view_large_img' height='50' width='50'/>";
									}
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
                                        <td><?php echo $fetch['document_name']; ?></td>
                                        <td><?php echo $img_preview; ?></td>
                                        <td><?php echo $fetch['document_no']; ?></td>
                                        <td><?php if($fetch['expiry_date']!='0000-00-00' && $fetch['expiry_date']!='') {echo date('d-m-Y ',strtotime($fetch['expiry_date'])); } ?></td>
                                        
                                        
                                        
                                        <td class="text-center">
                                        	<?php 
                                        	if(get_access('update_driver') == 1)
                                        	{
						                      if($fetch['status'] == 1)
						                      {
						                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=0&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-success">Approved</a><?php
						                      }elseif($fetch['status'] == 2)
						                      {
						                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-danger">Rejected</a><?php
						                      } else {
						                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-warning">Pending</a><?php
						                      }
						                  	}else
						                  	{
						                  		if($fetch['status'] == 1)
							                      {
							                        ?><a href="#" class="btn btn-sm btn-success">Approved</a><?php
							                      }elseif($fetch['status'] == 2)
							                      {
							                        ?><a href="#" class="btn btn-sm btn-danger">Rejected</a><?php
							                      } else {
							                        ?><a href="#" class="btn btn-sm btn-warning">Pending</a><?php
							                      }
						                  	}
						                    ?>
						                    <?php
						                      if(isset($_REQUEST['status']) && isset($_REQUEST['doc_id']) && isset($_REQUEST['doc_type']) && $_REQUEST['doc_type']=="profile")
						                      {
						                        $status = $_REQUEST['status'];
						                        $id = $_REQUEST['doc_id'];
						                        mysqli_query($conn,"update cz_driver_profile_document set status='".$status."' where id='".$id."'");
						                        header("location:index.php?pid=".$_REQUEST['pid']."&id=".$_REQUEST['id']);
						                      }
						                    ?>
						                    
                                        </td>
                                        <td class="text-center">
                                        	<?php 
                                        		if($fetch['image']!="" && file_exists($upload_kyc_path.$fetch['image']))
                                        		{
                                        			?>
                                        			<a download="" href="<?php echo $upload_kyc_path.$fetch['image']; ?>" class="btn btn-sm btn-default"  title="Download" ><i class="fa fa-download"></i></a>
                                        			<?php
                                        		}else
                                        		{
                                        			?>
                                        			<a href="#" disabled class="btn btn-sm btn-default"  title="Download" ><i class="fa fa-download"></i></a>
                                        			<?php
                                        		}
                                        	?>
                                        	<?php 
                                        	if(get_access('update_driver') == 1)
                                        	{
	                                        	if($fetch['status'] == 1)
							                      {
							                      	?>
							                      	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=2&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-danger">Reject</a>
							                    <?php }   	
							                    elseif($fetch['status'] == 2)
							                      {
							                      	?>
							                      	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-success">Approve</a>
							                    <?php }else{ ?>
							                    	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-success">Approve</a>
							                    	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=2&doc_id=<?php echo $fetch['id']; ?>&doc_type=profile" class="btn btn-sm btn-danger">Reject</a>
							                    <?php } 
							                }
						                    ?>  	
                                        </td>
										<!-- <td align="center">
											<div class="btn-group mb-0">
												<a href="index.php?pid=view_vehicle_details&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
                                               
                                              
											</div>
											
										 </td> -->
									</tr>
									<?php	
									$i++;
								}
							  ?>	
						</tbody>
					</table>
                    <br>
				</div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12" style="margin-top: 30px;">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Duty Details</h2>
			</div>
			<div class="col-md-12">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center datatable">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Date</th>
                           <th>Start Time</th>
                           <th>End Time</th>
                           
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								
								
								if(!isset($page_query_inquiry))
								{
									$page_query_inquiry="";
								}
								//echo $page_query_inquiry;
								$current_page=$_REQUEST['pid'];

								$where=" user_id='".$_REQUEST['id']."' AND status='1' ";
								$query2 = "select * from cz_driver_duty_details where ".$where."  order by date desc ";
								
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
                                        <td><?php if($fetch['date']!="0000-00-00"){echo date('d-m-Y',strtotime($fetch['date']));} ?></td>
                                        <td><?php if($fetch['start_time']!="00:00:00"){echo date('H:i A',strtotime($fetch['start_time']));} ?></td>
                                        <td><?php if($fetch['end_time']!="00:00:00"){echo date('H:i A',strtotime($fetch['end_time']));} ?></td>
                                        
									</tr>
									<?php	
									$i++;
								}
							  ?>	
						</tbody>
					</table>
                    <br>
				</div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12" style="margin-top: 30px;">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
        		<div class="row col-sm-12">
        			<div class="col-sm-6">
						<h2 class=" mb-0">Vehicles Details</h2>
					</div>
					<div class="col-sm-6 text-right">
						<?php if(get_access('add_vehicle') == 1){?>
        				<a href="index.php?pid=add_vehicle<?php if(isset($_REQUEST['id'])){ echo "&user_id=".$_REQUEST['id'];} ?>" class="btn btn-sm btn-primary"> + Add Vehicle</a>
        			<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-12">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center datatable">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Name</th>
                           <th>Owner</th>
                           <th>Type</th>
                           <th class="text-center">Status</th>
                           <th class="text-center" width="200">Actions</th>
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								include("pagination.php");
								if(!isset($condition_inquiry))
								{
									$condition_inquiry="";
								}
								if(!isset($page_query_inquiry))
								{
									$page_query_inquiry="";
								}
								//echo $page_query_inquiry;
								$current_page=$_REQUEST['pid'];

								
								$where=" category != '2' ";
								if(isset($_REQUEST['user_id']))
								{
									$where.=" AND user_id='".$_REQUEST['user_id']."' ";
								}else
								{
									if(isset($_REQUEST['id']))
									{
										$where.=" AND user_id='".$_REQUEST['id']."' ";
									}
								}
								$sel1 = "select * from cz_vehicle_details where ".$where." ".$condition_inquiry." order by id desc ";
								$res1= mysqli_query($conn,$sel1);
								$total_records = mysqli_num_rows($res1);
								$page = 1;
								if(isset($_POST['psize'])) {
									$size = (int)$_POST['psize'];
									$_SESSION['pagesize']= $size;
								} else if(isset($_SESSION['pagesize']) && $_SESSION['pagesize'] != ''){
									$size = $_SESSION['pagesize'];
								} else {
									$size = 10;
									$_SESSION['pagesize']= 10;
								}
								if (isset($_GET['page'])){
									$page = (int) $_GET['page'];
								}
								// create the pagination class
								$pagination_link="index.php?pid=".$current_page.$page_query_inquiry."&page=%s";
								/*if(isset($search_que) && $search_que!="")
								{
									$pagination_link="index.php?pid=view_all_inquiry&search=".$search_que."&page=%s";
								}*/
								$pagination = new Pagination();
								$pagination->setLink($pagination_link); 
								$pagination->setPage($page);
								$pagination->setSize($size);
								$pagination->setTotalRecords($total_records);  
								
								$query2 = $sel1.$pagination->getLimitSql();
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
                                        <td><?php echo $fetch['name']; ?></td>
                                        <td><?php echo GetSingleFieldDataFromTable("cz_driver","fname"," cid='".$fetch['user_id']."' ",$is_stat_chk="0"); ?></td>
                                        <td><?php echo GetSingleFieldDataFromTable("cz_vehicle_sub_category","name"," id='".$fetch['sub_category']."' ",$is_stat_chk="0"); ?></td>
                                        
                                        
                                        
                                        <td class="text-center">
                                        	<?php 
						                      if($fetch['status'] == 1)
						                      {
						                        ?><a href="#" class="btn btn-sm btn-success">Online</a><?php
						                      } else {
						                        ?><a href="#" class="btn btn-sm btn-danger">Offline</a><?php
						                      }
						                    ?>
						                    <?php
						                      // if(isset($_REQUEST['status']) && isset($_REQUEST['id'])&& isset($_REQUEST['doc_type']) && $_REQUEST['doc_type']!="profile")
						                      // {
						                      //   $status = $_REQUEST['status'];
						                      //   $id = $_REQUEST['id'];
						                      //   mysqli_query($conn,"update cz_vehicle_details set status='".$status."' where id='".$id."'");
						                      //   header("location:index.php?pid=".$_REQUEST['pid']);
						                      // }
						                    ?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
												<a href="index.php?pid=view_vehicle_detail&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
                                               
                                               <?php if(get_access('update_vehicle') == 1){  ?>
                                                        <a href="index.php?pid=add_vehicle&id=<?php echo $fetch['id']; ?>"  class="btn btn-sm btn-default">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                <?php } ?>
                                                <?php if(get_access('remove_vehicle') == 1){  ?>
                                                        <a href="#delete<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                <?php } ?>
											</div>
											<div class="modal fade modal-dialog-top " id="delete<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												 <div class="modal-dialog ">
													  <div class="modal-content-wrap">
														   <div class="modal-content">
																<div class="modal-header text-left">
																	 <h4 class="modal-title">Message</h4>
																	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body text-left">Are you sure to delete the details?</div>
																<div class="modal-footer">
																	<a href="process/delete_vehicles.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
																	<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
																</div>
														   </div>
													  </div>
												  </div>
											  </div>
										 </td>
									</tr>
									<?php	
									$i++;
								}
							  ?>	
						</tbody>
					</table>
                    <br>
				</div>
            </div>
        </div>
    </div>
    <br>
    
    <div class="col-md-12" style="margin-top: 30px;display:none;">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
        		<div class="row col-sm-12">
        			<div class="col-sm-6">
						<h2 class=" mb-0">Ambulance Details</h2>
					</div>
					<div class="col-sm-6 text-right">
						<?php if(get_access('add_ambulance') == 1){ ?>
    					<a href="index.php?pid=add_ambulance<?php if(isset($_REQUEST['id'])){ echo "&user_id=".$_REQUEST['id'];} ?>" class="btn btn-sm btn-primary"> + Add Ambulance</a>
    				</div>
    			<?php } ?>
				</div>
			</div>
			<div class="col-md-12">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center datatable">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Name</th>
                           <th>Owner</th>
                           <!-- <th>Company</th>
                           <th>Model</th> -->
                           <th>Type</th>
                           <th class="text-center">Status</th>
                           <th class="text-center" width="200">Actions</th>
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								
								
								if(!isset($page_query_inquiry))
								{
									$page_query_inquiry="";
								}
								//echo $page_query_inquiry;
								$current_page=$_REQUEST['pid'];

								$where=" user_id='".$_REQUEST['id']."' AND category='2' ";
								$query2 = "select * from cz_vehicle_details where ".$where."  order by id desc ";
								
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
                                        <td><?php echo $fetch['name']; ?></td>
                                        <td><?php echo GetSingleFieldDataFromTable("cz_driver","fname"," cid='".$fetch['user_id']."' ",$is_stat_chk="0"); ?></td>
                                        <td><?php echo GetSingleFieldDataFromTable("cz_vehicle_sub_category","name"," id='".$fetch['sub_category']."' ",$is_stat_chk="0"); ?></td>
                                        
                                        
                                        
                                        <td class="text-center">
                                        	<?php 
						                      // if($fetch['status'] == 1)
						                      // {
						                      //   ?><!-- <a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=0&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Active</a> --><?php
						                      // } else {
						                      //   ?><!-- <a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=1&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Inactive</a> --><?php
						                      // }

						                      if($fetch['status'] == 1)
						                      {
						                        ?><a href="#" class="btn btn-sm btn-success">Online</a><?php
						                      } else {
						                        ?><a href="#" class="btn btn-sm btn-danger">Offline</a><?php
						                      }
						                    ?>
						                    <?php
						                      // if(isset($_REQUEST['status']) && isset($_REQUEST['id']))
						                      // {
						                      //   $status = $_REQUEST['status'];
						                      //   $id = $_REQUEST['id'];
						                      //   mysqli_query($conn,"update cz_vehicle_details set status='".$status."' where id='".$id."'");
						                      //   header("location:index.php?pid=".$_REQUEST['pid']);
						                      // }
						                    ?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
												<a href="index.php?pid=view_ambulance_detail&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
                                               
                                               <?php /*if(get_access('delete_lead') == 1){ */?>
                                                       <!--  <a href="#delete<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a> -->
                                                <?php /*}*/ ?>
                                                <?php if(get_access('update_ambulance') == 1){  ?>
                                                        <a href="index.php?pid=add_ambulance&id=<?php echo $fetch['id']; ?>"  class="btn btn-sm btn-default">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                <?php } ?>
                                                <?php if(get_access('remove_ambulance') == 1){  ?>
                                                        <a href="#delete<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                <?php } ?>
											</div>
											<div class="modal fade modal-dialog-top " id="delete<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												 <div class="modal-dialog ">
													  <div class="modal-content-wrap">
														   <div class="modal-content">
																<div class="modal-header text-left">
																	 <h4 class="modal-title">Message</h4>
																	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body text-left">Are you sure to delete the details?</div>
																<div class="modal-footer">
																	<a href="process/delete_ambulances.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
																	<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
																</div>
														   </div>
													  </div>
												  </div>
											  </div>
										 </td>
									</tr>
									<?php	
									$i++;
								}
							  ?>	
						</tbody>
					</table>
                    <br>
				</div>
            </div>
        </div>
    </div>
    <br>
</div>

