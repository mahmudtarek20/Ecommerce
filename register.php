<?php require 'inc/header.php'; ?>
<?php
$msg=array();
if ($_POST) {
	$name=$_POST['name'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$mobile=$_POST['mobile'];
	$location=$_POST['location'];
	$billing=$_POST['billing'];
	$sql="SELECT * FROM customer WHERE username='$username'";
	$result=mysqli_query($con, $sql);
	if ($result->num_rows) {
		$msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Sorry!</strong> this username is already taken
</div>
';
	}else{
		$sql="INSERT INTO customer(name, username, email, password, mobile, shipping_location, billing_method, status) VALUES('$name','$username','$email','$password','$mobile','$location','$billing', 1)";
		$rst=mysqli_query($con, $sql);
		if ($rst) {
			$msg[]='<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Registration is successfully completed
</div>
';
		}else{
			$msg[]='<div class="alert alert-error alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Registration is not completed! Try again.
</div>
';
		}
	}
}




 ?>
<div class="registration-form">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Registration
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2>Registration</h2>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					 <p>Welcome, please enter the following details to continue.</p>
					 <p>If you have previously registered with us, <a href="#">click here</a></p>
					 <!-- Form action is same page. so we use server php self method -->
					 <?php foreach ($msg as $key => $value) {
					 	echo $value;
					 } ?>
					 <div class="msg"></div>
					 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form" method="POST">
						 <ul>
							 <li class="text-info"><label for="name">Name: </label></li>
							 <li><input type="text" name="name" id="name" placeholder="Enter your full name" required autofocus></li>
						 </ul>				 
						<ul>
							 <li class="text-info"><label for="username">Username:</label></li>
							 <li><input type="text" name="username" id="username" placeholder="Enter your username" required></li>
						 </ul>
						 <ul>
							 <li class="text-info"><label for="email">Email: </label></li>
							 <li><input type="email" class="reg-field" name="email" id="email" placeholder="Enter your email" required></li>
						 </ul>
						 <ul>
							 <li class="text-info"><label for="password">Password: </label></li>
							 <li><input type="password" name="password" id="password" placeholder="Enter your password" required></li>
						 </ul>
						 <ul>
							 <li class="text-info"><label for="mobile">Mobile Number:</label></li>
							 <li><input type="text" name="mobile" id="mobile" placeholder="Enter your phone number"></li>
						 </ul>
						 <ul>
							 <li class="text-info"><label for="location">Shipping location:</label></li>
							 <li><input type="text" name="location" id="location" placeholder="Enter shipping location"></li>
						 </ul>
						 <ul>
							 <li class="text-info"><label for="billing">Billing method:</label></li>
							 <li><input type="text" name="billing" id="billing" placeholder="Enter billing method"></li>
						 </ul>
						 <input type="submit" id="submit" value="REGISTER NOW">
						 <p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p> 
					 </form>
				 </div>
			</div>
			
			<div class="clearfix"></div>
		</div>
			</div>
		</div>
	</div>
</div>
<!-- registration-form -->
<?php require 'inc/footer.php'; ?>
<script src="custom/js/register.js"></script>