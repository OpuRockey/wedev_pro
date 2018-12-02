
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">User Registration</h1>
		<div class="col-sm-offset-3 col-sm-5 login_form">
			<form method="POST" action="">
			  <input type="hidden" name="add_user" value="add_user">	
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input name="email" type="email" class="form-control" id="email" required="required">
			  </div>
			  <div class="form-group">
			    <label for="password">Password:</label>
			    <input name="password" type="password" class="form-control" id="password" required="required">
			  </div>
			  <div class="form-group">
			    <label for="name">Name:</label>
			    <input name="name" type="text" class="form-control" id="name" required="required">
			  </div>
			  <div class="form-group">
			    <label for="age">Age:</label>
			    <input name="age" type="number" class="form-control" id="age" required="required">
			  </div>
			  <div class="form-group">
				  <label for="dmy">Day/Month/Year:</label>
				  <select name="dmy" class="form-control" required="required">
				    <option value="day">Day</option>
				    <option value="month">Month</option>
				    <option value="year">Year</option>
				  </select>
				</div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>    
 
<?php include('footer.php'); ?>




