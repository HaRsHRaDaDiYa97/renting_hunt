<?php
  include "connection.php";
  $id="";
  $name="";
  $email="";
  $phone="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: index.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from user where user_id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: index.php");
      exit;
    }
    $name=$row["name"];
    $email=$row["email"];
    $password=$row["cpassword"];

  }
  else{
    $id = $_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["pass"];

    $sql = "update user set name='$name', email='$email', cpassword='$password' where user_id='$id'";
    $result = $conn->query($sql);
    
  }

  if(isset($_POST['submit'])){
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>


@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #dfdfdf;
}
.login-box {
    display: flex;
    justify-content: center;
    flex-direction: column;
    
    /* height: 480px; */
    padding: 30px;
    border-radius: 20px;
    border: 2px solid black;
}
.login-header{
    text-align: center;
}
.login-header header{
    color: #333;
    font-size: 4rem;
    font-weight: 600;
border-bottom:2px solid black;
  }
label{
  font-size:2rem;
}
.input-box .input-field{
  width: 100%;
    height: 60px;
    font-size: 24px;
    margin-bottom: 15px;
    border-radius: 30px;
    border: none;
    box-shadow: 0px 5px 10px 1px rgb(0 0 0 / 5%);
    margin-top: 15px;
    outline: none;
    transition: .3s;
}
::placeholder{
    font-weight: 500;
    color: #222;
}
.input-field:focus{
    width: 105%;
}
.forgot{
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
}
section{
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #555;
}
#check{
    margin-right: 10px;
}
a{
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
}
section a{
    color: #555;
}
.input-submit{
    position: relative;
}
.submit-btn {
    width: 100%;
    height: 60px;
    background: #222;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    color: white;
    transition: .3s;
    font-size: 2rem;
}
.input-submit label{
    position: absolute;
    top: 45%;
    left: 50%;
    color: #fff;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
}
.submit-btn:hover{
    background: #000;
    transform: scale(1.05,1);
}
.sign-up-link{
    text-align: center;
    font-size: 15px;
    margin-top: 20px;
}
.sign-up-link a{
    color: #000;
    font-weight: 600;
}

</style>

</head>
<body>

<form method="post">

<div class="login-box">
        <div class="login-header">
            <header>Update User</header>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>


        <label>Name</label>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Name" autocomplete="off" name="name"
            value="<?php echo $name; ?>" required>
        </div>

        <label>Email</label>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Email" autocomplete="off" name="email" 
            value="<?php echo $email; ?>" required>
        </div>

        <div class="input-box">
<label>Password</label>
        <input type="password" class="input-field" placeholder="Password" autocomplete="off" name="pass" 
            value="<?php echo $password; ?>" required>
        </div>

        <div class="input-submit">
            <button type="submit" name="submit" class="submit-btn">
            Submit
            </button>
            
        </div>

    </div>
</form>


  </body>
</html>

