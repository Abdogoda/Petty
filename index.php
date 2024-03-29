<?php
@include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Petty</title>
  <link rel="icon" href="image/pet_icon.png" style="border-radius: 50%" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!-- header section starts  -->

  <header class="header">
    <a href="index.php" class="logo"> <i class="fas fa-paw"></i> Petty </a>

    <nav class="navbar">
      <a href="#home">home</a>
      <a href="#about">about</a>
      <a href="shop.php">shop</a>
      <a href="#services">services</a>
      <a href="#plan">plan</a>
      <a href="#contact">contact</a>
    </nav>

    <div class="icons">
      <a id="menu-btn"><i class="fas fa-bars"></i></a>
      <a href="cart.php" id="bag-btn" class=" bag-btn"><?php 
      if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $al = mysqli_query($con, "SELECT * FROM mybag WHERE user_id=$user_id");
        $R = 0;
        while($all = mysqli_fetch_array($al)){
          $R += $all['qty'];
        };
      echo " <span>$R</span>";
      }
      ?><i class="fas fa-shopping-cart"></i></a>
      <a href="login.php" class="login-btn"><i class="fas fa-user"></i></a>
      <a id="admin-btn" href="adminLogin.php"><i class="fas fa-user-gear"></i></a>
    </div>
  </header>

  <!-- header section ends -->

  <!-- home section starts  -->

  <section class="home" id="home">
    <div class="content">
      <h3><span>hi</span> welcome to our pet shop</h3>
      <a href="shop.php" class="btn">shop now</a>
    </div>

    <img src="image/bottom_wave.png" class="wave" alt="" />
  </section>

  <!-- home section ends -->

  <!-- about section starts  -->

  <section class="about" id="about">
    <div class="image">
      <img src="image/about_img.png" alt="" />
    </div>

    <div class="content">
      <h3>premium <span>pet food</span> manufacturer</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum sint,
        dolore perspiciatis iure consequuntur eligendi quaerat vitae shaikh anas.
      </p>
      <a href="#" class="btn">read more</a>
    </div>
  </section>

  <!-- about section ends -->

  <!-- dog and cat food banner section starts -->

  <div class="dog-food">
    <div class="image">
      <img src="image/dog_food.png" alt="" />
    </div>

    <div class="content">
      <h3><span>air dried</span> dog food</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat iure illo,
        repudiandae rem porro sunt.
      </p>
      <div class="amount">$15.00 - $30.00</div>
      <a href="shop.php"> <img src="image/shop_now_dog.png" alt="" /> </a>
    </div>
  </div>

  <div class="cat-food">
    <div class="content">
      <h3><span>air dried</span> cat food</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat iure illo,
        repudiandae rem porro sunt.
      </p>
      <div class="amount">$15.00 - $30.00</div>
      <a href="shop.php"> <img src="image/shop_now_cat.png" alt="" /> </a>
    </div>

    <div class="image">
      <img src="image/cat_food.png" alt="" />
    </div>
  </div>

  <!-- dog and cat food banner section ends -->

  <!-- services section starts  -->

  <section class="services" id="services">
    <h1 class="heading">our <span>services</span></h1>

    <div class="box-container">
      <div class="box">
        <i class="fas fa-dog"></i>
        <h3>dog boarding</h3>
        <a href="#" class="btn">read more</a>
      </div>

      <div class="box">
        <i class="fas fa-cat"></i>
        <h3>cat boarding</h3>
        <a href="#" class="btn">read more</a>
      </div>

      <div class="box">
        <i class="fas fa-bath"></i>
        <h3>spa & grooming</h3>
        <a href="#" class="btn">read more</a>
      </div>

      <div class="box">
        <i class="fas fa-drumstick-bite"></i>
        <h3>healthy meal</h3>
        <a href="#" class="btn">read more</a>
      </div>

      <div class="box">
        <i class="fas fa-baseball-ball"></i>
        <h3>activity exercise</h3>
        <a href="#" class="btn">read more</a>
      </div>

      <div class="box">
        <i class="fas fa-heartbeat"></i>
        <h3>health care</h3>
        <a href="#" class="btn">read more</a>
      </div>
    </div>
  </section>

  <!-- services section ends -->

  <!-- plan section starts  -->

  <section class="plan" id="plan">
    <h1 class="heading">choose a <span>plan</span></h1>

    <div class="box-container">
      <div class="box">
        <h3 class="title">pet care</h3>
        <h3 class="day">1 day</h3>
        <div class="list">
          <p>pet room <span class="fas fa-check"></span></p>
          <p>pet grooming <span class="fas fa-check"></span></p>
          <p>pet exercise <span class="fas fa-check"></span></p>
          <p>pet meals <span class="fas fa-check"></span></p>
        </div>
        <div class="amount"><span>$</span>50</div>
        <a href="#" class="btn"> choose plan </a>
      </div>

      <div class="box">
        <h3 class="title">pet care</h3>
        <h3 class="day">10 days</h3>
        <div class="list">
          <p>pet room <span class="fas fa-check"></span></p>
          <p>pet grooming <span class="fas fa-check"></span></p>
          <p>pet exercise <span class="fas fa-check"></span></p>
          <p>pet meals <span class="fas fa-check"></span></p>
        </div>
        <div class="amount"><span>$</span>350</div>
        <a href="#" class="btn"> choose plan </a>
      </div>

      <div class="box">
        <h3 class="title">pet care</h3>
        <h3 class="day">30 days</h3>
        <div class="list">
          <p>pet room <span class="fas fa-check"></span></p>
          <p>pet grooming <span class="fas fa-check"></span></p>
          <p>pet exercise <span class="fas fa-check"></span></p>
          <p>pet meals <span class="fas fa-check"></span></p>
        </div>
        <div class="amount"><span>$</span>650</div>
        <a href="#" class="btn"> choose plan </a>
      </div>
    </div>
  </section>

  <!-- plan section ends -->

  <section class="contact" id="contact">
    <div class="image">
      <img src="image/contact_img.png" alt="" />
    </div>

    <form action="">
      <h3>contact us</h3>
      <input type="text" placeholder="your name" class="box" />
      <input type="email" placeholder="your email" class="box" />
      <input type="tumber" placeholder="your number" class="box" />
      <textarea name="" placeholder="your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" class="btn" />
    </form>
  </section>

  <section class="footer">
    <img src="image/top_wave.png" alt="" />

    <div class="share">
      <a href="#" class="btn"> <i class="fab fa-facebook-f"></i> facebook </a>
      <a href="#" class="btn"> <i class="fab fa-twitter"></i> twitter </a>
      <a href="#" class="btn"> <i class="fab fa-instagram"></i> instagram </a>
      <a href="#" class="btn"> <i class="fab fa-linkedin"></i> linkedin </a>
      <a href="#" class="btn"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="credit">
      created by <span> Adbulrhman Goda </span> | all rights reserved!
    </div>
  </section>

  <!-- custom js file link  -->
  <script src="js/all.min.js"></script>
  <script>
  let navbar = document.querySelector(".header .navbar");
  document.querySelector("#menu-btn").onclick = () => {
    navbar.classList.toggle("active");
  };
  window.onscroll = () => {
    navbar.classList.remove("active");
  };
  </script>
</body>

</html>