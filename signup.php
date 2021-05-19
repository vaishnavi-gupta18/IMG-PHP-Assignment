<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <script src="Js/script.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="head"><h1>SIGN UP</h1></div>
            <form name="signup" action='signup.php' id="form" method="post" onsubmit="return validate()">
                <div class="form">
                    <div class="item" id="fusername">
                        <label for="username">Username :</label>
                        <input id="username" name="username" oninput="user_val()"> 
                        <div class="ferror"></div>
                    </div>
                <div class="item" id="femail">
                    <label for="email">Email :</label>
                    <input id="email" name="email" oninput='email_val()'>
                    <div class="ferror"></div>
                </div>
                <div class="item" id="fpassword">
                    <label for="password">Password :</label>
                    <input id="password" name="password" type="password" oninput="pass_val()">
                    <div class="ferror"></div>
                </div>
                <div class="item" id="fcpassword">
                    <label for="cpassword">Confirm Password :</label>
                    <input id="cpassword" name="cpassword" type="password" oninput="cpass_val()">
                    <div class="ferror"></div>
                </div>
                <div>
                    <input type="submit" value="Sign Up"  id="btn">
            </div>
                <div class="item">
                   <div> Already have an account? <a href="index.php">Login here</a></div>
                </div></div>
            </form>
        </div>
    </div>

</body>
</html>

<?php 
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
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $cpassword = test_input($_POST['cpassword']);

    $sql = "SELECT  * FROM vaishnavi_users WHERE user='" . $username . "'";
    $sqle="SELECT  * FROM vaishnavi_users WHERE email='" . $email . "'";
    
    $result = mysqli_query($conn, $sql);
    $resulte = mysqli_query($conn, $sqle);
    
    $num = mysqli_num_rows($result); 
    $nume = mysqli_num_rows($resulte); 
    echo "<script>alert('" . $num . "')</script>";

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    if($num == 0 && $nume == 0) {
      if(($password == $cpassword) && $exists==false)
    {
      $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO vaishnavi_users (user, email, pass) VALUES ('" . $username . "','" . $email . "','" . $hash . "')";

    if (mysqli_query($conn, $sql)) {
      
      $sqlc = "INSERT INTO vaishnavi_check (user, chck) VALUES ('" . $username . "', '0')";
      if(mysqli_query($conn, $sqlc)){
        echo "<script>alert('Signed up successfully! Log in to continue')</script>";
      }
      header("location: index.php");
      } }
    else {
      echo "<script>alert('Confirmed password do not match')</script>";
    }
    }
    if($nume>0)
    {
      echo "<script>alert('User already registered')</script>";
    }
    else if($num>0)
    {
        echo "<script>alert('Username already taken')</script>";
    }
    mysqli_close($conn);
  }
?>
