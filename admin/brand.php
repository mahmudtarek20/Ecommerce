<?php require 'inc/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dashboard
    <small>Product</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php if (isset($_GET['action'])) {
    if ($_GET['action']=="create") {
    $msg=array();
    if ($_POST):
    $brand_name=$_POST['brand_name'];
    $company_name=$_POST['company_name'];
    $status=$_POST['status'];
    if ($brand_name==""||$company_name=="" || $status==""):
    if ($brand_name==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Brand name field is required </div>';
    endif;
    if ($company_name==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Company name field is required </div>';
    endif;
    if ($status==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Select status </div>';
    endif;
    else:
    $sql="INSERT INTO brand(brand_id, brand_name, company, status) VALUES(NULL, '$brand_name','$company_name','$status')";
    if (mysqli_query($con, $sql)):
    $msg[]='<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done</strong> Brand is successfully inserted </div>';
    else:
    $msg[]='<div class="alert alert-error alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sorry!</strong> Brand is not inserted </div>';
    endif;
    endif;
    endif;
    ?>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <?php foreach ($msg as $key => $value) {
        echo $value;
        } ?>
        <div class="box box-success">
          <div class="box-header with-border">
            <h3>Add a new brand</h3>
          </div>
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=create" method="POST">
          <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input type="text" name="brand_name" class="form-control input-lg" id="brand_name" placeholder="Enter Brand Name">
          </div>
          <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control input-lg" name="company_name" id="company_name" placeholder="Enter Company Name">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control input-lg">
              <option value="">Select Brand Status</option>
              <option value="1">Available</option>
              <option value="0">Not Available</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary pull-right" onclick="createBrand()">Create Brand</button>
        </form>
          </div>
        </div>
      </div>
    </div>
    <?php }elseif ($_GET['action']=="update") {?>
    <!-- Brand update is started from here -->
    <?php
    $msg=array();
    $id=$_GET['id'];
    if ($_POST) {
      $brand_name=$_POST['brand_name'];
      $company_name=$_POST['company_name'];
      $status=$_POST['status'];
      $sql="UPDATE brand SET brand_name='$brand_name', company='$company_name', status='$status' WHERE brand_id='$id'";
      if (mysqli_query($con, $sql)) {
        $msg[]='<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done</strong> Brand is successfully updated </div>';
      }else{
        $msg[]='<div class="alert alert-error alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sorry!</strong> Brand is not updated </div>';
      }
    }
      ?>
    <!-- Brand update form is started from here -->
    <?php $sql="SELECT * from brand where brand_id=$id";
    if ($result=mysqli_query($con, $sql)) {
      while ($row=mysqli_fetch_assoc($result)) {?>
      <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <?php foreach ($msg as $key => $value) {
        echo $value;
        } ?>
        <div class="box box-success">
          <div class="box-header with-border">
            <h3>Update brand</h3>
          </div>
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=update&id=<?php echo $id; ?>" method="POST">
          <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input type="text" name="brand_name" class="form-control input-lg" id="brand_name" value="<?php echo $row['brand_name']; ?>" placeholder="Enter Brand Name" required autofocus>
          </div>
          <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control input-lg" name="company_name" id="company_name" value="<?php echo $row['company']; ?>" placeholder="Enter Company Name" required>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control input-lg">
              <?php if ($row['status']==1) {
                echo '<option value="1">Available</option>
              <option value="0">Not Available</option>';
              }else{
                echo '<option value="0">Not Available</option><option value="1">Available</option>';
                } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Update Brand</button>
        </form>
          </div>
        </div>
      </div>
    </div>
    <?php  }
     } ?>
    <!-- Brand update form is ended here -->
   <?php }
   elseif ($_GET['action']=='delete') {
    $id=$_GET['id'];
    $sql="DELETE FROM brand WHERE brand_id='$id'";
    if (mysqli_query($con, $sql)) {
      echo "<h3>Brand is deleted successfully. <span><a href='brand.php'>Go back</a></span></h3>";
    }else{
      echo '<h3 class="label label-danger">Brand is not deleted</h3>';
    }
   }
    else{
    }
    }else{
    $sql="SELECT * FROM brand";
    $result=mysqli_query($con, $sql);
    if ($result->num_rows) { 
      $i=1; ?>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">All Brand with company name</h3>
      </div>
      <div class="box-body no-padding">
     <table id="example" class="display table table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Brand Name</th>
          <th>Company Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php  while ($row=mysqli_fetch_assoc($result)) {?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row['brand_name']; ?></td>
          <td><?php echo $row['company']; ?></td>
          <td><?php if ($row['status']==1) {?>
          <span class="label label-success">Available</span>
          <?php }else{?>
          <span class="label label-danger">Unavailable</span>
          <?php  } ?></td>
          <td><a href="brand.php?action=update&id=<?php echo $row['brand_id']; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
          <a href="brand.php?action=delete&id=<?php echo $row['brand_id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
        </tr>
        <?php  } ?>
      </tbody>
    </table>
    </div>
    </div>
    <?php }
    } ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require 'inc/footer.php'; ?>