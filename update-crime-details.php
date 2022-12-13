<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Citizen 3 | Update Crime Details</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css?v=<?php echo uniqid(); ?>'>
    <!--Bootstrap.min css-->
	<link rel="stylesheet" href="admin/assets/plugins/bootstrap/css/bootstrap.min.css">
</head>
<?php
    require_once("process/config.php");
    $API_Call_Method="POST";$crime_details=array();
    include("admin/functions.php");
    $crime_request_data=array();$crime_list=array();
    if(!isset($_REQUEST['id']) || $_REQUEST['id']=="" || $_REQUEST['id']<=0)
    {
        header("Location:profile-page.php");
    }
    $crime_request_data['crime_id']=$_REQUEST['id'];
    $CrimeAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/crime_details.php", $crime_request_data);
    $CrimeAPIReturnDataArr=json_decode($CrimeAPIReturnDataJSON, true);
    // print_r($CrimeAPIReturnDataArr);
    if(isset($CrimeAPIReturnDataArr['returnCode']) && $CrimeAPIReturnDataArr['returnCode']=="1")
    {
        $crime_details=$CrimeAPIReturnDataArr['data'];
        $crime_type_field_details=$crime_details['crime_type_field_details'];  
        $crime_media_json=$crime_details['crime_media'];
        $crime_media_details=array();
        if($crime_type_field_details!="")
        {
            $fetch_crime_type_field_details=json_decode($crime_type_field_details,true);
        }
        if($crime_media_json!="")
        {
            $crime_media_details=json_decode($crime_media_json,true);
        }   
    }
    $file_name="english_language.php";
    if(isset($_SESSION['cz_user_login_id']) && $_SESSION['cz_user_login_id']!="")
    {
        $profile_request_data=array();$profile_details=array();
        $profile_request_data['logged_in_user']=$_SESSION['cz_user_login_id'];
        $ProfileAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/profile_details.php", $profile_request_data);
        $ProfileAPIReturnDataArr=json_decode($ProfileAPIReturnDataJSON, true);
        
        // print_r($ProfileAPIReturnDataArr);
        if(isset($ProfileAPIReturnDataArr['returnCode']) && $ProfileAPIReturnDataArr['returnCode']=="1")
        {
            $profile_details=$ProfileAPIReturnDataArr['data'];
            $profile_details['lname']=trim($profile_details['lname']);
            $profile_details['pname']=trim($profile_details['pname']);
            $profile_details['state']=trim($profile_details['state']);
            $profile_details['city']=trim($profile_details['city']);
            $profile_details['country']=trim($profile_details['country']);
            $profile_details['zipcode']=trim($profile_details['zipcode']);

            // print_r($profile_details);

            if(isset($profile_details['language_code']) && $profile_details['language_code']!="en")
            {
                $file_name="spanish_language.php";
            }
            
            // print_r($language_data);
        }
    }
    include $file_name;
    // print_r($crime_details);
