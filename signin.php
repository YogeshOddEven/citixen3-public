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
                    <?php include "message.php"; ?>
                        <div class="head-block">
                            <h4 class="title">Acceso</h4>
                            <!-- <h4 class="title">Login</h4> -->
                        </div>
                        <form  class="validate-form" data-err_msg_ele="help"  method="post" action="process/controller_action_api_call.php">
                            <input type="hidden" name="action" value="login"/>
                            <input type="hidden" name="redirect_url_error" value="../signin.php"/>
                            <input type="hidden" name="redirect_url_success" value="../profile-page.php"/>
                            <div class="form-group">
                                <input type="text" placeholder="Correo electrónico / Nombre de usuario" name="user_name"  class="input-group">
                                <!-- <input type="text" placeholder="Email Or Username" name="user_name"  class="input-group"> -->
                            </div>
                            <div class="input-group" style="padding: 0;height: 52px;">
                                <input type="password" placeholder="Clave" class="form-control" name="password" id="password" style="height: 100%;">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="ShowPassword(password,this);" type="button"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <a href="forget-password.php" class="forget-link">¿Se te olvidó tu contraseña?</a>
                            </div>
                            <div class="btn-block">
                                <button type="submit" class="btn btn-primary">Acceso</button> 
                            </div>
                            <!-- <div class="form-group text-center">
                                <p class="sign-text">Don't have an account? <a href="signup.php" class="forget-link">Sign Up</a></p>
                            </div> -->
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