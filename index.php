<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Renting Hunt</title>

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

<link rel="stylesheet" href="index.css">

  <style type="text/css">


.mcenter {
    display: flex;
    align-items: center;
    justify-content: center;
   margin-top: 5rem; 
}

</style>
</head>

<body>

<?php 
include 'header.php';
?> 

<div class="mcenter">
<div class="main">

<div class="part1">

<div class="header__content">
        <h1>LET'S GO!<br />FOR FIND<br><span>RENT</span><br>WITH <span>BEST PRICE</span> </h1>
        <p>Welcome to Renting Hunt, your ultimate destination for renting products with ease and convenience.
           Whether you're looking for electronics, home appliances, furniture, or outdoor gear, we offer a wide
            range of products to suit every need. With flexible rental plans and hassle-free returns,
             Renting Hunt makes it simple to access high-quality items without the commitment of buying.
        </p>
</div>
</div>
<div class="part2">
<div class="header__image">
        <img src="assets/header.png" alt="header" />
      </div>
    
</div>

</div>
</div>
  


<section class="section__container service__container" id="service" style="background-color: #F8F8FF;">
      <h3 class="section__subheader">CATEGORY</h3>
      <h2 class="section__header">We Offer Best Services</h2>
      <div class="service__grid">
        <div class="service__card">
          <img src="assets/weather.png" alt="service" />
          <h4>No Scammers</h4>
          <p>
          we are committed to providing a safe and trustworthy platform for all users.
           We take extensive measures to
           ensure that all transactions are genuine, protecting both renters and product owners from scams. </p>
        </div>
        <div class="service__card">
          <img src="assets/plane.png" alt="service" />
          <h4>24 / 7 Help Line</h4>
          <p>
          we understand that questions or issues can arise at any time.
           That’s why we offer a 24/7 Help Line to ensure you have access to support whenever you need it.</p>
        </div>
        <div class="service__card">
          <img src="assets/event.png" alt="service" />
          <h4>You Can Sell Product</h4>
          <p>
          we offer more than just rentals – you can also sell your products directly to our community of users.
           Whether you have used items you no longer need or brand-new products, our platform makes selling 
           simple and efficient.</p>
        </div>
        <div class="service__card">
          <img src="assets/download.png" alt="service" />
          <h4>Customizations</h4>
          <p>
          we understand that every user has unique needs, which is why we offer flexible customization options
           to enhance your renting experience. From personalized rental plans to custom product options, our 
           platform allows you to make adjustments that best suit your requirements.
          </p>
        </div>
      </div>
    </section>

    <section class="section__container destination__container" id="destination">
      <h3 class="section__subheader">TOP SELLING</h3>
      <h2 class="section__header">Top Trending Products</h2>
    

      <div class="container">      
      <div class="card">

    <div class="image"><img src="assets/car8.jpg" id="img"></div>


</div>

<div class="card">

    <div class="image"><img src="assets/house5.jpg" id="img"></div>


</div>

<div class="card">

    <div class="image"><img src="assets/office4.jpg" id="img"></div>


</div>

</div>
    
    </section>

    <section class="section__container trip__container" id="trip">
      <div class="trip__image">
        <img src="assets/trip.png" alt="trip" />
      </div>
      <div class="trip__content">
        <h3 class="section__subheader">EASY & FAST</h3>
        <h2 class="section__header">Find Your Best Rent With Good Price In 3 Easy Steps</h2>
        <ul class="trip__list">
          <li>
            <span><i class="ri-signpost-line"></i></span>
            <div>
              <h4>Complete Registration Process</h4>
              <p>
              At Renting Hunt, we prioritize a smooth and secure user experience. To get started with
               renting products from our platform, users must complete a quick and easy registration process. </p>
            </div>
          </li>
          <li>
            <span><i class="ri-secure-payment-line"></i></span>
            <div>
              <h4>Find The Best Rent Product With Your Suitable Price</h4>
              <p>At Renting Hunt, we make it easy for you to find the perfect product that fits your budget.
                 Our platform offers a wide selection of high-quality items
                 across various categories, allowing you to rent exactly what you need at a price that works for you.
                </p>
            </div>
          </li>
          <li>
            <span><i class="ri-flight-takeoff-line"></i></span>
            <div>
              <h4>Contect the Client</h4>
              <p>
              At Renting Hunt, maintaining excellent communication with our clients is a top priority.
               Whether you have questions about a product, need assistance with your rental, or require
                support, we make it simple to get in touch with us.

</p>
            </div>
          </li>
        </ul>
      </div>
    </section>

<?php include 'footer.php' ?>


<script>

const mobile_nav = document.querySelector(".mobile-navbar-btn");
    const nav_header = document.querySelector(".header");
    const main = document.querySelector(".main");
    const box = document.querySelector(".box");

    const toggleNavbar = () => {
      // alert("Plz Subscribe ");
      nav_header.classList.toggle("active");
    };

    mobile_nav.addEventListener("click", () => toggleNavbar());


</script>



</body>

</html>