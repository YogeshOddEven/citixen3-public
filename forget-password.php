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
                            <h4 class="title">Se te olvidó tu contraseña</h4>
                        </div>
                        <form  class="validate-form" data-err_msg_ele="help"  method="post" action="process/controller_action_api_call.php">
                            <input type="hidden" name="action" value="forgot_password"/>
                            <input type="hidden" name="redirect_url_error" value="../forget-password.php"/>
                            <input type="hidden" name="redirect_url_success" value="../signin.php"/>
                            <div class="form-group">
                                <input type="email" placeholder="Ingrese correo electrónico" name="email" class="input-group">
                            </div>
                            
                            <div class="btn-block">
                                <button type="submit" class="btn btn-primary">Solicitar Restablecimiento de Contraseña</button> 
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