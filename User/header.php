
<html>
<head>


<link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />




<style>
@import url("https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:wght@400;500;600;700&display=swap");


* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

html {
  /* 1rem = 10px */
  overflow-x: hidden;
width:100%;
}

.navbar-link:visited {
    font-family: sans-serif;
}

body {
  overflow-x: hidden;
}

.header {
  height: 5rem;
    display: flex;
    background-color: #111;
    justify-content: center;
    position: fixed;
    width: 100%;
  z-index: 2;
  }
  .header .logoh1{
  color:#FBCA01;
  height:100%;
  }
  
  .header .logo {
    height: 3rem;
  }
  .navbar{
    display: contents;
  }
  .navbar-list {
    display: flex;
    gap: 2.5rem;
    list-style: none;
    height: 100%;
    align-items: center;
  }
  
  .navbar-link:link,
  .navbar-link:visited {
    display: inline-block;
    text-transform: uppercase;
    text-decoration: none;
    font-size: 20px;
    font-weight: 500;
    color: #fff;
    transition: all 0.3s;
  }
  
  .navbar-link:hover,
  .navbar-link:active {
    color: #111;
  border-radius:5px;
  padding:5px;
  background-color:white
  }
  
  .mobile-navbar-btn {
    display: none;
    background: transparent;
    cursor: pointer;
  }
  
  .header.active .ri-close-large-line{
  display:block;
  }
  .ri-close-large-line{
  display:none;
  }
  
  .header.active .ri-menu-line{
  display:none;
  }
  
  
  .mobile-nav-icon {
      color: black;
      font-size: 30px;
      position: absolute;}
  
  .mobile-nav-icon[name="close-outline"] {
    display: none;
  }



  @media (max-width: 62em) {
    .mobile-navbar-btn {
      display: block;
      z-index: 999;
      transition: 0.5s;
  height: 40px;
      width: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
  
  border:1px solid white;
  background-color:white;
  color:black
    }
  
  .vc h1{
  font-size:6rem;
  }
  .vc h4{
  text-align:center;
  font-size:15px;
  }
  
  
  .page2content h1{
  font-size:5rem;
  }
  
    .header {
      
      z-index: 2;
    }
  .main.active3{
  visibility: hidden;
  }
  
  .header.active .navbar-link{
    font-size: 2.4rem;
    background-color: white;
    padding: 10px;
    color: black;
    border-radius: 10px;
  }
  
  
    .header .logo {
      width: 40%;
    }
  
    .navbar {
      /* display: none; */
      width: 100%;
      height: 100vh;
      background: #111;
      position: absolute;
      top: 0;
      left: 0;
  
      display: flex;
      justify-content: center;
      align-items: center;
  
      /* to get the tranisition  */
      transform: translateX(100%);
      transition: all 0.5s linear;
  
      opacity: 0;
      visibility: hidden;
      pointer-events: none;
    }
  
    .navbar-list {
      flex-direction: column;
      align-items: center;
  margin-top: 12rem;
    }
  
    .active .navbar {
      transform: translateX(0);
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
      z-index: 400;
    }
  
    .active .mobile-navbar-btn .mobile-nav-icon[name="close-outline"] {
      display: block;
      transition: 0.5s;
    }
  
    .active .mobile-navbar-btn .mobile-nav-icon[name="menu-outline"] {
      display: none;
      transition: 0.5s;
    }
  }
  
  /* Below 560px  */
  @media (max-width: 35em) {
    .header {
      padding: 0 2.4rem;
    }
  
    .header .logo {
      width: 60%;
    }
  }
  
  .logoh1 img {
    height: 100%;
  width: 120px;    }

  #btn a {
    text-decoration: none;
    color: whitesmoke;
  }

  .two{
    width: 90%;
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

</style>
</head>
<body>

<header class="header">
    <div class="two">
        <h1 class="logoh1"><img src="assets/logo.png" id="logo2"></h1>
        <nav class="navbar">
            <ul class="navbar-list">
                <li><a class="navbar-link" href="index.php">Home</a></li>
                <li><a class="navbar-link" href="form.php">Add Product</a></li>
                <li><a class="navbar-link" href="item.php">Categories</a></li>
                <li><a class="navbar-link" href="registration.php">Registration</a></li>
                <li><a class="navbar-link" href="contect.php">Contact</a></li>

                </ul>
        </nav>

        <div class="mobile-navbar-btn">
            <i class="ri-menu-line mobile-nav-icon"></i>
            <i class="ri-close-large-line mobile-nav-icon"></i>
        </div>
    </div>
</header>


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