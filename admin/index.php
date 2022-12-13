<?php
ob_start();
session_start();
include("process/config.php");
include("functions.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Citizen3 Admin" name="description">
	<meta content="Citizen3 Admin" name="author">

	<!-- Title -->
	<title>Citizen3 Admin</title>

	<!-- Favicon -->
	<link href="assets/img/brand/favicon.png" rel="icon" type="image/png">

	<!-- Icons -->
	<link href="assets/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Ansta CSS -->
	<link href="assets/css/dashboard.css" rel="stylesheet" type="text/css">
	
	<!-- Data table css -->
	<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	
	<!-- Tabs CSS -->
	<link href="assets/plugins/tabs/style.css" rel="stylesheet" type="text/css">

	<!-- jvectormap CSS -->
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

	<!-- Custom scroll bar css-->
	<link href="assets/plugins/customscroll/jquery.mCustomScrollbar.css" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="assets/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">

	<!-- Sweet Alert css -->
    <link href="assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<!--<link href="assets/plugins/jquery.filer/src/jquery.fileuploader.css" rel="stylesheet" />	-->
	<link href="assets/plugins/owl/owl.css" rel="stylesheet" type="text/css" />	
	<script src="assets/js/ajax.js"></script>
	
	<!--Select2 css-->
	<link rel="stylesheet" href="assets/plugins/select2/select2.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
	<link href="assets/plugins/jquery.filer/src/jquery.fileuploader.css" rel="stylesheet" />
	<?php 
	if(isset($_REQUEST['pid']) &&  $_REQUEST['pid']=="home")
	{
	?>
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="assets/css/custom_dashboard.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<?php } ?>
</head>
<body class="app sidebar-mini rtl">
	<div class="page">
		<div class="page-main">
			<?php include("sidebar.php"); ?>
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<?php include("topbar.php"); ?>	
						<div class="container-fluid pt-8">
							<?php include("content.php"); ?>
						</div>
					</div>
			    </div>
			</div>
	    </div>
	</div>
	<!-- Back to top -->
	<a href="#top" id="back-to-top" class="d-print-none"><i class="fa fa-angle-up"></i></a>
	<!-- Ansta Scripts -->
	<!-- Core -->
	<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/custom_jquery_functions.js"></script>
	<!-- Fullside-menu Js-->
	<script src="assets/plugins/toggle-sidebar/js/sidemenu.js"></script>

	<!-- Data tables -->
	<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>

	<!-- Date Picker-->
	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	
	<!-- Custom scroll bar Js-->
	<script src="assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js"></script>

	<!--Select2 js-->
	<script src="assets/plugins/select2/select2.full.js"></script>
	<script src="assets/js/select2.js"></script>

	<!-- Sweet Alert Js  -->
    <script src="assets/plugins/sweet-alert/sweetalert2.min.js"></script>
	
	<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	
	<script src="assets/plugins/jquery.filer/src/jquery.fileuploader.min.js"></script>
	<script src="assets/plugins/owl/owl.js"></script>
	<script type="text/javascript">
		$('#prod-preview-carousel').owlCarousel({
		    loop:true,
		    margin:10,
		    nav:false,
		    autoplay:true,
    		autoplayTimeout:2000,
    		autoplayHoverPause:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:1
		        },
		        1000:{
		            items:1
		        }
		    }
		});
	</script>

	<?php 
	if(isset($_REQUEST['pid']) &&  ($_REQUEST['pid']=="add_ride" || $_REQUEST['pid']=="create_ride"))
	{
		?>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyCFGtlwJwkgasKTqmnPB5FHBT0qYmaanFk"></script>
		<script type="text/javascript">
			
			// function initialize() {
			//   var input = document.getElementById('source');
			//   new google.maps.places.Autocomplete(input);

			//   var input2 = document.getElementById('destination');
			//   new google.maps.places.Autocomplete(input2);
			// }

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<?php
	}
	if(isset($_REQUEST['pid']) &&  $_REQUEST['pid']=="calendar")
	{
	?>
	<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<?php } ?>
