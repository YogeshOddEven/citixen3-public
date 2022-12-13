<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add User</li>
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
							$select = "select * from cz_users where cid='".$_REQUEST['id']."'";
							$query = mysqli_query($conn,$select);
							$fetch = mysqli_fetch_array($query);
						}
					?>
                    <form class="form-horizontal validate-form" data-err_msg_ele="help"  method="post" action="process/action_user.php"  enctype="multipart/form-data">
                	     <div class="col-sm-6">
                               <label for="firstname" class="control-label">First Name</label>
                               <div class="form-group">
                                <input type="text" name="fname" id="fname" data-is_validate="1"  class="form-control datepicker" placeholder="First Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['fname']; } ?>">
                                <span class="help" id="msg3"></span>
                               </div>

                         </div>
                         <div class="col-sm-6">
                               <label for="firstname" class="control-label">Last Name</label>
                               <div class="form-group">
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['lname']; } ?>">
                               </div>
                         </div>
                         
                         <input type="hidden" id="is_unique_email" data-is_validate="1" data-is_numeric="1" data-error_msg="This Email Id Already Exists" data-focus-ele="emailid" value="1">
                         
                         <div class="col-sm-6">
                           <label for="firstname" class="control-label">Email ID</label>
                           <div class="form-group">
                              <input type="text" name="emailid" id="emailid"  data-is_validate="0"  class="form-control" placeholder="Email ID" data-validate-other="is_unique_email" onkeyup="CheckUnique(this,is_unique_email);" data-chk='<?php echo base64_encode("emailid@#%cz_login");?>' data-old_ele="<?php if(isset($fetch['emailid'])){echo $fetch['emailid'];}?>"  value="<?php if(isset($_REQUEST['id'])){ echo $fetch['emailid']; } ?>">
                                <span class="help" id="msg3"></span>
                           </div>    
                         </div>
                          <div class="col-sm-6" >
                            <label for="firstname" class="control-label">Mobile No</label>
                            <div class="form-group">
                                <input type="tel" name="mobile" id="mobile" data-is_check_change="1"  data-is_validate="1" class="form-control" placeholder="Mobile" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['mobile']; } ?>">
                                  <span class="help" id="msg2"></span>
                            </div>    
                          </div>
                          <div class="col-sm-6">
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
                          <div class="col-sm-6" >
                            <label for="firstname" class="control-label">Maternal Last Name</label>
                            <div class="form-group">
                                <input type="text" name="pname" id="pname"  class="form-control" placeholder="Maternal Last Name" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['pname']; } ?>">
                                  <span class="help" id="msg2"></span>
                            </div>    
                          </div>

                          <div class="col-sm-6" >
                            <label for="firstname" class="control-label">Country</label>
                            <div class="form-group">
                                <input type="text" name="country" id="country"  class="form-control" placeholder="Country" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['country']; } ?>">
                                  <span class="help" id="msg2"></span>
                            </div>    
                          </div>
                          <div class="col-sm-6" >
                            <label for="firstname" class="control-label">State</label>
                            <div class="form-group">
                                <input type="text" name="state" id="state"  class="form-control" placeholder="State" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['state']; } ?>">
                                  <span class="help" id="msg2"></span>
                            </div>    
                          </div>

                          <div class="col-sm-6" >
                            <label for="firstname" class="control-label">City</label>
                            <div class="form-group">
                                <input type="text" name="city" id="city"  class="form-control" placeholder="City" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['city']; } ?>">
                                  <span class="help" id="msg2"></span>
                            </div>    
                          </div>
                          <div class="col-sm-6" >
                            <label for="firstname" class="control-label">Zipcode</label>
                            <div class="form-group">
                                <input type="text" name="zipcode" id="zipcode"  class="form-control" placeholder="Zipcode" value="<?php if(isset($_REQUEST['id'])){ echo $fetch['zipcode']; } ?>">
                                  <span class="help" id="msg2"></span>
                            </div>    
                          </div>
                          <div class="col-sm-12" >
                            <label for="firstname" class="control-label">Address</label>
                            <div class="form-group">
                                <textarea name="address" id="address"  class="form-control" placeholder="Address" >
                                <?php if(isset($_REQUEST['id'])){ echo stripslashes($fetch['address']); } ?>
                                </textarea>
                                  <span class="help" id="msg2"></span>
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
