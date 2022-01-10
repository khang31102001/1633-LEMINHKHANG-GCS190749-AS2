<?php
include'inc/header.php';
///include'inc/slider.php';
?>

<?php

 $check_customer_login = Session::get('customer_logi');

if($check_customer_login){

header('location: order.php');
		   	        

}
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
 

       $logincs = $cs->login_customer($_POST);

     }
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php

    		    if(isset($logincs)){
    		    	echo  $logincs;
    		    }
    		?>
        	<form action="" method="post" id="member">
                	<input  type="text" name="email" class="field" placeholder="Enter Your Email...." />
                    <input name="password" type="text" placeholder="Enter Your Password...." class="field"/>
                 
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name ="login" class="grey" value="Sign In" style="font-size: 19px; background: black ; color: white;" /></div></div>

                
         </form>
          <div class="buttons"><p><a href="admin/login.php">Sign In Admin Page</a></p></div>
                    </div>
         	<div class="register_account">
    		<?php
    		     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
 

                $insertcs = $cs->insert_customer($_POST);

               }
    		?>
    		<h3>Register New Account</h3>
    		<?php

    		    if(isset($insertcs)){
    		    	echo $insertcs;
    		    }
    		?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text"  name ="name" placeholder="Enter Your Name...." />
							</div>
							
							<div>
							   <input type="text" name ="city" placeholder="Enter Your City...."  />
							</div>

							<div>
								<input type="text" name ="zipcode" placeholder="Enter Your Zipcode...." />
							</div>
							
							<div>
								<input type="text" name ="email" placeholder="Enter Your Email...." />
							</div>


		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter Your Address...." />
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>
							<option value="Vietnames">Vietnames</option>
							<option value="Amarican">American</option>
							<option value="Janpan">Japan</option>
							<option value="China">China</option>
							<option value="Korean">Korean</option>			            
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter Your Phone...." />
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Enter Your Password...." />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div>
		   <input type="submit" name ="submit" class="grey" value="Create Account" style="font-size: 19px; background: black ; color: white; " />
		   </div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php
   include'inc/footer.php';
?>