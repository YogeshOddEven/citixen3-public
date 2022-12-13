<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Crimes</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php 
	        	$search_page_query="";
				$search_crime_condition=" WHERE id>0 ";
	        	include("search_bar_crimes.php"); ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Crime Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table class="table card-table table-vcenter text-nowrap align-items-center" id="datatable">
						<thead class="thead-light">
						<tr>
                            <th class="text-center">#</th>
                            <th>Crime Reported By</th>
                            <th>Crime Type</th>
                            <th>Victim/Witness?</th>
                            <th>Crime Location</th>
                            <th>Date</th>
                            <!-- <th class="text-center">Status</th> -->
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
								$check_condition="";
								if(isset($_REQUEST['report_type']) && $_REQUEST['report_type']!="")
								{
									$check_condition=" AND report_type='".$_REQUEST['report_type']."' ";
								}
							 	$query2 = "SELECT * from cz_crime_details $search_crime_condition $check_condition order by id desc";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo GetSingleFieldDataFromTable("cz_users","fname"," cid='".$fetch['added_by']."' ",$is_stat_chk="0")." ".GetSingleFieldDataFromTable("cz_users","lname"," cid='".$fetch['added_by']."' ",$is_stat_chk="0"); ?></td>
                                        <td><?php echo GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$fetch['crime_type']."' ",$is_stat_chk="0"); ?></td>
                                        <td><?php echo $fetch['report_type']; ?></td>
                                        <!-- <td><?php if($fetch['report_type']=="1"){echo "Yes";}else{echo "No";} ?></td> -->
                                        <td><?php echo $fetch['crime_full_address']; ?></td>
                                        <td><?php if($fetch['crime_date']!="" && $fetch['crime_date']!="0000-00-00 00:00:00") echo date('d-m-Y H:i A',strtotime($fetch['crime_date'])); ?></td>
                                        
                                        
                                        <!--<td class="text-center">
										<?php 
											if($fetch['status'] == 1)
											{
												?><a href="index.php?pid=view_all_crimes&status=0&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Active</a><?php
											} else {
												?><a href="index.php?pid=view_all_crimes&status=1&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Inactive</a><?php
											}
										?>
                                        </td>-->
										<td align="center">
											<div class="btn-group mb-0">
												<!--<a href="index.php?pid=add_employee&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-edit"></i>
												</a>-->
												<?php if(get_access('view_crime') == 1){?>
												<a href="index.php?pid=view_crime_detail&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
												<?php } ?>
												<?php if(get_access('remove_crime') == 1){?>
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
																	<a href="process/delete_crime.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
                    <?php
						if(isset($_REQUEST['status']))
						{
							$status = $_REQUEST['status'];
							$id = $_REQUEST['id'];
							mysqli_query($conn,"update cz_users set status='".$status."' where id='".$id."'");
							header("location:index.php?pid=view_all_crimes");
						}
					?>
                    
				</div>
            </div>
        </div>
    </div>
</div>
