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
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['username'] = $row['username'];

          echo '<script type="text/javascript">';
            echo 'alert("Welcome, ' . $row['username'] . '!");';
          echo 'window.location.href = "homepage.php";';
          echo '</script>';
        } else {
          echo '<script type="text/javascript">';
          echo 'alert("Invalid username or password!");';
          echo 'window.location.href = "loginpage.php";';
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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>