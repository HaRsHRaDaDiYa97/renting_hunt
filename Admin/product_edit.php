<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();

}
?>


<?php
  include "connection.php";
  
  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: admin_product.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from product where id='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    while(!$row){
      header("location: admin_product.php");
      exit;
    }
    $name=$row["name"];
    $price=$row["price"];
    $message=$row["message"];
    $location=$row["location"];
  }
  else{
    $id = $_POST["id"];
    $name=$_POST["name"];
    $price=$_POST["price"];
    $message=$_POST["message"];
    $location=$_POST["location"];
$file=$_FILES["image"];
    $sql = "UPDATE product set name='$name', price='$price', message='$message', location='$location',
    file='$file' where id='$id'";
    $result = mysqli_query($conn,$sql);
    
  }

  if(isset($_POST['submit_contact'])){
    header("location: admin_product.php");
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

        
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Name" autocomplete="off" name="name"
            value="<?php echo $name; ?>" >
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Price" autocomplete="off" name="price" 
            value="<?php echo $price; ?>" >
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Message" autocomplete="off" name="message" 
            value="<?php echo $message; ?>" >
        </div>
        
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Location" autocomplete="off" name="location" 
            value="<?php echo $location; ?>" >
        </div>

        <div class="input-box">
            <input type="file" class="input-field" placeholder="image" autocomplete="off" name="image" 
            value="<?php echo $file; ?>" >
        </div>

         
              <div class="input-submit">
            <button type="submit" name="submit_contact" class="submit-btn">
            Submit
            </button>
            
        </div>

    </div>
</form>
</body>
</html>

