<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
<style>
    .select2-container .select2-selection--single{
    height:37px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
</style>	





<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">					
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   
</div>
<!-- end:: Subheader -->										
<!-- begin:: Content -->
<!-- begin:: Content -->


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--begin::Portlet-->
	<?php if ($das = $this->session->flashdata('massage')): ?>
	  <div class="alert alert-success fade show alert-success" role="alert">
                            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                            <div class="alert-text"><?php echo $das;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>

         	<?php if ($dasy = $this->session->flashdata('error')): ?>
	  <div class="alert alert-danger fade show alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon2-delete"></i></div>
                            <div class="alert-text"><?php echo $dasy;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>
         
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Register Customer
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_customer",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*First Name:</label>
							<input type="text" name="f_name" placeholder="First name" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Middle name:</label>
									<input type="text" name="m_name" placeholder="Middle name" autocomplete="off" class="form-control input-sm" required>
								</div>
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Last name:</label>
									<input type="text" name="l_name" placeholder="Last name" autocomplete="off" class="form-control input-sm" required>
								</div>

								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Branch:</label>
								<select type="number" name="blanch_id" class="form-control select2 input-sm" id="blanch" required class="form-control input-sm">
								<option value="">Select Blanch</option>
								<?php foreach ($blanch as $blanchs): ?>
								<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
								<?php endforeach;?>
							</select>
								</div>

								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Employee:</label>
								<select type="number" name="empl_id" class="form-control select2 input-sm" id="empl" required class="form-control input-sm">
								<option value="">Select Employee</option>
								
							</select>
								</div>
						
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Gender:</label>
								<select type="text" name="gender" class="form-control select2 input-sm" required class="form-control input-sm">
								<option value="">Select Gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Date of Birth:</label>
							<input type="text" name="date_birth" onchange="getDate(this.value)" placeholder="Date of Birth" autocomplete="off" class="form-control input-sm" required>
								</div>
								<div class="col-lg-4 form-group-sub">
									<label  class="form-control-label">*Year:</label>
							<input type="" id="age" name="" readonly class="form-control input-sm" value="">
								</div>
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Phone Number:</label>
							<input type="number" name="phone_no" placeholder="Eg,7538, 6283" autocomplete="off" class="form-control input-sm" required >
								</div>
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Region:</label>
							<select type="number" name="region_id" class="form-control select2 input-sm" required>
								<option value="">Select Region</option>
                                <?php foreach ($region as $regions): ?>
								<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
								<?php endforeach;?>
							</select>
								</div>
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*District:</label>
							<input type="text" name="district" placeholder="district" autocomplete="off" class="form-control input-sm" required>
								</div>
									<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Ward:</label>
							<input type="text" name="ward" placeholder="Ward" autocomplete="off" class="form-control input-sm" required>
								</div>
										<div class="col-lg-4 form-group-sub">
									<label class="form-control-label">*Street:</label>
							<input type="text" name="street" placeholder="street" autocomplete="off" class="form-control input-sm" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Next</button>
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>


<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>


<script>
	function getDate(data){
  let now = new Date();
  let bod = (new Date(data));

  let age = now.getFullYear() - bod.getFullYear();
   let _age = document.querySelector("#age");
   _age.value = age;
 //alert(age)
}
</script>

<script>
    $('.select2').select2();
</script>



<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>admin/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>