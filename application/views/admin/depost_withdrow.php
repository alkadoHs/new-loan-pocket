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

          <?php if(@$customer->f_name == TRUE){ ?>
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

         <?php if ($das = $this->session->flashdata('error')): ?>
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
    <div class="col-xl-12">
        <!--begin:: Widgets/Applications/User/Profile3-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__body">
        <div class="kt-widget kt-widget--user-profile-3">
            <div class="kt-widget__top">
                <div class="kt-widget__media kt-hidden-">
                    <?php if ($customer->passport == TRUE) {
                     ?>
                    <!-- <img src="<?php //echo base_url().'assets/img/'.$customer->passport; ?>" alt="passport" style="width: 220px; height: 180px;"> -->
                    <img src="<?php echo base_url();?>assets/img/male.jpeg" alt="passport" style="width: 220px; height: 180px;">
                <?php }else{ ?>

                     <img src="<?php echo base_url();?>assets/img/male.jpeg" alt="passport" style="width: 220px; height: 180px;">
                    <?php } ?>
                </div>

                <style>
                        .c {
               text-transform: uppercase;
                 }
                
                </style>
                
                <div class="kt-widget__content">
                    <div class="kt-widget__head">
                        <a href="javascript:;" class="kt-widget__username">
                           <b class="c"><?php echo $customer->f_name; ?> <?php echo $customer->m_name; ?> <?php echo $customer->l_name; ?> </b>   
                            <i class=""></i>                       
                        </a>

                        <div class="kt-widget__action">
                         <div class="">
                            <?php if ($customer->signature == TRUE) {
                             ?>
                    <!-- <img src="<?php //echo base_url().'assets/img/'.$customer->signature; ?>" alt="Signature"style="width: 200px; height: 180px;"> -->
                    <img src="<?php echo base_url();?>assets/img/sig.jpg" alt="passport" style="width: 200px; height: 180px;">
                <?php }else{ ?>
                     <img src="<?php echo base_url();?>assets/img/sig.jpg" alt="passport" style="width: 200px; height: 180px;">
                    <?php } ?>
                        </div>
                        </div>
                    </div>

                   <!--  <div class="kt-widget__subhead">
                        <a href="#"><i class="flaticon2-new-email"></i>jason@siastudio.com</a>
                        <a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
                        <a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a>
                    </div> -->

      
                </div>
            </div>
 


<div class="kt-portlet__body">
        <!--begin: Datatable -->
        </div>

        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                         <thead>
                                              <tr>
                                        
                                        
                                        <th><b>Phone Number</b></th>
                                        <th><b>Withdrawal Date</b></th>
                                        <th><b>End Date</b></th>
                                        <th><b>Loan Amount</b></th>
                                        <th><b>Restoration</b></th>
                                        <th><b>Amount Paid</b></th>
                                        <th><b>Remaining debt</b></th>  
                                        </tr>
                                          </thead>
            
                                    <tbody>

                                         <?php @$customer_loan = $this->queries->get_loan_active_customer($customer->customer_id);
                                         @$total_deposit = $this->queries->get_total_amount_paid_loan($customer_loan->loan_id);

                                         @$out_stand = $this->queries->get_outstand_loan_customer($customer_loan->loan_id);
                                       ?>
                                              <tr>
                                    
                                    
                                           <td><?php echo @$customer->phone_no; ?></td>
                                            <td>
                                            <?php if (@$customer_loan->loan_stat_date == TRUE) {
                                                 ?>
                                                <?php echo @$customer_loan->loan_stat_date; ?>
                                            <?php }elseif (@$customer_loan->loan_stat_date == FALSE) {
                                             ?>
                                             YY-MM-DD
                                             <?php } ?>
                                                    
                                                </td>
                                            <td>
                                            <?php if (@$customer_loan->loan_end_date == TRUE) {
                                                 ?>
                                                 <?php echo substr(@$customer_loan->loan_end_date, 0,10); ?>
                                            <?php }elseif (@$customer_loan->loan_end_date == FALSE) {
                                             ?>
                                             YY-MM-DD
                                             <?php } ?>
                                                </td>
                                            <td><?php echo number_format(@$customer_loan->loan_int); ?></td>
                                            <td><?php echo number_format(@$customer_loan->restration); ?></td>
                                            <td>
                                        <?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int) {
                                                 ?>
                                        <?php echo number_format(@$customer_loan->loan_int); ?>
                                         <span style="color: red">(<?php echo number_format(@$total_deposit->total_Deposit - @$customer_loan->loan_int); ?>)<span>
                                             <?php }else{ ?>
                                                <?php echo number_format(@$total_deposit->total_Deposit); ?>
                                                <?php } ?>   
                                                </td>
                                            <td>
                                                <?php if (@$total_deposit->total_Deposit > @$customer_loan->loan_int) {
                                                 ?>
                                                 0.00
                                                 <?php }else{ ?>
                                                <?php echo number_format(@$customer_loan->loan_int - @$total_deposit->total_Deposit ); ?>
                                                <?php } ?>
                                                    
                                                </td>

