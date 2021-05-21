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
    <div class="contain">
        <div class="contain">
            <div class="head"><h1>USERS</h1></div>
           <div class="users">
               <table id="users">
<tr>
                       <th>Username</th>
                       <th>Name</th>
                       <th>Gender</th>
                       <th>About</th>
                       <th>City</th>
                       <th>Hobbies</th>
                       <th>Profile pic</th>
                   </tr>
<?php
include 'config.php';
session_start();
if(empty($_SESSION['username']))
{
    header('location:index.php');
}
if($_SESSION['chck']!='1')
{
    header('location:profile.php');
}
$username=$_SESSION['username'];
$sql = "SELECT * FROM vaishnavi_profile WHERE NOT user='" . $username . "' AND chck='1'";
$result = mysqli_query($conn, $sql) or die(mysql_error());
$num = mysqli_num_rows($result);
if($num)
{
    while($row = mysqli_fetch_assoc($result)) {
       echo "<tr><td>" . $row['user'] . "</td><td>" . $row['fullname'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['about'] . "</td><td>" . $row['city'] . "</td><td>" . $row['hobbies'] . "</td><td><img src='images/" . $row['photo'] . "'></td></tr>";
    }
}
?>
               </table>
  </div>        
  <div class="contain"><input type="submit" value="Update Profile" id="btn" onclick="location.href='profile.php'"></div>
  <div class="contain"><input type="submit" value="Logout" id="btn" onclick="location.href='logout.php'"></div>        
</div>
 </div>
</div>


</body>
</html>