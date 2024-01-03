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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" href="image/admin.png">
  <link rel="stylesheet" href="css/adminStyle.css">
  <title>Admin | Sittings</title>
</head>

<body>

  <?php @include 'adminNav.php';?>
  <center>
    <div class="container">
      <h1 class="heade">Sittings</h1>
      <div class="boxEdit">
        <h1>There Is No Sittings</h1>
        <h2>Wait For Updates!</h2>
      </div>
    </div>
  </center>
  <script src="js/all.min.js"></script>
  <script src="js/adminScript.js"></script>
</body>

</html>