<!--end::Modal-->                                                               
                                        </tr>
                                    </tbody>
                          </table>

                          <div class="row">
                            <div class="col-lg-6">
                          <table class="table table-striped- table-bordered table-hover table-checkable"id="kt_table_1">
                                         <thead>
                                 <tr style="background-color: #2c77f4;color: white;">
                                        
                                        <th><b>Opening</b></th>
                                        <th><b>Deposit</b></th>
                                        <th><b>Withdrawal</b></th>
                                        <th><b>Closing</b></th>  
                                        </tr>
                                          </thead>
            
                                    <tbody>
                                              <tr>
                                    
                                    <td><?php echo number_format($opening_blanch->total_capital_blanch); ?></td>
                                 
                                    <td><?php echo number_format($depost_blanch_account->total_depost); ?></td>
                                    <td><?php echo number_format($loan_withdrawal_blanch->total_loan_withdrawal) ?></td>

                                     <td><?php echo number_format($opening_blanch->total_capital_blanch); ?></td> 
                                                              
                                        </tr>
                                    </tbody>
                          </table>
                          </div>
                          <div class="col-lg-6"></div>
                       </div>


                         </div>
                       <div class="text-right">
                        <a href="" class="btn btn-success" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php //echo $blanchs->blanch_id; ?>"><i class="kt-menu__link-icon flaticon2-add"></i>Deposit</a>
                        <a href="" class="btn btn-brand" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_2"><i class="kt-menu__link-icon flaticon2-files-and-folders"></i>Withdrawal</a>
                        <!-- <a href="" class="btn btn-primary" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_3"><i class="kt-menu__link-icon flaticon-edit"></i>Adjustiment</a> -->
                         <!-- <a href="<?php //echo base_url("admin/teller_dashboard"); ?>" class="btn btn-info"><i class="kt-menu__link-icon flaticon2-search-1"></i>Search</a> -->

                         <a href="" class="btn btn-info" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_4"><i class="kt-menu__link-icon flaticon2-search-1"></i>Search</a>
                       </div>
                        </div>

                </div>
               </div>

   </div>
