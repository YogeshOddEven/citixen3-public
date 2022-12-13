<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Manage User Details</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">User Details Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table id="datatable" class="table card-table table-vcenter text-nowrap align-items-center">
						<thead class="thead-light">
						<tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								$query2 = "select * from cz_customers order by cid";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
										<td class="text-center"><?php echo $fetch['fname']." ".$fetch['lname']; ?></td>
										<td class="text-center"><?php echo $fetch['emailid']; ?></td>
										<td class="text-center"><?php echo $fetch['mobile']; ?></td>
									
										<td class="text-center"><?php if($fetch['status']=="1"){ echo '<a class="btn btn-sm btn-success" href="index.php?pid='.$_REQUEST['pid'].'&status=0&idStat='.$fetch['cid'].'" >Active</a>'; }else{ echo '<a class="btn btn-sm btn-danger" href="index.php?pid='.$_REQUEST['pid'].'&status=1&idStat='.$fetch['cid'].'" >Inactive</a>'; } ?></td>	
										
                                        <?php
											if(isset($_REQUEST['status']) && isset($_REQUEST['idStat']))
											{
												$status = $_REQUEST['status'];
												$id = $_REQUEST['idStat'];
												mysqli_query($conn,"update cz_customers set status='".$status."' where cid='".$id."'");
												header("location:index.php?pid=manage_users");
											}
										?>
										<td align="center">
											<div class="btn-group mb-0">
												<!--<a href="index.php?pid=faq_details&id=<?php echo $fetch['cid']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-edit"></i>
												</a>-->
												<a href="#delete<?php echo $fetch['cid']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
													<i class="fas fa-trash-alt"></i>
												</a>
												<a href="index.php?pid=view_user_detail&cid=<?php echo $fetch['cid']; ?>"  class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
											</div>
											<div class="modal fade modal-dialog-top " id="delete<?php echo $fetch['cid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												 <div class="modal-dialog ">
													  <div class="modal-content-wrap">
														   <div class="modal-content">
																<div class="modal-header text-left">
																	 <h4 class="modal-title">Message</h4>
																	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body text-left">Are you sure to delete user account details?</div>
																<div class="modal-footer">
																	<a href="process/delete_user_details.php?id=<?php echo $fetch['cid']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
				</div>
            </div>
        </div>
    </div>
</div>
<br>
