
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--box icon link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--<link rel="stylesheet" type='text/css' href="style.css"> -->

    <title>A.users</title>
</head>
<body class="general">
<header class="header">
    <div class="flex">
    <a href="admin_pannel.php" class="logo"> <img src="img/logo.png"></a>
    <nav class="navbar">
        <a href="admin_pannel.php">Home</a>
        <a href="admin_product.php">Products</a>
        <a href="admin_order.php">Orders</a>
        <a href="admin_user.php">Users</a>
        <a href="admin_message.php">Messages</a>
    </nav>

    <div class="icons">
    <i class="fas fa-user" id="user-btn"></i>
    <div class="imenu"><img src="img/menu.png" alt="menu Icon" id="menu-btn"></div>
      <!--<i class="fas fa-bars" id="menu-btn"></i>  -->
    </div>

    <div class="user-box">
    <p> username : <span><?php echo $_SESSION['admin_name']; ?> </span></p>
    <p> Email : <span><?php echo $_SESSION['admin_email']; ?> </span></p>
    <form method="post">
      <button type="submit" name="logout" class="logout-btn">log out</button>
    </form>

    </div>

    </div> 
</header>  
<div class="banner">
<div class="detail">
    <h1>Admin Dashboard</h1>
    <p>Life is a test, so you gotta do your best usijipate in a mess. 
    </p>
</div>
</div>  

<div class="line"></div>
</body>
</html>