<div class="kt-portlet kt-portlet--mobile">
   
     

    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                         <thead>
                                              <tr style="background-color: #2c77f4;color:white;">
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Deposit</th>
                                                <th>Withdrawal</th>
                                                <th>Balance</th>    
                                                 </tr>
                                          </thead>

                                    <?php @$loan_desc = $this->queries->get_total_pay_description($customer_loan->loan_id);
                                      @$remain_balance = $this->queries->get_total_remain_with($customer_loan->loan_id);
                                      @$total_recovery = $this->queries->get_total_loan_pend($customer_loan->loan_id);
                                      @$total_penart =   $this->queries->get_total_penart_loan($customer_loan->loan_id);
                                      @$total_deposit_penart =  $this->queries->get_total_paypenart($customer_loan->loan_id);
                                      @$end_deposit = $this->queries->get_end_deposit_time($customer_loan->loan_id);
                                       ?>
                                          <tbody>
                                              
                                            <?php foreach ($loan_desc as $payisnulls): ?>
                                            <tr>
                                              <td class="c"><?php echo $payisnulls->date_data; ?></td>
                                              <td class="c">  <?php echo $payisnulls->emply; ?>
                                              <?php if ($payisnulls->emply == TRUE) {   
                                               ?>
                                               /
                                           <?php }else{ ?>
                                            <?php } ?>
                                               <?php echo $payisnulls->description; ?>
                                               <?php if($payisnulls->p_method == TRUE){ ?>
                                                /<?php echo $payisnulls->account_name; ?>
                                                <?php }else{ ?> 
                                                     
                                                    <?php } ?>
                                               <?php if ($payisnulls->fee_id == TRUE || $payisnulls->fee_id == '0' ) {
                                              ?>
                                              / <?php echo $payisnulls->fee_desc; ?> <?php echo $payisnulls->fee_percentage; ?> <?php echo $payisnulls->symbol; ?>
                                          <?php }else{ ?>
                                            <?php } ?>
                                            <?php if($payisnulls->p_method == FALSE){ ?>
                                            <?php }else{ ?>
                                               / 
                                               <?php } ?>
                                               <?php //echo @$payisnulls->description; ?>  <?php echo @$payisnulls->loan_name ; ?>
                                         <?php if(@$payisnulls->day == 1){
                                           echo "Daily";
                                    }elseif(@$payisnulls->day == 7){
                                         echo "Weekly";
                                    }elseif (@$payisnulls->day == 30 || @$payisnulls->day == 31 || @$payisnulls->day == 28 || @$payisnulls->day == 29) {
                                        echo "Monthly";
                                     ?> 
                                    <?php } ?><?php echo $payisnulls->session; ?>  / AC/No. <?php echo @$payisnulls->loan_code; ?></td>
                                              <td>
                                                <?php if($payisnulls->depost == TRUE){ ?>
                                                <?php echo round(@$payisnulls->depost,2); ?>
                                            <?php }elseif($payisnulls->depost == FALSE){ ?>
                                            0.00
                                                <?php } ?>
                                            </td>
                                              <td>
                                                <?php if (@$payisnulls->withdrow == TRUE) {
                                                 ?>
                                                <?php echo round(@$payisnulls->withdrow,2); ?>
                                                <?php }elseif (@$payisnulls->withdrow == FALSE) {
                                                 ?>
                                                 0.00
                                            <?php } ?>
                                            </td>
                                              <td>
                                                <?php if (@$payisnulls->balance == TRUE) {
                                                 ?>
                                                <?php echo round(@$payisnulls->balance,2); ?>
                                                <?php }elseif (@$payisnulls->balance == FALSE) {
                                                 ?>
                                                 0.00
                                                 <?php } ?>
                                            </td>
                                              </tr>
                                        <?php endforeach; ?>
                                          </tbody>
    
                                       </table>
        <!--end: Datatable -->
    </div>
</div>
</div>


<?php }else{ ?>
    <div class="text-center">
    <h1>
        <br><br><br>
OOPS!  There no customer with that name</h1>
      <a href="<?php echo base_url("admin/teller_dashboard"); ?>" class="btn btn-info">Back</a>
    </div>
    <?php } ?>



</div>  




        





<?php include('incs/footer_1.php') ?>

<div class="modal fade" id="kt_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADJASTMENT DASHBOARD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/create_adjustment/{$customer->customer_id}"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                        <label for="recipient-name" min="1" class="form-control-label"><b>Amount</b></label>
                        <input type="" name=""id="amount_1a" min="1" readonly value="10000" class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name"  class="form-control-label">*Quantity</label>
                        <input type="number" name="" min="1" id="qnty_1a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" min="1" class="form-control-label">Total Amount</label>
                        <input type="" name="" value="" autocomplete="off" id="jumla_1a" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="5000" min="1" id="amount_2a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_2a" class="form-control"style="width: 130px; height:30px;border: radius;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_2a" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>

                             <div class="col-lg-4">
                        <input type="" name="" value="2000" min="1" id="amount_3a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_3a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_3a" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="1000" min="1" id="amount_4a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_4a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_4a" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="500" min="1" id="amount_5a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_5a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_5a" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="200" min="1" id="amount_6a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_6a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_6a" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>

                          

                             <div class="col-lg-4">
                        <input type="" name="" value="100" min="1" id="amount_7a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        
                        <input type="number" name="" min="1" id="qnty_7a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        <input type="" name="" value="" min="1" id="jumla_7a" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="50" min="1" id="amount_8a" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_8a" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_8a" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                       
                        </div>

                        <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                            <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                            <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">

                            <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
                            <input type="hidden" value="LOAN RETURN" name="description">
                             <div class="col-lg-4">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b>Total Amount</b></label>
                        </div>
                        <input type="number" name="withdrow" min="1" id="jumlaa" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Adjust</button>
                <button type="reset" class="btn btn-danger">Reset</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
<!--end::Modal-->



