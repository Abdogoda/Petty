<?php 
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
// 
    include('config.php');
    if(isset($_POST['upload'])){
        $NAME = $_POST['name'];
        $CATEGORY = $_POST['category'];
        $PRICE = $_POST['price'];
        $COUNT = $_POST['count'];
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "image/prod/" .$image_name;
        $insert = "INSERT INTO products (prodName, prodCategory, prodPrice, prodCounts, prodImage) VALUES ('$NAME', '$CATEGORY', '$PRICE', '$COUNT', '$image_up')";
        mysqli_query($con, $insert);
        if(move_uploaded_file($image_location, 'image/prod/'.$image_name)){
            echo "<script>alert('Image Uploaded Successfully')</script>";
        }else{
            echo "<script>alert('Something Went Wrong, Image Did not Upload')</script>";
        }
        header('location: admin.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/admin.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminStyle.css">
  <title>Admin | Dashboard</title>
</head>

<body>
  <div class="nav">
    <div class="menu0toggle"></div>
    <ul>
      <li class="list active">
        <a href="admin.php"><i class="icon fas fa-home fs-2"></i>
          <h3 class="title">Home</h3>
        </a>
      </li>
      <li class="list">
        <a href="products.php"><i class="icon fas fa-server fs-2"></i>
          <h3 class="title">Products</h3>
        </a>
      </li>
      <li class="list">
        <a href="users.php"><i class="icon fas fa-users fs-2"></i>
          <h3 class="title">Users</h3>
        </a>
      </li>
      <li class="list">
        <a href="sales.php"><i class="icon fas fa-list-check fs-2"></i>
          <h3 class="title">Sales</h3>
        </a>
      </li>
      <li class="list">
        <a href="sittings.php"><i class="icon fas fa-cog fs-2"></i>
          <h3 class="title">Setting</h3>
        </a>
      </li>
      <li class="list">
        <a href="index.php"><i class="icon fa fa-pager fs-2"></i>
          <h3 class="title">Petty Site</h3>
        </a>
      </li>
      <li class="list">
        <form action="admin.php" method="GET">
          <button name='logout'><i class="icon fas fa-sign-out-alt fs-2"></i>
            <h3 class="title">Log Out</h3>
          </button>
        </form>
      </li>
    </ul>
  </div>
  <center>
    <div class="container">
      <h1 class="heade">Admin Dashboard</h1>
      <div class="boxEdit">
        <form action="admin.php" method="post" enctype="multipart/form-data">
          <h2>Insert Products</h2>
          <input type="text" name="name" placeholder="Product Name"><br>
          <select name="category">
            <option value="">Product Category</option>
            <option value="cats">cats</option>
            <option value="dogs">dogs</option>
            <option value="birds">birds</option>
            <option value="fish">fish</option>
          </select><br>
          <input type="text" name="price" placeholder="Product Price"><br>
          <input type="number" name="count" min="1" placeholder="Product Quantity"><br>
          <input type="file" name="image" id="file" style="display: none;">
          <label for="file" class="btn btn-success fs-2">Select Image</label>
          <button type="submit" name="upload" class="btn btn-danger fs-2">Upload Product</button><br>
          <a href="products.php" class="btn btn-info text-white viewalll fs-2">View All Products <i
              class="fa fa-arrow-right px-1"></i></a>
        </form>
      </div>
    </div>
  </center>
  <script src="js/all.min.js"></script>
  <script src="js/adminScript.js"></script>
</body>

</html>