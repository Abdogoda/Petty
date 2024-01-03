<?php 
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}
if(isset($_POST['update'])){
  $update_qty = $_POST['qty'];
  $update_id = $_POST['idupdate'];
  $select_product_cart = mysqli_query($con,"SELECT * FROM mybag WHERE id='$update_id'");
  $row_product_cart = mysqli_fetch_assoc($select_product_cart);
  $product_products_id = $row_product_cart['product_id'];
  $select_product_products = mysqli_query($con,"SELECT * FROM products WHERE id='$product_products_id'");
  $row_product_products = mysqli_fetch_assoc($select_product_products);
  $update_total = $update_qty * $row_product_products['ProdPrice'];
  mysqli_query($con,"UPDATE mybag SET qty = '$update_qty', total='$update_total' WHERE id='$update_id'") or die("ERROR IN UPDATE QUANTITY?");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Petty | Cart</title>
  <link rel="icon" href="image/pet_icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- header section starts  -->
  <header class="header">
    <a href="index.php" class="logo"> <i class="fas fa-paw"></i> Petty </a>
    <div class="icons">
      <a href=""></a>
      <a href="index.php" class="home-btn"><i class="fas fa-home"></i></a>
      <a href="login.php" class="login-btn"><i class="fas fa-user"></i></a>
      <a href="cart.php" id="bag-btn" class=" bag-btn"><?php 
            if(isset($_SESSION['user_id'])){
              $al = mysqli_query($con, "SELECT * FROM mybag WHERE user_id=$user_id");
              $R = 0;
              while($all = mysqli_fetch_array($al)){
                $R += $all['qty'];
              };
            echo " <span>$R</span>";
            }
            ?><i class="fas fa-shopping-cart"></i></a>
      <a id="admin-btn" href="adminLogin.php"><i class="fas fa-user-gear"></i></a>
    </div>
  </header>
  <section class="cart margpage">
    <h1 class="heading"> our <span> products </span> </h1>
    <div class="box-container">
      <?php 
        include('config.php');
        $result3 = mysqli_query($con, "SELECT * FROM mybag WHERE user_id=$user_id");
        if(mysqli_num_rows($result3)>0){
          $sum3 = mysqli_query($con, "SELECT SUM(total) FROM mybag");
          $col3 = mysqli_fetch_array($sum3);
          while($row3 = mysqli_fetch_array($result3)){
            $row3_product_id = $row3['product_id'];
            $product_reslut = mysqli_query($con, "SELECT * FROM products WHERE id=$row3_product_id");
            $product_row = mysqli_fetch_array($product_reslut);
            echo "
              <div class='box'>
                <div class='box-info'>
                  <img src='$product_row[ProdImage]' alt='$product_row[ProdImage]'>
                  <div class='content'>
                    <h1>$product_row[ProdName]</h1>
                    <h2>$$product_row[ProdPrice]</h2>
                    <form method='POST' class='update-box'>
                      <input type='text' name='idupdate' value='$row3[id]' style='display:none;'>
                      <input type='number' name='qty' value='$row3[qty]' min='1' class='update-input'> 
                      <input type='submit' name='update' value='Update' class='update-btn'>
                    </form>
                    <h1>Total: $$row3[total]</h1>
                  </div>
                </div>
                <div class='content'>
                  <form action='all.php' method='GET'>
                    <input type='text' name='iddelete' value='$row3[id]' style='display:none;'>
                    <input type='submit' name='delete' value='Delete' class='delete' onclick='return confirm('ARE YOU SURE YOU WANT TO DELETE ALL CART!?')'>
                  </form>
                </div>
              </div>
            ";
                };
                ?>
    </div>
    <form action='all.php' method='POST' enctype='multipart/form-data'>
      <input type="submit" name="deleteAll" class="deleteAll btn" value="Delete All"
        onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE ALL CART!?')">
      <a class="order btn" href="validation.php">Order Now</a>
    </form>
    <?php
                }else{
                  echo "
                  <h1 style='width:100%;font-size:3rem;text-align:center'>No Products In Cart!</h1>
                  <a href='shop.php' class='btn' style='margin:auto'>Back To Shop</a>
                  ";
                }
            ?>
  </section>

  <section class="footer">
    <img src="image/top_wave.png" alt="">
    <div class="share">
      <a href="#" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
      <a href="#" class="btn"> <i class="fab fa-twitter"></i> twitter </a>
      <a href="#" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
      <a href="#" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
      <a href="#" class="btn"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>
    <div class="credit"> created by <span> Adbulrhman Goda </span> | all rights reserved! </div>
  </section>

</body>

</html>