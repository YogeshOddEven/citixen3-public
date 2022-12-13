<?php
  $display_label="Crime Type Category";
  if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
  {
    $category_name=GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$_REQUEST['type']."' ",$is_stat_chk="0");
    $category_name=str_replace("_"," ",$category_name);
    $category_name=str_replace("-"," ",$category_name);
    $category_name=ucwords($category_name);
    $display_label=$category_name." | ";
    // if($category_name=="Fire"){$display_label="Property Types";}
    // if($category_name=="Sexual Abuse"){$display_label="Sexual Abuse Victim Types";}
    // if($category_name=="Domestic Violence"){$display_label="Domestic Violence Victim Types";}
    // if($category_name=="Terrorism"){$display_label="Disturbance Types";}
    // if($category_name=="Fraud"){$display_label="Fraud Types";}
    // if($category_name=="Vandalism"){$display_label="Vandalism Types";}

  }
  if(isset($_REQUEST['field']) && $_REQUEST['field']!="")
  {
    $field_name=GetSingleFieldDataFromTable("cz_crime_type_fields","field_name"," id='".$_REQUEST['field']."' ",$is_stat_chk="0");
    if(isset($_REQUEST['type']) && $_REQUEST['type']!="")
    {
      $display_label.=$field_name;
    }
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
                <th>Name</th>
                <th>Spanish Name</th>
                <?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){}else{?>
                <th>Crime Type</th>
                <?php } ?>
                <?php if(isset($_REQUEST['field']) && $_REQUEST['field']!=""){}else{?>
                <th>Field Type</th>
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
                  $check_cond.=" WHERE type='".$_REQUEST['type']."' ";
                }
                if(isset($_REQUEST['field']) && $_REQUEST['field']!="")
                {
                  $check_cond.=" AND field_id='".$_REQUEST['field']."' ";
                }

								$query2 = "SELECT * from cz_crime_type_category $check_cond order by id desc";
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
                $return_url="../index.php?pid=".$_REQUEST['pid'];
                if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){$return_url.= "&type=".$_REQUEST['type'];}
                if(isset($_REQUEST['field']) && $_REQUEST['field']!=""){$return_url.= "&field=".$_REQUEST['field'];}
								while($fetch = mysqli_fetch_array($query))
								{
                  
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										<td><?php echo $fetch['name']; ?></td>
										<td><?php echo $fetch['spanish_name']; ?></td>
                    <?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){}else{?>
                    <td><?php echo GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$fetch['type']."' ",$is_stat_chk="0"); ?></td>
                    <?php } ?>
                    <td class="text-center">
                    <?php 
                      if($fetch['status'] == 1)
                      {
                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=0&id_category=<?php echo $fetch['id']; ?><?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){echo "&type=".$_REQUEST['type'];} ?><?php if(isset($_REQUEST['field']) && $_REQUEST['field']!=""){echo "&field=".$_REQUEST['field'];} ?>" class="btn btn-sm btn-success">Active</a><?php
                      } else {
                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=1&id_category=<?php echo $fetch['id']; ?><?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){echo "&type=".$_REQUEST['type'];} ?><?php if(isset($_REQUEST['field']) && $_REQUEST['field']!=""){echo "&field=".$_REQUEST['field'];} ?>" class="btn btn-sm btn-danger">Inactive</a><?php
                      }
                    ?>
                    </td>
                    <?php
                      if(isset($_REQUEST['status']) && isset($_REQUEST['id_category']))
                      {
                        $status = $_REQUEST['status'];
                        $id_category = $_REQUEST['id_category'];
                        mysqli_query($conn,"update cz_crime_type_category set status='".$status."' where id='".$id_category."'");
                        if(isset($_REQUEST['type']) && $_REQUEST['type']!="" && isset($_REQUEST['field']) && $_REQUEST['field']!="")
                        {
                          header("location:index.php?pid=".$_REQUEST['pid']."&type=".$_REQUEST['type']."&field=".$_REQUEST['field']);
                        }else
                        {
                          header("location:index.php?pid=".$_REQUEST['pid']);
                        }
                      }
                    ?>
										<td align="center">
                      <div class="btn-group mb-0">
                      <?php if(get_access('add_crime_type_values') == 1){?>
                          <a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $fetch['id']; ?><?php if(isset($_REQUEST['type']) && $_REQUEST['type']!=""){echo "&type=".$_REQUEST['type'];} ?><?php if(isset($_REQUEST['field']) && $_REQUEST['field']!=""){echo "&field=".$_REQUEST['field'];} ?>" class="btn btn-sm btn-default">
                            <i class="fas fa-edit"></i>
                          </a>
                        <?php }?>
                        <?php if(get_access('remove_crime_type_values') == 1){?>
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
                                  <a href="process/delete_crime_type_category.php?id=<?php echo $fetch['id']; ?>&return_url=<?php echo $return_url; ?>" class="btn btn-danger btn-xs">Delete</a>
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
	if(get_access('add_crime_type_values') == 1)
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
                      $select = "select * from cz_crime_type_category where id='".$_REQUEST['id']."'";
                      $query = mysqli_query($conn,$select);
                      $fetch = mysqli_fetch_array($query);
                     }
                   ?>
	                <form class="form-horizontal validate-form" data-err_msg_ele="help" method="post" action="process/action_crime_type_category.php" onsubmit="return add_brand()" enctype="     multipart/form-data">
                    <div class="col-sm-6">
                      <label for="gst" class="col-md-12 control-label">Category Name</label>
                      <div class="col-sm-12 form-group">
                         <input type="text" name="name" id="name" class="form-control" data-is_validate="1" placeholder="Category" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['name']; } ?>">
						              <span class="help" id="msg1"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="col-md-12 control-label">Spanish Name</label>    
                            <div class="col-md-12">
                              <input type="text" class="form-control"  data-is_validate="1" placeholder="Spanish Name" name="spanish_name" id="spanish_name" <?php if(isset($_REQUEST['id'])){ echo "value='".$fetch['spanish_name']."'"; }?>>
                              <span class="help" id="msg1"></span>
                            </div>
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
                   <?php if(isset($_REQUEST['field']) && $_REQUEST['field']!="")
                   {?>
                      <input type="hidden" name="field_id" id="field_id" value="<?php echo $_REQUEST['field']; ?>" />
                    <?php
                   }else
                   {

                   ?>
                   <div class="col-sm-12">
                      <label for="gst" class="control-label">Crime Field</label>
                      <div class="col-sm-6 form-group">
                          <select class="form-control select2"  data-is_validate="1" name="field_id" id="field_id">
                             <option value="">Select Crime Field</option>
                             <?php
                             $field_id_list=GetConditionalDetailsFromTable("cz_crime_type_fields"," status='1' ","1");
                              if(isset($field_id_list) && count($field_id_list)>0)
                              {
                                for($i=0;$i<count($field_id_list); $i++)
                                {
                                  $selected_catgory="";
                                  if(isset($_REQUEST['id']) && $fetch['field_id']==$field_id_list[$i]['id'])
                                  {
                                    $selected_catgory="selected";
                                  }
                                  if(isset($field_id_list[$i]['id']) && $field_id_list[$i]['id']!="")
                                  {
                                    echo '<option value="'.$field_id_list[$i]['id'].'" '.$selected_catgory.'>'.$field_id_list[$i]['field_name'].'</option>';
                                  }
                                }
                              }
                             ?>
                              
                           </select>
                          <span class="help" id="msg1"></span>
                      </div>
                   </div>
                   <?php } ?>
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
   <?php  } ?>