<!-- <p>withdrawal</p> -->

<div class="modal fade" id="kt_modal_2<?php //echo $blanchs->blanch_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">WITHDRAWAL DASHBOARD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/create_withdrow_balance/{$customer->customer_id}"); ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b>Amount</b></label>
                        <input type="" name=""id="amount_1s" min="1" readonly value="10000" class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label">*Quantity</label>
                        <input type="number" name="" id="qnty_1s" min="1"  class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label">Total Amount</label>
                        <input type="" name="" autocomplete="off" min="1" value="" id="jumla_1s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="5000" id="amount_2s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_2s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_2s" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>
                                   
                           <input type="hidden" value="CASH WITHDRAWALS" name="description">
                    <input type="hidden" value="withdrawal" name="loan_status">
                    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">

                    <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">
                           
                               
                            
                            

                             <div class="col-lg-4">
                        <input type="" name="" value="2000" id="amount_3s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_3s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_3s" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="1000" id="amount_4s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_4s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" autocomplete="off" min="1" id="jumla_4s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="500" id="amount_5s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_5s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" autocomplete="off" min="1" id="jumla_5s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="200" id="amount_6s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_6s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" autocomplete="off" min="1" id="jumla_6s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>

                          

                             <div class="col-lg-4">
                        <input type="" name="" value="100" id="amount_7s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        
                        <input type="number" name="" id="qnty_7s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        <input type="" name="" value="" min="1" autocomplete="off" id="jumla_7s" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="50" id="amount_8s" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_8s" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" id="jumla_8s" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                       
                        </div>
                             <div class="col-lg-4">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b>Total Amount</b></label>
                        </div>
                        <input type="number" name="withdrow" min="1" id="jumlas" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 8px;">
                        </div>
                             <div class="col-lg-4">
                           </div>

                         <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        <br>
                           <b>Withdrawal method  & Date</b>
                        </div>
                             <div class="col-lg-">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        </div>
                       <!--  <input type="number" name="withdrow" id="jumlas" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 8px;"> -->
                        <select type="text" name="method" class="form-control" required style="border-radius: 8px;">
                            <option value="">Select Withdrawal Method</option>
                            <?php foreach ($acount as $acounts): ?>
                            <option value="<?php echo $acounts->trans_id; ?>"><?php echo $acounts->account_name; ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                        </div>

                             <div class="col-lg-1">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        </div>
                        <?php $date = date("Y-m-d"); ?>
                        <input type="hidden" name="code" value="1" placeholder="CODE" autocomplete="off" required class="form-control"style="width: 130px; height:40px;border-radius: 8px;">
                        <input type="date" name="with_date" value="<?php echo $date; ?>"  autocomplete="off" required class="form-control"style="width: 130px; height:40px;border-radius: 8px;">
                        
                        </div>
                         
                          
                    </div>  
                 </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Withdraw</button>
                <button type="reset" class="btn btn-danger">Reset</button>

                <!-- <a onclick="SendSmSButton()" href="<?php //echo base_url("admin/get_loan_code_resend/{$customer->customer_id}") ?>"  class="btn btn-info" id="resend">Resend Code</a> -->

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>


