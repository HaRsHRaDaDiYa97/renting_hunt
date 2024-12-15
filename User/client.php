<html>
<head>

<style>

*{
    padding:0;
    margin:0;
    box-sizing:border-box;
    font-family:domain;
    
}
body{
    background-color:black;
   
}
.main{
    height:100%;
    width:100%;
    display:flex;
    align-items:center;
    background-color:black;
    justify-content:center;
    margin-top:2rem;
    margin-bottom:2rem;
}
.content{
    width: 90%;
    background-color:;
    margin-top:2rem;
    margin-bottom:2rem;
}
.one{
    height: 100%;
    width: 60%;
    border: 1px soild black;
    background-color:;
}
.two{
    height: 100%;
    width: 40%;
    border: 1px soild black;
    background-color:;
    display: flex;
    flex-direction:column;
    align-items: center;
    justify-content: center;
}
.top{
    height: 70%;
    width: 100%;
    display: flex;

}
.bone{
    height: 100%;
    width: 50%;
    border: 1px soild black;
    margin-top:20px;
    background-color: #FFFFFF;
    padding: 20px;
}
.btwo{
    height: 100%;
    width: 50%;
    border: 1px soild black;
    background-color:;
}
.bottom{
        width: 100%;
    display: flex;

}
#img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    background-position: center;
}
.price{
    width: 90%;
    height:50%;
    padding: 20px;
    background-color: #FFFFFF;
}
.contact{
    width: 90%;
    height: 50%;
    margin-top: 20px;
    background-color: #FFFFFF;
    padding: 20px;
}
.price h1{
    font-size: ;
    
}
hr{
    margin-top: 10px;
    margin-bottom: 10px;
}

</style>

</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "rentinghunt";  
$conn = new mysqli($servername, $username, $password, $db_name,);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
echo "";

$id="";
  $name="";
  $email="";
  $phone="";
$price="";
$detail="";
$location="";

  $error="";
  $success="";
  $id = $_GET['id'] ?? null; // Use null coalescing to avoid undefined variable error
  if (!$id) {
      header("location: index.php");
      exit;
  }
  
  // Prepare the SQL statement to prevent SQL syntax issues and injection
  $stmt = $conn->prepare("SELECT * FROM detail WHERE id = ?");
  $stmt->bind_param("i", $id); // 'i' specifies that $id is an integer
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $name = $row["name"];
      $email = $row["email"];
      $phone = $row["phone"];
      $price = $row["price"];
      $detail = $row["detail"];
      $location = $row["location"];
  } else {
      echo "Record not found or query error: " . $conn->error;
      exit;
  }
  
  if(isset($_POST['submit'])){
    header("location: index.php");
  }
?>



<div class="main">
     
<div class="content">

<div class="top">
<div class="one">
<?php if (isset($row['file']) && !empty($row['file'])) { ?>
                        <!-- Display the product image -->
                        <img src="assets\<?php echo htmlspecialchars($row['file']); ?>" alt="Product Image" id="img">
                    <?php } else { ?>
                        <!-- Fallback if no image is available -->
                        <p>No image available</p>
                    <?php } ?>
     </div>
<div class="two">
    <div class="price">
    <h1>Price :- <?php echo $price; ?></h1>
    <hr>
    <h1>Name :- <?php echo $name; ?></h1>
    </div>

    <div class="contact">
    <h1>Phone No. :- <?php echo $phone; ?></h1>
    <hr>
    <h1>Email :- <?php echo $email; ?></h1>    
    </div>
</div>
</div>

<div class="bottom">
    <div class="bone">
    <h1>Detail :- <br><?php echo $detail; ?></h1>
    <hr>
    <h1>Location :- <br> <?php echo $location; ?></h1>

    </div>
    <div class="btwo"></div>
</div>

</div>

</div>


</body>
</html>
