<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>

    <link rel="stylesheet" href="regstyle.css" />
    <link rel="stylesheet" href="popup.css" />
    <link rel="stylesheet" href="header.css" />

    
<style>

.active .navbar {
    transform: translateX(0);
    opacity: 1;
    z-index: 400;
    visibility: visible;
    pointer-events: auto;
}

.heading h2 {
  text-align: center;
    font-size: 40px;
    font-weight: 600;
  color: #151111;
  margin-bottom: 10px
}

.heading h6 {
  color: #151111;
  font-weight: 400;
  font-size: 16px;
  display: inline;
}
.input-field {
    position: absolute;
    width: 100%;
    height: 100%;
    background: none;
    border: none;
    outline: none;
    border-bottom: 1px solid #111;
    padding: 0;
    font-size: 20px;
    color: #111;
    transition: 0.4s;
}
label {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    font-size: 10px;
    color: #111;
    pointer-events: none;
    transition: 0.4s;
}

</style>
</head>
  <body>


<?php 
include 'registration_popup.php' 
?>


<header class="header">
  <div class="two">
<h1 class="logoh1"><img src="assets/logo.png" id="logo2"></h1>
      <nav class="navbar">
        <ul class="navbar-list">
          <li><a class="navbar-link" href="index.php">Home</a></li>
          <li><a class="navbar-link" href="form.php">Add Product</a></li>
          <li><a class="navbar-link" href="item.php">Categories</a></li>
          <li><a class="navbar-link" href="registration.php">Registration</a></li>
          <li><a class="navbar-link" href="contect.php">Contect</a></li>
          
          </li>
        </ul>
      </nav>

      <div class="mobile-navbar-btn">
        <i class="ri-menu-line mobile-nav-icon"></i>  
        <i class="ri-close-large-line mobile-nav-icon"></i>
      </div>
</div>
    </header>


    
    <?php
$popupSignUp = false;
$popupSignIn = false;

// Check for sign-in (login) submission
if (isset($_POST['loginbtn'])) {
  $email = $_POST['email'];
  $password = $_POST['cpassword'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "rentinghunt");

  // Prepare the SQL query to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND cpassword = ?");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  // If the user exists, show the login popup
  if (mysqli_num_rows($result) > 0) {
    $popupSignIn = true; // Show login popup
  }

  // Close connections
  $stmt->close();
  mysqli_close($conn);
} elseif (isset($_POST['signbtn'])) { // Check for sign-up submission
  $name = $_POST['name'];
  $email = $_POST['email'];
  $spass = $_POST['spassword'];
  $cpass = $_POST['cpassword'];

  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "rentinghunt");

  // Insert user data into the database
  $stmt = $conn->prepare("INSERT INTO user(name, email, spassword, cpassword) VALUES(?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $spass, $cpass);
  $result = $stmt->execute();

  if ($result) {
    $popupSignUp = true; // Show signup popup
  }

  // Close connections
  $stmt->close();
  mysqli_close($conn);
}
?>




    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="registration.php" autocomplete="off" class="sign-in-form" method="post">

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                <input
      type="email"
      name="email"  
      class="input-field"
      autocomplete="off"
      required
    />
    <label><h1>Email</h1></label>
  </div>

  <div class="input-wrap">
    <input
      type="password"
      name="cpassword"
      minlength="4"
      class="input-field"
      autocomplete="off"
      required
    />
                      <label><h1>Password</h1></label>
                </div>

                <input type="submit" value="Log In" class="sign-btn" name="loginbtn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="registration.php" autocomplete="off" class="sign-up-form" method="post">

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    name="name"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label><h1>Name</h1></label>
                </div>

                
             
                <div class="input-wrap">
                  <input
                    type="email"
                    name="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label><h1>Email</h1></label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    name="spassword"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label><h1>Set Password</h1></label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    name="cpassword"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label><h1>Conform Password</h1></label>
                </div>


                <input type="submit" value="Sign Up" class="sign-btn" name="signbtn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="assets/house4.jpg" class="image img-1 show" alt="" />
              <img src="assets/house3.jpg" class="image img-2" alt="" />
              <img src="assets/house3.jpg" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Find your Rent in Rental Hunt</h2>
                  <h2>Customize as you like</h2>
                  <h2>Invite to your Friends</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->
    <?php include 'footer.php' ?>

    <script src="app.js"></script>

<script>
const mobile_nav = document.querySelector(".mobile-navbar-btn");
const nav_header = document.querySelector(".header");

const box = document.querySelector(".box");

const toggleNavbar = () => {
  // alert("Plz Subscribe ");
  nav_header.classList.toggle("active");
  box.classList.toggle("active2");
};

mobile_nav.addEventListener("click", () => toggleNavbar());
</script>


<script>
    // Show popups if sign-up or sign-in was successful
    <?php if ($popupSignUp && isset($_POST['signbtn'])): ?>
      document.getElementById('popup').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
    <?php endif; ?>

    <?php if ($popupSignIn && isset($_POST['loginbtn'])): ?>
      document.getElementById('popup1').style.display = 'block';
      document.getElementById('overlay1').style.display = 'block';
    <?php endif; ?>

    // Function to close the popups
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('popup1').style.display = 'none';
      document.getElementById('overlay1').style.display = 'none';

      window.location.href = 'index.php';

    }
  </script>


<script>

const mobile_nav = document.querySelector(".mobile-navbar-btn");
    const nav_header = document.querySelector(".header");
    const main = document.querySelector(".main");
    const box = document.querySelector(".box");

    const toggleNavbar = () => {
      // alert("Plz Subscribe ");
      nav_header.classList.toggle("active");
      main.classList.toggle("active3");
    };

    mobile_nav.addEventListener("click", () => toggleNavbar());


</script>



  </body>
</html>