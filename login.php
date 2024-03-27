
<?php

include 'connection.php';
session_start();

if (isset($_POST['submit-btn']))  {
    $filter_email = filter_var ($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

    if (mysqli_num_rows($select_user)>0)  {
       $row = mysqli_fetch_assoc($select_user);
       if ($row['user_type']== 'admin') {
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:admin_pannel.php');

       }else if($row['user_type']== 'user') {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        header('location:index.php');

       } else {
        $message[] = 'Incorrect email or password';
       }
        
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--box icon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Login Page</title>
</head>
<body>
<section class="form-container"> 

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

<form method="post"> 
<h1> login Here</h1>

<div class="input-field">
<label>Your Email</label><br>
<input type="email" name="email" placeholder="enter your email" required>
</div>

<div class="input-field">
<label>Your Password</label><br>
<input type="password" name="password" placeholder="enter your password" required>
</div>

<input type="submit" name="submit-btn" value="Login" class="btn">

<p>Do not have an account? <a href="register.php">Register Here</a></p>
</form>
</section>

<!--and you gotta walk at your pase, with GOD on your side, 
        you will win this race. Si a must ni throw blow ndo niweze kuwin fight, 
        nacheza simple bro, ju brain pi ani weapon. New day, new strength, new strategies.-->
</body>
</html>
