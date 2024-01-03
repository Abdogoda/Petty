<?php 
@include 'config.php';
session_start();
$adminname = $_SESSION['adminname'];
if(!isset($adminname)){
    header('location:adminLogin.php');
}
// Admin Logout
if(isset($_GET['logout'])){
    unset($adminname);
    session_destroy();
    header('location:adminLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" href="image/admin.png">
  <link rel="stylesheet" href="css/adminStyle.css">
  <title>Admin | Sales</title>
  <style>
  @media print {

    .nav,
    .btn {
      visibility: hidden;
    }
  }

  .boxEdit {
    border: none !important;
  }
  </style>
</head>

<body>

  <?php @include 'adminNav.php';?>
  <center>
    <div class="container mb-5 pb-5">
      <h1 class="heade">All Sales</h1>
      <div class="boxEdit usersEdit pb-5">
        <table class="table table-striped table-light table-border">
          <thead>
            <tr>
              <th scope="col">SaleID</th>
              <th scope="col">UserID</th>
              <th scope="col">UserName</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
              <th scope="col">Product Quantity</th>
              <th scope="col">Product Total</th>
              <th scope="col">Sale Time</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $select_sale = mysqli_query($con,"SELECT * FROM sales")or die("ERROR IN FETCHING SALES DATA!");
              if(mysqli_num_rows($select_sale)>0){
                while($row_sales = mysqli_fetch_assoc($select_sale)){
                  $user_id = $row_sales['user_id'];
                  $select_user = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'")or die("ERROR IN FETCHING USERS DATA!");
                  $row_user = mysqli_fetch_assoc($select_user);
                  $product_id = $row_sales['product_id'];
                  $select_product = mysqli_query($con,"SELECT * FROM products WHERE id='$product_id'")or die("ERROR IN FETCHING PRODUCTS DATA!");
                  $row_product = mysqli_fetch_assoc($select_product);
                  ?>
            <tr>
              <th scope="row"><?php echo $row_sales['id'];?></th>
              <th><?php echo $user_id;?></th>
              <td><?php echo $row_user['name'];?></td>
              <td><?php echo $row_product['ProdName'];?></td>
              <td><?php echo $row_product['ProdPrice'];?></td>
              <td><?php echo $row_sales['qty'];?></td>
              <td><?php echo $row_sales['total'];?></td>
              <td><?php echo $row_sales['time'];?></td>
            </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
      <a href="#" class="btn btn-success my-5 fs-1" onclick="return window.print()">Print</a>
    </div>
  </center>
  <script src="js/all.min.js"></script>
  <script src="js/adminScript.js"></script>
</body>

</html>