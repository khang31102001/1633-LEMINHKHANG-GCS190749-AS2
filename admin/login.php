<?php
include '../classes/adminlogin.php';
?>

<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // The request is using the POST method
	$adminUser = $_POST['adminUser'];
	$adminPass = md5($_POST['adminPass']);

	$login_check = $class->login_admin($adminUser, $adminPass);

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
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span><?php
			   if(isset($login_check ))
			   {
			   	 echo $login_check ;
			   }

		    ?></span>
			<div>
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="registeradmin.php">Create An Admin Account </a>
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Forgot Password?</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>