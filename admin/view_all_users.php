<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Users</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php 
	        	$search_page_query="";
				$search_user_condition=" WHERE cid>0 ";
	        	include("search_bar_users.php"); ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">User Data</h2>
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
                            <th class="text-center">User Type</th>                            
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
							 	$query2 = "SELECT * from cz_users $search_user_condition order by cid desc";
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
                                        <!--<td><?php echo $fetch['password']; ?></td>
                                        <td><?php if(isset($user_roles[($fetch['urole'])])){echo $user_roles[($fetch['urole'])];} ?></td>-->
                                        
                                        <td class="text-center">
										<?php 
											if($fetch['user_type'] == "free")
											{
												$confirmation_msg_modal="Are you sure to update this user to paid user?";
												$update_link="index.php?pid=view_all_users&user_type=paid&is_active_membership=1&id=".$fetch['cid'];
												?><a href="#update_user_type<?php echo $fetch['cid']; ?>" data-toggle="modal"  class="btn btn-sm btn-warning">Free</a><?php
											}
											else
											{
												$confirmation_msg_modal="Are you sure to update this user to free user?";
												$update_link="index.php?pid=view_all_users&user_type=free&is_active_membership=0&id=".$fetch['cid'];
												?>
													<a href="#update_user_type<?php echo $fetch['cid']; ?>" data-toggle="modal" class="btn btn-sm btn-success">Paid</a>
												<?php
											} 
										?>
                                        </td>
										<td class="text-center">
										<?php
											if(get_access('update_user') == 1)
											{ 
												if($fetch['status'] == 1)
												{
													?><a href="index.php?pid=view_all_users&status=2&id=<?php echo $fetch['cid']; ?>" class="btn btn-sm btn-success">Active</a><?php
												}
												elseif($fetch['status'] == 0)
												{
													?>
														<a href="index.php?pid=view_all_users&status=1&id=<?php echo $fetch['cid']; ?>" class="btn btn-sm btn-warning">Unverified</a>
													<?php
												} 
												else 
												{
													?><a href="index.php?pid=view_all_users&status=1&id=<?php echo $fetch['cid']; ?>" class="btn btn-sm btn-danger">Blocked</a><?php
												}
											}else
											{
												if($fetch['status'] == 1)
												{
													?><a href="#" class="btn btn-sm btn-success">Active</a><?php
												}
												elseif($fetch['status'] == 0)
												{
													?>
														<a href="#" class="btn btn-sm btn-warning">Unverified</a>
													<?php
												} 
												else 
												{
													?><a href="#" class="btn btn-sm btn-danger">Blocked</a><?php
												}
											}
										?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
												<?php if(get_access('update_user') == 1){?>
												<a href="index.php?pid=add_user&id=<?php echo $fetch['cid']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-edit"></i>
												</a>

														<div class="modal fade modal-dialog-top " id="update_user_type<?php echo $fetch['cid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
															<div class="modal-dialog ">
																<div class="modal-content-wrap">
																	<div class="modal-content">
																			<div class="modal-header text-left">
																				<h4 class="modal-title">Confirmation</h4>
																				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																			</div>
																			<div class="modal-body text-left"><?php echo $confirmation_msg_modal; ?></div>
																			<div class="modal-footer">
																				<a href="<?php echo $update_link; ?>" class="btn btn-success btn-xs">Update</a>
																				<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
																			</div>
																	</div>
																</div>
															</div>
														</div>
												<?php } ?>
												<?php if(get_access('view_user') == 1){?>
												<a href="index.php?pid=view_user_detail&cid=<?php echo $fetch['cid']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
												<?php } ?>
												<?php if(get_access('remove_user') == 1){?>
                                                <a href="#delete<?php echo $fetch['cid']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
													<i class="fas fa-trash-alt"></i>
												</a>
												<?php } ?>
											</div>
											<div class="modal fade modal-dialog-top " id="delete<?php echo $fetch['cid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												 <div class="modal-dialog ">
													  <div class="modal-content-wrap">
														   <div class="modal-content">
																<div class="modal-header text-left">
																	 <h4 class="modal-title">Confirmation</h4>
																	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body text-left">Are you sure to delete the details?</div>
																<div class="modal-footer">
																	<a href="process/delete_user.php?id=<?php echo $fetch['cid']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
							mysqli_query($conn,"update cz_users set status='".$status."' where cid='".$id."'");
							header("location:index.php?pid=view_all_users");
						}
						if(isset($_REQUEST['user_type']))
						{
							$user_type = $_REQUEST['user_type'];
							$is_active_membership=$_REQUEST['is_active_membership'];
							$id = $_REQUEST['id'];
							mysqli_query($conn,"update cz_users set user_type='".$user_type."',is_active_membership='$is_active_membership' where cid='".$id."'");
							header("location:index.php?pid=view_all_users");
						}
					?>
                    
				</div>
            </div>
        </div>
    </div>
</div>
