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

<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon-list-2"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				Customer Loan  List - <?php echo $group_data->group_name; ?>
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
	<div class="kt-portlet__head-actions">

	
		&nbsp;
		<a href="<?php echo base_url("admin/loanpending_groups"); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
			<i class="la la-back"></i>
			Back
		</a>
		<a href="<?php echo base_url("admin/print_loangroup/{$comp_id}/{$group_id}") ?>" class="btn btn-brand btn-elevate btn-icon-sm" target="_blank">
			<i class="flavicon-technology"></i>
			Print
		</a>
	</div>	
</div>		</div>
	</div>

	<div class="kt-portlet__body">
		<!--begin: Datatable -->
		<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
									     <thead>
			  						          <tr>
		  							<th>S/No.</th>
									<th>Loan AC/No</th>
									<th>customer name</th>
									<th>Phone Number</th>
									<th>Busines/Job Name</th>
									<th>Branch</th>
									<th>Loan Amount</th>
									<th>Loan Amount + Interest</th>
									<th>Loan duration</th>
									<th>Number of Repayments </th>
									<th>Member Position</th>
									<th>Loan Status</th>
									
									
				  									
				  									
				  						         </tr>
						                  </thead>
			
								    <tbody>
                                          <?php $no = 1; ?>
									<?php foreach($loan_pending as $loan_pendings): ?>
									          <tr>
				  					<td><?php echo $no++; ?>.</td>
				  					<td><?php echo $loan_pendings->loan_code; ?></td>
				  					<td><?php echo $loan_pendings->f_name; ?> <?php echo substr($loan_pendings->m_name, 0,1); ?> <?php echo $loan_pendings->l_name; ?></td>
				  					<td><?php echo $loan_pendings->phone_no; ?></td>
				  					<td><?php echo $loan_pendings->bussiness_type; ?></td>
				  					<td><?php echo $loan_pendings->blanch_name; ?></td>
				  					<td><?php echo number_format($loan_pendings->loan_aprove); ?></td>
				  					<td><?php echo number_format($loan_pendings->loan_int); ?></td>

				  						<td>
				  							<?php if ($loan_pendings->day == 1) {
				  								 echo "Daily";
				  							 ?>
				  							<?php }elseif($loan_pendings->day == 7){
                                                  echo "Weekly";
				  							 ?>
				  							
				  						<?php }elseif($loan_pendings->day == 30 || $loan_pendings->day == 31 || $loan_pendings->day == 28 || $loan_pendings->day == 29){
				  						        echo "Monthly"; 
				  							?>
				  							<?php } ?>
				  								
				  							</td>
				  						<td><?php echo $loan_pendings->session; ?></td>
										  <td class="a"><?php echo $loan_pendings->member_status; ?></td>
				  						<td>
				 	<?php if ($loan_pendings->loan_status == 'open') {
				 ?>
				 <a href="#" class="badge badge-danger">Pending</a>
				<?php }elseif ($loan_pendings->loan_status == 'aproved') {
				 ?>
				 <a href="#" class="badge badge-success">Approved</a>
				 <?php }elseif($loan_pendings->loan_status == 'disbarsed'){
				  ?>
			<a href="#" class="badge badge-info">Disbursed</a>

				  <?php }elseif ($loan_pendings->loan_status == 'reject') {
				   ?>
				 <a href="#" class="badge badge-warning">Rejected</a>
				   <?php }elseif ($loan_pendings->loan_status == 'withdrawal') {
				    ?>
			     <a href="#" class="badge badge-success">Active</a>
					<?php }elseif ($loan_pendings->loan_status == 'done') {
					 ?>
				<a href="#" class="badge badge-info">Done</a>
					 <?php  } ?>
				                        </td>
				  				
				  			</tr>

<?php endforeach; ?>
									
	                </tbody>
					<tfoot>
                    <tr>
        <th><b>TOTAL</b></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th><?php echo number_format($total_loan_group->total_loan); ?></th>
		<th><?php echo number_format($total_loan_group->total_loanint); ?></th>
		<th><b>Paid Amount : <?php echo number_format($total_depost_group->total_depost); ?></b></th>
		<th><b>Remain Amount : <?php echo number_format($total_loan_group->total_loanint - $total_depost_group->total_depost ); ?></b></th>
		<th></th>
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