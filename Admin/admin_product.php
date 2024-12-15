<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<style>


body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #ebfaf9;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
  text-decoration: underline;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  font-size: 36px;
  margin-left: 90px;
}

#main {
  height: 60px;
  transition: margin-left .5s;
  padding: 8px;
  background-color: #f8f9fa;
}

#main a {
  text-decoration: none;
}

#main a:hover {
  text-decoration: underline;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 200px;
  height: 200px;
  perspective: 1000px;
  margin-top: 40px;
  margin-left: 40px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

.main-footer {
  height: 60px;
  transition: margin-left .5s;
  padding: 16px;
  background-color: #f8f9fa;
  margin-bottom:20px;
}

table{
    /* margin-left: 8%; */
   /* margin-top: 4%; */
    text-align: center;
  }

th{
  border: 3px solid gray;
  background-color: black;
  color:white;
  padding:20px;
}

td{
  border: 3px solid gray;
}

.pagination {
  display: inline-block;
  margin-top: 50px;
  margin-left: 450px;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a:hover:not(.active) {
          background-color: #ebfaf9;
}
.table__body{
display: flex;
align-items:center;
justify-content:center;
margin-top:7rem;
}
.btn-success{
  text-decoration: none;
    background-color: greenyellow;
    padding: 10px;
    border-radius: 10px;
    color:black;
}
.btn-danger{
  text-decoration: none;
    background-color: red;
    color:white;
    padding: 10px;
    border-radius: 10px;

}
.m{

}
#img{
  height: 71px;
  width:100%;
}


</style>

</head>

<body>

<?php
include 'header.php';
?>

        <section class="table__body">
                
              <table>
                    <tr>
                        <th> Id </th>
                        <th> IMAGE </th>
                        <th> NAME </th>
                        <th> EMAIL </th>
                        <th> PHONE </th>
                        
                        <th> PRICE </th>
                        <th> DETAIL </th>
                        <th> LOCATION </th>
                        <th> ACTION </th>
                        
                    </tr>
                
                  
                <?php
        
        include 'connection.php';

        $sql = "select * from detail";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        $sid = 1;
        
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
              <th>$sid</th>
              <td>";
      
          if (isset($row['file']) && !empty($row['file'])) {
              echo "<img src='admin_images/" . htmlspecialchars($row['file']) . "' alt='Product Image' id='img'>";
          } else {
              echo "<p>No image available</p>";
          }
      
          echo "</td>
              <td>" . htmlspecialchars($row['name']) . "</td>
              <td>" . htmlspecialchars($row['email']) . "</td>
              <td>" . htmlspecialchars($row['phone']) . "</td>
              <td>" . htmlspecialchars($row['price']) . "</td>
              <td>" . htmlspecialchars($row['detail']) . "</td>
              <td>" . htmlspecialchars($row['location']) . "</td>
             
              <td>
                  <a class='btn btn-success' href='product_edit.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a>
                  <a class='btn btn-danger' href='product_delete.php?id=" . htmlspecialchars($row['id']) . "'>Delete</a>
              </td>
          </tr>";
          
          $sid++;
      }
      
?>      
      
</table>

        </section>
    
</body>

</html>


