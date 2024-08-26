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

<!-- add data -->
<?php
    function insertData($insertValueA, $insertValueB, $insertValueC, $insertValueD){
            
        global $conn;
        $insertValueA = $conn->real_escape_string($insertValueA);
        $insertValueB = $conn->real_escape_string($insertValueB);
        $insertValueC = $conn->real_escape_string($insertValueC);
        $insertValueD = $conn->real_escape_string($insertValueD);

        if (empty($insertValueA)){
            echo "Failed! PLEASE, FILL UP COMPLETELY";  
        }
        elseif(empty($insertValueB)){
            echo "Failed! PLEASE, FILL UP COMPLETELY";
        }
        elseif(empty($insertValueC)){
            echo "Failed! PLEASE, FILL UP COMPLETELY";
        }
        elseif(empty($insertValueD)){
            echo "Failed! PLEASE, FILL UP COMPLETELY";
        }
        else{
            $insertData = "INSERT INTO student_info (`FULLNAME`, `BIRTHDATE`, `COURSE`, `EMAIL_ADDRESS`) 
                            VALUES ('$insertValueA', '$insertValueB', '$insertValueC', '$insertValueD')";

            $hehe =  $conn->query($insertData); 
            if ($hehe) {
                echo "!!Added Successfuly!!";
            } else{
                echo "Failed";
            }
        }    
    }

    if(isset($_POST['submit'])){
        insertData($_POST['name'], $_POST['birthdate'], $_POST['course'], $_POST['email']);
    }
    $conn->close();
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Page</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="back">
        <a href="http://localhost/practice_php_1/index_select_page.php">
            <img class="allBack" src="back-svgrepo-com (1).svg">
        </a>
    </div>
    <div class= "add-page">
        <div class="add-form">
            <div class="first-add-p">
                <p>ADD DATA</p>
            </div>
            
            <form class="form-add" action="http://localhost/practice_php_1/index_add_data.php" method="POST">
                Full Name (FN, MI, LN) <input type="text" name="name" /><br />
                Birthdate(day/month/year) <input type="text" name="birthdate" /><br />
                Course <input type="text" name="course" /><br />
                Email <input type="text" name="email" /><br />
                <input class="add-button" type="submit" name="submit" value="Submit" />
            </form>
        </div>
        
    </div>
</body>
</html>
