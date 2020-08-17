<?php
session_start();
require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  

if(isset($_POST['ok1'])){
    $userid = $_POST['userid'];
   
    $password = $_POST['password'];
    $strQuery = "select * from read_profile where read_id = '$userid' and password ='$password'";
    $_SESSION['read_id']=$userid;
    
     $result=$conn->query($strQuery);
    if (!empty($result) ){
        $rows=mysqli_fetch_array($result);

        if ($rows['read_code'] == 1) {
             
            header ("Location:index1.php");
        } 
        if ($rows['read_code'] == 2) {
            header ("Location:index2.php");
        }
         if ($rows['read_code'] == 3) {
             
            header ("Location:index_t.php");
        }
        
    } 
    
}

if(isset($_POST['ok2'])){
    header ("Location:register.php");
}

?>