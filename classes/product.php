<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php

class product
{
	private $db;
	private $fm;
	
	public function __construct()
	{
		///khai bao  cac class function
		$this->db = new Database();
		$this->fm = new Format();
	}
     
 
	public function insert_product($data, $files)
	{

         //// checking mysqli connection
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$description = mysqli_real_escape_string($this->db->link, $data['description']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		////kiem tra hinh anh va lanh hinh anh cho vao folder uploads.

        $permited = array('jpg','jpeg','png','gif',);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;



		if($productName == "" || $category =="" || $brand =="" || $description=="" || $price =="" || $type =="" || $file_name =="" ){

			$alert ="<span class ='error'>Fields Must Be Not  Empty</span>";
			return $alert;

		}else{
             /// move the image to folder uploads
			move_uploaded_file($file_temp,$uploaded_image);
			
			$query = "INSERT INTO tbl_product(productName, cateid, brandid, description, price, type, image)
			 VALUES('$productName','$category','$brand','$description','$price','$type','$unique_image') ";
			$result = $this->db->insert($query);

			if($result){
				$alert ="<span class ='success'> Insert Product Successfully</span>";
				return $alert; 
			}else{
				$alert ="<span class ='error'> Insert Product Not Successy</span>";
				return $alert;
			}

		
		}

	}



	public function show_product()
	{
		$query = "SELECT tbl_product.*, tabl_category.catName,tbl_brand.brandName
	    FROM tbl_product INNER JOIN tabl_category ON tbl_product.cateid = tabl_category.cateid
	                     INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.brandid
	    order by tbl_product.productid desc";

		$result = $this->db->select($query);
		return $result;


	}

	public function update_product($data,$files, $id){
		

		 //// checking mysqli connection
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$description = mysqli_real_escape_string($this->db->link, $data['description']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		////kiem tra hinh anh va lanh hinh anh cho vao folder uploads.

        $permited = array('jpg','jpeg','png','gif',);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;


		
		if($productName == "" || $category =="" || $brand =="" || $description=="" || $price =="" || $type ==""){

			$alert ="<span class ='error'>Fields Must Be Not  Empty</span>";
			return $alert;

		  }else{

		  	if(!empty($file_name)){
		  		////neu nguoi dung chon anh
		  		if($file_size > 204800){

		  			$alert ="<span class ='error'>Image Size Should be Less Than 2MB!</span>";
			        return $alert;

		  		}elseif(in_array($file_ext,$permited)==false){

		  			$alert ="<span class ='error'>You Can Upload Only:-".explode(',',  $permited)."</span>";
			        return $alert;

		  		}
		  		move_uploaded_file($file_temp,$uploaded_image);

		  		$query = "UPDATE tbl_product SET
		  		productName ='$productName',
		  		cateid ='$category',
		  		brandid ='$brand',
		  		description ='$description',
		  		price ='$price',
		  		type ='$type',
		  		image ='$unique_image'
		  		WHERE productid ='$id'";




		  	}else{

		  		$query = "UPDATE tbl_product SET
		  		productName ='$productName',
		  		cateid ='$category',
		  		brandid ='$brand',
		  		description ='$description',
		  		price ='$price',
		  		type ='$type'
		  		WHERE productid ='$id'";

		  	}


			$result = $this->db->update($query);

			if($result){
				$alert ="<span class ='success'> Product Updated Successfully</span>";
				return $alert; 

			}else{
				$alert ="<span class ='error'>  Product Updated  Not Successy</span>";
				return $alert;
			



	        }   

            }
    }


	public function del_product($id){

		$query = "DELETE FROM tbl_product WHERE productid ='$id'";
		$result = $this->db->delete($query);
			if($result){
				$alert ="<span class ='success'> Product Deleted Successfully</span>";
				return $alert; 
				header('location: catlist.php');
			}else{
				$alert ="<span class ='error'>  Product Deleted Not Successy</span>";
				return $alert;
			}

	}

	public function getproductbyid($id){

		$query = "SELECT * FROM tbl_product WHERE productid ='$id'";
		$result = $this->db->select($query);
		return $result;


	}

	//end back
	public function getproduct_feathered(){

		$query = "SELECT * FROM tbl_product WHERE type ='0'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getproduct_new(){

		$query = "SELECT * FROM tbl_product order by productid desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}

	public function get_details($id){

		$query = "SELECT tbl_product.*, tabl_category.catName,tbl_brand.brandName
	    FROM tbl_product INNER JOIN tabl_category ON tbl_product.cateid = tabl_category.cateid
	                     INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.brandid
	    WHERE tbl_product.productid ='$id' ";
 		$result = $this->db->select($query);
		return $result;

	}

	public function get_dell(){

		$query = "SELECT * FROM tbl_product where brandid = '9' order by productid desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;

	}

	public function get_apple(){

		$query = "SELECT * FROM tbl_product where brandid ='13' order by productid desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;

	}


	public function get_samsum(){

		$query = "SELECT * FROM tbl_product where brandid ='11' order by productid desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;

	}

	public function get_huwai(){

		$query = "SELECT * FROM tbl_product where brandid = '12' order by productid desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;

	}


	public function get_product_to_profile(){

		$query = "SELECT * FROM tbl_product where cateid = '28' order by productid desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}


	public function get_product_laptop(){


		$query = "SELECT * FROM tbl_product where cateid = '27' order by cateid desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;

    }

  



	


}
?>