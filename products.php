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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Products</title>
  <link rel="icon" href="image/admin.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminStyle.css">

</head>

<body>

  <?php @include 'adminNav.php';?>

  <center>
    <section class="shop margpage" id="shop">
      <h1 class="heade"> All products </h1>
      <div class="box-container">
        <?php
            include('config.php');
            $result = mysqli_query($con, "SELECT * FROM products");
            while($row = mysqli_fetch_array($result)){
                echo "
                        <div class='box shadow'>
                            <div class='image'><img src='$row[ProdImage]' alt='$row[id]'></div>
                            <div class='content'>
                                <h3>$row[ProdName]</h3>
                                <h5>$row[ProdCategory] food</h5>
                                <div class='amount'>$$row[ProdPrice]</div>
                                <div class='amount'>$row[ProdCounts] Products</div>
                            </div>
                            <a href='edit.php? id=$row[id]' class='btn fs-4 btn-success'>Edit <i class='fa fa-tools mx-1'></i></a>
                            <a href='all.php? DeleteProductId=$row[id]' class='btn fs-4 btn-danger'>Delete <i class='fa fa-trash mx-1'></i></a>
                        </div>
                ";
            }
    ?>
      </div>
    </section>
  </center>




  <!-- custom js file link  -->
  <script src="js/adminScript.js"></script>
  <script src="js/all.min.js"></script>

</body>

</html>