<?php
  $display_label="Crime Type Fields";
  if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
  {
    $category_name=GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$_REQUEST['type']."' ",$is_stat_chk="0");
    $category_name=str_replace("_"," ",$category_name);
    $category_name=str_replace("-"," ",$category_name);
    $category_name=ucwords($category_name);
    $display_label=$category_name." Fields";
    

  }
?>
<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $display_label;?></li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0"><?php echo $display_label;?> Details</h2>
			</div>
			<div class="card-body">
            	<div class="table-responsive">
					<table id="datatable" class="table card-table table-vcenter text-nowrap align-items-center">
						<thead class="thead-light">
						<tr>
                <th class="text-center">#</th>
                <th>Display Name</th>
                <th>Field Name</th>
                <th>Spanish Name</th>
                <th>Field Type</th>
                <!-- <th>Default Value</th> -->
                <?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){}else{?>
                <th>Crime Type</th>
                <?php } ?>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
           </tr>
						</thead>
						<tbody>
							<?php
                $check_cond="";
                if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
                {
                  $check_cond=" WHERE type='".$_REQUEST['type']."' ";
                }
								$query2 = "SELECT * from cz_crime_type_fields $check_cond order by id desc";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
                $return_url="../index.php?pid=".$_REQUEST['pid'];
                if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){$return_url.= "&type=".$_REQUEST['type'];}
								while($fetch = mysqli_fetch_array($query))
								{
                  
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo $fetch['display_name']; ?></td>
										<td><?php echo $fetch['field_name']; ?></td>
										<td><?php echo $fetch['spanish_name']; ?></td>
										<td><?php echo $fetch['field_type']; ?></td>
										<!-- <td><?php echo $fetch['default_value']; ?></td> -->
                    	
                    <?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){}else{?>
                    <td><?php echo GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$fetch['type']."' ",$is_stat_chk="0"); ?></td>
                    <?php } ?>
                    <td class="text-center">
                    <?php 
                      if($fetch['status'] == 1)
                      {
                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=0&id_category=<?php echo $fetch['id']; ?><?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){echo "&type=".$_REQUEST['type'];} ?>" class="btn btn-sm btn-success">Active</a><?php
                      } else {
                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=1&id_category=<?php echo $fetch['id']; ?><?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){echo "&type=".$_REQUEST['type'];} ?>" class="btn btn-sm btn-danger">Inactive</a><?php
                      }
                    ?>
                    </td>
                    <?php
                      if(isset($_REQUEST['status']) && isset($_REQUEST['id_category']))
                      {
                        $status = $_REQUEST['status'];
                        $id_category = $_REQUEST['id_category'];
                        mysqli_query($conn,"update cz_crime_type_fields set status='".$status."' where id='".$id_category."'");
                        if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
                        {
                          header("location:index.php?pid=".$_REQUEST['pid']."&type=".$_REQUEST['type']);
                        }else
                        {
                          header("location:index.php?pid=".$_REQUEST['pid']);
                        }
                      }
                    ?>
										<td align="center">
                      <div class="btn-group mb-0">
                      <?php if(get_access('add_crime_type_fields') == 1){?>
                          <a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $fetch['id']; ?><?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){echo "&type=".$_REQUEST['type'];} ?>" class="btn btn-sm btn-default">
                            <i class="fas fa-edit"></i>
                          </a>
                      <?php } ?>
                      <?php if(get_access('remove_crime_type_fields') == 1){?>  
                          <a href="#delete<?php echo $fetch['id']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                      <?php }?>    
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
                                  <a href="process/delete_crime_type_fields.php?id=<?php echo $fetch['id']; ?>&return_url=<?php echo $return_url; ?>" class="btn btn-danger btn-xs">Delete</a>
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
	if(get_access('add_crime_type_fields') == 1)
	{
		?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?php if(isset($_REQUEST['id'])){echo "Update ";}else{echo "Add ";} ?><?php echo $display_label;?></h2>
                </div>
                <div class="card-body">
                  <?php include("message.php"); ?>
                  <?php
                     if(isset($_REQUEST['id']))
                     {
                      $select = "SELECT * from cz_crime_type_fields where id='".$_REQUEST['id']."'";
                      $query = mysqli_query($conn,$select);
                      $fetch = mysqli_fetch_array($query);
                     }
                   ?>
	                <form class="form-horizontal validate-form" data-err_msg_ele="help" method="post" action="process/action_crime_type_fields.php" onsubmit="return add_brand()" enctype="     multipart/form-data">
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Field Name</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="field_name" id="field_name" class="form-control" data-is_validate="0" placeholder="Field Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['field_name']; } ?>">
						              <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Display Name</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="display_name" id="display_name" class="form-control" data-is_validate="1" placeholder="Display Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['display_name']; } ?>">
						              <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Spanish Name</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="spanish_name" id="spanish_name" class="form-control" data-is_validate="1" placeholder="Spanish Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['spanish_name']; } ?>">
						              <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   
                   <input type="hidden" value="<?php echo $return_url; ?>" name="return_url" />
                   <?php if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
                   {?>
                      <input type="hidden" name="type" id="type" value="<?php echo $_REQUEST['type']; ?>" />
                    <?php
                   }else
                   {

                   ?>
                   <div class="col-sm-12">
                      <label for="gst" class="control-label">Crime Type</label>
                      <div class="col-sm-6 form-group">
                          <select class="form-control select2"  data-is_validate="1" name="type" id="type">
                             <option value="">Select Crime Type</option>
                             <?php
                             $type_list=GetConditionalDetailsFromTable("cz_crime_type"," status='1' ","1");
                              if(isset($type_list) && count($type_list)>0)
                              {
                                for($i=0;$i<count($type_list); $i++)
                                {
                                  $selected_catgory="";
                                  if(isset($_REQUEST['id']) && $fetch['type']==$type_list[$i]['id'])
                                  {
                                    $selected_catgory="selected";
                                  }
                                  if(isset($type_list[$i]['id']) && $type_list[$i]['id']!="")
                                  {
                                    echo '<option value="'.$type_list[$i]['id'].'" '.$selected_catgory.'>'.$type_list[$i]['name'].'</option>';
                                  }
                                }
                              }
                             ?>
                              
                           </select>
                          <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <?php } ?>
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Field Type</label>
                      <div class="col-sm-12 form-group">
                          <select class="form-control select2"  data-is_validate="1" name="field_type" id="field_type">
                             <option value="">Select Field Type</option>
                             <?php
                             $field_type_list=array("text","textarea","radio","checkbox","dropdown","file_upload");
                              if(isset($field_type_list) && count($field_type_list)>0)
                              {
                                for($i=0;$i<count($field_type_list); $i++)
                                {
                                  $selected_catgory="";
                                  if(isset($_REQUEST['id']) && $fetch['field_type']==$field_type_list[$i])
                                  {
                                    $selected_catgory="selected";
                                  }
                                  if(isset($field_type_list[$i]) && $field_type_list[$i]!="")
                                  {
                                    echo '<option value="'.$field_type_list[$i].'" '.$selected_catgory.'>'.$field_type_list[$i].'</option>';
                                  }
                                }
                              }
                             ?>
                              
                           </select>
                          <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Value Type</label>
                      <div class="col-sm-12 form-group">
                          <select class="form-control select2"  data-is_validate="1" name="value_type" id="value_type">
                             <option value="">Select Value Type</option>
                             <?php
                             $value_type_list=array("dynamic","manual");
                              if(isset($value_type_list) && count($value_type_list)>0)
                              {
                                for($i=0;$i<count($value_type_list); $i++)
                                {
                                  $selected_catgory="";
                                  if(isset($_REQUEST['id']) && $fetch['value_type']==$value_type_list[$i])
                                  {
                                    $selected_catgory="selected";
                                  }
                                  if(isset($value_type_list[$i]) && $value_type_list[$i]!="")
                                  {
                                    echo '<option value="'.$value_type_list[$i].'" '.$selected_catgory.'>'.$value_type_list[$i].'</option>';
                                  }
                                }
                              }
                             ?>
                              
                           </select>
                          <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Default Value</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="default_value" id="default_value" class="form-control" data-is_validate="0" placeholder="Default Value" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['default_value']; } ?>">
						              <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Default Value Spanish </label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="default_value_spanish" id="default_value_spanish" class="form-control" data-is_validate="0" placeholder="Default Value Spanish" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['default_value_spanish']; } ?>">
                          <span class="help" id="msg1"></span>
                      </div>
                   </div>

                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Option Values</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="option_value" id="option_value" class="form-control" data-is_validate="0" placeholder="Option Values" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['option_value']; } ?>">
						              <span class="help" id="msg1"></span>
                      </div>
                   </div>

                   <div class="col-sm-6">
                      <label for="gst" class="control-label">Option Values Spanish</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="option_value_spanish" id="option_value_spanish" class="form-control" data-is_validate="0" placeholder="Option Values Spanish" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['option_value_spanish']; } ?>">
                          <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <div class="col-sm-12">
                      <label for="firstname" class="control-label">&nbsp;</label>
                      <div class="form-group">
                         <?php
                            if(isset($_REQUEST['id']))
                            {
                              ?><input type="hidden" name="id" value="<?php echo $fetch['id']; ?>" /><?php
                            }
                            ?>
                         <button type="submit" class="btn btn-primary">Submit Details <i class="icon-arrow-right14 position-right"></i></button>
                      </div>
                   </div>

                </form>
              </div>
          </div>
        </div>
	</div>
   <?php } ?>
