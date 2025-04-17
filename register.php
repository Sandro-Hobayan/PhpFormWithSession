<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .registerContainer {
      width: 300px;
      height: 400px;
      background-color: white;
      padding: 50px;
      padding-top: 10px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    label {
      display: block;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 280px;
      padding: 10px;
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
      margin-top: 30px;
      margin-left: 10px;
    }    
  </style>
<body>
  <div class="registerContainer">
    <h2>Register Form</h2>
  <form action="" method="post">

    <?php
      include 'conn.php';
      if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

          $chkemail = mysqli_query($conn, "select * from users where  email = '$email'");
          if(mysqli_num_rows($chkemail)>0){
            echo '<script type="text/javascript">';
            echo 'alert("Email is already use!");';
            echo 'window.location.href = "register.php";';
            echo '</script>';
          }
          else{
            $query = $conn->prepare("INSERT INTO users (username, email, pasword) values(?,?,?)");
            $query->bind_param("sss", $username, $email, $password);
            $query->execute();
            
            echo '<script type="text/javascript">';
            echo 'alert("Successfully registered!");';
            echo 'window.location.href = "loginpage.php";';
            echo '</script>';
            $query->close();
            $conn->close();}
          
      }
    ?>

    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Register</button>
  </form>
  <p>Already have an account? <a href="loginpage.php">Login here</a></p>
  </div>
</body>
</html>