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

         <?php if ($das = $this->session->flashdata('mass')): ?>
	  <div class="alert alert-danger fade show alert-danger" role="alert">
                            <div class="alert-icon"><i class="flaticon2-delete"></i></div>
                            <div class="alert-text"><?php echo $das;?></div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                  </div>
         <?php endif; ?>
       
    <?php if (@$loan_option->loan_status == 'done') {
     ?>     
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Loan Application Form
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_loanapplication/{$customer->customer_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label">*Loan category:</label>
								      <select type="number" name="category_id" class="form-control select2" required>
								      	<option value="">Select Loan Category</option>
								      	<?php foreach ($loan_category as $loan_categorys): ?>
								      	<option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
								      	<?php endforeach; ?>
								      </select>
									</div>

									
									<div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Group:</label>
										<select type="number" name="group_id" class="form-control select2">
											<option value="">Select Group</option>
											<?php foreach ($group as $groups): ?>
											<option value="<?php echo $groups->group_id; ?>"><?php echo $groups->group_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									 <div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Employee:</label>
										<select type="number" name="empl_id" class="form-control select2" required>
											<option value="<?php echo $customer->empl_id; ?>"><?php echo $customer->empl_name; ?></option>
											<?php foreach ($empl_blanch as $empl_blanchs): ?>
											<option value="<?php echo $empl_blanchs->empl_id; ?>"><?php echo $empl_blanchs->empl_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div> 
									<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
									<input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
									<input type="hidden" name="blanch_id" value="<?php echo $customer->blanch_id; ?>">

									<div class="col-lg-2 form-group-sub">
										<label  class="form-control-label">*Loan Amount Applied:</label>
										<input type="number" name="how_loan" placeholder="Loan Amount Applied" autocomplete="off" class="form-control input-sm" required>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Loan Duration:</label>
									<select type="number" name="day" class="form-control select2 input-sm" required>
									<option value="">Select Duration</option>
									<option value="1">Daily</option>
									<option value="7">Weekely</option>
									<?php 
									 $month = date("m");
                                     $year = date("Y");
                                     $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
									 ?>
									<option value="30">Monthly</option>
									
								</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Number of Repayments:</label>
								<input type="number" name="session" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
									</div>
                                 
                                 <div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Interest Formular:</b></label>
										<select type="number" name="rate" class="form-control select2" required>
											<option value="">Select interest Formular</option>
											<?php foreach ($formular as $formulars): ?>	
											<option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
												 ?>
												 SIMPLE FORMULAR
												<?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                                                 FLAT RATE FORMULAR
													<?php }elseif ($formulars->formular_name == 'REDUCING') {
													 ?>
													 REDUCING FORMULAR
													 <?php } ?>
													 	
													 </option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Does Loan is Deducted From Loan Fee?:</b></label>
										<select type="number" name="fee_status" class="form-control select2" required>
											<option value="">Select</option>
											<?php if ($loan_fee_category->fee_category == 'GENERAL') {
											 ?>
											<option value="YES">YES</option>
											<option value="NO">NO</option>
											<?php }elseif ($loan_fee_category->fee_category == 'LOAN PRODUCT') {
											 ?>
											 <option value="NO">YES</option>
											 <?php }else{ ?>
											 	<?php } ?>
										 </select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Reason of Applying Loan:</label>
								<input type="text" name="reason" autocomplete="off"  class="form-control input-sm" placeholder="Reason of Applying Loan:" required>
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
<?php }elseif(@$loan_option == FALSE){ ?>
    <div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Loan Application Form
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/create_loanapplication/{$customer->customer_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label">*Loan category:</label>
								      <select type="number" name="category_id" class="form-control select2" required>
								      	<option value="">Select Loan Category</option>
								      	<?php foreach ($loan_category as $loan_categorys): ?>
								      	<option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
								      	<?php endforeach; ?>
								      </select>
									</div>

									
									<div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Group:</label>
										<select type="number" name="group_id" class="form-control select2">
											<option value="">Select Group</option>
											<?php foreach ($group as $groups): ?>
											<option value="<?php echo $groups->group_id; ?>"><?php echo $groups->group_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									 <div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Employee:</label>
										<select type="number" name="empl_id" class="form-control select2" required>
											<option value="<?php echo $customer->empl_id; ?>"><?php echo $customer->empl_name; ?></option>
											<?php foreach ($empl_blanch as $empl_blanchs): ?>
											<option value="<?php echo $empl_blanchs->empl_id; ?>"><?php echo $empl_blanchs->empl_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
									<input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
									<input type="hidden" name="blanch_id" value="<?php echo $customer->blanch_id; ?>">
									<div class="col-lg-2 form-group-sub">
										<label  class="form-control-label">*Loan Amount Applied:</label>
										<input type="number" name="how_loan" placeholder="Loan Amount Applied" autocomplete="off" class="form-control input-sm" required>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Loan Duration:</label>
									<select type="number" name="day" class="form-control select2 input-sm" required>
									<option value="">Select Duration</option>
									<option value="1">Daily</option>
									<option value="7">Weekely</option>
									<?php 
									 $month = date("m");
                                     $year = date("Y");
                                     $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);
									 ?>
									<option value="30">Monthly</option>
									
								</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Number of Repayments:</label>
								<input type="number" name="session" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
									</div>

									  <div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Interest Formular:</b></label>
										<select type="number" name="rate" class="form-control select2" required>
											<option value="">Select interest Formular</option>
											<?php foreach ($formular as $formulars): ?>	
											<option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
												 ?>
												 SIMPLE FORMULAR
												<?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                                                 FLAT RATE FORMULAR
													<?php }elseif ($formulars->formular_name == 'REDUCING') {
													 ?>
													 REDUCING FORMULAR
													 <?php } ?>
													 	
													 </option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Does Loan is Deducted From Loan Fee?:</b></label>
										<select type="number" name="fee_status" class="form-control select2" required>
											<option value="">Select</option>
											
											<?php if ($loan_fee_category->fee_category == 'GENERAL') {
											 ?>
											<option value="YES">YES</option>
											<option value="NO">NO</option>
											<?php }elseif ($loan_fee_category->fee_category == 'LOAN PRODUCT') {
											 ?>
											 <option value="NO">YES</option>
											 <?php }else{ ?>
											 	<?php } ?>
											
										</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Reason of Applying Loan:</label>
								<input type="text" name="reason" autocomplete="off"  class="form-control input-sm" placeholder="Reason of Applying Loan:" required>
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

