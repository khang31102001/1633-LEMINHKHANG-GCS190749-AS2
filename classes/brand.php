<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class brand
{
	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_brand($brandName)
	{
		$brandName = $this->fm->validation($brandName);


		$brandName = mysqli_real_escape_string($this->db->link, $brandName);


		if(empty($brandName)){

			$alert ="<span class ='error'>Brand Must Be Not  Empty</span>";
			return $alert;

		}else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
			$result = $this->db->insert($query);

			if($result){
				$alert ="<span class ='success'> Insert Brand Successfully</span>";
				return $alert; 
			}else{
				$alert ="<span class ='error'> Insert Brand Not Successy</span>";
				return $alert;
			}

		
		}

	}

	public function show_brand()
	{
		$query = "SELECT * FROM tbl_brand order by brandid desc";
		$result = $this->db->select($query);
		return $result;


	}

	public function update_brand($brandName, $id){
		$brandName = $this->fm->validation($brandName);
	


		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		$id = mysqli_real_escape_string($this->db->link, $id);


		if(empty($brandName)){

			$alert ="<span class ='error'>Brand Must Be Not  Empty</span>";
			return $alert;

		}else{
			$query = "UPDATE tbl_brand SET brandName ='$brandName' WHERE brandid ='$id'";
			$result = $this->db->update($query);

			if($result){
				$alert ="<span class ='success'> Brand Updated Successfully</span>";
				return $alert; 
				header('location: catlist.php');
			}else{
				$alert ="<span class ='error'>  Brand Updated  Not Successy</span>";
				return $alert;
			}

	    }
    }

	public function getbrandbyid($id){

		$query = "SELECT * FROM tbl_brand WHERE brandid ='$id'";
		$result = $this->db->select($query);
		return $result;


	}

	public function del_brand($id){

		$query = "DELETE FROM tbl_brand WHERE brandid ='$id'";
		$result = $this->db->delete($query);
			if($result){
				$alert ="<span class ='success'>Brand Deleted Successfully</span>";
				return $alert; 
				header('location: catlist.php');
			}else{
				$alert ="<span class ='error'>Brand Deleted Not Successy</span>";
				return $alert;
			}

	}
}
?>