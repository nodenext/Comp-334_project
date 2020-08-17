<?php
  $p_title = $_REQUEST['ptitle'];
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
$query  = "SELECT * FROM system_books where booktype like '%$p_title%'";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
$rows = $result->num_rows;
echo '<body> <div id="table_ajax"> <table> <thead> <tr> <td>';
echo 'bookname </td>  <td> Title</td> <td> booknumber</td></tr></thead> <tbody>';
for ($j = 0 ; $j < $rows ; ++$j)
  { echo '<tr>';
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo '<td>'   . $row['bookname']   . '</td>';
    echo '<td>'    . $row['booktype']    . '</td>';
    echo '<td>'    . $row['booknumber']    . '</td>';
    echo '</tr>';
  }
 echo '</div> </tbody> </table>'; 
  $result->close();
  $conn->close();
?>