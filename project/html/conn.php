<?php
$hn = 'localhost'; //hostname
    $db = 'yao11p_pjt'; //database
    $un = 'yao11p_pjt'; //username
   $pw = 'test123'; //password
   
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  

?>