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


/*for logout popup*/
.popup{
  width: 250px;
  background: rgba( 255, 255, 255, 0.15 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 12.5px );
  -webkit-backdrop-filter: blur( 12.5px );
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );
  position: fixed;
  top: 0;
  left: 90%;
  transform: translate(-50%, -50%) scale(0.1);
  text-align: center;
  padding: 0 30px 30px;
  color: #333;
  visibility: hidden;
  transition: transform 0.4s, top 0.4s;
}

.open-popup{
  visibility: visible;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%) scale(1);
}

.popup h2{
  font-size: 38px;
  font-weight: 500;
  margin: 30px 0 10px;
}

.popup p{
  font-size: 18px;
  line-height: 20px;
  margin: 0 0 30px;
}

.popup a{
  text-decoration: none;
}

.popup button{
  width: 250px;
  margin-top: 10px;
  padding: 10px 0;
  background: #333;
  color: #fff;
  border: 0;
  display: flex;
  justify-content: center;
  outline: none;
  font-size: 18px;
  border-radius: 4px;
  cursor: pointer;
   box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}




.grid-container {
    display: grid;
    grid-template-areas:
        "nav nav"
        "side body";
    grid-template-rows: 1fr 10fr;
    grid-template-columns: 1fr 2fr;
    height: 100vh;

    

.nav {
    grid-area: nav;
    background-color:rgb(221, 221, 221);
    padding: 10px;
  }
}

.side {
    grid-area: side;
    background-color:rgb(221, 221, 221);
    padding: 10px;
}

.body {
    grid-area: body;
    background-color:rgb(221, 221, 221);
    padding: 10px;
}




/*for navigation bar*/
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
    border: #333 solid 2px; 
}

.profile img {
    border-radius: 50%;
    border: #333 solid 2px;
}




/* Wall section styles */
.wall{
  background-color: #f0f0f0;
    padding: 10px 20px;
    border-radius: 8px;
    text-align: center;
    border: #333 solid 2px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

.createContent {
    background-color: #f0f0f0;
    padding: 0 10px;
    border-radius: 8px;
    text-align: left;
    border: #333 solid 2px;
}

form{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
}

.form-group{
  display: flex;
  align-items: center;
  justify-content: space-between;
}

textarea{
  margin-right: 10px;
  width: 500px;
}

button[type="submit"] {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}



.everycontent{
  background-color: #f0f0f0;
    padding: 10px;
    border-radius: 8px;
    text-align: left;
    border: #333 solid 1px;
}

.everycontent .post{
  background-color: #fff;
    padding: 10px;
    border-radius: 8px;
    margin: 10px 0;
    border: #333 solid 1px;
}
</style>
<body>
<!-- Logout popup-->
<div class="LogoutContainer">
              <div class="popup" id="popup">
                <h2>Logout</h2>
                <p>Are you sure you want to logout?</p>
                <form method="POST" action="">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit">Yes</button>
                </form>
                <?php
                  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
                    session_destroy();
                    echo '<script type="text/javascript">';
                    echo 'window.location.href = "login.php";';
                    echo '</script>';
                    exit();
                  }
                  ?>
                <button onclick="closePopup()">No</button>
            </div>
</div>
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
                    echo "<h1>Logged in as Guest</h1>";
                  }
                  ?>
            </div>
        </div>
        <div class="body">
          <div class="wall" style="overflow-y: auto; max-height: calc(100vh - 100px);">
            <div class="createContent">
            <form action="" method="POST">
              <h2>Share your thoughts with the world!</h2>
              <div class="form-group">
              <textarea id="content" name="content" rows="3" cols="50" placeholder="What's on your mind <?php
          if (isset($_SESSION['username'])) {
          echo htmlspecialchars($_SESSION['username']) . "?";
          } else {
          echo "Welcome, Guest!";
          }
          ?>" required></textarea>
              <button type="submit">Post</button>
              </div>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
              include 'conn.php';

              $content = $conn->real_escape_string($_POST['content']);
              $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

              if ($userId) {
              $sql = "INSERT INTO user_content (user_id, content, created_at) VALUES ('$userId', '$content', NOW())";
              if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Post shared successfully!');</script>";
              } else {
          echo "<script>alert('Error: " . $conn->error . "');</script>";
              }
              } else {
              echo "<script>alert('You must be logged in to post.');</script>";
              }
            }
            ?>
          </div>
            <div class="everycontent">
              <?php
              include 'conn.php';
              $sql = "SELECT users.username, user_content.content, user_content.created_at
              FROM users
              JOIN user_content ON users.id = user_content.user_id
              ORDER BY user_content.created_at DESC";
              $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h3>" . htmlspecialchars($row['username']) . "</h3>";
            echo "<small>Posted on " . htmlspecialchars($row['created_at']) . "</small>";
            echo "<p>" . htmlspecialchars($row['content']) . "</p>";
            echo "</div>";
              }
          } else {
              echo "<div class='post'><p>No posts available. Be the first to share your thoughts!</p></div>";
          }
          ?>
            </div>
          </div>
        </div>
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>

let popup = document.getElementById("popup");

    function openPopup(){
      popup.classList.add("open-popup");
    }
    function closePopup(){
      popup.classList.remove("open-popup");
    }

</script>

</html>
