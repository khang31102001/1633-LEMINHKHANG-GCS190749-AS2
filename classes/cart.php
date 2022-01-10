<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class cart
{
	private $db;
	private $fm;
	
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function add_to_cart($quanlity, $id){

		$quanlity = $this->fm->validation($quanlity);

		$quanlity = mysqli_real_escape_string($this->db->link, $quanlity);
        $id = mysqli_real_escape_string($this->db->link,$id );
		$sid = session_id();
	
        $query = "SELECT * FROM tbl_product WHERE productid ='$id'";
		$result = $this->db->select($query)->fetch_assoc();



		$productName = $result['productName'];
        $image = $result['image'];
		$price = $result['price'];

        //$check_cart = "SELECT * FROM tbl_cart WHERE cartid ='$id' AND sid ='$sid'";
         
     
		 $query_cart = "INSERT INTO tbl_cart(productid, sid, productName, price, quanlity, image)
	     VALUES('$id','$sid','$productName',' $price','$quanlity', '$image') ";
			$inset_cart = $this->db->insert($query_cart);

			if($inset_cart){
				header('location: cart.php');
			}else{
				 
				header('location: 404.php');
			}
		
	}

	public function getproductcart(){

		$sid = session_id();

		$query = "SELECT * FROM tbl_cart WHERE sid ='$sid'";
		$result = $this->db->select($query);
		return $result; 

	}

	public function update_to_quanlity($quanlity, $cartid){

		$quanlity = mysqli_real_escape_string($this->db->link, $quanlity);
        $cartid = mysqli_real_escape_string($this->db->link,$cartid );

		$query = "UPDATE tbl_cart SET quanlity ='$quanlity' WHERE cartid ='$cartid'";

		$result = $this->db->update($query);

		if($result){

			$msg = "<span class ='success'>Product Quanlity Updated Successfully</span>";
			return $msg;

		}else{

			$msg = "<span class ='error'>Product Quanlity Updated Not Successfully</span>";
			return $msg;

		}
	}

	public function del_product_cart($id){

		$id = mysqli_real_escape_string($this->db->link, $id);

		$query = "DELETE FROM tbl_cart WHERE cartid ='$id'";
		$result = $this->db->delete($query);
		
		if($result){

			//header('location: cart.php');

		}else{

			$msg = "<span class ='error'>Product Deleted Not Successfully</span>";
			return $msg;

		}




	}

	public function check_cart(){

		$sid = session_id();

		$query = "SELECT * FROM tbl_cart WHERE sid ='$sid'";
		$result = $this->db->select($query);
		return $result; 

	}

	public function del_all_data_cart(){

		$sid = session_id();

		$query = "DELETE FROM tbl_cart WHERE sid ='$sid'";
		$result = $this->db->select($query);
		return $result; 

	}
	 
}
?>