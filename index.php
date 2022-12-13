<?php session_start(); ?>
<?php 
    if(isset($_SESSION['cz_user_login_id']) && $_SESSION['cz_user_login_id']>0)
    {
        header("Location:profile-page.php");
    }else
    {
        header("Location:signin.php");

    }
?>