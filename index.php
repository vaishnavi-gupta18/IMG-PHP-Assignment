<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <script src="Js/script.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="head"><h1>SIGN IN</h1></div>
            <form name="signup" action='index.php' id="form" method="post" onsubmit="return validate()">
                <div class="form">
                <div class="item" id="fusername">
                    <label for="username">Username :</label>
                    <input id="username" name="username" oninput="user_val()"> 
                    <div class="ferror"></div>
                </div>
                <div class="item" id="fpassword">
                    <label for="password">Password :</label>
                    <input id="password" name="password" type="password" oninput="pass_val()">
                    <div class="ferror"></div>
                </div>
                <div class="item">
                    <input type="submit" value="Sign In" id="btn"></div>
            <div class="item">
                <div>Don't have an account? <a href='signup.html'>Sign Up here</a></div>
            </div></div>
            </form>
        </div>
    </div>

</body>
</html>
<?php

session_start();
include 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

          $username = test_input($_POST['username']);
          $password = test_input($_POST['password']);
          $hash = password_hash($password, PASSWORD_DEFAULT);

          if(isset($username)){
            $sql = "SELECT  * FROM vaishnavi_users WHERE user='" . $username . "' pass='" . $hash . "'";
            $result = mysqli_query($conn, $sql) or die(mysql_error());
            $num = mysqli_num_rows($result); 
            if ($num == 1) {
                $_SESSION['username'] = $username;
                header("location: home.php");
          }
        }
          else 
          echo "<script> pass_wrong(); </script>";
        }

?>