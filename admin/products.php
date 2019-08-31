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
        $file_name = date("Y-m-d-H-i-s").str_replace(' ', '-', $_FILES['image']['name']);
        $destination="image/".$file_name;
        $file=$_FILES['image']['tmp_name'];
        $brand=$_POST['brand'];
        $title=$_POST['product_name'];
        $quantity=$_POST['quantity'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $cat=$_POST['cat'];
        $status=$_POST['status'];
        if ($brand==""||$cat=="" || $status==""):
        if ($brand==""):
        $msg[]='<div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Empty Field</strong> Brand name field is required </div>';
        endif;
        if ($cat==""):
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
        if (move_uploaded_file($file, $destination)) {
          $sql="INSERT INTO products(products_id,products_cat,products_brand,products_title,products_price,products_quantity,products_desc,products_image,products_status) VALUES(NULL,'$cat','$brand','$title','$price','$quantity','$description','$destination','$status')";
        if (mysqli_query($con, $sql)):
        $msg[]='<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Well done</strong> Product is successfully inserted </div>';
        else:
        $msg[]='<div class="alert alert-error alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sorry!</strong> Product is not inserted </div>';
        endif;
        }
      endif;
    endif;
    ?>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php foreach ($msg as $key => $value) {
        echo $value;
        } ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=create" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Enter description">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
              <option value="">Select Product Status</option>
              <option value="1">Available</option>
              <option value="0">Not Available</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Create Product</button>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="cat">Category</label>
              <?php $sql="SELECT * FROM category";
              $result=mysqli_query($con, $sql);
              if ($result->num_rows) {
                echo "<select name='cat' id='cat' class='form-control'>";
                echo "<option value=''>Select a category</option>";
                while ($row=mysqli_fetch_assoc($result)) {
                  echo '<option value="'.$row['cat_name'].'">'.$row['cat_name'].'</option>';
                }
                echo "</select>";
               } ?>
               </div>

               <div class="form-group">
            <label for="brand">Brand</label>
              <?php $sql="SELECT * FROM brand";
              $result=mysqli_query($con, $sql);
              if ($result->num_rows) {
                echo "<select name='brand' id='brand' class='form-control'>";
                echo "<option value=''>Select a brand</option>";
                while ($row=mysqli_fetch_assoc($result)) {
                  echo '<option value="'.$row['brand_name'].'">'.$row['brand_name'].'</option>';
                }
                echo "</select>";
               } ?>
               </div>

            </div>
          </div>
        </form>
      </div>
    </div>
    <?php }
    elseif ($_GET['action']=='delete') {
      $id=$_GET['id'];

      $sql="DELETE FROM products WHERE products_id='$id'";
      if (mysqli_query($con,$sql)) {
        echo '<h3>Product is deleted successfully. Go back to <span><a href="'.$_SERVER['PHP_SELF'].'">Product page</a></span></h3>';
      }else{
        echo '<h3><strong>Sorry! </strong>Product is not deleted. Go back to <span><a href="'.$_SERVER['PHP_SELF'].'">Product page</a></span></h3>';
      }
    }
    elseif ($_GET['action']=='update') { 
      $id=$_GET['id'];
      $msg=array();
        if ($_POST){
        $title=$_POST['product_name'];
        $quantity=$_POST['quantity'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $status=$_POST['status'];
        //$sql="UPDATE products SET products_title='$title', products_price='$price', products_quantity='$quantity', products_desc='$description', products_status='$status' WHERE products_id='$id'";
        $sql="UPDATE products SET products_title = '$title', products_price = '$price', products_quantity = '$quantity', products_desc = '$description', products_status = '$status' WHERE products_id = '$id'";
        if ($con->query($sql)) {
          $msg[]='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Well done</strong> Product is successfully updated </div>';
        }else{
          $msg[]='<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Update error</strong> Product is not updated </div>';
        }
      }
      if ($result=mysqli_query($con,"SELECT * FROM products WHERE products_id='$id'")) {
        while ($row=mysqli_fetch_assoc($result)) { ?>
        <div class="row">
      <div class="col-md-10 col-md-offset-1">
       <?php foreach ($msg as $key => $value) {
         echo $value;
       } ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=update&id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" value="<?php echo $row['products_title']; ?>">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" value="<?php echo $row['products_price']; ?>">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" value="<?php echo $row['products_quantity']; ?>">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description"><?php echo $row['products_desc']; ?></textarea>
          </div>
          <fieldset disabled>
            <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Enter description">
          </div>
          </fieldset>
          <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
              <?php if ($row['products_status']==1) { ?>
              <option value="1">Available</option>
              <option value="0">Not Available</option>
            <?php  }else{ ?>
              <option value="0">Not Available</option>
              <option value="1">Available</option>
            <?php  } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Update Product</button>
            </div>
            <div class="col-md-4">
           <fieldset disabled>
              <div class="form-group">
            <label for="cat">Category</label>
            <select name='cat-disable' id='cat' class='form-control'>
              <option value="<?php echo $row['products_cat']; ?>">
                <?php echo $row['products_cat']; ?>
              </option>
               </select>
               </div>
           </fieldset>
           <input type="hidden" name="cat" value="<?php echo $row['products_cat']; ?>">
               <fieldset disabled>
                 <div class="form-group">
            <label for="brand">Brand</label>
              <select name='brand-disable' id='brand' class='form-control'>
              <option value='<?php echo $row["products_brand"]; ?>'><?php echo $row["products_brand"]; ?></option>
               </select>
               </div>
               </fieldset>
                <input type="hidden" name="brand" value="<?php echo $row['products_brand']; ?>">
            </div>
          </div>
        </form>
      </div>
    </div>
<?php  }
      }
      ?>
      
   <?php }
    else{
    }
    }else{
    $sql="SELECT * FROM brand";
    $result=mysqli_query($con, $sql);
    if ($result->num_rows) { ?>
    <table id="example" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php $sql="SELECT * FROM products";
          $result=mysqli_query($con, $sql);
          if ($result->num_rows) {
            while ($row=mysqli_fetch_assoc($result)) {?>
            <tr>
              <td><?php echo $row['products_title']; ?></td>
              <td><?php echo $row['products_cat']; ?></td>
              <td><?php echo $row['products_brand']; ?></td>
              <td><?php echo $row['products_price']; ?></td>
              <td><?php echo $row['products_quantity']; ?></td>
              <td><img src="<?php echo $row['products_image']; ?>" alt="" width="30px" height="36px"></td>
              <td class="text-center"><a href="../product.php?id=<?php echo $row['products_id']; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></a>  <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=update&id=<?php echo $row['products_id']; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>  <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=delete&id=<?php echo $row['products_id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
            </tr>
    <?php    }
           } ?>
        </tbody>
        </table>
    <?php }
    } ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require 'inc/footer.php'; ?>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
