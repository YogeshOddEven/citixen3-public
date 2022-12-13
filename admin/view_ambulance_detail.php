<div class="page-header mt-0 shadow p-3">
	<ol class="breadcrumb mb-sm-0">
		<li class="breadcrumb-item"><a href="index.php?pid=home">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Ambulance Details</li>
	</ol>
</div>
<!-- <div class="row">
   	<div class="col-md-12">
		<div class="card shadow overflow-hidden">
			<div class="card-body">
	        	<?php include("search_bar_lead.php"); ?>
            </div>
        </div>
    </div>
</div>
<br> -->
<?php 
                          // echo GenerateQrCode("test data","test_name");
                         ?>
<?php 

	if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
	{
		$vehicle_details=GetConditionalDetailsFromTable("cz_vehicle_details"," id='".$_REQUEST['id']."' ",$is_multiple="0","0");
		$profile_image="img/user.png";
		if($vehicle_details=="")
		{
			header("Location: index.php?pid=view_all_vehicles");		

		}else
		{
			$driver_details=GetConditionalDetailsFromTable("cz_driver"," cid='".$vehicle_details['user_id']."' ",$is_multiple="0","0");
			if($driver_details['photo']!="" && file_exists("uploads/User/".$driver_details['photo']))
			{
				$profile_image="uploads/User/".$driver_details['photo'];	
			}

			$driver_details['ratings']=GetDriverRatings($driver_details['cid']);

			if(isset($vehicle_details['model']))
			{
				$vehicle_details['model_name']=GetSingleFieldDataFromTable("cz_vehicle_model",$field="name","id='".$vehicle_details['model']."'",$is_stat_chk="0");	
			}
			if(isset($vehicle_details['company']))
			{
				$vehicle_details['company_name']=GetSingleFieldDataFromTable("cz_vehicle_company",$field="name","id='".$vehicle_details['company']."'",$is_stat_chk="0");	
			}

			if(isset($vehicle_details['sub_category']))
			{
				$vehicle_details['sub_category_name']=GetSingleFieldDataFromTable("cz_vehicle_sub_category",$field="name","id='".$vehicle_details['sub_category']."'",$is_stat_chk="0");	
			}
			$KYC_Check_Path="uploads/KYC/";
			$KYC_Return_Path=ROOT."/uploads/KYC/";
			$file_field_document=array("chk_file_path" => $KYC_Check_Path,"file_path" => $KYC_Return_Path,"default_file" => ROOT."/uploads/User/user.png","file_field_col" => "image");
			$document_details=get_ConditionalDetailsFromTable("cz_driver_vehicle_document",$is_stat_chk="0",$file_field_document," id_vehicle='".$_REQUEST['id']."' ","1");
			$car_image=ROOT."/uploads/noimage.png";

			if($document_details!="")
			{
				for ($dci=0; $dci < count($document_details); $dci++) 
				{ 
					if($document_details[$dci]['id_document']=="5")
					{
						$car_image=$document_details[$dci]['image'];
					}
				}
				$vehicle_details['document_details']=$document_details;			
			}else
			{
				$vehicle_details['document_details']=array();
			}
			
			$KYC_Check_Path="uploads/KYC/";
			$KYC_Return_Path=ROOT."/uploads/KYC/";
			$vehicle_Check_Path="uploads/vehicle/";
			$vehicle_Return_Path=ROOT."/uploads/vehicle/";
			$user_Check_Path="uploads/User/";
			$user_Return_Path=ROOT."/uploads/User/";
			$default_no_img=ROOT."/uploads/noimage.png";
			$vehicle_details['sub_category_image']=GetSingleFieldDataFromTable("cz_vehicle_sub_category",$field="image","id='".$vehicle_details['sub_category']."'",$is_stat_chk="0");	
			if($vehicle_details['sub_category_image']!="" && file_exists($vehicle_Check_Path.$vehicle_details['sub_category_image']))
			{
				$sub_category_image=$vehicle_Return_Path.$vehicle_details['sub_category_image'];
			}else
			{
				$sub_category_image=$default_no_img;
			}
			$qrcode_data=array();
			// $qrcode_data['vehicle_details']=$vehicle_details;
			// $qrcode_data['driver_details']=$driver_details;

			$qrcode_data['vehicle_type_id']=$vehicle_details['sub_category'];
			$qrcode_data['vehicle_type_name']=$vehicle_details['sub_category_name'];
			$qrcode_data['vehicle_id']=$vehicle_details['id'];
			$qrcode_data['vehicle_image']=$sub_category_image;
			$qrcode_data['driver_id']=$_REQUEST['id'];
			$qrcode_data['vehicle_name']=$vehicle_details['name'];
			$qrcode_data['driver_name']=$driver_details['fname']." ".$driver_details['lname'];
			$qrcode_img=GenerateQrCode("#RIDO".json_encode($qrcode_data),$vehicle_details['name']."_".$driver_details['fname'],5);


			
			// print_r($vehicle_details);
			// $ride_vehicle_details=GetConditionalDetailsFromTable("cz_vehicle_details"," id='".$vehicle_details['id_car']."' ",$is_multiple="0","0");

			// $passenger_rating_details=GetConditionalDetailsFromTable("cz_ride_rating_details"," id_ride='".$vehicle_details['id']."' AND type='0' ",$is_multiple="0","0");
			// $driver_rating_details=GetConditionalDetailsFromTable("cz_ride_rating_details"," id_ride='".$vehicle_details['id']."' AND type='1' ",$is_multiple="0","0");
		}
	}else
	{
		header("Location: index.php?pid=view_all_vehicles");
	}
