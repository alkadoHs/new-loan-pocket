<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>


                   <style>
                	    .c {
               text-transform: uppercase;
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

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Today Cash Transaction
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		
		<?php if ($manager->position_id == '21') {
		 ?>
		<a href="<?php echo base_url("oficer/manager_prevTransaction"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="flaticon-event-calendar-symbol"></i>
			Previous
		</a>
	<a href="<?php echo base_url("oficer/manager_printCash"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i></a>
		<?php }else{ ?>
	<a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Filter</a>
	<a href="<?php echo base_url("oficer/print_cash"); ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flaticon-technology"></i></a>
			<?php } ?>
		
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
				  							    <th>S/No.</th>
												<th>Customer Name</th>
												<th>Deposit</th>
												<th>Withdrawal</th>
												<th>Date</th>
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach ($cash as $cashs): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td class="c"><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
				  					<td>
				  						<?php if ($cashs->depost == TRUE) {
				  						 ?>
				  						<?php echo number_format($cashs->depost); ?>
				  					<?php }elseif ($cashs->depost == FALSE) {
				  					 ?>
				  					 -
				  					 <?php } ?>
				  					</td>
				  					<td>
				  						<?php if ($cashs->withdraw == TRUE) {
				  						 ?>
				  						<?php echo number_format($cashs->withdraw); ?>
				  					<?php }elseif ($cashs->withdraw == FALSE) {
				  					 ?>
				  					 -
				  					 <?php } ?>
				  					</td>
				  					<td><?php echo $cashs->lecod_day; ?></td> 
				  								  											  							
                                   </tr>
                      <?php endforeach; ?>
									
	                </tbody>
	                <tfoot>
                    <tr>
                    <th>TOTAL</th>
					<th></th>
					<th><?php echo number_format($sum_depost->cash_depost); ?></th>
					<th><?php echo number_format($sum_withdrawls->cash_withdrowal); ?></th>
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

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter cash transaction By</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("oficer/prev_cashtransaction"); ?>

                    <div class="form-group">
                        <div class="row">
                          <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id ?>">  
                        <?php $date = date("Y-m-d"); ?>
                      <div class="col-lg-6">
                          <label class="form-control-label">*From:</label>
                            <input type="date" name="from" value="<?php echo $date; ?>" class="form-control">
                        </div>
                         <div class="col-lg-6">
                          <label class="form-control-label">*To:</label>
                            <input type="date" name="to" value="<?php echo $date; ?>" class="form-control">
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>


<!--end::Modal-->