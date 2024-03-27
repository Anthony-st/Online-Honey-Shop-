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

    <title>Document</title>
</head>
<body>
<?php include 'header.php'; ?> 

<div class="banner">
<div class="detail">
    <h1>About Us</h1>
    <p>Life is a test, so you  gotta do your best usijipate in a mess. 
    </p>
    <a href="index.php">Home</a><span>/ About Us</span>
</div>
</div>  

<div class="line"></div>

    <!----------- About Us ------------->
    <div class="line2"></div>
    <div class="about-us">
        <div class="row">
            <div class="box7" id="box7">
                <div class="title2">
                    <span>ABOUT OUR ONLINE STORE</span>
                    <h1>Trusted, with 21 years of  experience.</h1>
                </div>
                <p>Over 25 years of helping companies reach their financial and branding goals.
                    
                   The perfect way to enjoy brewing tea on low hanging fruit to identify, The perfect way to
                    enjoy brewing tea on low hanging fruit to identify,
                    The perfect way to enjoy brewing tea on low hanging fruit to identify, For me, the most 
                    important, photography. 
                </p>
            </div>
            <!---------end of box div------->
            
            <div class="img-box8" id="img-box8">
                <img src="img/about3.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="line3"></div>
      <!----------- About Us end------------->

      

     <!----------- features------------->
     <div class="line4"></div>
      <div class="features">
        <div class="title">
            <h1>Complete Customer Ideas</h1>
            <span>Best Features</span>
        </div>
        <div class="row">
            <div class="box">
                <div class="bx"><img src="img/icon2.png" alt=""></div>
                <h4>24 x 7</h4>
                <p>Online support 24/7</p>
            </div>

            <div class="box">
            <div class="bx"><img src="img/icon1.png" alt=""></div>
                <h4>Money Back Guarantee</h4>
                <p>100% Secure Payment</p>
            </div>

            <div class="box">
            <div class="bx"><img src="img/icon0.png" alt=""></div>
                <h4>Special Gift Card</h4>
                <p>Give the perfect gift</p>
            </div>

            <div class="box">
            <div class="bx"><img src="img/icon.jpg" alt=""></div>
                <h4>Worldwide Shipping</h4>
                <p>On orders over $99</p>
            </div>
        </div>
      </div>
     <div class="line"></div>
     <!----------- features end------------->

<!----------- team section------------->
     <div class="line2"></div>
     <div class="team">
        <div class="title">
            <h1>Our Workable Team</h1>
            <span>best team</span>
        </div>
        <div class="row">
            <div class="box">
                <div class="img-box9">
                <img src="img/team.jpg" alt="">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Tony Mulon</h4>
                    <div class="icons">
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-youtube"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box9">
                <img src="img/team1.jpg" alt="">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Tony Mulon</h4>
                    <div class="icons">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box9">
                <img src="img/tm.jpg" alt="">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Tony Mulon</h4>
                    <div class="icons">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="img-box9">
                <img src="img/team2.jpg" alt="">
                </div>
                <div class="detail">
                    <span>Finance Manager</span>
                    <h4>Tony Mulon</h4>
                    <div class="icons">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-whatsapp"></i>
                    </div>
                </div>
            </div>

        </div>
     </div>
     <div class="line3"></div>

<!--------------Project section---------------->
      <div class="line4"></div>
       <div class="project">
        <div class="title">
            <h1>Our Best Project</h1>
            <span>How it works</span>            
        </div>
        <div class="row">
            <div class="box">
            <img src="img/about1.jpg" alt="">
            </div>

            <div class="box">
            <img src="img/about2.jpg" alt="">
            </div>

        </div>
       </div>
      <div class="line"></div>
<!--------------End of Project section---------------->


<!--------------Ideas section---------------->
      <div class="line2"></div>
      <div class="ideas">
        <div class="title">
            <h1>We and our clients are happy to be a part of the company</h1>
            <span>Our Features</span>
        </div>
        <div class="row">
            <div class="box">
                <i class="fas fa-hard-hat"></i>
                <div class="detail">
                    <h2>What We Really Do</h2>
                    <p>We produce, package and sell/supply raw natural honey from Kitale. We have shops 
                        in all the major cities in Kenya.
                    </p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-th"></i>
                <div class="detail">
                    <h2>History of Genesis</h2>
                    <p>We produce, package and sell/supply raw natural honey from Kitale. We have shops 
                        in all the major cities in Kenya.
                    </p>
                </div>
            </div>

            <div class="box">
                <i class="fas fa-wind"></i>
                <div class="detail">
                    <h2>Our Vision</h2>
                    <p>We produce, package and sell/supply raw natural honey from Kitale. We have shops 
                        in all the major cities in Kenya.
                    </p>
                </div>
            </div>

        </div>
      </div>
      <div class="line3"></div>

<?php include 'footer.php'; ?> 
<script type="text/javascript" src="script.js"></script>

</body>
</html>
