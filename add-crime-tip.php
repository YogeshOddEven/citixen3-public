<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Citizen 3 | Add Crime Details</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
    <!--Bootstrap.min css-->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css?v=<?php echo uniqid(); ?>'>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css"> -->
    <link rel="stylesheet" type="text/css" href="admin/assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->
    <style>
        .pac-container
        {
            z-index: 9999!important;
        }
        
    </style>
</head>
<?php include "lock-login-require.php"; 
date_default_timezone_set("Asia/Kolkata");
?>
<?php

    require_once("process/config.php");
    $API_Call_Method="POST";$crime_type_list=array();
    include("admin/functions.php");
    
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

    // 23.022505,72.5713621
    

    $crime_type_request_data=array();
    
    $crime_type_request_data['logged_in_user']=$_SESSION['cz_user_login_id'];
    $CrimeTypeAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/crime_type_list.php", $crime_type_request_data);
    $CrimeTypeAPIReturnDataArr=json_decode($CrimeTypeAPIReturnDataJSON, true);
    // print_r($CrimeTypeAPIReturnDataArr);
    if(isset($CrimeTypeAPIReturnDataArr['returnCode']) && $CrimeTypeAPIReturnDataArr['returnCode']=="1")
    {
        $crime_type_list=$CrimeTypeAPIReturnDataArr['data']['crime_type_list'];
        
    }


    // print_r($crime_type_list);
