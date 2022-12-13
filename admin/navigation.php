<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Navigation Data</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Navigation Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table id="datatable" class="table table-striped table-inverse table-colored table-bordered">
                     <thead>
                       <tr>
							<th class="text-center" width="50">#</th>
							<th class="text-center" >Menu Name</th>
                            <th class="text-center" >Menu Title</th>
		                    <th class="text-center">Parent Menu</th>
							<th class="text-center" width="200">Actions</th>
					   </tr>
                     </thead>
                     <tbody id="result">
                     <?php
				  	  $i = 1;
					  $query2 = "select * from cz_menu order by mid desc";
					  $query = mysqli_query($conn,$query2);
					  while($fetch = mysqli_fetch_array($query))
                      {
						?>
						<tr>
							<td class="text-center"><?php echo $fetch['mid']; ?></td>
                            <td class="text-center"><?php echo $fetch['mname']; ?></td>
                            <td class="text-center"><?php echo $fetch['mtitle']; ?></td>
                            <td class="text-center"><?php echo get_parent_menu($fetch['pmenu']); ?></td>
                            <td class="text-center">
                             			 <div class="btn-group mb-0">
												<a href="index.php?pid=navigation&id=<?php echo $fetch['mid']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-edit"></i>
												</a>
												<a href="#delete<?php echo $fetch['mid']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
													<i class="fas fa-trash-alt"></i>
												</a>
											</div>
											<div class="modal fade modal-dialog-top " id="delete<?php echo $fetch['mid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												 <div class="modal-dialog ">
													  <div class="modal-content-wrap">
														   <div class="modal-content">
																<div class="modal-header text-left">
																	 <h4 class="modal-title">Message</h4>
																	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body text-left">Are you sure to delete the details?</div>
																<div class="modal-footer">
																	<a href="process/delete_menu.php?id=<?php echo $fetch['mid']; ?>" class="btn btn-danger btn-xs">Delete</a>
																	<button data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
																</div>
														   </div>
													  </div>
												  </div>
											  </div>
                           </td>
						</tr>
                     <?php $i++; } ?>
                     </tbody>
                 </table>
				</div>
            </div>
        </div>
    </div>
</div>
<br />
<div class="row">
	<div class="col-xl-12">
		<div class="card shadow">
			<div class="card-header">
				<h2 class="mb-0">Add Navigation</h2>
			</div>
			<div class="card-body">
				<?php include("message.php"); ?>
                <?php
					if(isset($_REQUEST['id']))
					{
						$select1 = "select * from cz_menu where mid='".$_REQUEST['id']."'";
						$query1 = mysqli_query($conn,$select1);
						$fetch1 = mysqli_fetch_array($query1);
					}
				?>
                <form class="form-horizontal" role="form" method="post" action="process/action_menu.php" enctype="multipart/form-data">
                <div class="col-sm-12">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Menu Name :</label>
						<div class="col-sm-5">
                           <input type="text" name="mname" id="mname" placeholder="Menu Name" class="form-control" <?php if(isset($_REQUEST['id'])){ echo "value='".$fetch1['mname']."'"; } ?>>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Menu Title :</label>
						<div class="col-sm-5">
                            <input type="text" name="mtitle" id="mtitle" placeholder="Menu Title" class="form-control" <?php if(isset($_REQUEST['id'])){ echo "value='".$fetch1['mtitle']."'"; } ?>>
                            <span class="help" id="msg3"></span>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Menu Parent :</label>
						<div class="col-sm-5">
							<select id="pmenu" name="pmenu" class="form-control">
                            	<option value="0">Select Parent</option>
                                <?php
									$ss = "select mid,mname from cz_menu where pmenu='0'";
									$qq = mysqli_query($conn,$ss);
									while($ff = mysqli_fetch_array($qq))
									{
										?><option <?php if(isset($_REQUEST['id'])){ if($ff['mid'] == $fetch1['pmenu']){ echo "selected"; }} ?> value="<?php echo $ff['mid']; ?>"><?php echo $ff['mname']; ?></option><?php
									}
								?>
                            </select>
						</div>
					</div>
                    <div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
                            <?php
								if(isset($_REQUEST['id']))
								{
									?><input type="hidden" name="mid" value="<?php echo $_REQUEST['id']; ?>" /><?php
								}
							?>
							<button class="btn btn-primary" type="submit">Save Details</button>
						</div>
					</div>
                 </div>
				</form>
			</div>
	  </div>
	</div>
</div>
