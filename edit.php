<?php 
session_start();
$adminname = $_SESSION['adminname'];
if(!isset($adminname)){
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
  <title>Admin | Users</title>
</head>

<body>

  <?php @include 'adminNav.php';?>
  <!-- Edit Product -->
  <?php 
  include('config.php');
  $ID = $_GET['id'];
  $up = mysqli_query($con, "SELECT * FROM products WHERE id='$ID'");
  $data = mysqli_fetch_array($up);
?>
  <center>
    <div class="container">
      <h1 class="heade">Edit Product</h1>
      <div class="boxEdit">
        <div class="main">
          <form action="all.php" method="post" enctype="multipart/form-data">
            <img src="<?php echo $data['ProdImage']?>" alt="prod" style="width:100px;"><br>
            <input type="text" name="name" value="<?php echo $data['ProdName']?>" placeholder="Product Name"><br>
            <input type="text" name="category" value="<?php echo $data['ProdCategory']?>"
              placeholder="Product Category"><br>
            <input type="number" name="price" value="<?php echo $data['ProdPrice']?>" placeholder="Product Price"><br>
            <input type="number" name="count" value="<?php echo $data['ProdCounts']?>" placeholder="Product Count"><br>
            <input type="text" name="id" style="display: none;" value="<?php echo $data['id']?>">
            <input type="file" name="image" id="file" style="display: none;">
            <label for="file" class="btn btn-secondary fs-3">Update Image</label>
            <button type="submit" name="update" class="btn btn-success fs-3">Update Product</button><br>
            <a href="products.php" class="btn btn-info text-white viewalll fs-3">View All Products <i
                class="fa fa-arrow-right px-1"></i></a>
          </form>
        </div>
      </div>
    </div>
  </center>
  <script src="js/all.min.js"></script>
  <script src="js/adminScript.js"></script>
</body>

</html>