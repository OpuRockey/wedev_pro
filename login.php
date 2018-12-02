
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Login Form</h1>
		<div class="col-sm-offset-3 col-sm-5 login_form">
			<form method="POST" action="">
				<input type="hidden" name="logindata" value="logindata">
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input name="email" type="email" class="form-control" id="email">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input name="password" type="password" class="form-control" id="pwd">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>    
 
<?php include('footer.php'); ?>



