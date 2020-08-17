<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <script src="../js/ajax.js"> </script> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand" href="#">Library Mangement System(admine)</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index1.php">Home</a></li>
              <li><a href="insert.php">Insert</a></li>
              <li><a href="delete.php">Delete</a></li>
              
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">
                    <?php
                     session_start();
                     $id = $_SESSION['read_id']; 
                     echo $id
                    
                    ?>
                
                </a></li>
                
              <li class="active"><a href="index.php">Exit<span class="sr-only">(current)</span></a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>



      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Insert Book </h1>
        <p>You can insert book by book here.</p>
        <p>
 <?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  if (isset($_POST['bookname'])   &&
      isset($_POST['booktype'])    &&
      isset($_POST['booknumber']) &&
      isset($_POST['bookid'])     &&
      isset($_POST['isbn']))
  {
    $bookid   = get_post($conn, 'bookid');
    $bookname = get_post($conn, 'bookname');
    $booktype = get_post($conn, 'booktype');
    $bookauthor     = get_post($conn, 'bookauthor');
    $isbn     = get_post($conn, 'isbn');
    $bookpub = get_post($conn, 'bookpub');
    $bookpubdate     = get_post($conn, 'bookpubdate');
    $booknumber     = get_post($conn, 'booknumber');
    
    $query    = "INSERT INTO system_books VALUES" .
      "('$bookid', '$bookname', '$booktype', '$bookauthor', '$isbn','$bookpub','$bookpubdate','$booknumber')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="insert.php" method="post"><pre>
    Bookid <input type="text" name="bookid">
  Bookname <input type="text" name="bookname">
  Booktype <input type="text" name="booktype">
Bookauthor <input type="text" name="bookauthor">
      ISBN <input type="text" name="isbn">
   Bookpub <input type="text" name="bookpub">
Bookpudate <input type="text" name="bookpubdate">
Booknumber <input type="text" name="booknumber">
           <input type="submit" value="ADD RECORD">
  </pre>
  </form>
_END;

 $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
        </p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>