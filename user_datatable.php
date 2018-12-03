
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Users</h1>
		<div class="">
			<a class="btn btn-primary" href="add_user.php">Add User</a>
			<?php 
			$fields = [
				'tbl_user',
				[ 
					'name' => 'Name' , 
					'age'  => 'Age',
					'dmy'  => 'Date/Month/Year',
					'nickname' => 'NickName' , 
					'is_employee' => 'Employee/User' ,
					'none' => 'Action' 
				],
				'table table-responsive table-stripe',
				3,
				function($data){
					return 
					'<td>
	                	<a href="edit_user.php?editid='.$data->id .'">Edit</a> | 
	                	<a onclick="return confirm(\'Are you sure you want to delete this user?\');" href="?delUserid='.$data->id .'">Delete</a>
	                </td>';
				}
			];
			echo $core->dataTable($fields);
			?>
		</div>
		
	</div>
</div>

<script>
	/*function sort_table(elm){
		console.log();
	}*/
</script>

 
<?php include('footer.php'); ?>




