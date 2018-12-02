<div class="container-fluid">
  <div class="row content">
    
    <div class="col-sm-3 sidenav">
      <h4>User Management</h4>
      <ul class="nav nav-pills nav-stacked">

        <?php if($core->is_loggedIn()){   ;?>
        <li class="<?= ($core->currentPage == 'dashboard.php') ? 'active' : ''  ;?>"><a href="dashboard.php">Dashboard</a></li>
        <li class="<?= ($core->currentPage == 'user.php') ? 'active' : ''  ;?>"><a href="user.php">User</a></li>
        <li class="<?= ($core->currentPage == 'user_datatable.php') ? 'active' : ''  ;?>"><a href="user_datatable.php">User Datatable</a></li>
        <li class="<?= ($core->currentPage == 'role.php') ? 'active' : ''  ;?>"><a href="role.php">Role</a></li>
        <li><a href="?signout=true">Sign Out</a></li>
        
        <?php }else{ ?>
          <li class="<?= ($core->currentPage == 'login.php') ? 'active' : ''  ;?>"><a href="login.php">Sign In</a></li>
          <li class="<?= ($core->currentPage == 'add_user.php') ? 'active' : ''  ;?>"><a href="add_user.php">Sign Up</a></li>
        <?php } ?>  
      </ul><br>
    </div>
    <div class="col-sm-9">