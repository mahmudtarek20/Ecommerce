<?php require 'inc/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dashboard
    <small>Customers</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">customers</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
  <?php if (isset($_GET['action'])&&isset($_GET['id'])) {
  	$id=$_GET['id'];
  	$msg=array();
  	if ($_POST) {
  		$name=$_POST['name'];
  		$username=$_POST['username'];
  		$email=$_POST['email'];
  		$mobile=$_POST['mobile'];
  		$sql="UPDATE customer SET name='$name', username='$username', email='$email', mobile='$mobile' WHERE id='$id'";
  		if ($result=mysqli_query($con,$sql)) {
  			$msg[]='<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done! </strong> Customer profile is updated successfully</div>';
  		}else{
  			$msg[]='<div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sorry! </strong> Profile is not updated </div>';
  		}
  	}
  	
  	$sql="SELECT * FROM customer WHERE id='$id'";
  	if ($result=mysqli_query($con,$sql)) {
  		while ($row=mysqli_fetch_assoc($result)) {?>
  		<div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3>Update user</h3>
          </div>
          <div class="box-body">
          <?php foreach ($msg as $key => $value) {
          	echo $value;
          } ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=update&id=<?php echo $id; ?>" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control input-lg" id="name" placeholder="Enter Name">
          </div>
          <fieldset disabled>
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control input-lg" name="username" value="<?php echo $row['username']; ?>" id="username" placeholder="Enter username">
          </div>
          </fieldset>
          <input type="hidden" name="username" value="<?php echo $row['username']; ?>">

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control input-lg" id="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control input-lg" name="mobile" value="<?php echo $row['mobile']; ?>" id="mobile" placeholder="Enter mobile">
          </div>

          <button type="submit" class="btn btn-primary btn-md pull-right">Update Customer</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  	<?php	}
  	}
  }elseif(isset($_GET['delete'])){
  	$id=$_GET['delete'];
  	$sql="DELETE FROM customer WHERE id='$id'";
  	if (mysqli_query($con,$sql)) {
  		echo "<h3>Customer is deleted. <span><a href='customers.php'>Go back</a></span></h3>";
  	}
  }else{?>
  <table id="example" class="display table table-hover" cellspacing="0" width="100%">
  <thead>
  	<tr>
  		<td>Name</td>
  		<td>username</td>
  		<td>email</td>
  		<td>mobile</td>
  		<td>action</td>
  	</tr>
  </thead>
  <tbody>

  <?php $sql="SELECT * FROM customer";
  if ($result=mysqli_query($con, $sql)):
  	while ($row=mysqli_fetch_assoc($result)): ?>
  		<tr>
  			<td><?php echo $row['name']; ?></td>
  			<td><?php echo $row['username']; ?></td>
  			<td><?php echo $row['email']; ?></td>
  			<td><?php echo $row['mobile']; ?></td>
  			<td>
  				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=update&id=<?php echo $row['id']; ?>"><button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></button></a>
  				<a href="<?php echo $_SERVER['PHP_SELF']; ?>?delete=<?php echo $row['id']; ?>"><button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button></a>
  			</td>
  		</tr>
  	<?php	endwhile;
  	echo "</tbody></table>";
  	else:
  endif;
   ?>

  <?php	} ?>
  </section>
</div>
<!-- /.content-wrapper -->
<?php require 'inc/footer.php'; ?>