?>
<body>
    <div class="crim-head-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="admin/assets/img/brand/logo.png" style="height: 60px;margin:0 auto;"/>
                </div>
                <!-- <div class="col-12">
                    <h1 class="title-head">Add Crime Report</h1>
                </div> -->
            </div>
        </div>
    </div>
    <div class="crim-tip-section">
        <div class="container">
            <div class="d-flex align-items-center heading-bg px-4 py-2 mb-4">
                <h1 class="title-head mr-auto"><?php if(isset($language_data['title_add_crime'])){echo $language_data['title_add_crime'];}else{echo "Add Crime Report";} ?></h1>
                <a class="btn border-light text-light px-3" href="profile-page.php"
                    ><?php if(isset($language_data['lbl_back_profile'])){echo $language_data['lbl_back_profile'];}else{echo "Back to Profile";} ?></a
                >
            </div>
            <div class="row">
                <!-- <div class="col-md-8">
                    <h1 class="title-head" style="padding-left: 15px;"><?php if(isset($language_data['title_add_crime'])){echo $language_data['title_add_crime'];}else{echo "Add Crime Report";} ?></h1>
                </div>
                <div class="col-md-4 text-right">
                    <a href="profile-page.php" style="margin-right: 15px;" class="btn btn-primary"><?php if(isset($language_data['lbl_back_profile'])){echo $language_data['lbl_back_profile'];}else{echo "Back to Profile";} ?></a>                
                </div> -->
                
                <div class="col-md-6"><?php include "message.php"; ?></div>
                <div class="col-12">
                    <div class="crim-prof-detail">
                    <!-- <div class="col-sm-12 text-center"><h2 class="title-head ">Add Crime Report</h2></div> -->
                        <form  class="validate-form" data-err_msg_ele="help"  method="post" action="process/controller_action_api_call.php">
                            <input type="hidden" name="action" value="add_crime"/>
                            <input type="hidden" name="redirect_url_error" value="../add-crime-tip.php"/>
                            <input type="hidden" name="redirect_url_success" value="../add-crime-tip.php"/>
                            <input type="hidden" name="logged_in_user" value="<?php echo $_SESSION['cz_user_login_id']; ?>"/>

                            <div class="row">
                                <div class="col-md-3 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title"  style="margin-bottom: 0!important;">
                                            <?php if(isset($language_data['lbl_are_you_victim_or_witness'])){echo $language_data['lbl_are_you_victim_or_witness'];}else{echo "Are you Victim or Witness?";} ?>
                                        </label>
                                    </div>
                                    <div>
                                        <!-- <input type="text" value="Victim" placeholder="Victim"> -->
                                        <label for="report_type_victim"><input type="radio" name="report_type" id="report_type_victim" checked value="Victim"/> <?php if(isset($language_data['lbl_victim'])){echo $language_data['lbl_victim'];}else{echo "Victim";} ?></label>
                                        
                                        <label for="report_type_witness" style="padding-left: 10px;"><input type="radio" name="report_type"  id="report_type_witness" value="Witness"/> <?php if(isset($language_data['lbl_witness'])){echo $language_data['lbl_witness'];}else{echo "Witness";} ?></label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title" style="margin-bottom: 0!important;">
                                            <?php if(isset($language_data['lbl_are_you_reporting_anonymously'])){echo $language_data['lbl_are_you_reporting_anonymously'];}else{echo "Are you reporting anonymously?";} ?>
                                        </label>
                                    </div>
                                    <div>    
                                        <label for="is_anonyms_reporting_yes"><input type="radio" name="is_anonyms_reporting" id="is_anonyms_reporting_yes" value="1"/><?php if(isset($language_data['lbl_opt_yes'])){echo $language_data['lbl_opt_yes'];}else{echo "Yes";} ?> </label>
                                        
                                        <label for="is_anonyms_reporting_no" style="padding-left: 10px;"><input type="radio" checked name="is_anonyms_reporting" id="is_anonyms_reporting_no" value="0"/> <?php if(isset($language_data['lbl_opt_no'])){echo $language_data['lbl_opt_no'];}else{echo "No";} ?></label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            <?php if(isset($language_data['lbl_when_did_the_crime_take_place'])){echo $language_data['lbl_when_did_the_crime_take_place'];}else{echo "When did the crime take place?";} ?>
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <input type="text"  name="crime_date" id="crime_date" class="input-group datepicker" placeholder="" data-is_validate="1" value="<?php echo date('m-d-Y'); ?>">
                                                <span class="help text-danger"></span>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text"  name="crime_time" id="crime_time" class="input-group timepicker" data-is_validate="1" placeholder="" value="<?php echo date('h:i A'); ?>">
                                                <span class="help text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            <?php if(isset($language_data['lbl_where_did_the_crime_take_place'])){echo $language_data['lbl_where_did_the_crime_take_place'];}else{echo "Where did the crime take place?";} ?>
                                        </label>
                                        
                                        <select name="sources" id="sources" class="form-control sources" data-is_validate="1" placeholder="Select location">
                                            <option value=""><?php if(isset($language_data['lbl_select_option'])){echo $language_data['lbl_select_option'];}else{echo "Select Option";} ?></option>
                                            <option value="0"><?php if(isset($language_data['lbl_current_location'])){echo $language_data['lbl_current_location'];}else{echo "Current Location";} ?></option>
                                            
                                            <option value="1"><?php if(isset($language_data['lbl_enter_location'])){echo $language_data['lbl_enter_location'];}else{echo "Enter a Location";} ?></option>
                                        </select>
                                        <span class="help text-danger"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            
                                            <?php if(isset($language_data['lbl_crime_address'])){echo $language_data['lbl_crime_address'];}else{echo "Crime Location Address";} ?>
                                        </label>
                                        
                                        <input type="text" data-is_validate="1" name="crime_full_address" id="crime_full_address" class="input-group" placeholder="">
                                        <span class="help text-danger"></span>
                                        <input type="hidden" name="short_address" id="short_address" value="" />
                                        <input type="hidden" name="current_address" id="current_address" value="<?php if(isset($_SESSION['cz_user_current_location']['address'])){echo $_SESSION['cz_user_current_location']['address'];} ?>" />
                                        <input type="hidden" name="current_lat" id="current_lat" value="<?php if(isset($_SESSION['cz_user_current_location']['lat'])){echo $_SESSION['cz_user_current_location']['lat'];} ?>" />
                                        <input type="hidden" name="current_lng" id="current_lng" value="<?php if(isset($_SESSION['cz_user_current_location']['lng'])){echo $_SESSION['cz_user_current_location']['lng'];} ?>" />
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            <?php if(isset($language_data['lbl_photos'])){echo $language_data['lbl_photos'];}else{echo "Photos";} ?>
                                        </label>
                                        <div class="video-content">
                                            <input type="file" id="photo-btn" hidden/>
                                            <label class="chose-label" for="photo-btn"><?php if(isset($language_data['lbl_choose_photo'])){echo $language_data['lbl_choose_photo'];}else{echo "Choose File";} ?></label>
                                            <span id="photo-chosen" class="video-chosen"><?php if(isset($language_data['lbl_no_file_choosen'])){echo $language_data['lbl_no_file_choosen'];}else{echo "No file chosen";} ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_videos'])){echo $language_data['lbl_videos'];}else{echo "Videos";} ?>
                                        </label>
                                        <div class="video-content">
                                            <input type="file" id="video-btn" hidden/>
                                            <label class="chose-label" for="video-btn"><?php if(isset($language_data['lbl_choose_video'])){echo $language_data['lbl_choose_video'];}else{echo "Choose File";} ?></label>
                                            <span id="video-chosen" class="video-chosen"><?php if(isset($language_data['lbl_no_file_choosen'])){echo $language_data['lbl_no_file_choosen'];}else{echo "No file chosen";} ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_crime_type'])){echo $language_data['lbl_crime_type'];}else{echo "Crime Type";} ?>
                                        </label>
                                        <select name="crime_type" id="crime_type" class="form-control" data-is_validate="1" placeholder="Select crime type">
                                            <option value=""><?php if(isset($language_data['hint_select_a_type'])){echo $language_data['hint_select_a_type'];}else{echo "Select Type";} ?></option>
                                            <?php 
                                                for ($ctic=0; $ctic < count($crime_type_list); $ctic++) 
                                                { 
                                                    echo "<option value='".$crime_type_list[$ctic]['id']."'>".$crime_type_list[$ctic]['name']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <span class="help text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-25" id="crime_type_fields_wrapper">
                                </div>
                                <div class="col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_description'])){echo $language_data['lbl_description'];}else{echo "Description";} ?>
                                        </label>
                                        <textarea class="input-group textarea-group" id="description" name="description" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                        <?php if(isset($language_data['lbl_additional_note'])){echo $language_data['lbl_additional_note'];}else{echo "Additional Note";} ?>
                                            
                                        </label>
                                        <input type="text" id="additional_notes" name="additional_notes" class="input-group" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"><?php if(isset($language_data['lbl_submit_report'])){echo $language_data['lbl_submit_report'];}else{echo "Submit Details";} ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="crime-list-item">
        <button type="submit" class="" style="display: none;" id="myBtn">View Crime</button>
        
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-hedar">
                    <h3 class="modal-title"><?php if(isset($language_data['lbl_search_location'])){echo $language_data['lbl_search_location'];}else{echo "Search Location";} ?></h3>
                    <span class="close" id="mYModalCloseBtn"><img src="image/close_md.svg"></span>
                </div>
                
                <div class="modal-body">
                     <div class="row">
                         <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-title">
                                    <?php if(isset($language_data['lbl_enter_location_address'])){echo $language_data['lbl_enter_location_address'];}else{echo "Enter Location Address";} ?>
                                    
                                </label>
                                <input type="text" name="search_location_address" id="search_location_address" class="input-group" placeholder="">
                            </div>
                         </div>
                     </div>                           
                </div>
            </div>
            
        </div>
            
    </div>

    <script src="admin/assets/plugins/jquery/dist/jquery.min.js?v=<?php echo uniqid(); ?>"></script>
                                                
	<script src="admin/assets/js/popper.js?v=<?php echo uniqid(); ?>"></script>
	
	<script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js?v=<?php echo uniqid(); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js?v=<?php echo uniqid(); ?>"></script>
    <!-- Date Picker-->
    <script src="admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js?v=<?php echo uniqid(); ?>"></script>
    <script src="admin/assets/js/custom_jquery_functions.js?v=<?php echo uniqid(); ?>"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> -->


    <script>
        $(".custom-select").each(function() {
        var classes = $(this).attr("class"),
            id      = $(this).attr("id"),
            name    = $(this).attr("name");
        var template =  '<div class="' + classes + '">';
            template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
            template += '<div class="custom-options">';
            $(this).find("option").each(function() {
                template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
            });
        template += '</div></div>';
        
        $(this).wrap('<div class="custom-select-wrapper"></div>');
        $(this).hide();
        $(this).after(template);
        });
        $(".custom-option:first-of-type").hover(function() {
        $(this).parents(".custom-options").addClass("option-hover");
        }, function() {
        $(this).parents(".custom-options").removeClass("option-hover");
        });
        $(".custom-select-trigger").on("click", function() {
        $('html').one('click',function() {
            $(".custom-select").removeClass("opened");
        });
        $(this).parents(".custom-select").toggleClass("opened");
        event.stopPropagation();
        });
        $(".custom-option").on("click", function() {
        $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
        $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
        $(this).addClass("selection");
        $(this).parents(".custom-select").removeClass("opened");
        $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
        });

        const photoBtn = document.getElementById('photo-btn');
        const photoChosen = document.getElementById('photo-chosen');

        photoBtn.addEventListener('change', function(){
            photoChosen.textContent = this.files[0].name
        })
        const videolBtn = document.getElementById('video-btn');
        const videoChosen = document.getElementById('video-chosen');

        videolBtn.addEventListener('change', function(){
        videoChosen.textContent = this.files[0].name
        })
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "flex";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>

    <?php if(!isset($_SESSION['cz_user_current_location'])){ ?>
    <script>
        // var x = document.getElementById("demo");
        $(document).ready(function(){
            getLocation();
        });
        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setLocation);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
        }

        function setLocation(position) 
        {
            // x.innerHTML = "Latitude: " + position.coords.latitude +
            // "<br>Longitude: " + position.coords.longitude;
           
            var cur_lat_lng=position.coords.latitude+","+position.coords.longitude;
            latitude=position.coords.latitude;               
            longitude=position.coords.longitude;
            // console.log(cur_lat_lng);
            $("#short_address").val(cur_lat_lng);
            $("#current_lat").val(latitude);
            $("#current_lng").val(longitude);
            
            var geocoder = new google.maps.Geocoder;

            
            var latlng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    // console.log(results[1]);
                    $("#current_address").val(results[1].formatted_address);
                    $.ajax({
                        type: 'post',
                        url: 'ajax_action_php_function.php',
                        data: {action:'UpdateCurrentLocation',lat:latitude,lng:longitude,address:results[1].formatted_address},
                        success: function (data) {
                            if(data!="")
                            {
                                //location.reload();
                                // window.location.href='UserProfile';
                                
                                data=JSON.parse(data)
                                console.log(data);
                                
                                    // alert(data.msg);
                                    // location.reload();
                                
                            }
                            
                            //console.log(data);
                        }
                    });
                } else {
                    window.alert('No results found');
                }
                } else {
                window.alert('Geocoder failed due to: ' + status);
                }
            });
        }

        
    </script>
    <?php } ?>
    <script>
        $("#sources").change(function (){
            var cval=$(this).val();
            if(cval=="0")
            {
                var lat_lng= $("#current_lat").val()+", "+$("#current_lng").val();
                var address=$("#current_address").val();
                $("#short_address").val(lat_lng);
                $("#crime_full_address").val(address);
                $("#mYModalCloseBtn").click();
            }else if(cval=="1")
            {
                $("#myBtn").click();
            }else 
            {
                
            }
        });
        //   google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {

          var input = document.getElementById('search_location_address');

          var autocomplete = new google.maps.places.Autocomplete(input);

          autocomplete.addListener('place_changed', function () {



          var place = autocomplete.getPlace();

          // place variable will have all the information you are looking for.

        //   console.log(place.formatted_address);

          $('#lat').val(place.geometry['location'].lat());

          $('#long').val(place.geometry['location'].lng());
          var sel_lat_lng=place.geometry['location'].lat()+", "+place.geometry['location'].lng();
          $("#short_address").val(sel_lat_lng);  
          $("#crime_full_address").val(place.formatted_address);
          var geocoder = new google.maps.Geocoder;
        //   console.log(geocoder);

        });

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNPYL3NNFFg9Bd1QZ66hAMUwXV3LFl54g&libraries=places&callback=initialize" ></script>

    <script>
        $("#crime_type").change(function (){
            var crime_type=$("#crime_type").val();
            $.ajax({
	            url: 'ajax_action_php_function.php',
	            type: 'POST',
	            data: {
	                crime_type: crime_type,
	                action:'SetCrimeTypeFields'
	            },
	            error: function() {
	                 
	            },
	            success: function(data) {
	                // console.log(data);
                    var JSON_data=JSON.parse(data);
                    $("#crime_type_fields_wrapper").html(JSON_data.data);
                    // console.log(JSON_data);
	            }
	        });
        });
        
		$('.timepicker').timepicker(
		{
				autoclose: true,
				startDate: new Date(),
				minuteStep: 15,
				showSeconds: 0,
				showMeridian: true
		});
    </script>
    
</body>
</html>