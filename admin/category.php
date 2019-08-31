<?php require 'inc/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dashboard
    <small>Category</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Category</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php if (isset($_GET['action'])) {
    if ($_GET['action']=="create") {
    $msg=array();
    if ($_POST):
    $category_name=$_POST['category_name'];
    $status=$_POST['status'];
    if ($category_name=="" || $status==""):
    if ($category_name==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Category name field is required </div>';
    endif;
    if ($status==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Select status </div>';
    endif;
    else:
    $sql="INSERT INTO category(cat_id, cat_name, status) VALUES(NULL, '$category_name','$status')";
    if (mysqli_query($con, $sql)):
    $msg[]='<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done</strong> Category is successfully inserted </div>';
    else:
    $msg[]='<div class="alert alert-error alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sorry!</strong> Category is not inserted </div>';
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
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control input-lg" id="category_name" placeholder="Enter Category Name">
              </div>
              
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control input-lg">
                  <option value="">Select Category Status</option>
                  <option value="1">Available</option>
                  <option value="0">Not Available</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Create Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php }
    elseif ($_GET['action']=='delete') {
    $id=$_GET['id'];
    $sql="DELETE FROM category WHERE cat_id='$id'";
    if (mysqli_query($con, $sql)) {
      echo "<h3>Category is deleted successfully. <span><a href='category.php'>Go back</a></span></h3>";
    }else{
      echo '<h3 class="label label-danger">Category is not deleted</h3>';
    }
   }
    elseif($_GET['action']=='edit'){
      $cid=$_GET['id'];
      $msg=array();
    if ($_POST):
    $category_name=$_POST['category_name'];
    $status=$_POST['status'];
    if ($category_name=="" || $status==""):
    if ($category_name==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Category name field is required </div>';
    endif;
    if ($status==""):
    $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Empty Field</strong> Select status </div>';
    endif;
    else:
    $sql="UPDATE category SET cat_name='$category_name', status='$status' WHERE cat_id='$cid'";
    if (mysqli_query($con, $sql)):
    $msg[]='<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Well done! </strong> Category is updated successfully</div>';
    else:
    $msg[]='<div class="alert alert-error alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Sorry! </strong> Category is not updated</div>';
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
            <h3>Update Category</h3>
          </div>
          <?php $sql="SELECT * FROM category WHERE cat_id='$cid'";
          $result=mysqli_query($con, $sql);
          if ($result->num_rows) {
            while ($row=mysqli_fetch_assoc($result)) {?>
          
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=edit&id=<?php echo $cid; ?>" method="POST">
              <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" name="category_name" class="form-control input-lg" id="category_name" value="<?php echo $row['cat_name']; ?>" placeholder="Enter Category Name">
              </div>
              
              <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control input-lg">
                  <?php if ($row['status']==1) {
                    echo '<option value="1">Available</option>';
                    echo '<option value="0">Not Available</option>';
                  }else{
                    echo '<option value="0">Not Available</option>';
                    echo '<option value="1">Available</option>';
                    } ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Create Category</button>
            </form>
          </div>
          <?php  }
           } ?>
        </div>
      </div>
    </div>
    <?php }else{
    }
    }else{
    $sql="SELECT * FROM category";
    $result=mysqli_query($con, $sql);
    if ($result->num_rows) {
    $i=1; ?>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">All Categories:</h3>
      </div>
      <div class="box-body no-padding">
        <table id="example" class="display table table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php  while ($row=mysqli_fetch_assoc($result)) {?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['cat_name']; ?></td>
              <?php if ($row['status']==1) {?>
              <td><span class="label label-success">Available</span></td>
              <?php }else{?>
              <td><span class="label label-danger">Unavailable</span></td>
              <?php  } ?>
              <td class="text-center"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit&id=<?php echo $row['cat_id']; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
          <a href="category.php?action=delete&id=<?php echo $row['cat_id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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