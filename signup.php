<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home | Citizen 3</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
    <!--Bootstrap.min css-->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Icons -->
	<link href="admin/assets/css/icons.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<link rel='stylesheet' type='text/css' media='screen' href='css/style.css?v=<?php echo uniqid(); ?>'>
</head>
<?php include "lock-no-login-require.php"; ?>
<body>
    <div class="section-sigin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="logo-block text-center">
                        <a href="#" class="logo-brand">
                            <img src="image/citizen-logo.png" alt="#" />
                        </a>
                    </div>
                    <div class="sign-in-block">
                        <div class="head-block">
                            <h4 class="title">Register</h4>
                        </div>
                        <form  class="validate-form" data-err_msg_ele="help"  method="post" action="process/controller_action_api_call.php">
                            <input type="hidden" name="action" value="register"/>
                            <input type="hidden" name="redirect_url_error" value="../signup.php"/>
                            <input type="hidden" name="redirect_url_success" value="../signin.php"/>
                            <div class="form-group">
                                <input type="text" data-is_validate="1" id="fname" name="fname" placeholder="First Name*" class="input-group">
                                <span class="help text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Last Name" id="lname" name="lname" class="input-group">
                                <span class="help text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Maternal Last Name" id="pname" name="pname" class="input-group">
                                <span class="help text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" data-is_validate="1" id="email" name="email" placeholder="Email address*" class="input-group">
                                <span class="help text-danger"></span>
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone*" data-is_validate="1" id="mobile" name="mobile" class="input-group">
                                <span class="help text-danger"></span>
                                
                            </div>
                            <div class="input-group form-group" style="padding: 0;height: 52px;">
                                <input type="password" placeholder="Password" class="form-control" name="password" id="password" style="height: 100%;">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="ShowPassword(password,this);" type="button"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="form-group" style="display: none;">
                                <input type="passowrd" data-is_validate="0" placeholder="Confirm Password" class="input-group">
                                <span class="help text-danger"></span>
                            </div>
                            <div class="form-group">
                                <select  name="language_code" class="form-control" id="language_code" >
                                    <option  value="es">Spanish</option>
                                    <option  value="en">English</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="sign-text acept-text" >
                                    <input type="checkbox"  id="checkbox_terms" data-error_msg="Privacy Policy Confirmation Required" data-is_validate="1">
                                    <label for="checkbox_terms">I accept the <a href="#" class="forget-link">Privacy Policy</a></label>
                                    <br>
                                    <span class="help text-danger"></span>
                                </span>
                                
                            </div>
                            
                            <div class="btn-block">
                                <button type="submit" class="btn btn-primary">Sign Up</button> 
                            </div>
                            <div class="form-group text-center">
                                <p class="sign-text">Have an account already? <a href="signin.php" class="forget-link">Log in</a></p>
                            </div>
                        </form>
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
</body>
</html>