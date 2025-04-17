<?php
session_start();
include 'conn.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $query = "SELECT cover FROM profile WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['cover_photo'] = $row['cover'];
    }
    $stmt->close();
}
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
  visibility: visible !important;
  top: 40% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) scale(1) !important;
  z-index: 1000;;
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


/*for profile popup*/
.profilecontainer{
  width: 650px;
  background: rgba( 255, 255, 255, 0.15 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 12.5px );
  -webkit-backdrop-filter: blur( 12.5px );
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );
  position: fixed;
  top: 0;
  left: 50%;
  transform: translate(-50%, -50%) scale(0.1);
  text-align: center;
  visibility: hidden;
  padding: 10px;
  border: #333 solid 2px;
  transition: transform 0.4s, top 0.4s;
}

.open-profilecontainer {
  visibility: visible !important;
  top: 40% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) scale(1) !important;
  z-index: 1000;
}

.profilecontainer #closebtn{
  position: absolute;
  top: 0;
  right: 0;
  background-color: #333;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  overflow: hidden;
  border-radius: 0px 8px 0px 8px;
}

.profilecontainer #coverbtn{
  position: absolute;
  top: 51%;
  right: 8px;
  background-color: #333;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  overflow: hidden;
  border-radius: 8px 0px 8px 0px;
}




/*for cover photo preview*/
.coverpreview{
  width: 850px;
  height: auto;
  background: rgba( 255, 255, 255, 0.15 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 12.5px );
  -webkit-backdrop-filter: blur( 12.5px );
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );
  position: fixed;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0.1);
  text-align: center;
  visibility: hidden;
  padding: 10px;
  border: #333 solid 2px;
  transition: transform 0.4s, top 0.4s;
}

.open-coverpreview{
  visibility: visible !important;
  top: 30% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) scale(1) !important;
  z-index: 1001;
}

.coverpreview #delete{
  position: absolute;
  top: 0;
  left: 0;
  background-color: #333;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  overflow: hidden;
  border-radius: 8px 0px 8px 0px;
}

.coverpreview #closebtn{
  position: absolute;
  top: 0;
  right: 0;
  background-color: #333;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  overflow: hidden;
  border-radius: 0px 8px 0px 8px;
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

.profileAndCover {
    border-radius: 10px;
    margin-bottom: 0;
}

.profileAndCover #cover {
    border-radius: 8px 8px 8px 8px;
    background: #888;
    width: 100%; 
    height: 200px;
    border: #333 solid 2px;
}

.profileAndCover #profile {
    border-radius: 50%;
    border: #333 solid 2px;
    margin-top: -50px;
    z-index: 1;
    background: #888;
}

.profile .userButton button{
    background-color: #333;
    color: white;
    padding: 8px 13px;
    cursor: pointer;
    margin: 10px 5px 0 5px;
    border-radius: 5px;
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
                    echo 'window.location.href = "loginpage.php";';
                    echo '</script>';
                    exit();
                  }
                  ?>
                <button onclick="closePopup()">No</button>
            </div>
</div>

<!-- profile popup -->
 <div class="profilecontainer" id="profilecontainer">
 <button id="closebtn" onclick="closeProfile()">X</button>
      <div class="profileAndCover">
                <button id="coverbtn" onclick="openCoverPreview()">Change Cover Photo</button>
  
                <?php
                  $coverPhoto = isset($_SESSION['cover_photo']) ? $_SESSION['cover_photo'] : 'images/defaultbg.png';
                  $profilePhoto = isset($_SESSION['profile_photo']) ? $_SESSION['profile_photo'] : 'images/defaultprofile.png';
                ?>
                <img src="<?php echo htmlspecialchars($coverPhoto); ?>" alt="Cover photo" width="100%" height="200px" id="cover">
                <img src="<?php echo htmlspecialchars($profilePhoto); ?>" alt="Profile Picture" width="100" height="100" id="profile">
                
      </div>
                <?php
                  if (isset($_SESSION['username'])) {
                    echo "<h1>" . htmlspecialchars($_SESSION['username']) . "</h1>";
                  } else {
                    echo "<h1>Logged in as Guest</h1>";
                  }
                  ?>
 </div>


<!-- Cover photo preview -->
 <div class="coverpreview" id="coverpreview">
