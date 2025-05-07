<?php include('incs/header_1.php'); ?>
<?php include('incs/side_1.php'); ?>
<?php include('incs/subheader.php'); ?>

            <?php if (@$manager->position_id == '21') {
             ?>
             <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
						<div class="kt-subheader__main">
            
						<h3 class="kt-subheader__title">

						<b>General Manager Dashboard</b> - <?php echo $manager_data->comp_name; ?>    </h3>
						<span class="kt-subheader__separator kt-hidden"></span>

						</div>             
						</div>
					


		<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-invoice-1">
			<div class="kt-invoice__wrapper">
				<div class="kt-invoice__head" style="background-image: url('<?php echo base_url() ?>assets/img/pi.png');">
					<div class="kt-invoice__container kt-invoice__container--centered">
						<div class="kt-invoice__logo">
							<a href="#">
							<!-- 	<h1><?php //echo number_format($total_capital->totalCapital  + $cash_depost->today_depost + $cash_income->today_income - $out_float->principal - $cash_expences->total_expnces); ?> - Total wallet balance</h1> -->
								<h1><?php echo $total_blanch->total_bla; ?> - Total Branches</h1>
							</a>
						</div>
						<div class="kt-invoice__items">
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Disbursed loans</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($principal_loan->loan_aproved); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Loan Expectation Receivable</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($total_expect->loan_interest); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Loan Return.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($done_loan->loan_depost); ?></b></span>
							</div>

							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Outstanding Loan .</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($outstand_loan->total_out); ?></b></span>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

						<!-- end:: Subheader -->										<!-- begin:: Content -->
						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						<!--Begin::Dashboard 1-->

						<!--Begin::Section-->
						<div class="row">
						<div class="col-xl-12">
						<!--begin:: Widgets/Activity-->
						<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
						<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
						<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						<!-- Report -->
						</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
						<a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
						Branches
						</a>
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
						<ul class="kt-nav">
						<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Branches List</span>
						</li>
						
					<?php foreach ($branch as $branches): ?>
						<li class="kt-nav__item">
						<a href="<?php echo base_url("oficer/view_blanchPanel/{$branches->blanch_id}") ?>" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-layers-1"></i>
						<span class="kt-nav__link-text"><?php echo $branches->blanch_name; ?></span>
						</a>
						</li>
					<?php endforeach; ?>
						
						</ul>			</div>
						</div>
						</div>
						<div class="kt-portlet__body kt-portlet__body--fit">
						<div class="kt-widget17">
						<div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #112e8a;">
						<div class="kt-widget17__chart" style="height:30px;">
						<canvas id="kt_chart_activitie"></canvas>
						</div>
						</div>

						<div class="kt-widget17__stats">
                             <!-- begin first dashboard -->
						<div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">
											</span> 
						<a href="<?php echo base_url("oficer/manager_all_employee"); ?>"><span class="kt-widget17__subtitle">
                          <?php 
                          $comp_id = $this->session->userdata('comp_id');
                     
                           ?>
                           <img src="<?php echo base_url() ?>assets/img/users.png" style="width: 50px;height: 50px;">
						 Employee (<?php echo $total_empl->total_employee; ?>)</a>
						</span> 
						  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("oficer/manager_allcustomer"); ?>"><span class="kt-widget17__subtitle">
						<img src="<?php echo base_url() ?>assets/img/users.png" style="width: 50px;height: 50px;">
							Customer(<?php echo $total_customer->total_cust; ?>)  <b style="color:green;">Active(<?php echo $active_customer->total_Active; ?>)</b><b style="color:orange;">Pending(<?php echo $pending_customer->total_pending; ?>)</b>
						</span>  
					</a>
						</div>
						</div>
						<!-- end first dashboard -->

                         <!--begin second dashboard -->
                  <div class="kt-widget17__items">

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						
						<a href="<?php echo base_url("oficer/manager_loanPending"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/hukumu.png" style="width: 50px;height: 50px;">
							<b style="color: red;">Loan Request(<?php echo $total_loan_request->loan_request;  ?>)</b>
						</span></a>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("oficer/manager_loanAproved"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/aproved.png" style="width: 50px;height: 50px;">
							<b style="color: green;">Approved Loans(<?php echo $loan_aproved->loan_aproved; ?>)</b>
						</span></a>  
						</div>


						</div>
                <!-- endsecond dashboard -->

                            <!--begin second dashboard -->
           <!--                <div class="kt-widget17__items">

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							<?php //$customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'");
							//$male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male'");
							//$female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female'");
							 ?>
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Received(<?php //echo number_format($total_received->total_withdrawal); ?>)
						</span>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							<?php
							//$blanch = $this->db->query("SELECT * FROM tbl_blanch WHERE comp_id = '$comp_id'");
							 ?>
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Pending(<?php //echo number_format($total_loan_pending->total_pending); ?>)
						</span>  
						</div>
						</div> -->
                <!-- endsecond dashboard -->
                <!--begin third dashboard -->
             <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("oficer/manager_loan_pending_time"); ?>"><span class="kt-widget17__subtitle">	
						 <?php $laza = $this->db->query("SELECT * FROM tbl_pending_total WHERE blanch_id = '$blanch_id' AND total_pend IS NOT FALSE"); ?>

						<img src="<?php echo base_url() ?>assets/img/penart.png" style="width: 50px;height: 50px;">
							<b>Loan pending(<?php echo $laza->num_rows(); ?>)</b>
						</span> </a> 
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("oficer/manager_today_recevable_loan"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Receivable(<?php echo number_format($comp_recevable->total_reje) ; ?>)
						</span></a>  
						</div>


						</div>

						   <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  

						
						<a href="<?php echo base_url("oficer/manager_today_receved_loan"); ?>"><span class="kt-widget17__subtitle">	
							
						<img src="<?php echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							<b>Today Received(<?php echo number_format($receved->total_depost); ?>)</b>
						</span> </a> 
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						<?php 
							$exp_req = $this->db->query("SELECT * FROM tbl_request_exp WHERE comp_id = '$comp_id' AND req_status = 'open'");

							 ?>
						<a href="<?php echo base_url("oficer/get_recomended_request"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/expences.png" style="width: 50px;height: 50px;">
							<b style="color:red;">Recomended Expenses(<?php echo $recomended->expences_request; ?>)</b>
						</span></a>  
						</div>

						</div>
                          <!-- endthird dashboard -->

                            <!--begin forth dashboard -->
            <!--  <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Expenses(<?php //echo number_format($toay_expences->total_req); ?>)
						</span>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Other Income(<?php //echo number_format($total_received->total_withdrawal + $prepaid_today->prepaid_balance + $total_loan_fee->sum_withdraw + $today_income->total_receve_income ); ?>)
						</span>  
						</div>


						</div> -->
             <!-- endforth dashboard -->

						</div>
						</div>
						</div>
						</div>
						<!--end:: Widgets/Activity-->	</div>


						
							
						</div>
						
					  </div>


						<!-- end:: Content -->					
						<!-- end:: Content -->
					</div>			
           <?php }else{ ?>
						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
						<div class="kt-subheader__main">

						<h3 class="kt-subheader__title">
						<b>Officer Dashboard</b> - <b><?php echo $manager_data->comp_name; ?></b> / <b><?php echo $manager_data->blanch_name; ?></b> <?php //echo $_SESSION['empl_name']; ?>                </h3>
						<span class="kt-subheader__separator kt-hidden"></span>
						</div>
						</div>


		<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-invoice-1">
			<div class="kt-invoice__wrapper">
				<div class="kt-invoice__head" style="background-image: url('<?php echo base_url() ?>assets/img/pi.png');">
					<div class="kt-invoice__container kt-invoice__container--centered">
						<div class="kt-invoice__logo">
							<a href="#">
								<h1>	<?php echo number_format($blanch_amount_balance->total_blanch_capital); ?> - Branch Balance</h1>

							
							</a>
						</div>
						<div class="kt-invoice__items">
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Today Income</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($deducted->total_deducted_fee + $non_deducted->total_nonDeducted_fee); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Today Deposits</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($today_depost->today_depost); ?></b></span>
							</div>
							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Today Expenses.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($today_expences->total_expnces); ?></b></span>
							</div>

							<div class="kt-invoice__item">
								<span class="kt-invoice__subtitle"><b>Total Outstanding Loan.</b></span>
								<span class="kt-invoice__text"><b><?php echo number_format($blanch_outstand->total_out); ?></b></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
          


						<!-- end:: Subheader -->										<!-- begin:: Content -->
						<!-- begin:: Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
						<!--Begin::Dashboard 1-->

						<!--Begin::Section-->
						<div class="row">
						<div class="col-xl-12">
						<!--begin:: Widgets/Activity-->
						<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
						<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
						<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						<!-- Report -->
						</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
					<!-- 	<a href="#" class="btn btn-label-light btn-sm btn-bold dropdown-toggle" data-toggle="dropdown">
						Report
						</a> -->
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
						<ul class="kt-nav">
						<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Reports List</span>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-graph-1"></i>
						<span class="kt-nav__link-text">Statistics</span>
						</a>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-calendar-4"></i>
						<span class="kt-nav__link-text">Events</span>
						</a>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-layers-1"></i>
						<span class="kt-nav__link-text">Reports</span>
						</a>
						</li>
						<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">HR</span>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-calendar-4"></i>
						<span class="kt-nav__link-text">Notifications</span>
						</a>
						</li>
						<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
						<i class="kt-nav__link-icon flaticon2-file-1"></i>
						<span class="kt-nav__link-text">Files</span>
						</a>
						</li>
						</ul>			</div>
						</div>
						</div>
						<div class="kt-portlet__body kt-portlet__body--fit">
						<div class="kt-widget17">
						<div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #112e8a;">
						<div class="kt-widget17__chart" style="height:30px;">
						<canvas id="kt_chart_activitie"></canvas>
						</div>
						</div>
						<?php $blanch_id = $this->session->userdata('blanch_id'); ?>

						<div class="kt-widget17__stats">
                             <!-- begin first dashboard -->
						<div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">
						</span> 
						<a href="<?php echo base_url("oficer/all_customer"); ?>">
							<span class="kt-widget17__subtitle">
                        		<?php $customer = $this->db->query("SELECT * FROM tbl_customer WHERE blanch_id = '$blanch_id'");
						
							$active = $this->db->query("SELECT * FROM tbl_customer WHERE blanch_id = '$blanch_id' AND customer_status = 'open'");
							 ?>
                           <img src="<?php echo base_url() ?>assets/img/users.png" style="width: 50px;height: 50px;">
						 	Customer(<?php echo $customer->num_rows(); ?>) <!-- / Male(<?php //echo $male->num_rows(); ?>) --> <!-- / Female(<?php //echo $female->num_rows(); ?>) --> <b style="color:green;">Active(<?php echo $active->num_rows(); ?>)</b>
						</span> 
						  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						<?php $new_loan = $this->db->query("SELECT * FROM tbl_loans WHERE blanch_id = '$blanch_id' AND loan_status = 'open'"); ?>
						<a href="<?php echo base_url("oficer/loan_pending"); ?>"><span class="kt-widget17__subtitle">
					
						<img src="<?php echo base_url() ?>assets/img/hukumu.png" style="width: 50px;height: 50px;">
							<b style="color: red;">Loan Application(<?php echo $new_loan->num_rows();  ?>)</b>
						</span>  
					</a>
						</div>
						</div>
						<!-- end first dashboard -->

                         <!--begin second dashboard -->
                  <div class="kt-widget17__items">

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
								<?php
							$ap = $this->db->query("SELECT * FROM tbl_loans WHERE blanch_id = '$blanch_id' AND loan_status = 'aproved'");
							 ?>
						<a href="<?php echo base_url("oficer/get_loan_aproved"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/aproved.png" style="width: 50px;height: 50px;">
							<b style="color: green;">Approved Loans(<?php echo $ap->num_rows(); ?>)</b>
						</span></a>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
							<?php
							$dis = $this->db->query("SELECT * FROM tbl_loans WHERE blanch_id = '$blanch_id' AND loan_status = 'disbarsed'");
							 ?>
						<a href="<?php echo base_url("oficer/disburse_loan"); ?>"><span class="kt-widget17__subtitle">
					
						<img src="<?php echo base_url() ?>assets/img/aproved.png" style="width: 50px;height: 50px;">
							<b style="color: orange;">Disbursed Loans(<?php echo $dis->num_rows(); ?>)</b>
						</span></a>  
						</div>


						</div>
                <!-- endsecond dashboard -->

                            <!--begin second dashboard -->
           <!--                <div class="kt-widget17__items">

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							<?php //$customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'");
							//$male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male'");
							//$female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female'");
							 ?>
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Received(<?php //echo number_format($total_received->total_withdrawal); ?>)
						</span>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							<?php
							//$blanch = $this->db->query("SELECT * FROM tbl_blanch WHERE comp_id = '$comp_id'");
							 ?>
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Pending(<?php //echo number_format($total_loan_pending->total_pending); ?>)
						</span>  
						</div>
						</div> -->
                <!-- endsecond dashboard -->
                <!--begin third dashboard -->
             <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("oficer/loan_pending_time"); ?>"><span class="kt-widget17__subtitle">	
							<?php $laza = $this->db->query("SELECT * FROM tbl_pending_total WHERE blanch_id = '$blanch_id' AND total_pend IS NOT FALSE"); ?>
						<img src="<?php echo base_url() ?>assets/img/penart.png" style="width: 50px;height: 50px;">
							<b>Today Loan pending(<?php echo $laza->num_rows(); ?>)</b>
						</span> </a> 
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<a href="<?php echo base_url("oficer/today_recevable_loan"); ?>"><span class="kt-widget17__subtitle">
							
						<img src="<?php echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Receivable(<?php echo number_format($rejesho->total_rejesho) ; ?>)
						</span></a>  
						</div>


						</div>
                          <!-- endthird dashboard -->

                            <!--begin forth dashboard -->
            <!--  <div class="kt-widget17__items">
						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Expenses(<?php //echo number_format($toay_expences->total_req); ?>)
						</span>  
						</div>

						<div class="kt-widget17__item">
						<span class="kt-widget17__icon">

						</span>  
						
						<span class="kt-widget17__subtitle">
							
						<img src="<?php //echo base_url() ?>assets/img/money.png" style="width: 50px;height: 50px;">
							Today Other Income(<?php //echo number_format($total_received->total_withdrawal + $prepaid_today->prepaid_balance + $total_loan_fee->sum_withdraw + $today_income->total_receve_income ); ?>)
						</span>  
						</div>


						</div> -->
             <!-- endforth dashboard -->

						</div>
						</div>
						</div>
						</div>
						<!--end:: Widgets/Activity-->	</div>


						
							
						</div>
						
					  </div>


						<!-- end:: Content -->					
						<!-- end:: Content -->
					</div>	

					<?php } ?>			

						<?php include('incs/footer_1.php'); ?>