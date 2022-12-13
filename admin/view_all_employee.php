<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Admin Users</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Admin User Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table class="table card-table table-vcenter text-nowrap align-items-center" id="datatable">
						<thead class="thead-light">
						<tr>
                            <th class="text-center">#</th>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>Email ID</th>
                            <!-- <th>Password</th> -->
                            <th>Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
							 	$query2 = "select * from cz_login order by id desc";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo $fetch['fname']." ".$fetch['lname']; ?></td>
                                        <td><?php echo $fetch['mobile']; ?></td>
                                        <td><?php echo $fetch['emailid']; ?></td>
                                        <!-- <td><?php echo $fetch['password']; ?></td> -->
                                        <td><?php echo $fetch['urole']; ?></td>
                                        
                                        <td class="text-center">
										<?php 
											if(get_access('update_admin_user') == 1)
											{
												if($fetch['status'] == 0)
												{
													?><a href="index.php?pid=view_all_employee&status=1&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Active</a><?php
												} else {
													?><a href="index.php?pid=view_all_employee&status=0&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">De-Active</a><?php
												}
											}else
											{
												if($fetch['status'] == 0)
												{
													?><a href="#" class="btn btn-sm btn-success">Active</a><?php
												} else {
													?><a href="#" class="btn btn-sm btn-danger">Inactive</a><?php
												}
											}
										?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
											<?php if(get_access('update_admin_user') == 1){?>
												<a href="index.php?pid=add_employee&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-edit"></i>
												</a>
											<?php } ?>
											<?php if(get_access('remove_admin_user') == 1){?>	
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
																	<a href="process/delete_employee.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
							mysqli_query($conn,"update cz_login set status='".$status."' where id='".$id."'");
							header("location:index.php?pid=view_all_employee");
						}
					?>
                    
				</div>
            </div>
        </div>
    </div>
</div>
