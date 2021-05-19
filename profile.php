<?php
include("auth_session.php");
session_start();
echo "<script>alert)'" . $_SESSION['username'] . "')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile page</title>
    <script src="Js/script.js"></script>
    <link rel="stylesheet" href="CSS/style2.css">
</head>
<body>
    <div class="head2"><h1><center>WELCOME</center></h1></div>
    <div class="head2" id="sub"><center>Hey <?php echo $_SESSION['username']; ?>! Please update your profile</center></div>
    <div class="content">
            <form name="profile" action="profile.php" id="form" method="post" enctype="multipart/form-data" onsubmit="return validate_p()">
                <div class="contain">
                <div class="container">
                <div class="form">
                    <div class="item" id="fimage">
                        <div class="head"><h1>PROFILE PHOTO</h1></div>
                        <div class="photo"><img src="https://th.bing.com/th/id/OIP.1Agw8tPi1oidtC_q4U4ZdgHaHa?pid=ImgDet&rs=1" id="photo"></img></div>
                        <br>
                        <input type="file" id="image" name="image">
                        <div class="ferror"></div>
                    </div>
                </div></div>
                <div class="container">
                <div class="form">
                    <div class="head"><h1>UPDATE PROFILE</h1></div>
                    <div class="item" id="ffullname">
                        <label for="fullname">Name :</label>
                        <input id="fullname" name="fullname" placeholder="Add your name" oninput="name_val()"> 
                        <div class="ferror"></div>
                    </div>
                    <div class="item" id="fabout">
                        <label for="about">About :</label>
                        <input id="about" name="about" placeholder="Add a short bio or fun fact (not more than 100 characters)" oninput="about_val()">
                        <div class="ferror"></div>
                    </div>
                    <div class="item" id="fphno">
                        <label for="phno">Contact No :</label>
                        <input id="phno" name="phno" placeholder="Add your contact number" oninput="phno_val()">
                        <div class="ferror"></div>
                    </div>
                    <div class="item" id="fcity">
                        <label for="city">City :</label>
                        <input id="city" name="city" placeholder="Add your city or region" oninput="city_val()">
                        <div class="ferror"></div>
                    </div>
                    <div class="item" id="fhobbies">
                        <label for="hobbies">Hobbies :</label>
                        <input id="hobbies" name="hobbies" placeholder="Add what you love to do(not more than 100 characters)" oninput="hobbies_val()">
                        <div class="ferror"></div>
                    </div>
                    <input type="submit" value="Sign In" id="btn">
                </div></div>
               </div>
            </form>
        </div>
    </div>
</body>
</html>


<?php 
include 'config.php';
if(empty($_SESSION['username']))
{
    header("location: index.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
    }
$username = $_SESSION['username'];
$fullname = test_input($_POST['fullname']);
$about = test_input($_POST['about']);
$phno = test_input($_POST['phno']);
$city = test_input($_POST['city']);
$hobbies = test_input($_POST['hobbies']);
$photo = time() . '-' . $_FILES["image"]["name"];
$target_dir = "images/";
$target_file = $target_dir . basename($photo);
if($_FILES['image']['size'] > 200000)
{
    echo "<script>alert('Image size should not be more than 200kB')</script>";
}
if(file_exists($target_file)){
    echo "<script>alert('File already exists')</script>";
}

if (empty($error)) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)) {
      $sql = "INSERT INTO vaishnavi_profile ( user, fullname, about, phone, city, hobbies, photo) VALUES ('" . $username . "','" . $fullname . "','" . $about . "','" . $phno . "','" . $city . "','" . $hobbies . "','" . $photo . "')";
      $result = mysqli_query($conn, $sql);
    if($result)
    {
        $sqlc = "UPDATE vaishnavi_check SET chck='1' WHERE user='" . $username . "'";
        if(mysqli_query($conn, $sqlc))
        {
            echo "<script>alert('Profile updated successfully')</script>";
            header("location : home.php");
        }
        else{
            echo "<script>alert('Error')</script>";
        }
    }
    else{
        die("Connection failed: " . mysqli_connect_error());
    }
}
else{
    echo "<script>alert('Error in database occurred')</script>";
}
}
else{
    echo "<script>alert('Error occurred while uploading image')</script>";
}
}
?>
