<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>
	


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
         <?php if ($das = $this->session->flashdata('errors')): ?>
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
<div class="row">
	<div class="col-lg-12">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Float Transfor
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<!-- <form method="post" action="ss" class="kt-form kt-form--label-right" id="kt_form_2"> -->
				<?php echo form_open("admin/create_float",['class'=>'kt-form kt-form--label-right','novalidate']); ?>
				<div class="kt-portlet__body">
					<div class="kt-section">
						<div class="kt-section__content">
							<div class="form-group form-group-last row">
								<div class="col-lg-2 form-group-sub">
									<label class="form-control-label">*From Company Account :</label>
									<select type="number" name="from_trans_id" class="form-control">
										<option value="">Select Account</option>
										<?php foreach ($account as $accounts): ?>
										<option value="<?php echo $accounts->trans_id; ?>"><?php echo $accounts->account_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-lg-3 form-group-sub">
									<label  class="form-control-label">*Amount:</label>
									<input type="number" required class="form-control" placeholder="Amount" name="blanch_amount" >
								</div>
								
								<div class="col-lg-3 form-group-sub">
									<label class="form-control-label">*To Branch Name:</label>
									<select type="number" name="blanch_id" class="form-control">
										<option value="">Select Branch</option>
										<?php foreach ($blanch as $blanchs): ?>
										<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-lg-2 form-group-sub">
									<label class="form-control-label">*To Branch Account :</label>
									<select type="number" name="to_trans_id" class="form-control">
										<option value="">Select Account</option>
										<?php foreach ($account as $accounts): ?>
										<option value="<?php echo $accounts->trans_id; ?>"><?php echo $accounts->account_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="col-lg-2 form-group-sub">
									<label  class="form-control-label">*Withdrawal Chargers:</label>
									<input type="number" required  class="form-control" placeholder="Amount" name="charger" >
								</div>
								
								<input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
								<?php $date = date("Y-m-d"); ?>
								<input type="hidden" name="trans_day" value="<?php echo $date ?>">
								
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
								<button type="submit" class="btn btn-brand  btn-elevate btn-pill btn-sm">Submit</button>
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




<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<?php echo form_open("admin/previous_transfor"); ?>
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
			Float List
			</h3>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>From:</span>
			<input type="date" name="from" class="form-control" required>
			</h3>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>To:</span>
			<input type="date" name="to" class="form-control" required>
			</h3>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<h3 class="kt-portlet__head-title">
				<span>Branch:</span>
			<select type="number" class="form-control" name="blanch_id" required>
				<option value="">Select Branch</option>
				<?php foreach ($blanch as $blanchs): ?>
				<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
				<?php endforeach; ?>
			</select>
			</h3>
			<h3 class="kt-portlet__head-title">
	         
	         <br>
			<button type="submit" class="btn btn-primary">Get Data</button>
			</h3>
		</div>
		<?php echo form_close(); ?>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		<!-- &nbsp;
		<a href="<?php //echo base_url("admin/previous_transfor"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-plus"></i>
			Previous Record
		</a> -->
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    
												<th>From Company Account</th>
												<th>Amount</th>
												<th>To Branch</th>
												<th>To Branch Account</th>
												<th>Withdrawal Chargers</th>
												<th>Date</th>
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php //$no = 1; ?>
									<?php foreach ($float as $floats): ?>
									          <tr>
				  					<td><?php echo $floats->from_account; ?></td>
				  					<td><?php echo number_format($floats->blanch_amount); ?></td>
				  					<td><?php echo $floats->blanch_name; ?></td>
				  					<td><?php echo $floats->to_account; ?></td>
				  					<td><?php echo number_format($floats->charger); ?></td>
				  					
				  				<td><?php echo $floats->trans_day; ?></td>										  							
                              </tr>

<!--begin::Modal-->
<div class="modal fade" id="kt_modal_<?php echo $floats->trans_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Float</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/modify_float/{$floats->trans_id}/{$floats->comp_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Blanch name:</label>
                        <select type="number" name="blanch_id" class="form-control">
                        	<option value="<?php echo $floats->blanch_id; ?>"><?php echo $floats->blanch_name; ?></option>
                             <?php foreach ($blanch as $blanchs): ?>
                        	<option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                        	<?php endforeach; ?>
                        </select>
                         
                         <label for="recipient-name" class="form-control-label">*Float:</label>
                        <input type="number" class="form-control" autocomplete="off" name="blanch_amount" value="<?php echo $floats->blanch_amount; ?>">
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
                   <th>TOTAL</th>
                   <th><?php echo number_format($sum_froat->cashFloat); ?></th>
					<th></th>
					<th></th>
					<th><?php echo number_format($sum_chargers->total_chargers); ?></th>
					<th></th>
                    </tr>
                   </tfoot>
                   </table>
		<!--end: Datatable -->
	</div>
</div>
</div>
<!-- end:: Content -->
<!-- end:: Content -->
				</div>				
				
<?php include('incs/footer_1.php') ?>