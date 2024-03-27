<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----------- font awesome icon link ------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!--------slick slider link------------>
<link rel="stylesheet" type="text/css" href="slick.css">

<!--------default css link------------>
<link rel="stylesheet" href="main.css">



    <title>Veggen - Homepage</title>
</head>
<body>
  <section class="popular-brands">
    <h2>POPULAR HONEY BRANDS</h2>
    <div class="controls">  
        <i class="fas fa-chevron-left pre-btn" id="left"></i>
        <i class="fas fa-chevron-right nxt-btn" id="right"></i>    
    </div>


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


 <div class="popular-brands-content" id="popular-brands-content">
      <?php 
        $select_products = mysqli_query($conn, "SELECT * FROM `products`" ) or die ('query failed');
        if (mysqli_num_rows($select_products)>0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
        <form method="post" class="card">
            <img src="image/<?php echo $fetch_products['image']; ?>">
            <div class="price"> $<?php echo $fetch_products['price']; ?> </div>
            <div class="name"> <?php echo $fetch_products['name']; ?> </div>
            <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>"></input>
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>"></input>
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>"></input>
            <input type="hidden" name="product_quantity" value="1" min="1"></input>
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>"></input>

        <div class="icon">
            <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="fas fa-eye"></a>
            <button type="submit" name="add_to_wishlist" class="fas fa-heart"></button>
            <button type="submit" name="add_to_cart" class="fas fa-cart-plus"></button>
        </div>
        </form>
    <?php   
      }
    } else {
         echo '<p class="empty">No Products Added yet!</p>';
    }
    ?>
 </div>

</section>



<script>
    const carrier = document.getElementById('popular-brands');
    const slider = document.querySelector('.popular-brands-content');
    const leftArrow = document.querySelector('.pre-btn');
    const rightArrow = document.querySelector('.nxt-btn');

    let currentIndex = 0;
    const slideWidth = document.querySelector('.card').offsetWidth + 14; // width + 2*margin

    leftArrow.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
      }
    });

    rightArrow.addEventListener('click', () => {
      if (currentIndex < slider.children.length - 1) {
        currentIndex++;
        updateSlider();
      }
    });

    function updateSlider() {
      const offset = -currentIndex * slideWidth;
      slider.style.transform = `translateX(${offset}px)`;
    }
  </script>



</body>
</html>
