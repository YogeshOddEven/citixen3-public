<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Radius Settings</li>
	</ol>
</div>

<div class="row">
     <div class="col-xl-12 col-lg-12">
          <div class="card shadow">
              <div class="card-body col-lg-8 offset-lg-2">
                    <?php include("message.php"); ?>
                    <form class="form-horizontal" method="post" action="process/action_setting.php" onsubmit="return add_setting()" enctype="multipart/form-data">
                	      <div class="col-sm-12">
                          <label for="firstname" class="control-label">Free User Near By Minimum Range</label>
                          <div class="form-group">
                            <input type="number" name="free_user_near_by_start_range" id="free_user_near_by_start_range" class="form-control" placeholder="Free User Near By Minimum Range" value="<?php echo get_admin_settings('free_user_near_by_start_range'); ?>">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <label for="firstname" class="control-label">Free User Near By Maximum Range</label>
                          <div class="form-group">
                            <input type="number" name="free_user_near_by_end_range" id="free_user_near_by_end_range" class="form-control" placeholder="Free User Near By Maximum Range" value="<?php echo get_admin_settings('free_user_near_by_end_range'); ?>">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <label for="firstname" class="control-label">Paid User Near By Minimum Range</label>
                          <div class="form-group">
                            <input type="number" name="paid_user_near_by_start_range" id="paid_user_near_by_start_range" class="form-control" placeholder="Paid User Near By Minimum Range" value="<?php echo get_admin_settings('paid_user_near_by_start_range'); ?>">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <label for="firstname" class="control-label">Paid User Near By Maximum Range</label>
                          <div class="form-group">
                            <input type="number" name="paid_user_near_by_end_range" id="paid_user_near_by_end_range" class="form-control" placeholder="Paid User Near By Maximum Range" value="<?php echo get_admin_settings('paid_user_near_by_end_range'); ?>">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <label for="firstname" class="control-label">Paid User Alert Minimum Range</label>
                          <div class="form-group">
                            <input type="number" name="paid_user_alert_start_range" id="paid_user_alert_start_range" class="form-control" placeholder="Paid User Alert Minimum Range" value="<?php echo get_admin_settings('paid_user_alert_start_range'); ?>">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <label for="firstname" class="control-label">Paid User Alert Maximum Range</label>
                          <div class="form-group">
                            <input type="number" name="paid_user_alert_end_range" id="paid_user_alert_end_range" class="form-control" placeholder="Paid User Alert Maximum Range" value="<?php echo get_admin_settings('paid_user_alert_end_range'); ?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-12">
                          <label for="firstname" class="control-label">Paid User Alert Default Range</label>
                          <div class="form-group">
                            <input type="number" name="paid_user_alert_default_range" id="paid_user_alert_default_range" class="form-control" placeholder="Paid User Alert Default Range" value="<?php echo get_admin_settings('paid_user_alert_default_range'); ?>">
                          </div>
                        </div>
                         
                         <div class="col-sm-12">
							              <label for="firstname" class="control-label">&nbsp;</label>
                            <div class="form-group">
							                <button type="submit" class="btn btn-primary">Submit Details <i class="icon-arrow-right14 position-right"></i></button>
						 	              </div> 
                         </div>
					          </form>                            
               </div>
           </div>
     </div>
</div>
