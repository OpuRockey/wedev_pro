
<?php include('header.php'); ?>
<?php include('left_sidebar.php'); ?>

<div class="container-fluid">
	<div class="row">
		<h1 class="text-center">Users</h1>
		<div class="">
			<a class="btn btn-primary" href="add_user.php">Add User</a>
			<table id="example" class="display" style="width:100%">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Age</th>
		                <th>Nickname</th>
		                <th>Employee/User</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php
		            $allUsers = $core->allUser();
		            foreach ($allUsers as $user) {
		            ?>
		            <tr>
		                <td><?= $user->name  ;?></td>
		                <td><?php
		                /*$dob = $user->date_of_year->format('Y-m-d');
		                $d1 = new Datetime('now');
						$d2 = new DateTime($dob);
						$diff = $d2->diff($d1);
						echo $diff->y;*/
		                ?>
		                <?= $user->age  ;?> <?= $user->dmy  ;?>s	
		                </td>
		                <td><?= $user->nickname  ;?></td>
		                <td><?= ($user->is_employee == 1) ? 'Employee' : 'User'  ;?></td>
		                <td>
		                	<a class="btn btn-primary" href="edit_user.php?editid=<?= $user->id  ;?>"><span class="glyphicon glyphicon-edit"></span></a>
		                	<a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');" href="?delUserid=<?= $user->id  ;?>"><span class="glyphicon glyphicon-remove"></span></a>
		                </td>
		            </tr>

		            <?php	
		            }
		            ?>
		        </tbody>
		        <tfoot>
		            <tr>
		                <th>Name</th>
		                <th>Age</th>
		                <th>Nickname</th>
		                <th>Employee</th>
		                <th>Action</th>
		            </tr>
		        </tfoot>
		    </table>

			
		</div>
	</div>
</div>    
 
<?php include('footer.php'); ?>




