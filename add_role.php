
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Add Role</h1>
		<div class="col-sm-offset-3 col-sm-5 login_form">
			<form method="POST" action="">
			  <input type="hidden" name="add_role" value="add_role">	
			  <div class="form-group">
			    <label for="email">Role Names:</label>
			    <input name="role_name" type="text" class="form-control" id="role_name" required="required">
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>    
 
<?php include('footer.php'); ?>




