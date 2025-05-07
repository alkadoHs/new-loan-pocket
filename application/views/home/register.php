<?php include 'incs/header.php'; ?>
  <body>
  	  <style>
body {
  background-image: url('<?php echo base_url(); ?>assets/img/mikoposoft.PNG');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
	<div class="login-wrapper">
		<div class="text-center">
			<h2 class="fadeInUp" style="font-weight:bold">
		<span class="text-success">MikopoSoft Management</span> <span style="color:#ccc; text-shadow:0 1px #fff">System</span>
			</h2>
	    </div>

		<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-plus-circle fa-lg"></i> Sign up
					<?php if ($das = $this->session->flashdata('massage')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-success">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>
				</div>
				<div class="panel-body">
						<?php echo form_open("welcome/create_company",['class'=>'form-login']) ?>
						<div class="col-md-6">
						<div class="form-group">
							<label>Company Name</label>
							<input type="text" name="comp_name" placeholder="Company name" class="form-control input-lg " required autocomplete="off" >
							<?php echo form_error("comp_name"); ?>
						</div>	
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label>Registration Number</label>
							<input type="number" placeholder="Registration Number" name="comp_number" class="form-control input-lg " required  autocomplete="off">
						</div>
						</div>
						<div class="col-md-4">
						<div class="form-group">
							<label>Phone Number</label>
							<input type="number" name="comp_phone" placeholder="Phone Number" class="form-control input-lg " required  autocomplete="off">
						</div>
						</div>
						<div class="col-md-4">
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="adress" placeholder="Address" class="form-control input-lg " required autocomplete="off">
						</div>
						</div>
						<div class="col-md-4">
						<div class="form-group">
							<label>Region</label>
							<select type="number" name="region_id" class="form-control input-lg " required="">
								<option value="">Select Region</option>
								<?php foreach ($region as $regions): ?>
								<option value="<?php echo $regions->region_id; ?>"><?php echo $regions->region_name; ?></option>
								<?php endforeach; ?>
							</select>
							
						</div>
						</div>
						<!-- 		<div class="col-md-4">
						<div class="form-group">
							<label>SMS Status</label>
							<select type="text" name="sms_status" class="form-control input-lg " required="">
								<option value="">Select sms status</option>
								<option value="YES">YES</option>
								<option value="NO">NO</option>
							</select>
							
						</div>
						</div> -->

						<input type="hidden" name="sms_status" value="NO">

						<div class="col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="comp_email" placeholder="Email" class="form-control input-lg " required autocomplete="off">
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" placeholder="******" class="form-control input-lg " autocomplete="off" required >
						</div>
						</div>
					
						<div class="text-center">
							<button type="submit" class="btn btn-success">Sign Up</button> <br><hr>  <b>Already have an account? <a href="<?php echo base_url("welcome/login"); ?>" style="color: blue;">Sign In</a></b>
						</div>
					<?php echo form_close(); ?>

				</div>
			</div><!-- /panel -->
			</div>
			<div class="col-md-2"></div>
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->
	
<?php include 'incs/footer.php'; ?>
