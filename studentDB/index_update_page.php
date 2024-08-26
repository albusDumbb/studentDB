<!-- connection -->
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
      echo "connected! <br> ";
    }   
?>
<?php
    function updateData($fullName, $birthdate, $course, $emailAddress, $emailAddressSecond){
        global $conn;

        $update = $conn->prepare("UPDATE student_info SET FULLNAME = ?,
                                    BIRTHDATE = ?,
                                    COURSE = ?,
                                    EMAIL_ADDRESS = ?
                                    WHERE EMAIL_ADDRESS = ?");
        $update->bind_param("sssss", $fullName, $birthdate, $course, $emailAddress, $emailAddressSecond);

        if($update->execute()){
            if($update->affected_rows > 0){
                echo "SUCCESS UPDATE!";
            }else{
                echo "FAILED UPDATE";
            }

        }

    }
    if(isset($_POST['buttonUpdate'])){
        updateData($_POST['FULLNAME'], $_POST['BIRTHDATE'], $_POST['COURSE'], $_POST['EMAIL'], $_POST['EMAIL_ADDRESS']);
    }


?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Update Page</title>
</head>
<body>
    <div class="back">
        <a href="http://localhost/practice_php_1/index_select_page.php">
            <img class="allBack" src="back-svgrepo-com (1).svg">
        </a>
    </div>
    <div class="update-page">
        <div class="update-right">
            <div class="update-right-p">
                <p>UPDATE DATA</p>
            </div>
            <form class="update-right-input" action="http://localhost/practice_php_1/index_update_page.php" method="POST">
                Enter email you want to update <input class= "enter-email" type="text" name="EMAIL_ADDRESS">
                <div class="update-right-pp">
                    <p>FILL IN THE FOLLOWING INFORMATION YOU WANT TO UPDATE:</p>
                </div>
                Full Name (FN, MI, LN) <input type="text" name="FULLNAME">
                Birthdate <input type="text" name="BIRTHDATE">
                Course <input type="text" name="COURSE">
                Email <input type="text" name="EMAIL">
                <input class="update-button" type="submit" value="SUBMIT" name="buttonUpdate">
            </form>

        </div>
    </div>
</body>
</html>