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



<div class="row">
	<div class="col-lg-6">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						ADD LOAN FEE CATEGORY
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_loanfee_category",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-12 form-group-sub">
									<label class="form-control-label">Loan Fee Category*:</label>
									<select type="text" name="fee_category" class="form-control" required>
										<option value="">---Select Loan fee Category---</option>
										<option value="LOAN PRODUCT">Loan Fee By Loan Product</option>
										<option value="GENERAL">Loan Fee By General</option>
									</select>
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<?php if ($fee_category == TRUE) {
								 ?>
								<?php }elseif($fee_category == FALSE){ ?>
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Save</button>
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
	<div class="col-lg-6">
		<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				LOAN FEE CATEGORY
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    
												<th>Loan Fee Category</th>
												<th>Action</th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php //$no = 1; ?>
								<?php foreach ($fee_category as $fee_categorys): ?>
									          <tr>
				  					<td class="c">
				  						<?php if ($fee_categorys->fee_category == 'LOAN PRODUCT') {
				  						 ?>
				  						 LOAN FEE BY LOAN PRODUCT
				  						<?php }elseif ($fee_categorys->fee_category == 'GENERAL') {
				  						 ?>
				  						 LOAN FEE BY GENERAL
				  						 <?php } ?>
				  						<?php //echo $fee_categorys->fee_category; ?>
				  							
				  						</td>
				  					
				  				<td>	
				  			<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_0<?php echo $fee_categorys->id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_0<?php echo $fee_categorys->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Loan Fee Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/modify_loanfee_category/{$fee_categorys->id}"); ?>
                    <div class="form-group">
                        <label>*Loan Fee Category:</label>
                       <select type="text" name="fee_category" class="form-control" required>
						<option value="<?php echo $fee_categorys->fee_category; ?>">
							<?php if ($fee_categorys->fee_category == 'LOAN PRODUCT') {
				  						 ?>
	  						 LOAN FEE BY LOAN PRODUCT
	  						<?php }elseif ($fee_categorys->fee_category == 'GENERAL') {
	  						 ?>
	  						 LOAN FEE BY GENERAL
	  						 <?php } ?>
								
							</option>
						<option value="LOAN PRODUCT">Loan Fee By Loan Product</option>
						<option value="GENERAL">Loan Fee By General</option>
						</select>
                    </div>
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
									
	                </tbody>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
	</div>
</div>








<?php if (@$fee_category_data->fee_category == 'LOAN PRODUCT') {
 ?>
 <div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Loan Category List
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
	  							   <th>S/No.</th>
									<th>Loan Category name</th>
									<th>Loan level</th>
									<!-- <th>Loan Return</th> -->
									<th>Loan Interest</th>
									<th>Loan Fee Type</th>
									<th>Loan Fee</th>
									<th>Action</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                         <?php $no = 1; ?>
									<?php foreach ($loan_category as $loan_categorys): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $loan_categorys->loan_name; ?></td>
				  					<td><?php echo number_format($loan_categorys->loan_price); ?> - <?php echo  number_format($loan_categorys->loan_perday);  ?> </td>
				  					
				  					<td><?php echo $loan_categorys->interest_formular; ?>%</td>
				  					<td>
				  						<?php if ($loan_categorys->fee_category_type =='MONEY') {
				  						 ?>
				  						 MONEY VALUE
				  						<?php }elseif ($loan_categorys->fee_category_type =='PERCENTAGE') {
				  						 ?>
				  						 PERCENTAGE VALUE
				  						 <?php } ?>
				  						<?php //echo $loan_categorys->fee_category_type; ?>
				  							
				  						</td>
				  					<td>
				  						 
				  					  <?php if ($loan_categorys->fee_category_type =='MONEY') {
				  						 ?>
				  						 <?php echo number_format($loan_categorys->fee_value); ?> / Tsh
				  						<?php }elseif ($loan_categorys->fee_category_type =='PERCENTAGE') {
				  						 ?>
				  						<?php echo $loan_categorys->fee_value; ?>%
				  						 <?php } ?>
				  						
				  					</td>
				  				<td>	
				  			<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $loan_categorys->category_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					<!-- <li class="kt-nav__item">
						<a href="<?php //echo base_url("admin/delete_loancategory/{$loan_categorys->category_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li> -->
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php echo $loan_categorys->category_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Loan Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/update_loanCategory_loanfee/{$loan_categorys->category_id}"); ?>
                    <div class="form-group">
                    	<div class="row">
                    		<div class="col-lg-3">
                        <label for="recipient-name" class="form-control-label">*Loan Category Name:</label>
                        <input type="text" class="form-control" autocomplete="off" name="loan_name" value="<?php echo $loan_categorys->loan_name; ?>">
                        </div>
                        <div class="col-lg-3">
                         <label for="recipient-name" class="form-control-label">*From:</label>
                        <input type="number" class="form-control" autocomplete="off" name="loan_price" value="<?php echo $loan_categorys->loan_price; ?>">
                         </div>
                         <div class="col-lg-3">
                        <label for="recipient-name" class="form-control-label">*To:</label>
                        <input type="text" class="form-control" autocomplete="off" name="loan_perday" value="<?php echo $loan_categorys->loan_perday; ?>">
                       </div>
                         <div class="col-lg-3">
                        <label for="recipient-name" class="form-control-label">*Loan Interest(%):</label>
                        <input type="number" class="form-control" autocomplete="off" name="interest_formular" value="<?php echo $loan_categorys->interest_formular; ?>">
                    </div>
                    <div class="col-lg-6">
                    	<label for="recipient-name" class="form-control-label">*Loan Fee Type:</label>
                    	<select type="text" name="fee_category_type" class="form-control">
                    		<option value="<?php echo $loan_categorys->fee_category_type; ?>">
                    			<?php if ($loan_categorys->fee_category_type == TRUE) {
                    			 ?>
                    			<?php echo $loan_categorys->fee_category_type; ?>
                    		<?php }elseif ($loan_categorys->fee_category_type == FALSE) {
                    		 ?>
                    		 ---Select Loan Fee Type---
                    		 <?php } ?>
                    				
                    			</option>
                    		<option value="MONEY">MONEY VALUE</option>
                    		<option value="PERCENTAGE">PERCENTAGE VALUE</option>
                    	</select>
                       </div>

                         <div class="col-lg-6">
                        <label for="recipient-name" class="form-control-label">*Loan Fee:</label>
                        <input type="number" class="form-control" autocomplete="off" name="fee_value" value="<?php echo $loan_categorys->fee_value; ?>">
                    </div>
                   </div>
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
               <th>S/No.</th>
			<th>Loan Category name</th>
			<th>Loan level</th>
			<!-- <th>Loan Return</th> -->
			<th>Loan Interest</th>
			<th>Loan Fee Type</th>
			<th>Loan Fee</th>
			<th>Action</th>
                    </tr>
                   </tfoot>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
<?php }elseif (@$fee_category_data->fee_category == 'GENERAL') {
 ?>
<div class="row">
	<div class="col-lg-6">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						ADD LOAN FEE TYPE
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_loanfee_type",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-12 form-group-sub">
									<label class="form-control-label">Loan Fee Type*:</label>
									<select type="text" name="type" class="form-control" required>
										<option value="">---Select Loan fee Type---</option>
										<option value="MONEY VALUE">MONEY VALUE</option>
										<option value="PERCENTAGE VALUE">PERCENTAGE VALUE</option>
									</select>
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<?php if ($fee_type == TRUE) {
								 ?>
								<?php }elseif($fee_type == FALSE){ ?>
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Save</button>
								<button type="reset" class="btn btn-danger btn-elevate btn-pill btn-sm">Cancel</button>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
	<div class="col-lg-6">
		<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				LOAN FEE TYPE
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    
												<th>Loan Fee Type</th>
												<th>Action</th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php //$no = 1; ?>
								<?php foreach ($fee_data as $fee_types): ?>
									          <tr>
				  					<td><?php echo $fee_types->type; ?></td>
				  					
				  				<td>	
				  			<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_1<?php echo $fee_types->id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_1<?php echo $fee_types->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Loan Fee Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/modify_loanfee_type/{$fee_types->id}"); ?>
                    <div class="form-group">
                        <label>*Loan Fee Type:</label>
                       <select type="text" name="type" class="form-control" required>
						<option value="<?php echo $fee_types->type; ?>"><?php echo $fee_types->type; ?></option>
						<option value="MONEY VALUE">MONEY VALUE</option>
						<option value="PERCENTAGE VALUE">PERCENTAGE VALUE</option>
						</select>
                    </div>
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
									
	                </tbody>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
	</div>
</div>






<div class="row">
	<div class="col-lg-6">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						ADD LOAN FEE
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_loan_fee",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-6 form-group-sub">
									<label class="form-control-label">*Description:</label>
									<input type="text" placeholder="Description" class="form-control" name="description" required autocomplete="off">
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<div class="col-lg-6 form-group-sub">
									<?php if (@$fee_type->type == 'MONEY VALUE') {
									 ?>
									 <label  class="form-control-label">*Loan Fee in (Tsh):</label>
									<input type="text" required class="form-control" placeholder="Loan Fee in (Tsh)" name="fee_interest" autocomplete="off" >
									<?php }elseif (@$fee_type->type == 'PERCENTAGE VALUE') {
									 ?>
									<label  class="form-control-label">*Loan Fee in (%):</label>
									<input type="text" required class="form-control" placeholder="Loan Fee in (%)" name="fee_interest" autocomplete="off" >
									<?php }else{ ?>
									<label  class="form-control-label">*Loan Fee:</label>
									<input type="text" required class="form-control" required readonly placeholder="Loan Fee" name="" autocomplete="off" >
									<?php } ?>
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
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Save</button>
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
	<div class="col-lg-6">
		<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				LOAN FEE
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			New Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    
												<th>Description</th>
												<th>Loan Fee In 
										<?php if (@$fee_type->type == 'MONEY VALUE') {
				  						 ?>
				  						 Tsh
				  						<?php }elseif (@$fee_type->type == 'PERCENTAGE VALUE') {
				  						 ?>
				  					       %
				  						<?php }else{ ?>

				  							<?php } ?></th>
												<th>Action</th>	
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php //$no = 1; ?>
									<?php foreach ($loan_fee as $loan_fees): ?>
									          <tr>
				  					<td><?php echo $loan_fees->description; ?></td>
				  					<td>
				  						  
				  						<?php if (@$fee_type->type == 'MONEY VALUE') {
				  						 ?>
				  						<?php echo number_format($loan_fees->fee_interest); ?> / Tsh
				  						<?php }elseif (@$fee_type->type == 'PERCENTAGE VALUE') {
				  						 ?>
				  						<?php echo $loan_fees->fee_interest; ?> %
				  						<?php }else{ ?>

				  							<?php } ?>
				  					</td>
				  					
				  				<td>	
				  			<div class="dropdown dropdown-inline">
			<button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class=""></i> Action  	
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Choose an option</span>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $loan_fees->fee_id; ?>">
							<i class="kt-nav__link-icon flaticon-edit" ></i>
							<span class="kt-nav__link-text">Edit</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="<?php echo base_url("admin/delete_loan_fee/{$loan_fees->fee_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
							<i class="kt-nav__link-icon flaticon-delete"></i>
							<span class="kt-nav__link-text">Delete</span>
						</a>
					</li>
					
					
				</ul>
			</div>
	</div>
</td>			  											  							
</tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php echo $loan_fees->fee_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Loan Fee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/modify_loan_fee/{$loan_fees->fee_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Description:</label>
                        <input type="text" class="form-control" autocomplete="off" name="description" value="<?php echo $loan_fees->description; ?>">
                        
                         <label for="recipient-name" class="form-control-label">*Loan Fee in
                          <?php if (@$fee_type->type == 'MONEY VALUE') {
				  						 ?>
				  						 Tsh
				  						<?php }elseif (@$fee_type->type == 'PERCENTAGE VALUE') {
				  						 ?>
				  					       %
				  						<?php }else{ ?>

				  							<?php } ?>:</label>
                        <input type="text" class="form-control" autocomplete="off" name="fee_interest" value="<?php echo $loan_fees->fee_interest; ?>">
                    </div>
                   
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
<?php endforeach; ?>
									
	                </tbody>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
	</div>
</div>

<?php }else{ ?>


	<?php } ?>







</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>

<script>
    $('.select2').select2();
</script>