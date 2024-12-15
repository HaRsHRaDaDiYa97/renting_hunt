<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Renting Hunt</title>

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" href="contect.css" />

    <style>


.active .navbar {
    transform: translateX(0);
    opacity: 1;
    z-index: 400;
    visibility: visible;
    pointer-events: auto;
}

  *{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Quicksand', sans-serif;
}

body{
	height: 100vh;
	width: 100%;
}

.container {
    position: relative;
    width: 100%;
    height: fit-content;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 100px;
    background-color: aliceblue;
    margin-top: 5rem;
}
.container:after{
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	background: url("img/bg.jpg") no-repeat center;
	background-size: cover;
	filter: blur(50px);
	z-index: -1;
}
.contact-box{
	max-width: 850px;
	display: grid;
	border-radius: 15px;
	grid-template-columns: repeat(2, 1fr);
	justify-content: center;
	align-items: center;
	text-align: center;
	background-color: #fff;
	box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
}

.left{
	background: url("assets/model.jpg") no-repeat center;
	background-size: cover;
	height: 100%;
	border-radius: 15px;
}

.right{
	padding: 25px 40px;
}

h2{
	position: relative;
	padding: 0 0 10px;
	margin-bottom: 10px;
}

h2:after{
	content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 4px;
    width: 50px;
    border-radius: 2px;
    background-color: black;
}

.field{
	width: 100%;
	border: 2px solid rgba(0, 0, 0, 0);
	outline: none;
	background-color: rgba(230, 230, 230, 0.6);
	padding: 0.5rem 1rem;
	font-size: 1.1rem;
	margin-bottom: 22px;
	transition: .3s;
}

.field:hover{
	background-color: rgba(0, 0, 0, 0.1);
}

textarea{
	min-height: 150px;
}

.btn{  
	  width: 100%;
    padding: 0.5rem 1rem;
    background-color: black;
    color: #fff;
    font-size: 1.5rem;
    border: none;
    outline: none;
    cursor: pointer;
    transition: .3s;
    border-radius: 15px;
}

.btn:hover{
    background-color: #27ae60;
}

.field:focus{
    border: 2px solid rgba(30,85,250,0.47);
    background-color: #fff;
}

.overlay,.overlay1 {
      display: none; /* Initially hidden */
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 500;
  }
  
  .popup {
    display:none;
    position:absolute;
    top:50%;
    left:50%;
    z-index: 501;
    transform:translate(-50%,-50%) scale(1.2);
    opacity:1;
    padding: 10px;
    background:#fff;
    border-radius:5px;
    box-shadow:2px 2px 5px 2px rgba(0,0,0,0.15);
    transition:top 0ms ease-in-out 200ms,
               opacity 200ms ease-in-out 0ms,
               transform 200ms ease-in-out 0ms;
  }
  
  .popup .head {
    padding:20px 20px;
    background:#57af57;
    text-align:center;
  }
  .popup .head .icon .box {
    display:inline-block;
    width:80px;
    height:80px;
    background:#f5f5f5;
    font-size:40px;
    line-height:80px;
    color:#57af57;
    border-radius:50%;
  }
  .popup .body {
    padding:20px;
    text-align:center;
  }
  .popup .body h1 {
    font-size:25px;
    margin-bottom:10px;
    color:#222;
  }
  .popup .body p {
    font-size:15px;
    color:#555;
    margin-bottom:20px;
  }
  .popup .body .close-btn {
    padding:10px 20px;
    border:1px solid #888;
    color:white;
    background-color:black;
    border-radius:20px;
    font-size:16px;
    cursor:pointer;
    outline:none;
  }
  

@media screen and (max-width: 880px){
	.contact-box{
		grid-template-columns: 1fr;
	}
	.left{
		height: 200px;
	}
}


@media screen and (max-width: 500px){
	.contact-box{
		grid-template-columns: 1fr;
	}
	.left{
		height: 200px;
	}
}


</style>

  </head>
  <body>


  <?php
  
$popup = false;

 if(isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $conn = mysqli_connect("localhost", "root", "", "rentinghunt");


  $stmt = $conn->prepare("INSERT INTO contact_form(name, email, phone, message) VALUES(?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $phone, $message);
  $result = $stmt->execute();

  if ($result) {
    $popup = true;
  }


  $stmt->close();
  mysqli_close($conn);
}
?>



<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
  <div class="head">
    <div class="icon">
      <div class="box">
      <i class="ri-check-fill"></i>
      </div>
    </div>
  </div>
  <div class="body">
  <h1>Successfully Send Message</h1>
      <p>Thank You for your Feedback</p>
    <button class="close-btn" onclick="closePopup()">Done</button>
  </div>
</div>



<?php
include 'header.php';
?>


    <!-- ======================================== 
          Our Main Hero Section Start  
    ========================================  -->

    <div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<form class="right" action="contect.php" method="post">
				<h2>Contact Us</h2>
				<input type="text" class="field" placeholder="Your Name" name="name" required>
				<input type="text" class="field" placeholder="Your Email" name="email" required>
				<input type="text" class="field" placeholder="Phone" name="phone" required>
				<textarea placeholder="Message" class="field" name="message" required></textarea>
				<button type="submit" class="btn" name="send">Send</button>
</form>
		</div>
	</div>



   <!-- ======================================== 
          Our Service Section Start  
    ========================================  -->
    
    
	<?php include 'footer.php' ?>
    
    
    
    <!-- ======================================== 
          Our JavaScript Section Start  
    ========================================  -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>

<script>
const mobile_nav = document.querySelector(".mobile-navbar-btn");
const nav_header = document.querySelector(".header");

const toggleNavbar = () => {
  // alert("Plz Subscribe ");
  nav_header.classList.toggle("active");
};

mobile_nav.addEventListener("click", () => toggleNavbar());
</script>


<script>

const mobile_nav = document.querySelector(".mobile-navbar-btn");
    const nav_header = document.querySelector(".header");
    const main = document.querySelector(".main");
    const box = document.querySelector(".box");

    const toggleNavbar = () => {
      nav_header.classList.toggle("active");
      main.classList.toggle("active3");
    };

    mobile_nav.addEventListener("click", () => toggleNavbar());


</script>


<script>
    // Show popups if sign-up or sign-in was successful
    <?php if ($popup && isset($_POST['send'])): ?>
      document.getElementById('popup').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
    <?php endif; ?>


    // Function to close the popups
    function closePopup() {
      document.getElementById('popup').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';


    }
  </script>


  </body>

</html>