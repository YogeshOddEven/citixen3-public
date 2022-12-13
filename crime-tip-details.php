<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Citizen 3 | Crime Details</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
    <!--Bootstrap.min css-->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css?v=<?php echo uniqid(); ?>'>
</head>
<?php
    error_reporting(0);
    require_once("process/config.php");
    $API_Call_Method="POST";$crime_details=array();
    include("admin/functions.php");
    $crime_request_data=array();$crime_list=array();
    if(!isset($_REQUEST['id']) || $_REQUEST['id']=="" || $_REQUEST['id']<=0)
    {
        header("Location:profile-page.php");
    }
    $crime_request_data['crime_id']=$_REQUEST['id'];
    $crime_request_data['logged_in_user']=$_SESSION['cz_user_login_id'];
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
            <div class="d-flex align-items-center heading-bg px-4 py-2 mb-4">
                <h1 class="title-head mr-auto"><?php if(isset($language_data['title_crime_detail'])){echo $language_data['title_crime_detail'];}else{echo "Crime Details";} ?></h1>
                <a class="btn border-light text-light px-3" href="profile-page.php"
                    ><?php if(isset($language_data['lbl_back_profile'])){echo $language_data['lbl_back_profile'];}else{echo "Back to Profile";} ?></a
                >
            </div>
            <div class="row">
                <!-- <div class="col-md-8">
                    <h1 class="title-head" style="padding-left: 15px;">Crime Details</h1>
                </div>
                <div class="col-md-4 text-right">
                    <?php if(isset($_SESSION['cz_user_login_id']) && $_SESSION['cz_user_login_id']>0){ ?>
                    <a href="profile-page.php" style="margin-right: 15px;" class="btn btn-primary">Back to Profile</a>                
                    <?php } ?>
                </div> -->

                <div class="col-12">
                    <div class="crim-prof-detail">
                        <form action="" class="w-100">
                            <div class="row">
                                <div class="col-sm">        
                                    <h4 class="col-12">Crime Basic Details</h4>
                                    <div class="col-12 mb-25">
                                        <ul class="crm-typ-list">
                                            <li>
                                                <p style='margin-bottom:0;'>Are you Victim or Witness?</p>
                                                <span><?php echo $crime_details['report_type_name']; ?></span>
                                            </li>
                                            <li>
                                                <p style='margin-bottom:0;'>Are you reporting anonymously?</p>
                                                <span><?php if(isset($crime_details['is_anonyms_reporting']) && $crime_details['is_anonyms_reporting']=="1"){echo "Yes";}else{echo "No";} ?> </span>
                                            </li>
                                            <li>
                                                <p style='margin-bottom:0;'>When did the crime take place?</p>
                                                <span><?php if(isset($crime_details['crime_date']) && $crime_details['crime_date']!="0000-00-00 00:00:00"){echo date('d/m/Y h:i A',strtotime($crime_details['crime_date']));} ?></span>
                                            </li>
                                            <li>
                                                <p style='margin-bottom:0;'>Where did the crime take place?</p>
                                                <span><?php if(isset($crime_details['crime_full_address'])){echo $crime_details['crime_full_address'];} ?></span>
                                            </li>
                                            <li>
                                                <p style='margin-bottom:0;'>Crime Type</p>
                                                <span><?php if(isset($crime_details['crime_type_name'])){echo $crime_details['crime_type_name'];} ?></span>
                                            </li>
                                            <li>
                                                <p style='margin-bottom:0;'>Description</p>
                                                <span><?php if(isset($crime_details['description'])){echo $crime_details['description'];} ?></span>
                                            </li>
                                            <li>
                                                <p style='margin-bottom:0;'>Additional Note</p>
                                                <span><?php if(isset($crime_details['additional_notes'])){echo $crime_details['additional_notes'];} ?></span>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                                
                                <?php 
                                    if(count($fetch_crime_type_field_details)>0 && $crime_type_field_details!="")
                                    {
                                ?>
                                <div class="col-sm">
                                    <div class="col-12 mb-25">
                                        <div class="form-group">
                                            <h4>Crime Other Details</h4>
                                            <ul class="crm-typ-list">
                                            <?php 
                                                    if($crime_type_field_details!="" && count($fetch_crime_type_field_details)>0)
                                                    {
                                                        foreach ($fetch_crime_type_field_details as $key => $value) 
                                                        {
                                                            echo "<li>";
                                                            echo "<p style='margin-bottom:0;'>".$key."</p>";
                                                            echo "<span>".$value."</span>";
                                                            echo "</li>";
                                                        }
                                                    }
                                            ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php 
                                    if(count($crime_media_details)>0 && isset($crime_media_details[0]['media_url']) && $crime_media_details[0]['media_url']!="")
                                    {
                                ?>
                                <div class="col-12 mb-25" style="margin: 15px;">
                                    <div class="form-group">
                                        <h4> Photos & Videos</h4>
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
                                <?php } ?>
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