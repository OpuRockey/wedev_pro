
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Edit User</h1>
		<div class="col-sm-offset-3 col-sm-5 login_form">
			<form method="POST" action="">
			  <input type="hidden" name="edit_user" value="edit_user">
			  <input type="hidden" name="edit_user_id" value="<?= $core->fetchUser()->id ;?>">	
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input value="<?= $core->fetchUser()->email ;?>" name="email" type="email" class="form-control" id="email" required="required">
			  </div>
			  <div class="form-group">
			    <label for="name">Name:</label>
			    <input value="<?= $core->fetchUser()->name ;?>" name="name" type="text" class="form-control" id="name" required="required">
			  </div>

			  <div class="form-group">
			    <label for="name">Nick Name:</label>
			    <input value="<?= $core->fetchUser()->nickname ;?>" name="nickname" type="text" class="form-control" id="nickname" required="required">
			  </div>

			  <div class="form-group">
				  <label for="dmy">Is employee:</label>
				  <select name="is_employee" class="form-control" required="required">
				    <option <?= ($core->fetchUser()->is_employee == 1) ? 'selected' : '' ;?> value="1">Yes</option>
				    <option <?= ($core->fetchUser()->is_employee == 0) ? 'selected' : '' ;?> value="0">No</option>
				  </select>
				</div>

			  <div class="form-group">
			    <label for="age">Age:</label>
			    <input value="<?= $core->fetchUser()->age ;?>" name="age" type="number" class="form-control" id="age" required="required">
			  </div>
			  <div class="form-group">
				  <label for="dmy">Day/Month/Year:</label>
				  <select name="dmy" class="form-control" required="required">
				    <option <?= ($core->fetchUser()->dmy == 'day') ? 'selected' : '' ;?> value="day">Day</option>
				    <option <?= ($core->fetchUser()->dmy == 'month') ? 'selected' : '' ;?> value="month">Month</option>
				    <option <?= ($core->fetchUser()->dmy == 'year') ? 'selected' : '' ;?> value="year">Year</option>
				  </select>
				</div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>    
 
<?php include('footer.php'); ?>




