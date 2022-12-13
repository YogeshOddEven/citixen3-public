<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">User Role Data</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">User Role Data</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table id="datatable" class="table card-table table-vcenter text-nowrap align-items-center">
						<thead class="thead-light">
						<tr>
                            <th class="text-center">#</th>
                            <th>Role Name</th>
                            <th class="text-center">Actions</th>
                       </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								$query2 = "select uname from cz_role group by uname order by uname asc";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
                //echo mysqli_num_rows($query);
                //echo '<script>console.log('.json_encode($user_roles).');</script>';
								while($fetch = mysqli_fetch_array($query))
								{
         //          if(isset($user_roles) && count($user_roles)>0)
         //          {
         //            $rname="";
         //            if(isset($user_roles[($fetch['uname'])]))
         //            {
         //              $rname=$user_roles[($fetch['uname'])];
         //            }
         //          }else
         //          {
									//  if($fetch['uname'] == 1){ $rname = "Super Admin";} 
									//  if($fetch['uname'] == 2){ $rname = "Head";} 
									//  if($fetch['uname'] == 3){ $rname = "Employee";} 
									// }
                  $rname=$fetch['uname'];
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo $rname; ?></td>
										<td align="center">
											<div class="btn-group mb-0">
												<a href="index.php?pid=user_role&id=<?php echo $fetch['uname']; ?>" class="btn btn-sm btn-default">
                          <i class="fas fa-edit"></i>
												</a>
                        <a href="#delete<?php echo str_replace(" ","-",$fetch['uname']); ?>" data-toggle="modal" class="btn btn-sm btn-default">
													<i class="fas fa-trash-alt"></i>
												</a>
                          
											</div>
                      <div class="modal fade modal-dialog-top " id="delete<?php echo str_replace(" ","-",$fetch['uname']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog ">
                              <div class="modal-content-wrap">
                                <div class="modal-content">
                                  <div class="modal-header text-left">
                                    <h4 class="modal-title">Message</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  </div>
                                  <div class="modal-body text-left">Are you sure to delete role details?</div>
                                  <div class="modal-footer">
                                    <a href="process/delete_user_role.php?id=<?php echo $fetch['uname']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
<br />
<?php
	//if(isset($_REQUEST['id']))
//	{
		?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header">
                  
                    <h2 class="mb-0"><?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=""){echo "Update";  }else{echo "Add";}?> Role</h2>
                </div>
                <div class="card-body">
                    <?php include("message.php"); ?>
	                <form class="form-horizontal validate-form" data-err_msg_ele="help" data-err_msg_ele="help"  method="post" action="process/action_user_role.php" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Role</label>
                           <div class="col-md-6">
                               <!-- <select class="form-control select2" name="role" id="role">
                                <?php
                                  if(isset($user_roles) && count($user_roles)>0)
                                  {
                                    for($i=0;$i<count($user_roles); $i++)
                                    {
                                      $selected_role="";
                                      if(isset($_REQUEST['id']) && $_REQUEST['id']==$i)
                                      {
                                        $selected_role="selected";
                                      }
                                      if(isset($user_roles[$i]) && $user_roles[$i]!="")
                                      {
                                        echo '<option value="'.$i.'" '.$selected_role.'>'.$user_roles[$i].'</option>';
                                      }
                                    }
                                  }else
                                  {
                                 ?>
                                  <option <?php if(isset($_REQUEST['id'])){ if($_REQUEST['id'] == 1){ echo "selected"; }} ?> value="1">Supar Admin</option>
                                  <option <?php if(isset($_REQUEST['id'])){ if($_REQUEST['id'] == 2){ echo "selected"; }} ?> value="2">Head</option>
                                  <option <?php if(isset($_REQUEST['id'])){ if($_REQUEST['id'] == 3){ echo "selected"; }} ?> value="3">Employee</option>
                                <?php } ?>
                               </select> -->
                               <input type="text" class="form-control" placeholder="Role" data-is_validate="1" name="role" id="role" <?php if(isset($_REQUEST['id']) && $_REQUEST['id']!=""){echo "readonly";  }?> value="<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id']; } ?>">
                               <span class="help" id="msg1"></span>
                           </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Menu Access</label>
                            <div class="col-sm-12">
                                <div class="custom-dd dd row" id="nestable_list_1">
                                  <div class="dd-item col-md-12 row" data-id="2">
                                    <div class="dd-handle col-md-3 col-lg-2 col-sm-12">
                                      
                                      <div class="custom-control custom-checkbox custom-control-inline">
                                          <input type="checkbox" name="check_all" onclick="UpdateRoleChecklist(this);" id="check_all"  class="custom-control-input check-item" value="1"  ><label class="custom-control-label control-label" for="check_all" > Check All</label>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <ol class="dd-list"> -->
                                  <?php
                                    $ss = "select * from cz_menu where pmenu='0'";
                                    $qq = mysqli_query($conn,$ss);
                                    while($ff = mysqli_fetch_array($qq))
                                    {
                                        if(isset($_REQUEST['id']))
                                        {
                                            $ss2 = "select rstatus from cz_role where uname='".$_REQUEST['id']."' and rname='".$ff['mtitle']."'";
                                            $qq2 = mysqli_query($conn,$ss2);
                                            $ff2 = mysqli_fetch_array($qq2);
                                        }
                                    ?>
                                    
                                     <div class="dd-item col-md-12 row" data-id="2">
                                        <div class="dd-handle col-md-3 col-lg-2 col-sm-12">
                                          
                                          <div class="custom-control custom-checkbox custom-control-inline">
                                              <input type="checkbox" name="<?php echo $ff['mtitle']; ?>" id="<?php echo $ff['mtitle']; ?>" onchange="SelectMultipleCheck(this);" data-opt="chk-main-menu<?php echo $ff['mid']; ?>" class="custom-control-input check-item" value="1" <?php if(isset($_REQUEST['id'])){ if(isset($ff2['rstatus']) && $ff2['rstatus'] == 1){ echo "checked"; }} ?> ><label class="custom-control-label control-label" for="<?php echo $ff['mtitle']; ?>" > <?php echo $ff['mname']; ?></label>
                                          </div>
                                        </div>
                                        <div class="dd-list col-md-9 col-lg-10 col-sm-12 row">
                                        <?php
                                        $ss1 = "select * from cz_menu where pmenu='".$ff['mid']."'";
                                        $qq1 = mysqli_query($conn,$ss1);
                                        while($ff1 = mysqli_fetch_array($qq1))
                                        {
                                            if(isset($_REQUEST['id']))
                                            {
                                                $ss3 = "select rstatus from cz_role where uname='".$_REQUEST['id']."' and rname='".$ff1['mtitle']."'";
                                                $qq3 = mysqli_query($conn,$ss3);
                                                $ff3 = mysqli_fetch_array($qq3);
                                            }
                                           ?>
                                           <div class="dd-item col-md-4 col-lg-3 col-sm-6 " data-id="3">

                                              <div class="dd-handle">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" name="<?php echo $ff1['mtitle']; ?>" id="<?php echo $ff1['mtitle']; ?>"  class="custom-control-input check-item chk-main-menu<?php echo $ff['mid']; ?>" value="1" <?php if(isset($_REQUEST['id'])){ if(isset($ff3['rstatus']) && $ff3['rstatus'] == 1){ echo "checked"; }} ?> ><label class="custom-control-label control-label" for="<?php echo $ff1['mtitle']; ?>" > <?php echo $ff1['mname']; ?></label>
                                                </div>
                                                 
                                              </div>
                                           </div>
                                       <?php
                                        }
                                       ?>
                                       </div>
                                    </div>
                                  <?php } ?>  		
                                  <!-- </ol> -->
                                </div>
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
   <?php // } ?>