?>
<body>
    <div class="crim-head-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="admin/assets/img/brand/logo.png" style="height: 60px;margin:0 auto;"/>
                </div>    
                <!-- <div class="col-sm-6 col-md-8">
                    <h1 class="title-head" style="padding-left:20px;">My Profile</h1>
                </div> -->
            </div>
        </div>
    </div>
    <div class="crim-tip-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="title-head" style="padding-left: 15px;">Crime Details</h1>
                </div>
                <div class="col-md-4 text-right">
                    <a href="profile-page.php" style="margin-right: 15px;" class="btn btn-primary">Back to Profile</a>                
                </div>
                <div class="col-12">
                    <div class="crim-prof-detail">
                        <form action="" class="w-100">
                            <div class="row">
                                <div class="col-md-3 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_are_you_victim_or_witness'])){echo $language_data['lbl_are_you_victim_or_witness'];}else{echo "Are you Victim or Witness?";} ?>
                                        </label>
                                    </div>
                                    <div>
                                        <!-- <input type="text" value="Victim" placeholder="Victim"> -->
                                        <label for="report_type_victim"><input type="radio" name="report_type" id="report_type_victim" checked value="Victim"/> <?php if(isset($language_data['lbl_victim'])){echo $language_data['lbl_victim'];}else{echo "Victim";} ?></label>
                                        
                                        <label for="report_type_witness" style="padding-left: 10px;"><input type="radio" name="report_type"  id="report_type_witness" value="Witness"/> <?php if(isset($language_data['lbl_witness'])){echo $language_data['lbl_witness'];}else{echo "Witness";} ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_are_you_reporting_anonymously'])){echo $language_data['lbl_are_you_reporting_anonymously'];}else{echo "Are you reporting anonymously?";} ?>
                                        </label>
                                        <!-- <input type="text" value="Yes" placeholder="Yes"> -->
                                    </div>
                                    <div>
                                        
                                        <label for="is_anonyms_reporting_yes"><input type="radio" <?php if(isset($crime_details['is_anonyms_reporting']) && $crime_details['is_anonyms_reporting']=="1"){echo "checked";} ?> name="is_anonyms_reporting" id="is_anonyms_reporting_yes" value="1"/> Yes</label>
                                        
                                        <label for="is_anonyms_reporting_no" style="padding-left: 10px;"><input type="radio" <?php if(isset($crime_details['is_anonyms_reporting']) && $crime_details['is_anonyms_reporting']=="0"){echo "checked";} ?> name="is_anonyms_reporting" id="is_anonyms_reporting_no" value="0"/> No</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-5 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_when_did_the_crime_take_place'])){echo $language_data['lbl_when_did_the_crime_take_place'];}else{echo "When did the crime take place?";} ?>
                                            
                                        </label>
                                        <input type="text" class="input-group" name="crime_date" id="crime_date"  value="<?php if(isset($crime_details['crime_date']) && $crime_details['crime_date']!="0000-00-00 00:00:00"){echo date('d/m/Y h:i A',strtotime($crime_details['crime_date']));} ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_where_did_the_crime_take_place'])){echo $language_data['lbl_where_did_the_crime_take_place'];}else{echo "Where did the crime take place?";} ?>
                                        </label>
                                        <input type="text" class="input-group" name="crime_full_address" id="crime_full_address" value="<?php if(isset($crime_details['crime_full_address'])){echo $crime_details['crime_full_address'];} ?>" placeholder="">
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_crime_type'])){echo $language_data['lbl_crime_type'];}else{echo "Crime Type";} ?>
                                        </label>
                                        <input type="text" class="input-group" readonly value="<?php if(isset($crime_details['crime_type_name'])){echo $crime_details['crime_type_name'];} ?>" placeholder="">
                                        <input type="hidden" name="crime_type" class="input-group"  value="<?php if(isset($crime_details['crime_type'])){echo $crime_details['crime_type'];} ?>" placeholder="">
                                        
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-25">
                                    <div class="form-group">
                                        
                                        <ul class="crm-typ-list">
                                        <?php 
												if($crime_type_field_details!="" && count($fetch_crime_type_field_details)>0)
												{
													foreach ($fetch_crime_type_field_details as $key => $value) 
													{
														echo "<li>";
														echo "<p>".$key."</p>";
														echo "<span>".$value."</span>";
														echo "</li>";
													}
												}
										?>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_description'])){echo $language_data['lbl_description'];}else{echo "Description";} ?> 
                                        </label>
                                        <input type="text" class="input-group" name="description" id="description" value="<?php if(isset($crime_details['description'])){echo $crime_details['description'];} ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_additional_note'])){echo $language_data['lbl_additional_note'];}else{echo "Additional Note";} ?>
                                        </label>
                                        <input type="text" class="input-group" name="additional_notes" id="additional_notes" value="<?php if(isset($crime_details['additional_notes'])){echo $crime_details['additional_notes'];} ?>" placeholder="Notes">
                                    </div>
                                </div>
                                <div class="col-12 mb-25" style="margin: 15px;">
                                    <div class="form-group">
                                        <label class="form-title">
                                            
                                            <?php if(isset($language_data['lbl_crime_media'])){echo $language_data['lbl_crime_media'];}else{echo "Photos & Videos";} ?>
                                        </label>
                                        <div class="image-phot-video row">
                                            <!-- <img class="img-pv" src="image/avatar6.png" alt="#" /> -->
                                            <?php
                                            for ($cmi=0; $cmi < count($crime_media_details); $cmi++) 
                                            {
                                                ?>
                                                    <div class="col-md-4" style="padding:20px;">
                                                        <?php 
                                                $current_media=$crime_media_details[$cmi];
                                                if($current_media['media_type']=="Image")
                                                {
                                                    echo "<img src='".$current_media['media_url']."' style='height:150px;width:auto;max-width:100%;' />";
                                                }elseif($current_media['media_type']=="Video")
                                                {
                                                    echo '<video style="width:100%;height:150px;"  controls>
                                                    <source src="'.$current_media['media_url'].'" >
                                                    
                                                    Your browser does not support the video tag.
                                                    </video>';
                                                }
                                                ?>
                                                    </div>
                                                <?php
                                            }
                                            ?>
                                        </div>         
                                    </div>
                                </div>
                                <div class="col-12" style="display: none;">
                                    <button type="submit" class="btn btn-primary"><?php if(isset($language_data['title_update_a_report'])){echo $language_data['title_update_a_report'];}else{echo "Submit Details";} ?><</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<script src="admin/assets/js/popper.js"></script>
	<script src="admin/assets/js/custom_jquery_functions.js"></script>
	<script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script>
    </script>
</body>
</html>