<form method="POST">
  <button type="submit" name="delete_cover" id="delete">Delete</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_cover'])) {
  include 'conn.php';

  $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

  if ($userId) {
    $defaultCover = 'images/defaultbg.png';

    $updateQuery = "UPDATE profile SET cover = ? WHERE user_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $defaultCover, $userId);

    if ($stmt->execute()) {
      $_SESSION['cover_photo'] = $defaultCover;
      echo "<script>
        alert('Cover photo deleted successfully!');
        document.getElementById('cover').src = '$defaultCover';
        document.querySelector('.coverpreview img').src = '$defaultCover';
      </script>";
    } else {
      echo "<script>alert('Database error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
  } else {
    echo "<script>alert('You must be logged in to delete your cover photo.');</script>";
  }
}
?>
    <button id="closebtn" onclick="closeCoverPreviewAndReset()">X</button>
    <script>
      function closeCoverPreviewAndReset() {
        const coverPreview = document.querySelector('.coverpreview img');
        coverPreview.src = "<?php echo htmlspecialchars($coverPhoto); ?>"; // Reset to default or current cover photo
        closeCoverPreview();
      }
    </script>
    <img src="<?php echo htmlspecialchars($coverPhoto ?: 'images/defaultbg.png'); ?>" alt="Cover photo" id="cover" width="100%" height="200px">

    <form action="" method="POST" enctype="multipart/form-data">
      <input type="file" name="cover_photo" accept="image/*" onchange="previewCoverPhoto(event)">
      <script>
      function previewCoverPhoto(event) {
      const coverPreview = document.querySelector('.coverpreview img');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
        coverPreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
      }
      </script>
      <button type="submit" name="upload_cover">Upload</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_cover'])) {
      include 'conn.php';

      if (isset($_FILES['cover_photo']) && $_FILES['cover_photo']['error'] === UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES['cover_photo']['tmp_name'];
      $fileName = $_FILES['cover_photo']['name'];
      $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

      if (in_array(strtolower($fileExtension), $allowedExtensions)) {
        $newFileName = uniqid() . '.' . $fileExtension;
        $uploadPath = 'uploads/' . $newFileName;

        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        if ($userId) {
          $checkProfileQuery = "SELECT * FROM profile WHERE user_id = ?";
          $stmt = $conn->prepare($checkProfileQuery);
          $stmt->bind_param("i", $userId);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
          $updateQuery = "UPDATE profile SET cover = ? WHERE user_id = ?";
          $stmt = $conn->prepare($updateQuery);
          $stmt->bind_param("si", $uploadPath, $userId);
          } else {
          $insertQuery = "INSERT INTO profile (user_id, cover) VALUES (?, ?)";
          $stmt = $conn->prepare($insertQuery);
          $stmt->bind_param("is", $userId, $uploadPath);
          }

          if ($stmt->execute()) {
          $_SESSION['cover_photo'] = $uploadPath;
          echo "<script>
              alert('Cover photo updated successfully!');
              document.getElementById('cover').src = '$uploadPath';
              document.querySelector('.coverpreview img').src = '$uploadPath';
              </script>";
          } else {
          echo "<script>alert('Database error: " . $stmt->error . "');</script>";
          }
          $stmt->close();
        } else {
          echo "<script>alert('You must be logged in to update your cover photo.');</script>";
        }
        } else {
        echo "<script>alert('Error uploading the file.');</script>";
        }
      } else {
        echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
      }
      } else {
      echo "<script>alert('No file uploaded or an error occurred.');</script>";
      }
    }
    ?>
  </div>


    <div class="grid-container">
        <div class="nav">
            <nav>
                <ul class="nav-menu">
                    <li><a href="refresh.php"><ion-icon name="home-sharp" size="large"></ion-icon></a></li>
                  <li><a href="#" ><ion-icon name="people-sharp" size="large"></ion-icon></a></li>
                  <li class="dropdown">
                    <a href="#"><ion-icon name="menu-sharp" size="large"></ion-icon></a>
                    <ul class="dropdown-menu">
                        <li>
                        <?php if (isset($_SESSION['username'])): ?>
                          <a href="#" onclick="openProfile()">Profile</a>
                        <?php else: ?>
                          <a href="#" onclick="alert('You must be logged in to view your profile.');">Profile</a>
                        <?php endif; ?>
                        </li>
                      <li><a href="#">Settings</a></li>
                        <li>
                        <?php if (isset($_SESSION['username'])): ?>
                          <a href="#" onclick="openPopup()">Logout</a>
                        <?php else: ?>
                          <a href="loginpage.php">Login</a>
                        <?php endif; ?>
                        </li>
                    </ul>
                  </li>
                </ul>
              </nav>
        </div>
        <div class="side">
            <div class="profile" style="overflow-y: auto; max-height: calc(100vh - 100px);">
                <div class="profileAndCover">
                <?php
                  $coverPhoto = isset($_SESSION['cover_photo']) ? $_SESSION['cover_photo'] : 'images/defaultbg.png';
                  $profilePhoto = isset($_SESSION['profile_photo']) ? $_SESSION['profile_photo'] : 'images/defaultprofile.png';
                ?>
              
                <img src="<?php echo htmlspecialchars($coverPhoto); ?>" alt="Cover photo" width="100%" height="200px" id="cover">

                <img src="<?php echo htmlspecialchars($profilePhoto); ?>" alt="Profile Picture" width="100" height="100" id="profile">
                </div>
                <?php
                  if (isset($_SESSION['username'])) {
                    echo "<h1>" . htmlspecialchars($_SESSION['username']) . "</h1>";
                  } else {
                    echo "<h1>Logged in as Guest</h1>";
                  }
                  ?>
              <?php if (isset($_SESSION['username'])): ?>
                <div class="userButton">
                  <button onclick="openProfile()">profile</button>
                  <button>posts</button>
                  <button>photos</button>
                </div>
              <?php endif; ?>
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
                echo "<script>
                if (confirm('You must be logged in to post. Do you want to go to the login page?')) {
                  window.location.href = 'loginpage.php';
                }
                </script>";
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
  
  let gridContainer = document.querySelector(".grid-container");


  // Logout popup
    let popup = document.getElementById("popup");

    function openPopup(){
      popup.classList.add("open-popup");
      gridContainer.style.filter = "blur(5px)";
    }
    function closePopup(){
      popup.classList.remove("open-popup");
      gridContainer.style.filter = "none";
    }





    let profilepopup = document.getElementById("profilecontainer");

    function openProfile() {
      profilepopup.classList.add("open-profilecontainer");
      gridContainer.style.filter = "blur(5px)";
    }

    function closeProfile() {
      profilepopup.classList.remove("open-profilecontainer");
      gridContainer.style.filter = "none";
    }




    let opencoverpreview = document.getElementById("coverpreview");

    function openCoverPreview() {
      opencoverpreview.classList.add("open-coverpreview");
      gridContainer.style.filter = "blur(5px)";
    }

    function closeCoverPreview() {
      opencoverpreview.classList.remove("open-coverpreview");
    }



    

</script>

</html>
