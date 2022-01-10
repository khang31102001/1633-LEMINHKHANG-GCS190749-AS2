<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
/**
 * 
 */
class adminlogin  
{
	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function login_admin($adminUser, $adminPass)
	{
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

		if(empty($adminUser) || empty($adminPass)){

			$alert ="User and Pass must be not  empty";
			return $alert;

		}else{
			$query = "SELECT * FROM tbl_admin WHERE adminUser ='$adminUser' AND adminPass ='$adminPass' LIMIT 1";
			$result = $this->db->select($query);

			if($result != false){
				$value = $result->fetch_assoc();
				
				Session::set('amlogin', true);

				Session::set('adminid', $value['adminid']);
				Session::set('adminUser', $value['adminUser']);
				Session::set('adminName', $value['adminName']);
				header('Location: index.php');

			}else{

				$alert ="User and Pass not match";
			     return $alert;
			}
		}

	}



	public function register_admin($data){


		$adminName = mysqli_real_escape_string($this->db->link, $data['adminName']);
		$adminEmail = mysqli_real_escape_string($this->db->link, $data['adminEmail']);
		$adminUser = mysqli_real_escape_string($this->db->link, $data['adminUser']);
		$adminPass = mysqli_real_escape_string($this->db->link, md5($data['adminPass']));
		$level = mysqli_real_escape_string($this->db->link, $data['level']);




		if($adminName == "" || $adminEmail ==" " || $adminUser ==" " || $adminPass==" " || $level == " "){

			$alert ="<span class ='error'>Fields Must Be Not  Empty</span>";
			return $alert;

		}else{

			$check_email = "SELECT *FROM tbl_admin WHERE adminEmail = '$adminEmail' And adminUser ='$adminUser' LIMIT 2 ";
			$result_check = $this->db->select($check_email);

			if($result_check){

				$alert ="<span class ='error'> Email or Username Already Existed</span>";
				return $alert; 

			}else{

			$query = "INSERT INTO tbl_admin(adminName, adminEmail, adminUser, adminPass, level)
			VALUES('$adminName','$adminEmail','$adminUser','$adminPass','$level')";

			$result = $this->db->insert($query);

			if($result){
				$alert ="<span class ='success'> Admin Created Successfully</span>";
				return $alert; 
			}else{
				$alert ="<span class ='error'> Admin Created Not Successy</span>";
				return $alert;
			   }



			     }
			



	       }

	}




}
?>