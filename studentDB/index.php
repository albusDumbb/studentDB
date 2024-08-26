<?php
  $servername = "sql101.infinityfree.com";
  $username = "if0_36775807";
  $password = "gl5wFvGPlkIY";
  $database = "if0_36775807_student_DB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
  }else{
    echo "Connected! <br> ";
  }
  
  

?>

<!-- ---------------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    
    <div class="home-page">
      <div class="home-content">
        <p>WELCOME</p>
        <a href="http://localhost/practice_php_1/index_select_page.php">Get Started</a>
      </div>
    </div>



  </body>
</html>

