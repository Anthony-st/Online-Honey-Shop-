<?php
include 'connection.php';
session_start();
$admin_id = $_SESSION['admin_name'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
}

?>

<style type="text/css"> 
<?php 
include 'style.css';
?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Admin Pannel</title>
</head>
<body>
<?php include 'admin_header.php'; ?>
<div class="line4"></div>
<section class="dashboard">
 <div class="box-container">

 <!--1st Div-->
  <div class="box">
<?php
$total_pendings = 0;
$select_pendings = mysqli_query($conn, "SELECT * fROM `order` WHERE payment_status = 'pending'")
 or die ('query failed');
 while ($fetch_pending = mysqli_fetch_assoc($select_pendings)) {
    $total_pendings += $fetch_pending['total_price'];
 }
?>
<h3>$ <?php echo $total_pendings; ?>/-</h3>
<p>Total Pendings</p>
</div>
<!--End of 1st Div-->

<!--2nd Div-->
<div class="box">
<?php
$total_completes = 0;
$select_completes = mysqli_query($conn, "SELECT * fROM `order` WHERE payment_status = 'completes'")
 or die ('query failed');
 while ($fetch_completes = mysqli_fetch_assoc($select_completes)) {
    $total_completes += $fetch_completes['total_price'];
 }
?>

<h3>$ <?php echo $total_completes; ?>/-</h3>
<p>Total completes</p> 
</div>
  <!--End of 2nd Div-->

  <!--3rd Div-->
  <div class="box">
<?php
$select_orders = mysqli_query($conn, "SELECT * fROM `order`") or die ('query failed');
 $num_of_orders = mysqli_num_rows($select_orders);
?>

<h3><?php echo $num_of_orders; ?></h3>
<p>Order Placed</p> 
</div>
  <!--End of 3rd Div-->

<!--4th Div-->
  <div class="box">
<?php
$select_products = mysqli_query($conn, "SELECT * fROM `order`") or die ('query failed');
 $num_of_products = mysqli_num_rows($select_products);
?>

<h3><?php echo $num_of_products; ?></h3>
<p>Products Added</p> 
</div>
<!--End of 4th Div-->

<!--5th Div-->
<div class="box">
<?php
$select_users = mysqli_query($conn, "SELECT * fROM `users` WHERE user_type = 'user'") or die ('query failed');
 $num_of_users = mysqli_num_rows($select_users);
?>

<h3><?php echo $num_of_users; ?></h3>
<p>Total Normal users</p> 
</div>
<!--End of 5th Div-->

<!--6th Div-->
<div class="box">
<?php
$select_admin = mysqli_query($conn, "SELECT * fROM `users` WHERE user_type = 'admin'") or die ('query failed');
 $num_of_admin = mysqli_num_rows($select_admin);
?>

<h3><?php echo $num_of_admin; ?></h3>
<p>Total admin</p> 
</div>
<!--End of 6th Div-->

<!--7th Div-->
<div class="box">
<?php
$select_users = mysqli_query($conn, "SELECT * fROM `users`") or die ('query failed');
 $num_of_users = mysqli_num_rows($select_users);
?>

<h3><?php echo $num_of_users; ?></h3>
<p>Total Registered Users</p> 
</div>
<!--End of 7th Div-->

<!--8th Div-->
<div class="box">
<?php
$select_message = mysqli_query($conn, "SELECT * fROM `message`") or die ('query failed');
 $num_of_message = mysqli_num_rows($select_message);
?>

<h3><?php echo $num_of_message; ?></h3>
<p>New Messages</p> 
</div>

<!--End of 8th Div-->

</div>
</section>
<script type="text/javascript" src="script.js"></script>

</body>
</html>