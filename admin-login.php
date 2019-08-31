<?php require 'inc/header.php'; ?>
<?php 
if (isset($_SESSION['username'])) {?>
	<h1>Sorry sir, You are already logged in as customer</h1>
<?php }else{
	if (isset($_SESSION['admin'])) {?>
	<h1 class="container">You are already logged in as <?php echo $_SESSION['a.name']; ?></h1>
<?php	}else{

$msg=array();
if ($_POST) {
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result=mysqli_query($con, $sql);
	if ($result->num_rows) {
		while ($row=mysqli_fetch_assoc($result)) {
			$_SESSION['admin']=$row['username'];
			$_SESSION['a.name']=$row['name'];
			$_SESSION['a.email']=$row['email'];
			?>
			<script>window.location = "admin";</script>
	<?php	}
	}else{
		$msg[]='<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Username or password is mismatched!
</div>';
	}
}

 ?>
	<div class="content">
	<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Login
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <h2>NEW CUSTOMERS</h2>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<?php foreach ($msg as $key => $value) {
					echo $value;
				} ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				  <div>
					<span>Username<label>*</label></span>
					<input type="text" name="username" placeholder="Enter username" autofocus required> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name="password" placeholder="Enter password" required> 
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>
<?php 
}
} ?>
<?php require 'inc/footer.php'; ?>