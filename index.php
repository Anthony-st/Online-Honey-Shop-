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

   //adding products to wishlist
if (isset($_POST['add_to_wishlist'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];

  $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name ='$product_name' AND user_id ='$user_id'")
  or die ('query failed');

  if (mysqli_num_rows($wishlist_number)>0) {
    $message[]='product already added on wishlist';
  }else {
    mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id','$product_id',
    '$product_name','$product_price','$product_image')");

     $message[]='product succesfully added on wishlist';
  }
}

//adding products to cart
if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name ='$product_name' AND user_id ='$user_id'")
  or die ('query failed');

   if (mysqli_num_rows($cart_num)>0) {
    $message[]='product already added in cart';
  }else {
    mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id',
    '$product_name','$product_price','$product_quantity','$product_image')");

     $message[]='product succesfully added in your cart';

  }

}


?>

<style type="text/css"> 
<?php 
include 'main.css';
?>
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>

    <title>Shop Homepage</title>
</head>
<body>
<?php include 'header.php'; ?> 

<!----------Home slider----------->
<div class="container-fluid">
<div class="controlz"><i class="fas fa-angle-left prev"></i></div>
<div class="hero-slider">
    <div class="slider-item">
       <img src="img/slider.png">
       <div class="slider-caption">
        <span>Test The Quality</span>
        <h1>Organic Premium <br>Honey</h1>
        &nbsp;&nbsp;&nbsp;<p>Enjoy sweet, aromating honey made by hardworking people of <br> ecologically
    clean raw materials in the most pure environment!</p>
    <a href="shop.php" class="btn1">Shop Now</a>
       </div>
    </div>

    <div class="slider-item">
       <img src="img/slider2.png">
       <div class="slider-caption">
        <span>Enjoy Natural Honey</span>
        <h1>Natural Sweet <br>Honey</h1>
        <p>Enjoy sweet, aromating honey made by hardworking people of <br> ecologically
    clean raw materials in the most pure environment!</p>
    <a href="shop.php" class="btn1">Shop Now</a>
       </div>
    </div>

</div>
<div class="controlz"><i class="fas fa-angle-right next"></i></div>
  <!------  
<i class="slick-prv"> <img src="img/aprev.png" class="slick-next" alt="prev icon"></i>
<i class="slick-nxt"> <img src="img/anext.png" class="slick-prev" alt="next icon"> </i>
  ---->
</div>



<div class="line"> </div>
<div class="services">
  
<div class="row7">
    <div class="box">
      <div class="picleft"><img src="img/freedel.png"></div>
      <div>
        <h1>Free and fast Shipping</h1>
        <p> We deliver our products safely and on time. No more than 72 hrs </p>
      </div>
    </div>

    <div class="box">
    <div class="picleft"><img src="img/moneyback.png"></div>
      <div>
        <h1>Money back & guarantee</h1>
        <p> We deliver our products safely and on time. No more than 72 hrs </p>
      </div>
    </div>

    <div class="box">
    <div class="picleft"><img src="img/osupport.png"></div>
      <div>
        <h1>Online Support 24/7</h1>
        <p> We deliver our products safely and on time. No more than 72 hrs </p>
      </div>
    </div>

</div>
</div>

<div class="line2">
<div class="story"> 
  <div class="row2">
   <div class="box1">
    <span>Our Story</span>
    <h1>Production of Natural Honey since 1990</h1>
  <p>Honeyspot organization was founded in 1990 by the Stwaine and brothers family.
    Started in the city of Nairobi before expanding to Eldoret and Nakuru in 1993.
    In the next five years, Honeyspot was active and well known in Kisumu, Machakos, Mombasa
    and Kilifi. Currently Honeyspot is a National Honey producer and supplier in Kenya.
    We supply all over the country, and we have our branches in all the 47 counties of Kenya.
  </p>
  <a href="shop.php" class="btn">Shop Now</a>
   </div>

   <div class="box2"> 
    <img src="img/8.png">
   </div>
  </div>
</div>

<div class="line3"></div>


<!----testimonial section-------->
<div class="line4"></div>



<!----beginning of testimonial-fluid div-------->
<div class="testimonial-fluid">
<div class="controlz2" id="contprev"><i class="fas fa-angle-left prev1"></i></div>

<h1 class="title">What Our Customers Say</h1>
<div class="testimonial-slider">
    <!----testimonial one-------->
  <div class="testimonial-item">
      <img src="img/3.jpg">
      <div class="testimonial-caption">
      <span>Test The Quality</span>
  <h1>Organic Premium Honey</h1>
  <p>Honeyspot organization was founded in 1990 by the Stwaine and brothers family.
    Started in the city of Nairobi before expanding to Eldoret and Nakuru in 1993.
    </p>
      </div>
  </div>

  <!----testimonial 2-------->
  <div class="testimonial-item">
      <img src="img/4.jpg">
      <div class="testimonial-caption">
      <span>Test The Quality</span>
  <h1>Organic Premium Honey</h1>
  <p>Honeyspot organization was founded in 1990 by the Stwaine and brothers family.
    Started in the city of Nairobi before expanding to Eldoret and Nakuru in 1993.
    </p>
      </div>
  </div>

  <!----testimonial 3-------->
  <div class="testimonial-item">
      <img src="img/profile.jpg">
      <div class="testimonial-caption">
      <span>Test The Quality</span>
  <h1>Organic Premium Honey</h1>
  <p>Honeyspot organization was founded in 1990 by the Stwaine and brothers family.
    Started in the city of Nairobi before expanding to Eldoret and Nakuru in 1993.
    </p>
      </div>
  </div>

</div>
<div class="controlz2" id="contnext"><i class="fas fa-angle-right next1"></i></div>

</div>
<!----end of testimonial-fluid div-------->

<div class="line"></div>

<!----Discover section-------->
<div class="line2"></div>
<div class="discover">
   <div class="detail">
      <h1>Organic Honey Be Healthy</h1>
      <span>Buy Now and save 30% off</span>
      <p>Buy now while stock lasts. We have an offer of 30% off on all our products 
        for the month of January. Enjoy this gift as a thanks and appreciation for your 
        loyalty as our customer as we begin the new year 2024. Great offer and therefore no Njanuary
      for our esteemed customers</p>
      <a href="shop.php" class="btn">Discover Now</a>
   </div>

   <div class="img-box">
     <img src="img/14.png">
   </div>
</div>

<div class="line3"> </div>
<?php include 'homeshop.php'; ?>

<!----newsletter section------>
<div class="line2"></div>
  <div class="newsletter">
    <h1 class="title"> Join Our To Letter</h1>
    <p>Get 15% off your next purchase. Be the first one to learn about our new offers, discounts, new arrivals and more.</p>
     <input type="" name="" placeholder="Your Email Address..."></input>
     <button>Subscribe Now</button>
  </div>
<div class="line3"></div>
<div class="client">
  <div class="box">
    <img src="img/client0.png" alt="">
  </div>

  <div class="box">
    <img src="img/client1.png" alt="">
  </div>

  <div class="box">
    <img src="img/client2.png" alt="">
  </div>

  <div class="box">
    <img src="img/client3.png" alt="">
  </div>

</div>
<!----end of newsletter section------>

<?php include 'footer.php'; ?>
<script src="jquary.js"></script>
<script src="slick.js"></script>

<!----------slick slider link----------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<!--<script type="text/javascript" src="script2.js"> </script> -->

<script type="text/javascript"> 
<?php include 'script2.js' ?> 
</script>

</body>
</html>
