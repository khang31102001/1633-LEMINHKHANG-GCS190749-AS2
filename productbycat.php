<?php
include'inc/header.php';
include'inc/slider.php';
?>

<?php


if(!isset($_GET['catId'])|| $_GET['catId'] == NULL ){
    echo "<script> window.location ='404.php'</script>";
}else{
     $id = $_GET['catId'];

 
}



?>


 <div class="main">
    <div class="content">
    	<div class="content_top">

    		<?php
	          $name_cat = $cat->get_name_by_cate($id);

	           if($name_cat){

	           	    while ($result_namecat = $name_cat->fetch_assoc()) {
	           	    
	           
	      ?>
	      <div class="heading">
    		<h3>Category: <span><?php echo $result_namecat['catName']?></span></h3>
    			</div>
    		<?php
		             }
		         } else{
		         	echo 'Category Not Have';
		         }
			?>

    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      <?php
	          $productbycate = $cat->get_pro_by_cate($id);

	           if($productbycate){

	           	    while ($result_allpro = $productbycate->fetch_assoc()) {
	           	    
	           
	      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result_allpro['image'] ?>" 
                    width ="200px" alt="" /></a>
					 <h2><?php echo $result_allpro['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_allpro['description'], 70) ?></p>
					 <p><span class="price"><?php echo $result_allpro['price'].' '.'$' ?></span></p>
				     <div class="button">
				     	<span>
				     	<a href="details.php?proid=<?php echo $result_allpro['productid'] ?>" class="details">Details</a>
				     </span>
				     </div>
				</div>
			<?php
		             }
		          }

			?>



			</div>

	
	
    </div>
 </div>


<?php
   include'inc/footer.php';
?>
