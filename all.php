<!-- ##############################  Shop Page ####################### -->
<!-- Delete one -->
<?php 
  include('config.php');
  session_start();
  if(isset($_SESSION['user_id']))$user_id = $_SESSION['user_id'];
  if(isset($_GET['delete'])){
      $IDDelete = $_GET['iddelete'];
      mysqli_query($con, "DELETE FROM mybag WHERE id=$IDDelete AND user_id='$user_id'");
      header('location: cart.php');
  }
  if(isset($_POST['deleteAll'])){
    mysqli_query($con, "DELETE FROM mybag WHERE user_id='$user_id'");
    header("location: cart.php");
  }
?>

<!-- ##############################  Admin Dashboard  ####################### -->
<!-- Delete Product -->
<?php 
  include('config.php');
  if(isset($_GET['DeleteProductId'])){
    $ID = $_GET['DeleteProductId'];
  mysqli_query($con, "DELETE FROM products WHERE id=$ID");
  header('location: products.php');
  }
?>
<!-- Update Product -->
<?php 
  include('config.php');
  if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $CATEGORY = $_POST['category'];
    $PRICE = $_POST['price'];
    $COUNT = $_POST['count'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "image/prod/".$image_name;
    $update = "UPDATE products SET ProdName='$NAME', ProdCategory='$CATEGORY', ProdPrice='$PRICE',ProdCounts='$COUNT', ProdImage='$image_up' WHERE id='$ID'";
    mysqli_query($con, $update);
    if(move_uploaded_file($image_location, 'image/prod/'.$image_name)){
      echo "<script>alert('Product Updated Successfully')</script>";
    }else{
      echo "<script>alert('Something Went Wrong, Image Did not Upload')</script>";
    }
    header('location: products.php');
  }
?>