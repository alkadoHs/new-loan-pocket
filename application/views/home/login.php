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
			<h2 class="" style="font-weight:bold">
		<span class="text-success">MikopoSoft Management </span> <span style="color:#ccc; text-shadow:0 1px #fff">System</span>
			</h2>
	    </div>

		<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4">	
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-key fa-lg"></i><a href="<?php echo base_url("welcome/admin_login") ?>" style="color: blue;"><b>Admin</b></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="fa fa-key fa-lg"></i><a href="<?php echo base_url("welcome/employee_login"); ?>" style="color: orange;"><b>Employee</b></a>
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
	<?php if ($das = $this->session->flashdata('mass')): ?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismisible alert-danger">
<a href="" class="close">&times;</a>
<?php echo $das;?>
</div>
</div>
</div>
<?php endif; ?>
				</div>
				<div class="panel-body">
						<?php echo form_open("welcome/signin",['class'=>'form-login']) ?>
						<div class="form-group">
							<label>Phone Number</label>
							<input type="number" placeholder="phone number" name="comp_phone" class="form-control input-lg" required  autocomplete="off">
							<?php echo form_error("comp_phone") ?>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" placeholder="******" class="form-control input-lg" autocomplete="off" required >
							  <?php echo form_error("password"); ?>
						</div>
					
						<div class="text-center">
							<button type="submit" class="btn btn-success">Login</button> <br></b>
						</div>
					<?php echo form_close(); ?>
         <div class="text-center">
							 <hr>  <b>You Don`t have  account? <a href="<?php echo base_url("welcome/register"); ?>" style="color: blue;">Sign Up</a></b>
						</div>
				</div>
			</div><!-- /panel -->
			</div>
			<div class="col-md-4">

			</div>
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->



	<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
<?php include 'incs/footer.php'; ?>