?>
<div class="row">
	
   	<div class="col-md-6 col-lg-4">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Driver Details</h2>
			</div>
			<div class="">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<tr>
							<th  class="text-center" colspan="2">
								<?php if(isset($profile_image)){ echo "<img class='view_large_img' src='".$profile_image."' style='height: 105px;width: 105px;border-radius:50%;padding: 3px;border: 2px solid #009e1e;'/> "; }?>
								<label class="btn btn-sm btn-success" style="margin: 85px -75px;position: absolute;"><?php echo GetDriverRatings($driver_details['cid']); ?> <i class="fa fa-star"></i></label>
							</th>
						</tr>
						<tr>
							<th>Name:</th>
							<td><?php echo $driver_details['fname']; ?></td>

						</tr>

						<tr>	
							<th>Email:</th>
							<td><?php echo $driver_details['emailid']; ?></td>
						</tr>
						<tr>	
							<th>Mobile:</th>
							<td><?php echo $driver_details['mobile']; ?></td>
						</tr>
						
						
							
					</table>
                    
				</div>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-6 col-lg-4">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Ambulance Details</h2>
			</div>
			<div class="">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
							
						<tr>
							<th>Ambulance No:</th>
							<td><?php echo $vehicle_details['name']; ?></td>

						</tr>

						<tr>	
							<th>Ambulance Type:</th>
							<td><?php echo $vehicle_details['sub_category_name']; ?></td>
						</tr>
						<tr>	
							<th>Company:</th>
							<td><?php echo $vehicle_details['company_name']; ?></td>
						</tr>
						<tr>	
							<th>Model:</th>
							<td><?php echo $vehicle_details['model_name']; ?></td>
						</tr>
						<tr>	
							<th>State:</th>
							<td><?php echo $vehicle_details['state_name']; ?></td>
						</tr>
						<tr>	
							<th>City:</th>
							<td><?php echo $vehicle_details['city_name']; ?></td>
						</tr>
						<tr>	
							<th>Reference Code:</th>
							<td><?php echo $vehicle_details['reference_code']; ?></td>
						</tr>
						<tr>
							<th>Status:</th>
							<td><?php 
			                      if($vehicle_details['status'] == 0)
			                      {
			                        echo '<a href="#" class="btn btn-sm btn-danger">Offline</a>';
			                      
			                      }elseif($vehicle_details['status'] == 1)
			                      {
			                      	echo '<a href="#" class="btn btn-sm btn-success">Online</a>';	
			                      }
			                      
			                    ?></td>
						</tr>
						
					</table>
                    
				</div>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-6 col-lg-4">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Ambulance QR Code</h2>
			</div>
			<div class="">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center">
						<tr>
							<th  class="text-center">
								<?php if(isset($qrcode_img)){ echo "<img class='view_large_img' src='uploads/qrcodes/".$qrcode_img."' style='height: 150px;width: 150px;'/> "; }?>
								
							</th>
						</tr>
						<tr>
							
							<td class="text-center"><a href="<?php echo 'uploads/qrcodes/'.$qrcode_img; ?>" download class="btn btn-sm btn-default">Download QR Code</a></td>

						</tr>

						
						
						
							
					</table>
                    
				</div>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-12" style="margin-top: 30px;">
		<div class="card shadow">
        	<div class="card-header bg-transparent border-0">
				<h2 class=" mb-0">Ambulance Document List</h2>
			</div>
			<div class="col-md-12">
            	
            	<div class="table-responsive">
					<table class="table card-table table-vcenter align-items-center datatable">
						<thead class="thead-light">
						<tr>
                           <th class="text-center" width="32">#</th>
                           <th>Document Name</th>
                           <th>Image</th>
                           <th>Document No</th>
                           <th>Date Added</th>
                           
                           <th class="text-center">Status</th>
                           <th class="text-center" width="200">Actions</th>
                        </tr>
						</thead>
						<tbody>
							<?php
							 	$i = 1;
								
								
								
								//echo $page_query_inquiry;
								$current_page=$_REQUEST['pid'];

								$where=" id_vehicle='".$_REQUEST['id']."' and image!=''";
								$query2 = "select * from cz_driver_vehicle_document where ".$where."  order by id desc ";
								
								$query = mysqli_query($conn,$query2) or die(mysqli_error($conn));
								$i = 1;
								while($fetch = mysqli_fetch_array($query))
								{
									$document_image="img/noimage.png";
									if($fetch['image']!="" && file_exists($KYC_Check_Path.$fetch['image']))
									{
										$document_image=$fetch['image'];
										$ext = pathinfo($document_image, PATHINFO_EXTENSION);
                                              $img_preview="<img src='".$KYC_Check_Path.$document_image."' class='view_large_img' height='50' width='50'/>";
                                              if($ext=="pdf" || $ext=="doc" || $ext=="docx" || $ext=="ppt" || $ext=="pptx")
                                              {
                                                $img_preview='<div class="fileuploader-item-image fileupload-no-thumbnail"><div style="background-color: #f23c0f" class="fileuploader-item-icon"><i>'.strtoupper($ext).'</i></div></div>';
                                              }

									}else
									{
										$img_preview="<img src='".$document_image."' class='view_large_img' height='50' width='50'/>";
									}
									?>
									<tr>
										<td class="text-center"><?php echo $i; ?></td>
										
                                        <td><?php echo $fetch['document_name']; ?></td>
                                        <td><?php echo $img_preview; ?></td>
                                        <td><?php echo $fetch['document_no']; ?></td>
                                        <td><?php if($fetch['date_added']!='0000-00-00 00:00:00') {echo date('d-m-Y H:i A',strtotime($fetch['date_added'])); } ?></td>
                                        
                                        
                                        
                                        <td class="text-center">
                                        	<?php 
                                        	if(get_access('update_ambulance') == 1){
						                      if($fetch['status'] == 1)
						                      {
						                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=0&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Approved</a><?php
						                      }elseif($fetch['status'] == 2)
						                      {
						                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Rejected</a><?php
						                      } else {
						                        ?><a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-warning">Pending</a><?php
						                      }
						                  	}else
						                  	{
						                  		if($fetch['status'] == 1)
							                      {
							                        ?><a href="#" class="btn btn-sm btn-success">Approved</a><?php
							                      }elseif($fetch['status'] == 2)
							                      {
							                        ?><a href="#" class="btn btn-sm btn-danger">Rejected</a><?php
							                      } else {
							                        ?><a href="#" class="btn btn-sm btn-warning">Pending</a><?php
							                      }
						                  	}
						                    ?>
						                    <?php
						                      if(isset($_REQUEST['status']) && isset($_REQUEST['doc_id']))
						                      {
						                        $status = $_REQUEST['status'];
						                        $id = $_REQUEST['doc_id'];
						                        mysqli_query($conn,"update cz_driver_vehicle_document set status='".$status."' where id='".$id."'");
						                        header("location:index.php?pid=".$_REQUEST['pid']."&id=".$_REQUEST['id']);
						                      }
						                    ?>
						                    
                                        </td>
                                        <td class="text-center">
                                        	<?php 
                                        		if($fetch['image']!="" && file_exists($KYC_Check_Path.$fetch['image']))
                                        		{
                                        			?>
                                        			<a download="" href="<?php echo $KYC_Check_Path.$fetch['image']; ?>" class="btn btn-sm btn-default"  title="Download" ><i class="fa fa-download"></i></a>
                                        			<?php
                                        		}else
                                        		{
                                        			?>
                                        			<a href="#" disabled class="btn btn-sm btn-default"  title="Download" ><i class="fa fa-download"></i></a>
                                        			<?php
                                        		}
                                        	?>
                                        	<?php 
                                        	if(get_access('update_ambulance') == 1)
                                        	{
	                                        	if($fetch['status'] == 1)
							                      {
							                      	?>
							                      	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=2&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Reject</a>
							                    <?php }   	
							                    elseif($fetch['status'] == 2)
							                      {
							                      	?>
							                      	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Approve</a>
							                    <?php }else{ ?>
							                    	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=1&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-success">Approve</a>
							                    	<a href="index.php?pid=<?php echo $_REQUEST['pid']; ?>&id=<?php echo $_REQUEST['id'] ?>&status=2&doc_id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-danger">Reject</a>
							                    <?php } 
							                }
						                    ?>  	
                                        </td>
										<!-- <td align="center">
											<div class="btn-group mb-0">
												<a href="index.php?pid=view_vehicle_details&id=<?php echo $fetch['id']; ?>" class="btn btn-sm btn-default">
													<i class="fas fa-eye"></i>
												</a>
                                               
                                              
											</div>
											
										 </td> -->
									</tr>
									<?php	
									$i++;
								}
							  ?>	
						</tbody>
					</table>
                    <br>
				</div>
            </div>
        </div>
    </div>
    <br>
    
    
</div>

