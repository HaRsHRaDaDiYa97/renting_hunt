
<html>
<head>

<style>
@import url("https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Work+Sans:wght@400;500;600;700&display=swap");
*{
    margin:0;
    padding:0;
    box-sizing:boder-box;
}
html,body{
    height:100%;
    width:100%;
}
.main2{
    width:100%;
    display: flex;
    align-items:center;
    justify-content:center;
    margin-top:5rem;
    background-color:black;
}
.center{height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;

}
.form{

    border:1px solid black;
}

.container {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;

}

.input #nm{
    width:100%;
}

.card {
  margin: 20px;
  position: relative;
  width: 300px;
  background-color: whitesmoke;
  border-radius: 15px;
}

.image {
  height: 250px;
  width: 100%;
}

.image #img {
  height: 100%;
  width: 100%;
  background-position: center;
  background-size: cover;
  object-fit: cover;
  border-radius: 15px;
}

.con {
  margin-top: 15px;
  margin-left: 20px;
  width: 100%;
  margin-bottom:20px;
}
.i{
    position: absolute;
    top: 2%;
    background-color: white;
    right: 2%;
    color:red;
    font-size: 2rem;
    border-radius: 50%;
    padding: 5px;
}
.a{
    text-decoration: none;
    color: green;
    font-size: 25px;
}

</style>



</head>
<body>

<?php
include 'header.php';
?>


<?php 
$conn = mysqli_connect("localhost", "root", "", "rentinghunt");

// Query to fetch all product data, including the file
$sql = "SELECT * FROM detail";
$result = mysqli_query($conn, $sql) or die("Error fetching data");

if (mysqli_num_rows($result) > 0) {
?>

<div class="main2">
    <div class="container">
        <?php
        // Loop through each product in the result set
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <div class="image">
                    <?php if (isset($row['file']) && !empty($row['file'])) { ?>
                        <!-- Display the product image -->
                        <img src="assets/<?php echo htmlspecialchars($row['file']); ?>" alt="Product Image" id="img">
                    <?php } else { ?>
                        <!-- Fallback if no image is available -->
                        <p>No image available</p>
                    <?php } ?>
                </div>

                <div class="con">
                    <h1>Rs. <?php echo htmlspecialchars($row['price']); ?></h1>
                    <h3><?php echo htmlspecialchars($row['detail']); ?></h3>
                    <h3>Location: <?php echo htmlspecialchars($row['location']); ?></h3>
                    <i class="ri-heart-line i"></i>
                    <a class='a' href='client.php?id=<?php echo $row['id']; ?>'>Details</a>
                  </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php 
} else {
    echo "No products found.";
}
?>


<?php
include 'footer.php';
?>


</body>
</html>

