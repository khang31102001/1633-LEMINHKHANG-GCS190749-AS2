<?php
include '../classes/adminlogin.php';
?>

<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // The request is using the POST method
	

	$register_check = $class->register_admin($_POST);

}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="registeradmin.php" method="post">
			<h1>Admin Register</h1>
			<span><?php
			   if(isset($register_check ))
			   {
			   	 echo $register_check ;
			   }

		    ?></span>
		    <div>
				<input type="text" placeholder="Enter Your Name...." required="" name="adminName"/>
			</div>
			<div>
				<input type="text" placeholder="Enter Username..." required="" name="adminUser"/>
			</div>
			<div>
				<input type="text" placeholder="Enter Email...." required="" name="adminEmail"/>
			</div>
			<div>
				<input type="password" placeholder="Enter Password..." required="" name="adminPass"/>
			</div>
			<div>
				<select id="level" name="level" onchange="change_level(this.value)" style="border-radius: 3px;border: 1px solid #c8c8c8; 	color: #777;">
							<option value="null">Select a Level</option>
							<option value="0">Manage</option>
							<option value="1">Employee</option>
									            
		         </select>
			</div>
			<div>
				<input type="submit" value="Create" />
			     <a href="login.php" style="font-size:16px;" >Admin Login</a>

			</div>

		</form><!-- form -->
		<div class="button">
			<a href="#">Forgot Password?</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>