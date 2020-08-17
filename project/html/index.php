<?php // sectiona.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
?>

<!DOCTYPE html>
<html>
<head>

<title>Library Mangement System</title>
<link href="../css/log.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="Login_Register">
    <h2>Library Mangement </h2>
    <form action="userjude.php" method="post">
        User&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp：<input type="text" name="userid" placeholder=""><br><br>
        Password&nbsp&nbsp：<input type="password" name="password" placeholder=""><br><br>
        <button type="submit" name="ok1">login</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button type="submit" name="ok2">register</button>

    </form>
</div>
</body>
</html>