<?php 
	/*if(isset($_REQUEST['pid']) &&  $_REQUEST['pid']=="home")
	{
		include('assets/js/dashboard_chart_js.php');
	?>
		<script type="text/javascript" src="assets/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="assets/plugins/visualization/c3/c3.min.js"></script>    
        <script type="text/javascript" src="assets/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="assets/plugins/visualization/d3/d3_tooltip.js"></script>
        <script src="assets/plugins/chart/jquery.flot.js"></script>
        <script src="assets/plugins/chart/jquery.flot.categories.js"></script>
        <script src="assets/plugins/chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/chart/jquery.flot.tooltip.js"></script>
        
<?php }*/ ?>	
	<!-- Ansta JS -->
	<script src="assets/js/custom.js"></script>
	<?php //include("assets/js/dashboard-js.php"); ?>
	<script>
		$(function(e) {
			$('.datatable').DataTable();
			$('#datatable').DataTable();
		} );

	</script>
	<script type="text/javascript">
		 $(document).ready(function(){
			$(document).on('click','.show_more',function(){
				var ID = $(this).attr('id');
				var CID = document.getElementById("complainid").value;
				var i_id = document.getElementById("i_id").value;
				$('.show_more').hide();
				$('.loding').show();
				$.ajax({
					type:'POST',
					url:'ajax_more.php',
					data:'id='+ID+'&cid='+CID+'&i_id='+i_id,
					success:function(html){
					$('#show_more_main'+ID).remove();
					$('.tutorial_list').append(html);
				}
			   });
		     });
		});
		$('.datepicker').datepicker({
			 format: 'dd-mm-yyyy',
			 autoclose:!0,
			 showOtherMonths: true,
			 selectOtherMonths: true
	    });
		$('.timepicker').timepicker(
		{
				autoclose: true,
				startDate: new Date(),
				minuteStep: 15,
				showSeconds: 0,
				showMeridian: true
		});

		$('.decimal').keyup(function(){
			var val = $(this).val();
			if(isNaN(val)){
				 val = val.replace(/[^0-9\.]/g,'');
				 if(val.split('.').length>2) 
					 val =val.replace(/\.+$/,"");
			}
			$(this).val(val); 
		});
		$(".decimal1").on("change", function() {
			var val = this.value;
			if (val.match(/\./g)) { //See if it already has a dot
				if (val.replace(/\./g, "").match(/^\d+$/) !== null) { //Check if it's number after removing the dot
				this.value = parseFloat(val, 10).toFixed(2); //Yes, so format number
				} else {
					//Not a number, so reset the input value
					//Log a msg if need be: "Only numbers allowed!";
					this.value = "";
					this.focus();
				}
			} else {
				//No dot found, so, see if it's a number        
				if (val.match(/^\d+$/) !== null) {
					this.value = parseFloat(val, 10).toFixed(2); //Yes, so format number
				} else {
					//Not a number, so reset the input value
					//Log a msg if need be: "Only numbers allowed!";
					this.value = "";
					this.focus();
				}
			}
		});
    </script>
	<script type="text/javascript">
		$(function(){
			$(".searchid").keyup(function() 
			{ 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				if(searchid != '')
				{
					$.ajax({
						type: "POST",
						url: "search.php",
						data: dataString,
						cache: false,
						success: function(html)
						{
							$("#searchid_result").html(html).show();
						}
					});
				} else {
					$("#searchid_result").hide();
					return false;    
				}
			});
			jQuery(document).on("click", function(e) { 
				var $clicked = $(e.target);
				if (! $clicked.hasClass("searchid"))
				{
					jQuery("#searchid_result").fadeOut(); 
				}
			});
			$(".searchid1").keyup(function() 
			{ 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				if(searchid != '')
				{
					$.ajax({
						type: "POST",
						url: "search.php",
						data: dataString,
						cache: false,
						success: function(html)
						{
							$("#searchid_result1").html(html).show();
						}
					});
				} else {
					$("#searchid_result1").hide();
					return false;    
				}
			});
		});
		$(document).on('click', '.removeitem', function(){
			$(this).closest('tr').remove();
			check_q_grandtotal();
		});
	</script>
	
	<script type="text/javascript">
		$('.multi-upload-file').fileuploader({
        addMore: true,
        extensions: ['jpg', 'jpeg', 'png', 'gif','pdf','doc','txt','docx','ppt','pptx'] // allowed extensions or types {Array}
    });

		$('.single-upload-file').fileuploader({
        addMore: false,
        extensions: ['jpg', 'jpeg', 'png', 'gif','pdf','doc','txt'] // allowed extensions or types {Array}
    });
	</script>


	
	
				<script src="assets/plugins/tinymce/tinymce.min.js"></script>
				<script type="text/javascript">
		            $(document).ready(function () {
		                if($(".text-editor").length > 0){
		                    tinymce.init({
		                        selector: "textarea.text-editor",
		                        theme: "modern",
		                        height:300,
		                        plugins: [
		                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		                            "save table contextmenu directionality emoticons template paste textcolor"
		                        ],
		                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
		                        style_formats: [
		                            {title: 'Bold text', inline: 'b'},
		                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		                            {title: 'Example 1', inline: 'span', classes: 'example1'},
		                            {title: 'Example 2', inline: 'span', classes: 'example2'},
		                            {title: 'Table styles'},
		                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		                        ]
		                    });
		                }
		            });
		        </script>
		
	<style type="text/css">
		#modal_zoom_img img
		{
			width:100%;
			height: auto;
		}
	</style>
	<div class="modal fade modal-dialog-top " id="modal_zoom_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 <div class="modal-dialog ">
			  <div class="modal-content-wrap">
				   <div class="modal-content">
						
						<div class="modal-body text-center">
							<button type="button" class="close" style="position: absolute;right: 10px;top: 2px;" data-dismiss="modal" aria-hidden="true">&times;</button>

						</div>
						
				   </div>
			  </div>
		  </div>
	  </div>
	  <script type="text/javascript">
	  	function CheckNewNotification()
	  	{
	  		
	  		if($('#ModalEmergencyNotification').hasClass('show')==false)
	  		{
	  			
	  			$("#ParentEmergencyDiv").load(location.href + " #EmergencyNotifyDiv");
	  			if($("#check_notify_avail").val()=="1")
	  			{
	  				$("#ModalEmergencyNotification").modal("show");	
	  				// console.log($("#ModalEmergencyNotification"));
	  			}
	  			// $("#ModalEmergencyNotification").modal("show");
	  		}
	  		
	  	}
	 	$(document).ready(function(){
	 		setInterval(function(){
			    CheckNewNotification();

			}, 10000);
	 	}); 	
	  </script>
	
	
	
	<?php 
	if(isset($_REQUEST['pid']) &&  $_REQUEST['pid']=="view_all_notifications")
	{
		?>
		<script>
			
			$("#search_type").change(function (){
				if($(this).val()=="0")
				{
					$("#driver_search_wrapper").show();
					$("#rider_search_wrapper").hide();
				}
				else if($(this).val()=="1")
				{
					$("#driver_search_wrapper").hide();
					$("#rider_search_wrapper").show();
				}else
				{
					$("#driver_search_wrapper").hide();
					$("#rider_search_wrapper").hide();
				}
			});
			
		</script>

		<?php
	}
	
	?>
</body>
</html>
