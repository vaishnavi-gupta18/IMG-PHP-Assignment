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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $valid=$fuserErr=$femailErr=$fpasswordErr=$fcpasswordErr='';
    $validemail="/^[\w]+([\w_\-\.]+)@([\w_\-\.]+)\.([a-zA-Z]{2,4})$/";
    $validpassword="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
    if(empty($username)){
      $fuserErr="Username is Required";
    }
    else{
      $fuserErr=1;
    }
    if(empty($email)){
      $femailErr="Email is Required";
    }
    else if (!preg_match($validemail,$email)) {
      $femailErr="Invalid Email Address";
    }
    else{
      $femailErr=1;
    }
    if(empty($password)){
      $fpasswordErr="Password is Required";
    }
    else if (!preg_match($validpassword,$password)) {
      $fpasswordErr="Password must contain at least one lowercase character, one uppercase character, one digit, one special character, and a length between 8 to 20";
    }
    else{
      $fpasswordErr=1;
    }
    if($cpassword!=$password){
      $fcpasswordErr="Confirm Password does not Match";
   }
   else{
      $fcpasswordErr=1;
   }
   if($fuserErr=='1' && $femailErr=='1' && $fpasswordErr=='1' && $fcpasswordErr=='1' )
  {
   $valid=1;
  }
  if($valid=='1'){

    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $cpassword = test_input($_POST['cpassword']);


    $sql = "SELECT  * FROM vaishnavi_users WHERE user='" . $username . "'";
    $sqle="SELECT  * FROM vaishnavi_users WHERE email='" . $email . "'";

    $result = mysqli_query($conn, $sql);
    $resulte = mysqli_query($conn, $sqle);
    $sqlp = "INSERT INTO vaishnavi_profile ( user, fullname, about, phone, city, hobbies, photo,chck) VALUES ('" . $username . "','','','','','','','0')";
    $num = mysqli_num_rows($result);
    $nume = mysqli_num_rows($resulte);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if($num == 0 && $nume == 0) {
      if(($password == $cpassword) && $exists==false)
    {
      $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO vaishnavi_users (user, email, pass) VALUES ('" . $username . "','" . $email . "','" . $hash . "')";

    if (mysqli_query($conn, $sql)) {

      if(mysqli_query($conn,$sqlp)){
        echo "<script>alert('Signed up successfully! Log in to continue')</script>";
      header("location: index.php");
      } }}
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
  }}
?>