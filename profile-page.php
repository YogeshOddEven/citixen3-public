<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home | Citizen 3 Profile</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
   <!--Bootstrap.min css-->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Icons -->
	<link href="admin/assets/css/icons.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<link rel='stylesheet' type='text/css' media='screen' href='css/style.css?v=<?php echo uniqid(); ?>'>
</head>
<style type="text/css">
    .tab-link
    {
        cursor: pointer;
    }
</style>
<?php include "lock-login-require.php"; 
require_once("process/config.php");
$API_Call_Method="POST";
include("admin/functions.php");
// $cur_API_URL=$action_API_list[($call_to_action)];
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
    }else
    {
        $file_name="english_language.php";
    }
    include $file_name;
    // print_r($language_data);
}else
{
    header("Location:process/logout.php");
}

$crime_request_data=array();$crime_list=array();
$crime_request_data['logged_in_user']=$_SESSION['cz_user_login_id'];
$CrimeAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/crime_list.php", $crime_request_data);
$CrimeAPIReturnDataArr=json_decode($CrimeAPIReturnDataJSON, true);
// print_r($CrimeAPIReturnDataArr);
if(isset($CrimeAPIReturnDataArr['returnCode']) && $CrimeAPIReturnDataArr['returnCode']=="1")
{
    $crime_list=$CrimeAPIReturnDataArr['data'];
    
}
// print_r($crime_list);
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
                <div class="col-md-4 col-12 mb-sm-20">
                    
                    <ul class="tabs-nav">
                        <li><img class="img-responsive img-circle" style="margin: 10px auto;border: 3px solid #3d5a80;border-radius: 50%;height: 100px;width: 100px;" id="imagePreview" src="<?php if(isset($profile_details['photo']) && $profile_details['photo']!=""){echo $profile_details['photo'];}else{echo "image/avatar6.png";} ?>" alt="User profile picture"></li>
                        <li><p style="font-size: 16px;font-weight: bold;color: #3d5a80;text-align: center;"><?php if(isset($profile_details['fname'])){echo $profile_details['fname'];} ?> <?php if(isset($profile_details['lname'])){echo $profile_details['lname'];} ?></p></li>
                        <li class="tab-link current" data-tab="tab-1"><?php if(isset($language_data['title_profile'])){echo $language_data['title_profile'];}else{echo "Profile Info";} ?> </li>
                        <li class="tab-link" data-tab="tab-2"><?php if(isset($language_data['title_crime_report'])){echo $language_data['title_crime_report'];}else{echo "Crime Report";} ?></li>
                        <li class="tab-link" data-tab="tab-3"><?php if(isset($language_data['lbl_rest_password'])){echo $language_data['lbl_rest_password'];}else{echo "Reset Password";} ?></li>
                        <li class="tab-link" onclick="ClickonChild(this);"><a id="add-crime-link" class="tab-menu-link" href="add-crime-tip.php"> <?php if(isset($language_data['title_add_crime'])){echo $language_data['title_add_crime'];}else{echo "Add Crime";} ?></a></li>
                        <li class="tab-link" onclick="ClickonChild(this);"><a id="nearby-crime-link" class="tab-menu-link"  href="map.php"><?php if(isset($language_data['title_near_by_crime'])){echo $language_data['title_near_by_crime'];}else{echo "View Near By Crime";} ?></a></li>
                        <li class="tab-link" onclick="ClickonChild(this);"><a id="logout-link" class="tab-menu-link" href="process/logout.php"><?php if(isset($language_data['lbl_logout'])){echo $language_data['lbl_logout'];}else{echo "Logout";} ?></a></li>

                    </ul>
                </div>
                <div class="col-md-8 col-12">
                    <div class="tabs-stage">
                        <?php include "message.php"; ?>
                        <div id="tab-1" class="tab-content current">
                            <div class="d-flex align-items-center heading-bg px-4 py-2 mb-4">
                                <h1 class="title-head mr-auto"><?php if(isset($language_data['title_my_profile'])){echo $language_data['title_my_profile'];}else{echo "My Profile";} ?></h1>
                            </div>
                            <form  class="validate-form" data-err_msg_ele="help"  method="post" action="process/controller_action_api_call.php">
                                <input type="hidden" name="action" value="update_profile"/>
                                <input type="hidden" name="redirect_url_error" value="../profile-page.php"/>
                                <input type="hidden" name="redirect_url_success" value="../profile-page.php"/>
                                <input type="hidden" name="logged_in_user" value="<?php echo $_SESSION['cz_user_login_id']; ?>"/>
                                <div class="crim-prof-detail">
                                    <div class="row align-items-center">
                                        <!-- <div class="col-sm-12 text-center"><h2 class="title-head "><?php if(isset($language_data['title_my_profile'])){echo $language_data['title_my_profile'];}else{echo "My Profile";} ?></h2></div> -->
                                        <div class="col-md-4 col-12 mb-20">
                                            <div class="crim-prof-image">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                      <form action="" method="post" id="form-image">
                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload">
                                                            
                                                            <?php if(isset($language_data['lbl_upload_profile_image'])){echo $language_data['lbl_upload_profile_image'];}else{echo "Upload Image";} ?>
                                                        </label>
                                                      </form>
                                                    </div>
                                                    <div class="avatar-preview">
                                    
                                                      <img class="profile-user-img img-responsive img-circle" id="imagePreview" src="<?php if(isset($profile_details['photo']) && $profile_details['photo']!=""){echo $profile_details['photo'];}else{echo "image/avatar6.png";} ?>" alt="User profile picture">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="crime-prof-content">
                                                <div class="row">
                                                    <div class="col-md-6 col-12 mb-20">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="<?php if(isset($language_data['lbl_first_name_asterisk'])){echo $language_data['lbl_first_name_asterisk'];}else{echo "First Name*";} ?>" name="fname" id="fname" data-is_validate="1" value="<?php if(isset($profile_details['fname'])){echo $profile_details['fname'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-20">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="<?php if(isset($language_data['lbl_paternal_lastname'])){echo $language_data['lbl_paternal_lastname'];}else{echo "Paternal Last Name";} ?>" name="lname" id="lname" data-is_validate="0" value="<?php if(isset($profile_details['lname'])){echo $profile_details['lname'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-20">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="<?php if(isset($language_data['lbl_maternal_lastname'])){echo $language_data['lbl_maternal_lastname'];}else{echo "Maternal Last Name";} ?>"  name="mname" id="mname" data-is_validate="0" value="<?php if(isset($profile_details['mname'])){echo $profile_details['mname'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input type="email" placeholder="<?php if(isset($language_data['lbl_email_address'])){echo $language_data['lbl_email_address'];}else{echo "Email Address";} ?>"   name="emailid" id="emailid" data-is_validate="1" value="<?php if(isset($profile_details['emailid'])){echo $profile_details['emailid'];} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input type="tel"   name="mobile" id="mobile" data-is_validate="0" value="<?php if(isset($profile_details['mobile'])){echo $profile_details['mobile'];} ?>" placeholder="<?php if(isset($language_data['lbl_phone_number'])){echo $language_data['lbl_phone_number'];}else{echo "Phone number";} ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input class="input-group datepicker" type="text"  placeholder="<?php if(isset($language_data['lbl_birth_date'])){echo $language_data['lbl_birth_date'];}else{echo "Birthdate";} ?>"  name="birth_date" id="birth_date" value="<?php if(isset($profile_details['birth_date']) && $profile_details['birth_date']!=""){echo date('m-d-Y',strtotime($profile_details['birth_date']));} ?> ">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <select  name="language_code" class="form-control" id="language_code" >
                                                            <option <?php if(isset($profile_details['language_code']) && $profile_details['language_code']=="en" || $profile_details['language_code']==""){echo "selected";}?> value="en">English</option>
                                                            <option <?php if(isset($profile_details['language_code']) && $profile_details['language_code']!="en"){echo "selected";}?>  value="es">Spanish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="form-group">
                                                        <textarea placeholder="<?php if(isset($language_data['lbl_address'])){echo $language_data['lbl_address'];}else{echo "Address";} ?>" name="address" id="address" class="form-control"><?php if(isset($profile_details['address'])){echo $profile_details['address'];} ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="<?php if(isset($language_data['lbl_state'])){echo $language_data['lbl_state'];}else{echo "State";} ?>"  name="state" id="state" data-is_validate="0" value="<?php if(isset($profile_details['state']) && $profile_details['state']!=""){echo $profile_details['state'];} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="<?php if(isset($language_data['lbl_city'])){echo $language_data['lbl_city'];}else{echo "City";} ?>"  name="city" id="city" data-is_validate="0" value="<?php if(isset($profile_details['city']) && $profile_details['city']!=""){echo $profile_details['city'];} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="<?php if(isset($language_data['lbl_zip_code'])){echo $language_data['lbl_zip_code'];}else{echo "Zip code";} ?>"  name="zipcode" id="zipcode" data-is_validate="0" value="<?php if(isset($profile_details['zipcode']) && $profile_details['zipcode']!=""){echo $profile_details['zipcode'];} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="<?php if(isset($language_data['lbl_country'])){echo $language_data['lbl_country'];}else{echo "Country";} ?>"  name="country" id="country" data-is_validate="0" value="<?php if(isset($profile_details['country']) && $profile_details['country']!=""){echo $profile_details['country'];} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary"><?php if(isset($language_data['title_update_crime'])){echo $language_data['title_update_crime'];}else{echo "Update Profile";} ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="tab-2" class="tab-content ">
                            <div class="d-flex align-items-center heading-bg px-4 py-2 mb-4">
                                <h1 class="title-head mr-auto"><?php if(isset($language_data['title_crime_report'])){echo $language_data['title_crime_report'];}else{echo "Crime Report";} ?></h1>
                            </div>
                            <div class="crim-prof-detail">
                                <div class="w-100">
                                    <div class="row">
                                        <!-- <div class="col-sm-12 text-center"><h2 class="title-head "><?php if(isset($language_data['title_crime_report'])){echo $language_data['title_crime_report'];}else{echo "Crime Report";} ?></h2></div> -->
                                        <!-- <div class="col-md-6 col-12 mb-sm-20">
                                            <div class="crim-total">
                                                <div class="crime-tit-cont">
                                                    <h4 class="crim-title"><?php if(isset($language_data['lbl_total_crime_report'])){echo $language_data['lbl_total_crime_report'];}else{echo "Total crime report";} ?></h4>
                                                    <p class="crim-content">If this is an emargency, CALL 911!</p>
                                                </div>
                                                <h4 class="crim-count"><?php echo $crime_list['total_crime_report']; ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="crim-total">
                                                <div class="crime-tit-cont">
                                                    <h4 class="crim-title"><?php if(isset($language_data['lbl_total_crime_victim'])){echo $language_data['lbl_total_crime_victim'];}else{echo "Total crime victim";} ?></h4>
                                                </div>
                                                <h4 class="crim-count"><?php echo $crime_list['total_crime_victim']; ?></h4>
                                            </div>
                                        </div> -->
                                        <div class="col-12">
                                            <?php if(isset($crime_list['crime_list']) && count($crime_list['crime_list'])>0){ ?>
                                            <ul class="content-crime-list">
                                                <?php
                                                 for ($i=0; $i < count($crime_list['crime_list']); $i++) 
                                                 { 
                                                    $current_crime=$crime_list['crime_list'][$i];

                                                    echo "<script>console.log(".json_encode($current_crime).")</script>";
                                                    ?>
                                                    <li class="crime-list">
                                                        <div class="user-icon">
                                                            <img src="image/user-circle.svg" alt="#">
                                                        </div>
                                                        <div class="user-detail">
                                                            <h4 class="user-title"><?php if($current_crime['crime_full_address']!=""){echo $current_crime['crime_full_address'];}else{echo $current_crime['crime_type_name'];} ?> </h4>
                                                            <ul class="date-time-contet">
                                                                <li class="date-contetn">
                                                                    <?php if($current_crime['crime_date']!="0000-00-00 00:00:00"){echo date('m/d/Y',strtotime($current_crime['crime_date']));} ?>
                                                                </li>
                                                                <li class="time-contetn">
                                                                <?php if($current_crime['crime_date']!="0000-00-00 00:00:00"){echo date(' h:i A',strtotime($current_crime['crime_date']));} ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="btn-action">
                                                            <a href="crime-tip-details.php?id=<?php echo $current_crime['id']; ?>" class="btn btn-primary btn-small"><?php echo $current_crime['crime_type_name'];; ?></a>
                                                        </div>
                                                    </li>
                                                    <?php
                                                 }
                                                ?>
                                                
                                                
                                               
                                              </ul>
                                              <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="tab-3" class="tab-content">
                            <div class="d-flex align-items-center heading-bg px-4 py-2 mb-4">
                                <h1 class="title-head mr-auto"><?php if(isset($language_data['lbl_rest_password'])){echo $language_data['lbl_rest_password'];}else{echo "Reset Password";} ?></h1>
                            </div>                     
                            
                            <form  class="validate-form" data-err_msg_ele="help"  method="post" action="process/controller_action_api_call.php">
                                <input type="hidden" name="action" value="reset_password"/>
                                <input type="hidden" name="redirect_url_error" value="../profile-page.php"/>
                                <input type="hidden" name="redirect_url_success" value="../profile-page.php"/>
                                <input type="hidden" name="logged_in_user" value="<?php echo $_SESSION['cz_user_login_id']; ?>"/>
                                <div class="crim-prof-detail">
                                    <div class="row align-items-center">
                                        <!-- <div class="col-sm-12 text-center"><h2 class="title-head "><?php if(isset($language_data['lbl_rest_password'])){echo $language_data['lbl_rest_password'];}else{echo "Reset Password";} ?></h2></div> -->
                                        
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-7 col-12 mb-20">
                                                    
                                                    <label class="control-label"><?php if(isset($language_data['msg_enter_old_password'])){echo $language_data['msg_enter_old_password'];}else{echo "Old Password";} ?></label>

                                                    <div class="input-group" style="padding: 0;height: 52px;">
                                                        
                                  
                                                        <input style="height: 100%;" class="form-control" type="password" placeholder="<?php if(isset($language_data['hint_enter_your_old_password'])){echo $language_data['hint_enter_your_old_password'];}else{echo "Enter Old Password";} ?>"   name="old_password" id="old_password" data-is_validate="1" value="">

                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" onclick="ShowPassword(old_password,this);" type="button"><i class="fas fa-eye"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-12 mb-20">
                                                    <label class="control-label"><?php if(isset($language_data['lbl_new_password'])){echo $language_data['lbl_new_password'];}else{echo "New Password";} ?></label>
    
                                                    <div class="input-group" style="padding: 0;height: 52px;">
                                                        
                                                        <input style="height: 100%;" class="form-control"  type="password" placeholder="<?php if(isset($language_data['hint_enter_your_new_password'])){echo $language_data['hint_enter_your_new_password'];}else{echo "New Password";} ?>"   name="new_password" id="new_password" data-is_validate="1" value="">

                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" onclick="ShowPassword(new_password,this);" type="button"><i class="fas fa-eye"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary"><?php if(isset($language_data['title_update_password'])){echo $language_data['title_update_password'];}else{echo "Update Password";} ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="css/jquery.min.js?v=<?php echo uniqid(); ?>"></script>
	<script src="admin/assets/js/popper.js"></script>
	
    <!-- Date Picker-->
    <script src="admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js?v=<?php echo uniqid(); ?>"></script>

    <script src="admin/assets/js/custom_jquery_functions.js"></script>
	<script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
	
            $('.tabs-nav li').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('.tabs-nav li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
                $.attr("data-tab").addClass('current');
            })

        })
        $(document).ready(function(){

            $("#imageUpload").change(function(data){

                var imageFile = data.target.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(imageFile);

                reader.onload = function(evt){
                    $('#imagePreview').attr('src', evt.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
            
            });



        });
      function ClickonChild(e)
      {
        var child_ele_id=$($(e).children()[0]).attr('id');
        document.getElementById(child_ele_id).click();
      }  
    </script>
</body>
</html>