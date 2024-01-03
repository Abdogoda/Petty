<?php
    include('config.php');
    session_start();
    if(isset($_SESSION['user_id']))$user_id = $_SESSION['user_id'];
    if(isset($_GET['add_one'])){
      if(!isset($user_id)){
          header('location:login.php');
      }else{
        $ID = $_GET['add_one'];
        $up = mysqli_query($con, "SELECT * FROM products WHERE id=$ID");
        $data = mysqli_fetch_array($up);
        $PRICE = $data['ProdPrice'];
        $prod_cart = mysqli_query($con, "SELECT * FROM mybag WHERE product_id='$ID'");
        if(mysqli_num_rows($prod_cart)>0){
          $data_cart = mysqli_fetch_assoc($prod_cart);
          $ID_PRODUCT_CART = $data_cart['id'];
          $COUNT = $data_cart['qty'] + 1;
          $TOTAL = $COUNT * $PRICE;
          mysqli_query($con,"UPDATE mybag SET qty='$COUNT', total='$TOTAL' WHERE id='$ID_PRODUCT_CART'") or die("ERROR IN UPDATE!");
        }else{
          $COUNT = 1;
          $TOTAL = $COUNT * $PRICE;
          mysqli_query($con, "INSERT INTO mybag (user_id, product_id, qty, total) VALUES ('$user_id', '$ID', '$COUNT', '$TOTAL')") or die("ERROR IN ADD TO CART");
        }
        $message = 'Product Added Successfully!';
        header('location: shop.php');
        }
    }
    if(isset($_GET['']))
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Petty | Shop</title>
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

  <section class="shop margpage" id="shop">
    <h1 class="heading"> our <span> products </span> </h1>
    <div class="box-container">
      <?php 
            include('config.php');
            $result = mysqli_query($con, "SELECT * FROM products");
            while($row = mysqli_fetch_array($result)){
                echo "
                    <div class='box'>
                        <div class='icons'>
                            <a href='shop.php?add_one=$row[id]'><i class='fas fa-shopping-cart'></i></a>
                            <a href='#' class='fav'><i class='fas fa-heart'></i></a>
                            <a href='#' class='view'><i class='fas fa-eye'></i></a>
                        </div>
                        <div class='image'>
                            <img src='$row[ProdImage]' alt='$row[id]'>
                        </div>
                        <div class='content'>
                            <h3>$row[ProdName]</h3>
                            <p> $row[ProdCategory] Food</p>
                            <div class='amount'> $$row[ProdPrice]</div>
                        </div>
                            <a href='shop.php?add_one=$row[id]' class='btn'>Add to cart</a><br>
                    </div>
                ";
            }
        ?>
    </div>
    <div class="overlay">
      <h1>
        <h1 class="close">Close</h1>
      </h1>
      <div class="image">
        <img src="" alt="">
      </div>
    </div>
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


  <script src="js/all.min.js"></script>
  <script>
  // favourit product
  document.querySelectorAll('.shop .box .fav').forEach(e => {
    e.onclick = function() {
      e.classList.toggle("active");
    }
  })
  // view product
  document.querySelectorAll(".shop .box .view").forEach(e => {
    e.addEventListener("click", () => {
      document.querySelector(".overlay").classList.add("active");
      document.querySelector(".overlay .image img").src = e.parentElement.parentElement.querySelector(
        ".image img").src;
    })
  })
  document.querySelector(".shop .overlay .close").onclick = function() {
    document.querySelector(".overlay").classList.remove("active");
  }
  </script>
</body>

</html>