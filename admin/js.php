<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/custom_jquery_functions.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

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
	
	<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	
	<!-- Ansta JS -->
	<script src="assets/js/custom.js"></script>
		<script>
		$(function(e) {
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
	</script>