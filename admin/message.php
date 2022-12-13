<?php
if(isset($_SESSION['print']) && $_SESSION['print']!="")
{	$print = $_SESSION['print']; } else { $print = ""; }
if(isset($_SESSION['msg']) && $_SESSION['msg'] != "")
{
	$msg = $_SESSION['msg'];
	if($msg == "up_black")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
         <strong> Error!</strong> emailid and password required.
       </div>
    <?php
	}
  
  if($msg == "invalid_booking_slot")
  {
  ?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
         <strong> Error!</strong> Please Select valid Time Slots.
       </div>
    <?php
  }
  if($msg == "invalid_arguments")
  {
  ?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
         <strong> Error!</strong> Please Enter valid arguments.
       </div>
    <?php
  }
  if($msg == "lead_converted_to_project")
  {
  ?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
         <strong> Error!</strong> No Changes will applied due to lead is converted to project.
       </div>
    <?php
  }
  if($msg == "lead_already_added")
  {
  ?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
         <strong> Error!</strong> Lead Already Added with same mobile or secondary mobile.
       </div>
    <?php
  }
	if($msg == "register_done")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Done!</strong> You are registration successfully. when administrator approved your account, you will able to login in panel.
       </div>
    <?php
	}
	if($msg == "blacklisted")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Done!</strong> You are add complaint in blacklisted successfully. when administrator approved your complaint, you will able to see in blacklisted list.
       </div>
    <?php
	}
	if($msg == "fraud")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Done!</strong> You are add complaint in fraud successfully. when administrator approved your complaint, you will able to see in fraud list.
       </div>
    <?php
	}
	if($msg == "alreay_reg")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> Already email address use for registration, use different and try again.
       </div>
    <?php
	}
	if($msg == "avail")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> Already available please use different.
       </div>
    <?php
	}
	if($msg == "bemail")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> Email id is required.
       </div>
    <?php
	}
	if($msg == "emailnotmatch")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> your email not found in database.
       </div>
    <?php
	}
	if($msg == "passnotsend")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> some problem. please try later.
       </div>
    <?php
	}
	if($msg == "passsend")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> your login details send. please check email.
       </div>
	<?php
	}
	if($msg == "login_fail")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> emailid and password not match. please try gain.
       </div>
	<?php
	}
	if($msg == "vehicle_avail")
	{
	?>
       <div class="alert alert-warning alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Warning!</strong> Vehicle already available please enter others.
       </div>
	<?php
	}
	if($msg == "cat_avail")
	{
	?>
       <div class="alert alert-warning alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Warning!</strong> Category available please enter others..
       </div>
	<?php
	}
	if($msg == "done")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Success!</strong> Your action complete successfully.
       </div>
	<?php
	}
	if($msg == "report_succ")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Success!</strong> your work details save successfully.
       </div>
    <?php
	}
	if($msg == "transfer")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Success!</strong>  Inquiry transfer successfully.
       </div>
	<?php
	}
	if($msg == "error")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> Some problem please try again.
       </div>

	<?php
	}
	if($msg == "report_err")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong>  Some problem to save your work details.
       </div>
    <?php
	}
	if($msg == "mailsendyes")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Success!</strong>  Mail sent successfully.
       </div>
	<?php
	}
	if($msg == "mailsendno")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong>  Some problem in mail sending please try again.
       </div>
	<?php
	}
	if($msg == "deleteyes")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Success!</strong> Details delete successfully.
       </div>
	<?php
	}
	if($msg == "otp_not_match")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> OTP not match. please try again.
       </div>
	<?php
	}
	if($msg == "logout")
	{
	?>
       <div class="alert alert-success alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
         <strong> Success!</strong>  You Logout successfully.
       </div>
	<?php
	}
	if($msg == "not_pass_match")
	{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> password and confirm password not match.
       </div>
	<?php
	}

}
if(isset($_SESSION['print1']))
{
	?>
       <div class="alert alert-danger alert-block">
         <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> <?php echo $_SESSION['print1']; ?>
       </div>
   <?php
}

if(isset($_SESSION['cz_custom_error']) && $_SESSION['cz_custom_error'] != "")
{
  if(isset($_SESSION['cz_custom_error']['msg_type']) && $_SESSION['cz_custom_error']['msg_type']=="error" && isset($_SESSION['cz_custom_error']['err_msg']))
  {
      ?>
      <div class="alert alert-danger">
        <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <strong> Error!</strong> <?php echo $_SESSION['cz_custom_error']['err_msg']; ?>
      </div>
      <?php 
  }else
  {
    if(isset($_SESSION['cz_custom_error']['msg_type']) && $_SESSION['cz_custom_error']['msg_type']!="error" && isset($_SESSION['cz_custom_error']['err_msg']))
    {
      ?>
        <div class="alert alert-success">
          <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
          <strong> Success!</strong> <?php echo $_SESSION['cz_custom_error']['err_msg']; ?>
        </div>
      <?php
    }
  }
}
unset($_SESSION['msg']);
unset($_SESSION['print']);
unset($_SESSION['print1']);
unset($_SESSION['cz_custom_error']);
?>
