<div class="page-header mt-0 shadow p-3">
  <ol class="breadcrumb mb-sm-0">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Main Dashboard</li>
  </ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php 
	        	$search_page_query="";
				$search_user_condition=" WHERE cid>0 ";
        $search_crime_condition=" WHERE id>0 ";
	        	include("search_bar_dashboard.php"); ?>
            </div>
        </div>
    </div>
</div>
<br>

      <div class="row">
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_crimes">
             <div class="panel bg-primary">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fas fa-bell font40"></i> </div>
                <h3 class="no-margin"><?php echo CountTotalFromTable("cz_crime_details",$search_crime_condition); ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Crimes </label></div>
            </div>
         </a>
          <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_crimes&report_type=Victim">
             <div class="panel bg-primary">
              <div class="panel-body">
                <div class="heading-elements"> <i class="far fa-user font40"></i> </div>
                <h3 class="no-margin"><?php echo CountTotalFromTable("cz_crime_details",$search_crime_condition." AND report_type ='Victim'"); ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Victims</label></div>
            </div>
         </a>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_users">
             <div class="panel bg-primary">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php echo CountTotalFromTable("cz_users",$search_user_condition." AND status ='1'"); ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Active Users</label></div>
            </div>
         </a>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_users">
             <div class="panel bg-primary">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php echo CountTotalFromTable("cz_users",$search_user_condition." AND status !='1'"); ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Inactive Users</label></div>
            </div>
         </a>
<!--
         <?php if(get_access('rider') == 1){?>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_passengers">
             <div class="panel bg-blue-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /* echo CountTotalFromTable("cz_customers"," cid > 0");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Customers </label></div>
            </div>
         </a>
          <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_passengers&search_status=1">
             <div class="panel bg-success-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_customers"," cid > 0 AND status='1' ");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Active Customers</label></div>
            </div>
         </a>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_passengers&search_status=0">
             <div class="panel bg-danger-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_customers"," cid > 0 AND status!='1' ");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Inactive Customers</label></div>
            </div>
         </a>
         <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ">&nbsp;
         </div>
       <?php } ?>

         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_vehicles&search_status=0">
             <div class="panel bg-blue-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-car font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_vehicle_details"," id > 0 AND category='1' ");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Vehicle </label></div>
            </div>
         </a>
          <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_vehicles&search_status=0">
             <div class="panel bg-success-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-car font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_vehicle_details"," id > 0 AND category='1'  AND status='1' ");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Online Vehicle</label></div>
            </div>
         </a>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_vehicles&search_status=0">
             <div class="panel bg-danger-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-car font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_vehicle_details"," id > 0 AND category='1'  AND status='0' ");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Offline Vehicle</label></div>
            </div>
         </a>
         <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ">&nbsp;
         </div>

         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_all_drivers">
             <div class="panel bg-blue-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_ride_offers_details"," id > 0");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Drivers </label></div>
            </div>
         </a>
          <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_registered_drivers">
             <div class="panel bg-warning-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_ride_offers_details"," id > 0 AND status <='3'");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Registered Drivers</label></div>
            </div>
         </a>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_unverified_drivers">
             <div class="panel bg-success-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_ride_offers_details"," id > 0 AND status ='4'");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Unverified Drivers</label></div>
            </div>
         </a>
         <a class="col-xl-3 col-lg-4 col-md-6 col-sm-6 " href="index.php?pid=view_unverified_document_drivers">
             <div class="panel bg-danger-400">
              <div class="panel-body">
                <div class="heading-elements"> <i class="fa fa-users font40"></i> </div>
                <h3 class="no-margin"><?php /*echo CountTotalFromTable("cz_ride_offers_details"," id > 0 AND status >'4'");*/ ?></h3>
                <label style="margin-top: 15px;font-size:16px;">Total Vehicle Pending Drivers</label></div>
            </div>
         </a>
         
         
     </div>
  
<br>
         -->




