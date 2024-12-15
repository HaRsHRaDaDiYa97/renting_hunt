<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Profile Dropdown</title>

<style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap");
:root {
  --primary: #eeeeee;
  --secondary: #227c70;
  --green: #82cd47;
  --secondary-light: rgb(34, 124, 112, 0.2);
  --secondary-light-2: rgb(127, 183, 126, 0.1);
  --white: #fff;
  --black: #393e46;

  --shadow: 0px 2px 8px 0px var(--secondary-light);
}

* {
  margin: 0;
  padding: 0;
  list-style-type: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  height: 100vh;
  width: 100%;
  background-color: var(--primary);
}


.profile-dropdown {
  position: relative;
  width: fit-content;
}

.profile-dropdown-btn {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-right: 1rem;
  font-size: 0.9rem;
  font-weight: 500;
  width: 150px;
  border-radius: 50px;
  color: white;
  /* background-color: white;
  box-shadow: var(--shadow); */

  cursor: pointer;
  border: 2px solid white;
  transition: box-shadow 0.2s ease-in, background-color 0.2s ease-in,
    border 0.3s;
}

.profile-dropdown-btn:hover {
  background-color: var(--secondary-light-2);
  box-shadow: var(--shadow);
}

.profile-img {
  position: relative;
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  background: url(./assets/profile-pic.jpg);
  background-size: cover;
}

.profile-img i {
  position: absolute;
  right: 0;
  bottom: 0.3rem;
  font-size: 0.5rem;
  color: var(--green);
}

.profile-dropdown-btn span {
  margin: 0 0.5rem;
  margin-right: 0;
}

.profile-dropdown-list {
  position: absolute;
  top: 68px;
  width: 220px;
  right: 0;
  background-color: var(--white);
  border-radius: 10px;
  max-height: 0;
  overflow: hidden;
  box-shadow: var(--shadow);
  transition: max-height 0.5s;
}

.profile-dropdown-list hr {
  border: 1px solid black;
}

.profile-dropdown-list.active {
  max-height: 500px;
}

.profile-dropdown-list-item {
  padding: 0.5rem 0rem 0.5rem 1rem;
  transition: background-color 0.2s ease-in, padding-left 0.2s;
}

.profile-dropdown-list-item a {
  display: flex;
  align-items: center;
  text-decoration: none;
  font-size: 0.9rem;
  font-weight: 500;
  color: black;
}

.profile-dropdown-list-item a i {
  margin-right: 0.8rem;
  font-size: 1.1rem;
  width: 2.3rem;
  height: 2.3rem;
  background-color:black;
  color: var(--white);
  line-height: 2.3rem;
  text-align: center;
  margin-right: 1rem;
  border-radius: 50%;
  transition: margin-right 0.3s;
}

.profile-dropdown-list-item:hover {
  padding-left: 1.5rem;
  background-color: var(--secondary-light);
}

</style>

  </head>
  <body>
 
  <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="profile-img">
           </div>

          <span>
          <?php

// Query to select the admin username
$sql = "SELECT admin_username FROM admin LIMIT 1";  // Use LIMIT 1 to make sure only one result is fetched
$res = mysqli_query($conn, $sql);

// Check if the query returned any result
if (mysqli_num_rows($res) == 1) {
  
    // Fetch the admin username from the result
    $row = mysqli_fetch_assoc($res);

    // Store the admin username in session
    $_SESSION['admin'] = $row['admin_username'];

    // Display the session username
    echo $_SESSION['admin'];
} else {
    echo "No admin found.";
}
?>

          </span>
        </div>

        <ul class="profile-dropdown-list">
          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-user"></i>
              Edit Profile
            </a>
          </li>

          <hr />

          <li class="profile-dropdown-list-item">
            <a href="logout.php">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Log out
            </a>
          </li>
        </ul>
  
    <script src="script.js"></script>
  </body>
</html>