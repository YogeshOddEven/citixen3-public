<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?pid=view_all_contacts">View All Crime</a></li>
		<li class="breadcrumb-item active" aria-current="page">Crime Details</li>
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
		$select_crime_details=mysqli_query($conn,"SELECT * from cz_crime_details WHERE id='".$_REQUEST['id']."' ");
		$fetch = mysqli_fetch_assoc($select_crime_details);
		// $user_rides=GetSearchRides(" ride_owner='".$_REQUEST['id']."' ");
	?>
    
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card shadow ">
			<div class="card-body pb-0">
            	<?php include("message.php"); ?>
            			<h2 class="primary-text-color">Crime Details</h2>
            			<div class="table-responsive border ">
								<table class="table row table-borderless w-100 m-0 ">
									<tbody class="col-lg-6 p-0">
										
										
										<tr>
											<td><strong>Crime Reported By :</strong> <?php echo GetSingleFieldDataFromTable("cz_users","fname"," cid='".$fetch['added_by']."' ",$is_stat_chk="0")." ".GetSingleFieldDataFromTable("cz_users","lname"," cid='".$fetch['added_by']."' ",$is_stat_chk="0"); ?></td>
										</tr>
                                        
                                        <tr>
											<td><strong>Crime Type :</strong> <?php echo GetSingleFieldDataFromTable("cz_crime_type","name"," id='".$fetch['crime_type']."' ",$is_stat_chk="0"); ?></td>
										</tr>
                                        <tr>
											<td><strong>Annonymus Reporting? :</strong> <?php if($fetch['is_anonyms_reporting']=="1"){echo "Yes";}else{echo "No";} ?></td>
										</tr>
										<tr>
											<td><strong>Crime Description :</strong> <?php echo $fetch['description']; ?></td>
										</tr>
										<tr>
											<td><strong>Crime Additional Notes :</strong> <?php echo $fetch['additional_notes']; ?></td>
										</tr>									
                                    </tbody>
									<tbody class="col-lg-6 p-0">
										
										<tr>
											<td><strong>Is Victim/Witness? :</strong> <td><?php echo $fetch['report_type']; ?></td></td>
										</tr>
										<tr>
											<td><strong>Crime Date :</strong> <?php if($fetch['crime_date']!="" && $fetch['crime_date']!="0000-00-00 00:00:00"){echo date('d-m-Y',strtotime($fetch['crime_date']));} ?></td>
										</tr>
										<tr>
											<td><strong>Crime Address :</strong> <?php echo $fetch['crime_full_address']; ?></td>
										</tr>
										<tr>
											<td><strong>Crime Other Details :</strong> <?php echo $fetch['other_crime_type_details']; ?></td>
										</tr>
									</tbody>
									
								</table>
                           </div>
                           <?php 
						 		$crime_type_field_details=$fetch['crime_type_field_details'];  
								$crime_media_json=$fetch['crime_media'];
								$crime_media_details=array();
								if($crime_type_field_details!="")
								{
									$fetch_crime_type_field_details=json_decode($crime_type_field_details,true);
								}
								if($crime_media_json!="")
								{
									$crime_media_details=json_decode($crime_media_json,true);
								}
								   
						  ?>
                            <br />
                            <div class="nav-wrapper p-0" >
								<ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
									
									<li class="nav-item">
										<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0 <?php if(isset($selected_tab) &&  $selected_tab=="1"){ echo ' show active ';} ?>" id="tabs-other-detail-tab" data-toggle="tab" href="#tabs-other-detail" role="tab" aria-controls="tabs-other-detail" aria-selected="false">Other Crime Type Details</a>
									</li>
									<li class="nav-item">
										<a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0 <?php if(isset($selected_tab) &&  $selected_tab=="2"){ echo ' show active ';} ?>" id="tabs-media-tab" data-toggle="tab" href="#tabs-media" role="tab" aria-controls="tabs-media" aria-selected="false">Crime Media</a>
									</li>
									
								</ul>
							</div>
							<div class="tab-content m-t-30" >
								

								<div class="tab-pane fade <?php if(isset($selected_tab) &&  $selected_tab=="1"){ echo ' show active ';} ?>" id="tabs-other-detail" role="tabpanel" aria-labelledby="tabs-other-detail-tab">
									<div class="row">
										<div class="col-sm-12">
											<div class="table-responsive">
												<table class="table table-bordered">
													
													<tbody>
												<?php 
												if($crime_type_field_details!="" && count($fetch_crime_type_field_details)>0)
												{
													foreach ($fetch_crime_type_field_details as $key => $value) 
													{
														echo "<tr>";
														echo "<th>".$key."</th>";
														echo "<td>".$value."</td>";
														echo "</tr>";
													}
												}
												?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								
								<div class="tab-pane fade <?php if(isset($selected_tab) &&  $selected_tab=="2"){ echo ' show active ';} ?>" id="tabs-media" role="tabpanel" aria-labelledby="tabs-media-tab">
									<div class="row">
										<div class="col-sm-12">
											
												<div class="row">
												<?php 
													if(count($crime_media_details)>0)
													{
														for ($cmi=0; $cmi < count($crime_media_details); $cmi++) 
														{ 
														
														?>
															<div class="col-md-6" style="padding:20px;">
																<?php
																	$current_media=$crime_media_details[$cmi];
																	if($current_media['media_type']=="Image")
																	{
																		echo "<img src='".$current_media['media_url']."' style='height:350px;width:auto;max-width:100%;' />";
																	}elseif($current_media['media_type']=="Video")
																	{
																		echo '<video style="width:100%;height:350px;"  controls>
																		<source src="'.$current_media['media_url'].'" >
																		
																	  Your browser does not support the video tag.
																	  </video>';
																	}
																?>
															</div>
														<?php
														}
													}else
													{
														echo "<label>No Media Available</label>";
													}
												 ?>
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