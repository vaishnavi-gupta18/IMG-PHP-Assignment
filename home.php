
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Js/script.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<form name="logout" action='logout.php' id="form" method="post">

<div class="item">
<input type="submit" value="Logout" id="btn"></div>
</form>
</body>
</html>
<?php
include 'config.php';
session_start();
?>