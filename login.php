<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      width: 300px;
      height: 400px;
      background-color: white;
      padding: 50px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="email"],
    input[type="password"] {
      width: 280px;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #28a745;
      color: white;
      margin-left: 120px;
      padding: 10px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
    p {
      margin-top: 130px;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
  <form action="" method="POST">

    <?php
      include 'conn.php';
      if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pasword = '$password'");
        if(mysqli_num_rows($query) > 0){
          $row = mysqli_fetch_assoc($query);
          session_start();
          $_SESSION['username'] = $row['username'];

          echo '<script type="text/javascript">';
            echo 'alert("Welcome, ' . $row['username'] . '!");';
          echo 'window.location.href = "home.php";';
          echo '</script>';
        } else {
          echo '<script type="text/javascript">';
          echo 'alert("Invalid username or password!");';
          echo 'window.location.href = "login.php";';
          echo '</script>';
        }
      }
    ?>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">Login</button>
  </form>
  <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>
</body>
</html>