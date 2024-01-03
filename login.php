<?php
@include 'config.php';
if(isset($_POST['signIn'])){
  session_start();
  $user_email = $_POST['lemail'];
  $user_password = $_POST['lpassword'];
  $select = mysqli_query($con,"SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'") or die("ERROR IN FETCHING USER DATA!");
  if(mysqli_num_rows($select)>0){
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id']= $row['id'];
    header('location:index.php');
  }else{
     header('location:login.php?message=Wrong Email Or Password!');
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
      <form action="" class="login-form login" method="post">
        <h3>Sign In</h3>
        <div class="box">
          <label for="lemail">Your Email</label>
          <input type="email" name="lemail" id="lemail" class="box-input">
        </div>
        <div class="box">
          <label for="lpassword">Your Password</label>
          <input type="password" name="lpassword" id="lpassword" class="box-input">
        </div>
        <div class="remember">
          <input type="checkbox" name="" id="remember-me">
          <label for="remember-me">remember me</label>
        </div>
        <input type="submit" name="signIn" value="sign in" class="btn">
        <div class="links">
          <a href="#">forget password</a>
          <a class="register-btn" href="register.php">sign up</a>
        </div>
      </form>
    </div>
  </center>
  <script src="js/all.min.js"></script>
</body>

</html>