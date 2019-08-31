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
     <table id="example" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Shipping Location</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php $sql="SELECT * FROM orders NATURAL JOIN products NATURAL JOIN customer";
          $result=mysqli_query($con, $sql);
          if ($result->num_rows) {
            $i=1;
            while ($row=mysqli_fetch_assoc($result)) {?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['shipping_location']; ?></td>
              <td><?php echo $row['products_title']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php if ($row['order_status']==0) {
                echo "Not approved";
              }elseif ($row['order_status']==1) {
                echo "Approved";
              }elseif ($row['order_status']==2) {
                echo "Completed";
              } ?></td>
              <td class="text-center">

              <a href="orders.php?action=delete&id=<?php echo $row['order_id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>

              <a href="form.php?id=<?php echo $row['order_id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-check"></span></button></a></td>
            </tr>
    <?php    }

           } ?>
           <?php if (isset($_GET['action'])) {
           
          if ($_GET['action']=='delete') {
              $id=$_GET['id'];
              $sql="DELETE FROM orders WHERE order_id='$id'";
              }

           }?>
        </tbody>
        </table>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require 'inc/footer.php'; ?>