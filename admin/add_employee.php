<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Admin User</li>
	</ol>
</div>

<div class="row">
     <div class="col-xl-12 col-lg-12">
          <div class="card shadow">
              <div class="card-body col-lg-8 offset-lg-2">
                    <?php include("message.php"); ?>
                    <?php
						if(isset($_REQUEST['id']))
						{
							$select = "select * from cz_login where id='".$_REQUEST['id']."'";
							$query = mysqli_query($conn,$select);
							$fetch = mysqli_fetch_array($query);
						}
					?>
                    <form class="form-horizontal validate-form" data-err_msg_ele="help"  method="post" action="process/action_employee.php"  enctype="multipart/form-data">
                	     <div class="col-sm-6">
                               <label for="firstname" class="control-label">First Name</label>
                               <div class="form-group">
                                <input type="text" name="fname" id="fname" data-is_validate="1"  class="form-control" placeholder="First Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['fname']; } ?>">
                                <span class="help" id="msg3"></span>
                               </div>

                         </div>
                         <div class="col-sm-6">
                               <label for="firstname" class="control-label">Last Name</label>
                               <div class="form-group">
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['lname']; } ?>">
                               </div>
                         </div>
                         <input type="hidden" id="is_unique_uname" value="1" data-is_numeric="1" data-is_validate="1" data-error_msg="This Username Already Exists"  data-focus-ele="aname">
                         <input type="hidden" id="is_unique_email" data-is_validate="1" data-is_numeric="1" data-error_msg="This Email Id Already Exists" data-focus-ele="emailid" value="1">
                         <div class="col-sm-6">
                           <label for="firstname" class="control-label">User Name</label>
                           <div class="form-group">
	                            <input type="text" name="aname" id="aname" data-is_validate="1"  class="form-control" placeholder="User Name" data-msg-field="Please Enter Valid Username" data-validate-other="is_unique_uname" onkeyup="CheckUnique(this,is_unique_uname);" data-chk='<?php echo base64_encode("aname@#%cz_login");?>' data-old_ele="<?php if(isset($fetch['aname'])){echo $fetch['aname'];}?>" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['aname']; } ?>">
                                <span class="help" id="msg3"></span>
                           </div>    
                         </div>
                         <div class="col-sm-6">
                           <label for="firstname" class="control-label">Email ID</label>
                           <div class="form-group">
                              <input type="text" name="emailid" id="emailid"  data-is_validate="0"  class="form-control" placeholder="Email ID" data-validate-other="is_unique_email" onkeyup="CheckUnique(this,is_unique_email);" data-chk='<?php echo base64_encode("emailid@#%cz_login");?>' data-old_ele="<?php if(isset($fetch['emailid'])){echo $fetch['emailid'];}?>"  value="<?php if(isset($_REQUEST['id'])){ echo $fetch['emailid']; } ?>">
                                <span class="help" id="msg3"></span>
                           </div>    
                         </div>
                         <div class="col-sm-12">
                           <label for="firstname" class="control-label">Password</label>
                               
                           <div class="input-group mb-3">
                            <input type="password" name="password"  data-is_validate="1" id="password" class="form-control" placeholder="Password" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['password']; } ?>">
                            
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" onclick="ShowPassword(password,this);" type="button"><i class="fas fa-eye"></i></button>
                            </div>
                            <span class="help" style="position: absolute;bottom: -23px;" id="msg3"></span>
                          </div>
                          <span class="help" id="msg3"></span>
                         </div>
                         <div class="col-sm-12" style="margin-top: 15px;">
                           <label for="firstname" class="control-label">Mobile No</label>
                           <div class="form-group">
                              <input type="tel" name="mobile" id="mobile" data-is_check_change="1"  data-is_validate="1" class="form-control" placeholder="Mobile" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['mobile']; } ?>">
                                <span class="help" id="msg2"></span>
                           </div>    
                         </div>
                         <div class="col-sm-12">
							               <label for="firstname" class="control-label">Photo</label>
                            <div class="form-group">
              								<div class="media no-margin-top">
              									<div class="thumbnail">
              										<a href="#">
                                    <?php
              										   if(isset($_REQUEST['id']))
              										   {
              											   if($fetch['photo'] != "")
              											   {
              												 ?><img src="img/<?php echo $clogo; ?>" style="height: 150px;border-radius: 2px;" alt=""><?php
              											   } else {
              												 ?><img src="img/user.png" style="width: 150px;height: 150px;border-radius: 2px;" alt=""><?php  
              											   }
              											   ?><input type="hidden" name="oldlogo" value="<?php echo $fetch['photo']; ?>" /><?php
              										   }
              										  ?>
                                  </a>
              									</div>
              									<div class="media-body">
              										<input type="file" name="clogo" id="clogo" class="form-control">
                                  <span class="help" id="msg4"></span>
              									</div>
              								</div>
              							</div>
                         </div>
                         <div class="col-sm-12">
                         	<label for="firstname" class="control-label">Admin User Role</label>
                            <div class="form-group">
                               <select class="form-control select2"  data-is_validate="1" name="role" id="role">
                                 <option value="">Select Role</option>
                                 <?php
                                  $query2 = "select uname from cz_role group by uname order by uname asc";
                                  $query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
                                  
                                    while ($fetch_role = mysqli_fetch_array($query)) 
                                    {
                                      $selected_role="";
                                      if(isset($_REQUEST['id']) && $fetch['urole']==$fetch_role['uname'])
                                      {
                                        $selected_role="selected";
                                      }
                                      if(isset($fetch_role['uname']) && $fetch_role['uname']!="")
                                      {
                                        echo '<option value="'.$fetch_role['uname'].'" '.$selected_role.'>'.$fetch_role['uname'].'</option>';
                                      }
                                    }
                                  
                                 ?>
                                  
                               </select>
                               <span class="help" id="msg10"></span>
                           </div>
                         </div>
                         <div class="col-sm-12" style="display: none;">
                               <label for="firstname" class="control-label">City</label>
                               <div class="form-group">
                                <select class="form-control select2"  data-is_validate="0" name="city[]" multiple="" id="city" data-selected-attr="selected_district" onchange="">
                                  <option value="">Select City</option>
                                  <?php
                                     /*$district_list=GetConditionalDetailsFromTable("cz_distirct_details"," status='1' ","1");
                                      if(isset($district_list) && count($district_list)>0)
                                      {
                                        for($i=0;$i<count($district_list); $i++)
                                        {
                                          $selected_catgory="";
                                          if(isset($_REQUEST['id']) )
                                          {
                                            // $fetch['state_id']==$district_list[$i]['id']
                                            $sle_st_Arr=array();
                                            if(strpos($fetch['city'], ",")!==false)
                                            {
                                              $sle_st_Arr=explode(",", $fetch['city']);
                                            }else
                                            {
                                              $sle_st_Arr[0]=$fetch['city'];
                                            }
                                            if(in_array($district_list[$i]['id'], $sle_st_Arr))
                                            {
                                              $selected_catgory="selected";  
                                            }
                                            
                                          }
                                          if(isset($district_list[$i]['id']) && $district_list[$i]['id']!="")
                                          {
                                            echo '<option value="'.$district_list[$i]['id'].'" '.$selected_catgory.'>'.$district_list[$i]['name'].'</option>';
                                          }
                                        }
                                      }*/
                                     ?>
                                </select>
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
