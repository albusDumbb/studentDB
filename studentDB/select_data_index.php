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
<!-- select data -->
<?php

    $selectedData = "";
    function selectData($emailAddress){

        global $conn;
        global $selectedData;

        $prepareSelect = $conn->prepare("SELECT FULLNAME, BIRTHDATE, COURSE, EMAIL_ADDRESS 
                                        FROM student_info WHERE EMAIL_ADDRESS = ?");
        $prepareSelect->bind_param("s", $emailAddress);
        $prepareSelect->execute();
        $result = $prepareSelect->get_result();

        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $selectedData .= "<strong>STUDENT NAME:</strong> " . $row['FULLNAME'] . "<br>" . 
                                "<strong>BIRTHDATE:</strong> " . $row['BIRTHDATE'] . "<br>" .
                                "<strong>COURSE:</strong> " . $row['COURSE'] . "<br>" .
                                "<strong>EMAIL ADDRESS:</strong> " . $row['EMAIL_ADDRESS'] . "<br>" . "<br>";
            }
            
        }
        
        else{
            echo "!NO RESULTS!";
        }
        //close the connection
        $prepareSelect->close();
    }
    
    function selectAllData($conn){

        global $conn;
        global $selectedData;
        
        $selectAll = $conn->query("SELECT * FROM student_info");
        if ($selectAll->num_rows > 0){

            while($row = $selectAll->fetch_assoc()){
                $selectedData .= "<strong>STUDENT NAME:</strong> " . $row['FULLNAME'] . "<br>" . 
                                "<strong>BIRTHDATE:</strong> " . $row['BIRTHDATE'] . "<br>" .
                                "<strong>COURSE:</strong> " . $row['COURSE'] . "<br>" .
                                "<strong>EMAIL ADDRESS:</strong> " . $row['EMAIL_ADDRESS'] . "<br>" . "<br>";
            }
        }
        else{
            echo "0 results";
        }
    }

    if(isset($_POST['select-submit'])){
        selectData($_POST['email']);
    }
    if (isset($_POST['submit-all'])){
        selectAllData($conn);

    }

    $conn->close();
?>

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Select Page</title>
</head>
<body>
    <div class="back">
        <a href="http://localhost/practice_php_1/index_select_page.php">
            <img class="allBack" src="back-svgrepo-com (1).svg">
        </a>
    </div>
    <div class="select">
        <div class="select-data">
            <div class= "select-data-firstP">
                <p>SELECT DATA</p>
            </div>
            <div class="select-form">
                <form class="select-form-design" action="http://localhost/practice_php_1/select_data_index.php" method="POST">
                    Enter email you want to select <input type="text" name="email">
                    <input class="select-button" type="submit" name="select-submit" value="SUBMIT">
                </form>
                <form class="select-all-button" action="http://localhost/practice_php_1/select_data_index.php" method="POST">
                    <input type="submit" name="submit-all" value="SELECT ALL">
                </form>
            </div>
        </div>
        <div class="select-section">
            <div class="selected-paragraph">
                <p>SELECTED DATA:</p>
            </div>
            <div class="selected-data">
                <div class="data">
                    <?php echo $selectedData; ?>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>