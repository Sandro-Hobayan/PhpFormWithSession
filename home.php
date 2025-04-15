<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.grid-container {
    display: grid;
    grid-template-areas:
        "nav nav"
        "side body";
    grid-template-rows: 1fr 10fr;
    grid-template-columns: 1fr 2fr;
    height: 100vh; /* Full screen height */
}

.nav {
    grid-area: nav;
    background-color: #FFD700; /* Gold color */
    padding: 10px;
}

.side {
    grid-area: side;
    background-color: #87CEFA; /* Light blue color */
    padding: 10px;
}

.body {
    grid-area: body;
    background-color: #98FB98; /* Pale green color */
    padding: 10px;
}

















nav {
  background-color: #333;
  border-radius: 8px;
  display: flex;
  flex-direction: row-reverse;
  padding: 5px;
}

    .nav-menu {
  list-style: none;
  display: flex;
  padding: 5px;
}

.nav-menu li {
  position: relative;
  margin-right: 5px;
}

.nav-menu a {
  color: white;
  text-decoration: none;
  padding: 0 10px;
  display: block;
}

.nav-menu 

.nav-menu a:hover {
  background-color: #333;
  border-radius: 5px;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #444;
  top: 100%;
  left: -200%;
  min-width: 130px;
  border-radius: 5px;
  list-style: none;
}

.dropdown-menu li {
  margin: 0;
}

.dropdown-menu a {
  padding: 10px 20px;
  white-space: nowrap;
}

.dropdown-menu a:hover {
  background-color: #555;
}

/* Show dropdown on hover */
.dropdown:hover .dropdown-menu {
  display: block;
}



/* Profile section styles */
.profile {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
}

.profile img {
    border-radius: 50%;
    border: #333 solid 1px;
}
</style>
<body>
    <div class="grid-container">
        <div class="nav">
            <nav>
                <ul class="nav-menu">
                  <li><a href="#"><ion-icon name="home-sharp" size="large"></ion-icon></a></li>
                  <li><a href="#" ><ion-icon name="people-sharp" size="large"></ion-icon></a></li>
                  <li class="dropdown">
                    <a href="#"><ion-icon name="menu-sharp" size="large"></ion-icon></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Settings</a></li>
                      <li><a href="#" onclick="openPopup()">Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
        </div>
        <div class="side">
            <div class="profile">
                <img src="images/profile.svg" alt="Profile Picture" width="100" height="100">
                <?php
                  if (isset($_SESSION['username'])) {
                    echo "<h1>" . htmlspecialchars($_SESSION['username']) . "</h1>";
                  } else {
                    echo "<h1>Welcome, Guest!</h1>";
                  }
                  ?>
            </div>
        </div>
        <div class="body"></div>
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
