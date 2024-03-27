<?php
include 'connection.php';
session_start();
$admin_id = $_SESSION['user_name'];
// After successful login
$user_id = $_SESSION['user_id'];  // Set the user_id retrieved from the database

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
} 

  
  //updating quantity
  if (isset($_POST['update_qty_btn'])) {
    $update_qty_id = $_POST['update_qty_id'];
    $update_value = $_POST['update_qty'];
 
    $update_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id='$update_qty_id'") or die ('query failed');
    if ($update_query) {
        header('location:cart.php');
    }
  }
  

   //deleting products from wishlist
   if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die ('query failed');

    header('location:cart.php');
}

  //deleting products from wishlist
  if(isset($_GET['delete_all'])) {

    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die ('query failed');

    header('location:cart.php');
}


  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>

    <!----------- font awesome icon link ------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="main.css">

    <title>view page</title>
</head>
<body>
<?php include 'header.php'; ?> 

<div class="banner">
<div class="detail">
    <h1>My Cart</h1>
    <p>Life is a test, so you  gotta do your best usijipate in a mess. 
    </p>
    <a href="index.php">Home</a><span>/ wishlist</span>
</div>
</div>  

<div class="line"></div>

    <!----------- About Us ------------->
    
    <section class="shop">
        <h1 class="title">Products Added in Cart</h1>

    <?php
         if(isset($message))  {
        foreach ($message as $message) {
           echo '
        <div class="message">
             <span>'.$message.'</span>
             <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
        </div>
             ';
          }
       }
    ?>

<div class="box-container" id="">
      <?php
        $grand_total = 0; 
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`" ) or die ('query failed');
        if (mysqli_num_rows($select_cart)>0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
      ?>
        <div class="box">

        <div class="icon">
            <a href="view_page.php?pid=<?php echo $fetch_cart['id']; ?>" class="fas fa-eye"></a>
            <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" 
            onclick="return confirm('do you to delete these product from your cart')"></a>
            <button type="submit" name="add_to_cart" class="fas fa-cart-plus"></button>
        </div>

            <img src="image/<?php echo $fetch_cart['image']; ?>">
            <div class="price"> $<?php echo $fetch_cart['price']; ?> </div>
            <div class="name"> <?php echo $fetch_cart['name']; ?> </div>
            
            <form method="post">
                <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['id']; ?>">
                <div class="qty">
                    <input type="number" min="1" name="update_qty" value="<?php echo $fetch_cart['quantity']; ?>">
                    <input type="submit" name="update_qty_btn" value="update">
                </div>
            </form>

            <div class="total-amt">
               Total Amount : <span><?php echo $total_amt = ($fetch_cart['price']*$fetch_cart['quantity']); ?></span>
            </div>
       
            </div>

    <?php  
    $grand_total+=$total_amt;
    
      }
    } else {
         echo '<p class="empty">No Products Added yet!</p>';
    }
    ?>
</div>
<div class="dlt">
<a href="cart.php?delete_all" class="btn2" onclick="return 
    confirm('do you want to delete all items in your wishlist')">Delete All</a>
</div>

<div class="wishlist_total">
    <p>Total amount payable : <span>$<?php echo $grand_total; ?>/-</span></p>
    <a href="shop.php" class="btn">Continue shopping</a>
    <a href="checkout.php" class="btn <?php echo ($grand_total>1)?'':'disabled'?>" onclick="return 
    confirm('do you want to delete all items in your wishlist')">Proceed to Checkout</a>
     
</div>
</section> 

<?php include 'footer.php'; ?> 
<script type="text/javascript" src="script.js"></script>

</body>
</html>
