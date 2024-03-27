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

if (isset($_POST['submit-btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name= '$name' AND email= '$email' AND number = '$number' AND message= '$message'") or die ('query failed');

    if (mysqli_num_rows($select_message)>0) {
        echo 'message already sent';
    } else {
        mysqli_query($conn, "INSERT INTO `message` (`user_id`,`name`,`email`,`number`,`message`) 
        VALUES('$user_id','$name','$email','$number','$message')") or die ('query failed');
    }
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

    <title>Contact page</title>
</head>
<body>
<?php include 'header.php'; ?> 

<div class="banner">
<div class="detail">
    <h1>Contact</h1>
    <p>Life is a test, so you  gotta do your best usijipate in a mess. 
    </p>
    <a href="index.php">Home</a><span> / Contact</span>
</div>
</div>  

<div class="line"></div>

    <!----------- About Us ------------->
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
<div class="line4"></div>
 <div class="form-container">
    <h1 class="title">Leave a message</h1>
    <form method="post">
        <div class="input-field">
        <label for="">Your Name</label><br>
        <input type="text" name="name">
        </div>
        <div class="input-field">
        <label for="">Your Email</label><br>
        <input type="email" name="email">
        </div>
        <div class="input-field">
        <label for="">Number</label><br>
        <input type="number" name="number">
        </div>
        <div class="input-field">
        <label for="">Your Message</label><br>
        <textarea name="message" id="" cols="" rows=""></textarea>
        </div>

        <button type="submit" name="submit-btn">Send Message</button>
    </form>
 </div>   
 <div class="line"></div>

 <div class="line2"></div>

 <div class="address">
    <h1 class="title">Our Contact</h1>
    <div class="row">
        <div class="box">
            <i class="fas fa-map"></i>
            <div>
                <h4>Address</h4>
                <p>Street 10, Mwiki,<br>Kasarani, Nairobi, 70862</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-phone"></i>
            <div>
                <h4>Phone Number</h4>
                <p>0711898261</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-envelope"></i>
            <div>
                <h4>email</h4>
                <p>stwaine@gmail.com</p>
            </div>
        </div>

    </div>
 </div>

 <div class="line3"></div>
<?php include 'footer.php'; ?> 
<script type="text/javascript" src="script.js"></script>

</body>
</html>
