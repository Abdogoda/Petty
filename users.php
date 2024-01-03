<?php 
@include 'config.php';
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
  <link rel="icon" href="image/admin.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminStyle.css">
  <title>Admin | Users</title>
  <style>
  @media print {

    .nav,
    .btn {
      visibility: hidden;
    }
  }

  .boxEdit {
    border: none !important;
  }
  </style>
</head>

<body>
  <?php @include 'adminNav.php';?>
  <center>
    <div class="container">
      <h1 class="heade">All Users</h1>
      <div class="boxEdit usersEdit">
        <table class="table table-striped table-light table-border">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $select_users = mysqli_query($con,"SELECT * FROM users")or die("ERROR IN FETCHING USERS DATA!");
              if(mysqli_num_rows($select_users)>0){
                while($row = mysqli_fetch_assoc($select_users)){
                  ?>
            <tr>
              <th scope="row"><?php echo $row['id'];?></th>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['phone'];?></td>
              <td><?php echo $row['address'];?></td>
            </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
      <a href="#" class="btn btn-success my-5 fs-1" onclick="return window.print()">Print</a>
    </div>
  </center>
  <script src="js/all.min.js"></script>
  <script src="js/adminScript.js"></script>
</body>

</html>