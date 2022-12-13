<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Vehicles Report</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php 
	        	$search_default_p_query="";

	        	include("search_bar_vehicle.php"); 
	        	if(isset($_REQUEST['search_status']) && $_REQUEST['search_status'])
	        	{
	        		$search_page_query.=" &search_status=".$_REQUEST['search_status'];
	        	}
	        	?>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
        		<div class="row col-sm-12">
        			<div class="col-sm-6">
						<h2 class=" mb-0">
							Vehicles Report Details
						</h2>
					</div>
					<div class="col-sm-6 text-right">
						<?php if(get_access('add_vehicle') == 1){?>
        				<!-- <a href="index.php?pid=add_vehicle<?php if(isset($_REQUEST['user_id'])){ echo "&user_id=".$_REQUEST['user_id'];} ?>" class="btn btn-sm btn-primary"> + Add Vehicle</a> -->
        			<?php } 
					if(!isset($search_page_query))
					{
						$search_page_query="";
					}
					?>
					<a href="excel/export_to_excel_view_all_vehicles.php<?php echo '?export_type=excel'.$search_page_query; ?>" class='btn btn-primary btn-sm float-right'>Export to Excel</a>
					</div>
				</div>
			</div>
			<div class="">
            	<?php include "message.php"; ?>
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Name</th>
                           <th>Owner</th>
                           <th>Reference Code</th>
                           <th>Vehicle Company</th>
                           <th>Vehicle Model</th>
                           <th>Vehicle Type</th>
                           <th>Vehicle State</th>
                           <th>Vehicle City</th>
                           <th>Vehicle Added Date</th>
                           
                           <th class="text-center">Status</th>
                           <th class="text-center" width="200">Actions</th>
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								include("pagination.php");
								if(!isset($search_vehicle_condition))
								{
									$search_vehicle_condition="";
								}
								if(!isset($page_query_inquiry))
								{
									$page_query_inquiry="";
								}
								//echo $page_query_inquiry;
								$current_page=$_REQUEST['pid'];

								
								$where=" category!='2' ";
								if(isset($_REQUEST['user_id']))
								{
									$where.=" AND user_id='".$_REQUEST['user_id']."' ";
								}
								if(isset($_REQUEST['search_status']) && $_REQUEST['search_status']!="")
								{
									$where.=" AND status='".$_REQUEST['search_status']."' ";
								}
								$admin_allowed_cities=GetSingleFieldDataFromTable("cz_login","city"," id='".$_SESSION['cz_admin_login_id']."' ",$is_stat_chk="0");								
								if($admin_allowed_cities!="")
								 {
								 	$city_list_arr=array();$city_name_arr=array();
								 	if(strpos($admin_allowed_cities, ",")!==false)
								 	{
								 		$city_list_arr=explode(",", $admin_allowed_cities);
								 	}else
								 	{
								 		$city_list_arr[0]=GetSingleFieldDataFromTable("cz_login","city"," id='".$_SESSION['cz_admin_login_id']."' ",$is_stat_chk="0");
								 	}
								 	
								 	/*if($admin_allowed_city_names!="")
								 	{
								 		$where.=" AND (city IN(".$admin_allowed_cities.") OR city IN(".$admin_allowed_city_names.") )";
								 	}else
								 	{*/
								 		// $where.=" AND city IN(".$admin_allowed_cities.") ";
								 	// }	
								 	
								 }
								$sel1 = "select * from cz_vehicle_details where ".$where." ".$search_vehicle_condition." order by id desc ";
								$res1= mysqli_query($conn,$sel1);
								$total_records = mysqli_num_rows($res1);
								$page = 1;
								if(isset($_POST['psize'])) {
									$size = (int)$_POST['psize'];
									$_SESSION['pagesize']= $size;
								} else if(isset($_SESSION['pagesize']) && $_SESSION['pagesize'] != ''){
									$size = $_SESSION['pagesize'];
								} else {
									$size = 10;
									$_SESSION['pagesize']= 10;
								}
								if (isset($_GET['page'])){
									$page = (int) $_GET['page'];
								}
								// create the pagination class
								$pagination_link="index.php?pid=".$current_page.$page_query_inquiry."&page=%s";
								/*if(isset($search_que) && $search_que!="")
								{
									$pagination_link="index.php?pid=view_all_inquiry&search=".$search_que."&page=%s";
								}*/
								$pagination = new Pagination();
								$pagination->setLink($pagination_link); 
								$pagination->setPage($page);
								$pagination->setSize($size);
								$pagination->setTotalRecords($total_records);  
								
								$query2 = $sel1.$pagination->getLimitSql();
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									$vehicle_details = GetConditionalDetailsFromTable("cz_vehicle_details"," id='".$fetch['id']."' ",$is_multiple="0","0");
									// print_r($fetch);
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
                                        <td><?php echo $fetch['name']; ?></td>

										<td><?php echo GetSingleFieldDataFromTable("cz_driver","fname"," cid='".$fetch['user_id']."' ",$is_stat_chk="0"); ?></td>
                                        
										
										<td><?php print_r(GetSingleFieldDataFromTable("cz_driver","reference_code"," cid='".$fetch['user_id']."' ",$is_stat_chk="0")); ?></td>

										<td><?php echo GetSingleFieldDataFromTable("cz_vehicle_company","name"," id='".$fetch['company']."' ",$is_stat_chk="0"); ?></td>

										<td><?php echo GetSingleFieldDataFromTable("cz_vehicle_model",$field="name","id='".$fetch['model']."'",$is_stat_chk="0"); ?></td>
                                        
										<td><?php echo GetSingleFieldDataFromTable("cz_vehicle_sub_category","name"," id='".$fetch['sub_category']."' ",$is_stat_chk="0"); ?></td>
										
										<td><?php echo GetSingleFieldDataFromTable("cz_state_details","name"," id='".$vehicle_details['state_id']."' ",$is_stat_chk="0"); ?></td>
										
										<td><?php echo GetSingleFieldDataFromTable("cz_distirct_details","name"," id='".$vehicle_details['city_id']."' ",$is_stat_chk="0"); ?></td>

										<td>
										<?php echo get_formating_date($vehicle_details['date_added'],'d-m-Y H:i a'); ?>
										</td>
                                        <td class="text-center">
                                        	<?php 
						                      // if($fetch['status'] == 1)
						                      // {
						                      //   ?><!-- <a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=0&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Active</a> --><?php
						                      // } else {
						                      //   ?><!-- <a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&status=1&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Inactive</a> --><?php
						                      // }

						                      if($fetch['status'] == 1)
						                      {
						                        ?><a href="#" class="btn btn-sm btn-success">Online</a><?php
						                      } else {
						                        ?><a href="#" class="btn btn-sm btn-danger">Offline</a><?php
						                      }
						                    ?>
						                    <?php
						                      if(isset($_REQUEST['status']) && isset($_REQUEST['id']))
						                      {
						                        $status = $_REQUEST['status'];
						                        $id = $_REQUEST['id'];
						                        mysqli_query($conn,"update cz_vehicle_details set status='".$status."' where id='".$id."'");
						                        header("location:index.php?pid=view_all_vehicles");
						                      }
						                    ?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
												<a href="index.php?pid=view_vehicle_detail&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
                                               
                                               
											</div>
											
										 </td>
									</tr>
									<?php	
									$i++;
								}
							  ?>	
						</tbody>
					</table>
                    <div class="border-top d-flex col-sm-12">
                        <div class="p-3">
                            <form action="#" method="post">
                                <select name="psize" class="form-control form-control-sm" onchange="this.form.submit()">
                                    <option <?php if($_SESSION['pagesize'] == 10) { echo 'selected="selected"'; } ?>>10</option>
                                    <option <?php if($_SESSION['pagesize'] == 20) { echo 'selected="selected"'; } ?>>20</option>
                                    <option <?php if($_SESSION['pagesize'] == 30) { echo 'selected="selected"'; } ?>>30</option>
                                    <option <?php if($_SESSION['pagesize'] == 50) { echo 'selected="selected"'; } ?>>50</option>
                                    <option <?php if($_SESSION['pagesize'] == 100) { echo 'selected="selected"'; } ?>>100</option>
                                    <option <?php if($_SESSION['pagesize'] == 200) { echo 'selected="selected"'; } ?>>200</option>
                                    <option <?php if($_SESSION['pagesize'] == 500) { echo 'selected="selected"'; } ?>>500</option>
                               </select>
                            </form>                
                        </div>
                        <div class="p-3 align-self-center">
                          <small class="text-muted inline m-t-small m-b-small"><?php echo 'Total Records : '.$total_records; ?></small>
                        </div>
                        <div class="p-3 justify-content-end">
                             <ul class="pagination justify-content-end mb-0">
                                <?php 
                                  $navigation = $pagination->create_links();
                                  echo $navigation;
                                ?>
                             </ul>  
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