<!-- <p>deposit</p> -->
<div class="modal fade" id="kt_modal_<?php //echo $blanchs->blanch_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DEPOSIT DASHBOARD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/deposit_loan/{$customer->customer_id}"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b>Amount</b></label>
                        <input type="" name=""id="amount_1" min="1" readonly value="10000" class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label">*Quantity</label>
                        <input type="number" name="" min="1" id="qnty_1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label">Total Amount</label>
                        <input type="" name="" value="" min="1" autocomplete="off" id="jumla_1" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="5000" min="1" id="amount_2" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_2" min="1" class="form-control"style="width: 130px; height:30px;border: radius;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_2" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="2000" id="amount_3" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_3" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name=""  id="jumla_3" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="1000" id="amount_4" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_4" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" id="jumla_4" min="1" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" value="500" id="amount_5" min="1" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" id="qnty_5" min="1" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_5" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>



                             <div class="col-lg-4">
                        <input type="" name="" min="1" value="200" id="amount_6" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_6" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_6" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>

                          

                             <div class="col-lg-4">
                        <input type="" name="" value="100" min="1" id="amount_7" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        
                        <input type="number" name="" min="1" id="qnty_7" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        <input type="" name="" value="" min="1" id="jumla_7" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <input type="" name="" value="50" min="1" id="amount_8" readonly class="form-control" style="width: 130px; height:30px;border: none; color: #2ccff4;">
                        </div>
                             <div class="col-lg-4">
                        <input type="number" name="" min="1" id="qnty_8" class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                        <input type="" name="" value="" min="1" id="jumla_8" autocomplete="off" class="form-control"style="width: 130px; height:30px;border: none; color: blue;">
                        </div>


                             <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                       
                        </div>

                        <input type="hidden" value="<?php echo $customer->customer_id; ?>" name="customer_id">
                    <input type="hidden" value="<?php echo $customer->comp_id; ?>" name="comp_id">
                    <input type="hidden" value="<?php echo $customer->blanch_id; ?>" name="blanch_id">
                    <input type="hidden" value="<?php echo $customer_loan->loan_id; ?>" name="loan_id">
                     <input type="hidden" value="LOAN RETURN" name="description">
                             <div class="col-lg-4">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b>Total Amount</b></label>
                        </div>
                        <input type="number" name="depost" min="1" id="jumla" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 5px;">
                        </div>
                             <div class="col-lg-4">
                       
                        </div>
                        <div class="col-lg-4">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        <br>
                           <b>Deposit method & Date</b>
                        </div>
                             <div class="col-lg-3">
                                <div class="text-center">
                        <label for="recipient-name" class="form-control-label"><b></b></label>
                        </div>
                       <!--  <input type="number" name="withdrow" id="jumlas" autocomplete="off" required class="form-control"style="width: 130px; height:30px;border-radius: 8px;"> -->
                        <select type="text" name="p_method" class="form-control" required style="border-radius: 8px;">
                            <option value="">Select Deposit Method</option>
                            <?php foreach ($acount as $acounts): ?>
                            <option value="<?php echo $acounts->trans_id; ?>"><?php echo $acounts->account_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>

                        <div class="col-lg-3">
                         <?php if ($customer_loan->loan_status == 'withdrawal') {
                      ?>
                <span>Recovery Amount</span>
                    <input type="text" class="form-control" value="<?php echo number_format($total_recovery->total_pending); ?>.00" readonly style="color:red"> 
                <?php }elseif ($customer_loan->loan_status == 'out') {
                 ?>
                  <span style="color:red;">Default Amount</span>
                <input type="text" class="form-control" value="<?php echo number_format($out_stand->total_out); ?>.00" readonly style="color:red"> 
                 <?php }else{ ?>
                    <span>Recovery Amount</span>
                    <input type="text" class="form-control" value="0.00" readonly style="color:red"> 
                    <?php } ?> 
                        </div>
                        <div class="col-lg-2">
                            <span>Deposit date</span>
                            <?php $today = date("Y-m-d") ?>
                            <input type="date" class="form-control" name="deposit_date" value="<?php echo $today; ?>" style="border-radius: 8px;">
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Deposit</button>
                <button type="reset" class="btn btn-danger">Reset</button>

            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>


<!-- <p>search</p> -->

<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("admin/search_customerData"); ?>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                            <label class="form-control-label">*Search Customer Name:</label>
                            <select class="form-control kt-selectpicker" name="customer_id" required data-live-search="true">
                                    <option value="">Select customer</option>
                                    <?php foreach ($customery as $customers): ?>
                                <option value="<?php echo $customers->customer_id; ?>"><?php echo $customers->f_name; ?> <?php echo $customers->m_name; ?> <?php echo $customers->l_name; ?> / <?php echo $customers->blanch_name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="comp_id" value="<?php echo $_SESSION['comp_id']; ?>">
                        </div>
                             <div class="col-lg-4">
                       
                        </div>
                    </div>  
                 </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--end::Modal-->
</div>



<script>
    function SendSmSButton() {
        event.preventDefault()
        const resend = document.querySelector("#resend")
        alert("jamaaa")

        setTimeout(()=>{
            resend.style.display = 'none'
        }, 4000)

        setTimeout(()=>{
            resend.style.display = 'block'
        }, 10000)
    }
</script>

