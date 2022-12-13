<?php
ob_start();
session_start();
// session_unset();
// session_destroy();
unset($_SESSION['cz_user_uname']);
unset($_SESSION['cz_user_mobile']);
unset($_SESSION['cz_user_emailid']);
unset($_SESSION['cz_user_login_id']);
unset($_SESSION['cz_utype']);
session_start();
// $_SESSION['msg'] = "logout";
$_SESSION['cz_custom_error']['msg_type']="success";
$_SESSION['cz_custom_error']['err_msg']="Logout Successfully";
header("location:../signin.php");
?>