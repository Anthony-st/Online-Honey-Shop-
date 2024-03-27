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

if (isset($_POST['order-btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '.$_POST['flate'].','.$_POST['street'].','.$_POST['city'].','.$_POST['state'].','.$_POST['country'].','.$_POST['pin']);
    $placed_on = date('d-m-y');
    $cart_total = 0;
    $cart_product[]='';
    $cart_query = mysqli_query($conn, "SELECT * FROM `CART` WHERE user_id = '$user_id'") or die ('query failed');

    if (mysqli_num_rows($cart_query)>0) {
        while ($cart_item=mysqli_fetch_assoc($cart_query)) {
            $cart_product[] = $cart_item['name'].' ('.$cart_item['quantity'].')';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total+=$sub_total;
        }
    }
    $total_products = implode(', ', $cart_product);
    mysqli_query($conn, "INSERT INTO `order` (`user_id`,`name`,`number`,`email`,`method`,`address`,`total_products`,`total_price`,`placed_on`)
    VALUES('$user_id','$name','$number','$email','$method','$address','$total_product','$cart_total','$placed_on')");

    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id'");
    $message[]='order placed succesfully';
    header('location:checkout.php');
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
    <h1>Order</h1>
    <p>Life is a test, so you  gotta do your best usijipate in a mess. 
    </p>
    <a href="index.php">Home</a><span> / Order</span>
</div>
</div>  

<div class="line"></div>
   
<div class="checkout-form">
   <h1 class="title">Payment Process</h1> 
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
    <div class="display-order">
    <div class="box-container">
        <?php
          $select_cart=mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die ('query failed');
          $total=0;
          $grand_total=0;
          if (mysqli_num_rows($select_cart)>0) {
            while ($fetch_cart=mysqli_fetch_assoc($select_cart)) {
                $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                $grand_total=$total+=$total_price;
            
        ?>
        
            <div class="box">
                <img src="image/<?php echo $fetch_cart['image']; ?>" alt="">
                <span> = "<?= $fetch_cart['name']; ?>"(<?= $fetch_cart['quantity']; ?>)</span>
            </div>
        
        <?php
          }
        } 
        ?>
        </div>
        <span class="grand-total"> Total Amount Payable : $ <?= $grand_total; ?></span>
    </div>
    <form method="post" class="cntent">
        <div class="input-field">
            <label for="">Your Name</label>
            <input type="text" name="name" placeholder="enter your name">
        </div>
        <div class="input-field">
            <label for="">Phone Number</label>
            <input type="number" name="number" placeholder="enter your phone number">
        </div>
        <div class="input-field">
            <label for="">Your email</label>
            <input type="email" name="email" placeholder="enter your email">
        </div>
        <div class="input-field">
            <label for="">Select payment method</label>
            <select name="method" id="">
                <option selected disabled>Select Payment Method</option>
                <option value="cash on delivery">cash on delivery</option>
                <option value="credit card">credit card</option>
                <option value="paypal">paypal</option>
                <option value="mpesa">mpesa</option>

            </select>
        </div>
        <div class="input-field">
            <label for="">address line 1</label>
            <input type="text" name="flate" placeholder="e.g flate no">
        </div>
        <div class="input-field">
            <label for="">address line 2</label>
            <input type="text" name="flate" placeholder="e.g street name">
        </div>
        <div class="input-field">
            <label for="">city</label>
            <input type="text" name="city" placeholder="e.g flate nairobi">
        </div>
        <div class="input-field">
            <label for="">state</label>
            <input type="text" name="state" placeholder="e.g nairobi city">
        </div>
        <div class="input-field">
            <label for="">country</label>
            <input type="text" name="country" placeholder="e.g Kenya">
        </div>
        <div class="input-field">
            <label for="">pin code</label>
            <input type="text" name="flate" placeholder="e.g 00100">
        </div>
        <input type="submit" name="order-btn" id="submit" value="order now">
    </form>
</div>

<?php include 'footer.php'; ?> 
<script type="text/javascript" src="script.js"></script>

</body>
</html>
