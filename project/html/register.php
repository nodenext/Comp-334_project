<?php // sectiona.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
 
if (isset($_POST['readname']))
  {
   


$stmt = $conn->prepare("INSERT INTO read_profile(readname, read_id, read_code, email,phone_number, password) VALUES(?, ?, ?, ?,?, ?)");
$stmt->bind_param("ssisss",$readname,$read_id,$user_types,$phone_number,$email,$password);

$readname= get_post($conn, 'readname' );
$read_id=  get_post($conn, 'read_id');
$user_types= get_post($conn,'user_types');
$phone_number=  get_post($conn, 'phone_number');
$email= get_post($conn, 'email');
$password=   get_post($conn, 'password');

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    
}
else{
    echo "insert record successfully";
}



  }
  
  $query  = "SELECT * from read_code";
$result = $conn->query($query);
if (!$result) die ("Database access failed: " . $conn->error);
  


echo <<<_END
<html>
<head>
<link href="../css/reg.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="register">
  <form action="register.php" method="post"><pre>
  <h2>Register Page</h2>
Read Name:&nbsp&nbsp<input type="text" name="readname">
Read ID:&nbsp&nbsp&nbsp<input type="text" name="read_id">
Read Type:&nbsp&nbsp<select name="user_types"> 
_END;



$rows = $result->num_rows;
for ($j = 0; $j < $rows ; ++$j)
  {

    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

  echo"   <option value=$row[0]>$row[1]</option>";
}



echo <<<_END
</select>
Phone Number: <input type="text" name="phone_number">
Email:&nbsp&nbsp&nbsp&nbsp<input type="text" name="email">
Password:&nbsp&nbsp <input type="password" name="password">
<input type="submit" value="submit">
  </pre></form>
 
    <a href="index.php" style="float: right;margin-right: 20px;">Return Login</a>
</div>
</body>
</html>
_END;

 $result->close();
  $conn->close();
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
?>