<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
</head>
<body>
  <?php
  session_start();
  if (isset($_SESSION['username'])) {
    echo "<h1>" . htmlspecialchars($_SESSION['username']) . "</h1>";
  } else {
    echo "<h1>Welcome, Guest!</h1>";
  }
  ?>
  <form method="post" action="">
    <button type="submit" name="logout">Logout</button>
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
  }
  ?>
  <div class="proContainer">
    <image
  </div>
</body>
</html>