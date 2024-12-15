<!--!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>

<style>

.my-4 {
    margin-top: 6.5rem!important;
    margin-bottom: 1.5rem!important;
}

dl, ol, ul {
     margin-top: 0px; 
     margin-bottom: 0px;
}
ol, ul {
     padding-left: 0px;
}


</style>

  </head>
  <body>



    <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <!-?php
        include "connection.php";
        $sql = "select * from user";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[user_id]</th>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[cpassword]</td>
        <td>
                  <a class='btn btn-success' href='edit.php?id=$row[user_id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[user_id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html-->


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
  width: 80%;
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


</style>

</head>

<body>
        <section class="table__body">
                
              <table>
                    <tr>
                        <th> Id </th>
                        <th> NAME </th>
                        <th> EMAIL </th>
                        <th> PASSWORD </th>
                        <th> ACTION </th>
                        
                    </tr>
                
                  
                <?php
        include "connection.php";
        $sql = "select * from user";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        $sid = 1;
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$sid</th>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[cpassword]</td>
        <td>
                  <a class='btn btn-success' href='edit.php?id=$row[user_id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[user_id]'>Delete</a>
                </td>
      </tr>
      ";
      $sid++;
        }
      ?>
      
</table>

        </section>
    
</body>

</html>


