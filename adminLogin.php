<?php 
session_start();
if(isset($_POST['submit'])){
  $name = $_POST['adminName'];
  $pass = $_POST['password'];
  if($name == 'admin' && $pass == '111'){
    $_SESSION['adminname'] = 'admin';
    header('location: admin.php');
  }else{
    $error = "<div class='alert alert-danger' onclick=this.remove();>Wrong Username or Password</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminStyle.css">
  <title>Admin Login</title>
</head>
<body>
  <div class="adminForm">
    <center>
        <form action="adminLogin.php" method="POST">
          <h1>Admin Login</h1>
          <p>default username = <span>admin</span> & password = <span>111</span></p>
          <?php if(isset($error)){echo $error;}?>
          <input type="text" name="adminName" placeholder="AdminName" required class="box"><br>
          <input type="password" name="password" placeholder="Password" required class="box"><br>
          <input type="submit" name="submit" class="btn btn-primary box" value="Login Now"><br><br>
          <a href="index.php" class="btn btn-info fs-3 text-white">Back to Home</a>
        </form>
      </center>
    </div>
</body>
</html>