<script>
    $(document).ready(function (){ 
        $("#amount_1,#qnty_1,#amount_2,#qnty_2,#jumla_1,#jumla_2,#amount_3,#qnty_3,#jumla_3,#amount_4,#qnty_4,#jumla_4,#amount_5,#qnty_5,#jumla_5,#amount_6,#qnty_6,#amount_7,#qnty_7,#amount_8,#qnty_8,#jumla_8").change(function() {
            $("#jumla_1").val($("#amount_1").val() * $("#qnty_1").val());
            $("#jumla_2").val($("#amount_2").val() * $("#qnty_2").val());
            $("#jumla_3").val($("#amount_3").val() * $("#qnty_3").val());
            $("#jumla_4").val($("#amount_4").val() * $("#qnty_4").val());
            $("#jumla_5").val($("#amount_5").val() * $("#qnty_5").val());
            $("#jumla_6").val($("#amount_6").val() * $("#qnty_6").val());
            $("#jumla_7").val($("#amount_7").val() * $("#qnty_7").val());
            $("#jumla_8").val($("#amount_8").val() * $("#qnty_8").val());

            $("#jumla").val(+$("#jumla_1").val()+ +$("#jumla_2").val()+ +$("#jumla_3").val()+ +$("#jumla_4").val()+ +$("#jumla_5").val()+ +$("#jumla_6").val() + +$("#jumla_7").val()+ +$("#jumla_8").val());

        });
    });
</script>



<script>
    $(document).ready(function (){ 
        $("#amount_1s,#qnty_1s,#amount_2s,#qnty_2s,#jumla_1s,#jumla_2s,#amount_3s,#qnty_3s,#jumla_3s,#amount_4s,#qnty_4s,#jumla_4s,#amount_5s,#qnty_5s,#jumla_5s,#amount_6s,#qnty_6s,#amount_7s,#qnty_7s,#amount_8s,#qnty_8s,#jumla_8s").change(function() {
            $("#jumla_1s").val($("#amount_1s").val() * $("#qnty_1s").val());
            $("#jumla_2s").val($("#amount_2s").val() * $("#qnty_2s").val());
            $("#jumla_3s").val($("#amount_3s").val() * $("#qnty_3s").val());
            $("#jumla_4s").val($("#amount_4s").val() * $("#qnty_4s").val());
            $("#jumla_5s").val($("#amount_5s").val() * $("#qnty_5s").val());
            $("#jumla_6s").val($("#amount_6s").val() * $("#qnty_6s").val());
            $("#jumla_7s").val($("#amount_7s").val() * $("#qnty_7s").val());
            $("#jumla_8s").val($("#amount_8s").val() * $("#qnty_8s").val());

            $("#jumlas").val(+$("#jumla_1s").val()+ +$("#jumla_2s").val()+ +$("#jumla_3s").val()+ +$("#jumla_4s").val()+ +$("#jumla_5s").val()+ +$("#jumla_6s").val() + +$("#jumla_7s").val()+ +$("#jumla_8s").val());

        });
    });
</script>


<script>
    $(document).ready(function (){ 
        $("#amount_1a,#qnty_1a,#amount_2a,#qnty_2a,#jumla_1a,#jumla_2a,#amount_3a,#qnty_3a,#jumla_3a,#amount_4a,#qnty_4a,#jumla_4a,#amount_5a,#qnty_5a,#jumla_5a,#amount_6a,#qnty_6a,#amount_7a,#qnty_7a,#amount_8a,#qnty_8a,#jumla_8a").change(function() {
            $("#jumla_1a").val($("#amount_1a").val() * $("#qnty_1a").val());
            $("#jumla_2a").val($("#amount_2a").val() * $("#qnty_2a").val());
            $("#jumla_3a").val($("#amount_3a").val() * $("#qnty_3a").val());
            $("#jumla_4a").val($("#amount_4a").val() * $("#qnty_4a").val());
            $("#jumla_5a").val($("#amount_5a").val() * $("#qnty_5a").val());
            $("#jumla_6a").val($("#amount_6a").val() * $("#qnty_6a").val());
            $("#jumla_7a").val($("#amount_7a").val() * $("#qnty_7a").val());
            $("#jumla_8a").val($("#amount_8a").val() * $("#qnty_8a").val());

            $("#jumlaa").val(+$("#jumla_1a").val()+ +$("#jumla_2a").val()+ +$("#jumla_3a").val()+ +$("#jumla_4a").val()+ +$("#jumla_5a").val()+ +$("#jumla_6a").val() + +$("#jumla_7a").val()+ +$("#jumla_8a").val());

        });
    });
</script>
