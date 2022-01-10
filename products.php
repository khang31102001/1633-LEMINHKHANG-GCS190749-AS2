<?php
include'inc/header.php';
include'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Catogery: Furniture </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	   <?php
    	  $get_pro_smartphone = $product->get_product_to_profile();

    	   if($get_pro_smartphone){

    	   	while ($result_profile = $get_pro_smartphone->fetch_assoc()) {
    	   
    	?>

				<div class="grid_1_of_4 images_1_of_4" >
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_profile['image'] ?>" 
					 	alt="" /></a>
					 <h2><?php echo $result_profile['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_profile['description'], 50) ?></p>
					 <p><span class="price"><?php echo $result_profile['price']." "."$" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_profile['productid']?>" class="details">Details</a></span></div>
				</div>
		<?php
	          }
	      }
		?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">

    		<?php
    		?>
    		<h3>Category: Wood</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">

			<?php
    	       $get_pro_laptop = $product->get_product_laptop();

    	         if($get_pro_laptop){

    	   	       while ($result_laptop = $get_pro_laptop->fetch_assoc()) {
    	   
    	   ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_laptop['image'] ?>" alt="" /></a>
					 <h2><?php echo $result_laptop['productName'] ?></h2>
					 <p><span class="price"><?php echo $fm->textShorten($result_laptop['description'], 50) ?></span></p>
				    
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_laptop['productid']?>" class="details">Details</a></span></div>
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