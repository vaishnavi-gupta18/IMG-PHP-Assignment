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
    $showAlert = false; 
    $showError = false; 
    $exists=false;
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


    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if($num == 0) {
      if(($password == $cpassword) && $exists==false)
    {
    $sql = "INSERT INTO vaishnavi_users (user, email, pass) VALUES ('" . $username . "','" . $email . "','" . $password . "')";

    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Signed up successfully! Log in to continue.";
      header("location: index.html");
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
