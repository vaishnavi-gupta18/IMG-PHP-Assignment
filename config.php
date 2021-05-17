<?php
$conn = mysqli_connect('localhost','first_year',"first_pass","first_year");
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySql" . mysql_connect_error();
    exit();
}
?>