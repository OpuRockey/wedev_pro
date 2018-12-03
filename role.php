
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Role</h1>
		<div class="">
			<a class="btn btn-primary" href="add_role.php">Add Role</a>
			<table id="example" class="display" style="width:100%">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php
		            $allRoles = $core->allRole();
		            foreach ($allRoles as $role) {
		            ?>
		            <tr>
		                <td><?= $role->name  ;?></td>
		                <td>
		                	<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');" href="?delRoleid=<?= $role->id  ;?>"><span class="glyphicon glyphicon-remove"></span></a>
		                </td>
		            </tr>

		            <?php	
		            }
		            ?>
		        </tbody>
		        <tfoot>
		            <tr>
		                <th>Name</th>
		                <th>Action</th>
		            </tr>
		        </tfoot>
		    </table>

			
		</div>
	</div>
</div>    
 
<?php include('footer.php'); ?>