<?php }elseif($loan_option->loan_status == 'open'){ ?>

     <div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Loan Application Form
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/modify_loanapplication/{$customer->customer_id}/{$skip_next->loan_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label">*Loan category:</label>
								      <select type="number" name="category_id" class="form-control select2" required>
								      	<option value="<?php echo $skip_next->category_id; ?>"><?php echo $skip_next->loan_name; ?> / <?php echo $skip_next->loan_price; ?> -  <?php echo $skip_next->loan_perday; ?></option>
								      	<?php foreach ($loan_category as $loan_categorys): ?>
								      	<option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
								      	<?php endforeach; ?>
								      </select>
									</div>

									
									<div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Group:</label>
										<select type="number" name="group_id" class="form-control select2">
											<option value="">Select Group</option>
											<?php foreach ($group as $groups): ?>
											<option value="<?php echo $groups->group_id; ?>"><?php echo $groups->group_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									 <div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Employee:</label>
										<select type="number" name="empl_id" class="form-control select2" required>
											<option value="<?php echo $customer->empl_id; ?>"><?php echo $customer->empl_name; ?></option>
											<?php foreach ($empl_blanch as $empl_blanchs): ?>
											<option value="<?php echo $empl_blanchs->empl_id; ?>"><?php echo $empl_blanchs->empl_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">

									<input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
									<input type="hidden" name="blanch_id" value="<?php echo $customer->blanch_id; ?>">
									<input type="hidden" name="loan_status" value="open">

									<div class="col-lg-2 form-group-sub">
										<label  class="form-control-label">*Loan Amount Applied:</label>
										<input type="number" name="how_loan" value="<?php echo $skip_next->how_loan; ?>" placeholder="Loan Amount Applied" autocomplete="off" class="form-control input-sm" required>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Loan Duration:</label>
									<select type="number" name="day" class="form-control select2 input-sm" required>
									<option value="<?php echo $skip_next->day; ?>">
										<?php if ($skip_next->day == '1') {
											echo "Daily";
										  ?>
										<?php }elseif($skip_next->day == '7'){
											 echo "Weekly";
										 ?>
										 <?php }elseif($skip_next->day == '30' || $skip_next->day == '31' || $skip_next->day == '28' || $skip_next->day == '29'){
										 	echo "Monthly";
										  ?>
											<?php } ?>
										</option>
									<option value="1">Daily</option>
									<option value="7">Weekly</option>
									<?php 
									 $month = date("m");
                                     $year = date("Y");
                                     $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);
									 ?>
									<option value="30">Monthly</option>
									
								</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Number of Repayments:</label>
								<input type="number" name="session" value="<?php echo $skip_next->session; ?>" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
									</div>

									  <div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Interest Formular:</b></label>
										<select type="number" name="rate"  class="form-control select2" required>
											<option value="<?php echo $skip_next->rate; ?>"><?php if ($skip_next->rate == 'SIMPLE') {
												 ?>
												<?php echo "SIMPLE FORMULAR"; ?>
												<?php }elseif ($skip_next->rate == 'FLAT RATE') {
													echo "FLAT RATE FORMULAR";
												 ?>
												 <?php }elseif($skip_next->rate == 'REDUCING'){ ?>
												 	<?php echo "REDUCING FORMULAR"; ?>
												 <?php } ?>
												 </option>
											<?php foreach ($formular as $formulars): ?>	
											<option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
												 ?>
												 SIMPLE FORMULAR
												<?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                                                 FLAT RATE FORMULAR
													<?php }elseif ($formulars->formular_name == 'REDUCING') {
													 ?>
													 REDUCING FORMULAR
													 <?php } ?>
													 	
													 </option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Does Loan is Deducted From Loan Fee?:</b></label>
										<select type="number" name="fee_status" class="form-control select2" required>
											<option value="<?php echo $skip_next->fee_status;?>"><?php echo $skip_next->fee_status;?></option>
											
											<?php if ($loan_fee_category->fee_category == 'GENERAL') {
											 ?>
											<option value="YES">YES</option>
											<option value="NO">NO</option>
											<?php }elseif ($loan_fee_category->fee_category == 'LOAN PRODUCT') {
											 ?>
											 <option value="NO">YES</option>
											 <?php }else{ ?>
											 	<?php } ?>
											
										</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Reason of Applying Loan:</label>
								<input type="text" name="reason" value="<?php echo $skip_next->reason; ?>" autocomplete="off"  class="form-control input-sm" placeholder="Reason of Applying Loan:" required>
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
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Update</button>
								<a href="<?php echo base_url("oficer/collelateral_session/{$skip_next->loan_id}") ?>" class="btn btn-info btn-elevate btn-pill btn-sm">Skip</a>
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

	<?php }elseif(@$reject_skip->loan_status == 'reject'){ ?>
	     <div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Loan Application Form
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("oficer/modify_loanapplication/{$customer->customer_id}/{$reject_skip->loan_id}",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label">*Loan category:</label>
								      <select type="number" name="category_id" class="form-control select2" required>
								      	<option value="<?php echo $reject_skip->category_id; ?>"><?php echo $reject_skip->loan_name; ?> / <?php echo $reject_skip->loan_price; ?> -  <?php echo $reject_skip->loan_perday; ?></option>
								      	<?php foreach ($loan_category as $loan_categorys): ?>
								      	<option value="<?php echo $loan_categorys->category_id; ?>"><?php echo $loan_categorys->loan_name; ?> / <?php echo $loan_categorys->loan_price; ?> - <?php echo $loan_categorys->loan_perday; ?></option>
								      	<?php endforeach; ?>
								      </select>
									</div>

									
									<div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Group:</label>
										<select type="number" name="group_id" class="form-control select2">
											<option value="">Select Group</option>
											<?php foreach ($group as $groups): ?>
											<option value="<?php echo $groups->group_id; ?>"><?php echo $groups->group_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									 <div class="col-lg-2 form-group-sub">
										<label class="form-control-label">*Employee:</label>
										<select type="number" name="empl_id" class="form-control select2" required>
											<option value="<?php echo $customer->empl_id; ?>"><?php echo $customer->empl_name; ?></option>
											<?php foreach ($empl_blanch as $empl_blanchs): ?>
											<option value="<?php echo $empl_blanchs->empl_id; ?>"><?php echo $empl_blanchs->empl_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">

									<input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
									<input type="hidden" name="blanch_id" value="<?php echo $customer->blanch_id; ?>">
									<input type="hidden" name="loan_status" value="open">

									<div class="col-lg-2 form-group-sub">
										<label  class="form-control-label">*Loan Amount Applied:</label>
										<input type="number" name="how_loan" value="<?php echo $reject_skip->how_loan; ?>" placeholder="Loan Amount Applied" autocomplete="off" class="form-control input-sm" required>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Loan Duration:</label>
									<select type="number" name="day" class="form-control select2 input-sm" required>
									<option value="<?php echo $reject_skip->day; ?>">
										<?php if ($reject_skip->day == '1') {
											echo "Daily";
										  ?>
										<?php }elseif($reject_skip->day == '7'){
											 echo "Weekly";
										 ?>
										 <?php }elseif($reject_skip->day == '30' || $reject_skip->day == '31' || $reject_skip->day == '28' || $reject_skip->day == '29'){
										 	echo "Monthly";
										  ?>
											<?php } ?>
										</option>
									<option value="1">Daily</option>
									<option value="7">Weekly</option>
									<?php 
									 $month = date("m");
                                     $year = date("Y");
                                     $d = cal_days_in_month(CAL_GREGORIAN,$month,$year);
									 ?>
									<option value="30">Monthly</option>
									
								</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Number of Repayments:</label>
								<input type="number" name="session" value="<?php echo $reject_skip->session; ?>" placeholder="Enter Number of Repayments" autocomplete="off" class="form-control input-sm" required>
									</div>

									  <div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Interest Formular:</b></label>
										<select type="number" name="rate"  class="form-control select2" required>
											<option value="<?php echo $reject_skip->rate; ?>"><?php if ($reject_skip->rate == 'SIMPLE') {
												 ?>
												<?php echo "SIMPLE FORMULAR"; ?>
												<?php }elseif ($reject_skip->rate == 'FLAT RATE') {
													echo "FLAT RATE FORMULAR";
												 ?>
												 <?php }elseif($reject_skip->rate == 'REDUCING'){ ?>
												 	<?php echo "REDUCING FORMULAR"; ?>
												 <?php } ?>
												 </option>
											<?php foreach ($formular as $formulars): ?>	
											<option value="<?php echo $formulars->formular_name; ?>"><?php if ($formulars->formular_name == 'SIMPLE') {
												 ?>
												 SIMPLE FORMULAR
												<?php }elseif($formulars->formular_name == 'FLAT RATE'){ ?>
                                                 FLAT RATE FORMULAR
													<?php }elseif ($formulars->formular_name == 'REDUCING') {
													 ?>
													 REDUCING FORMULAR
													 <?php } ?>
													 	
													 </option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-3 form-group-sub">
										<label class="form-control-label"><b>*Does Loan is Deducted From Loan Fee?:</b></label>
										<select type="number" name="fee_status" class="form-control" required>
											<option value="<?php echo $reject_skip->fee_status;?>"><?php echo $reject_skip->fee_status;?></option>
											
											<?php if ($loan_fee_category->fee_category == 'GENERAL') {
											 ?>
											<option value="YES">YES</option>
											<option value="NO">NO</option>
											<?php }elseif ($loan_fee_category->fee_category == 'LOAN PRODUCT') {
											 ?>
											 <option value="NO">YES</option>
											 <?php }else{ ?>
											 	<?php } ?>
											
										</select>
									</div>

									<div class="col-lg-3 form-group-sub">
										<label  class="form-control-label">*Reason of Applying Loan:</label>
								<input type="text" name="reason" value="<?php echo $reject_skip->reason; ?>" autocomplete="off"  class="form-control input-sm" placeholder="Reason of Applying Loan:" required>
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
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Update</button>
								<a href="<?php echo base_url("oficer/collelateral_session/{$reject_skip->loan_id}") ?>" class="btn btn-info btn-elevate btn-pill btn-sm">Skip</a>
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
	<?php }else{ ?>
 <div class="text-center">
    <h1>
        <br><br><br>
OOPS!  Loan Account is Claimed</h1>
      <a href="<?php echo base_url("oficer/loan_application"); ?>" class="btn btn-info">Back</a>
    </div>
		<?php } ?>

<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>

<script>
    $('.select2').select2();
</script>

