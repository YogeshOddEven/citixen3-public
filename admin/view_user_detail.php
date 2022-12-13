<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?pid=view_all_contacts">View All User</a></li>
		<li class="breadcrumb-item active" aria-current="page">User Details</li>
	</ol>
	
    <?php
    $selected_tab="1";
    if(isset($_REQUEST['scode']))
    {
    	if($_REQUEST['scode']=="1")	
    	{
    		$selected_tab="1";
    	}
    	if($_REQUEST['scode']=="2")	
    	{
    		$selected_tab="2";
    	}
    	if($_REQUEST['scode']=="3")	
    	{
    		$selected_tab="3";
    	}
    	
    }
		$select_user_details=mysqli_query($conn,"SELECT * from cz_users WHERE cid='".$_REQUEST['cid']."' ");
		$fetch = mysqli_fetch_assoc($select_user_details);
		// $user_rides=GetSearchRides(" ride_owner='".$_REQUEST['cid']."' ");
	?>
    
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card shadow ">
			<div class="card-body pb-0">
            	<?php include("message.php"); ?>
            			<h2 class="primary-text-color">User Details</h2>
            			<div class="table-responsive border ">
								<table class="table row table-borderless w-100 m-0 ">
									<tbody class="col-lg-6 p-0">
										
										
										<tr>
											<td><strong>User Name :</strong> <?php echo $fetch['fname']." ".$fetch['lname'] ; ?></td>
										</tr>
                                        
                                        <tr>
											<td><strong>Mobile :</strong> <?php echo $fetch['mobile']; ?></td>
										</tr>
                                        <tr>
											<td><strong>Maternal last name :</strong> <?php echo $fetch['pname']; ?></td>
										</tr>
										<tr>
											<td><strong>Country :</strong> <?php echo $fetch['country']; ?></td>
										</tr>
										<tr>
											<td><strong>State :</strong> <?php echo $fetch['state']; ?></td>
										</tr>									
                                    </tbody>
									<tbody class="col-lg-6 p-0">
										
										<tr>
											<td><strong>Email ID :</strong> <?php echo $fetch['emailid']; ?></td>
										</tr>
										<tr>
											<td><strong>Birthdate :</strong> <?php echo $fetch['birth_date']; ?></td>
										</tr>
										<tr>
											<td><strong>Date Registered :</strong> <?php echo date('d/m/Y',strtotime($fetch['date_added'])); ?></td>
										</tr>
										<tr>
											<td><strong>City :</strong> <?php echo $fetch['city']; ?></td>
										</tr>
										<tr>
											<td><strong>Zipcode :</strong> <?php echo $fetch['zipcode']; ?></td>
										</tr>
									</tbody>
									<tbody class="col-md-12 p-0 mb-2">
										<tr>
											<td><strong>Address :</strong> <?php echo $fetch['address']; ?></td>
                                       </tr>

									</tbody>
								</table>
                           </div>
                           
                            <br />
                            <div class="nav-wrapper p-0" style="display: none;">
								<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
									
									<li class="nav-item">
										<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0 <?php if(isset($selected_tab) &&  $selected_tab=="1"){ echo ' show active ';} ?>" id="tabs-ride-tab" data-toggle="tab" href="#tabs-ride" role="tab" aria-controls="tabs-ride" aria-selected="false">User Crimes</a>
									</li>
									
									
								</ul>
							</div>
							<div class="tab-content m-t-30" style="display: none;">
								

								<div class="tab-pane fade <?php if(isset($selected_tab) &&  $selected_tab=="1"){ echo ' show active ';} ?>" id="tabs-ride" role="tabpanel" aria-labelledby="tabs-ride-tab">
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th width="20">#</th>
															<th>Source</th>
															<th>Destination</th>
															<th>Ride Code</th>
															<th>Date</th>
															<th>Time</th>
															<th>Price</th>
														</tr>
													</thead>
													<tbody>
												<?php 
												if($user_rides!="" && isset($user_rides[0]['id']))
												{
													for ($uri=0; $uri < count($user_rides); $uri++) 
													{ 
														?>
														<tr>
															<td><?php echo $uri+1; ?></td>
															<td><?php echo $user_rides[$uri]['source']; ?></td>
															<td><?php echo $user_rides[$uri]['destination']; ?></td>
															<td><?php echo $user_rides[$uri]['ride_code']; ?></td>
															<td><?php echo date('d/m/Y',strtotime($user_rides[$uri]['date'])); ?></td>
															<td><?php echo date('h:i A',strtotime($user_rides[$uri]['time'])); ?></td>
															<td>Rs.<?php echo $user_rides[$uri]['price']; ?></td>
														</tr>		
														<?php
													}
												}
												?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

                            
                         <br />
                     </div>
			</div>
		</div>
	</div>
</div>