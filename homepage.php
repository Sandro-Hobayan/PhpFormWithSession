<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
  font-family: Arial, sans-serif;
  }

    header{
    position: relative;
    background-color:rgb(255, 255, 255);
    top: 0;
    left: 0;
    width: 100%;
    height: 70px;
    padding: 20px 90px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
    }

    nav {
  background-color: #333;
  border-radius: 8px;
  display: flex;
  flex-direction: row-reverse;
  padding-left: 1500px;
  padding-top: 10px;
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

.nav-menu a:hover {
  background-color: #333;
  border-radius: 5px;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background-color: #444;
  top: 100%;
  left: 0;
  min-width: 160px;
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







.popup{
  width: 400p;
  background: rgba( 255, 255, 255, 0.15 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 12.5px );
  -webkit-backdrop-filter: blur( 12.5px );
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );
  position: fixed;
  top: 20%;
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
  outline: none;
  font-size: 18px;
  border-radius: 4px;
  cursor: pointer;
   box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}

.profileContianer{

}
  </style>
</head>
<body>
  <?php
  session_start();
  ?>
  
<header>
        <nav>
            <ul class="nav-menu">
              <li><a href="#">Home</a></li>
              <li><a href="profile.php" id="aboutButton">Friends</a></li>
              <li class="dropdown">
                <a href="#">Menu</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Settings</a></li>
                  <li><a href="#" onclick="openPopup()">Logout</a></li>
                </ul>
              </li>
            </ul>
          </nav>
  </header>
  <main>
    <!-- Logout popup-->
  <div class="LogoutContainer">
            <div class="popup" id="popup">
                <h2>Logout</h2>
                <p>Are you sure you want to logout?</p>
                <form method="POST" action="homepage.php">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit">Yes</button>
                </form>
                <?php
                  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
                    session_destroy();
                    header("Location: login.php");
                    exit();
                  }
                  ?>
                <button onclick="closePopup()">No</button>
            </div>
        </div>
<!--profile popup-->
  <div class="profileContianer" id="profileContainer">
    <div class="Profile" id="profile">
      <img src="images/2x2.jpg" class="rounded-circle" alt="Cinque Terre" width="230" height="230"> 

      <?php
      if (isset($_SESSION['username'])) {
        echo "<h1>" . htmlspecialchars($_SESSION['username']) . "</h1>";
      } else {
        echo "<h1>Welcome, Guest!</h1>";
      }
      ?>
    </div>
  </div>      
        
    <div class="grid">

    </div>

  </main>





  
</body>
<script>

let popup = document.getElementById("popup");

    function openPopup(){
      popup.classList.add("open-popup");
    }
    function closePopup(){
      popup.classList.remove("open-popup");
    }

    let popupProfile = document.getElementById("ProfileContainer");

function openProfile(){
  popupProfile.classList.add("open-profile");
}
function closeProfile(){
  popupProfile.classList.remove("open-profile");
}

</script>
</html>