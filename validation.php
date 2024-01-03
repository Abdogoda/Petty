<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
}
if(isset($_POST['ordernow'])){
  $all_from_cart = mysqli_query($con,"SELECT * FROM mybag WHERE user_id='$user_id'") or die("ERROR IN FETCHING CART!");
  if(mysqli_num_rows($all_from_cart)>0){
    while($row_from_cart = mysqli_fetch_assoc($all_from_cart)){
      $product_id = $row_from_cart['product_id'];
      $product_qty = $row_from_cart['qty'];
      $product_total = $row_from_cart['total'];
      mysqli_query($con,"INSERT INTO sales (user_id,product_id,qty,total) VALUES ('$user_id','$product_id','$product_qty','$product_total')") or die("ERROR IN ADDING TO SALES!");
    }
    mysqli_query($con,"DELETE FROM mybag WHERE user_id='$user_id'") or die("ERROR IN DELETING CART!");
    $message = '<h1>
    Well Done😍🤩 <br>
    Your Sale Operation Have Been Made Successfully, <br> Check Your Email For More Details!
    </h1>';
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
  <link rel="icon" href="image/pet_icon.png">
  <title>Petty | Validation</title>
  <style>
  @media print {

    .forms,
    .btn {
      visibility: hidden;
    }
  }
  </style>
</head>

<body>
  <center>
    <div class="container mt-5">
      <table class="table border table-striped table-bordered text-center" id="table">
        <thead class="thead-dark">
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
        </thead>
        <tbody>
          <?php 
                include('config.php');
                $result3 = mysqli_query($con, "SELECT * FROM mybag WHERE user_id='$user_id'");
                if(mysqli_num_rows($result3)>0){
                  $sum3 = mysqli_query($con, "SELECT SUM(total) FROM mybag");
                $col3 = mysqli_fetch_array($sum3);
                $total_price = $col3['SUM(total)'];
                while($row3 = mysqli_fetch_array($result3)){
                  $row3_product_id = $row3['product_id'];
                  $product_reslut = mysqli_query($con, "SELECT * FROM products WHERE id=$row3_product_id");
                  $product_row = mysqli_fetch_array($product_reslut);
                    echo "
                    <tr>
                      <td scope='row'><img src='$product_row[ProdImage]' alt='$product_row[ProdImage]' style='width:50px;'></td>
                      <td><h4>$product_row[ProdName]</h4></td>
                      <td><h4>$$product_row[ProdPrice]</h4></td>
                      <td><h4>$row3[qty]</h4></td>
                      <td><h4>$$row3[total]</h4></td>
                    </tr>
                ";
                };
                }else{
                  echo '<tr><td colspan="5"><h3>Nothing To See Here</h3></td></tr>';
                }
            ?>
        </tbody>
      </table>
      <table class="table border table-striped table-bordered text-center">
        <thead class="thead-dark">
          <th colspan="5">
            <h2>TOTAL PRICE: <?php echo "$$total_price"?></h2>
          </th>
        </thead>
      </table>
      <div class="forms d-flex justify-content-center gap-2">
        <form action='validation.php' method='POST' enctype='multipart/form-data'>
          <input type="submit" name="ordernow" class="ordernow btn btn-success" value="Order Now"
            onclick="return confirm('ARE YOU SURE YOU WANT TO ORDER NOW!?')">
        </form>
        <form action='all.php' method='POST' enctype='multipart/form-data'>
          <input type="submit" name="deleteAll" class="deleteAll btn btn-danger " value="Delete All"
            onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE ALL CART!?')">
        </form>
        <a href="#" onclick="return window.print()" class=" btn btn-primary text-white">Print</a>
      </div>
      <a class="btn btn-info mt-2 text-white" href="shop.php">Back To Shop...</a>
      <br><br><br>
      <?php
      if(isset($message)){
        echo $message;
      }
      ?>
    </div>
  </center>
  <script>
  // function print_section() {
  //   var printContents = document.getElementById("table").innerHTML;
  //   var originalContents = document.body.innerHTML;
  //   document.body.innerHTML = printContents;
  //   window.print();
  //   document.body.innerHTML = originalContents;
  // }
  </script>
</body>

</html>