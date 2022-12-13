<?php
if(!isset($search_ride_condition))
{
	$search_ride_condition="";
}
if(isset($_REQUEST['pid']) && $_REQUEST['pid']=="view_active_rides")
{
	$search_ride_condition.=" AND status >= '0' AND status < '4' ";
	$disp_page_label=" Active/Ongoing ";
}
elseif(isset($_REQUEST['pid']) && $_REQUEST['pid']=="view_completed_rides")
{
	$search_ride_condition.=" AND status = '4' ";	
	$disp_page_label=" Completed ";
}
elseif(isset($_REQUEST['pid']) && $_REQUEST['pid']=="view_cancelled_rides")
{
	$search_ride_condition.=" AND status = '5' ";	
	$disp_page_label=" Cancelled ";
}else
{
	$disp_page_label=" All ";
}

?>

<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"> Rides Report</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php include("search_bar_rides.php"); ?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">
					 
					Rides Report Details
					<?php 
					if(!isset($search_page_query))
					{
						$search_page_query = "";
					}
					?>
					<a href="excel/export_to_excel_view_all_rides.php<?php echo '?export_type=excel'.$search_page_query; ?>" class='btn btn-primary btn-sm float-right'>Export to Excel</a>
				</h2>
			</div>
			<div class="">
            	<?php include "message.php"; ?>
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Ride Code</th>
                           <th>Source</th>
                           <th>Destination</th>
                           <th>Ride Created For</th>
                           <th>Ride for Mobile Number</th>
                           <th>Driver ID</th>
                           <th>Car</th>
                           <th>Payment Mode</th>
                           <th>Ride Date & Time</th>
                           
                           
                           
                           <th>Price</th>
                           <th class="text-center">Status</th>
                           <th class="text-center" width="200">Actions</th>
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								include("pagination.php");
								
								if(!isset($search_page_query))
								{
									$search_page_query="";
								}
								//echo $search_page_query;
								$current_page=$_REQUEST['pid'];

								
								
								$where=" id>0 ";
								$where_city="";
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
								 	for ($cli=0; $cli < count($city_list_arr); $cli++) 
								 	{ 
								 		$city_name=GetSingleFieldDataFromTable("cz_distirct_details","name"," id='".$city_list_arr[$cli]."' ",$is_stat_chk="0");
								 		if($city_name!="0")
								 		{
								 			array_push($city_name_arr, $city_name);
								 			if($cli=="0")
								 			{
								 				$where_city.="( (source LIKE '%".$city_name."%' OR destination LIKE '%".$city_name."%' )";	
								 			}
								 			elseif($cli==(count($city_list_arr)-1))
								 			{
								 				$where_city.=" OR (source LIKE '%".$city_name."%' OR destination LIKE '%".$city_name."%' ) )";
								 			}else
								 			{
								 				$where_city.=" OR (source LIKE '%".$city_name."%' OR destination LIKE '%".$city_name."%' )";
								 			}
								 			
								 		}

								 	}
								 	
								 		
								 	
								 }
								 if($where_city!="")
								 {
								 	$where.=" AND ".$where_city;
								 }
								$sel1 = "select * from cz_ride_offers_details where ".$where." ".$search_ride_condition." order by id desc ";
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
								$pagination_link="index.php?pid=".$current_page.$search_page_query."&page=%s";
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
									// print_r($fetch);
									$ride_vehicle_details=GetConditionalDetailsFromTable("cz_vehicle_details"," id='".$fetch['id_car']."' ",$is_multiple="0","0");
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
										<td><?php echo $fetch['ride_code']; ?></td>	
										
										<td><?php echo $fetch['source']; ?></td>	
                                        <td><?php echo $fetch['destination']; ?></td>
                                        
										<td><?php echo GetSingleFieldDataFromTable("cz_customers","fname"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0"); ?></td>

										<td><?php echo GetSingleFieldDataFromTable("cz_customers","mobile"," cid='".$fetch['ride_owner']."' ",$is_stat_chk="0"); ?></td>

										<td><?php echo $fetch['id_driver']; ?></td>
										<td><?php echo GetSingleFieldDataFromTable("cz_vehicle_model","name"," id='".$ride_vehicle_details['model']."' ",$is_stat_chk="0"); ?></td>
										<td><?php echo $fetch['payment_mode']; ?></td>
                                        <td><?php echo date('d-m-Y H:i A', strtotime($fetch['date']." ".$fetch['time'])); ?></td>
                                        <td><?php echo $fetch['price']; ?></td>
                                        <td class="text-center">
                                        	<?php 
						                      if($fetch['status'] == 0)
						                      {
						                        echo '<a href="#" class="btn btn-sm btn-default">Ride Created</a>';
						                      
						                      }elseif($fetch['status'] == 1)
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-warning">Ride Accepted</a>';	
						                      }
						                      elseif($fetch['status'] == 2)
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-primary">Driver Arrived</a>';	
						                      }
						                      elseif($fetch['status'] == 3)
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-info">Ride Started</a>';	
						                      }
						                      elseif($fetch['status'] == 4)
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-success">Ride Completed</a>';	
						                      }
						                      else
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-danger">Ride Cancelled</a>';	
						                      }
						                    ?>
                                        </td>
										<td align="center">
											<div class="btn-group mb-0">
												
												<a href="index.php?pid=view_ride_details&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
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
