<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php if(isset($_REQUEST['id'])){ echo "Update "; }else{ echo "Add "; }  ?>Notification</li>
	</ol>
</div>

<div class="row">
     <div class="col-xl-12 col-lg-12">
          <div class="card shadow">
              <div class="card-body col-lg-12 ">
                    <?php include("message.php"); ?>
                    <?php
						if(isset($_REQUEST['id']))
						{
							// $select = "select * from cz_vehicle_details where id='".$_REQUEST['id']."'";
							// $query = mysqli_query($conn,$select);
							// $fetch = mysqli_fetch_array($query);
						}
					?>
                    <form class="form-horizontal validate-form" data-err_msg_ele="help"  method="post" action="process/action_notification.php"  enctype="multipart/form-data">
                      <div class="col-sm-6">
                        <label for="gst" class="control-label">Driver</label>
                        <div class="form-group">
                            <select class="form-control select2" data-placeholder="Select Drivers" data-is_validate="0" multiple="multiple" name="driver_id[]" id="driver_id">
                               <option value="">All Drivers</option>
                               <?php
                               $driver_list=GetConditionalDetailsFromTable("cz_driver","","1");
                                if(isset($driver_list) && count($driver_list)>0)
                                {
                                  for($i=0;$i<count($driver_list); $i++)
                                  {
                                    $selected_catgory="";
                                    if(!isset($_REQUEST['id']))
                                    {
                                      if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']==$driver_list[$i]['cid'])
                                      {
                                        $selected_catgory="selected";
                                      }  
                                    }else
                                    {
                                      if(isset($fetch['user_id']) && $fetch['user_id']==$driver_list[$i]['cid'])
                                      {
                                        $selected_catgory="selected";
                                      }   
                                    }
                                    
                                    if(isset($driver_list[$i]['cid']) && $driver_list[$i]['cid']!="")
                                    {
                                      echo '<option value="'.$driver_list[$i]['cid'].'" '.$selected_catgory.' >'.$driver_list[$i]['fname'].'</option>';
                                    }
                                  }
                                }
                               ?>
                                
                             </select>
                            <span class="help" id="msg1"></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label for="gst" class="control-label">Riders</label>
                        <div class="form-group">
                            <select class="form-control select2" data-placeholder="Select Riders"  multiple="multiple"  data-is_validate="0" name="rider_id[]" id="rider_id">
                               <option value="" >All Riders</option>
                               <?php
                               $driver_list=GetConditionalDetailsFromTable("cz_customers","","1");
                                if(isset($driver_list) && count($driver_list)>0)
                                {
                                  for($i=0;$i<count($driver_list); $i++)
                                  {
                                    $selected_catgory="";
                                    if(!isset($_REQUEST['id']))
                                    {
                                      if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']==$driver_list[$i]['cid'])
                                      {
                                        $selected_catgory="selected";
                                      }  
                                    }else
                                    {
                                      if(isset($fetch['user_id']) && $fetch['user_id']==$driver_list[$i]['cid'])
                                      {
                                        $selected_catgory="selected";
                                      }   
                                    }
                                    
                                    if(isset($driver_list[$i]['cid']) && $driver_list[$i]['cid']!="")
                                    {
                                      echo '<option value="'.$driver_list[$i]['cid'].'" '.$selected_catgory.' >'.$driver_list[$i]['fname'].'</option>';
                                    }
                                  }
                                }
                               ?>
                                
                             </select>
                            <span class="help" id="msg1"></span>
                        </div>
                      </div>

                        <div class="col-md-6 col-sm-12" style="margin-bottom: 15px;">
                          <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" name="is_send_rider" id="is_send_rider"  class="custom-control-input" value="1" <?php echo "checked";  ?> ><label class="custom-control-label control-label" for="is_send_rider" > Send To Riders</label>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12" style="margin-bottom: 15px;">
                          <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" name="is_send_driver" id="is_send_driver"  class="custom-control-input" value="1" <?php echo "checked";  ?> ><label class="custom-control-label control-label" for="is_send_driver" > Send To Drivers</label>
                          </div>
                        </div>
                	     
                         
                         
                          <div class="col-sm-6">
                               <label for="firstname" class="control-label">Notification Title</label>
                               <div class="form-group">
                                <input type="text" name="title" data-is_validate="1"  id="title" class="form-control" placeholder="Notification Title" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['title']; } ?>">
                                <span class="help" id="msg1"></span>
                               </div>
                          </div>
                          <div class="col-sm-6">
                               <label for="firstname" class="control-label">Notification Description</label>
                               <div class="form-group">
                                <textarea name="descripiton" data-is_validate="1"  id="descripiton" class="form-control" placeholder="Notification Description" ><?php if(isset($_REQUEST['id'])){ echo $fetch['descripiton']; } ?></textarea>
                                <span class="help" id="msg1"></span>
                               </div>
                          </div>
                         
                         
                         <div class="col-sm-12">
							              <label for="firstname" class="control-label">&nbsp;</label>
                            <div class="form-group">
                            <?php
								              if(isset($_REQUEST['id']))
								              { ?>
                                <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>" />
                            <?php
								              } 
                              ?>
							                <button type="submit" class="btn btn-primary">Send Notifications <i class="icon-arrow-right14 position-right"></i></button>
						 	              </div> 
                         </div>
					            </form>                            
               </div>
           </div>
     </div>
</div>
