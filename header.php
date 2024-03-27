<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--<link rel="stylesheet" type='text/css' href="style.css"> -->

    <title>Document</title>
</head>
<body class="general">
<header class="header">
    <div class="flex">
    <a href="admin_pannel.php" class="logo"> <img src="img/logo.png"></a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="about.php">about us</a>
        <a href="shop.php">shop</a>
        <a href="order.php">order</a>
        <a href="contact.php">contact</a>
    </nav>

    <div class="icons">
        <i class="fas fa-user" id="user-btn"></i>

        <?php 
        $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die ('query failed');
        $wishlist_num_rows = mysqli_num_rows($select_wishlist);
      ?>
        &nbsp;&nbsp;&nbsp;&nbsp;

        <a href = "wishlist.php"><i class="fas fa-heart" id="ht"></i><sup> <?php echo $wishlist_num_rows; ?> </sup></a>
        <?php 
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die ('query failed');
        $cart_num_rows = mysqli_num_rows($select_cart);
      ?>
      &nbsp;&nbsp;&nbsp;&nbsp;

        <a href = "cart.php"> <i class="fas fa-shopping-cart" id="ct"></i><sup><?php echo $cart_num_rows; ?></sup> </a>
        <i class="fas fa-bars" id="menu-btn"></i>
    </div>

      <!--
    <div class="iprof"><img src="img/profile.png" alt="Profile Icon" id="user-btn"></div>
    <div class="iwish"><a href = "wishlist.php"> <img src="img/wishlist.png" alt="wishlist Icon"> </a> </div>
    <div class="icart"><a href = "cart.php"> <img src="img/cart.png" alt="cart Icon"> </a> </div>
    <div class="imenu"><img src="img/menu.png" alt="menu Icon" id="menu-btn"></div>
        -->
    

    <div class="user-box">
    <p> username : <span><?php echo $_SESSION['user_name']; ?> </span></p>
    <p> Email : <span><?php echo $_SESSION['user_email']; ?> </span></p>
    <form method="post">
      <button type="submit" name="logout" class="logout-btn">log out</button>
    </form>

    </div>

    </div> 
</header>  

</body>
</html>