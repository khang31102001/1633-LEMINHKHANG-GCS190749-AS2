 <?php
include'inc/header.php';
include'inc/slider.php';
?>
<?php

		   	    $check_customer_login = Session::get('customer_logi');

		   	    if($check_customer_login == false){

		   	    	header('location: login.php');
		   	        

		   	    }
?>

<style type="text/css">
	.order_page{
		font-size: 30px;
		font-weight: bold;
		color: green;
	}
</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="order_page">

				<div class ="not_found">
					<h3>Order page</h3>
				</div>
			    	
							
			</div>
					
	   </div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


<?php
   include'inc/footer.php';
?>