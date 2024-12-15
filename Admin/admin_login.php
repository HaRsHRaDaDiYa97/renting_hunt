<?php

session_start();

if(isset($_SESSION['admin_username'])){
    header("Location: index.php");
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login For Html Css</title>
    <link rel="stylesheet" href="admin_login.css">


    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>


<style>

.login-form .main {
    position: relative;
    display: flex;
    margin: 30px 0;
    box-shadow: 0px 0px 19px 5px rgb(0 0 0 / 19%);
}

.login-form {
    position: relative;
    min-height: 100vh;
    z-index: 0;
    background: azure;
    padding: 30px;
    justify-content: center;
    display: grid;
    font-family: 'poppins',sans-serif;
    grid-template-rows: 1fr auto 1fr;
    align-items: center;
}
.login-form h1 {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 400;
    color:black;
    font-family: 'poppins',sans-serif;
}
.login-form button {
    font-size: 18px;
    color: #fff;
    width: 100%;
    background: black;
    border: none;
    padding: 14px 15px;
    font-weight: 600;
    transition: 0.3s ease;
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
    background:red;
    text-align:center;
  }
  .popup .head .icon .box {
    display:inline-block;
    width:80px;
    height:80px;
    background:#f5f5f5;
    font-size:40px;
    line-height:80px;
    color:red;
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
  
</style>

</head>
<body>

<?php

$admin_error = false;

// Start a session to store login state

// Database connection details
$servername = "localhost";
$username = "root";  // replace with your DB username
$password = "";  // replace with your DB password
$dbname = "rentinghunt";  // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from POST
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Protect against SQL injection
    $admin_username = $conn->real_escape_string($admin_username);
    $admin_password = $conn->real_escape_string($admin_password);

    // Prepare and execute query
    $sql = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      session_start();

      // Username and password match, redirect to another page
        $_SESSION['admin_username'] = $admin_username;
        header("Location: index.php"); // Redirect to a dashboard or another page
        exit();
    } else {
        $admin_error = true;
        // Username or password incorrect, show error message
        
    }
}

// Close the connection
$conn->close();
?>
<div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
  <div class="head">
    <div class="icon">
      <div class="box">
      <i class="ri-close-large-fill"></i>
      </div>
    </div>
  </div>
  <div class="body">
  <h1>Invalid username or password</h1>
      <p>please try again !</p>
    <button class="close-btn" onclick="closePopup()">Done</button>
  </div>
</div>


    <div class="login-form">
        <h1>Admin Login</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Log In</h2>
                    <form action="admin_login.php" method="post">
                        <input type="text" name="username" placeholder="User Name" required autofocus>
                        <input type="password" name="password" placeholder="User Password" required>
                         <button class="btn" type="submit">
                            Login
                         </button>
                    </form>
                    <p class="account">Don't Have An Account? <a href="#">Register</a></p>
                </div>
                <div class="form-img">
                    <img src="bg.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <script>
    // Show popups if sign-up or sign-in was successful

    <?php if ($admin_error): ?>
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
