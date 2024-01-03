<?php
@include 'config.php';
if(isset($_POST['signUp'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  if($password == $cpassword){
    $select = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die("ERROR IN FETCHING USER DATA!");
    if(mysqli_num_rows($select)>0){
      header('location:login.php?message=User Is Already Found!');
    }else{
       mysqli_query($con,"INSERT INTO users (name, email,phone,address,password) VALUES ('$name','$email','$phone','$address','$password')") or die("ERROR IN ADDING USER DATA!");
       header('location:login.php?message=You Have Created Your Account Successfully!');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/pet_icon.png" style="border-radius: 50%" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Login Form</title>
</head>

<body>
  <header class="header">
    <a href="index.php" class="logo"> <i class="fas fa-paw"></i> Petty </a>
    <div class="icons">
      <a href="index.php" class="home-btn"><i class="fas fa-home"></i></a>
      <a id="admin-btn" href="adminLogin.php"><i class="fas fa-user-gear"></i></a>
    </div>
  </header>
  <center>
    <div class="container">
      <form action="" class="login-form register" method="post">
        <h3>Sign Up</h3>
        <div class="box">
          <label for="name">Your Name</label>
          <input type="text" name="name" id="name" class="box-input">
        </div>
        <div class="box">
          <label for="name">Your Phone</label>
          <input type="tel" name="phone" id="phone" class="box-input">
        </div>
        <div class="box">
          <label for="address">Your Address</label>
          <input type="text" name="address" id="address" class="box-input">
        </div>
        <div class="box">
          <label for="email">Your Email</label>
          <input type="email" name="email" id="email" class="box-input">
        </div>
        <div class="box">
          <label for="password">Your Password</label>
          <input type="password" name="password" id="password" class="box-input">
        </div>
        <div class="box">
          <label for="cpassword">Confirm Password</label>
          <input type="password" name="cpassword" id="cpassword" class="box-input">
        </div>
        <input type="submit" name="signUp" value="sign up" class="btn">
        <div class="links">
          <a class="login-btn" href="login.php">sign In</a>
        </div>
      </form>
    </div>
  </center>
  <script src="js/all.min.js"></script>
</body>

</html>