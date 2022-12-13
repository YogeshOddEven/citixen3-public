<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Crime Type Data</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Crime Type Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table id="datatable" class="table card-table table-vcenter text-nowrap align-items-center">
						<thead class="thead-light">
						<tr>
                            <th class="text-center">#</th>
                            <th>Crime Type Name</th>
                            <th>Spanish Name</th>
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								$query2 = "select * from cz_crime_type order by id";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo $fetch['name']; ?></td>
										<td><?php echo $fetch['spanish_name']; ?></td>
										<td align="center">
											<div class="btn-group mb-0">
											<?php if(get_access('add_crime_types') == 1){?>
												<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-edit"></i>
												</a>
												<?php } ?>
												<?php if(get_access('remove_crime_types') == 1){?>
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
																	<a href="process/delete_crime_type.php?id=<?php echo $fetch['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
<?php 
if(get_access('add_crime_types') == 1)
{
?>
<div class="row">
	<div class="col-xl-12">
		<div class="card shadow">
			<div class="card-header">
				<h2 class="mb-0">Add Crime Type</h2>
			</div>
			<div class="card-body">
				<?php include("message.php"); ?>
                <?php
					if(isset($_REQUEST['id']))
					{
						$sel = "select * from cz_crime_type where id='".$_REQUEST['id']."'";
						$qry = mysqli_query($conn,$sel);
						$fet = mysqli_fetch_array($qry);
					}
				?>
                <form class="form-horizontal validate-form" data-err_msg_ele="help"  method="post" action="process/action_crime_type.php" enctype="multipart/form-data">
                <div class="col-md-6">
                   <div class="form-group">
                        <label class="col-md-12 control-label">Crime Type Name</label>    
                        <div class="col-md-12">
	                        <input type="text" class="form-control"  data-is_validate="1" placeholder="Crime Type Name" name="name" id="name" <?php if(isset($_REQUEST['id'])){ echo "value='".$fet['name']."'"; }?>>
    	                    <span class="help" id="msg1"></span>
                        </div>
                   </div>
   	            </div>

				<div class="col-md-6">
                   <div class="form-group">
                        <label class="col-md-12 control-label">Spanish Name</label>    
                        <div class="col-md-12">
	                        <input type="text" class="form-control"  data-is_validate="1" placeholder="Spanish Name" name="spanish_name" id="spanish_name" <?php if(isset($_REQUEST['id'])){ echo "value='".$fet['spanish_name']."'"; }?>>
    	                    <span class="help" id="msg1"></span>
                        </div>
                   </div>
   	            </div>

                <div class="col-md-6">
                    <div class="form-group">
                       	  <label class="control-label">&nbsp;</label>                      
                          <?php
							if(isset($_REQUEST['id']))
							{
								?><input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" /><?php
							}
						  ?>
		                  <button class="btn btn-primary" name="submit" type="submit">Save Details</button>
                    </div>
                 </div>
                </form>
			</div>
	  </div>
	</div>
</div>
<?php } ?>