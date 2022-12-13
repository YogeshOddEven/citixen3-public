<?php
if(!isset($condition_inquiry))
{
	$condition_inquiry="";
}


?>

<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Notications</li>
	</ol>
</div>
<div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php 
	        	$search_default_p_query = "";
	        	include("search_bar_notifications.php"); ?>
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
					
					Notications Details
					<?php 
					if(!isset($search_page_query))
					{
						$search_page_query = "";
					}
					?>
					<!-- <a href="excel/export_to_excel_view_all_rides.php<?php echo '?export_type=excel'.$search_page_query; ?>" class='btn btn-primary btn-sm float-right'>Export to Excel</a> -->
					<?php if(get_access('add_notification') == 1){ ?>
					<a href="index.php?pid=add_notification" class='btn btn-primary btn-sm float-right'>+ Send More Notifications</a>
				<?php } ?>
				</h2>
			</div>
			<div class="">
            	<?php include "message.php"; ?>
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Type</th>
                           <th>Receipient</th>
                           <th>Receipient type</th>
                           <th>Is Read?</th>
                           <th>Notication Date</th>
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

								
								
								$where=" WHERE id_notification>0 ";
								if(isset($search_notification_condition) && $search_notification_condition!="")
								{
									$where.=" ".$search_notification_condition;
								}
								$sel1 = "SELECT * from cz_notification_details $where order by id_notification  desc ";
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
								
								$query2 = $sel1." ".$pagination->getLimitSql();
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									// print_r($fetch);
									// id_notification 
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
										<td><?php echo $fetch['title']; ?></td>	
										
										<td><?php echo $fetch['description']; ?></td>	
                                        <td><?php echo $fetch['type']; ?></td>
                                        <?php if($fetch['recepient_type']=="0")
                                        { ?>
										<td><?php echo GetSingleFieldDataFromTable("cz_customers","fname"," cid='".$fetch['id_recepient']."' ",$is_stat_chk="0"); ?></td>
										<td>Customer</td>
									<?php }else{ ?> 
										<td><?php echo GetSingleFieldDataFromTable("cz_driver","fname"," cid='".$fetch['id_recepient']."' ",$is_stat_chk="0"); ?></td>
										<td>Driver</td>
									<?php } ?>

										
                                        

                                        
                                        <td class="text-center">
                                        	<?php 
						                      if($fetch['is_read'] == 0)
						                      {
						                        echo '<a href="#" class="btn btn-sm btn-danger">No/a>';
						                      
						                      }elseif($fetch['is_read'] == 1)
						                      {
						                      	echo '<a href="#" class="btn btn-sm btn-success">Yes</a>';	
						                      }
						                      
						                    ?>
                                        </td>
                                        <td><?php if($fetch['date']!="" && $fetch['date']!="0000-00-00 00:00:00" && $fetch['date']!="1970-01-01 05:30:00") echo date('d-m-Y H:i A', strtotime($fetch['date'])); ?></td>
										<td align="center">
											<div class="btn-group mb-0">
												
												
                                               
                                               <?php if(get_access('remove_notification') == 1){ ?>
                                                        <a href="#delete<?php echo $fetch['id_notification']; ?>" data-toggle="modal" class="btn btn-sm btn-default">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                <?php } ?>
											</div>
											<div class="modal fade modal-dialog-top " id="delete<?php echo $fetch['id_notification']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												 <div class="modal-dialog ">
													  <div class="modal-content-wrap">
														   <div class="modal-content">
																<div class="modal-header text-left">
																	 <h4 class="modal-title">Message</h4>
																	 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																</div>
																<div class="modal-body text-left">Are you sure to delete the details?</div>
																<div class="modal-footer">
																	<a href="process/delete_notification.php?id=<?php echo $fetch['id_notification']; ?>" class="btn btn-danger btn-xs">Delete</a>
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
