<?php

include BASE_PATH."/vendor/autoload.php";
use SimpleCrud\SimpleCrud;

class Core {

	public $dsn ;
	public $username ;
	public $password ;
	public $pdo ;
	public $db ;
	public $currentPage ;

	public function __construct(){
		$this->dbSetUp();
		$this->check_session();
		$this->saveUser();
		$this->editUser();
		$this->saveRole();
		$this->deleteUser();
		$this->deleteRole();
		$this->login();
		$this->signout();
	}
	private function check_session(){
		if(!session_id()){
			session_start();
		}
	}
	private function dbSetUp(){
		$this->dsn = "mysql:host=localhost;dbname=wedev_test" ; 
		$this->username = "root";
		$this->password = "";
		$this->pdo = new PDO($this->dsn, $this->username, $this->password);
		$this->db = new SimpleCrud($this->pdo);
		$this->currentPage = basename($_SERVER['PHP_SELF']) ;
	}
	public function allUser(){
		$allUsers = $this->db->tbl_user
			    ->select()
			    ->run();
		return $allUsers ;  
	}
	private function postFilter($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	private function saveUser(){
		if(isset($_POST['add_user']) && $_POST['add_user'] == 'add_user'){
			$email = $this->postFilter($_POST['email']);
			$password = $this->postFilter($_POST['password']);
			$name = $this->postFilter($_POST['name']);
			$age = $this->postFilter($_POST['age']);
			$dmy = $this->postFilter($_POST['dmy']);
			if($dmy == 'day'){
				$dateOfBirth = date('Y-m-d',strtotime("-$age days"));
			}
			if($dmy == 'month'){
				$dateOfBirth = date('Y-m-d',strtotime("-$age months"));
			}
			if($dmy == 'year'){
				$dateOfBirth = date('Y-m-d',strtotime("-$age years"));
			}
			$tbl_user = $this->db->tbl_user->create([
			    'name' => $name,
			    'age' => $age ,
			    'date_of_year' => $dateOfBirth,
			    'email' => $email,
			    'password' => md5($password),
			    'is_employee' => 1,
			    'dmy' => $dmy,
			    'created_at' => new Datetime('now'),
			    'nickname' => 'N/A'
			]);
			if($tbl_user->save()){
				echo 'Data saved' ;
			}

		}
	}
	private function editUser(){
		if(isset($_POST['edit_user']) && $_POST['edit_user'] == 'edit_user'){
			$email = $this->postFilter($_POST['email']);
			$name = $this->postFilter($_POST['name']);
			$age = $this->postFilter($_POST['age']);
			$dmy = $this->postFilter($_POST['dmy']);
			$nickname = $this->postFilter($_POST['nickname']);
			$is_employee = $this->postFilter($_POST['is_employee']);
			$editid = $this->postFilter($_POST['edit_user_id']);
			if($dmy == 'day'){
				$dateOfBirth = date('Y-m-d',strtotime("-$age days"));
			}
			if($dmy == 'month'){
				$dateOfBirth = date('Y-m-d',strtotime("-$age months"));
			}
			if($dmy == 'year'){
				$dateOfBirth = date('Y-m-d',strtotime("-$age years"));
			}

			$updateQuery = $this->db->tbl_user->update();
			$updateQuery
			    ->data([
				    'name' => $name,
				    'age' => $age ,
				    'date_of_year' => $dateOfBirth,
				    'email' => $email,
				    'is_employee' => $is_employee ,
				    'nickname' => $nickname ,
				    'dmy' => $dmy
				])
			    ->where('id = :id', [':id' => $editid])
			    ->limit(1);

			$statement = $updateQuery();
			echo 'Successfully Updated' ;    

		}
	}
	public function fetchUser(){
		if(isset($_GET['editid'])){
			$userId =  $_GET['editid'];
			$user = $this->db->tbl_user[$userId];
			return $user ;
		}
	}
	private function saveRole(){
		if(isset($_POST['add_role']) && $_POST['add_role'] == 'add_role'){
			$role_name = $this->postFilter($_POST['role_name']);
			$tbl_role = $this->db->tbl_role->create([
			    'name' => $role_name,
			    'created_at' => new Datetime('now')
			]);
			if($tbl_role->save()){
				echo 'Data saved' ;
			}

		}
	}
	public function allRole(){
		$allRoles = $this->db->tbl_role
			    ->select()
			    ->run();
		return $allRoles ;  
	}
	public function deleteUser(){
		if(isset($_GET['delUserid'])){
			$delUserid =  $_GET['delUserid'];
			$this->db->tbl_user
			    ->delete()
			    ->byId($delUserid)
			    ->run();
		}
	}
	public function deleteRole(){
		if(isset($_GET['delRoleid'])){
			$delRoleid =  $_GET['delRoleid'];
			$this->db->tbl_role
			    ->delete()
			    ->byId($delRoleid)
			    ->run();
		}
	}
	private function login(){
		if(isset($_POST['logindata']) && $_POST['logindata'] == 'logindata'){
			$email = $this->postFilter($_POST['email']);
			$password = md5($this->postFilter($_POST['password']));

			$user = $this->db->tbl_user
			    ->select()
			    ->where('email = :email', [':email' => $email])
			    ->where('password = :password', [':password' => $password])
			    ->one()
			    ->run();
			if(count($user->id) > 0){
				$_SESSION['name'] = $user->name ;
				$_SESSION['userid'] = $user->id ;
				header("Location: ".BASE_URL.'/dashboard.php');
				die();
			}
		}
	}
	public function is_loggedIn(){
		if(isset($_SESSION['name']) && isset($_SESSION['userid'])){
			return true ;
		}
	}
	public function signout(){
		if(isset($_GET['signout']) && $_GET['signout'] == 'true'){
			unset($_SESSION['name']);
			unset($_SESSION['userid']);
			header("Location: ".BASE_URL.'/login.php');
			die();
		}
	}

	public function dataTable($fields=[]){
			if(func_num_args() == 0){
				$fields = [
					'tbl_user',
					[ 
						'name' => 'Name' , 
						'age'  => 'Age',
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
			}
			$tableName = $fields[0];

			$thead = '<thead><tr>';
			foreach ($fields[1] as $key => $value){
				$thead .= '<th>';
				$thead .= $value ;
				$thead .= '</th>';
			}
			$thead .= '<tr><thead>';

			$tbody = '<tbody>';
			$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
			$per_page_limit = $fields[3];

			
			$allData = $this->db->$tableName
				    ->select()
				    ->orderBy('id ASC')
				    ->page($page)
	    			->limit($per_page_limit)
				    ->run();
			foreach ($allData as $data) {
				$tbody .= '<tr>';
				foreach ($fields[1] as $key => $value) {
					if($key != 'none'){
						$tbody .= '<td>'. $data->$key .'</td>';
					}else{
						$tbody .= $fields[4]($data);
					}
				}
				$tbody .= '</tr>';
			}
			$tbody .= '</tbody>';
			

			$totalUser =  $this->db->$tableName->count()->run();
			if($totalUser > 0 && $totalUser <= $per_page_limit){
				$total_page = 1;
			}
			if($totalUser > 0 && $totalUser > $per_page_limit){
				$total_page = (($totalUser%$per_page_limit) == 0) ? $totalUser/$per_page_limit : ceil($totalUser/$per_page_limit) ;
			}
			$pagination = '<div><ul class="pagination">';
			for($i=1;$i<=$total_page;$i++) {
				$pagination .= '<li><a href="?page='.$i.'">'.$i.'</a></li>';
			}	
			$pagination .= '</ul></div>';


			$table = '<div><table class="'.$fields[2].'">' ;
			$table .= $thead ;
			$table .= $tbody ;
			$table .= '</table></div>';
			$table .= $pagination ;



			return $table ;

		
	}




	public function allUserData(){

		$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$per_page_limit = 3;

		$allUserData = $this->db->tbl_user
			    ->select()
			    ->orderBy('id ASC')
			    ->page($page)
    			->limit($per_page_limit)
			    ->run();

		$totalUser =  $this->db->tbl_user->count()->run();
		
		if($totalUser > 0 && $totalUser <= $per_page_limit){
			$total_page = 1;
		}
		if($totalUser > 0 && $totalUser > $per_page_limit){
			$total_page = (($totalUser%$per_page_limit) == 0) ? $totalUser/$per_page_limit : ceil($totalUser/$per_page_limit) ;
		}    

		$userData = [
			'allUserData' => $allUserData,
			'total_page' => $total_page
		];   
			    
		return $userData ;  
	}







}

$core = new Core();
