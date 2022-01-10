	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestDell = $product->get_dell();
				  if($getLastestDell){
				  	 while($result_dell = $getLastestDell->fetch_assoc()){

				 
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $result_dell['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result_dell['productName'] ?></h2>
						<p><?php echo $result_dell['description'] ?></p>
						<div class="button"><span>
							<a href="details.php?proid=<?php echo $result_dell['productid'] ?>">Add to cart</a>
						</span></div>
				   </div>
			   </div>	
			   <?php
			        }
			      }
			   ?>	

                <?php
				$getLastestapple = $product->get_apple();
				  if($getLastestapple){
				  	 while($result_apple = $getLastestapple->fetch_assoc()){

				 
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $result_apple['image'] ?>" 
						  	alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $result_apple['productName'] ?></h2>
						  <p><?php echo $result_apple['description'] ?></p>
						  <div class="button"><span>
						  	<a href="details.php?proid=<?php echo $result_apple['productid'] ?>">Add to cart</a>
						  </span></div>
					</div>
				</div>
				 <?php
			        }
			      }
			   ?>	


			</div>
			<div class="section group">

			 <?php
				$getLastestSS = $product->get_samsum();
				  if($getLastestSS){
				  	 while($result_samsum = $getLastestSS->fetch_assoc()){

				 
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $result_samsum['image'] ?>"
						 	alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result_samsum['productName'] ?></h2>
						<p><?php echo $result_samsum['description'] ?></p>
						<div class="button"><span>
							<a href="details.php?proid= <?php echo $result_samsum['productid'] ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			 <?php
			        }
			      }
			 ?>

			<?php
				$getLastestHuwai = $product->get_huwai();
				  if($getLastestHuwai){
				  	 while($result_huwai = $getLastestHuwai->fetch_assoc()){

				 
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $result_huwai['image'] ?>" 
						  	alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $result_huwai['productName'] ?></h2>
						  <p><?php echo $result_huwai['description'] ?></p>
						  <div class="button"><span>
						  	<a href="details.php?proid=<?php echo $result_huwai['productid'] ?>">Add to cart</a></span></div>
					</div>
				</div>
			 <?php
			        }
			      }
			 ?>


			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="./images/go1.jpg" alt=""/></li>
						<li><img src="./images/go2.jpg" alt=""/></li>
						<li><img src="./images/go3.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	