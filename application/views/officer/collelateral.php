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

          <?php //foreach ($customer_profile as $customer_profiles): ?>
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



 <div class="col-lg-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon kt-hidden">
                    <i class="la la-gear"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        COLATERAL ATTACHMENT

                    </h3>
                </div>
            </div>
  
            <!--begin::Form-->
            
               <div class="container">
  
    <?php echo form_open("oficer/create_colateral/{$loan_attach->loan_id}",['class'=>'form-horizontal']) ?>
    <div id="dynamic_field">
        <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label">Name:</label>
        <input type="text" class="form-control" id="description" placeholder="Description" name="description" autocomplete="off">
    </div>
    </div>
      <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label">Condition:</label>
        <input type="text" class="form-control" id="description" placeholder="Condition" name="co_condition" autocomplete="off">
    </div>
    </div>
     <div class="col-lg-6">
    <div class="form-group">
      <label class="control-label">Cullent colateral Value:</label>
        <input type="number" class="form-control" id="" placeholder="Enter value" name="value" autocomplete="off">
    </div>
    </div>

    <div class="col-lg-6">
    <div class="form-group">
      <label>Attachment/picture:</label>
        <input type="file" class="form-control" id="attach" placeholder="Enter Middle name" name="file_name" autocomplete="off">
    </div>
    </div>

    <input type="hidden" name="loan_id"  id="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
    </div> 
    </div>
    <div class="form-group">        
       <div class="text-center">
    <button type="submit" class="btn btn-primary">Upload</button>
    <a href="<?php echo base_url("oficer/local_government/{$loan_attach->loan_id}"); ?>" class="btn btn-brand">Next</a>
    </div>
     </div>
  <?php echo form_close(); ?>
</div>
            <!--end::Form-->

        </div>
        <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-list-2"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                COLATERAL ATTACHMENT LIST
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
</div>      </div>
    </div>

    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                         <thead>
                                              <tr>
                                              <th>S/No.</th>
                                                <th>Colateral Name</th>
                                                <th>Colateral Condition</th>
                                                <th>Curent colateral Value:</th>
                                                <th>Image/Document</th>
                                                <th>Action</th>
                                                    
                                                    
                                                 </tr>
                                          </thead>
            
                                    <tbody>
                                          <?php $no = 1; ?>
                                    <?php foreach ($collateral as $collaterals): ?>
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $collaterals->description; ?></td>
                                    <td><?php echo $collaterals->co_condition; ?></td>
                                    <td><?php echo number_format($collaterals->value); ?></td>
                                    <td><img src="<?php echo base_url().'assets/img/'.$collaterals->file_name; ?>" class="img-thumbnail" style="width: 100px; height:100px;"></td>
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
                        <a href="#" class="kt-nav__link" data-toggle="modal" data-target="#kt_modal_<?php echo $collaterals->col_id; ?>">
                            <i class="kt-nav__link-icon flaticon-edit" ></i>
                            <span class="kt-nav__link-text">Edit</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="<?php echo base_url("oficer/delete_colateral/{$collaterals->loan_id}/{$collaterals->col_id}") ?>" class="kt-nav__link" onclick="return confirm('Are you sure?')">
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
<div class="modal fade" id="kt_modal_<?php echo $collaterals->col_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit colateral</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("oficer/modify_colateral/{$collaterals->loan_id}/{$collaterals->col_id}"); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Name:</label>
                        <input type="text" class="form-control" autocomplete="off" name="description" value="<?php echo $collaterals->description; ?>">
                        <label for="recipient-name" class="form-control-label">*Condition:</label>
                        <input type="text" class="form-control" autocomplete="off" name="co_condition" value="<?php echo $collaterals->co_condition; ?>">
                         <label for="recipient-name" class="form-control-label">*Cullent colateral Value::</label>
                        <input type="number" class="form-control" autocomplete="off" name="value" value="<?php echo $collaterals->value; ?>">

                         <label for="recipient-name" class="form-control-label">*Attachment:</label>
                        <input type="file" class="form-control" autocomplete="off" name="file_name">
            </div>
            <div class="text-center">
            <img src="<?php echo base_url().'assets/img/'.$collaterals->file_name; ?>" class="img-thumbnail" style="width:100px;height:100px;">
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
<!--End::Section--> 

<!-- end:: Content -->
<!-- end:: Content -->
                </div>  

                 <?php //endforeach; ?>         
                
<?php include('incs/footer_1.php') ?>
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
           $('#dynamic_field').append('<div id="row'+i+'">                                            <hr>                                                                                     <div class="row">                                                                    <div class="col-lg-5"><div class="form-group">                                                                 <label>Desciption:</label>                                                                                                                                                         <input type="text" class="form-control" placeholder="Enter Description" name="description[]" id="description" autocomplete="off" required>                <input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">                                                                                                                                                    </div></div> <div class="col-lg-5"><div class="form-group">                                                <label>Attachment Documents:</label>                                                                                                                                                         <input type="file" class="form-control" placeholder="Enter Middle name" name="attach[]" id="attach" autocomplete="off" required>                                                                                                                                                                    </div></div>                                                                                                                                                                                                                          <div class="col-lg-2"><br><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></div></div></div></div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Remove This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>