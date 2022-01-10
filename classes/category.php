<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class category 
{
	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_category($catName)
	{
		$catName = $this->fm->validation($catName);


		$catName = mysqli_real_escape_string($this->db->link, $catName);


		if(empty($catName)){

			$alert ="<span class ='error'>Category must be not  empty</span>";
			return $alert;

		}else{
			$query = "INSERT INTO tabl_category(catName) VALUES('$catName') ";
			$result = $this->db->insert($query);

			if($result){
				$alert ="<span class ='success'> insert category successfully</span>";
				return $alert; 
			}else{
				$alert ="<span class ='error'> insert category not successy</span>";
				return $alert;
			}

		
		}

	}

	public function show_category()
	{
		$query = "SELECT * FROM tabl_category order by cateid desc";
		$result = $this->db->select($query);
		return $result;


	}

	public function update_category($catName, $id){
		$catName = $this->fm->validation($catName);
	


		$catName = mysqli_real_escape_string($this->db->link, $catName);
		$id = mysqli_real_escape_string($this->db->link, $id);


		if(empty($catName)){

			$alert ="<span class ='error'>Category must be not  empty</span>";
			return $alert;

		}else{
			$query = "UPDATE tabl_category SET catName ='$catName' WHERE cateid ='$id'";
			$result = $this->db->update($query);

			if($result){
				$alert ="<span class ='success'> category updated successfully</span>";
				return $alert; 
				header('location: catlist.php');
			}else{
				$alert ="<span class ='error'>  category updated  not successy</span>";
				return $alert;
			}

	    }
    }


	public function del_category($id){

		$query = "DELETE FROM tabl_category WHERE cateid ='$id'";
		$result = $this->db->delete($query);
			if($result){
				$alert ="<span class ='success'> category deleted successfully</span>";
				return $alert; 
				header('location: catlist.php');
			}else{
				$alert ="<span class ='error'>  category deleted not successy</span>";
				return $alert;
			}

	}

	public function getcatebyid($id){

		$query = "SELECT * FROM tabl_category WHERE cateid ='$id'";
		$result = $this->db->select($query);
		return $result;


	}

	public function show_category_fontend()
	{
		$query = "SELECT * FROM tabl_category order by cateid desc";
		$result = $this->db->select($query);
		return $result;


	}

	public function get_pro_by_cate($id){

		$query = "SELECT * FROM tbl_product WHERE cateid = '$id'  order by cateid desc LIMIT 8";
		$result = $this->db->select($query);
		return $result;

	}

	public function get_name_by_cate($id){

		$query = "SELECT tbl_product.*, tabl_category.catName, tabl_category.cateid
	    FROM tbl_product ,tabl_category WHERE tbl_product.cateid = tabl_category.cateid AND 
	    tbl_product.cateid = '$id' LIMIT 1 " ;
		$result = $this->db->select($query);
		return $result;

	}





}
?>