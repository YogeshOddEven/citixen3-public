<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Crime Edit Requests</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php 
	        	$search_page_query="";
				$search_request_condition=" WHERE id>0 ";
	        	include("search_bar_crime_requests.php"); ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Crime Edit Request Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table class="table card-table table-vcenter text-nowrap align-items-center" id="datatable">
						<thead class="thead-light">
						<tr>
                            <th class="text-center">#</th>
                            <th>Crime Request By</th>
                            <th>Crime Title</th>
                            <th>Crime Type</th>
                            <!-- <th>Crime Request Location</th> -->
                            <th>Date</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
							 	$query2 = "SELECT * from cz_crime_update_request $search_request_condition order by id desc";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									$crime_type_id=GetSingleFieldDataFromTable("cz_crime_details","crime_type"," id='".$fetch['crime_id']."' ",$is_stat_chk="0");
									$crime_type_name=GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$crime_type_id."' ",$is_stat_chk="0");
									$crime_title=$crime_type_name." at ".GetSingleFieldDataFromTable("cz_crime_details","crime_full_address"," id='".$fetch['crime_id']."' ",$is_stat_chk="0");

									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo GetSingleFieldDataFromTable("cz_users","fname"," cid='".$fetch['request_by']."' ",$is_stat_chk="0")." ".GetSingleFieldDataFromTable("cz_users","lname"," cid='".$fetch['request_by']."' ",$is_stat_chk="0"); ?></td>
										<td><?php echo $crime_title; ?></td>
                                        <td><?php echo GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$crime_type_id."' ",$is_stat_chk="0"); ?></td>
                                        
                                        
                                        <td><?php if($fetch['date']!="" && $fetch['date']!="0000-00-00 00:00:00") echo date('d-m-Y H:i A',strtotime($fetch['date'])); ?></td>
                                        
                                        
                                        <td class="text-center">
										<?php 
											if($fetch['status'] == 0)
											{
												?><a href="#" class="btn btn-sm btn-warning">Pending</a><?php
											}elseif($fetch['status'] == 1)
											{
												?><a href="#" class="btn btn-sm btn-success">Approved</a><?php
											} 
											else {
												?><a href="#" class="btn btn-sm btn-danger">Rejected</a><?php
											}
										?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
												
												<?php
													if($fetch['status'] == 0)
													{
														?>
														<?php if(get_access('update_crime') == 1){?>
															<a href="#accept_request<?php echo $fetch['id']; ?>"  data-toggle="modal" class="btn btn-sm btn-success">
																<i class="fas fa-check"></i>
															</a>
															
															<a href="#reject_request<?php echo $fetch['id']; ?>"  data-toggle="modal" class="btn btn-sm btn-danger">
																<i class="fas fa-times"></i>
															</a>
														<?php
														}
													}				
												?>
												<?php if(get_access('update_crime') == 1){?>
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
																	<a href="process/delete_crime_request.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
																	<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
																</div>
														   </div>
													  </div>
												  </div>
											  </div>
												
												<div class="modal fade modal-dialog-top " id="accept_request<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog ">
														<div class="modal-content-wrap">
															<div class="modal-content">
																	<div class="modal-header text-left">
																		<h4 class="modal-title">Message</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	</div>
																	<div class="modal-body text-left">Are you sure to accept request?</div>
																	<div class="modal-footer">
																		<a href="index.php?pid=<?php echo $_REQUEST['pid'] ?>&id=<?php echo $fetch['id']; ?>&status=1" class="btn btn-danger btn-xs">Yes</a>
																		<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">No</button>
																	</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="modal fade modal-dialog-top " id="reject_request<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog ">
														<div class="modal-content-wrap">
															<div class="modal-content">
																	<div class="modal-header text-left">
																		<h4 class="modal-title">Message</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	</div>
																	<div class="modal-body text-left">Are you sure to reject request?</div>
																	<div class="modal-footer">
																		<a href="index.php?pid=<?php echo $_REQUEST['pid'] ?>&id=<?php echo $fetch['id']; ?>&status=2" class="btn btn-danger btn-xs">Yes</a>
																		<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">No</button>
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
                    <?php
						if(isset($_REQUEST['status']))
						{
							$status = $_REQUEST['status'];
							$id = $_REQUEST['id'];
							$request_query=mysqli_query($conn,"update cz_crime_update_request set status='".$status."' where id='".$id."'");
							if($request_query)
							{
								if($status=="1")
								{
									$update_request_date=date('Y-m-d H:i:s');
									mysqli_query($conn,"UPDATE cz_crime_details SET is_open_update='1',update_request_status='1',update_request_date='$update_request_date' ");
								}else
								{
									mysqli_query($conn,"UPDATE cz_crime_details SET is_open_update='0',update_request_status='0',is_requested_update='0',update_request_date='' ");
								}
							}
							header("location:index.php?pid=".$_REQUEST['pid']);
						}
					?>
                    
				</div>
            </div>
        </div>
    </div>
</div>
