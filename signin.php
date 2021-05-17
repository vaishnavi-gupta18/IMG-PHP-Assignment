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
