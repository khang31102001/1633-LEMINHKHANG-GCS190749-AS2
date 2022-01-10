<?php
include'inc/header.php';
include'inc/slider.php';
?>
<?php
if(isset($_GET['ctid'])){

	$id = $_GET['ctid'];

	$delcart = $ct->del_product_cart($id);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
     // The request is using the POST method
	  $cartid = $_POST['cartid'];
	  $quanlity = $_POST['quanlity'];

     $update_number = $ct ->update_to_quanlity($quanlity, $cartid);
 }
?>

<?php
if(!isset($_GET['id'])){
 echo " <meta http-equiv='refresh'content='0; URL=?id=live'> ";
}

?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>

			    	<?php

			    	 if(isset($update_number)){

			    	 	echo $update_number;
			    	 }

			    	?>

			    	<?php

			    	 if(isset($delcart)){

			    	 	echo $delcart;
			    	 }

			    	?>

						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>

							<?php
						    $get_product_cart = $ct->getproductcart();

						     if($get_product_cart){

						      $subtotal =0;
						      $qty =0;

						     	  while($result_cart = $get_product_cart->fetch_assoc()){

						    
							?>
							<tr>
								<td><?php echo $result_cart['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result_cart['image'] ?>" alt=""/></td>
								<td><?php echo $result_cart['price'] ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result_cart['cartid'] ?>"/>
										<input type="number" name="quanlity" min="1"
										value="<?php echo $result_cart['quanlity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								  $total = $result_cart['price'] * $result_cart['quanlity'];
								  echo $total;
							   ?></td>
								<td><a onclick="return confirm('Do You want to Delete?')"
								 href="?ctid=<?php echo $result_cart['cartid']?>">Delete</a></td>
							</tr>
							
							<?php
                         $subtotal += $total;
                         $qty = $qty+$result_cart['quanlity'];

						        }
						      }
							?>
								
						</table>
						<?php
						      $checkcart = $ct->check_cart();

						        if($checkcart){
						 ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
									<?php
									echo $subtotal;
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
									?>
										
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat ;
								echo $gtotal;
							   ?></td>
							</tr>
					   </table>
					   <?php
					     }else{

					     	echo 'Your Cart Is Empty!';

					     }
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
   include'inc/footer.php';
?>
