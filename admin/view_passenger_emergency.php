<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Passenger Emergency Calls</li>
	</ol>
</div>

<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Passenger Emergency Call Data</h2>
			</div>
			<?php 
				$selected_tab="1";
			?>
			<div class="col-md-12">
            	<div class="nav-wrapper p-0">
					<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0 <?php if(isset($selected_tab) && ($selected_tab=="" || $selected_tab=="1")){ echo ' show active ';} ?>" id="tabs-today-tab" data-toggle="tab" href="#tabs-today" role="tab" aria-controls="tabs-today" aria-selected="true">Today's Emergency Calls</a>
						</li>
						<li class="nav-item">
							<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0 <?php if(isset($selected_tab) &&  $selected_tab=="2"){ echo ' show active ';} ?>" id="tabs-all-tab" data-toggle="tab" href="#tabs-all" role="tab" aria-controls="tabs-all" aria-selected="false">All Emergency Calls</a>
						</li>
						
						
					</ul>
				</div>
				<div class="tab-content m-t-30">
					<div class="tab-pane fade <?php if(isset($selected_tab) && ($selected_tab=="" || $selected_tab=="1")){ echo ' show active ';} ?>" id="tabs-today" role="tabpanel" aria-labelledby="tabs-today-tab">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									
				                    <table class="table card-table table-vcenter text-nowrap align-items-center datatable">
										<thead class="thead-light">
										<tr>
				                            <th class="text-center">#</th>
				                            <th>Call By</th>
				                            <th>Ride</th>
				                            <th>Date</th>
				                            <th class="text-center">Status</th>
				                            <th class="text-center">Edit</th>
				                       </tr>
										</thead>
										<tbody>
											<?php
											 	$i = 1;
												
												if(!isset($condition_call))
												{
													$condition_call=" WHERE type='0' AND DATE(date_added)='".date('Y-m-d')."' ";
												}
												
												$current_page=$_REQUEST['pid'];

												$sel1_today_call = "select * from cz_emergency_details ".$condition_call." order by id desc ";
												
												$query_today_call = mysqli_query($conn,$sel1_today_call) or die(mysqli_error($conn));
												$i = 1;
												while($fetch = mysqli_fetch_array($query_today_call))
												{
													?>
													<tr>
														<td class="text-center"><?php echo $i; ?></td>
														<td><?php echo GetSingleFieldDataFromTable("cz_customers","fname"," cid='".$fetch['user_id']."' ",$is_stat_chk="0"); ?> </td>
														<td><?php echo GetSingleFieldDataFromTable("cz_ride_offers_details","ride_code"," id='".$fetch['id_ride']."' ",$is_stat_chk="0"); ?> </td>
				                                        <td><?php if(isset($fetch['date_added']) && $fetch['date_added']!="0000-00-00 00:00:00"){ echo date('d-m-Y H:i A',strtotime($fetch['date_added'])); }?></td>
				                                        
				                                        
				                                        <td class="text-center">
														<?php 
										                      if($fetch['status'] == 1)
										                      {
										                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=0&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Resolved</a><?php
										                      } else {
										                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=1&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Pending</a><?php
										                      }
										                    ?>
				                                        </td>
														<td align="center">
															<div class="btn-group mb-0">   
				                                               <a href="#ModalViewDetail<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
				                                                    <i class="fas fa-eye"></i>
				                                                </a>
				                                                <!-- <a href="#delete<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
				                                                    <i class="fas fa-trash-alt"></i>
				                                                </a> -->
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

					<div class="tab-pane fade <?php if(isset($selected_tab) &&  $selected_tab=="2"){ echo ' show active ';} ?>" id="tabs-all" role="tabpanel" aria-labelledby="tabs-all-tab">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									
									
				                  <table class="table card-table table-vcenter text-nowrap align-items-center datatable">
										<thead class="thead-light">
										<tr>
				                            <th class="text-center">#</th>
				                            <th>Call By</th>
				                            <th>Ride</th>
				                            <th>Date</th>
				                            <th class="text-center">Status</th>
				                            <th class="text-center">Edit</th>
				                       </tr>
										</thead>
										<tbody>
											<?php
											 	$i = 1;
												
												if(!isset($condition_call))
												{
													$condition_call=" WHERE type='0' ";
												}
												
												$current_page=$_REQUEST['pid'];

												$sel1_all_call = "select * from cz_emergency_details ".$condition_call." order by id desc ";
												
												$query_all_call = mysqli_query($conn,$sel1_all_call) or die(mysqli_error($conn));
												$i = 1;
												while($fetch = mysqli_fetch_array($query_all_call))
												{
													?>
													<tr>
														<td class="text-center"><?php echo $i; ?></td>
														<td><?php echo GetSingleFieldDataFromTable("cz_customers","fname"," cid='".$fetch['user_id']."' ",$is_stat_chk="0"); ?> </td>
														<td><?php echo GetSingleFieldDataFromTable("cz_ride_offers_details","ride_code"," id='".$fetch['id_ride']."' ",$is_stat_chk="0"); ?> </td>
				                                        <td><?php if(isset($fetch['date_added']) && $fetch['date_added']!="0000-00-00 00:00:00"){ echo date('d-m-Y H:i A',strtotime($fetch['date_added'])); }?></td>
				                                        
				                                        
				                                        <td class="text-center">
														<?php 
										                      if($fetch['status'] == 1)
										                      {
										                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=0&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Resolved</a><?php
										                      } else {
										                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=1&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Pending</a><?php
										                      }
										                    ?>
				                                        </td>
														<td align="center">
															<div class="btn-group mb-0">   
				                                               <a href="#ModalViewDetail<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
				                                                    <i class="fas fa-eye"></i>
				                                                </a>
				                                                <!-- <a href="#delete<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
				                                                    <i class="fas fa-trash-alt"></i>
				                                                </a> -->
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
				</div>
            </div>
        </div>
    </div>
</div>
<?php
		if(isset($_REQUEST['status']))
		{
			$id = $_REQUEST['id'];
			$status = $_REQUEST['status'];
			mysqli_query($conn,"update cz_emergency_details set status='".$status."' where id='".$id."'");
			header("location:index.php?pid=view_passenger_emergency");
		}
	?>
<?php 
$sel1=" SELECT * from cz_emergency_details WHERE type='0' ";
$query = mysqli_query($conn,$sel1) or die(mysqli_error($conn));
$i = 1;
while($fetch = mysqli_fetch_array($query))
{ ?>
<div class="modal fade modal-dialog-top " id="ModalViewDetail<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 <div class="modal-dialog modal-md">
		  <div class="modal-content-wrap">
			   <div class="modal-content">
					<div class="modal-header text-left">
						 <h4 class="modal-title">View Details</h4>
						 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body text-left">
						<div class="table-responsive">
							<table class="table card-table table-vcenter  align-items-center datatable">
								

														
				                                        

							<tbody>
								<tr>
									<th>Call By</th>
									<td><?php echo GetSingleFieldDataFromTable("cz_customers","fname"," cid='".$fetch['user_id']."' ",$is_stat_chk="0"); ?> </td>
								</tr>
								<tr>
									<th>Ride</th>
									<td><?php echo GetSingleFieldDataFromTable("cz_ride_offers_details","ride_code"," id='".$fetch['id_ride']."' ",$is_stat_chk="0"); ?> </td>
								</tr>
								<tr>
									<th>Date</th>
									<td><?php if(isset($fetch['date_added']) && $fetch['date_added']!="0000-00-00 00:00:00"){ echo date('d-m-Y H:i A',strtotime($fetch['date_added'])); }?></td>
								</tr>
								
								<tr>
									<th>Location Lat Long</th>
									<td><?php echo $fetch['lat_lng']; ?>%</td>
								</tr>
								
								<tr>
									<th>Loaction</th>
									<td><?php echo $fetch['place_description']; ?>%</td>
								</tr>
								
							</tbody>
						</table>
					</div>
						
			   	</div>
		  	</div>
	  	</div>
	</div>
</div>
<?php } ?>