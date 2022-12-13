<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home | Citizen 3 Map</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
    <!--Bootstrap.min css-->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css?v=<?php echo uniqid(); ?>'>
</head>
<?php include "lock-login-require.php"; 
require_once("process/config.php");
$API_Call_Method="POST";$crime_details=array();
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
?>
<style>
    .btn-map2
    {
        left: 190px!important;
    }
</style>
<body>
    <input type="hidden" id="current_location" value=""/>
    <input type="hidden" id="current_lat" value=""/>
    <input type="hidden" id="current_lng" value=""/>
    
    <input type="hidden" id="crime_markers_latlng" value=""/>

    <div class="section-map">
        <div class="map-area">
            <div class="search-bar" style="display: none;">
                <form class="form-area">
                    <div class="form-group">
                        <img class="direction" src="image/compass.svg" alt="#">
                        <input type="text" placeholder="Search hear..">
                        <a href="#" class="serch-icon"><img src="image/search_magnifying_glass.svg" alt="#"></a>
                    </div>
                </form>
            </div>
            <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%25&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> -->

            <div id="map" style="width: 100%; height: 100%;"></div>

            <div class="crime-list-item">
                <button type="submit" class="btn-map" id="myBtn"><?php if(isset($language_data['lbl_view_crimes'])){echo $language_data['lbl_view_crimes'];}else{echo "View Crimes";} ?></button>

                <a href="profile-page.php" class="btn-map btn-map2" id="myBtn"><?php if(isset($language_data['lbl_back_profile'])){echo $language_data['lbl_back_profile'];}else{echo "Back to Profile";} ?></a>

                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-hedar">
                            <h3 class="modal-title"><?php if(isset($language_data['lbl_crimes'])){echo $language_data['lbl_crimes'];}else{echo "Crimes";} ?></h3>
                            <span class="close"><img src="image/close_md.svg"></span>
                        </div>
                      
                      <ul class="modal-content-crime">
                      <div class="alert alert-danger">
                            <button data-dismiss="alert" class="close close-sm" type="button">x</button>
                            <strong> Error!</strong> Kindly set network permission from browser.
                        </div>
                      </ul>
                        

                    </div>
                  
                </div>
                  
            </div>
        </div>
        
    </div>
    <script src="admin/assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="admin/assets/js/popper.js"></script>
	<script src="admin/assets/js/custom_jquery_functions.js"></script>
	<script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- <script src='main.js'></script> -->
    <?php $google_key="AIzaSyBNPYL3NNFFg9Bd1QZ66hAMUwXV3LFl54g"; ?>
    <script src="https://maps.google.com/maps/api/js?key=<?php echo $google_key; ?>" 
          type="text/javascript"></script>
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
            // console.log(cur_lat_lng);
            $("#current_location").val(cur_lat_lng);
            $("#current_lat").val(position.coords.latitude);
            $("#current_lng").val(position.coords.longitude);
            $("#current_location").trigger('change');
            // location.reload();
        }
        $("#current_location").change(function (){
                var current_lat_lng=$("#current_location").val();  
                var focus_lat = $("#current_lat").val();
                var focus_lng = $("#current_lng").val();                          
                var logged_in_user='<?php echo $_SESSION['cz_user_login_id']; ?>';
                
                // console.log(current_lat_lng);
                if(current_lat_lng!="")
                {
                    initMap(focus_lat,focus_lng,[]);
                    // crime_alert_list
                    $.ajax({
                        url: 'ajax_action_php_function.php',
                        type: 'POST',
                        data: {
                            current_lat_lng: current_lat_lng,
                            logged_in_user: logged_in_user,
                            action:'GetNearByCrimes'
                        },
                        error: function() {
                            
                        },
                        success: function(data) {
                            var JSON_data=JSON.parse(data);
                            // console.log(JSON_data);
                            var modal_html_data="";
                            if(JSON_data.data!="")
                            {
                                modal_html_data=JSON_data.crime_list_html;
                                var map_location=[];


                                for (let index = 0; index < JSON_data.data.length; index++) {
                                    var cur_mark_data = JSON_data.data[index];
                                    var cur_lat_lng=cur_mark_data.short_address;
                                    cur_lat_lng=cur_lat_lng.replace("(","");
                                    cur_lat_lng=cur_lat_lng.replace(")","");
                                    var cur_lat_lng_arr=cur_lat_lng.split(",");
                                    var cur_lat=cur_lat_lng_arr[0];
                                    var cur_lng=cur_lat_lng_arr[1];
                                    // console.log(cur_lat_lng_arr);
                                    var cur_address=cur_mark_data.crime_type_name+" at "+cur_mark_data.crime_full_address;

                                    cur_location=[];
                                    // console.log(cur_val['driver_details']);
                                    cur_location[0]="<a target='_blank' href='crime-tip-details.php?id="+cur_mark_data.id+"'>"+cur_address+"</a>";
                                    cur_location[1]=cur_lat;
                                    cur_location[2]=cur_lng;
                                    cur_location[3]=index;

                                    map_location[index]=cur_location;
                                    // console.log(cur_location);
                                    if(index==(JSON_data.data.length-1))
                                    {
                                        // alert('ni');
                                        $("#crime_markers_latlng").val(JSON.stringify(map_location));
                                        $("#crime_markers_latlng").trigger('change');
                                    }
                                }
                                
                            }else
                            {
                                modal_html_data="<li style='text-align: center;margin-top: 90px;'>No Nearby crime available at this moment</li>";
                            }
                            $(".modal-content-crime").html(modal_html_data);
                        }
                    });
                }
            });
        
        $(document).ready(function(){

            
            const myTimeout = setTimeout(
                function ()
                {
                    var current_lat_lng=$("#current_location").val();  
                    var focus_lat = $("#current_lat").val();
                    var focus_lng = $("#current_lng").val();                          
                    var logged_in_user='<?php echo $_SESSION['cz_user_login_id']; ?>';
                    
                    // console.log(logged_in_user);
                    if(current_lat_lng!="")
                    {
                        initMap(focus_lat,focus_lng,[]);
                        // crime_alert_list
                        $.ajax({
                            url: 'ajax_action_php_function.php',
                            type: 'POST',
                            data: {
                                current_lat_lng: current_lat_lng,
                                logged_in_user: logged_in_user,
                                action:'GetNearByCrimes'
                            },
                            error: function() {
                                
                            },
                            success: function(data) {
                                var JSON_data=JSON.parse(data);
                                // console.log(JSON_data);
                                var modal_html_data="";
                                if(JSON_data.data!="")
                                {
                                    modal_html_data=JSON_data.crime_list_html;
                                    var map_location=[];


                                    for (let index = 0; index < JSON_data.data.length; index++) {
                                        var cur_mark_data = JSON_data.data[index];
                                        var cur_lat_lng=cur_mark_data.short_address;
                                        cur_lat_lng=cur_lat_lng.replace("(","");
                                        cur_lat_lng=cur_lat_lng.replace(")","");
                                        var cur_lat_lng_arr=cur_lat_lng.split(",");
                                        var cur_lat=cur_lat_lng_arr[0];
                                        var cur_lng=cur_lat_lng_arr[1];
                                        // console.log(cur_lat_lng_arr);
                                        var cur_address=cur_mark_data.crime_type_name+" at "+cur_mark_data.crime_full_address;

                                        cur_location=[];
                                        // console.log(cur_val['driver_details']);
                                        cur_location[0]="<a target='_blank' href='crime-tip-details.php?id="+cur_mark_data.id+"'>"+cur_address+"</a>";
                                        cur_location[1]=cur_lat;
                                        cur_location[2]=cur_lng;
                                        cur_location[3]=index;

                                        map_location[index]=cur_location;
                                        // console.log(cur_location);
                                        if(index==(JSON_data.data.length-1))
                                        {
                                            // alert('ni');
                                            $("#crime_markers_latlng").val(JSON.stringify(map_location));
                                            $("#crime_markers_latlng").trigger('change');
                                        }
                                    }
                                    
                                }else
                                {
                                    modal_html_data="<li style='text-align: center;margin-top: 90px;'>No Nearby crime available at this moment</li>";
                                }
                                $(".modal-content-crime").html(modal_html_data);
                            }
                        });
                    }
                }
                
                , 1000);
        });
        
        
    </script>
    <script>
        var all_markers=[];

        

        
        function initMap(focus_lat,focus_lng,locations) 
        {
            // console.log(focus_lat);
            focus_lat=parseFloat(focus_lat);
            focus_lng=parseFloat(focus_lng);
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: { lat: focus_lat, lng: focus_lng },
                mapTypeId: "terrain",
            });

            
            // new AutocompleteDirectionsHandler(map);

            var marker, i;

            var infowindow = new google.maps.InfoWindow();
            
            for (i = 0; i < locations.length; i++) 
            {  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });
                all_markers.push(marker);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
        
    </script>
    <script>
        

        
        
            
            
                $("#crime_markers_latlng").change(function(){
                    
                if($("#crime_markers_latlng").val()!="")
                {
                    // alert('ok');
                    var location=$("#crime_markers_latlng").val();
                    location=JSON.parse(location);
                    // location=atob(location);

                    // console.log(location);
                    if(location[0].length)
                    {
                        cur_lat=$("#current_lat").val();
                        cur_lng=$("#current_lng").val();
                        // console.log(location);
                        initMap(cur_lat,cur_lng,location);	

                    }
                }
                });
           

        
    </script>
</body>
</html>