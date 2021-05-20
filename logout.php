<?php
session_start();
session_destroy();
if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
    setcookie ('user_name',$username,time()-86400);
    setcookie ('user_pass',$password,time()-86400);
}
header('location:index.php');
?>