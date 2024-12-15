<?php
if (isset($_POST['btn'])) { 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $location = $_POST['location'];    
    $file = $_FILES['image']['name'];
    $tempfile = $_FILES['image']['tmp_name']; 
    $folder = 'images/' . $file;

    if (move_uploaded_file($tempfile, $folder)) {
       
        $conn = mysqli_connect("localhost", "root", "", "rentinghunt");
    
        $stmt = $conn->prepare("INSERT INTO detail(file,name,email,phone,price,detail,location) VALUES(?, ?, ?, ?, ?,?,?)");
        $stmt->bind_param("sssssss", $file, $name,$email,$phone, $price, $detail, $location);
        $result = $stmt->execute();
      
        if ($result) {
            $popupSignUp = true;
        }
    
        $stmt->close();
        mysqli_close($conn);
    } else {
        echo "Failed to upload the image.";
    }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>

      <style>

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

body{
}

.main{
    height:100%;
    width:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin-top:7rem;
}

.container{
    width: 100%;
    max-width: 650px;
    background: black;
    padding: 28px;
    margin: 0 28px;
    border-radius: 10px;
    box-shadow: inset -2px 2px 2px white;
}
#file{

}

.form-title{
    font-size: 26px;
    font-weight: 600;
    text-align: center;
    padding-bottom: 6px;
    color: white;
    text-shadow: 2px 2px 2px black;
    border-bottom: solid 1px white;
}

.main-user-info{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}

.user-input-box:nth-child(2n){
    justify-content: end;
}

.user-input-box{
    display: flex;
    flex-wrap: wrap;
    width: 50%;
    padding-bottom: 15px;
}

.user-input-box label{
    width: 95%;
    color: white;
    font-size: 20px;
    font-weight: 400;
    margin: 5px 0;
}

.user-input-box input{
    height: 40px;
    width: 95%;
    border-radius: 7px;
    outline: none;
    border: 1px solid grey;
    padding: 0 10px;
}

.gender-title{
    color:white;
    font-size: 24px;
    font-weight: 600;
    border-bottom: 1px solid white;
}

.gender-category{
    margin: 15px 0;
    color: white;
}

.gender-category label{
    padding: 0 20px 0 5px;
}

.gender-category label,
.gender-category input,
.form-submit-btn input{
    cursor: pointer;
}

.form-submit-btn{
    margin-top: 40px;
}

.form-submit-btn input{
    display: block;
    width: 100%;
    margin-top: 10px;
    font-size: 20px;
    padding: 10px;
    border:none;
    border-radius: 3px;
    color: black;
    background: white;
}

.form-submit-btn input:hover{
    background: rgba(56, 204, 93, 0.7);
    color: rgb(255, 255, 255);
}


@media(max-width: 600px){
    .container{
        min-width: 280px;
    }

    .user-input-box{
        margin-bottom: 12px;
        width: 100%;
    }

    .user-input-box:nth-child(2n){
        justify-content: space-between;
    }

    .gender-category{
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .main-user-info{
        max-height: 380px;
        overflow: auto;
    }

    .main-user-info::-webkit-scrollbar{
        width: 0;
    }
}

</style>

</head>
  <body>

<?php
include 'header.php';

?>

<div class="main">

    <div class="container">
      <h1 class="form-title">Add Product</h1>
      <form action="form.php" method="post" enctype="multipart/form-data">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="name"
                    placeholder="Enter Full Name"/>
          </div>
          <div class="user-input-box">
            <label for="username">Price</label>
            <input type="text"
                    id="username"
                    name="price"
                    placeholder="Enter Price"/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"/>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"
                    id="phoneNumber"
                    name="phone"
                    placeholder="Enter Phone Number"/>
          </div>
          <div class="user-input-box">
            <label for="username">Detail</label>
            <input type="text"
                    id="username"
                    name="detail"
                    placeholder="Enter Detail"/>
          </div>
          
          <div class="user-input-box">
            <label for="username">Location</label>
            <input type="text"
                    id="username"
                    name="location"
                    placeholder="Enter Location"/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Select Image</span>
          <div class="gender-category">
        
          <input type="file" name="image" id="file">
        
        </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" name="btn" value="Add">
        </div>
      </form>
    </div>

</div>

  </body>
</html>